    <?php
    // Testar se vem de ClientController/add
    if(isset($clients) && !isset($_GET['keyword'])){
    ?>

    <!-- Busca form -->
    <br>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-8">
            <form action="<?=URL?>clients/index" method="get" >
            <div class="pull-right topo" style="padding-left: 0;">
                <span class="pull-right">  
                <label class="control-label" for="palavra" style="padding-right: 5px;">
                    <input type="text" value="" placeholder="nome ou parte" class="form-control" name="keyword">
                </label>
                </span>          
                <button class="btn btn-primary">Busca</button>&nbsp;      
           </div>
           </form>
        </div>
    </div>
    <br>

    <!-- Add form -->
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
    }elseif(isset($client) && !isset($_GET['keyword'])){
    // Testar se vem de ClientController/edit
        $action = 'edit';
        $id = isset($client->id) ? $client->id : null;
        $nome = isset($client->nome) ? $client->nome : null;
        $idade = isset($client->idade) ? $client->idade : null;
    ?>

    <!-- Edit form -->
    <br><br>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-7">
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

    if(isset($clients) && !isset($_GET['keyword'])){?>

    <!-- Listagem index -->
    <div class="text-center">
        <div class="row">
            <!-- Form de busca-->
	    </div>

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

    <?php
    // Busca
    if(isset($_GET['keyword'])){
        $keyword=$_GET['keyword'];

        require_once CORE.'Model.php';
        $model = new \Core\Model();

        $sql = "select * from clients WHERE nome LIKE :keyword order by id";
        $sth = $model->pdo->prepare($sql);
        $sth->bindValue(":keyword", $keyword."%");
        $sth->execute();
        $rows =$sth->fetchAll();

        print '<div class="container" align="center">';
        print '<h4>Registro(s) encontrado(s)</h4>';

        if(count($rows) > 0){
    ?>

        <div class="container" align="center">
            <table class="table table-striped table-sm table-bordered table-hover"> 
            <tr>
              <th>ID</th><th>Nome</th><th>Idade</th>
            </tr>
     
        <?php
            foreach ($rows as $row){
              print '<tr>';
                print '<td>'.$row->id.'</td><td>'.$row->nome.'</td><td>'.$row->idade.'</td>';
              print '</tr>';
            } 
            echo "</table>";

        }else{
            print '<h3>Nenhum Registro encontrado!</h3>';
        }
}
?>
