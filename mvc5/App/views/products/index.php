<?php
//print_r($list);exit;
?>
<div class="container">
    <h2>Você está na view: App/views/product/index.php</h2>
    <!-- add song form -->
    <div class="box">
        <h3>Lista de produtos</h3>

        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>Id</td>
                <td>Nome</td>
                <td>Preço</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($list as $product) { ?>
                <tr>
                    <td><?=$product['id']?></td>
                    <td><?=$product['nome']?></td>
                    <td><?=$product['preco']?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
