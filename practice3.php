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
    if (isset($_REQUEST['description'])) {

        for ($i = 0; $i < count($_REQUEST['description']); $i++) {
            $description = $_REQUEST['description'][$i];
            $remark = $_REQUEST['remark'][$i];

            $sql = "INSERT INTO check_list(description,remark) VALUES('$description','$remark ')";
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
        <div class="row p-2">
            <div class="col-md-6">
                <h1>ADD DATA</h1>

                <!-- Add Form -->
                <form id="myForm" action="" method="POST" class="shadow p-2 bg-info">
                    <label for="description">Description:</label>
                    <input type="text" id="description" required>
                    <!-- <textarea name="" id="description" cols="3" rows="3"></textarea> -->

                    <label for="remark">Remerk:</label>
                    <input type="text" id="remark" required>

                    <button type="button" id="submitBtn" class="btn btn-sm btn-success">ADD</button>
                </form><br><br>

                <!-- Table form -->
                <form action="" method="POST" class="shadow p-2">
                    <table id="dataTable" class="table">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Remark</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Table content will be dynamically added here -->
                        </tbody>
                    </table>

                    <button type="submit" id="" style="margin-left: 530px;" class="btn btn-primary btn-sm">Submit</button>


                </form>

            </div>

            <!-- Show data Table -->
            <div class="col-md-6">
                <h4><a href="edit.php">Update Data</a></h4>
                <h1>Show Data</h1>

                <table class="table table-striped shadow p-2">
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
                var description = $("#description").val();
               
                var remark = $("#remark").val();

                

                if (description != "") {
                    var newRow = $("<tr>");
                    newRow.append("<td> <input type='text' style='border:none' id='name'   name ='description[]' value='" + description + "'>   </td>"); //value='" + description + "'
                    newRow.append("<td> <input type='text' style='border:none' id='name'  name ='remark[]' value='" + remark + "'>   </td>");

                    $("#dataTable tbody").append(newRow);

                    $("#description").val("");
                    $("#remark").val("");
                }

            });
        });
    </script>


</body>

</html>