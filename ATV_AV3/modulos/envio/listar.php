<h1>Lista de Envios</h1></br>
<table>
    <tr>
        <th>Nº de Registro</th>
        <th>Nº do Remetente</th>
        <th>Nº da Mercadoria</th>
        <th>N° do Destinatário</th>
        <th>Tipo de Envio</th>
        <th colspan=2>Operação</th>
    </tr>
    <?php
        include('classes/Envio.class.php');

        $lists = Envio::listar();

        if($lists){
            foreach($lists as $list){
    ?>
    <tr>
        <td><?php echo $list->getIdenvio(); ?></td>
        <td><?php echo $list->getIdremetentepk(); ?></td>
        <td><?php echo $list->getIdmercadoriapk(); ?></td>
        <td><?php echo $list->getIddestinatariopk(); ?></td>
        <td><?php echo $list->getTipoenvio(); ?></td>
        <td><button><a href="?modulo=envio&acao=editar&id=<?php echo $list->getIdenvio(); ?>">Atualizar</a></button></td>
        <td><button><a href="?modulo=envio&acao=excluir&id=<?php echo $list->getIdenvio(); ?>">Excluir</a></button></td>
    </tr>
    <?php
            }
        }else{
            echo "<tr><td colspan='5'> Nenhum Registro Encontrado.</td></tr>";
        }
    ?>
</table>