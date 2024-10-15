<?php

require 'db.php';

try {
    

    
    $stmt = $connexion->prepare("SELECT * FROM Voitures");
    $stmt->execute();

    
    $Clients = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    
    echo 'Erreur de connexion : ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Clients</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  
</head>
<body>

        <div class="bjr">
            <?php 

                session_start();
                
                if(!isset($_SESSION["ClientID"]))
                    {
                        echo 'vous devez vous authentifier';
                        header("Refresh:2, url=login_Form.php");
                    } 

                    else  {

                $msg= "Bonjour ".$_SESSION["Nom"]." ".$_SESSION["Prenom"];
                echo $msg;
            ?>
            <form action="logout.php">
                <input type="submit" class="s2" value="Logout">
            </form>

        </div>
<br>
    <h1>Liste des Clients</h1>
    <table class="table table-striped">
            <tr>
                <th>VoitureID</th>
                <th>Marque</th>
                <th>Modele</th>
                <th>Annee</th>
                <th>Immatriculation</th>
                <th>Disponibilite</th>
                <th colspan="2">Action</th>
            </tr>
        
        
            <?php if (!empty($Clients)): 
                 foreach ($Clients as $ctl): ?>
                    <tr>
                        <td><?php echo $ctl['VoitureID']; ?></td>
                        <td><?php echo $ctl['Marque']; ?></td>
                        <td><?php echo $ctl['Modele']; ?></td>
                        <td><?php echo $ctl['Annee']; ?></td>
                        <td><?php echo $ctl['Immatriculation']; ?></td>
                        <td><?php echo $ctl['Disponibilite']; ?></td>
                        

                        <td>
                            <a href="deletectl.php?id=<?= $ctl['VoitureID'] ?>">
                        
                            <img src="img\delete.jpeg" alt="Supprimer" style="width:25px;height:25px;">
                        
                            </a>
                        </td>

                        <td>
                            <a href="updateForm.php?VoitureID=<?= $ctl['VoitureID'] ?>">
                        
                            <img src="img\update.png" alt="Modifier" style="width:25px;height:25px;">
                        
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">Aucun client trouvé.</td>
                </tr>
            <?php endif;
            ?>       
    </table>
</body>
</html>
<?php 
 }
?>