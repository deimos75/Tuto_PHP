<!-- Formulaire amélioré -->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Bienvenue</title>
    </head>
    <body>
        
        <?php
            if(!isset($_POST['motDePasse']))
            {
        ?>
                <h2>Formulaire d'entrée</h2>
                <form method="post" action="formulaire2.php">
                <p>
                    <input type="password" name="motDePasse" />
                    <input type="submit" value="Valider" />
                </p>
                </form>
        <?php
            }elseif($_POST['motDePasse'] != "kangourou"){
                echo '<p>Mot de passe incorrect</p>';
                echo '<a href="formulaire2.php">Accueil</a>';
        }else{
            echo '<h1>Voici les codes secrets:</h1>';
            echo '<p><strong>CRD5-GTFT-CK65-JOPM-V29N-24G1-HH28-LLFV</strong></p>';
            echo '<a href="formulaire2.php">Accueil</a>';
        }
        ?>
    </body>
</html>