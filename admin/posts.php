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
                    <?php
                    if (isset($_GET['source'])) {
                        $source = $_GET['source'];
                    } else {
                        $source = '';
                    }
                    switch ($source) {
                        case 'add_post';
                            include "includes/add_post.php";
                            break;
                        case 'view_post';
                            include "includes/view_all_posts.php";
                            break;
                        case 'edit_post';
                            include "includes/edit_post.php";
                            break;

                    }
                    ?>
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
