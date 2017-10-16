<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Connexion BDD</title>
    </head>
    <body>
        <h1>JEUX VIDEOS</h1>
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
            
        // On affiche chaque entrée une à une
        /*while ($donnees = $reponse->fetch()){
        ?>
            <p>
            <strong>Jeu</strong> : <?php echo $donnees['nom']; ?><br />
            Le possesseur de ce jeu est : <?php echo $donnees['possesseur']; ?>, et il le vend à <?php echo $donnees['prix']; ?> euros !<br />

            Ce jeu fonctionne sur <?php echo $donnees['console']; ?> et on peut y jouer à <?php echo $donnees['nbre_joueurs_max']; ?> au maximum<br />

            <?php echo $donnees['possesseur']; ?> a laissé ces commentaires sur <?php echo $donnees['nom']; ?> : <em><?php echo $donnees['commentaires']; ?></em>
           </p>
        <?php
        }
        */
        
        // Affiche les noms
        $reponse = $bdd->query('SELECT nom FROM jeux_video');
        while ($donnees = $reponse->fetch()){
            echo $donnees['nom'] . '<br />';
        }
        
        $reponse->closeCursor(); // Termine le traitement de la requête
        ?>        
        
    </body>
</html>