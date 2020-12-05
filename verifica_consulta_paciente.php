<?php
session_start();
error_reporting(0);

$achou = false;
if(isset($_POST['verifica'])) {
    $cpfnovo = $_POST['cpfnovo'];
    $cpf = $_SESSION['cpf'];

    $xml=simplexml_load_file("users/consultas.xml") or die ("Erro!");

    foreach($xml->children() as $sk) {
        if ($cpfnovo == $sk->cpf){
            $achou=true;
        }
    }
    
    if (!$achou) {
        $error = true; 
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
    <link rel="stylesheet" href="assets/css/estilotabela.css">
</head>

<body style="background-color:rgb(211,219,247);">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand" href="home_paciente.php"><strong>Perfil paciente</strong></a><button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active" role="presentation"><a href="#">Verificar Consulta</a></li>
                    <li role="presentation"><a href="verifica_exame_paciente.php">Verficar Exame</a></li>
                    <li role="presentation"><a href="logout.php">Sair</a></li>
                </ul>
        </div>
        </div>
    </nav>
    <div class="row register-form">
        <div class="col-md-8 col-md-offset-2">
            <form method="post" class="form-horizontal custom-form">
                <h1>Digite seu CPF</h1>
                <div class="form-group">    
                    <div class="col-sm-4 label-column"><label class="control-label" for="name-input-field">CPF </label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" name="cpfnovo" type="text"></div>
                    <input class="btn btn-default submit-button" type="submit" value="verifica" name="verifica"/></form>    
                </div>
                
                <?php
        if ($error) {
            echo '<p> CPF inserido não encontrado/ Nenhuma realizada </p>' ; 
        }
        if ($achou) {
            echo '<table class="content-table">';
            foreach($xml->children() as $bk) {
                if ($bk->cpf == $cpfnovo){
                    echo '<table class ="content-table">';
                    echo "<tr><td> CRM do seu médico: $bk->crm </td></tr>";
                    echo "<tr><td> Medicamento recomendado: $bk->receita </td></tr>";
                    echo "<tr><td> Dia que foi realizada a consulta: $bk->data </td></tr>";
                    echo "</table>";
                    echo "<br>";
                } 
            }
            echo "</table>";
        }
        ?>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>