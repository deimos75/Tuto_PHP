<!-- Commentaire post -->

<!-- Cookie -->
<?php
    setcookie('pseudo', $_POST['pseudoForm'], time() + 24*3600, null, null, false, true);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Envoi</title>
    </head>
    <body>
        <?php
            //Connexion à la BDD "blog"
            try{
                $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
            }
            catch(Exception $e){
                    die('Erreur : '.$e->getMessage());
            }
        
            // Ajout d'une entrée à la table "commentaires"(requête préparée)
            $req = $bdd->prepare('INSERT INTO commentaires(id_billet, auteur, commentaire, date_commentaire) VALUES (:id_billetAdd, :pseudoAdd, :commentaireAdd, NOW())');
            if(isset($_COOKIE['pseudo'])){
                $req->execute(array(
                    'id_billetAdd' => $_POST['id_billetForm'],
                    'pseudoAdd' => $_COOKIE['pseudo'],
                    'commentaireAdd' => $_POST['commentaireForm']
                ));
            }else{
                $req->execute(array(
                    'id_billetAdd' => $_POST['id_billetForm'],
                    'pseudoAdd' => $_POST['pseudoForm'],
                    'commentaireAdd' => $_POST['commentaireForm']
                ));
            }
            header('Location: commentaires.php?id='.$_POST['id_billetForm']); // Redirection vers le formulaire
        ?>
    
    </body>
</html>