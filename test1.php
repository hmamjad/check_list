<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Copy Form Data</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

    <form id="form1">
        <label for="name1">Name:</label>
        <input type="text" id="name1" name="name1">
        <br>
        <label for="email1">Email:</label>
        <input type="text" id="email1" name="email1">
    </form>

    <br>

    <form id="form2">
        <label for="name2">Name:</label>
        <input type="text" id="name2" name="name2">
        <br>
        <label for="email2">Email:</label>
        <input type="text" id="email2" name="email2">
    </form>

    <button id="copyButton">Copy Data</button>

    <script>
        $(document).ready(function () {
            // Copy data from form1 to form2 on button click
            $("#copyButton").on("click", function () {
                // Get values from form1
                var name1Value = $("#name1").val();
                var email1Value = $("#email1").val();

                // Set values to form2
                $("#name2").val(name1Value);
                $("#email2").val(email1Value);
            });
        });
    </script>

</body>
</html>
