<?php
// Testar se vem de ClientController/add
if(isset($clients)){
?>
    <br>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-8">
            <form action="<?=URL?>clients/add?>" method="POST">                                
                <input type="text" name="nome" value="" required placeholder="Nome"/>
                <input type="text" name="idade" value="" required placeholder="Idade"/>
                <input type="submit" name="submit_add_client" value="Adicionar" class="btn btn-primary"/>
            </form>
        </div>
    </div>
<?php 
}elseif(isset($client)){
// Testar se vem de ClientController/edit
    $action = 'edit';
    $id = isset($client->id) ? $client->id : null;
    $nome = isset($client->nome) ? $client->nome : null;
    $idade = isset($client->idade) ? $client->idade : null;
?>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-8">
            <form action="<?=URL?>clients/update?>" method="POST">                                
                <input type="text" name="nome" value="<?=$nome?>" required placeholder="Nome"/>
                <input type="text" name="idade" value="<?=$idade?>" required placeholder="Idade"/>
                <input type="hidden" name="id" value="<?=$id?>" />
                <input type="submit" name="submit_update_client" value="Atualizar" class="btn btn-primary"/>
            </form>
        </div>
    </div>
<?php 
}

if(isset($clients)){?>
    <div class="text-center">
        <br><br>
        <h3>Lista de clientes</h3>
        <table class="table table-striped table-sm table-bordered table-hover"> 
            <thead class="bg-dark text-white">
            <tr>
                <td><b>Id</td>
                <td><b>Nome</td>
                <td><b>Idade</td>
                <td colspan="2"><b>Ação</td>
            </tr>
            </thead>
            <tbody>
            <?php 
                foreach ($clients as $client) { ?>
                <tr class="table-success">
                    <td><?php if (isset($client->id)) echo $client->id; ?></td>
                    <td><?php if (isset($client->nome)) echo $client->nome; ?></td>
                    <td><?php if (isset($client->idade)) echo $client->idade; ?></td>
                    <td><a href="<?php echo URL . 'clients/edit/' . $client->id;?>">Editar</a></td>
                    <td><a href="<?=URL . 'clients/delete/' . $client->id?>">Excluir</a></td>
                </tr>
            <?php 
                } 
            } ?>
            </tbody>
        </table>
    </div>
</div>
