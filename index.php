<!-- Index -->
<!DOCTYPE html>
<html>
    <head>
        <title>Blog - Accueil</title>
        <link rel="stylesheet" href="blog.css" />
        <meta charset="utf-8" />
    </head>

    <body>
        <?php
        //Connexion à la BDD "blog"
        include("connexionBDD.php");
        
        // On récupère tout le contenu de la table "billets"
        $requete = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS dateFR_creation FROM billets ORDER BY date_creation DESC LIMIT 0, 5');
        
        //$requete = $bdd->query('SELECT id, titre, contenu, date_creation FROM billets ORDER BY date_creation DESC LIMIT 0, 5');
        
        ?>
        
        <h1>Mon super blog</h1>
        <p>Derniers billets du blog:</p>

        <?php
        // On affiche chaque entrée une à une
        while ($donnees = $requete->fetch()){
            ?>
                <div class="news">
                    <h3><?php echo htmlspecialchars($donnees['titre']); 
                        echo '<em> le '.$donnees['dateFR_creation'].'</em>'; ?><br/></h3>
                    <p><?php echo htmlspecialchars($donnees['contenu']) ?> <br/>
                    <i><?php echo '<a href="commentaires.php?id='.$donnees['id'].'">Commentaires</a>'; ?></i>
                </div>
            <?php
        }

        $requete->closeCursor(); // Termine le traitement de la requête
        ?>
    </body>
</html>