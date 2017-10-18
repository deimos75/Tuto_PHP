<!-- Index -->
<!DOCTYPE html>
<html>
    <head>
        <title>Blog - Accueil</title>
        <link rel="stylesheet" href="blog.css" />
        <meta charset="utf-8" />
    </head>

    <body>
        <!-- Connexion à la BDD "blog" -->
        <?php
        try
        {   
            $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));   
        }
        catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }
         

        // On récupère tout le contenu de la table "billets"
        $requete = $bdd->query('SELECT * FROM billets ORDER BY id DESC');
        ?>
        
        <h1>Mon super blog</h1>
        <p>Derniers billets du blog:</p>

        <?php
        // On affiche chaque entrée une à une
        while ($donnees = $requete->fetch()){
            ?>
                <div class="news">
                    <h3><?php echo $donnees['titre']; 
                        echo '<i> le '.$donnees['date_creation'].'</i> ID: '.$donnees['id']; ?><br/></h3>
                    <p><?php echo $donnees['contenu'] ?> <br/>
                    <i><?php echo '<a href="commentaires.php?id='.$donnees['id'].'">Commentaires</a>'; ?></i>
                </div>
            <?php
        }

        $requete->closeCursor(); // Termine le traitement de la requête
        ?>
    </body>
</html>