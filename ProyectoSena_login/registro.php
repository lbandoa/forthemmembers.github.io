<?php
    require 'database.php';

    $message='';

    if(!empty($_POST['email']) && !empty($_POST["password"])){
        $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
        $statement = $conn->prepare($sql);
        $statement->bindParam(':email', $_POST['email']);
        $password= password_hash($_POST['password'], PASSWORD_BCRYPT); // linea para encriptar contraseñas -->
        $statement->bindParam(':password', $password);

        if ($statement->execute()){
            $message = 'REGISTRO EXITOSO!';
        } else {
            $message = 'REVISA TUS DATOS E INTENTA DE NUEVO';
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
    <title>Registrarse</title>

    <!-- Favicon-->
    <link rel="icon" type="assets/image/x-icon" href="assets/RNF/Logosg.jpeg" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Shadows Into Light:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="assets/css/styles.css" rel="stylesheet" />
</head>
<body id="page-top">
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
                        <a class="nav-link py-3 px-0 px-lg-3 rounded" href="login.php">Iniciar sesion</a><!--Aqui se adjunta el link del form de registro-->
                    </li> 
                </ul>
            </div> 
        </div>
    </nav>
    <!-- head-->
    <header class="masthead bg-primary text-dark text-center">
<body id="page-top">
    <div class="primary py-4 d-flex justify-content-center ">
    <div class="col-lg-4">
        <div class="card text-center borde-elegante">
            <div class="card-header text-bg-primary">
                <h5>Registro Usuario</h5>
            </div>
            
            <?php if(!empty($message)): ?>
                <p><?= $message ?></p>
            <?php endif ; ?>

            <form action="registro.php" method="post" name="FormEntrar"> <!--Formulario-->
                <div class="card-body text-bg-info">
                        <div class="primary">
                          <!--  <div class="col-lg-12">
                                <label for="" class="d-flex flex-row">Nombres</label>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" name="nombres" class="form-control control-focus" placeholder="Ingrese su nombre completo" required> 
                            </div>
                        </div>
                    <div class="primary">
                        <div class="col-lg-12">
                            <label for="" class="d-flex flex-row">Apellidos</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="apellidos" class="form-control control-focus" placeholder="Ingrese sus apellidos" required> 
                                </div>  
                        </div>
                    </div>
                    <div class="primary">
                        <div class="col-lg-12">
                            <label for="" class="d-flex flex-row">Fecha de Nacimiento</label>
                            <div class="input-group mb-3">
                                <input type="date" name="fecha" class="form-control control-focus" placeholder="DD/MM/AAAA" required>
                            </div>
                        </div>
                    </div>
                    <div class="primary">
                        <div class="col-lg-12">
                            <label for="" class="d-flex flex-row"> 
                                Documento de Identidad
                            </label>
                                <div class="input-group mb-3">
                                    <input type="number" name="documento" class="form-control control-focus" placeholder="Ingrese Documento" required>
                                    <span class="input-group-text text-bg-primary" id="basic-addon1">
                                        <i class="fa-solid fa-id-card"></i>
                                    </span>
                                </div>
                        </div>
                    </div> -->
                    <div class="primary">
                        <div class="col-lg-12">
                            <label for="email" class="d-flex flex-row">Correo electronico</label>
                                <div class="input-group mb-3">
                                    <input type="email" name="email" id="email" class="form-control control-focus" placeholder="Ingrese su correo electronico" required>
                                    <span class="input-group-text text-bg-primary" id="basic-addon1">
                                        <i class="fa-solid fa-envelope"></i>
                                    </span> 
                                </div>
                        </div>
                    </div>
                    <div class="primary">
                        <div class="col-lg-12">
                            <label for="password" class="d-flex flex-row">Contraseña</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text text-bg-primary" id="basic-addon1"><i class="fa-sharp fa-solid fa-key"></i></span>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Ingrese contraseña" aria-describedby="sizing-addon1" required>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text text-bg-primary" id="basic-addon1"><i class="fa-sharp fa-solid fa-key"></i></span>
                                <input type="password" name="confirmar_contraseña" class="form-control" placeholder="Confirmar contraseña" aria-describedby="sizing-addon1">
                            </div>
                        </div>
                    </div>
                     <div class="col-lg-12">
                        <button class="form-control btn btn-warning btn-lg btn-block" type="submit">REGISTRARSE</button>
                        <br>
                        <br>
                        <span>o <a href="registroM.php">Registrarse como médico</a></span> <!-- Se adjunta link de registro como medico -->
                     </div>
                </div>
            </form>                                                                                                                                             
        </div>   
    </div> 
    </div>       
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