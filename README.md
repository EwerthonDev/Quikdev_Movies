# Tutorial de como rodar!


<div style="text-align:center"><img src="https://cdn-icons.flaticon.com/png/512/3428/premium/3428739.png?token=exp=1649944110~hmac=a093563fe70d491287fb57daac2d8596" height="400px" width="400px"/></div>

Feito com:
- **Laravel 8**
- **Vue.js**
- **TailwindCSS**


## Pre-Requisistos

PHP versão >= 7.4;

Laravel versão 8;

Composer;

NPM;


## Como rodar o sistema?

1 - clone ou baixe o projeto

2 - criar um novo arquivo .env com as informações do .env.example

3 - rodar o composer install no terminal (deve estar no caminho do projeto)

4 - rodar o npm install

5 - rodar o npm run dev

6 - rodar o php artisan key:generate

7 - adicionar TMDB_TOKEN= ao fim do .env

8 - rodar o php artisan serve


(POSSÍVEIS PROBLEMAS -> 

curl: (60) SSL certificate problem... Solução -> baixe o mais atual desse arquivo https://curl.haxx.se/docs/caextract.html, acesse o seu php.ini, e adicione o caminho para o arquivo nas respectivas variáveis -> curl.cainfo e openssl.cafile)
