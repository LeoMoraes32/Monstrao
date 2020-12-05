<?php
session_start();

$error = false;
$sucesso = false;
if(isset($_POST['cadastrar'])) {
    $crm = $_POST['crm'];
    $senha = $_POST['senha'];
    $nome = $_POST['nome'];
    $end = $_POST['end'];
    $telefone = $_POST['telefone'];
    $esp = $_POST['esp'];
    $xml=simplexml_load_file("users/medicos.xml") or die ("Erro!");
    foreach($xml->children() as $sk) {
        if ($sk->crm == $crm) {
            $error = true;
        }
    }

    if ($error == false){
        $add = $xml->addChild("medico"); 
        $add -> addChild("crm", $crm);
        $add -> addChild("nome", $nome);
        $add -> addChild("senha", $senha);
        $add -> addChild("end", $end);
        $add -> addChild("telefone", $telefone);
        $add -> addChild("esp", $esp);

        $s = simplexml_import_dom($xml);
        $s->saveXML ('users/medicos.xml');
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
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="assets/css/adminstyles.css">
    <script type="text/javascript">
			function validar_form_contato(){
                    var crm = formcontato.crm.value; 
                    var nome = formcontato.nome.value;
                    var senha = formcontato.senha.value;
                    var end = formcontato.end.value;
                    var telefone = formcontato.telefone.value;
					var esp = formcontato.esp.value;
					if(crm == ""){
						alert("Por Favor, preencha o campo CRM");
						formcontato.crm.focus();
						return false;
					}
					if(nome == ""){
						alert("Por Favor, preencha o campo NOME");
						formcontato.nome.focus();
						return false;
                    }
                    if(senha == ""){
						alert("Por Favor, preencha o campo SENHA");
						formcontato.senha.focus();
						return false;
                    }
                    if(end == ""){
						alert("Por Favor, preencha o campo ENDEREÇO");
						formcontato.end.focus();
						return false;
                    }
                    if(telefone == ""){
						alert("Por Favor, preencha o campo TELEFONE");
						formcontato.telefone.focus();
						return false;
					}
					if(esp == ""){
						alert("Por Favor, preencha o campo ESPECIALIDADE");
						formcontato.esp.focus();
						return false;
					}
					
                }
            </script>
</head>

<body style="background-color:rgb(211,219,247);">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand" href="home_admin.php"><strong>Perfil Admin</strong></a><button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active" role="presentation"><a href="#">Cadastrar Medico</a></li>
                    <li role="presentation"><a href=cadastro_lab.php>Cadastrar Lab</a></li>
                    <li role="presentation"><a href="cadastro_paciente.php">Cadastrar Paciente</a></li>
                    <li role="presentation"><a href="logout.php">Sair</a></li>
                </ul>
        </div>
        </div>
    </nav>
    <div class="row register-form">
        <div class="col-md-8 col-md-offset-2">
            <form method="post" class="form-horizontal custom-form" name ="formcontato">
                <h1>Cadastrar Médico</h1>
                <div class="form-group">
                    <div class="col-sm-4 label-column"><label class="control-label" for="name-input-field">CRM </label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="number" name="crm" size="20"></div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column"><label class="control-label" for="email-input-field">Nome </label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="text" name="nome" size="40"></div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column"><label class="control-label" for="pawssword-input-field">Senha </label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="password" name="senha" size="40"></div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column"><label class="control-label" for="repeat-pawssword-input-field">Endereço </label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="text" name="end" size="40"></div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column"><label class="control-label" for="repeat-pawssword-input-field">Telefone </label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="number" name="telefone" size="20"></div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column"><label class="control-label" for="repeat-pawssword-input-field">Especialidade </label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="text" name="esp" size="20"></div>
                </div>
                <input class="btn btn-default submit-button" type="submit" value="cadastrar" name="cadastrar" onclick="return validar_form_contato()" />
                <?php
                     if ($error) {
                        echo '<p> Médico com esse CRM já cadastrado! </p>' ; 
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