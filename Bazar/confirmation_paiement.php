<?php
session_start();

if (!isset($_SESSION['CommandeID']) || !isset($_SESSION['Montant']) || !isset($_SESSION['MethodePaiement'])) {
    header('Location: index.php');
    exit();
}

$CommandeID = $_SESSION['CommandeID'];
$Montant = $_SESSION['Montant'];
$MethodePaiement = $_SESSION['MethodePaiement'];

unset($_SESSION['CommandeID']);
unset($_SESSION['Montant']);
unset($_SESSION['MethodePaiement']);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de Paiement</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 50px;
        }
        .card{
            border:2px double white;
            background: transparent;
            backdrop-filter: blur(3px); 
        }
        .card,p{
            color:white;
        }
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url('bzz.jpg')no-repeat;
            background-size: cover;
            background-position: center;
        }
        h1{
            color:white;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="text-center mb-5">Payment Confermation</h1>
    
    <div class="card">
        <div class="card-body">
            <p class="card-text">Your payment has been successfully completed. Thank you for your purchase!</p>
            <p class="card-text">Order Number :<?php echo $CommandeID; ?></p>
            <p class="card-text">Amount paid : <?php echo number_format($Montant, 2, '.', ''); ?>MAD</p>
            <p class="card-text">Payment Method :<?php echo $MethodePaiement; ?></p>
        </div>
    </div>

    <div class="text-center mt-5">
        <a href="display_Client.php" class="btn btn-outline-warning">Back to Home page</a>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>