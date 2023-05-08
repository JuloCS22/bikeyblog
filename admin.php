<?php


?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>BikeyBlog</title>
</head>
<body>
<nav>
    <h1>BikeyBlog</h1>
</nav>

<main>

    <form action="post.php" method="post" enctype="multipart/form-data">

        <label for="articleTitle">Titre</label>
        <input type="text" id="articleTitle" name="articleTitle">

        <label for="articleDescription">Description</label>
        <input type="text" name="articleDescription" id="articleDescription">

        <label for="articleImage">Image</label>
        <input type="file" name="articleImage" id="articleImage" accept="image/jpeg, image/png">

        <button type="submit" id="submit">Envoyer</button>

    </form>

</main>

<script src="script.js"></script>
</body>
</html>