drop table usuarios cascade;
drop table tipos_juego cascade;
drop table tipos_ficha cascade;
drop table inventarios cascade;
drop table fichas cascade;
drop table personajes cascade;
drop table otra_info cascade;
drop table atributos cascade;
drop table habilidades cascade;
drop table ventajas cascade;
drop table otros_parametros cascade;
drop table estados cascade;
drop table partidas cascade;
drop table jugadores cascade;
drop table chat cascade;
drop table noticias cascade;
drop table secciones cascade;
drop table temas cascade;
drop table posts cascade;
drop table comentarios cascade;






/*
*   --------
*   USUARIOS
*   --------
*/

create table usuarios	(
	id					bigserial		constraint pk_usuarios primary key,
	usuario				varchar(10)		not null 
										constraint uq_usuarios_usuario unique,
	email				varchar(75)		not null 
										constraint uq_usuarios_email unique,
	passwd				char(32)		not null,
	admin         		boolean       	default false
);

create index idx_usuarios_usuario_passwd on usuarios (usuario, passwd);


/*
*   --------------
*   TIPOS DE JUEGO
*   --------------
*/

create table tipos_juego (
	id					bigserial		constraint pk_tipos_juego primary key,
	nombre				varchar(50)		not null
										constraint uq_tipos_juego unique
);	


/*
*   ----------------------
*   ESTADOS DE UNA PARTIDA -- ABIERTA, CERRADA... (DUDO, MIRAR O PENSAR EN ALGO)
*   ----------------------
*/

create table estados (
	id					bigserial		constraint pk_estados primary key,
	estado				varchar(20)		not null
);


/*
*   --------
*   PARTIDAS
*   --------
*/

create table partidas (
	id					bigserial		constraint pk_partidas primary key,
	nombre				varchar(20)		not null,
	descripcion			varchar(100),
	master				bigint			constraint fk_partidas_usuarios
												references usuarios (id),
	tipo_juego			bigint			constraint fk_partidas_tipo_juego
												references tipos_juego (id),
	estado				bigint			not null
										constraint fk_partidas_estados
												references estados (id),
	activa				boolean			default false,
	f_creacion			date			default current_date,
	f_fin				date
);


/*
*   --------------
*   DATOS DE FICHA
*   --------------
*/


/*
*	------
*	FICHAS
*	------
*/
create table fichas (
	id					bigserial		constraint pk_fichas primary key,
	experiencia			numeric(6)		default 0,
	anotaciones   		varchar(500),
	usuario_id			bigint			constraint fk_usuarios_fichas
										references usuarios (id),
	partida_id			bigint			constraint fk_fichas_partidas
										references partidas (id)
);


/*
*   -----------
*   INVENTARIOS
*   -----------
*/

create table inventarios (
	id					bigserial		constraint pk_inventarios primary key,
	objeto				varchar(20)		not null,
	descripcion			varchar(50),
	cantidad			numeric(3) 		not null,
	ficha				bigint			constraint fk_inventarios_fichas
										references fichas (id)
);


/*
*   ----------
*   PERSONAJES
*   ----------
*/

create table personajes (
	id					bigserial		constraint pk_personajes primary key,
	nombre				varchar(50)		not null,
	ficha				bigint			constraint fk_personajes_fichas
										references fichas (id)
);


/*
*	----------------
*	OTRA INFORMACION
*	----------------
*/

create table otra_info (
	id					bigserial		constraint pk_otra_info primary key,
	ficha				bigint			constraint fk_otra_info_fichas
										references fichas (id),
	nombre				varchar(30)		not null,
	valor				text			default ''
);


/*
*	---------
*	ATRIBUTOS
*	---------
*/

create table atributos (
	id					bigserial		constraint pk_atributos primary key,
	ficha				bigint			constraint fk_atributos_fichas
										references fichas (id),
	nombre				varchar(30)		not null,
	valor				numeric(3)		not null default 0,
	categoria			varchar(30)		not null
);


/*
*	-----------
*	HABILIDADES
*	-----------
*/

create table habilidades (
	id					bigserial		constraint pk_habilidades primary key,
	ficha				bigint			constraint fk_habilidades_fichas
										references fichas (id),
	nombre				varchar(30)		not null,
	valor				numeric(3)		not null default 0,
	categoria			varchar(30)		not null
);


/*
*	--------
*	VENTAJAS
*	--------
*/

create table ventajas (
	id					bigserial		constraint pk_ventajas primary key,
	ficha				bigint			constraint fk_ventajas_fichas
										references fichas (id),
	nombre				varchar(30)		not null,
	valor				numeric(3)		not null default 0,
	categoria			varchar(30)		not null
);


/*
*	----------------
*	OTROS PARAMETROS
*	----------------
*/

create table otros_parametros (
	id					bigserial		constraint pk_otros_parametros primary key,
	ficha				bigint			constraint fk_otros_parametros_fichas
										references fichas (id),
	nombre				varchar(30)		not null,
	valor				numeric(3)		not null default 0,
	categoria			varchar(30)		not null
);


/*
*   --------------
*   TIPOS DE FICHA
*   --------------
*/

create table tipos_ficha (
	id					bigserial		constraint pk_tipos_ficha primary key,
	tipo_juego    		bigint      	constraint fk_tipos_ficha_tipos_juego
										references tipos_juego (id),
	ficha				bigint			constraint fk_tipos_ficha_fichas
										references fichas (id)
);


/*
*   -----------------------
*   JUGADORES EN LA PARTIDA
*   -----------------------
*/

create table jugadores (
	id					bigserial		constraint pk_jugadores primary key,
	partida_id			bigint        	constraint fk_jugadores_partidas
												references partidas (id),
	jugador				bigint			constraint fk_jugadores_usuarios
												references usuarios (id),
	ficha_id			bigint        	constraint fk_jugadores_ficha
												references fichas (id)
);


/*
*   ----
*   CHAT
*   ----
*/

create table chat (
	id					bigserial		constraint pk_chat primary key,
	mensaje				varchar(200) 	not null,
	jugador				bigint    	 	not null
										constraint fk_chat_usuarios
												references usuarios (id),
	partida				bigint			not null 
										constraint fk_chat_partidas
												references partidas (id),
	momento				timestamp    	default current_timestamp
);


/*
*   --------
*   NOTICIAS
*   --------
*/

create table noticias (
  id					bigserial		constraint pk_noticias primary key,
  titulo        		varchar(50)   	not null,
  autor         		bigint        	constraint fk_noticias_usuarios
												references usuarios (id),
  contenido     		text,
  fecha         		timestamp          	default current_timestamp
);


/*
*   ----
*   ----
*   FORO
*   ----
*   ----
*/



/*
*   ---------
*   SECCIONES
*   ---------
*/

create table secciones (
	id					bigserial			constraint pk_secciones primary key,
	titulo        		varchar(20)   		not null constraint uq_titulo_secciones unique,
	descripcion   		varchar(100)  		not null
);


/*
*   -----
*   TEMAS
*   -----
*/

create table temas (
	id					bigserial			constraint pk_temas primary key,
	titulo        		varchar(20)   		not null constraint uq_titulo_temas unique,
	seccion       		bigint        		constraint fk_temas_secciones
													references secciones (id),
	descripcion			varchar(100)		not null
);


/*
*   -----
*   POSTS
*   -----
*/

create table posts (
	id					bigserial		constraint pk_posts primary key,
	titulo				varchar(20)		not null constraint uq_titulos_posts unique,
	contenido     		text          	not null,
	autor         		bigint        	constraint fk_posts_usuarios
												references usuarios (id),
	tema       			bigint        	constraint fk_posts_temas
												references temas (id),
	fecha         		date          	default current_date
);


/*
*	-----------
*	COMENTARIOS
*	-----------
*/

create table comentarios (
	id					bigserial		constraint pk_comentarios primary key,
	contenido			text			not null,
	autor				bigint			constraint fk_comentarios_usuarios
												references usuarios (id),
	post				bigint			constraint fk_comentarios_posts
												references posts (id),
	fecha				date			default current_date
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





/**  TIPOS DE FICHA  **/

insert into tipos_ficha (tipo_juego, ficha)
values (1, 1);


