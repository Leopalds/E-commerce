# Hulmer's e-commerce

![home](https://i.gyazo.com/5940ee91cbd8f7c856e71f66bfd549b9.jpg)
![dashboard](https://i.gyazo.com/18c70cfef7f26923cc397b7e3137abd1.png)
![pagina-produtos](https://i.gyazo.com/6b57f00a0b5964de7bf5687f3ebf3fe1.png)
![carrinho](https://i.gyazo.com/7fd5928baf6d56305024fa343c240cd9.png)

## Features

- Calculo de frete com a API dos correios
![frete](https://i.gyazo.com/36eda334f4e8aab13ed8372b1ff1cac8.gif)

- Carrinho
![carrinho](https://i.gyazo.com/eb12883ad21c49a086b84375a075a193.gif)

- Checkout com a API do Mercado Pago
![checkout](https://i.gyazo.com/58217088e84d4dbbd76629b9a6b5f2f0.png)

- Filtro de produtos
![filtro](https://i.gyazo.com/4fd68b31d37ca2d34a8a56f24cc8da3b.gif)

- Dashboard para administraçao
![dashboard](https://i.gyazo.com/24bb1eb8aa6d86b6484e2e3db0744d43.gif)

- Envio de e-mails para contato
![email](https://i.gyazo.com/a5ef262b754a3ea4ef7b131c84dccdfb.gif)

## Rodando no localhost

1. Clone projeto
2. Rode o composer install na linha de comando na pasta do projeto
3. Copie o arquivo .env.example para o arquivo .env
4. No arquivo .env mude as configurações do banco de dados para as suas configurações
5. Rode o php artisan key:generate na linha de comando
6. Rode php artisan migrate
7. Rode php artisan db:seed --class="DatabaseSeeder" 
8. Rode php artisan serve
9. Acesse o localhost:8000
