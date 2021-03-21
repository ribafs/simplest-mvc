# MVC Simples em PHP com banco de dados

Esta versão adiciona o suporte a vários controllers, models e views

## Estrutura de arquivos

- clients.php
- products.php
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
    - config.php
    - Model

## Fluxo das informações

Quando o index.php é chamado:

- Mostra dois links para "clients" e para "products"

Caso clique em clients

- Incluirá o ClientController
- Cria uma instância do mesmo
- E chama seu método index()

De forma semelhante ao clicar em products

Quando o ClientController é chamado:

- Ele inclui o ClientModel
- Instancia o model
- Chama seu método index(), que retorna o array $clients e armazena na variável $list;
- Então o Controller inclui a view App/views/clients/index.php, que mostrará o resultado recebido do model

Quando o ClientModel é chamado

- Ele include o Model pai em Core e extende Model
- Em seu método index() efetua uma consulta para trazer todos os registros da tabela clients
- E retorna a consulta na variável $clients, que será recebida pelo controller

Quando a view views/clients/index.php é chamada

- Mostra algum texto explicativo na tela
- Cria uma tabela HTML
- Joga na tabela o resultado de um for trazendo o array $list do Controller e mostra na tela os registros da tabela clients

De forma semelhante procedi com o ProductController e o ProductModel

No caso a View recebe do Controller e não diretamente do Model, o que é uma boa prática.

