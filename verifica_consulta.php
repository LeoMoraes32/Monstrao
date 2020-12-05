<?php
session_start();
error_reporting(0);

$achou = false;
if(isset($_POST['verifica'])) {
    $cpf = $_POST['cpf'];
    $crm = $_SESSION['crm'];

    $xml=simplexml_load_file("users/consultas.xml") or die ("Erro!");

    foreach($xml->children() as $sk) {
        if ($cpf == $sk->cpf){
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
    <title>Verificar Consultas</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/material-icons.min.css">
    <link rel="stylesheet" href="assets/css/Features-Boxed.css">
    <link rel="stylesheet" href="assets/css/Features-Clean.css">
    <link rel="stylesheet" href="assets/css/Newsletter-Subscription-Form.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="assets/css/medstyles.css">
    <link rel="stylesheet" type="text/css" href="assets/css/estilotabela.css">
</head>

<body style="background-color:rgb(211,219,247);">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand" href="home_medico.php"><strong>Perfil Medico</strong></a><button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    <li role="presentation"><a href="cadastro_consulta.php">Adicionar Consulta</a></li>
                    <li class="active" role="presentation"><a href="#">Verficar Consulta</a></li>
                    <li role="presentation"><a href="alterar_medico.php">Editar Perfil</a></li>
                    <li role="presentation"><a href="logout.php">Sair</a></li>
                </ul>
        </div>
        </div>
    </nav>
    <div class="row register-form">
        <div class="col-md-8 col-md-offset-2">
            <form method="post" class="form-horizontal custom-form">
                <h1>Verificar Consultas</h1>
                <div class="form-group">
                    <div class="col-sm-4 label-column"><label class="control-label" for="name-input-field">CPF </label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" name="cpf" size="20"></div>
                </div>
                
                <input class="btn btn-default submit-button" type="submit" value="verifica" name="verifica"/>
            
                <?php
                if ($error) {
                    echo '<p> Nenhum paciente com o CPF inserido encontrado </p>' ; 
                }
                if ($achou) {
                    echo '<table class="content-table">';
                    foreach($xml->children() as $bk) {
                        if ($bk->crm == $crm) {
                            if ($bk->cpf == $cpf){
                                echo '<table class="content-table">';
                                echo "<tr><td> $bk->cpf </td></tr> ";
                                echo "<tr><td> $bk->receita </td></tr>";
                                echo "<tr><td> $bk->data </td></tr>";
                                echo "<tr><td> $bk->obs </td></tr";
                                echo "</table>";
                                echo "<br>";
                            }
                        } 
                    }
                    echo "</table>";
                }
                ?>

            <p>Verificar cpf do paciente pelo nome</p>

            <button class="btn btn-default submit-button" onclick="myFunction()">Aqui</button>

            <script>
            function myFunction() {
            window.open("busca_paciente.php" ,"myWindow", "width=500,height=500");
            }

            
            </script>

            </form>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>