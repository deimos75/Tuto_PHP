<!-- Secret -->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Secrets</title>
    </head>
    <body>
        <h2>Liste de mots de passes</h2>
        <p>Votre mot de passe : <?php echo htmlspecialchars($_POST['motDePasse']); ?> </p>
        
        <?php 
            // Si le mot de passe existe et est bon
            if(isset($_POST['motDePasse']) AND $_POST['motDePasse'] == "kangourou")
            {
        ?>
            <h1>Voici les codes secrets:</h1>
            <p><strong>CRD5-GTFT-CK65-JOPM-V29N-24G1-HH28-LLFV</strong></p>
        <?php    
        }
            // Mauvais mot de passe => Message d'erreur
            else{
                echo '<p>Mauvais mot de passe!!</p>';
            }
        ?>
    </body>
</html>