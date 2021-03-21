<div class="container text-center">
    <div align="center">
    <h2 class="text-center">Clientes</h2>
	<a class="btn btn-primary btn-sm" href="<?=URL . 'clientes/add'; ?>">Add Cliente</a>

    <div>
        <br>        
        <b>Lista de clientes (dados vindos do model)</b><div class="text-right"><b>Soma de clientes: <?php echo $soma; ?></b></div>
        <table class="table table-hover table-stripped text-center">
            <thead>
            <tr class="bg-gray">
                <td><b>ID</b></td>
                <td><b>Nome</b></td>
                <td><b>E-mail</b></td>
                <td colspan="2" align="center">AÇÕES</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($todos as $cliente) { ?>
                <tr>
                    <td><?php if (isset($cliente->id)) echo htmlspecialchars($cliente->id, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($cliente->nome)) echo htmlspecialchars($cliente->nome, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($cliente->email)) echo htmlspecialchars($cliente->email, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><a href="<?php echo URL . 'clientes/delete/' . htmlspecialchars($cliente->id, ENT_QUOTES, 'UTF-8'); ?>">delete</a></td>
                    <td><a href="<?php echo URL . 'clientes/edit/' . htmlspecialchars($cliente->id, ENT_QUOTES, 'UTF-8'); ?>">edit</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    </div>
</div>
