<?php
session_start();
$error = false;
$sucesso = false;
if(isset($_POST['alterar'])) {
    $contador = 0;
    $posicao = 0;
    $cnpj = $_POST['cnpj'];
    $alterar = $_POST['trocado'];
    $valor_novo = $_POST['valor_novo'];
    if ($_SESSION['cnpj'] == $cnpj) {
        $xml=simplexml_load_file("users/labs.xml") or die ("Erro!");
        foreach($xml->children() as $sk) {
            if ($sk->cnpj == $cnpj) {
                // echo ("Achei a posicao no xml!"); //
                $posicao = $contador;
            }
            $contador= $contador+1;
        }
        $xml->lab[$posicao]->$alterar = $valor_novo;
        $s = simplexml_import_dom($xml);
        $s->saveXML ('users/labs.xml');
        $sucesso = true;
    }else{
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
    <link rel="stylesheet" href="assets/css/labstyles.css">
</head>

<body style="background-color:rgb(211,219,247);">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand" href="home_lab.php"><strong>Perfil lab</strong></a><button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    <li role="presentation"><a href="cadastro_exame.php">Adicionar Exame</a></li>
                    <li role="presentation"><a href="verifica_exame.php">Verficar Exame</a></li>
                    <li class="active" role="presentation"><a href="#">Editar Perfil</a></li>
                    <li role="presentation"><a href="logout.php">Sair</a></li>
                </ul>
        </div>
        </div>
    </nav>
    <div class="row register-form">
        <div class="col-md-8 col-md-offset-2">
            <form method="post" action="" class="form-horizontal custom-form">
                <h1>Editar laboratório</h1>
                <div class="form-group">
                    <div class="col-sm-4 label-column"><label class="control-label" for="name-input-field">CNPJ </label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="text" name="cnpj" size="20"></div>
                </div>
                <div class = "radio">
                    <label>
                        <input type="radio" name="trocado" value="nome" checked />
                       Nome
                    </label>
                    </div> 
                <div class = "radio">
                    <label>
                            <input type ="radio" name="trocado" value="senha" />
                            Senha
                    </label>
                </div>
                <div class = "radio">
                    <label>
                        <input type ="radio" name="trocado" value="end" />
                        Endereço
                    </label>
                </div>
                <div class = "radio">
                    <label>
                        <input type ="radio" name="trocado" value="telefone" />
                        Telefone
                    </label>
                </div>
                <div class = "radio">
                    <label>
                        <input type ="radio" name="trocado" value="email" />
                        Email
                    </label>
                </div>
                <div class = "radio">
                    <label>
                        <input type ="radio" name="trocado" value="tipoexame" />
                        Tipo de exames
                    </label>
                </div>
                <br>
                <p>Diga o novo valor da caixa marcada acima <input type="text" name="valor_novo" size="20" /></p> 
                <input class="btn btn-default submit-button" type="submit" value="alterar" name='alterar' />
                <br>
                <?php
                if ($error) {
                    echo '<p> CNPJ inserido não é o seu.</p>' ; 
                } else {
                    if ($sucesso == true) {
                        echo 'Alterado com sucesso!<br>';
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