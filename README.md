# Mobiphp Framework

## Introdução

O Mobiphp é um framework em PHP com JavaScript que estou desenvolvendo no intuito de facilitar a criação rápida de aplicações web completas ou ser utilizado como backend. Esta documentação fornece informações essenciais para começar a desenvolver com o Mobiphp.

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

## Instalação

Para começar a usar o Mobiphp, siga os passos de instalação descritos no arquivo `README.md` no repositório GitHub.

## Contribuindo

Se você deseja contribuir para o desenvolvimento do Mobiphp, consulte o arquivo `CONTRIBUTING.md` para obter mais informações.

---
