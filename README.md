# Mobiphp Framework

## Introdução

O Mobiphp é um framework em PHP com JavaScript desenvolvido para simplificar a criação rápida de aplicações web completas ou servir como backend. Esta documentação fornece informações essenciais para começar a desenvolver com o Mobiphp.

## Pré-requisitos

Antes de começar, certifique-se de que sua máquina atenda aos seguintes pré-requisitos:

1. **PHP**: O Mobiphp é um framework PHP, portanto, é necessário ter o PHP instalado, recomendando-se a versão 7.2 ou superior. [Baixe o PHP](https://www.php.net/).

2. **Banco de Dados**:

   - Se optar pelo MySQL, assegure-se de ter um servidor MySQL instalado e configurado. [Baixe o MySQL](https://www.mysql.com/).

   - Se preferir o PostgreSQL, instale e configure um servidor PostgreSQL. [Baixe o PostgreSQL](https://www.postgresql.org/).

3. **Composer**: O Composer é uma ferramenta essencial para gerenciar as dependências do Mobiphp. [Baixe o Composer](https://getcomposer.org/).

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
    - **mobi.php**: Classe principal do Mobiphp.
    - **root.php**: Classe de raiz.
    - **routes.php**: Classe para o tratamento de rotas.
  - **database**: Classes de conexão com bancos de dados.
    - **mysql.php**: Classe para conexão com MySQL.
    - **pgsql.php**: Classe para conexão com PostgreSQL.
  - **js**: Arquivos JavaScript.
    - **controller.mobi.js**: Controlador JavaScript principal.
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

O Mobiphp faz uso das seguintes bibliotecas e dependências, algumas incorporadas diretamente:

- **matthiasmullie**: Biblioteca PHP para manipulação de arquivos e diretórios. [matthiasmullie/github](https://github.com/matthiasmullie).

- **bootstrap**: Framework front-end para design responsivo, opcionalmente incorporado no Mobiphp. [twbs/bootstrap](https://github.com/twbs/bootstrap).

- **bootstrap-icons**: Conjunto de ícones para uso com Bootstrap. [twbs/bootstrap-icons](https://github.com/twbs/bootstrap-icons).

- **page.js**: Biblioteca para roteamento no lado do cliente, facilitando a criação de Single Page Applications (SPAs). [visionmedia/page.js](https://github.com/visionmedia/page.js).

- **jquery**: Biblioteca JavaScript para manipulação do DOM, opcionalmente incorporada no Mobiphp. [jquery/jquery](https://github.com/jquery/jquery)

Ao utilizar o Mobiphp, você tem a flexibilidade de incorporar o Bootstrap e o jQuery ou substituí-los por outras bibliotecas.

Certifique-se de revisar a documentação oficial de cada biblioteca para obter informações detalhadas sobre sua utilização e configuração.

## Instalação

- Realize a instalação inicial do Mobiphp baixando o pacote e descompactando-o no diretório PHP desejado.

## Criação de Páginas

O Mobiphp simplifica a criação de páginas automaticamente através do Composer.

- Utilize o comando: **composer mobi-create-page nome-da-pagina nome-da-rota**
- Isso criará a pasta da página e configurará a rota em core/json/routes.json.
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

A utilização de componentes oferece uma maneira simples e eficiente de reutilizar código.

- Utilize o comando: **composer mobi-create-component nome-do-componente**
- Isso criará o componente automaticamente dentro da pasta **components**.

### Estrutura do Componente Criado
- **app**
    - **components**
      - **Novocomponente**: pasta do componente
        - **Novocomponente.controller.php**: scripts de controle do componente
        - **Novocomponente.css**: folha de estilo CSS
        - **Novocomponente.js**: arquivo JavaScript do componente
        - **Novocomponente.view.php**: página de visualização do componente

##