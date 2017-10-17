<!-- Commentaires -->
<!DOCTYPE html>
<html>
    <head>
        <title>Blog - Commentaires</title>
        <link rel="stylesheet" href="blog.css" />
        <meta charset="utf-8" />
    </head>

    <body>
        <!-- Connexion à la BDD "blog" -->
        <?php
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
        }
        catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }
        ?>
        
        <h1>Mon super blog</h1>
        <a href="index.php">Retour à la listes des billets</a>
        <p>ID: <?php echo $_GET['id'] ?></p>
        
        
    </body>
</html>