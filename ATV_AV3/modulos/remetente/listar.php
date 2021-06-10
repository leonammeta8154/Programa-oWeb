<h1>Lista de Remetentes</h1></br>
<table>
    <tr>
        <th>Nº de Registro</th>
        <th>Remetente</th>
        <th>CPF/CNPJ</th>
        <th>CEP</th>
        <th>Endereço</th>
        <th>Estado</th>
        <th>Cidade</th>
        <th>Telefone</th>
        <th>Email</th>
        <th>Operação</th>
    </tr>
    <?php
        include('classes/Remetente.class.php');

        $lists = Remetente::listar();

        if($lists){
            foreach($lists as $list){
    ?>
    <tr>
        <td><?php echo $list->getIdremetente(); ?></td>
        <td><?php echo $list->getRemetente(); ?></td>
        <td><?php echo $list->getCpfcnpj(); ?></td>
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
            <button><a href="?modulo=remetente&acao=editar&id=<?php echo $list->getIdremetente(); ?>">Atualizar</a></button>
            <button><a href="?modulo=remetente&acao=excluir&id=<?php echo $list->getIdremetente(); ?>">Excluir</a></button>
        </td>
    </tr>
    <?php
            }
        }else{
            echo "<tr><td colspan='9'> Nenhum Registro Encontrado.</td></tr>";
        }
    ?>
</table>