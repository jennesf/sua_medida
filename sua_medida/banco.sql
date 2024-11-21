CREATE DATABASE hostdeprojetos_suamedida;

use hostdeprojetos_suamedida;

create table usuarios (
 id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    data_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

select * from usuarios;


SHOW COLUMNS FROM usuarios;

delete from usuarios;


CREATE TABLE produtos (
    id INT NOT NULL AUTO_INCREMENT, 
    tipo VARCHAR(45) NOT NULL, 
    nome VARCHAR(45) NOT NULL, 
    imagem VARCHAR(80) NOT NULL, 
    preco DECIMAL (5,2) NOT NULL,
    descricao VARCHAR(255) DEFAULT '',
PRIMARY KEY (id));

select * from produtos;


INSERT INTO produtos (tipo, nome, imagem, preco) VALUES ('Cropped', 'Cropped Listrado', '../img/1.jpeg',  49.90);
INSERT INTO produtos (tipo, nome, imagem, preco) VALUES ('Cropped', 'Cropped Branco', '../img/2.jpeg',59.90);
INSERT INTO produtos (tipo, nome, imagem, preco) VALUES ('Vestido', 'Vestido Preto', '../img/3.jpeg', 139.90);
INSERT INTO produtos (tipo, nome, imagem, preco) VALUES ('Camisa', 'Camisa Branca', '../img/4.jpeg', 109.90);
INSERT INTO produtos (tipo, nome, imagem, preco) VALUES ('Jaqueta', 'Jaqueta Preta', '../img/5.jpeg', 199.99);
INSERT INTO produtos (tipo, nome, imagem, preco) VALUES ('Jaqueta', 'Jaqueta Colorida', '../img/6.jpeg', 249.00);

select * from produtos;

delete from produtos;

update produtos set id=1  where nome = 'cropped branco';



select * from usuarios;

alter table usuarios add perfil varchar(50) default(0);
update usuarios set perfil = 'admin' where email = 'abc@ifsp.edu.br';