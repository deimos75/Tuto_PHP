<!-- Index -->


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
            $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
        }
        catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }


        // On récupère tout le contenu de la table "billets"
        $reponse = $bdd->query('SELECT * FROM billets ORDER BY titre DESC');
        //$reponseContenu = $bdd->query('SELECT contenu FROM billets ORDER BY contenu DESC');
        ?>
        
        <h1>Mon super blog</h1>
        <p>Derniers billets du blog:</p>

        <?php
        // On affiche chaque entrée une à une
        while ($donnees = $reponse->fetch()){
            ?>
                <div class="news">
                    <h3><?php echo $donnees['titre']; 
                        echo '<i> le '.$donnees['date_creation'].'</i>';?><br/></h3>
                    <p><?php echo $donnees['contenu'] ?> <br/>
                    <i><a href="commentaires.php">Commentaires</a></i>
                    </p>
                </div>
            <?php
        }

        $reponse->closeCursor(); // Termine le traitement de la requête
        ?>
    </body>
</html>