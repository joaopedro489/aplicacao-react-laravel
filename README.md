# React/Laravel
## Desafio Técnico Pontotel
### Feito por: João Pedro Cavalcante
### Utilizando a framework [Laravel](https://laravel.com/) e [React](https://reactjs.org/)

## Como Instalar e Executar o Projeto?
* Clone o repositório
* É possível utilizar o Docker para executar o projeto, mais detalhes embaixo.
* Instale as dependências do front e do back, utilizando o `npm install` e o `composer install`, respectivamente.
* Copie o arquivo `.env.example` e crie um arquivo `.env` para utilizar as variáveis de ambientes.
* Crie um chave de encriptação para a aplicação com o seguinte comando `php artisan key:generate`
* Configure o banco de dados em mysql de acordo com a configuração do seu computador, pelo .env será possível.
* Migre e popule o banco de dados com o comando `php artisan migrate:fresh --seed`
* Após isso, configure o passport `php artisan passport:install`
* Por fim, utilize os seguintes comandos para servir o front e o back, `npm start` e `php artisan serve`, respectivamente.
* E ainda, é necessário observar se a rota da api do front, no arquivo `front/src/services/UserService/index.js`, está com a mesma porta da aplicação PHP, que seria a 8000
* E, assim será possível utilizar a aplicação

##Docker
* Para executar o projeto com Docker, basta utilizar o comando `docker compose up`.
* Após executar o comando, será instalado todas as dependencias do projeto e com as configurações de acordo.
* Porém, será necessário ainda configurar o back para o projeto funcionar.
* Utilzando o comando do Docker `docker exec -it {NOME_CONTAINER_BACK} /bin/bash` será possível acessar o terminal do back.
* Com isso, precisamos instalar as dependencias e configurar o projeto, de maneira similar ao passo a passo anterior, 
* Assim não irei repetir o que precisa ser feito, a única diferença que será preciso usar o nome do container do banco de dados em vez do host `127.0.0.1`
* Uma vez com o back configurado, basta configurar a rota da api do front, como falado anteriormente. 
* E, assim será possível utilizar a aplicação

## Como Testar?
* O back possui dois teste unitários, podendo ser executado com `php artisan test`. E também é possível testar as rotas por um Postman ou Insomnia.
* O front só é possível testar com o teste ponta a ponta. 

