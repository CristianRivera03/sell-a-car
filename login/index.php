<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/style-login.css">
</head>

<body>
    <form action="../app/controllers/login/ingreso.php" method="post">
        <div class="page">
        <div class="container">
            <div class="left">
                <div class="login">Ingreso</div>
            </div>
            <div class="right">
                <svg viewBox="0 0 320 300">
                    <defs>
                        <linearGradient id="linearGradient" x1="13" y1="193.5" x2="307" y2="193.5" gradientUnits="userSpaceOnUse">
                            <stop style="stop-color: #ff00ff" offset="0" />
                            <stop style="stop-color: #ff0000" offset="1" />
                        </linearGradient>
                    </defs>
                    <path id="animation-path"
                        d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143" />
                </svg>
                <div class="form">
                    <label for="email">user</label>
                    <input name="user" type="text" id="email" placeholder="ingresa tu usuario"/>
                    <label for="password">password</label>
                    <input name="password" type="password" id="password" placeholder="ingresa la contraseña"/>
                    <input type="submit" id="submit" value="Ingresar"/>
                </div>
            </div>
        </div>
    </div>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <script src="../assets/code-login.js"></script>
</body>

</html>
