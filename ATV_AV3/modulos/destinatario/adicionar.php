<?php
    include("classes/Destinatario.class.php");

    if(isset($_POST['btn_salvar']) && ($_POST['btn_salvar']) == "Salvar"){
        $add = new Destinatario();
        $add->setDestinatario($_POST['destinatario']);
        $add->setCpf($_POST['cpf']);
        $add->setCep($_POST['cep']);
        $add->setLogradouro($_POST['logradouro']);
        $add->setNumero($_POST['numero']);
        $add->setBairro($_POST['bairro']);
        $add->setEstado($_POST['estado']);
        $add->setCidade($_POST['cidade']);
        $add->setTelefone($_POST['telefone']);
        $add->setEmail($_POST['email']);
        $add->adicionar();
    }

    $lists = Destinatario::listar();
    $id;
    if($lists){
        foreach($lists as $list){
            $id = $list->getIddestinatario();
        }
    }

?>

<h1>Destinatário</h1></br>
<form name="formDestinatario" action="" method="post">
    Nº de Registro: <?php echo $id+1;?></br></br>
    Destinatário:</br>
    <input type="text" name="destinatario" size=32 placeholder="Nome"/>
    <input type="text" name="cpf" size=20 placeholder="CPF"/></br></br>
    Endereço:</br>
    <input type="text" name="cep" size="8" maxlength="8" placeholder="CEP"/>
    <input type="text" name="logradouro" size=32 placeholder="Logradouro"/></br>
    <input type="text" name="numero" size=6 maxlength="6" placeholder="Numero"/>
    <input type="text" name="bairro" size=15 placeholder="Bairro"/></br></br>
    Cidade:</br>
    <input type="text" name="estado" size=20 placeholder="Estado"/>
    <input type="text" name="cidade" size=20 placeholder="Cidade"/></br></br>
    Contato:</br>
    <input type="text" name="telefone" size=10 placeholder="Telefone"/>
    <input type="text" name="email" size=20 placeholder="Email"/></br></br>
    <input type="submit" name="btn_salvar" value="Salvar"/>
    <input type="reset" name="btn_cancelar" value="Cancelar"/>
</form>