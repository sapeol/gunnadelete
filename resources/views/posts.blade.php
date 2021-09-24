<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
    <link rel="stylesheet" href="app.css">
</head>

<body>
<?php foreach ($posts as $post) : ?>
<article>

    <h1><a href="/posts/<?= $post->slug?>"> <?= $post->title; ?> </a> </h1>
    <span><?= $post->date; ?></span>
    <p><?= $post->body; ?></p>

</article>
<?php endforeach; ?>
</body>

</html>
