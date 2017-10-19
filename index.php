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
        
        // On compte le nombre de billets
        $requeteNbBillet = $bdd->query('SELECT COUNT(*) AS nb_billets FROM billets');
        $nbBillets = $requeteNbBillet->fetch();
        $N_billets = $nbBillets[0];
        
        // Nombre de page (5 billets par page)
        $N_pages = ceil($N_billets / 5);
        
        // On récupère tout le contenu de la table "billets"
        // La requête doit s'adapter au numéro de page
        if(isset($_GET['page'])){
            $NumPage = $_GET['page'];    
        }else{
            $NumPage = 1;
        }
        $limitInf = $NumPage - 1;
        $limitSup = $limitInf + 5;
        echo 'NumPage : '.$NumPage;
        echo '<br>limitInf : '.$limitInf;
        echo '<br>limitSup : '.$limitSup;
           
           
        $requete = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS dateFR_creation FROM billets ORDER BY date_creation DESC LIMIT 0, 5');
        ?>
        
        <h1>Mon super blog</h1>
        <p>Derniers billets du blog:</p>
        <p>Il y a au total <?php echo $N_billets; ?> billets et <?php echo $N_pages ?> pages.</p>
        
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
        <p>Page : <a href="index.php?page=1">1</a> </p>
        
    </body>
</html>