<?php
    if(isset($_POST['btn_salvar']) && ($_POST['btn_salvar']) == "Salvar"){
        include("classes/Mercadoria.class.php");

        $add = new Mercadoria();
        $add->setIdremetentepk($_POST['idremetentepk']);
        $add->setMercadoria($_POST['mercadoria']);
        $add->setPeso($_POST['peso']);
        $add->setFragil($_POST['fragil']);
        $add->adicionar();
    }
?>
<h1>Mercadoria</h1></br>
<form name="formMercadoria" action="" method="post">
    <!--Nº de Registro: <input type="text" name="idmercadoria" size=10/></br></br>-->
    Nº do Remetente: <input type="text" name="idremetentepk" size=10/></br></br>
    Mercadoria:  <input type="text" name="mercadoria" size=25/></br></br>
    Peso: <input type="text" name="peso" size=5/> KG</br></br>
    Fragil:</br>
    <input type="radio" name="fragil" value="Sim"/>Sim</br>
    <input type="radio" name="fragil" value="Não"/>Não</br></br>
    <input type="submit" name="btn_salvar" value="Salvar"/>
    <input type="reset" name="btn_cancelar" value="Cancelar"/>
</form>