<?php
include 'includes/db.php';
include 'includes/header.php';

$topics = $conn->query("SELECT topics.*, users.fullname FROM topics JOIN users ON topics.user_id = users.id ORDER BY topics.created_at DESC");
?>

<h2>Diskussionstrådar</h2>

<?php while($t = $topics->fetch_assoc()): ?>
<div class="topic">
    <a href="topic.php?id=<?= $t['id'] ?>"><strong><?= htmlspecialchars($t['title']) ?></strong></a>
    <p>Skapad av: <?= htmlspecialchars($t['fullname']) ?> — <?= $t['created_at'] ?></p>
</div>
<?php endwhile; ?>

<?php include 'includes/footer.php'; ?>
