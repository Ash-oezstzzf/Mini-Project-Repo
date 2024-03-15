<?php

require_once('config/db.php');

$con = mysqli_connect("localhost:3308", "root", "root123", "test1");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
$query = "SELECT * FROM details";
$result = mysqli_query($con,$query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Fetch data from Database</title>
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row mt-5">
            <div class="col mt-5">
                <div class="card">
                    <div class="card-header">
                        <h2 class="display-6 text-center">Fetch data from Database</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr class="bg-dark text-white">
                                <td>Tasks</td>
                                <td>Deadline</td>
                                <td>Deadline Date</td>
                                <td>Remarks</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                            <?php
                            // Check if there are any rows returned
                            if (mysqli_num_rows($result) > 0) {
                                // Fetch data and display it in table rows
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                    <tr>
                                        <td><?php echo $row['task']; ?></td>
                                        <td><?php echo $row['deadline']; ?></td>
                                        <td><?php echo $row['deadlinedate']; ?></td>
                                        <td><?php echo $row['remarks']; ?></td>
                                        <td><a href="#" class="btn btn-primary">Edit</a></td>
                                        <td><a href="#" class="btn btn-danger">Delete</a></td>
                                    </tr>
                                <?php
                                }
                            } else {
                                
                                ?>
                                <tr>
                                    <td colspan="4">No data found</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
