<?php
session_start();
error_reporting(0);

$achou = false;
if(isset($_POST['verifica'])) {
    $nome = $_POST['nome'];
    $crm = $_SESSION['crm'];

    $xml=simplexml_load_file("users/paciente.xml") or die ("Erro!");

    foreach($xml->children() as $sk) {
        if ($nome == $sk->nome){
            $achou=true;
        }
    }

    if (!$achou) {
        $error = true; 
    }     
}
?>

<!DOCTYPE html PUBLICK "-//W3C//DTD XHTML 1.0 transitional//PT"
    "http://www.w3.org/TR/xhtmll/DTD/xhtmll-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Busca Paciente</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/material-icons.min.css">
    <link rel="stylesheet" href="assets/css/Features-Boxed.css">
    <link rel="stylesheet" href="assets/css/Features-Clean.css">
    <link rel="stylesheet" href="assets/css/Newsletter-Subscription-Form.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="assets/css/medstyles.css">
    <link rel="stylesheet" type="text/css" href="assets/css/estilotabela.css">
</head>
<body>
    <h1> Busca Paciente </h1>
    <form method="post" action="">
        <p>Nome do paciente <input type="text" name="nome" size="50" /></p>

        <?php
        if ($error) {
            echo '<p> Nenhum paciente com o nome inserido encontrado </p>' ; 
        }
        if ($achou) {
            echo '<table class="content-table">';
            foreach($xml->children() as $bk) {
                if ($bk->nome == $nome) {
                    echo '<table class="content-table">';
                    echo "<tr><td> $bk->cpf </td> ";
                    echo "<td> $bk->nome </td></tr>";
                    echo "</table>";
                    echo "<br>";
                } 
            }
            echo "</table>";
        }
        ?>
        <input class="btn btn-default submit-button" type="submit" value="verifica" name="verifica"/>

        
    </form>
</body>
</html>


