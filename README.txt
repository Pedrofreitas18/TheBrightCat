https://github.com/Pedrofreitas18/TheBrightCat.git

TheBrightCat é um site destinado a ser um site anunciante de roupas, onde existem 2 tipos de usuários: Usuário padrão e Adm.


O Adm consegue realizar o CRUD completo, o padrão só read.


se trata de uma aplicação PHP com MySql pelo Xamp. Utilizei o composer tb.


na navbar existem os "botões" que permitem navegar pela aplicação, mas os de login e logout não deveriam aparecer na navbar, pois em teste o adm utilizaria um caminho a parte para se logar
o login e logout por tanto não deveriam aparecer normalmente, mas os deixei lá para facilitar a exploração do site. Não impacta nas funcionalidades.

erro de minha parte -> acabei me atrapalhando e não usei PDO ou semelhante no banco de dados. Estou ciente da vulnerabilidade de SQL injection. Foi uma falha minha.

______________________________________________________________________________________________________________________________________________________________________________________________

build mysql

CREATE TABLE Roupa (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(50) NOT NULL,
estampa VARCHAR(50) NOT NULL,
tamanho VARCHAR(2),
preco DECIMAL(7,2) NOT NULL,
imagemlink VARCHAR(50)
);

INSERT INTO Roupa (nome, estampa, tamanho, preco, imagemlink)
VALUES ('Camisa Polo', 'Amarela', 'G', 43.90, 'https://aramismenswear.vtexassets.com/arquivos/ids/755634-800-auto?v=637525645768270000&width=800&height=auto&aspect=true');

INSERT INTO Roupa (nome, estampa, tamanho, preco, imagemlink)
VALUES ('Calça Caqui Grande', 'Bege', 'M', 73.90, 'https://static.gapbrasil.com/produtos/calca-infantil-sarja-gap-fashion/68/L91-0373-168/L91-0373-168_zoom1.jpg?ts=1598367596&ims=544x');


CREATE TABLE Usuario (
nome VARCHAR(50) NOT NULL PRIMARY KEY,
senha VARCHAR(50) NOT NULL
);

INSERT INTO `usuario`(`nome`, `senha`) VALUES ('Adm','senha')


_______________________________________________________________________________________________________________________________________________________________________________________________________

nomeie o server como "vestuario"
arquivo de db em Projeto\app\Utils\dbConnect.php

build server

Deve ser executado pelo xamp, colocando o diretorio "Projeto" dentro do diretório C:\xampp\htdocs

necessita ter o xamp e Mysql na maquina onde será executado

_______________________________________________________________________________________________________________________________________________________________________________________________________


SP3013154 Pedro Brenicci Freitas

Sou o únic integrante do meu grupo.



