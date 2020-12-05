<?php
session_start();

$xml=simplexml_load_file("users/paciente.xml") or die ("Erro!");

foreach($xml->children() as $sk) {
    if ($sk->cpf == $_SESSION['cpf']) {
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
    <link rel="stylesheet" href="assets/css/pacstyles.css">
</head>

<body style="background-color:rgb(211,219,247);">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand" href="#"><strong>Perfil paciente</strong></a><button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    <li role="presentation"><a href="verifica_consulta_paciente.php">Verificar Consulta</a></li>
                    <li role="presentation"><a href="verifica_exame_paciente.php">Verficar Exame</a></li>
                    <li role="presentation"><a href="logout.php">Sair</a></li>
                </ul>
        </div>
        </div>
    </nav>
    <div class="jumbotron">
        <h1 style="text-align:center;">Bem - Vindo <?php echo $nome; ?></h1>
        <p style="text-align:center;">Veja as funções que o perfil de paciente possui.</p>
        <p></p>
    </div>
    <div class="features-boxed">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Paciente</h2>
                <p class="text-center">Aqui estão algumas coisas que o paciente pode fazer.</p>
            </div>
            <div class="row features">
                <div class="col-md-4 col-sm-6 item">
                    <div class="box"><i class="material-icons icon">mail_outline</i>
                        <h3 class="name">Verificar Consulta</h3>
                        <p class="description">Você pode verificar seu historico de consultas</p><a href="verifica_consulta_paciente.php" class="learn-more">Verificar consultas »</a></div>
                </div>
                <div class="col-md-4 col-sm-6 item" style="background-color:transparent;"></div>
                <div class="col-md-4 col-sm-6 item">
                    <div class="box"><i class="material-icons icon">markunread</i>
                        <h3 class="name">Verificar Exame</h3>
                        <p class="description">Verificar seus exames realizados</p><a href="verifica_exame_paciente.php" class="learn-more">Verificar exames »</a></div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>