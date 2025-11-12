<?php
include 'includes/db.php';
include 'includes/header.php';

$id = intval($_GET['id']);
$topic = $conn->query("SELECT topics.*, users.fullname FROM topics JOIN users ON topics.user_id = users.id WHERE topics.id=$id")->fetch_assoc();

echo "<h2>" . htmlspecialchars($topic['title']) . "</h2>";
echo "<p>Startad av " . htmlspecialchars($topic['fullname']) . "</p><hr>";

$posts = $conn->query("SELECT posts.*, users.fullname FROM posts JOIN users ON posts.user_id = users.id WHERE topic_id=$id ORDER BY posts.created_at ASC");

while($p = $posts->fetch_assoc()){
    echo "<div class='post'><p>" . nl2br(htmlspecialchars($p['content'])) . "</p><small>— " . htmlspecialchars($p['fullname']) . " (" . $p['created_at'] . ")</small></div>";
}

if(isset($_SESSION['user_id'])):
?>
<form action="new_post.php" method="POST">
    <input type="hidden" name="topic_id" value="<?= $id ?>">
    <textarea name="content" required></textarea>
    <button type="submit">Skicka svar</button>
</form>
<?php else: ?>
<p><a href="login.php">Logga in</a> för att svara.</p>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>
