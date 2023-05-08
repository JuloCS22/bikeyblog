<?php

/* Appel à la database */
$host = 'containers-us-west-128.railway.app';
$port = '5593';
$db   = 'railway';
$user = 'root';
$pass = 'AwIXPCNzF8VGIaKL6TIA';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
$pdo = new PDO($dsn, $user, $pass);

/* Récupération des données */
try {
    $sql = "SELECT * FROM bikey" ;
    if ($stmt = $pdo->prepare($sql)) {
        $stmt->execute();
        $results = $stmt->fetchAll();
    } else {
        echo "Il y a un souci avec le statement" ;
    }
} catch (Exception $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
}

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>bikeyblog</title>
</head>
<body>
    <nav>
        <h1>bikeyblog</h1>
        <a href="mailto:julien.cormont@gmail.com">contact</a>
    </nav>

    <main>

<?php

$articleNumber = count($results);
for ($i = $articleNumber-1; $i >= 0; $i--) {
    echo " 
<article class='";
    if ($i % 2 === 0) {
        echo 'articleStart';
    } else {
        echo 'articleEnd';
    };
    echo "'>
    <img src='".$results[$i]['image']."' alt='bike picture'>
    <div class='textArticleStart'>
    <p class='subtitle'>------ ".$results[$i]['date']." ------</p> ";

        if ($i % 2 === 0) {
            echo "
    <h2 class='start'>".$results[$i]['title']."</h2> ";
        } else {
            echo "
    <h2 class='end'>".$results[$i]['title']."</h2> ";
        };

        echo "
    <p class='description'>".$results[$i]['description']."</p>
    </div>
</article>";
}

?>

    </main>

    <footer>

        <a href="mailto:julien.cormont@gmail.com" target="_blank"><img src="./img/mail.png" alt="logo email" class="socials"></a>
        <a href="https://www.instagram.com/julo.c.s/" target="_blank"><img src="./img/insta.png" alt="logo insta" class="socials"></a>

    </footer>
    <script src="script.js"></script>
</body>
</html>