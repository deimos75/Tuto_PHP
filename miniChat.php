<!--    TP - Mini Chat
        Contient le formulaire
        Communique avec "miniChat_post.php"
-->


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mini Chat</title>
    </head>
    <body>
        <h2>Mini chat</h2>
        <form method="post" action="miniChat_post.php">
            <p>
                <label for="pseudo">Pseudo : </label><input type="text" name="pseudoForm" id="pseudo" value="" required/><br>
                <label for="message">Message : </label><input type="text" name="messageForm" id="message" required/><br><br>
                <input type="submit" value="Envoyer" />
            </p>
        </form>
        
        <button><a href="miniChat.php" style="text-decoration:none">Actualiser</a></button>
        
        <?php
            //Connexion à la BDD
            try{
                $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
            }
            catch(Exception $e){
                    die('Erreur : '.$e->getMessage());
            }
        
            // Récupère le contenu de la table
            $reponse = $bdd->query('SELECT * FROM minichat ORDER BY ID DESC LIMIT 0,10');
        
            // Affichage des entrée une par une 
            while($donnees  =$reponse->fetch())
            {
        ?>
                <p><strong><?php echo htmlspecialchars($donnees['pseudo']) ?> : 
                   </strong> <?php echo htmlspecialchars($donnees['message']) ?>
                </p>
        <?php
            }
            $reponse->closeCursor();
        ?>
    </body>
</html>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        