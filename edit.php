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


    // Delete Data 

    if (isset($_REQUEST['delete'])) {

        // echo "ok";
        // echo $_REQUEST['id'];

        // $sql = "DELETE FROM student WHERE id=". $_REQUEST['id']."    "; 
        $sql = "DELETE FROM check_list WHERE id= {$_REQUEST['id']}   ";
        $result = mysqli_query($con, $sql);

        if ($result) {
            echo "Record Deleted successfully!";
        } else {
            echo "Unable Delete";
        }
    }





    ?>


    <div class="contaner">
        <div class="row p-2">
            <h4><a href="practice3.php">Show All Data</a></h4>
            <!-- All data Table -->
            <div class="col-md-6">
                <h1>Show Data</h1>

                <!-- for Searching -->
                <div class="mb-3">
                    <label for="searchInput" class="form-label">Search:</label>
                    <input type="text" id="searchInput" class="form-control">
                </div>


                <!-- Main Table -->
                <table class="table table-striped shadow p-2">
                    <tr>
                        <th>SL</th>
                        <th>Description</th>
                        <th>Remark</th>
                        <th>Action</th>
                    </tr>

                    <?php


                    // show Data

                    $i = 1;
                    $sql = "SELECT*FROM check_list";
                    $result = mysqli_query($con, $sql);

                    while ($row = mysqli_fetch_assoc($result)) { ?>

                        <tr class="data-row">
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo $row['remark']; ?></td>
                            <td>
                                <form action="" method="POST" class='d-inline-block'>
                                    <input type='hidden' name='id' value="<?php echo $row['id']; ?>">
                                    <input type='submit' name='delete' class='btn btn-sm btn-danger' value='Delete'>
                                </form>

                                <form action='' method='POST' class='d-inline-block'>
                                    <input type='hidden' name='id' value="<?php echo $row['id']; ?>">
                                    <input type='submit' name='edit' class='btn btn-sm btn-info' value='Edit'>
                                </form>

                            </td>
                        </tr>

                    <?php   }

                    ?>



                </table>
            </div>


            <div class="col-md-6 shadow p-4">
                <h2>Update data</h2>

                <?php


                //Edit Table show
                if (isset($_REQUEST['edit'])) {

                    // echo $_REQUEST['id'];
                    // // $sql = "DELETE FROM student WHERE id=". $_REQUEST['id']."    "; 
                    $sql = "SELECT * FROM check_list WHERE id = {$_REQUEST['id']}   ";
                    $result = mysqli_query($con, $sql); //object
                    $row = mysqli_fetch_assoc($result);
                }

                //Update
                if (isset($_REQUEST['update_record'])) {
                    if (($_REQUEST['description'] == "") || ($_REQUEST['remark'] == "")) {
                        echo "Fill All Fild";
                    } else {
                        $updat_name = $_REQUEST['description'];
                        $updat_roll = $_REQUEST['remark'];



                        $sql = "UPDATE `check_list` SET `description`='$updat_name',`remark`='$updat_roll' WHERE id = {$_REQUEST['id']}";
                        $result = mysqli_query($con, $sql);

                        
                        if ($result) {
                            echo "Update successfully!";
                           
                        } else {
                            echo "Update Failed";
                        }
                        
                    }
                }




                ?>
                <form action="" method="POST">


                    <div class="form-group">
                        <input type="text" name="description" placeholder="Update your description" class="form-control mt-2" value="<?php if (isset($row['description'])) {
                                                                                                                                            echo $row['description'];
                                                                                                                                        } ?>">
                    </div>

                    <div class="form-group">
                        <input type="text" name="remark" placeholder="Update your Remark" class="form-control mt-2" value="<?php if (isset($row['remark'])) {
                                                                                                                                echo $row['remark'];
                                                                                                                            } ?>">
                    </div>



                    <div class="form-group">
                        <input type="hidden" name="id" class="form-control mt-2" value="<?php if (isset($row['id'])) {
                                                                                            echo $row['id'];
                                                                                        } ?>">
                    </div>


                    <div class="form-group">
                        <button type="submit" name="update_record" class="mt-2 btn btn-success">Update</button>
                    </div>

                </form>
            </div>

        </div>
    </div>




<!-- for Searching  script-->
    <!-- <script>
        $(document).ready(function() {
            $('#searchInput').on('input', function() {
                var searchText = $(this).val().toLowerCase();

                // Loop through each table row
                $('table tbody tr').each(function() {
                    var rowData = $(this).text().toLowerCase();

                    // Show/hide the row based on the search input
                    if (rowData.includes(searchText)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
    </script> -->


    <!-- for Searching script-->
<!-- for Searching script-->
<script>
    $(document).ready(function () {
        // Hide the entire table initially
        $('table').hide();

        $('#searchInput').on('input', function () {
            var searchText = $(this).val().toLowerCase();

            // Show/hide the entire table based on the search input
            if (searchText === '') {
                $('table').hide();
            } else {
                $('table').show();
            }

            // Loop through each table row
            $('table tbody tr').each(function () {
                var rowData = $(this).text().toLowerCase();

                // Show/hide the row based on the search input
                if (rowData.includes(searchText)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>


    


</body>

</html>