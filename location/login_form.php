
<?php


session_start();

if(isset($_SESSION["ClientID"]))
{
    echo 'vous etes déja authentifié';
    header("Refresh:2, url=display_car.php");
} 


?>


<html>
    <head>
        <title>Login Page</title>
        
    </head>  
<body>
        <br>
        <br>

        <form method="post" action="login.php" >
            
                <table>
                    <tr>
                        <td> <label >Email:</label></td>
                        <td><input type="text" name="email" > </td>
                    </tr>
                    <tr>
                        <td><label >Password:</label>  </td>
                        <td> <input type="password" name="pass" > </td>
                    </tr>
                    
                    <tr>
                        <td> </td>
                        <td> <button type="submit" >Login</button></td>
                    </tr>
                </table>
        </form>
    </body>
</html>