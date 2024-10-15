
<?php 
session_start();
require 'db.php';
$pc = $_GET['idPC'];

$stmt = $connexion->prepare("DELETE FROM PC WHERE idPC=:idPC");
$stmt->bindParam(':idPC', $pc);
$stmt->execute();

echo 'le PC est supprimé';
header("Refresh:2 url=display_card_pc.php");
exit;
?>