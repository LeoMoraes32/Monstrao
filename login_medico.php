<?php
$error = false;
if(isset($_POST['login'])) {
    $crm = $_POST['crm'];
    $senha = $_POST['senha'];
    $contador = 0;
    $posicao = 0;
    $xml=simplexml_load_file("users/medicos.xml") or die ("Erro!");
    foreach($xml->children() as $sk) {
        if ($sk->crm == $crm) {
            $posicao = $contador;
        }
        $contador= $contador+1;
    }   
        if($crm == $xml->medico[$posicao]->crm){
     
            if($senha == $xml->medico[$posicao]->senha){

                session_start();
                $_SESSION['crm'] = $crm;
                header('Location: home_medico.php');
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

<body style="width:100%;background-image:url(&quot;assets/img/medicofundo.jpg&quot;);background-position:center;background-size:cover;background-repeat:no-repeat;padding:0;min-height:100%;height:100vh;">
    <section id="med">
    <nav class="navbar navbar-default" style="border:green; border-radius:0; background-color:green">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="#"><strong style="color:white; font-weight: bold;"><i class="glyphicon glyphicon-plus"></i> Monstrão</strong></a><button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav navbar-right" style="color:#000000;">
                        <li role="presentation" style="font-weight:bold;"><a style="color:white" href="index.php">Paciente</a></li>
                        <li class="active" role="presentation" style="font-weight:bold;"><a style="color:black;" href="#">Medico</a></li>
                        <li role="presentation" style="font-weight:bold;"><a style="color:white;" href="login_lab.php">Laboratorio</a></li>
                        <li role="presentation" style="font-weight:bold;"><a style="color:white;" href="login_admin.php">Administrador</a></li>
                    </ul>
            </div>
            </div>
        </nav>
        <div id="infomed"><br />
<br />

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h3 class="text-center login-title" style="color:black">Entre com o CRM e sua senha</h3><br />
            <div class="account-wall text-center">
                <br/>
                <center>
                    <p class="form-signin">
                        <form method="post">
                            <div class="form-group"><input class="form-control" type="number" placeholder="CRM" name="crm" ></div>
                            <input type="password" id="txtPassword" class="form-control" name="senha" placeholder="Senha" />
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