<?php
    session_start();

    if (isset($_SESSION['user_id'])) {
        header('Location: /php-inicioSesion');
    }


    require 'database.php';

    if(isset($_SESSION['user_id'])){
        $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
        $records->bindParam(':id', $_SESSION['user_id']);
        $results = $records->fetch(PDO::FETCH_ASSOC); 

        $user = null;

        if(count($results) > 0) {
            $user = $results;

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
        <title>Usuario</title>
        
        <!-- Favicon-->
        <link rel="icon" type="assets/image/x-icon" href="assets/RNF/Logosg.jpeg" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Shadows Into Light:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="assets/css/styles.css" rel="stylesheet" />
    </head>


    <?php if(!empty($user)):?>
        <br> Bienvenido. <?= $user['email']?> 
        <br> Eres un pendej, te logueaste
        <a href="cerrarSesion.php">Porque ya no estoy aqui, mori, me fui</a>
    <?php else: ?>
        <h1>Valiste monda, traga chele</h1>
        <a href="postlogin.php">logg</a>
        <!--<a href="registro.php">deslogg</a>-->
    <?php endif; ?> 
    <body id="page-top">
       <!-- Navigation-->
       <nav class="navbar navbar-expand-lg bg-secondary text-caveat fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="index.php">FOR THEM MEMBER'S</a>
            <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="index.php">Cerrar de sesion</a></li>
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
                    <h5>Datos de la Mascota</h5>
                </div>
                <form action="" method="post" name="FormEntrar">
                    <div class="card-body text-bg-info">
                        <div class="primary">
                            <div class="col-lg-12">
                                <label for="Username" class="d-flex flex-row mb-2" >Nombre de la Mascota</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text text-bg-primary" id="basic-addon1"><i class="fa-sharp fa-solid fa-user-nurse"></i></span>
				                    <input type="text" class="form-control" name="name" placeholder="Nombre de la mascota" aria-describedby="sizing-addon1" required>
                                </div>
                            </div>
                        </div>
                        <div class="primary">
                            <div class="col-lg-12">
                                <label for="Username" class="d-flex flex-row mb-2" >Edad</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text text-bg-primary" id="basic-addon1"><i class="fa-sharp fa-solid fa-user-nurse"></i></span>
				                    <input type="number" class="form-control" name="years" placeholder="edad"  aria-describedby="sizing-addon1" required>
                                </div>
                            </div>
                        </div>
                        <div class="primary">
                            <div class="col-lg-12">
                                <label for="Username" class="d-flex flex-row mb-2" >Raza(Tipo de animal)</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text text-bg-primary" id="basic-addon1"><i class="fa-sharp fa-solid fa-user-nurse"></i></span>
				                    <input type="text" class="form-control" name="raza" placeholder="Raza de la mascota" aria-describedby="sizing-addon1" required>
                                </div>
                            </div>
                        </div>
                        <div class="primary">
                            <div class="col-lg-12">
                                <label for="Username" class="d-flex flex-row mb-2" >Sexo</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text text-bg-primary" id="basic-addon1"><i class="fa-sharp fa-solid fa-user-nurse"></i></span>
				                    <input type="text" class="form-control" name="sexo" placeholder="ingrese en sexo de la mascota en letras" aria-describedby="sizing-addon1" required>
                                </div>
                            </div>
                        </div>
                            <textarea class="form-control" id="message" type="text" placeholder="Ingrese los sintomas de su mascota aqui." style="height: 10rem" data-sb-validations="required"></textarea>
                            <br>
                        <div class="primary">
                            <div class="col-lg-12">
                                <button class="form-control btn btn-warning btn-lg btn-block" id="IngresoLog" type="submit">Enviar Informacion</button>
                            </div>
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