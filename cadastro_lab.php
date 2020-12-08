<?php
session_start();

$error = false;
$sucesso = false;
if(isset($_POST['cadastrar'])) {
    $cnpj = $_POST['cnpj'];
    $senha = $_POST['senha'];
    $nome = $_POST['nome'];
    $end = $_POST['end'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $tipoexame = $_POST['tipoexame'];
    $xml=simplexml_load_file("users/labs.xml") or die ("Erro!");
    foreach($xml->children() as $sk) {
        if ($sk->cnpj == $cnpj) {
            $error = true;
        }
    }

    if ($error == false){
        $add = $xml->addChild("lab"); 
        $add -> addChild("cnpj", $cnpj);
        $add -> addChild("nome", $nome);
        $add -> addChild("senha", $senha);
        $add -> addChild("end", $end);
        $add -> addChild("telefone", $telefone);
        $add -> addChild("email", $email);
        $add -> addChild("tipoexame", $tipoexame);

        $s = simplexml_import_dom($xml);
        $s->saveXML ('users/labs.xml');
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
                    var cnpj = formcontato.cnpj.value; 
                    var nome = formcontato.nome.value;
                    var senha = formcontato.senha.value;
                    var end =formcontato.end.value;
                    var telefone = formcontato.telefone.value;
					var email = formcontato.email.value;
					var tipoexame = formcontato.tipoexame.value;
					if(cnpj == ""){
						alert("Por Favor, preencha o campo CNPJ");
						formcontato.cnpj.focus();
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
					if(email == ""){
						alert("Por Favor, preencha o campo EMAIL");
						formcontato.email.focus();
						return false;
					}
					
					if(tipoexame == ""){
						alert("Por Favor, preencha o campo TIPO DE EXAME");
						formcontato.tipodeexame.focus();
						return false;
                    }
                }
                    </script>
</head>

<body style="background-color:springgreen">
    <nav class="navbar navbar-default" style="border:green; border-radius:0; background-color:green">
        <div class="container-fluid" style="border:green; border-radius:0; background-color:green">
            <div class="navbar-header" style="border:green; border-radius:0; background-color:green"><a class="navbar-brand" href="home_admin.php"><strong style="color:white;font-weight:bold;">Perfil Admin</strong></a><button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    <li role="presentation"><a style="color:white;font-weight:bold;" href="cadastro_medico.php">Cadastrar Medico</a></li>
                    <li class="active" role="presentation"><a style="color:black;font-weight:bold;"href="#">Cadastrar Lab</a></li>
                    <li role="presentation"><a style="color:white;font-weight:bold;"href="cadastro_paciente.php">Cadastrar Paciente</a></li>
                    <li role="presentation"><a style="color:white;font-weight:bold;"href="logout.php">Sair</a></li>
                </ul>
        </div>
        </div>
    </nav>
    <div class="row register-form">
        <div class="col-md-8 col-md-offset-2">
            <form method="post" name="formcontato" class="form-horizontal custom-form">
                <h1>Cadastrar laboratório</h1>
                <div class="form-group">
                    <div class="col-sm-4 label-column"><label class="control-label" for="name-input-field">CNPJ </label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="number" name="cnpj" size="20"></div>
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
                    <div class="col-sm-4 label-column"><label class="control-label" for="repeat-pawssword-input-field">Email </label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="email" name="email" size="40"></div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column"><label class="control-label" for="repeat-pawssword-input-field">Tipo de Exame </label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="number" name="tipoexame" size="20"></div>
                </div>
                <input class="btn btn-default submit-button" style="background-color:green;" type="submit" value="cadastrar" name="cadastrar" onclick="return validar_form_contato()" />
                
                <?php
                if ($error) {
                    echo '<p> Laboratório com esse CNPJ já cadastrado! </p>' ; 
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