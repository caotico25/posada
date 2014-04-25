/*
*   --------
*   USUARIOS
*   --------
*/

drop table usuarios cascade;

create table usuarios	(
	id						bigserial			constraint pk_usuarios primary key,
	usuario				varchar(10)		not null 
															constraint uq_usuarios_usuario unique,
	email					varchar(75)		not null 
															constraint uq_usuarios_email unique,
	passwd				char(32)			not null,
	admin         boolean       default false
);

create index idx_usuarios_usuario_passwd on usuarios (usuario, passwd);


/*
*   --------------
*   TIPOS DE JUEGO
*   --------------
*/

drop table tipos_juego cascade;

create table tipos_juego (
	id						bigserial			constraint pk_tipos_juego primary key,
	nombre				varchar(50)		not null
															constraint uq_tipos_juego unique
);


/*
*   --------------
*   TIPOS DE FICHA
*   --------------
*/

drop table tipos_ficha cascade;

create table tipos_ficha (
	id						bigserial			constraint pk_tipos_ficha primary key,
	tipo_juego    bigint        constraint fk_tipos_ficha_tipos_juego
	                              references tipos_juego (id)
	                                                on update cascade
	                                                on delete no action,
	ficha					text
);


/*
*   -----------
*   INVENTARIOS
*   -----------
*/

drop table inventarios cascade;

create table inventarios (
	id						bigserial			constraint pk_inventarios primary key,
	objeto				varchar(20)		not null,
	descripcion		varchar(50),
	cantidad			numeric(3) 		not null
);


/*
*   ------
*   FICHAS
*   ------
*/

drop table fichas cascade;

create table fichas (
  id						bigserial			constraint pk_fichas primary key,
  usuario_id		bigint				constraint fk_fichas_usuarios
																references usuarios (id)
																									on update cascade
																									on delete no action,
  archivo				text,
  inventario		bigint        constraint fk_ficha_inventario
																references inventarios (id)
																									on update cascade
																							 		on delete no action,
	anotaciones   varchar(500),
	tipo_ficha    bigint				constraint fk_fichas_tipos_ficha
																references tipos_ficha(id)
																									on update cascade
																							 		on delete no action
);


/*
*   ----------------------
*   ESTADOS DE UNA PARTIDA -- ABIERTA, CERRADA... (DUDO, MIRAR O PENSAR EN ALGO)
*   ----------------------
*/

drop table estados cascade;

create table estados (
	id						bigserial			constraint pk_estados primary key,
	estado				varchar(20)		not null
);


/*
*   --------
*   PARTIDAS
*   --------
*/

drop table partidas cascade;

create table partidas (
	id						bigserial			constraint pk_partidas primary key,
	nombre				varchar(20)		not null,
	descripcion		varchar(100),
	master				bigint				constraint fk_partidas_usuarios
																references usuarios (id)
																									on update cascade
																									on delete no action,
	tipo_juego		bigint				constraint fk_partidas_tipo_juego
																references tipo_juego (id)
																									on update cascade
																									on delete no action,
	estado				bigint				not null
															constraint fk_partidas_estados
																references estados (id)
																									on update cascade
																									on delete no action,
	f_creacion		date					default current_date
															not null,
	f_fin					date
);


/**
*   -----------------------
*   JUGADORES EN LA PARTIDA
*   -----------------------
*/

drop table jugadores cascade;

create table jugadores (
	partida_id		bigint        constraint fk_jugadores_partidas
																references partidas (id)
																									on update cascade
																							 		on delete no action,
	jugador				bigint				constraint fk_jugadores_usuarios
																references usuarios (id)
																									on update cascade
																									on delete no action,
	ficha_id			bigint        constraint fk_jugadores_ficha
																references fichas (id)
																									on update cascade
																							 		on delete no action,
	constraint pk_ficha_partida primary key (partida_id, jugador)
);


/*
*   ----
*   CHAT
*   ----
*/

drop table chat cascade;

create table chat (
	id						bigserial			constraint pk_chat primary key,
	mensaje				varchar(200) 	not null,
	jugador				bigint    	 	not null
															constraint fk_chat_usuarios
																references usuarios (id)
																									on update cascade
																							 		on delete no action,
	partida				bigint			 	not null 
															constraint fk_chat_partidas
																references partidas (id)
																									on update cascade
																							 		on delete no action,
	momento				date    		 	default current_date
);


/*
*   --------
*   NOTICIAS
*   --------
*/

drop table noticias cascade;

create table noticias (
  id						bigserial			constraint pk_noticias primary key,
  titulo        varchar(50)   not null,
  autor         bigint        constraint fk_noticias_usuarios
																references usuarios (id)
																									on update cascade
																							 		on delete no action,
  contenido     text,
  fecha         date          default current_date
);


/*
*   ----
*   ----
*   FORO
*   ----
*   ----
*
*
*
*   -----
*   POSTS
*   -----
*/

drop table posts cascade;

create table posts (
  id						bigserial			constraint pk_posts primary key,
  contenido     text          not null,
  autor         bigint        constraint fk_posts_usuarios
																references usuarios (id)
																									on update cascade
																							 		on delete no action,
  tema       bigint        constraint fk_posts_temas
																references temas (id)
																									on update cascade
																							 		on delete no action,
	fecha         date          default current_date
);


/*
*   -----
*   TEMAS
*   -----
*/

drop table temas cascade;

create table temas (
  id						bigserial			constraint pk_temas primary key,
  titulo        varchar(20)   not null constraint uq_titulo_temas unique,
  contenido     text          not null,
  autor         bigint        constraint fk_temas_usuarios
																references usuarios (id)
																									on update cascade
																							 		on delete no action,
  seccion       bigint        constraint fk_temas_secciones
																references secciones (id)
																									on update cascade
																							 		on delete no action,
	fecha         date          default current_date
);



/*
*   ---------
*   SECCIONES
*   ---------
*/

drop table secciones cascade;

create table secciones (
  id						bigserial			constraint pk_secciones primary key,
  titulo        varchar(20)   not null constraint uq_titulo_secciones unique,
  descripcion   varchar(100)  not null
);


/*
*  -----------------
*  TABLA DE SESIONES
*  -----------------
*/
drop table ci_sessions cascade;

CREATE TABLE ci_sessions (
  session_id varchar(40) DEFAULT '0' NOT NULL,
  ip_address varchar(45) DEFAULT '0' NOT NULL,
  user_agent varchar(120) NOT NULL,
  last_activity numeric(10) DEFAULT 0 NOT NULL,
  user_data text NOT NULL,
  PRIMARY KEY (session_id)
);

create index last_activity_idx on ci_sessions (last_activity);


/*
*   -----------
*   INSERCIONES
*   -----------
*/

/**  USUARIOS  **/

insert into usuarios (usuario, email, passwd, admin)
values ('jose', 'jfdominguezpalacios@gmail.com', md5('jose'), true);














