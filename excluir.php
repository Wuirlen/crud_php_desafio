<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Devedor;

//VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: index.php?status=error');
    exit;
  }

  //CONSULTA O DEVEDOR
$Devedor = Devedor::getDevedor($_GET['id']);

//VALIDAÇÃO DO DEVEDOR
if(!$Devedor instanceof Devedor){
  header('location: index.php?status=error');
  exit;
}

//validação
if(isset($_POST['excluir'])){

    $Devedor->excluir();

    header('location: index.php?status=success');

    exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/confirmar-exclusao.php';
include __DIR__.'/includes/footer.php';

?>