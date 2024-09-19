create database empresa0702;
use empresa0702;

create table funcionario 
(
	funcional int auto_increment not null primary key,
    cpf char(11) not null unique,
    nome varchar(40) not null,
    telefone char(15) null,
    endereco varchar(70) not null,
    dataHora datetime,
    caminho varchar(255) not null
);

create table login
(
    funcional int not null,
    senha varchar(8) not null,
    estado boolean,
    constraint fkfuncLogin foreign key (funcional) references funcionario (funcional)
);

set sql_safe_updates=1;

-- CRIAR TABELA DEPARTAMENTO
create table departamento (
nomeDepartamento varchar(70) not null,
codDepartamento int auto_increment not null,
dataHora datetime,
constraint uqDepto unique (nomeDepartamento),
constraint primary key(codDepartamento)
);

-- ALTERAR FUNCIONARIO PARA RECEBER A CHAVE ESTRANGEIRA
-- DEPARTAMENTO 1: FUNCIONARIO N
	alter table funcionario add codDepartamento int not null;
    
    alter table funcionario add constraint fkfuncDepto
    foreign key (codDepartamento) references departamento (codDepartamento);
    
-- CRIAÇÃO DA TABELA CARGO
create table cargo 
(
	nomeCargo varchar(70) not null unique,
    codCargo int auto_increment not null primary key,
    dataHora datetime not null,
    salario DECIMAL (8,2) not null
    );
    
-- alterar funcionario e adicionar a estrangeira com Cargo
alter table funcionario add codCargo int not null;
alter table funcionario add constraint fkCargoFunc
foreign key (codCargo) references cargo (codCargo);

-- drop database empresa0702;

select * from funcionario;






