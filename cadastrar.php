<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Cadastrar devedor');

use \App\Entity\Devedor;

$Devedor = new Devedor;

//validação
if(isset($_POST['nome'], $_POST['cpf'])){
    $Devedor->nome             = $_POST['nome'];
    $Devedor->cpf              = $_POST['cpf'];
    $Devedor->data_nascimento  = $_POST['data_nascimento'];
    $Devedor->endereco         = $_POST['endereco'];
    $Devedor->descricao_titulo = $_POST['descricao_titulo'];
    $Devedor->valor            = $_POST['valor'];
    $Devedor->data_vencimento  = $_POST['data_vencimento'];
    $Devedor->cadastrar();

    header('location: index.php?status=success');

    exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';

?>