<?php
session_start();
$error = false;
$sucesso = false;
if(isset($_POST['alterar'])) {
    $contador = 0;
    $posicao = 0;
    $crm = $_POST['crm'];
    $alterar = $_POST['trocado'];
    $valor_novo = $_POST['valor_novo'];
    if ($_SESSION['crm'] == $crm) {
        $xml=simplexml_load_file("users/medicos.xml") or die ("Erro!");
        foreach($xml->children() as $sk) {
            if ($sk->crm == $crm) {
                // echo ("Achei a posicao no xml!"); //
                $posicao = $contador;
            }
            $contador= $contador+1;
        }
        $xml->medico[$posicao]->$alterar = $valor_novo;
        $s = simplexml_import_dom($xml);
        $s->saveXML ('users/medicos.xml');
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
    <link rel="stylesheet" href="assets/css/medstyles.css">
    <script type="text/javascript">
			function validar_form_contato(){
                    var valornovo = formcontato.valor_novo.value; 
					if(valornovo == ""){
						alert("Por Favor, Altere o campo solicitado");
						formcontato.valor_novo.focus();
						return false;
					}
					
                }
            </script>
</head>

<body style="background-color:rgb(211,219,247);">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand" href="home_medico.php"><strong>Perfil Medico</strong></a><button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    <li role="presentation"><a href="cadastro_consulta.php">Adicionar Consulta</a></li>
                    <li role="presentation"><a href="verifica_consulta.php">Verficar Consulta</a></li>
                    <li class="active" role="presentation"><a href="#">Editar Perfil</a></li>
                    <li role="presentation"><a href="logout.php">Sair</a></li>
                </ul>
        </div>
        </div>
    </nav>
    <div class="row register-form">
        <div class="col-md-8 col-md-offset-2">
            <form method="post" class="form-horizontal custom-form" name="formcontato">
                <h1>Alterar Cadastro</h1>
                <div class="form-group">
                    <div class="col-sm-4 label-column"><label class="control-label" for="name-input-field"> CRM </label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="text" name="crm" size="20"></div>
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
                        <input type ="radio" name="trocado" value="esp" />
                        Especialidade
                    </label>
                </div>
                <br>
                <p>Diga o novo valor da caixa marcada acima <input type="text" name="valor_novo" size="20" /></p> 
                <input class="btn btn-default submit-button" type="submit" value="alterar" name='alterar' onclick="return validar_form_contato()" />
                <br>
                <?php
                if ($error) {
                    echo '<p> CNPJ inserido não é o seu/Não existe</p>' ; 
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