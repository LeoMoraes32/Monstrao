<?php
session_start();
$xml=simplexml_load_file("users/labs.xml") or die ("Erro!");


foreach($xml->children() as $sk) {
    if ($sk->cnpj == $_SESSION['cnpj']) {
        $nome = $sk->nome;
    }
}

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
    <link rel="stylesheet" href="assets/css/Newsletter-Subscription-Form.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="assets/css/labstyles.css">
</head>

<body style="background-color: springgreen;">
    <nav class="navbar navbar-default" style="border:green; border-radius:0; background-color:green">
        <div class="container-fluid" style="border:green; border-radius:0; background-color:green">
            <div class="navbar-header" style="border:green; border-radius:0; background-color:green"><a class="navbar-brand" style="color:white; font-weight:bold;" href="home_lab.php"><strong>Perfil lab</strong></a><button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    <li role="presentation"><a style="color:white; font-weight:bold;" href="cadastro_exame.php">Adicionar Exame</a></li>
                    <li role="presentation"><a style="color:white; font-weight:bold;"href="verifica_exame.php">Verficar Exame</a></li>
                    <li role="presentation"><a style="color:white; font-weight:bold;"href="alterar_lab.php">Editar Perfil</a></li>
                    <li role="presentation"><a style="color:white; font-weight:bold;" href="logout.php">Sair</a></li>
                </ul>
        </div>
        </div>
    </nav>
    <div class="jumbotron">
        <h1 style="text-align:center;">Bem - Vindo Laboratorio <?php echo $nome; ?> </h1>
        <p style="text-align:center;">Veja as funções que o perfil de Laboratório possui.</p>
        <p></p>
    </div>
    <div class="features-boxed">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Laboratório</h2>
                <p class="text-center">Aqui estão algumas coisas que o laboratório pode fazer.</p>
            </div>
            <div class="row features">
                <div class="col-md-4 col-sm-6 item">
                    <div class="box"><i class="glyphicon glyphicon-heart icon"></i>
                        <h3 class="name">Adicionar Exame</h3>
                        <p class="description">Você pode adicionar seus exames</p><a href="cadastro_exame.php" class="learn-more">Cadastrar exames</a></div>
                </div>
                <div class="col-md-4 col-sm-6 item">
                    <div class="box"><i class="material-icons icon">list</i>
                        <h3 class="name">Verificar Exame</h3>
                        <p class="description">Aqui você pode verificar os exames existentes de um certo paciente</p><a href="verifica_exame.php" class="learn-more">Verificar exames</a></div>
                </div>
                <div class="col-md-4 col-sm-6 item">
                    <div class="box"><i class="material-icons icon">info_outline</i>
                        <h3 class="name">Editar Perfil</h3>
                        <p class="description">Editar suas informações</p><a href="alterar_lab.php" class="learn-more">Editar seu perfil</a></div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>