<?php
include 'includes/db.php';
include 'includes/header.php';

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title = $conn->real_escape_string($_POST['title']);
    $uid = $_SESSION['user_id'];
    $conn->query("INSERT INTO topics (title, user_id) VALUES ('$title', $uid)");
    header("Location: index.php");
    exit;
}
?>
<h2>Ny tråd</h2>
<form method="POST">
    <input type="text" name="title" placeholder="Rubrik" required>
    <button type="submit">Skapa</button>
</form>
<?php include 'includes/footer.php'; ?>
