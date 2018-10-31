create database jugadores;
use jugadores;


create table jugador(
	idJugador int auto_increment,
    nombre_jugador varchar(200),
    numeroJugador int,
    primary key(idJugador)
);

create table equipo(
	idEquipo int auto_increment,
    nombre_equipo varchar(45),
    primary key(idEquipo)
);

create table jugador_equipo(
	idJugador int,
    idEquipo int,
    foreign key(idJugador) references jugador(idJugador),
     foreign key(idEquipo) references equipo(idEquipo)
);

create table usuario(
	idUsuario int auto_increment,
    username varchar(200),
    password varchar(255),
    primary key (idUsuario)
);