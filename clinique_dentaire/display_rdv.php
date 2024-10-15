<?php 

    session_start();
    
    if(!isset($_SESSION["patient_id"]))
        {
            echo 'vous devez vous authentifier';
            header("Refresh:5, url=loginForm.php");
        } 

        else  {

    $msg= "Bonjour ".$_SESSION["first_name"]." ".$_SESSION["last_name"];
   
    }
?>
<h1><?php echo $msg?></h1>
<form action="logout.php">
                        
                        <input type="submit" class="s2" value="Logout">
        </form>
<?php
require 'db.php';
try{
    $stmt = $connexion->prepare("SELECT appointments.appointment_date, appointments.dentist_id, dentists.first_name,dentists.last_name, appointments.status FROM appointments JOIN dentists ON appointments.dentist_id = dentists.dentist_id");    $stmt->execute();

    $patients = $stmt->fetchAll(PDO::FETCH_ASSOC);

}catch (PDOException $e) {
    
    echo 'Erreur de connexion : ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Vendeurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  
</head>
<body>
    <h1>VOS RDV</h1>
    <table class="table table-striped">
        <tr>
            <th>date</td>
            <th>dentist_name</td>
            <th>statuts</td>
        </tr>
    

    <?php if (!empty($patients)):
    foreach($patients as $patient):?>

    <tr>
        <td><?php echo $patient['appointment_date'];?></td>
        <td><?php echo $patient['first_name'];?> <?php echo $patient['last_name'];?></td>
        
        <td><?php echo $patient['status'];?></td>
    </tr>
    <?php endforeach; ?>
    <?php else: ?>
                <tr>
                    <td colspan="6">Aucun vendeur trouvé.</td>
                </tr>
    <?php endif; ?>

    </table>
   
    

</body>
</html>