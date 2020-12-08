<?php
session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>perfil admin</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/material-icons.min.css">
    <link rel="stylesheet" href="assets/css/Features-Boxed.css">
    <link rel="stylesheet" href="assets/css/Features-Clean.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="assets/css/adminstyles.css">
</head>

<body style="background-color:springgreen;">
    <nav class="navbar navbar-default" style="border:green; border-radius:0; background-color:green">
        <div class="container-fluid" style="border:green; border-radius:0; background-color:green">
            <div class="navbar-header"><a class="navbar-brand" style="border:green; border-radius:0; background-color:green"  href="#"><strong style="color:white;font-weight:bold;">Perfil Admin</strong></a><button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    <li role="presentation"><a style="color:white;font-weight:bold;" href="cadastro_medico.php">Cadastrar Medico</a></li>
                    <li role="presentation"><a style="color:white;font-weight:bold;" href="cadastro_lab.php">Cadastrar Lab</a></li>
                    <li role="presentation"><a style="color:white;font-weight:bold;" href="cadastro_paciente.php">Cadastrar Paciente</a></li>
                    <li role="presentation"><a style="color:white;font-weight:bold;" href="logout.php">Sair</a></li>
                </ul>
        </div>
        </div>
    </nav>
    <div class="jumbotron">
        <h1 style="text-align:center;">Bem - Vindo <?php echo $_SESSION['usuario']; ?></h1>
        <p style="text-align:center;">Veja as funções que o perfil de administrador possui.</p>
        <p></p>
    </div>
    <div class="features-boxed">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Administrador</h2>
                <p class="text-center">Aqui estão algumas coisas que o administrador pode fazer.</p>
            </div>
            <div class="row features">
                <div class="col-md-4 col-sm-6 item">
                    <div class="box"><i class="glyphicon glyphicon-briefcase icon"></i>
                        <h3 class="name">Cadastrar Medicos</h3>
                        <p class="description">Você pode cadastrar uma quantidade ilimitada de medicos por aqui.</p><a href="cadastro_medico.php" class="learn-more">Cadastrar Medicos</a></div>
                </div>
                <div class="col-md-4 col-sm-6 item">
                    <div class="box"><i class="material-icons icon">local_hospital</i>
                        <h3 class="name">Cadastrar Laboratorio</h3>
                        <p class="description">Aqui você pode cadastrar novos laboratorios</p><a href="cadastro_lab.php" class="learn-more">Cadastrar Laboratorio</a></div>
                </div>
                <div class="col-md-4 col-sm-6 item">
                    <div class="box"><i class="material-icons icon">healing</i>
                        <h3 class="name">Cadastrar Pacientes</h3>
                        <p class="description">Cadastre todos os pacientes.</p><a href="cadastro_paciente.php" class="learn-more">Cadastrar Pacientes</a></div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>