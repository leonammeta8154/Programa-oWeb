<?php
  if(isset($_GET['id']) && is_numeric($_GET['id'])){
    
    include('classes/Remetente.class.php');
    
    $remetente = new Remetente($_GET['id']);
    $remetente -> excluir();
  }
  echo "</br></br><button><a href='?modulo=remetente&acao=listar'>Voltar</a></button>";
?>