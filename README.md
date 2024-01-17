# Mobiphp Framework

## Introdução

O Mobiphp é um framework em PHP com JavaScript que estou desenvolvendo no intuito de facilitar a criação rápida de aplicações web completas ou ser utilizado como backend. Esta documentação fornece informações essenciais para começar a desenvolver com o Mobiphp.

## Pré-requisitos

Certifique-se de que sua máquina atenda aos seguintes pré-requisitos antes de começar:

1. **PHP**: O Mobiphp é um framework PHP, portanto, é necessário ter o PHP instalado em sua máquina. Recomendamos o uso de uma versão PHP 7.2 ou superior. Você pode baixar o PHP em [php.net](https://www.php.net/).

2. **Banco de Dados**:

   - Se você optar por usar o MySQL, certifique-se de ter um servidor MySQL instalado e configurado. Você pode obter o MySQL em [mysql.com](https://www.mysql.com/).

   - Se preferir o PostgreSQL, instale e configure um servidor PostgreSQL. Faça o download do PostgreSQL em [postgresql.org](https://www.postgresql.org/).

3. **Composer**: O Composer é uma ferramenta essencial para gerenciar as dependências do Mobiphp. Certifique-se de tê-lo instalado em sua máquina. Você pode baixar o Composer em [getcomposer.org](https://getcomposer.org/).

## Estrutura de Pastas

- **app**: Contém os componentes principais da aplicação.
  - **components**: Armazena os componentes reutilizáveis da aplicação.
  - **controllers**: Contém os controladores responsáveis pela lógica da aplicação.
  - **pages**: Guarda as páginas da aplicação.
  - **app.php**: Arquivo principal de configuração da aplicação.

- **config**: Configurações da aplicação.
  - **app.php**: Configurações gerais da aplicação.
  - **database.php**: Configurações de conexão com o banco de dados.
  - **prestart.php**: Arquivo de pré-inicialização.

- **core**: Núcleo do framework.
  - **class**: Classes principais do framework.
    - **application.php**: Classe de aplicação principal.
    - **mobi.php**: Classe principal do Mobiphp.
    - **root.php**: Classe de raiz.
    - **routes.php**: Casse para o tratamento das rotas da aplicação.
  - **database**: Classes de conexão com bancos de dados.
    - **mysql.php**: Classe para conexão com MySQL.
    - **pgsql.php**: Classe para conexão com PostgreSQL.
  - **js**: Arquivos JavaScript.
    - **controller.mobi.js**: Controlador JavaScript principal.
  - **json**: Arquivos JSON.
    - **routes.json**: Definição das rotas em formato JSON.
  - **php**: Scripts PHP.
    - **composer**: Scripts para facilitar a criação e exclusão de componentes e páginas.
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

O Mobiphp faz uso das seguintes bibliotecas e dependências, algumas das quais estão incorporadas diretamente no framework:

- **matthiasmullie**: Uma biblioteca PHP para manipulação de arquivos e diretórios. [matthiasmullie/github](https://github.com/matthiasmullie).

- **bootstrap**: Um framework front-end para design responsivo. Embora seja incorporado no Mobiphp, seu uso é opcional. [twbs/bootstrap](https://github.com/twbs/bootstrap).

- **page.js**: Uma biblioteca para roteamento no lado do cliente, facilitando a criação de Single Page Applications (SPAs).  [visionmedia/page.js](https://github.com/visionmedia/page.js).

- **jquery**: Uma biblioteca JavaScript para manipulação do DOM. Assim como o Bootstrap, o jQuery é incluído no Mobiphp, mas seu uso é opcional. [jquery/jquery](https://github.com/jquery/jquery)

Ao utilizar o Mobiphp, você tem a flexibilidade de incorporar o Bootstrap e o jQuery em seus projetos ou substituí-los por outras bibliotecas de sua preferência.

Certifique-se de revisar a documentação oficial de cada biblioteca para obter informações detalhadas sobre sua utilização e configuração.

## Instalação

- Faça a instalação inicial do Mobiphp baixando o pacote e descompactando-o no diretório PHP desejado.

## Criação de Páginas
- O Mobiphp simplifica a criação de páginas de maneira automática através do Composer.
- Utilize o comando: **composer mobi-create-page nome-da-pagina nome-da-rota**
- Ao executar este comando, a pasta da página será criada e a rota será configurada em core/json/routes.json.
- A estrutura da pasta criada é a seguinte:

  ## Estrutura da Página Criada
  - **app**
     - **pages**
        - **Novapagina**: pasta da página
        - **Novapagina.controller.php**: scripts de controle da página
        - **Novapagina.css**: folha de estilo CSS
        - **Novapagina.js**: arquivo JavaScript da página
        - **Novapagina.view.php**: página de visualização

- Para **excluir uma página**, utilize o comando **composer mobi-delete-page nome-da-pagina**.

## Criação de Componentes

A utilização de componentes oferece uma maneira simples e eficiente de reutilizar código em sua aplicação. Para criar um componente, basta seguir os passos abaixo:

- Utilize o comando: **composer mobi-create-component nome-do-componente**
- Com a execução deste comando, o componente será criado automaticamente dentro da pasta **components**.

  ## Estrutura do Componente Criado
  - **app**
     - **components**
        - **Novocomponente**: pasta do componente
        - **Novocomponente.controller.php**: scripts de controle do componente
        - **Novocomponente.css**: folha de estilo CSS
        - **Novocomponente.js**: arquivo JavaScript do componente
        - **Novocomponente.view.php**: página de visualização do componente

  ## Configurando o Componente em uma Página
  - Para que o componente funcione perfeitamente na aplicação, siga as etapas abaixo:
  - Supondo que você deseje inserir o **Novocomponente** dentro da **Novapagina**, abra o arquivo **Novapagina.controller.php** e adicione o nome do componente à array **component**.

    **Exemplo**: "components" => [ _'Novocomponente'_ ],

  - Após adicionar, abra o arquivo **Novapagina.view.php** e insira o componente usando o comando **$mobi->components([ _'novapagina'_ ])** no local desejado para que o componente seja exibido.
