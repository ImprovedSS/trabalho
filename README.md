create database login;
use login;

create table Usuarios (
	id int auto_increment not null primary key,
    usuario varchar(100) not null unique,
    email varchar(140) not null unique, 
    senha varchar(16) not null unique,
    creditos int
);

create table Pacotes (
	id int auto_increment not null primary key,
    nome varchar(100) not null unique,
    preco int not null,
    chance_comum decimal(5, 2),
    chance_rara decimal(5, 2),
    chance_epica decimal(5, 2),
    chance_lendaria decimal (5, 2)
);

insert into Pacotes (nome, preco, chance_comum, chance_rara, chance_epica, chance_lendaria) 
values
    ('Pacote Básico', 10, 80.00, 17.00, 3.00, 0.00),
    ('Pacote Premium', 50, 60.00, 34.00, 5.00, 1.00),
    ('Pacote de Luxo', 100, 30.00, 50.00, 15.00, 5.00);

create table Cartas (
	id int auto_increment not null primary key,
    nome varchar(100) not null unique,
    tipo enum('comum', 'rara', 'epica', 'lendaria'),
    pacote_id int,
    foreign key(pacote_id) references Pacotes(id)
);

insert into Cartas (nome, tipo) 
values 
	('Sunflower', 'comum'),
    ('Peashooter', 'rara'),
    ('Wall Nut', 'epica'),
    ('Chomper', 'lendaria');

create table Inventario (
	id int auto_increment primary key,
    usuario_id int,
    foreign key (usuario_id) references Usuarios(id)
);

create table Relacoes (
	id int auto_increment primary key,
    inventario_id int,
    carta_id int, 
    quantidade_carta int,
    foreign key (inventario_id) references Inventario(id),
    foreign key (carta_id) references Cartas(id)
);
