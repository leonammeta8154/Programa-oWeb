<?php
  if(isset($_GET['id']) && is_numeric($_GET['id'])){
    
    include('classes/Entrega.class.php');
    
    $entrega = new Entrega($_GET['id']);
    $entrega -> excluir();
  }
  echo "</br></br><button><a href='?modulo=entrega&acao=listar'>Voltar</a></button>";
?>