<?php

    $quantite = $_POST['quantite'];
    $type = $_POST['type'];
    $prix;

    if($type=='i3'){
        $prix = $quantite * 2500;
    }

    if($type=='i5'){
        $prix = $quantite * 3200;
    }

    if($type=='i7'){
        $prix = $quantite * 4200;
    }

    if($quantite>6){
        $prix = $prix * 0.95;
    }
    else{
        $prix = $prix;
    }

    echo 'prix total = ' . $prix;
    
?>