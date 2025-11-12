<?php
include 'includes/db.php';
include 'includes/header.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $conn->real_escape_string($_POST['username']);
    $fullname = $conn->real_escape_string($_POST['fullname']);
    $password = md5($_POST['password']);
    $conn->query("INSERT INTO users (username, password, fullname) VALUES ('$username', '$password', '$fullname')");
    header("Location: login.php");
    exit;
}
?>
<h2>Registrera</h2>
<form method="POST">
    <input type="text" name="fullname" placeholder="Fullständigt namn" required>
    <input type="text" name="username" placeholder="Användarnamn" required>
    <input type="password" name="password" placeholder="Lösenord" required>
    <button type="submit">Skapa konto</button>
</form>
<?php include 'includes/footer.php'; ?>
