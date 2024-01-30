# MobiPHP

<p align="center">
  <img src="https://raw.githubusercontent.com/jandersongarcia/MobiPHP/main/public/assets/images/mobi-logo.png" alt="MobiPHP">
</p>

O **MobiPHP** é um framework em PHP com JavaScript projetado para simplificar a criação rápida de aplicações web completas ou atuar como backend. Esta documentação fornece informações essenciais para iniciar o desenvolvimento com o MobiPHP.

# Sumário

- [MobiPHP](#mobiphp)
  - [Pré-requisitos](#pré-requisitos)
  - [Estrutura de Pastas](#estrutura-de-pastas)
  - [Dependências e Bibliotecas](#dependências-e-bibliotecas)
  - [Instalação](#instalação)
  - [Criação de Páginas](#criação-de-páginas)
  - [Trabalhando com Rotas](#trabalhando-com-rotas)
  - [Criação de Componentes](#criação-de-componentes)
  - [Criação de Módulos](#criação-de-módulos)
  - [Módulo de CRUD](#módulo-de-crud)
    - [Configuração do Banco de Dados](#configuração-do-banco-de-dados)
    - [Exemplo de Uso](#exemplo-de-uso)
    - [Exemplo de Uso com Consulta SQL Personalizada](#exemplo-de-uso-com-consulta-sql-personalizada)
    - [Métodos Disponíveis](#métodos-disponíveis)
  - [Temas Prontos](#temas-prontos)
  - [Requisições com JavaScript](#requisições-com-javascript)
  - [Contribuição](#contribuição)
  - [Licença](#licença)

## Pré-requisitos

Antes de começar, certifique-se de que sua máquina atenda aos seguintes pré-requisitos:

1. **PHP**: O MobiPHP é baseado em PHP; portanto, é necessário ter o PHP instalado, recomendando-se a versão 7.2 ou superior. [Baixe o PHP](https://www.php.net/).

2. **Banco de Dados**:

   - Para MySQL, certifique-se de ter um servidor MySQL instalado e configurado. [Baixe o MySQL](https://www.mysql.com/).

   - Se preferir o PostgreSQL, instale e configure um servidor PostgreSQL. [Baixe o PostgreSQL](https://www.postgresql.org/).

3. **Composer**: O Composer é uma ferramenta essencial para gerenciar as dependências do MobiPHP. [Baixe o Composer](https://getcomposer.org/).

## Estrutura de Pastas

- **app**: Contém os componentes principais da aplicação.
  - **components**: Armazena os componentes reutilizáveis.
  - **modules**: Contém os módulos para interação com o backend.
  - **pages**: Guarda as páginas da aplicação.
  - **app.php**: Arquivo principal de configuração.

- **config**: Configurações da aplicação.
  - **app.php**: Configurações gerais.
  - **database.php**: Configurações de conexão com o banco de dados.
  - **prestart.php**: Arquivo de pré-inicialização.

- **core**: Núcleo do framework.
  - **class**: Classes principais do framework.
    - **application.php**: Classe de aplicação principal.
    - **mobi.php**: Classe principal do MobiPHP.
    - **root.php**: Classe de raiz.
    - **routes.php**: Classe para o tratamento de rotas.
  - **database**: Classes de conexão com bancos de dados.
    - **mysql.php**: Classe para conexão com MySQL.
    - **pgsql.php**: Classe para conexão com PostgreSQL.
  - **js**: Arquivos JavaScript.
    - **routes.mobi.js**: Controlador JavaScript principal.
    - **request.mobi.js**: Tratamento de requisições via GET e POST
  - **json**: Arquivos JSON.
    - **routes.json**: Definição de rotas em formato JSON.
  - **php**: Scripts PHP.
    - **composer**: Scripts para criação e exclusão de componentes e páginas.
    - **controller**: Scripts para gerar arquivos CSS e JavaScript.
    - **pages**: Páginas específicas.
    - **start.php**: Arquivo de inicialização.

- **languages**: Traduções da aplicação.
  - **pt-br.php**: Tradução para o português brasileiro.

- **node_modules**: Dependências Node.js.

- **public**: Recursos públicos acessíveis pelo navegador.
  - **assets**: Ícones e imagens.
  - **css**: Estilos da aplicação.
    - **styleRoot.css**: Estilo principal.
  - **error**: Páginas de erro.
    - **403.php**: Página de erro 403 (Acesso Negado).
    - **404.php**: Página de erro 404 (Não Encontrado).
  - **js**: Scripts JavaScript.
    - **styleRoot.js**: Script JavaScript principal.

- **vendor**: Dependências PHP.

- **.htaccess**: Configurações do Apache.

- **composer.json**, **composer.lock**: Configurações e bloqueio de versões para o Composer.

- **index.php**: Ponto de entrada da aplicação.

- **package-lock.json**, **package.json**: Configurações do Node.js.

- **robots.txt**: Arquivo de exclusão de robôs.

## Dependências e Bibliotecas

O MobiPHP faz uso das seguintes bibliotecas e dependências, algumas incorporadas diretamente:

- **matthiasmullie**: Biblioteca PHP para manipulação de arquivos e diretórios. [matthiasmullie/github](https://github.com/matthiasmullie).

- **bootstrap**: Framework front-end para design responsivo, opcionalmente incorporado no MobiPHP. [twbs/bootstrap](https://github.com/twbs/bootstrap).

- **bootstrap-icons**: Conjunto de ícones para uso com Bootstrap. [twbs/bootstrap-icons](https://github.com/twbs/bootstrap-icons).

- **navigo.js**: Biblioteca para roteamento no lado do cliente, simplificando a construção de Single Page Applications. [krasimir/navigo](https://github.com/krasimir/navigo).

- **jquery**: Biblioteca JavaScript para manipulação do DOM, opcionalmente incorporada no MobiPHP. [jquery/jquery](https://github.com/jquery/jquery)

Ao utilizar o MobiPHP, você tem a flexibilidade de incorporar o Bootstrap e o jQuery ou substituí-los por outras bibliotecas.

Certifique-se de revisar a documentação oficial de cada biblioteca para obter informações detalhadas sobre sua utilização e configuração.

## Instalação

- Antes de criar o projeto, certifique-se de que sua máquina local tenha **PHP** e **Composer** instalados.
- Depois de instalados, você pode criar um novo projeto através do _create-project_ comando do Composer:

```bash
composer create-project --stability=dev jandersongarcia/mobi-php nome-do-projeto
```

## Criação de Páginas

O MobiPHP simplifica a criação de páginas automaticamente através do Composer.

```bash
composer mobi-create-page nome-da-pagina nome-da-rota
```

- Isso criará a pasta da página e configurará a rota em core/json/routes.json.
- A estrutura da pasta criada é a seguinte:

### Estrutura da Página Criada
- **app**
    - **pages**
      - **Novapagina**: pasta da página
        - **Novapagina.controller.php**: scripts de controle da página
        - **Novapagina.css**: folha de estilo CSS
        - **Novapagina.js**: arquivo JavaScript da página
        - **Novapagina.view.php**: página de visualização

- Para **excluir uma página**, utilize o comando.
```bash
composer mobi-delete-page nome-da-pagina
```

## Trabalhando com Rotas
- Para utilizar as rotas, basta colocar o caminho dentro de um link.
- Supondo que temos as rotas 'product' e 'product/form' para chamar em links diferentes, ficaria assim:

```html
  <a href="/product" >Listar Produtos</a>
  <a href="/product/form" >Cadastrar Produto</a>_
```
### Criação de subrotas
- No caso de subrotas, podemos informar o caminho na criação da página.
- **Por exemplo**: Se precisar uma subrota _empresa/cadastro_, o comando seria

```bash
composer mobi-create-page nome-da-pagina empresa/cadastro
```

### Listar Rotas
- Caso precise listar as rotas da sua aplicação, poderá utilizar o comando **composer mobi-list-routes** ou acessa-las diretamente no arquivo json que fica em _core/json/routes.json_.

```bash
composer mobi-list-routes
```

### Renomear rota
- Para alterar o nome de uma rota, use o comando **composer mobi-rename-route rota-atual nova-rota**
- Por exemplo: Supondo que precise alterar a rota _product_ para _register_, o comando ficaria o seguinte: **composer mobi-rename-route product register**

```bash
composer mobi-rename-route rota-antiga nova-rota
```

## Criação de Componentes

A utilização de componentes oferece uma maneira simples e eficiente de reutilizar código.
- Utilize o comando:

```bash
composer mobi-create-component nome-do-componente
```
- Isso criará o componente automaticamente dentro da pasta **components**.

### Estrutura do Componente Criado
- **app**
    - **components**
      - **Novocomponente**: pasta do componente
        - **Novocomponente.controller.php**: scripts de controle do componente
        - **Novocomponente.css**: folha de estilo CSS
        - **Novocomponente.js**: arquivo JavaScript do componente
        - **Novocomponente.view.php**: página de visualização do componente

## Criação de Módulos
- Os módulos são úteis para interação com o backend via requisição.
- Os arquivos do módulo serão criados dentro do diretório modules.
- Utilize o comando:

```bash
composer mobi-create-module nome-do-modulo
```

### Estrutura do Módulo Criado
- **app**
  - **modules**
    - **Novomodulo**: pasta do módulo
      - **Novomodulo.controller.php**: scripts de controle
      - **Novomodulo.modal.php**: página de modal

## Módulo de CRUD
O CRUD (Create, Read, Update, Delete) do MobiPHP facilita a manipulação de dados em um banco de dados MySQL ou PostgreSQL. Este, fornece métodos para realizar estas operações de forma eficiente, eliminando a necessidade de escrever consultas SQL manualmente.

### Configuração do Banco de Dados

Antes de utilizar o módulo de CRUD, é necessário configurar as informações do banco de dados no arquivo `database.php` dentro da pasta `config`. Certifique-se de fornecer as informações corretas de acordo com o banco de dados que você está utilizando (MySQL ou PostgreSQL).

```php
// Exemplo de configuração para MySQL
'app_data_type' => 'mysql',
'mysql' => [
    'driver' => 'mysql',
    'host' => 'localhost',
    'port' => '3306',
    'database' => 'mobidb',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
],

// Exemplo de configuração para PostgreSQL
'app_data_type' => 'pgsql',
'pgsql' => [
    'driver' => 'pgsql',
    'host' => 'localhost',
    'port' => '5432',
    'database' => '',
    'username' => '',
    'password' => '',
    'charset' => 'utf8',
    'schema' => 'public',
],
```

## Exemplo de Uso

A seguir, apresentamos um exemplo didático de como utilizar o módulo de CRUD em um ambiente MySQL. O mesmo princípio se aplica ao PostgreSQL, ajustando apenas a configuração do banco de dados.

```php
<?php
use Sql\MySQL;

class ExemploCRUD extends MySQL
{
    // Métodos CRUD podem ser implementados aqui
}

// Exemplo de uso do CRUD MySQL
$crud = new ExemploCRUD();

// Inserir um novo registro
$dataToInsert = ['campo1' => 'valor1', 'campo2' => 'valor2'];
$resultInsert = $crud->insert('nome_tabela', $dataToInsert);
echo $resultInsert;

// Obter todos os registros
$resultSelectAll = $crud->getAll('nome_tabela');
echo $resultSelectAll;

// Obter um registro por ID
$resultSelectById = $crud->getById('nome_tabela', 'id', 1);
echo $resultSelectById;

// Atualizar um registro
$dataToUpdate = ['campo1' => 'novo_valor1', 'campo2' => 'novo_valor2'];
$resultUpdate = $crud->update('nome_tabela', $dataToUpdate, 1);
echo $resultUpdate;

// Excluir um registro
$resultDelete = $crud->delete('nome_tabela', 1);
echo $resultDelete;
```

Certifique-se de substituir `'nome_tabela'`, `'campo1'`, `'campo2'`, etc., com os valores correspondentes ao seu banco de dados.

### Exemplo de Uso com Consulta SQL Personalizada

Para realizar uma consulta SQL personalizada simples, você pode utilizar o método `query` do módulo de CRUD do MobiPHP. Vamos exemplificar a execução de uma consulta SELECT básica.

```php
<?php

// Consulta SQL simples
$sqlQuerySimples = "SELECT * FROM tabela_exemplo WHERE coluna_condicao = ?";
$queryParamsSimples = ['valor_condicao'];

$resultSimples = $crud->query($sqlQuerySimples, $queryParamsSimples);

// Exibir os resultados da consulta SQL simples
echo $resultSimples;
```

Este exemplo executa uma consulta SQL simples utilizando um WHERE com um parâmetro de condição.

### Consultas SQL Mais Complexas

Para consultas mais complexas que envolvem INNER JOIN, ORDER BY e GROUP BY, você pode construir de acordo com suas necessidades. A seguir, apresentamos um exemplo que combina esses elementos.

```php
<?php

// Consulta SQL complexa com INNER JOIN, ORDER BY e GROUP BY
$sqlQueryComplexa = "SELECT usuarios.nome AS nome_usuario, COUNT(pedidos.id) AS total_pedidos
                     FROM usuarios
                     INNER JOIN pedidos ON usuarios.id = pedidos.id_usuario
                     WHERE usuarios.cidade = ?
                     GROUP BY usuarios.nome
                     ORDER BY total_pedidos DESC";

$queryParamsComplexa = ['Sao Paulo'];

$resultComplexa = $crud->query($sqlQueryComplexa, $queryParamsComplexa);

// Exibir os resultados da consulta SQL complexa
echo $resultComplexa;
```

Neste exemplo:

- Realizamos um INNER JOIN entre as tabelas `usuarios` e `pedidos`.
- Utilizamos um WHERE para filtrar por uma condição específica (cidade dos usuários).
- Aplicamos um GROUP BY para contar o total de pedidos por usuário.
- Utilizamos ORDER BY para ordenar os resultados pelo total de pedidos em ordem decrescente.

Todas as respostas desses métodos são fornecidas em formato JSON para facilitar a manipulação dos dados por outras linguagens, como o JavaScript.

## Métodos Disponíveis

A seguir, estão os métodos disponíveis no módulo de CRUD:

### `insert($table, $data)`

Insere dados em uma tabela e retorna um JSON indicando sucesso ou falha na inserção.

### `getAll($table)`

Obtém todos os registros de uma tabela e retorna um JSON.

### `getById($table, $primaryKey, $id)`

Obtém um registro por ID de uma tabela e retorna um JSON.

### `update($table, $data, $id)`

Atualiza um registro em uma tabela e retorna um JSON indicando sucesso ou falha na atualização.

### `delete($table, $id)`

Exclui um registro de uma tabela e retorna um JSON indicando sucesso ou falha na exclusão.

### `query($sql, $params)`

Executa uma consulta SQL personalizada e retorna os resultados em JSON.

Lembre-se de adaptar os exemplos conforme necessário para atender aos requisitos específicos da sua aplicação. Este é apenas um guia inicial para o uso do módulo de CRUD no MobiPHP. Para obter informações detalhadas sobre outros métodos ou personalizações avançadas, consulte a documentação oficial do MobiPHP.

## Temas Prontos

- A criação de algumas telas como login e painel adminstrativo são padrões em todo o sistema. Pensando nestas situações, o Mobi-PHP tem alguns temas que podem ser instalados em sua aplicação apenas com um comando.
- Os temas são instalados em componentes e podem ser alterados e conforme a necessidade;

Painel administrativo:
```bash
composer mobi-theme-install panel-admin nome-do-componente
```

## Requisições com JavaScript
Para simplificar o processo de envio de solicitações via POST ou GET em JavaScript, recomendo a utilização da biblioteca Mobi-Request. Essa pequena biblioteca já está pré-instalada por padrão no Mobi. [Documentação][https://github.com/jandersongarcia/mobiRequest]

## Contribuição

Contribuições são bem-vindas! Sinta-se à vontade para abrir issues ou enviar pull requests para melhorar o Mobi Request.

## Licença

Este projeto é licenciado sob a [Licença MIT](LICENSE).
