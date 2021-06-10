<form method="POST" action="">
Usuario: <br/><input type="text" name="usuario" size="20" required="required"/><br/><br/>
Senha: <br/><input type="password" name="senha" size="20" required="required"/><br/><br/>
<input type="submit" name="botao" value="Cadastrar"/>
</form> 

<?php
    include "classes/Usuario.class.php";
    if(isset($_POST["botao"]) && $_POST["botao"] == "Cadastrar"){
        session_start();
        Usuario::cadastrar($_POST["usuario"], $_POST["senha"]);
    }
?>
