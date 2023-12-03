<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<body>

    <?php
    require('config.php');


    // $sql = "INSERT INTO check_list(description,remark) VALUES('xyz','remarkxy')";
    // $result = mysqli_query($con,$sql); // if you refresh url data will insert again

    // if($result){
    //     echo "New Record Inserted successfully!";
    // }else{
    //     echo "Unable Insert Data";
    // }

    // print_r($_REQUEST);
    $name = $_REQUEST['name'];

    ?>



    <h1>Check Any Data</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                    </div><br>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>


                <form action="">
                    <table class="table">
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>DS</th>
                            <th>RM</th>
                        </tr>
                        <tr>
                            <td>name</td>
                            <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
                            <td>DS</td>
                            <td>RM</td>
                        </tr>
                    </table>
                </form>

            </div>
        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>