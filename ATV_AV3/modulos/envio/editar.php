<?php
    if(isset($_POST['btn_salvar']) && ($_POST['btn_salvar']) == "Salvar"){
        include("classes/Envio.class.php");

        $add = new Envio();
        $add->setIdremetentepk($_POST['idremetentepk']);
        $add->setIdMercadoriapk($_POST['idmercadoriapk']);
        $add->setIddestinatariopk($_POST['iddestinatariopk']);
        $add->setTipoenvio($_POST['tipoenvio']);
        $add->adicionar();
    }
?>
<h1>Envio</h1></br>
<form name="formEnvio" action="" method="post">
    <!--Nº de Registro: <input type="text" name="idenvio" size=10/></br></br>-->
    Nº do Remetente: <input type="text" name="idremetentepk" size=10/></br></br>
    Nº da Mercadoria: <input type="text" name="idmercadoriapk" size=10/></br></br>
    Nº do Destinatário: <input type="text" name="iddestinatariopk" size=10/></br></br>
    Tipo de Envio:</br>
    <input type="radio" name="tipoenvio" value="Normal"/>Normal</br>
    <input type="radio" name="tipoenvio" value="Expresso"/>Expresso</br></br>
    <input type="submit" name="btn_salvar" value="Salvar"/>
    <input type="reset" name="btn_cancelar" value="Cancelar"/>
</form>