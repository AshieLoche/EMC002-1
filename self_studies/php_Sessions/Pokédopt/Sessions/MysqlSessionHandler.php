<?php

    namespace Pokédopt\Sessions;

    class MysqlSessionHandler implements \SessionHandlerInterface {

        protected $db;

        protected $useTransactions;
        
        protected $expiry;
        
        protected $table_sess = 'sessions';

        protected $col_sid = 'sid';
        
        protected $col_expiry = 'expiry';
        
        protected $col_data = 'data';
        
        protected $unlockStatements = [];
        
        protected $collectGarbage = false;

        public function __construct(\PDO $db, $useTransactions = true) {

            $this->db = $db;

            if ($this->db->getAttribute(\PDO::ATTR_ERRMODE) !== \PDO::ERRMODE_EXCEPTION) {
                $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            }

            $this->useTransactions = $useTransactions;
            $this->expiry = time() + (int) ini_get('session.gc_maxlifetime');

        }

        public function open($save_path, $name) {

            return true;

        }

        public function read($session_id) {

            try {

                if ($this->useTransactions) {

                    $this->db->exec('SET TRANSACTION ISOLATION LEVEL READ COMMITTED');
                    $this->db->beginTransaction();

                } else {

                    $this->unlockStatements[] = $this->getLock($session_id);

                }

                $sql = "SELECT $this->col_expiry, $this->col_data FROM $this->table_sess WHERE $this->col_sid = :sid";

                if ($this->useTransactions) {
                    $sql .= ' FOR UPDATE';
                }

                $selectStmt = $this->db->prepare($sql);
                $selectStmt->bindParam(':sid', $session_id);
                $selectStmt->execute();

                $results = $selectStmt->fetch(\PDO::FETCH_ASSOC);

                if ($results) {

                    if ($results[$this->col_expiry] < time()) {
                        return '';
                    }

                    return $results[$this->col_data];

                }

                if ($this->useTransactions) {

                    $this->initializeRecord($selectStmt);

                }

                return '';

            } catch (\PDOException $e) {

                if ($this->db->inTransaction()) {

                    $this->db->rollBack();

                }

                throw $e;

            }
            
        }

        public function write($session_id, $data) {

            try {

                $sql = "INSERT INTO $this->table_sess ($this->col_sid, $this->col_expiry, $this->col_data)
                VALUES (:sid, :expiry, :data)
                ON DUPLICATE KEY UPDATE
                $this->col_expiry = :expiry,
                $this->col_data = :data";

                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':expiry', $this->expiry, \PDO::PARAM_INT);
                $stmt->bindParam(':data', $data);
                $stmt->bindParam(':sid', $session_id);
                $stmt->execute();

                return true;

            } catch (\PDOException $e) {

                if ($this->db->inTransaction()) {

                    $this->db->rollBack();

                }

                throw $e;

            }
            
        }

        public function close() {

            if ($this->db->inTransaction()) {

                $this->db->commit();

            }  else if ($this->unlockStatements) {

                while ($unlockStmt = array_shift($this->unlockStatements)) {

                    $unlockStmt->execute();

                }

            }

            if ($this->collectGarbage) {

                $sql = "DELETE FROM $this->table_sess WHERE $this->col_expiry < :time";
                
                $stmt = $this->db->prepare($sql);
                $stmt->bindValue(':time', time(), \PDO::PARAM_INT);
                $stmt->execute();

                $this->collectGarbage = false;

            }

            return true;

        }

        public function destroy($session_id) {

            $sql = "DELETE FROM $this->table_sess WHERE $this->col_sid = :sid";

            try {

                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':sid', $session_id);
                $stmt->execute();

            } catch (\PDOException $e) {

                if ($this->db->inTransaction()) {
                    $this->db->rollBack();
                }

                throw $e;

            }

            return true;

        }

        public function gc($maxlifetime) {

            $this->collectGarbage = true;

            return true;

        }

        protected function getLock($session_id) {

            $stmt = $this->db->prepare('SELECT GET_LOCK(:key, 50)');
            $stmt->bindValue(':key', $session_id);
            $stmt->execute();

            $releaseStmt = $this->db->prepare('DO RELEASE_LOCK(:key)');
            $releaseStmt->bindValue(':key', $session_id);

            return $releaseStmt;

        }

        protected function initializeRecord(\PDOStatement $selectStmt) {

            try {

                $sql = "INSERT INTO $this->table_sess ($this->col_sid, $this->col_expiry, $this->col_data)
                VALUES (:sid, :expiry, :data)";

                $insertStmt = $this->db->prepare($sql);
                $insertStmt->bindParam(':sid', $session_id);
                $insertStmt->bindParam(':expiry', $this->expiry, \PDO::PARAM_INT);
                $insertStmt->bindValue(':data', '');
                $insertStmt->execute();

                return '';

            } catch (\PDOException $e) {

                if (0 === strpos($e->getCode(), '23')) {

                    $selectStmt->execute();
                    $results = $selectStmt->fetch(\PDO::FETCH_ASSOC);

                    if ($results) {
                        
                        return $results[$this->col_data];

                    }

                    return '';

                }

                if ($this->db->inTransaction()) {
                    $this->db->rollBack();
                }

                throw $e;

            }

        }

    }

?>