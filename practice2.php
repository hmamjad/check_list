<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form to Table</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>

    <form id="myForm">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <button type="button" id="submitBtn">Submit</button>
    </form>

    <table id="dataTable">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <!-- Table content will be dynamically added here -->
        </tbody>
    </table>

    <script>
        $(document).ready(function () {
            $("#submitBtn").on("click", function () {
                // Get form data
                var name = $("#name").val();
                var email = $("#email").val();

                // Create table row
                var newRow = $("<tr>");
                newRow.append("<td>" + name + "</td>");
                newRow.append("<td>" + email + "</td>");

                // Append row to the table
                $("#dataTable tbody").append(newRow);

                // Clear form fields
                $("#name").val("");
                $("#email").val("");
            });
        });
    </script>

</body>
</html>
