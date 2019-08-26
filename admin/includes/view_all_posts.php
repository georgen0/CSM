<table class="table table-bordered table-hover table-responsive">
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
        echo "<td><img src='../images/$Img' style='width: 100%'></td>";
        echo "<td>$Tags</td>";
        echo "<td>$Comments</td>";
        echo "<td><a href='posts.php?source=edit_post&p_id={$ID}'>Edit</a></td>";
        echo "<td><a href='posts.php?delete={$ID}'>Delete</a></td>";
        echo "</tr>";
    }

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $query = "DELETE FROM posts WHERE post_id = {$id}";
        $result = mysqli_query($connection, $query);
    }
    ?>
    </tbody>
</table>