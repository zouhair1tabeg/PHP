<html>
<head>
    <title>Login Page</title>
</head>  
<body>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url('bz.webp') no-repeat;
            background-size: cover;
            background-position: center;
        }
        h1 {
            color: white;
        }
        h4 {
            color: white;
            top: 10px;
            position: relative;
        }
        input {
            background: transparent;
            border: 2px double gold;
        }
        .bn5 {
            background: gold;
            border: none;
            outline: none;
            border-radius: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            cursor: pointer;
            font-size: 16px;
            color: #333;
            font-weight: 600;
            padding: 0.6em 2em;
            border: none;
            outline: none;
            color: rgb(255, 255, 255);
            background: #111;
            cursor: pointer;
            position: relative;
            z-index: 0;
            border-radius: 10px;
        }
        .bn5:before {
            content: "";
            background: linear-gradient(
                45deg,
                #ff0000,
                #ff7300,
                #fffb00,
                #48ff00,
                #00ffd5,
                #002bff,
                #7a00ff,
                #ff00c8,
                #ff0000
            );
            position: absolute;
            top: -2px;
            left: -2px;
            background-size: 400%;
            z-index: -1;
            filter: blur(5px);
            width: calc(100% + 4px);
            height: calc(100% + 4px);
            animation: glowingbn5 20s linear infinite;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
            border-radius: 10px;
        }
        @keyframes glowingbn5 {
            0% {
                background-position: 0 0;
            }
            50% {
                background-position: 400% 0;
            }
            100% {
                background-position: 0 0;
            }
        }
        .bn5:active {
            color: #000;
        }
        .bn5:active:after {
            background: transparent;
        }
        .bn5:hover:before {
            opacity: 1;
        }
        .bn5:after {
            z-index: -1;
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            background: gold;
            left: 0;
            top: 0;
            border-radius: 20px;
        }
        a {
            color: white;
            padding: 20px;
        }
        #a1 {
            color: #DDBEA9;
        }
        #a2 {
            color: #FFE8D6;
        }
        .d1 {
            border: 2px solid black;
            border-radius: 10px;
            padding: 50px;
            backdrop-filter: blur(2px);
        }
    </style>
    <br>
    <br>
    <div class="d1">
        <form method="post" action="login_Client.php" onsubmit="return validateForm()">
            <table>
                <h1>Welcome to NAZO Bazaar</h1>
                <tr>
                    <td><h4>Email:</h4></td>
                    <td><input type="text" name="email" id="email"></td>
                    <td><label id="n1"></label></td>
                </tr>
                <tr>
                    <td><h4>Password:</h4></td>
                    <td><input type="password" name="pass" id="password"></td>
                    <td><label id="n2"></label></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit" class="bn5">Login</button></td>
                </tr>
                <tr>
                    <td><a id="a1" href="creer_Compte.html">Creer un Compte</a></td>
                    <td><a id="a2" href="login_Form_Admin.php">Login Admin</a></td>
                </tr>
            </table>
        </form>
    </div>
    <script>
        function validateForm() {
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
            if (email == "") {
                alert("Email must be filled out");
                return false;
            }
            if (password == "") {
                alert("Password must be filled out");
                return false;
            }
            return true;
        }
    </script>
    <script src="script.js"></script>
</body>
</html>