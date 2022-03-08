drop database skates;
create database skates;

use skates;

create table produtos(
cod int auto_increment primary key,
nome varchar(50),
estoque varchar (50),
marca varchar(50) default null unique,
preco varchar(50)
);

select*from produtos;
