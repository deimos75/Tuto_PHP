<!-- index -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Blog - Accueil</title>
        <link href="blog.css" rel="stylesheet"/>
    </head>
    <body>
        <?php
        // Connexion à MySQL
        try{
            // Objet de la requête
            $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 
            'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }catch(Exception $e){
            die('Erreur : ' . $e->getMessage());
        }
        ?>
        
        
        <h1>Mon super blog !</h1>
        <p>Derniers billets du blog</p>
        
        <div class="news">
            <h3>Titre</h3>
            <p> 
                Paragraphe<br>
                <i><a href="commentaires.php">Commentaire</a></i>
            </p>
        </div>
        
    </body>
</html>



<?php
        // Connexion à MySQL
        try{
            // Objet de la requête
            $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 
            'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }catch(Exception $e){
            die('Erreur : ' . $e->getMessage());
        }
        
        // On récupère le contenu de la table jeux_video
        $reponse = $bdd->query('SELECT * FROM jeux_video');
        // Affiche les noms
        $reponse = $bdd->query('SELECT nom FROM jeux_video');
        while ($donnees = $reponse->fetch()){
            echo $donnees['nom'] . '<br />';
        }
        
        $reponse->closeCursor(); // Termine le traitement de la requête
?>        
        