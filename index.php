<?php
$error = false;
if(isset($_POST['login'])) {
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];
    $contador = 0;
    $posicao = 0;
    $xml=simplexml_load_file("users/paciente.xml") or die ("Erro!");
    foreach($xml->children() as $sk) {
        if ($sk->cpf == $cpf) {
            $posicao = $contador;
        }
        $contador= $contador+1;
    }   
        if($cpf == $xml->paciente[$posicao]->cpf){
     
            if($senha == $xml->paciente[$posicao]->senha){

                session_start();
                $_SESSION['cpf'] = $cpf;
                header('Location: home_paciente.php');
                die; 
            }
        }
    
    $error = true;
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinica Monstrão</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Fern-Login-Form.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <section id="hero" style="width:100%;background-image:url(&quot;./assets/img/paci.jpg&quot;);background-position:center;background-size:cover;background-repeat:no-repeat;padding:0;min-height:100%;height:100vh;">
        <nav class="navbar navbar-default" style="border:green; border-radius:0; background-color:green">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="#"><strong style="color:white; font-weight: bold;"><i class="glyphicon glyphicon-plus"></i> Monstrão</strong></a><button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav navbar-right" style="color:#000000;">
                        <li class="active" role="presentation" style="font-weight:bold;"><a href="#">Paciente</a></li>
                        <li role="presentation" style="font-weight:bold;"><a style="color:white;" href="login_medico.php">Medico</a></li>
                        <li role="presentation" style="font-weight:bold;"><a style="color:white;" href="login_lab.php">Laboratorio</a></li>
                        <li role="presentation" style="font-weight:bold;"><a style="color:white;" href="login_admin.php">Administrador</a></li>
                    </ul>
            </div>
            </div>
        </nav>
        <div style="width:700px;">
            <div class="jumbotron" id="info" style="width:100%;">
                <h1 style="padding:10px; color:green">Bem-Vindo a Clinica Monstrão</h1>
                <p style="color:green"><br>Venha com a Clínica Monstrão, se não doer não ta ficando grande!</p>
                <p></p>
            </div>
        </div>
        <div id="info2" style="width:600px;float: right">
            <form method="post" action="">
                <div id="formd" style="width:600px;padding:80px;">
                    <h1 style="color:black;">Paciente?</h1>
                    <p style="font-size:20px; color:black;">Entre para verificar suas consultas</p>
                    <div class="form-group"><input class="form-control" type="number" placeholder="CPF" name="cpf" size="20" ></div>
                    <div class="form-group"><input class="form-control" type="password" name="senha" size="20" placeholder="Senha"></div>
                    <div class="form-group"><input class="btn btn-block" style="background-color: green; color: white; font-weight: bold;" type="submit" value="Login" name="login"/></div>
                    <?php
                        if ($error) {
                            echo "<p class='erro'> Usuario ou senha invalida </p>"; 
                        }
                    ?>
                </div>
            </form>
        </div>
    </section>

    
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>