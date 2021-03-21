# MVC Simples em PHP com banco de dados

O mais simples possível, com apenas um controller e um model.

## Arquivos

index.php
Controller.php
Model.php
views/index.php
db.sql

## Fluxo das informações

Quando o index.php é chamado:

- inclui o Controller.php
- Instancia o Controller
- Chama seu método index()

Então o Controller é chamado:

- Ele inclui o Model
- Instancia o model
- Chama seu método index(), que retorna o array $clients e armazena na variável $list;
- Então o Controller inclui o index.php da view.

Quando o Model é chamado

- Ele define um array multi dimensional na variável $clients e insere 4 clientes, com código, nome e idade
- Retorna em seu método index() este array
- Este array é recebido pelo Controller

Quando o index.php é chamado

- Mostra algum texto explicativo na tela
- Cria uma tabela HTML
- Joga na tabela o resultado de um for trazendo o array $list, vindo do Controller, que recebeu do Model

No caso a View recebe do Controller e não diretamente do Model, o que é uma boa prática.


