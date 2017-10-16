<!--    TP - Mini Chat POST
        Envoi les requêtes en BDD
-->

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
<!--
Effectuer ici la requête qui insère le message
Puis rediriger vers minichat.php comme ceci :
header('Location: miniChat.php');
-->

        <?php
            //Connexion à la BDD
            try{
                $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
            }
            catch(Exception $e){
                    die('Erreur : '.$e->getMessage());
            }
        
            // Ajout d'une entrée (requête préparée)
            $req = $bdd->prepare('INSERT INTO minichat(pseudo, message) VALUES (:pseudoAdd, :messageAdd)');
            if(isset($_COOKIE['pseudo'])){
                $req->execute(array(
                    'pseudoAdd' => $_COOKIE['pseudo'],
                    'messageAdd' => $_POST['messageForm']
                ));
            }else{
                $req->execute(array(
                    'pseudoAdd' => $_POST['pseudoForm'],
                    'messageAdd' => $_POST['messageForm']
                ));
            }
            header('Location: miniChat.php'); // Redirection
        ?>
        
        <!-- Redirection vers le mini-chat -->
        <a href="miniChat.php">Formulaire</a>
    
    </body>
</html>