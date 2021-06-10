<?php
  if(isset($_GET['id']) && is_numeric($_GET['id'])){
    
    include('classes/Mercadoria.class.php');
    
    $mercadoria = new Mercadoria($_GET['id']);
    $mercadoria -> excluir();
  }
  echo "</br></br><button><a href='?modulo=mercadoria&acao=listar'>Voltar</a></button>";
?>