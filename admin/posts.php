<!DOCTYPE html>
<html lang="en">

<body>
<?php include "../includes/Connection.php";
connect();
global $connection;
?>
<?php include "includes/header.php"; ?>
<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Author</th>
                            <th>Time</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Img</th>
                            <th>Tags</th>
                            <th>Comments</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            global $connection;
                            $query = "SELECT * FROM posts";
                            $result = mysqli_query($connection, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $ID = $row['post_id'];
                                $Author = $row['post_author'];
                                $Time = $row['post_date'];
                                $Category = $row['post_category_id'];
                                $Status = $row['post_status'];
                                $Img = $row['post_image'];
                                $Tags = $row['post_tags'];
                                $Comments = $row['post_comment_count'];

                                echo "<tr>";
                                echo "<td>$ID</td>";
                                echo "<td>$Author</td>";
                                echo "<td>$Time</td>";
                                echo "<td>$Category</td>";
                                echo "<td>$Status</td>";
                                echo "<td>$Img</td>";
                                echo "<td>$Tags</td>";
                                echo "<td>$Comments</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
