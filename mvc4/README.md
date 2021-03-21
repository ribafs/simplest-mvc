# MVC Simples em PHP ccm banco de dados

## Este versão implementa o autoload com composer e PSR-4.

Assim não precisaremos estar usando requires, mas em seu lugar usaremos namespace, que é mais tranquilo e profissional.

Foram criados dois namespaces: App e Core, cada um aponta para a pasta com o mesmo nome. Assim fica mais fácil de lembrar qual a pasta de certo namespace.

Após a criação do composer e conclusão do aplicativo, inclusive adicionando os namespaces, então precisamos executar no raiz do aplicativo:

composer du

E executar novamente sempre que alterar o composer.json

## Estrutura de arquivos

- composer.json
- index.php
- db.sql
- App
    - Controllers
        - ClientController
        - ProductController
    - Models
        - ClientModel
    - views
        - clients/index.php
        - products/index.php
- Core
    - Model

## Fluxo das informações

Quando o index.php é chamado:

- Mostra dois links para "clients" e para "products"
- Inclui o autoload

Se o link clients tiver sido chamado

- Instanciará o ClientController
- E chamará seu método index()

De forma semelhante se products for clicado

Quando o ClientController é chamado:

- Na versão anterior ele incluiu o ClientModel. 
    - Agora adicionamos o namespace na primeira linha 
    - E cada include é substituido por um "use". Veja como ficou agora no ClientController
        namespace App\Controllers;
        use App\Models\ClientModel;
- O restando do código permanece
- Instancia o model
- Chama seu método index(), que retorna o array $clients e armazena na variável $list;
- Então o Controller inclui a view App/views/clients/index.php, que mostrará o resultado recebido do model

Quando o ClientModel é chamado

- Adiciona namespace e troca include por use
- Em seu método index() efetua uma consulta para trazer todos os registros da tabela clients
- E retorna a consulta na variável $clients, que será recebida pelo controller

Quando a view views/clients/index.php é chamada

- Mostra algum texto explicativo na tela
- Cria uma tabela HTML
- Joga na tabela o resultado de um for trazendo o array $list do Controller e mostra na tela os registros da tabela clients

De forma semelhante procedi com o ProductController e o ProductModel

No caso a View recebe do Controller e não diretamente do Model, o que é uma boa prática.


