<!DOCTYPE html>
<html>

<head>
    <title>DINAC?</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <h1>Do I Need a Coat?</h1>
    <br>
    <h3>A simple web app to determine whether a coat will be needed at a given location 🧥 🌧️</h3>

    <form action="">
        <label for="location">Location:</label>
        <input type="text" id="location" name="location"><br><br>
        <button type="button" onclick="submitForm()">Submit</button>
    </form>

    <div id="responseContainer"></div>

    <script>
        function submitForm() {
            var locationValue = $('#location').val();

            $.get("processForm.php", {
                location: locationValue
            }, function(response) {
                $('#responseContainer').html(response);
            });
        }
    </script>
</body>

</html>
