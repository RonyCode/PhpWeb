Forçar o pull entre diferentes histories de commits do github
execute o comando :

git pull origin master --allow-unrelated-histories

No mysql e no ruindows da erro de autenticação, se ocorrer rodar esse codigo dentro do MySQL:

ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'sua.senha';
flush privileges;

Novamente no RUINDOWS acontece um erro do doctrine não reconhecer algumas classes se ocorrer rodar esse codigo:

vendor/bin/doctrine orm:generate-proxies
