    <div class="text-center">
<br>
    <b>Você está na view: App/views/clients/index.php</b>
<br><br>

        <h3>Lista de clientes</h3>

        <table class="table table-striped table-sm table-bordered table-hover">
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>Id</td>
                <td>Nome</td>
                <td>Idade</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($list as $client) { ?>
                <tr class="table-success">
                    <td><?=$client['id']?></td>
                    <td class="bg-success"><?=$client['nome']?></td>
                    <td><?=$client['idade']?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
