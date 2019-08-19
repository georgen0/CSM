<?php
function connect()
{
    global $connection;
    $connection = mysqli_connect('localhost', 'root', '', 'cms');
}
?>