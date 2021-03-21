# MVC Simples em PHP com banco de dados

## Requisitos

PHP 5.6 ou superior

MySQL

## Testado em

- Windows 10 com PHP 8
- Linux Mint com PHP 7.4

Nesta versão estarei criando um CRUD completo. Até agora estivemos trabalhando somente com o método index. Agora estaremos adicionando o edit, o new e o delete. Assim teremos um aplicativo funcional e útil.

Além do CRUD, criei uma interface do tipo master-details. Fica muito prático para o usuário, realizar todas as operações na mesma tela.

Troquei o CSS original pelo Bootstrap 4.

Um sistema de rotas simples foi implementado, o front controller e mais alguns bosn recursos.

Agora temos nosso MVC em PHP completo. Isso do meu ponto de vista, pois ao meu ver a sua criação teve a finalidade de nos ensinar a usar alguns dos bons e importantes recursos encontrados nos grandes frameworks: PHPOO, MVC, Rotas, Front Controller, autoload com composer e PSR-4, entre outros. Me parece que um grande framework como o Laravel já nos entre o que existe de melhor pronto, babsta usar. Claro que você pode aproveitar o que fizemos e ir em frente, escolha sua. 

## Estrutura de arquivos

- composer.json
- db.sql
- .htaccess
- public
    - .htaccess
    - css
    - img
    - js
    - index.php
- App
    - Controllers
        - ClientController
        - ProductController
    - Models
        - ClientModel
    - views
        - clients
            - index.php
        - error
            - index.php
        - products
            - index.php
        - templates
            - footer.php
            - header.php
- Core
    - config.php
    - ErrorController
    - Model
    - Router

## Fluxo das informações

- Veja que não mais existe um index.php. Quando alguém chega no raiz de mvc5 é redirecionado para a apsta public pelo .htaccess

- Quando chega na pasta public será redirecionado para o public/index.php pelo public/.htaccess

Quando o public/index.php é chamado

- Ele define algumas constantes para o aplicativo
- Inclui o autoload
- Inclui o Core/config.php, que também define outras constanes importantes
- Então inclui a classe Core/Router através do use
- Instancia a classe Router. Veja que esta classe tem dois métodos, o construct e o Url(), mas ela chama o Url() dentro do __construct(), portanto logo que a classe Router é instanciada todo o seu código é executado e está disponível, no caso o tratamento das rotas acessadas pelo usuário.
- A captura da URL digitada é feita pelo método Url(), que é executado inicialmente pelo __construct() e então testado, para que de acordo com a URL acessar o respectivo controller.
- Veja que se alguém chama o "clients" pela URL o Router dispara o ClientController, de forma semelhante, se for chamada "products" o ProductController será disparado. Caso a URL digitada ou chamada via link não seja para clients nem para products será disparado o ErrorController.

Quando o ClientController é chamado:

- Na versão anterior ele incluiu o ClientModel. 
    - Agora adicionamos o namespace na primeira linha 
    - E cada include é substituido por um "use". Veja como ficou agora no ClientController
        namespace App\Controllers;
        use App\Models\ClientModel;
- O restando do código permanece
- Instancia o model
- Chama seu método index(), que retorna o array $clients e armazena na variável $list;
- Então o Controller inclui a view App/views/clients/index.php com o respectivo template, que mostrará o resultado recebido do model

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

## Referências

Este aplicativo foi criado do "zero", mas com consulta de muita coisa ao ótimo aplicativo 

https://github.com/panique/mini3

Claro que aprendi muito em sua criação, consultando via Google.

