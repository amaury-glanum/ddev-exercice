<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Form</title>
</head>
<style>
    /* styles.css */

    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    form {
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
    }

    .input-field {
        width: 100%;
        padding: 8px;
        margin-bottom: 16px;
        box-sizing: border-box;
    }

    .textarea-field {
        width: 100%;
        padding: 8px;
        margin-bottom: 16px;
        box-sizing: border-box;
    }

    .button {
        background-color: #4caf50;
        color: #fff;
        padding: 10px 15px;
        border: none;
        cursor: pointer;
        font-size: 16px;
    }

    .button:hover {
        background-color: #45a049;
    }

</style>
<body>
<form id="projectForm">
    <label for="id">ID:</label>
    <input type="text" name="id" id="id" class="input-field" required><br>

    <label for="date">Date:</label>
    <input type="text" name="date" id="date" class="input-field" required><br>

    <label for="place">Place:</label>
    <input type="text" name="place" id="place" class="input-field" required><br>

    <label for="category">Category:</label>
    <input type="text" name="category" id="category" class="input-field" required><br>

    <label for="title">Title:</label>
    <input type="text" name="title" id="title" class="input-field" required><br>

    <label for="accroche">Accroche:</label>
    <input type="text" name="accroche" id="accroche" class="input-field"><br>

    <label for="description">Description:</label>
    <textarea name="description" id="description" class="textarea-field" required></textarea><br>

    <label for="goal">Goal:</label>
    <textarea name="goal" id="goal" class="textarea-field" required></textarea><br>

    <label for="how-we-do">How We Do:</label>
    <textarea name="how-we-do" id="how-we-do" class="textarea-field" required></textarea><br>

    <label for="results">Results:</label>
    <textarea name="results" id="results" class="textarea-field"></textarea><br>

    <label for="img">Image URL:</label>
    <input type="text" name="img" id="img" class="input-field" required><br>

    <label for="images">Images Directory:</label>
    <input type="text" name="images" id="images" class="input-field" required><br>

    <label for="banner">Banner:</label>
    <input type="text" name="banner" id="banner" class="input-field"><br>

    <button type="button" class="button" onclick="submitForm()">Submit</button>
</form>

<script>
    async function submitForm() {
        const formData = new FormData(document.getElementById('projectForm'));
        const jsonData = {};

        formData.forEach(function(value, key){
            jsonData[key] = value;
        });

        const jsonString = JSON.stringify(jsonData);

        // Fetch API Request
        try {
            const response = await fetch('process_form.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: jsonString,
            });

            if (!response.ok) {
                console.error('Network response was not ok');
            }

            const result = await response.text();
            console.log(result); // Display the response from the server

        } catch (error) {
            console.error('Error during fetch:', error);
        }
    }
</script>
</body>
</html>
