<?php
include 'includes/db.php';
include 'includes/header.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $conn->real_escape_string($_POST['username']);
    $password = md5($_POST['password']);

    $result = $conn->query("SELECT * FROM users WHERE username='$username' AND password='$password'");
    if($result->num_rows == 1){
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['fullname'] = $user['fullname'];
        header("Location: index.php");
        exit;
    } else {
        echo "<p>Fel användarnamn eller lösenord.</p>";
    }
}
?>
<h2>Logga in</h2>
<form method="POST">
    <input type="text" name="username" placeholder="Användarnamn" required>
    <input type="password" name="password" placeholder="Lösenord" required>
    <button type="submit">Logga in</button>
</form>
<?php include 'includes/footer.php'; ?>
