<?php
session_start();

$error = false;
$sucesso = false;
if(isset($_POST['cadastrar'])) {
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];
    $nome = $_POST['nome'];
    $end = $_POST['end'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $idade = $_POST['idade'];
    $genero = $_POST['genero'];
    $xml=simplexml_load_file("users/paciente.xml") or die ("Erro!");
    foreach($xml->children() as $sk) {
        if ($sk->cpf == $cpf) {
            $error = true;
        }
    }

    if ($error == false){
        $add = $xml->addChild("paciente"); 
        $add -> addChild("cpf", $cpf);
        $add -> addChild("nome", $nome);
        $add -> addChild("senha", $senha);
        $add -> addChild("end", $end);
        $add -> addChild("telefone", $telefone);
        $add -> addChild("email", $email);
        $add -> addChild("genero", $genero);
        $add -> addChild("idade", $idade);

        $s = simplexml_import_dom($xml);
        $s->saveXML ('users/paciente.xml');
        $sucesso = true;
        
        }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil admin</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/material-icons.min.css">
    <link rel="stylesheet" href="assets/css/Features-Boxed.css">
    <link rel="stylesheet" href="assets/css/Features-Clean.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="assets/css/adminstyles.css">
    <script type="text/javascript">
			function validar_form_contato(){
                    var cpf = formcontato.cpf.value; 
                    var nome = formcontato.nome.value;
                    var senha = formcontato.senha.value;
                    var end = formcontato.end.value;
                    var telefone = formcontato.telefone.value;
                    var email = formcontato.email.value;
                    var idade = formcontato.idade.value;
                    var genero = formcontato.genero.value;
					if(cpf == ""){
						alert("Por Favor, preencha o campo CPF");
						formcontato.cpf.focus();
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
                    if(idade == ""){
						alert("Por Favor, preencha o campo IDADE");
						formcontato.idade.focus();
						return false;
                    }
                    if(genero == ""){
						alert("Por Favor, preencha o campo GENERO");
						formcontato.genero.focus();
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
                    <li role="presentation"><a href="cadastro_medico.php">Cadastrar Medico</a></li>
                    <li role="presentation"><a href="cadastro_lab.php">Cadastrar Lab</a></li>
                    <li class="active" role="presentation"><a href="#">Cadastrar Paciente</a></li>
                    <li role="presentation"><a href="logout.php">Sair</a></li>
                </ul>
        </div>
        </div>
    </nav>
    <div class="row register-form">
        <div class="col-md-8 col-md-offset-2">
            <form method="post" action="" class="form-horizontal custom-form" name="formcontato">
                <h1>Cadastro Pacientes</h1>
                <div class="form-group">
                    <div class="col-sm-4 label-column"><label class="control-label" for="name-input-field">CPF </label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="number" name="cpf" size="20""></div>
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
                    <div class="col-sm-4 label-column"><label class="control-label" for="repeat-pawssword-input-field">Idade </label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="number" name="idade" size="20"></div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column"><label class="control-label" for="repeat-pawssword-input-field">Genero </label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="text" name="genero" size="10"></div>
                </div>
                <input class="btn btn-default submit-button" type="submit" value="cadastrar" name="cadastrar" onclick="return validar_form_contato()"/>
            
                <?php
                if ($error) {
                    echo '<p> Paciente com esse CPF já cadastrado! </p>' ; 
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