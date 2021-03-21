<div class="text-center">
    <br>
    <b>Você está na view: App/views/clients/index.php</b>
    <br><br>
        <h3>Editar clientes</h3>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form action="<?php echo URL; ?>clients/update" method="POST">
                    <table>
                    <tr><td><label>Nome </label></td>
                    <td><input type="text" name="nome" value="<?php echo htmlspecialchars($client->nome, ENT_QUOTES, 'UTF-8'); ?>" required /></td></tr>
                    <tr><td><label>Idade </label></td>
                    <td><input type="text" name="idade" value="<?php echo htmlspecialchars($client->idade, ENT_QUOTES, 'UTF-8'); ?>" required /></td></tr>
                    <input type="hidden" name="id" value="<?=htmlspecialchars($client->id, ENT_QUOTES, 'UTF-8')?>" />
                    <tr><td></td><td><input type="submit" name="submit_update_client" value="Atualizar" class="btn btn-success"/></td></tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
