<?php
session_start();
if (!isset($_SESSION['AdminID'])) {
    header('Location: login.php');
    exit();
}
else {
    $msg = "Bonjour " . ' '.($_SESSION["Nom"]);;
}
require 'db.php';

$ProduitID = isset($_GET['ProduitID']) ? $_GET['ProduitID'] : null;

if ($ProduitID === null) {
    echo "Produit ProduitID is missing.";
    exit();
}

try {
    $sql = "SELECT * FROM Produits WHERE ProduitID = :ProduitID";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':ProduitID', $ProduitID, PDO::PARAM_INT);
    $stmt->execute();

    $Produit = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$Produit) {
        echo "Produit not found for ProduitID: $ProduitID";
        exit();
    }
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Produit</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url('bzz.jpg')no-repeat;
            background-size: cover;
            background-position: center;
        }
        h4,label{
            color:white;
        }
        span{
            color:green;
        }
        input{
            background:transparent;
            color:white;
        }
        .container{
            backdrop-filter: blur(5px); 
            position: relative;
            text-align: center;
            border: 2px double brown;
            padding: 30px;
            width: 600px;
        }
        form{
            position: relative;
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        h4 {
            position: absolute;
            top: 10px;
            right: 20px;
        }
    </style>
    
    <h4><span>Hello,</span> <?php echo $_SESSION['Nom']; ?> <a href="logout.php" class="btn btn-danger">Log Out</a></h4>
    <div class="container">
        
        <form action="update.php" method="POST">
            <table>
                <tr>
                    <td><label for="Nom">Nom:</label></td>
                    <td><input type="text" name="Nom" value="<?php echo htmlspecialchars($Produit['Nom']); ?>"></td>
                </tr>
                <tr>
                    <td><label for="Description">Description:</label></td>
                    <td><input type="text" name="Description" value="<?php echo htmlspecialchars($Produit['Description']); ?>"></td>
                </tr>
                <tr>
                    <td><label for="Prix">Prix:</label></td>
                    <td><input type="text" name="Prix" value="<?php echo htmlspecialchars($Produit['Prix']); ?>"></td>
                </tr>
                <tr>
                    <td><label for="Stock">Stock:</label></td>
                    <td><input type="text" name="Stock" value="<?php echo htmlspecialchars($Produit['Stock']); ?>"></td>
                </tr>
                <tr>
                    <td><label for="Categorie">Categorie:</label></td>
                    <td><input type="text" name="Categorie" value="<?php echo htmlspecialchars($Produit['Categorie']); ?>"></td>
                </tr>
                <tr>
                    <td><label for="Photo">Photo:</label></td>
                    <td><input type="text" name="Photo" value="<?php echo htmlspecialchars($Produit['Photo']); ?>"></td>
                </tr>
                <tr>
                    <td><input  type="hidden" name="ProduitID" value="<?php echo $ProduitID; ?>"></td>
                </tr>
                <tr>
                    <td>
                        <td>
                            <input type="submit"  class="btn btn-outline-warning" value="Update">
                            <a class="btn btn-outline-danger" href="delete_produit.php?ProduitID=<?php echo $Produit['ProduitID']; ?>">delete</a>
                        </td>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstraProduitdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>