<?php

    session_start();

    if (isset($_SESSION['user_id'])) {
        header('Location: /php-postlogin');
    }
    require 'database.php';

    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
        $records->bindParam(':email', $_POST['email']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $message = '';

        if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
        $_SESSION['user_id'] = $results['id'];
        header("Location: /php-postlogin");
        } else {
            $message = 'Lo sentimos, el usuario o contraseña no son correctos';
        }
    }

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Inicio de sesión usuario</title>
        
        <!--Logo de pestaña en la web-->
        <link rel="icon" type="assets/image/x-icon" href="assets/RNF/Logosg.jpeg" /> 
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!--Tipos de letras y tamaños-->
        <link href="https://fonts.googleapis.com/css?family=Shadows Into Light:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="assets/css/styles.css" rel="stylesheet" />
    </head>
<body id="page-top">
    <!-- Barra de navegacion-->
        <nav class="navbar navbar-expand-lg bg-secondary text-caveat fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="index.php">FOR THEM MEMBER'S</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded" href="registro.php">Registro</a><!--Aqui se adjunta el link del form de registro-->
                        </li> 
                    </ul>
                </div>
            </div>
        </nav>
    <!-- Masthead-->
    <header class="masthead bg-primary text-dark text-center">
    <body id="page-top">
    <div class="primary py-4 d-flex justify-content-center ">
        <div class="col-lg-4">
            <div class="card text-center borde-elegante">
                <div class="card-header text-bg-primary">
                    <h5>Inicio de sesion</h5>
                </div>
                
                <?php if(!empty($message)): ?>
                    <p><?= $message ?></p>
                <?php endif ; ?>

                <form action="postlogin.php" method="post" name="FormEntrar">
                    <div class="card-body text-bg-info">
                        <div class="primary">
                            <div class="col-lg-12">
                                <label for="email" class="d-flex flex-row mb-2" >Ingrese Usuario</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text text-bg-primary" id="basic-addon1"><i class="fa-sharp fa-solid fa-user"></i></span>
				                    <input type="email" class="form-control" name="email" id="email" placeholder="Correo electronico" aria-describedby="sizing-addon1" required>
                                </div>
                            </div>
                        </div>
                        <div class="primary">
                            <div class="col-lg-12">
                                <label for="password" class="d-flex flex-row">Contraseña</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text text-bg-primary" id="basic-addon1"><i class="fa-sharp fa-solid fa-key"></i></span>
				                    <input type="password" name="password" id="password" class="form-control" placeholder="******" aria-describedby="sizing-addon1" required>
                                </div>
                            </div>
                        </div>
                        <div class="primary">
                            <div class="col-lg-12">
                                <button href= "postlogin.php" class="form-control btn btn-warning btn-lg btn-block" type="submit">Entrar</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="Recuperarcontra"><a href="">Olvidaste tu contraseña?</a></div>
                    </div> 
                    </div>
                </form>
            </div>
        </div>
    </div>
    A form field has an id or name attribute that the browser's autofill recognizes. However, it doesn't have an autocomplete attribute assigned. This might prevent the browser from correctly autofilling the form.
To fix this issue, provide an autocomplete attribute.    
                
                <!-- Bootstrap core JS-->  
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
                <!-- Core theme JS-->
                <script src="js/scripts.js"></script>
                <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
                <!-- * *                               SB Forms JS                               * *-->
                <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
                <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
                <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        
</body>
</html>