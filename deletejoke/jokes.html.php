<?php foreach ($jokes as $joke): ?>
<form action="?deletejoke" method="post">
<blockquote>
<p>
<?php echo htmlspecialchars($joke['text'], ENT_QUOTES,
'UTF-8'); ?>
<input type="hidden" name="id" value="<?php
echo $joke['id']; ?>">
<input type="submit" value="Delete">
</p>
</blockquote>
</form>
<?php endforeach; ?>
