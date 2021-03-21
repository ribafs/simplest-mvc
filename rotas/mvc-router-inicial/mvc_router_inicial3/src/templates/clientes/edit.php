<div class="container">
    <div align="center">
    <h2 class="text-center">Clientes</h2>
    <div>
		<br><br>
        <form action="<?php echo URL; ?>clientes/update" method="POST">   
        <table class="table table-hover table-stripped">
            <tr><td><label>Nome</label></td>
            <td><input class="form-control" type="text" name="nome" value="<?php echo htmlspecialchars($um->nome, ENT_QUOTES, 'UTF-8'); ?>" required autofocus/></td></tr>
            <td><label>E-mail</label></td>
            <td><input class="form-control" type="email" name="email" value="<?php echo htmlspecialchars($um->email, ENT_QUOTES, 'UTF-8'); ?>" required /></td></tr>
            <input type="hidden" name="cliente_id" value="<?php echo htmlspecialchars($um->id, ENT_QUOTES, 'UTF-8'); ?>" />
            <tr><td></td><td><input type="submit" name="submit_update_cliente" value="Update Cliente" class="btn btn-primary btn-sm"/></td></tr>
		</table>
        </form>
    </div>
    </div>
</div>
<br><br><br>
