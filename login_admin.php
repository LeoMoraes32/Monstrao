<?php
$error = false;
if(isset($_POST['login'])) {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $contador = 0;
    $posicao = 0;
    $xml=simplexml_load_file("users/adm.xml") or die ("Erro!");
    foreach($xml->children() as $sk) {
        if ($sk->usuario == $usuario) {
            $posicao = $contador;
        }
        $contador= $contador+1;
    }   
        if($usuario == $xml->adm[$posicao]->usuario){
     
            if($senha == $xml->adm[$posicao]->senha){

                session_start();
                $_SESSION['usuario'] = $usuario;
                header('Location: home_admin.php');
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
    <section id="lab" style="width:100%;background-image:url(assets/img/labfundo.jpg);background-position:center;background-size:cover;background-repeat:no-repeat;padding:0;min-height:100%;height:100vh;">
    <nav class="navbar navbar-default" style="border:green; border-radius:0; background-color:green">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="#"><strong style="color:white; font-weight: bold;"><i class="glyphicon glyphicon-plus"></i> Monstrão</strong></a><button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav navbar-right" style="color:#000000;">
                        <li role="presentation" style="font-weight:bold;"><a style="color:white" href="index.php">Paciente</a></li>
                        <li class="presentation" role="presentation" style="font-weight:bold;"><a style="color:white;" href="login_medico.php">Medico</a></li>
                        <li role="presentation" style="font-weight:bold;"><a style="color:white;" href="login_lab.php">Laboratorio</a></li>
                        <li class="active" role="presentation" style="font-weight:bold;"><a style="color:black;" href="#">Administrador</a></li>
                    </ul>
            </div>
            </div>
        </nav>
        <div id="infolab" style="element.style {&nbsp; width:100%;background-image:url(&quot;assets/img/fundopaciente.jpg&quot;);background-position:center;background-size:cover;background-repeat:no-repeat;padding:0;min-height:100%;height:100vh;"><br />
<br />

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h3 class="text-center login-title" style="color:black;">Entre com o Usuario e sua senha</h3><br />
            <div class="account-wall text-center">
                <br/>
                <center>
                    <p class="form-signin">
                        <form method="post">
                            <div class="form-group"><input class="form-control" name="usuario" type="text" placeholder="Usuario" ></div>
                            <input type="password" name="senha" id="txtPassword" class="form-control" placeholder="Senha" />
                            <br />
                            <input type="submit" value="Entre" name="login" class="btn btn-lg btn-block" style="background-color: green; color: white; font-weight: bold;" />
                            <?php
                                if ($error) {
                                    echo "<p class='erro'> Usuario ou senha invalida </p>" ; 
                                }
                            ?>
                            
                        </form>
                    </p>
                </center>
            </div>
        </div>
    </div>
</div>


<br />
<br /></div>
    </section>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>