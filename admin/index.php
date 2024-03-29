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
                    <h1 class="page-header">
                        Welcome to admin !
                        <small>Author</small>
                    </h1>
                    <!-- Add categ form -->
                    <div class="col-xs-6">
                        <?php
                        if (isset($_GET['delete'])) {
                            $query = "DELETE FROM categories WHERE cat_id = {$_GET['delete']}";
                            $result = mysqli_query($connection, $query);
                            if (!$result) {
                                DIE('Query failed' . mysqli_error($connection));
                            }
                            header("Location: index.php");
                        }

                        include "includes/insert.php";
                        insert();

                        if (isset($_GET['edit'])) {
                            include "includes/update_cat.php";
                        }
                        if (isset($_POST['submit_edit'])) {
                            $title = $_POST['cat_title'];
                            $query = "UPDATE categories SET cat_title = '{$title}' WHERE cat_id = {$_GET['edit']}";
                            mysqli_query($connection, $query);
                        }
                        ?>
                    </div>
                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category title</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php
                            $query = "SELECT * FROM categories";
                            $result = mysqli_query($connection, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['cat_id'];
                                $title = $row['cat_title'];
                                echo "<tr>";
                                echo "<td>{$id}</td>";
                                echo "<td>{$title}</td>";
                                echo "<td><a href='?delete={$id}'>Delete</a></td>";
                                echo "<td><a href='?edit={$id}'>Edit</a></td>";
                                echo "</tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

</body>

</html>
