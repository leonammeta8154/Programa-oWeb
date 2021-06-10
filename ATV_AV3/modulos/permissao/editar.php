<form method="post">
<?php
    include("classes/Modulo.class.php");
    include("classes/Permissao.class.php");
    if(isset($_POST['atualizarPermissao']) && $_POST['atualizarPermissao'] == 'Salvar'){
        $listaPermissao = array();
        $listaPermissao[] = $_POST['listaPermissao'];
        foreach($listaPermissao as $itemPermissao){
            $item = explode('-', $itemPermissao);
            $grupo = $item[0];
            $modulo = $item[1];
            $permissao = $item[2];
            $add = new Operacao();
            $add->setIdgrupofk($grupo);
            $add->setIdModulofk($modulo);
            $add->setIdPermissaofk($permissao);
            $add->adicionar();
        }
    }

    if(isset($_GET['remove']) && $_GET['remove'] == true){
        $listaPermissao = Operacao::listar($_GET['idgrupo'], $_GET['idmodulo'],$_GET['idpermissao']);
        foreach($listaPermissao as $itemPermissao){
            $excluir= new Operacao($itemPermissao->getId());
            $excluir->excluir();
        }
    }

    $idgrupo = $_SESSION["idgrupo"];
    $modulos = Modulo::listar();
    if($modulos){
        foreach($modulos as $modulo) {
            echo "<h3>" . $modulo->getDescricao()."</h3>";
            $permissoes= Permissao::listar();
            if($permissoes){
                foreach($permissoes as $permissao) {
                    $verifica = Operacao::verificaPermissao($idgrupo, $modulo->getDiretorio(), $permissao->getAcao());

?>

<input <?php if($verifica){ echo "checked='disabled'";}?> type="checkbox" name="listaPermissao" value="<?php echo $idgrupo . "-" . $modulo->getIdmodulo() . "-" . $permissao->getIdpermissao();?>"/> <?php echo $permissao->getDescricao()?>
<?php 
                if($verifica){
                    echo "<a href='?idgrupo=".$idgrupo.
                    "&idmodulo=".$modulo->getIdmodulo().
                    "&idpermissao=".$permissao->getIdpermissao().
                    "&remove=true'>(x)</a>";
                }
?>
<?php
                }
            }
        }
    }  
?>
<input type="submit" name="atualizarPermissao" value="Salvar"/>
</form>