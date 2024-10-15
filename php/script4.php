<?php
    $type = $_GET['type'];
    $quantite = $_GET['quantite'];
    $prix;

    if($type=='x9'){
        $prix = $quantite * 4600;
    }

    elseif($type=='dualtron'){
        $prix = $quantite * 5300;
    }

    if($type=='x9' && $quantite>=2){
        $prix = $prix * 0.95;
    }

    if($type=='dualtron' && $quantite>=3){
        $prix = $prix * 0.90;
    }

    echo 'Le prix total est: ' . $prix;
?>