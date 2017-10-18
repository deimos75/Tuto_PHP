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
        <a href="index.php">Retour à la listes des billets</a><br>
        <?php         
            try
                {   
                    $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));   
                }
                catch (Exception $e)
                {
                        die('Erreur : ' . $e->getMessage());
                }
         
                
                // Table "billet" en fonction de l'id
                $requeteBillets = $bdd->prepare('SELECT * FROM billets where id=:idParam');
                $requeteBillets->execute(array('idParam' => $_GET['id']));
                $donneesBillets = $requeteBillets->fetch();
                
        
                // Table "commentaires" en fonction de l'id
                $requeteCommentaires = $bdd->prepare('SELECT * FROM commentaires where id_billet=:idParam ORDER BY date_commentaire');
                $requeteCommentaires->execute(array('idParam' => $_GET['id']));
        ?>
        
                <!-- Affichage du billet sélectionné -->
                <div class="news">
                    <h3><?php echo $donneesBillets['titre']; 
                        echo '<i> le '.$donneesBillets['date_creation'].'</i>'; ?><br/></h3>
                    <p><?php echo $donneesBillets['contenu'] ?> <br/>
                </div>
                <h1>Commentaires</h1>
            <?php
                // Affichage des commentaires
                while ($donneesCommentaires = $requeteCommentaires->fetch()){
            ?>
                    <p><strong><?php echo $donneesCommentaires['auteur']?></strong> le <?php echo $donneesCommentaires['date_commentaire']?></p>
                    <p><?php echo $donneesCommentaires['commentaire']?></p>
            <?php
                }
            ?>
    </body>
</html>