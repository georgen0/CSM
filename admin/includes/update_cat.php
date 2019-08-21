<form action="" method="post">
    <div class="form-group">
        <label for="cat-title">Edit category</label>
        <?php
        global $connection;
        if (isset($_GET['edit'])) {
            $query = "SELECT * FROM categories WHERE cat_id = {$_GET['edit']}";
            $result = mysqli_query($connection, $query);
            if (!$result) {
                DIE('Query failed' . mysqli_error($connection));
            }
            $row = mysqli_fetch_assoc($result);
            $title = $row['cat_title'];
            ?>
            <input value="<?php echo $title; ?>" type="text" class="form-control" name="cat_title">
            <?php
        }
        ?>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="submit_edit" value="Update category">
    </div>
</form>