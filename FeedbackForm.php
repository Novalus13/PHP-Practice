<?php
$res = null;
$txt = $_POST['text'] ?? '';

if (!empty($txt)) {
    $datetime = date(DATE_ATOM);
    $isWrote = file_put_contents(
        __DIR__ . '/../private/feedback.txt',
        $datetime . PHP_EOL . $text . PHP_EOL . PHP_EOL,
        FILE_APPEND
    ) !== false;
    if ($isWrote === false) {
        $res = 'Failed attempt, try else';
    } else {
        $res = 'Your message succesfuly sent';
    }
}
?>
<html>
<head>
    <title>Feedback</title>
</head>
<body>
<div style="text-align: center">
    <h1>Form to send feedback</h1>
    <?php if ($result !== null): ?>
    <div><b><?= $result ?></b></div><br>
    <?php endif; ?>
    <form action="feedback.php" method="post">
        <label for="text">Type your text:</label><br>
        <textarea name="text" id="text" cols="55" rows="5"></textarea><br>
        <input type="submit" value="Send">
    </form>
</div>
</body>
</html>
