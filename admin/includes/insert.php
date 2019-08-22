<?php
function insert()
{
    global $connection;
    if (isset($_POST['submit'])) {
        if ($_POST['cat-title'] == "" || empty($_POST['cat-title'])) {
            echo "The field should not be empty";
        } else {
            $query = "INSERT INTO categories (cat_title) VALUES ('{$_POST['cat-title']}')";
            $result = mysqli_query($connection, $query);
            if (!$result) {
                DIE('Query failed' . mysqli_error($connection));
            }
        }
    }
}

?>
<form action="" method="post">
    <div class="form-group">
        <label for="cat-title">Add category</label>
        <input type="text" class="form-control" name="cat-title">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="submit" value="Add category">
    </div>
</form>