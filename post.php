<?php
include 'includes/db.php';

if(!isset($_SESSION['user_id'])){ header("Location: login.php"); exit; }

$topic_id = intval($_POST['topic_id']);
$content = $conn->real_escape_string($_POST['content']);
$uid = $_SESSION['user_id'];

$conn->query("INSERT INTO posts (topic_id, user_id, content) VALUES ($topic_id, $uid, '$content')");
header("Location: topic.php?id=$topic_id");
exit;
?>
