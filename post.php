<?php
/* Gestion des données d'articles */

$dateOfToday = date('y-m-d');
$articleTitle = $_POST['articleTitle'];
$articleDescription = $_POST['articleDescription'];
$antiSlashArticleTitre = addslashes($articleTitle);
$antiSlashArticleDescription = addslashes($articleDescription);


/* Gestion de l'image */
$tmpName = $_FILES['articleImage']['tmp_name'];
$name = $_FILES['articleImage']['name'];
$size = $_FILES['articleImage']['size'];
$error = $_FILES['articleImage']['error'];
move_uploaded_file($tmpName, './img/'.$name);
$image_directory = './img/'.$name;


/* Appel à la database */
$host = 'containers-us-west-128.railway.app';
$port = '5593';
$db   = 'railway';
$user = 'root';
$pass = 'AwIXPCNzF8VGIaKL6TIA';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
$pdo = new PDO($dsn, $user, $pass);


/* Mise en ligne des données */
try {
    $sql = "INSERT INTO bikey (date, title, description, image) 
VALUES ('$dateOfToday', '$antiSlashArticleTitre', '$antiSlashArticleDescription', '$image_directory')" ;
    if ($stmt = $pdo->prepare($sql)) {
        echo "C'est okay";
        $stmt->execute();
    } else {
        echo "Il y a un souci avec le statement" ;
    }
} catch (Exception $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
}

?>



<h1>Envoi réussi pour ton article : "<?php echo $articleTitle; ?>" !</h1>
<p>Clique <a href="index.php">ICI</a> pour retourner sur la page d'accueil au besoin</p>

