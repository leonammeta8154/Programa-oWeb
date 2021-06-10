<h1>Lista de Destinatários</h1></br>
<table>
    <tr>
        <th>Nº de Registro</th>
        <th>Destinatário</th>
        <th>CPF</th>
        <th>CEP</th>
        <th>Endereço</th>
        <th>Estado</th>
        <th>Cidade</th>
        <th>Telefone</th>
        <th>Email</th>
        <th>Operação</th>
    </tr>
    <?php
        include('classes/Destinatario.class.php');

        $lists = Destinatario::listar();

        if($lists){
            foreach($lists as $list){
    ?>
    <tr>
        <td><?php echo $list->getIddestinatario(); ?></td>
        <td><?php echo $list->getDestinatario(); ?></td>
        <td><?php echo $list->getCpf(); ?></td>
        <td><?php echo $list->getCep(); ?></td>
        <td><?php 
                echo $list->getLogradouro() . ", "
                . $list->getNumero() . " - "
                . $list->getBairro();
        ?></td>
        <td><?php echo $list->getEstado(); ?></td>
        <td><?php echo $list->getCidade(); ?></td>
        <td><?php echo $list->getTelefone(); ?></td>
        <td><?php echo $list->getEmail(); ?></td>
        <td>
            <button><a href="?modulo=destinatario&acao=editar&id<?php echo $list->getIddestinatario(); ?>">Atualizar</a></button>
            <button><a href="?modulo=destinatario&acao=excluir&id=<?php echo $list->getIddestinatario(); ?>">Excluir</a></button>
        </td>
    </tr>
    <?php
            }
        }else{
            echo "<tr><td colspan='9'> Nenhum Registro Encontrado.</td></tr>";
        }
    ?>
</table>