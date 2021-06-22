<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'mini_project');
if (!$db) {
 die("Connection failed: " . mysqli_connect_error());
}
// initialize variables
$user = "";
$comment = "";
$id = 0;
$update = false;
if (isset($_POST['save'])) {
 $user = $_POST['user'];
 $comment = $_POST['comment'];
 $sql = "INSERT INTO info (user, comment) VALUES ('$user', '$comment')";
 if (mysqli_query($db, $sql)) {
     $_SESSION['message'] = "Comment Saved";
 } else {
 $_SESSION['error']['message'] = "Comment Save Failed!";
 }
}
if (isset($_POST['update'])) {
 $id = $_POST['id'];
 $user = $_POST['user'];
 $comment = $_POST['comment'];
 $sql = "UPDATE info SET user='$user', comment='$comment' WHERE id=$id";
 if (mysqli_query($db, $sql)) {
 $_SESSION['message'] = "Comment Updated";
 } else {
 $_SESSION['message'] = "Comment Update Failed!";
 }
 header('location: index.php');
}
if (isset($_GET['del'])) {
 $id = $_GET['del'];
 $sql = "DELETE FROM info WHERE id=$id";
 if (mysqli_query($db, $sql)) {
 $_SESSION['message'] = "Comment Deleted";
 } else {
 $_SESSION['message'] = "Comment Delete Failed!";
 }
 header('location: index.php');
}
if (isset($_GET['edit'])) {
 $id = $_GET['edit'];
 $update = true;
 }
 $record = mysqli_query($db, "SELECT * FROM info WHERE id=$id");
 if (mysqli_num_rows($record) == 1) {
 $n = mysqli_fetch_array($record);
 $user = $n['user'];
 $comment = $n['comment'];
 }
