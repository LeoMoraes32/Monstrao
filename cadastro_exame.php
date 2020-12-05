<?php
session_start();

$error = false;
$sucesso = false;
if(isset($_POST['cadastrar'])) {
    $cnpj = $_SESSION['cnpj'];
    $cpf = $_POST['cpf'];
    $tipoexame = $_POST['tipoexame'];
    $resultado = $_POST['resultado'];
    $data = $_POST['data'];
    $xml=simplexml_load_file("users/exames.xml") or die ("Erro!");
    foreach($xml->children() as $sk) {
        if ($sk->cnpj == $cnpj){
            if ($sk->cpf == $cpf) {
                if ($sk->data == $data) {
                    $error = true;    
                }
            }
        }
    }

    if ($error == false){
        $add = $xml->addChild("exame"); 
        $add -> addChild("cpf", $cpf);
        $add -> addChild("cnpj", $cnpj);
        $add -> addChild("data", $data);
        $add -> addChild("tipoexame", $tipoexame);
        $add -> addChild("resultado", $resultado);

        $s = simplexml_import_dom($xml);
        $s->saveXML ('users/exames.xml');
        $sucesso = true;
        
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

<body style="background-color:rgb(211,219,247);">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand" href="home_lab.php"><strong>Perfil lab</strong></a><button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active" role="presentation"><a href="#">Adicionar Exame</a></li>
                    <li role="presentation"><a href="verifica_exame.php">Verficar Exame</a></li>
                    <li role="presentation"><a href="alterar_lab.php">Editar Perfil</a></li>
                    <li role="presentation"><a href="logout.php">Sair</a></li>
                </ul>
        </div>
        </div>
    </nav>
    <div class="row register-form">
        <div class="col-md-8 col-md-offset-2">
            <form method="post" action="" class="form-horizontal custom-form">
                <h1>Cadastrar exame</h1>
                <div class="form-group">
                    <div class="col-sm-4 label-column"><label class="control-label" for="name-input-field">CPF do paciente </label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="number" name="cpf" size="20"></div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column"><label class="control-label" for="email-input-field">Data da consulta </label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="text" name="data" size="40"></div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column"><label class="control-label" for="pawssword-input-field">Tipo do exame </label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="text" name="tipoexame" size="40"></div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column"><label class="control-label" for="repeat-pawssword-input-field">Resultado </label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="text" name="resultado" size="100"></div>
                </div>
                <input class="btn btn-default submit-button" type="submit" value="cadastrar" name="cadastrar"/>
                <?php
                if ($error) {
                    echo '<p> Exame com esse paciente ja cadastrada neste dia </p>' ; 
                }
                else {
                    if ($sucesso == true) {
                        echo 'Cadastrado com sucesso!';
                    }
                }
                ?>
            
            </form>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>