<?php
session_start();

$error = false;
$sucesso = false;
if(isset($_POST['cadastrar'])) {
    $crm = $_SESSION['crm'];
    $cpf = $_POST['cpf'];
    $obs = $_POST['obs'];
    $receita = $_POST['receita'];
    $data = $_POST['data'];
    $xml=simplexml_load_file("users/consultas.xml") or die ("Erro!");
    foreach($xml->children() as $sk) {
        if ($sk->crm == $crm){
            if ($sk->cpf == $cpf) {
                if ($sk->data == $data) {
                    $error = true;    
                }
            }
        }
    }

    if ($error == false){
        $add = $xml->addChild("consulta"); 
        $add -> addChild("cpf", $cpf);
        $add -> addChild("crm", $crm);
        $add -> addChild("data", $data);
        $add -> addChild("receita", $receita);
        $add -> addChild("obs", $obs);

        $s = simplexml_import_dom($xml);
        $s->saveXML ('users/consultas.xml');
        $sucesso = true;
        
        }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Consulta</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/material-icons.min.css">
    <link rel="stylesheet" href="assets/css/Features-Boxed.css">
    <link rel="stylesheet" href="assets/css/Features-Clean.css">
    <link rel="stylesheet" href="assets/css/Newsletter-Subscription-Form.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="assets/css/medstyles.css">
    <script type="text/javascript">
			function validar_form_contato(){
                    var cpf = formcontato.cpf.value; 
                    var data = formcontato.data.value;
                    var receita = formcontato.receita.value;
                    var obs = formcontato.obs.value;
					if(cpf == ""){
						alert("Por Favor, preencha o campo CPF");
						formcontato.cpf.focus();
						return false;
					}
					if(data == ""){
						alert("Por Favor, preencha o campo DATA DA CONSULTA");
						formcontato.data.focus();
						return false;
                    }
                    if(receita == ""){
						alert("Por Favor, preencha o campo RECEITA DA CONSULTA");
						formcontato.receita.focus();
						return false;
                    }
                    if(obs== ""){
						alert("Por Favor, preencha o campo OBSERVAÇÕES");
						formcontato.obs.focus();
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
                    <li class="active" role="presentation"><a href="#">Adicionar Consulta</a></li>
                    <li role="presentation"><a href="verifica_consulta.php">Verficar Consulta</a></li>
                    <li role="presentation"><a href="alterar_medico.php">Editar Perfil</a></li>
                    <li role="presentation"><a href="logout.php">Sair</a></li>
                </ul>
        </div>
        </div>
    </nav>
    <div class="row register-form">
        <div class="col-md-8 col-md-offset-2">
            <form class="form-horizontal custom-form" method="post" action="" name="formcontato">
                <h1>Cadastrar consulta</h1>
                <div class="form-group">
                    <div class="col-sm-4 label-column"><label class="control-label" for="name-input-field">CPF do paciente </label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="number" name="cpf" size="20"></div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column"><label class="control-label" for="email-input-field">Data da Consulta</label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="text" name="data" size="40"></div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column"><label class="control-label" for="pawssword-input-field">Receita </label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="text" name="receita" size="40"></div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column"><label class="control-label" for="repeat-pawssword-input-field">Observações </label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="text" name="obs" size="100"></div>
                </div>
                <input class="btn btn-default submit-button" type="submit" value="cadastrar" name="cadastrar" onclick="return validar_form_contato()"/>
            
                <?php
                if ($error) {
                    echo '<p> Consulta com esse paciente ja cadastrada neste dia </p>' ; 
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