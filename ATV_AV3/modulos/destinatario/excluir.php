<?php
  if(isset($_GET['id']) && is_numeric($_GET['id'])){
    
    include('classes/Destinatario.class.php');
    
    $destinatario = new Destinatario($_GET['id']);
    $destinatario -> excluir();
  }
  echo "</br></br><button><a href='?modulo=destinatario&acao=listar'>Voltar</a></button>";
?>