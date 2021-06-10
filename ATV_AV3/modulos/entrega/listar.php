<h1>Entrega</h1><br/>
<table>
    <tr>
        <th>Nº de Registro</th>
        <th>Nº do Envio</th>
        <th>Status do Envio</th>
        <th colspan=2>Operação</th>
    </tr>
    <?php
        include('classes/Entrega.class.php');

        $lists = Entrega::listar();

        if($lists){
            foreach($lists as $list){
    ?>
    <tr>
        <td><?php echo $list->getIdentrega(); ?></td>
        <td><?php echo $list->getIdenviopk(); ?>
        <td><?php echo $list->getStatusenvio(); ?>
        <td><button><a href="?modulo=entrega&acao=editar&id=<?php echo $list->getIdentrega(); ?>">Atualizar</a></button></td>
        <td><button><a href="?modulo=entrega&acao=excluir&id=<?php echo $list->getIdentrega(); ?>">Excluir</a></button></td>
    </tr>
    <?php
            }
        }else{
            echo "<tr><td colspan='3'> Nenhum Registro Encontrado.</td></tr>";
        }
    ?>
</table>