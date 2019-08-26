<?php

if (isset($_GET['p_id'])) {
    $the_post_id = $_GET['p_id'];
}
global $connection;
$query = "SELECT * FROM posts WHERE post_id = $the_post_id";
$result = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $ID = $row['post_id'];
    $Author = $row['post_author'];
    $Title = $row['post_title'];
    $Time = $row['post_date'];
    $Category = $row['post_category_id'];
    $Status = $row['post_status'];
    $Img = $row['post_image'];
    $Tags = $row['post_tags'];
    $Comments = $row['post_comment_count'];
    $Content = $row['post_content'];
}
?>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Post Title</label>
            <input value="<?php echo $Title; ?>" type="text" class="form-control" name="title">
        </div>
        <div class="form-group">
            <label for="post_category">Post Category ID</label>
            <input value="<?php echo $Category; ?>" type="text" class="form-control" name="post_category_id">
        </div>
        <div class="form-group">
            <select name="post_category" id="">
                <?php
                $query = "SELECT * FROM categories";
                $result = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    $title = $row['cat_title'];
                    echo "<option value='{$title}'>{$title}</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="author">Post Author</label>
            <input value="<?php echo $Author; ?>" type="text" class="form-control" name="author">
        </div>
        <div class="form-group">
            <label for="post_status">Post Status</label>
            <input value="<?php echo $Status; ?>" type="text" class="form-control" name="post_status">
        </div>
        <div class="form-group">
            <img width="50%" src="../../images/<?php echo $Img; ?>">
        </div>
        <div class="form-group">
            <label for="post_tags">Post Tags</label>
            <input value="<?php echo $Tags; ?>" type="text" class="form-control" name="post_tags">
        </div>
        <div class="form-group">
            <label for="post_content">Post Content</label>
            <textarea class="form-control" name="post_content" id="" cols="30"
                      rows="10"><?php echo $Content; ?></textarea>
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="update_post" value="Publish post">
        </div>
    </form>

<?php
if (isset($_POST['update_post'])) {
    $post_title = $_POST['title'];
    $post_author = $_POST['author'];
    $post_category_id = $_POST['post_category_id'];
    $post_status = $_POST['post_status'];
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    move_uploaded_file($post_image_temp, "../images/$post_image");
    $query = "UPDATE posts SET ";
    $query .= "post_title = '{$post_title}', ";
    $query .= "post_category_id = '{$post_category_id}', ";
    $query .= "post_date = now(), ";
    $query .= "post_author = '{$post_author}', ";
    $query .= "post_status = '{$post_status}', ";
    $query .= "post_tags = '{$post_tags}', ";
    $query .= "post_content = '{$post_content}', ";
    $query .= "post_image = '{$post_image}' ";
    $query .= "WHERE post_id = '{$the_post_id}'";
    $result = mysqli_query($connection, $query);
    header("Location: /admin/posts.php?source=view_post");
}
?>