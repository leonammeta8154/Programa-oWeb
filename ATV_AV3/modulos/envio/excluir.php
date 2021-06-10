<?php
  if(isset($_GET['id']) && is_numeric($_GET['id'])){
    
    include('classes/Envio.class.php');
    
    $envio = new Envio($_GET['id']);
    $envio -> excluir();
  }
  echo "</br></br><button><a href='?modulo=envio&acao=listar'>Voltar</a></button>";
?>