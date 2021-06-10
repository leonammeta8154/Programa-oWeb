<?php
    if(isset($_POST['btn_salvar']) && ($_POST['btn_salvar']) == "Salvar"){
        include("classes/Entrega.class.php");

        $add = new Entrega();
        $add->setIdenviopk($_POST['idenviopk']);
        $add->setStatusenvio($_POST['statusenvio']);
        $add->adicionar();
    }
?><h1>Entrega</h1></br>
<form name="formEntrega" action="" method="post">
    <!--Nº de Registro: <input type="text" name="identrega" size=10/></br></br>-->
    Nº do Envio: <input type="text" name="idenviopk" size=10/></br></br>
    Status do Envio:</br>
    <input type="radio" name="statusenvio" value="Postado"/>Postado</br>
    <input type="radio" name="statusenvio" value="Saiu da unidade de origem"/>Saiu da unidade de origem</br>
    <input type="radio" name="statusenvio" value="Chegou na unidade de destino"/>Chegou na unidade de destino</br>
    <input type="radio" name="statusenvio" value="Saiu para a entrega"/>Saiu para a entrega</br>
    <input type="radio" name="statusenvio" value="Entregue"/>Entregue</br>
    <input type="radio" name="statusenvio" value="Voltando para o remetente"/>Voltando para o remetente</br></br>
    <input type="submit" name="btn_salvar" value="Salvar"/>
    <input type="reset" name="btn_cancelar" value="Cancelar"/>
</form>