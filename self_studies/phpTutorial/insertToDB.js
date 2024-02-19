document.getElementById('insertForm').addEventListener('submit', function(addPizza) {
    e.preventDefault();

    // Get the form data
    const formData = new FormData(this);

    // Send an AJAX request to the insert.php script
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'insert.php', true);

    // Set the request headers
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    // Send the request
    xhr.send(new URLSearchParams(formData));

    // Handle the response
    xhr.onload = function() {
        if (xhr.status === 200) {
            console.log('Data inserted successfully.');
            // Reset the form
            this.reset();
        } else {
            console.log('Error: ' + xhr.statusText);
        }
    };
});