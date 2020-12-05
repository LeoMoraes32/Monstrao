<?php
session_start();
$xml=simplexml_load_file("users/medicos.xml") or die ("Erro!");

foreach($xml->children() as $sk) {
    if ($sk->crm == $_SESSION['crm']) {
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
    <link rel="stylesheet" href="assets/css/medstyles.css">
</head>

<body style="background-color:	springgreen;">
    <nav class="navbar navbar-default" class="navbar navbar-default" style="border:green; border-radius:0; background-color:green">
        <div class="container-fluid class=" style="border:green; border-radius:0; background-color:green">
            <div class="navbar-header" style="border:green; border-radius:0; background-color:green" ><a class="navbar-brand" style="color:white; font-weight: bold;" href="home_medico.php">Perfil Medico</a><button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    <li role="presentation"><a href="cadastro_consulta.php" style="color:white; font-weight: bold;">Adicionar Consulta</a></li>
                    <li role="presentation"><a href="verifica_consulta.php" style="color:white; font-weight: bold;">Verficar Consulta</a></li>
                    <li role="presentation"><a href="alterar_medico.php" style="color:white; font-weight: bold;">Editar Perfil</a></li>
                    <li role="presentation"><a href="logout.php" style="color:white; font-weight: bold;">Sair</a></li>
                </ul>
        </div>
        </div>
    </nav>
    <div class="jumbotron">
        <h1 style="text-align:center; color:black">Bem - Vindo <?php echo $nome; ?></h1>
        <p style="text-align:center; color:black">Veja as funções que o perfil de Médico possui.</p>
        <p></p>
    </div>
    <div class="features-boxed">
        <div class="container">
            <div class="intro">
                <h2 class="text-center" style="color:black;">Médico</h2>
                <p class="text-center" style="color:black;">Aqui estão algumas coisas que o Medico pode fazer.</p>
            </div>
            <div class="row features">
                <div class="col-md-4 col-sm-6 item">
                    <div class="box"><i class="glyphicon glyphicon-plus icon"></i>
                        <h3 class="name">Adicionar Consulta</h3>
                        <p class="description">Você pode adicionar suas consultas</p><a href="cadastro_consulta.php" class="learn-more">Cadastrar consultas</a></div>
                </div>
                <div class="col-md-4 col-sm-6 item">
                    <div class="box"><i class="material-icons icon">list</i>
                        <h3 class="name">Verificar Consulta</h3>
                        <p class="description">Aqui você pode verificar as consultas existentes de um certo paciente</p><a href="vefica_consulta.php" class="learn-more">Verificar consultas</a></div>
                </div>
                <div class="col-md-4 col-sm-6 item">
                    <div class="box"><i class="material-icons icon">info_outline</i>
                        <h3 class="name">Editar Perfil</h3>
                        <p class="description">Editar suas informações</p><a href="alterar_medico.php" class="learn-more">Editar seu perfil</a></div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>