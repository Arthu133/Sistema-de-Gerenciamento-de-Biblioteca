
# Sistema de Gerenciamento de Biblioteca

Este é um projeto de Sistema de Gerenciamento de Biblioteca desenvolvido com Laravel. Ele permite o cadastro de livros, autores e usuários, além de gerenciar empréstimos e devoluções de livros.

## Pré-requisitos

Antes de começar, você vai precisar ter instalado em sua máquina as seguintes ferramentas:

- [PHP](https://www.php.net/downloads) (versão 8.0 ou superior)
- [Composer](https://getcomposer.org/)
- [SQL Server](https://www.microsoft.com/pt-br/sql-server/sql-server-downloads) ou outro banco de dados configurado
- [Node.js](https://nodejs.org/) e [NPM](https://www.npmjs.com/) (opcional, se houver uso de assets front-end)

Além disso, é necessário ter um editor para trabalhar com o código como Visual Studio Code (https://code.visualstudio.com/).

## Instalação

### Clonar o repositório


git clone https://github.com/Arthu133/biblioteca


### Instalar as dependências do PHP

composer install

### Instalar as dependências do NPM (opcional, se aplicável)


npm install


## Configuração do Ambiente

### Configurar o arquivo `.env`

Configure as informações do banco de dados:


#SQL SERVER
DB_CONNECTION=sqlsrv
DB_HOST=localhost
DB_PORT=1433
DB_DATABASE=nome_DB
DB_USERNAME=nome_usuario
DB_PASSWORD=senha_usuario

# Configuração do MySQL para a persitencia dos dados (Utilizar o XAMPP para ter acesso ao PHPMyAdmin)
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3307 #Por padrão é 3306, mas no meu ambiente local, a 3306 estava indisponível.
DB_DATABASE=nome_DB
DB_USERNAME=nome_usuario
DB_PASSWORD=senha_usuario


### Configurar o banco de dados

Rode as migrações para criar as tabelas necessárias:

php artisan migrate

Se houver seeders configurados, rode-os para popular o banco de dados com dados iniciais:

php artisan db:seed

## Execução do Projeto

Para iniciar o servidor de desenvolvimento, execute:

php artisan serve

O servidor estará disponível em `http://localhost:8000`. Caso queira mudar a porta, a edição é feita no .env.


## Considerações Finais

Este é um projeto em desenvolvimento, então algumas funcionalidades podem não estar totalmente implementadas ou até mesmo apresentando falhas. 

Obs: Foram feitos todos os requisitos funcionais e não funcionais, dos desafios opcionais apenas a documentação no Swagger foi realizada
