<?php
require 'db.php';
$requiredFields = ['nom', 'prenom', 'date_naissance', 'adresse', 'salaire', 'date_embauche', 'departement', 'id'];
foreach ($requiredFields as $field) {
    if (!isset($_POST[$field]) || empty($_POST[$field])) {
        echo "Veuillez remplir tous les champs du formulaire.";
        exit();
    }
}
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$date_naissance = $_POST['date_naissance'];
$adresse = $_POST['adresse'];
$salaire = $_POST['salaire'];
$date_embauche = $_POST['date_embauche'];
$departement = $_POST['departement'];
$id = $_POST['id'];
try {
    $sql = "UPDATE employes SET nom=:nom, prenom=:prenom, date_naissance=:date_naissance, adresse=:adresse, salaire=:salaire, date_embauche=:date_embauche, departement=:departement WHERE id=:id";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':date_naissance', $date_naissance);
    $stmt->bindParam(':adresse', $adresse);
    $stmt->bindParam(':salaire', $salaire);
    $stmt->bindParam(':date_embauche', $date_embauche);
    $stmt->bindParam(':departement', $departement);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo('L\'employé a été modifié avec succès');
        header("Refresh:3;url=displayemployer.php?id=$id");
        exit();
    } else {
        echo('Aucun changement n\'a été apporté à l\'employé');
        header("Refresh:3;url=displayemployer.php?id=$id");

    }
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    exit();
}
?>