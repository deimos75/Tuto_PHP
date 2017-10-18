<!-- Commentaires -->
<!DOCTYPE html>
<html>
    <head>
        <title>Blog - Commentaires</title>
        <link rel="stylesheet" href="blog.css" />
        <meta charset="utf-8" />
    </head>

    <body>
        <h1>Mon super blog</h1>
        <a href="index.php">Retour à la listes des billets</a><br>
        
        <?php         
            //Connexion à la BDD "blog"        
            include("connexionBDD.php");

            // Table "billet" en fonction de l'id
            $requeteBillets = $bdd->prepare('SELECT * FROM billets where id=:idParam');
            $requeteBillets->execute(array('idParam' => $_GET['id']));
            $donneesBillets = $requeteBillets->fetch();
        ?>
        
        <!-- Affichage du billet sélectionné -->
        <div class="news">
            <h3><?php echo $donneesBillets['titre']; 
                echo '<i> le '.$donneesBillets['date_creation'].'</i>'; ?><br/></h3>
            <p><?php echo $donneesBillets['contenu'] ?> <br/>
        </div>
        <h2>Commentaires</h2>
        <?php
            $requeteBillets->closeCursor();

            // Table "commentaires" en fonction de l'id
            $requeteCommentaires = $bdd->prepare('SELECT auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS dateFR_commentaire FROM commentaires where id_billet=:idParam ORDER BY date_commentaire');
            $requeteCommentaires->execute(array('idParam' => $_GET['id']));


            // Affichage des commentaires
            while ($donneesCommentaires = $requeteCommentaires->fetch()){
        ?>
            <p><strong><?php echo $donneesCommentaires['auteur']?></strong> le <?php echo $donneesCommentaires['dateFR_commentaire']?></p>
            <p><?php echo $donneesCommentaires['commentaire']?></p>
        <?php
            }
            $requeteCommentaires->closeCursor();
        ?>
        
        <!-- Formulaire d'ajout -->
        <h2>Postez un commentaire</h2>
        <form method="post" action="commentaires_post.php">
            <label for="pseudo">Pseudo : </label>
            <input type="text" name="pseudoForm" id="pseudo"/><br><br>
            <label for="commentaire">Commentaire : </label>
            <textarea rows="3" cols="20" name="commentaireForm" id="commentaire" required></textarea><br><br>
            <label for="id_billet" style="visibility:hidden;">Id du billet : </label>
            <input type="text" name="id_billetForm" id="id_billet" value="<?php echo $_GET['id']?>" style="visibility:hidden;"/><br>
            <input type="submit" value="Envoyer" />
        </form>

    </body>
</html>