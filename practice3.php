<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form to Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>

<body>

    <?php
    require('config.php');

    // Insert Data
    if (isset($_REQUEST['name'])) {

        for ($i = 0; $i < count($_REQUEST['name']); $i++) {
            $name = $_REQUEST['name'][$i];
            $email = $_REQUEST['email'][$i];

            $sql = "INSERT INTO check_list(description,remark) VALUES('$name','$email ')";
            $result = mysqli_query($con, $sql);
        }


        if ($result) {
            echo "New Record Inserted successfully!";
        } else {
            echo "Unable Insert Data";
        }
    }
    ?>


    <div class="contaner">
        <div class="row">
            <div class="col-md-6">
                <h1>ADD DATA</h1>


                <form id="myForm" action="" method="POST">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>

                    <button type="button" id="submitBtn">ADD</button>

                </form>


                <form action="" method="POST">
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
                    </table><br>

                    <button type="submit" id="">Submit</button>
                </form>
            </div>

            <div class="col-md-6">
                <h1>Show Data</h1>
                <table class="table table-striped">
                    <tr>
                        <th>SL</th>
                        <th>Description</th>
                        <th>Remark</th>
                    </tr>

                    <?php

                    // show Data

                    $i = 1;
                    $sql = "SELECT*FROM check_list";
                    $result = mysqli_query($con, $sql);


                    while ($row = mysqli_fetch_assoc($result)) { ?>

                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo $row['remark']; ?></td>
                        </tr>

                    <?php   }

                    ?>



                </table>
            </div>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            $("#submitBtn").on("click", function() {
                var name = $("#name").val();
                var email = $("#email").val();

                if (name != "") {
                    var newRow = $("<tr>");
                    newRow.append("<td> <input type='text' style='border:none' id='name'  name ='name[]' value=" + name + ">   </td>");
                    newRow.append("<td> <input type='text' style='border:none' id='name'  name ='email[]' value=" + email + ">   </td>");

                    $("#dataTable tbody").append(newRow);

                    $("#name").val("");
                    $("#email").val("");
                }

            });
        });
    </script>


</body>

</html>