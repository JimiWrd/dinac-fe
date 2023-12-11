<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DINAC?</title>
    <link rel="icon" href="www/public/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <header>
        <h1>Do I Need a Coat?</h1>
        <h4>A simple web app to determine whether a coat will be needed at a given location 🧥 🌧️</h4>
    </header>
    <hr>
    <h2 id="isCoatNeeded"></h2>
    <p id="description"></p>
    <br>


    <form action="">
        <label for="location">Location:</label>
        <input type="text" id="location" name="location"><br><br>
        <button type="button" onclick="submitForm()">Submit</button>
    </form>



    <script>
        function submitForm() {
            var locationValue = $('#location').val();

            $.get("processForm.php", {
                location: locationValue
            }, function(response) {
                var responseJson = JSON.parse(response);

                $('#description').html(responseJson.description);

                if (responseJson.isCoatNeeded == null) {
                    $('#isCoatNeeded').html('');
                    return;
                }

                if (responseJson.isCoatNeeded) {
                    $('#isCoatNeeded').html('Yes, you will need a coat 🧥');
                } else
                    $('#isCoatNeeded').html('No, you should be fine ☀️');
            });
        }
    </script>
</body>

</html>
