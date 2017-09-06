# teste-dev (Laravel)
1 - Inicialmente utilize "composer update"<br>
2 - Configura o arquivo .env para o banco de dados sqlexpress<br>
3 - Faça o migrate do arquivo para geração das tabelas e dados automáticos "php artisan migrate:refresh --seed"<br>
4 - Utilize o comando "php artisan serve" para inicializar<br>
<br><br>
Api(JSON)<br>
Criação de usuário via POST inclua email:"usuario" como json <br>
http://domain/api/login<br><br>
Criando o usuário ele cria o código Token para visualização de produtos<br>
Caso seja expirado deve-se utilizar http://domain/api/refresh-token<br>
Para invalidar http://domain/api/logout-token<br><br>

Para listar o produto utilizar http://domain/api/products<br>
