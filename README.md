VERSÕES UTILIZADAS 

<b>NPM 8.19.3</b>
<b>NODE 18.12.1</b>
<b>COMPOSER 2.1.6</b>
<b>LARAVEL 9</b>

Ao abrir o projeto executar os comandos

composer install

npm install

cp .env.example .env

abrir o arquivo .env e trocar as seguintes informações
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=desafio-php
DB_USERNAME=root
DB_PASSWORD=

para as que atenda a conexão do seu banco de dados

rodar as migrations com 

php artisan migrate

Criado o banco de dados rodar 

php artisan serve

e acessar a aplicação em http://localhost:8000
