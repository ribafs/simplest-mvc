<?php
//print_r($list);exit;
?>
<div class="container">
    <h2>Você está na view: App/views/clients/index.php</h2>
    <!-- add song form -->
    <div class="box">
        <h3>Lista de clientes</h3>

        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>Id</td>
                <td>Nome</td>
                <td>Idade</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($list as $client) { ?>
                <tr>
                    <td><?=$client['id']?></td>
                    <td><?=$client['nome']?></td>
                    <td><?=$client['idade']?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
