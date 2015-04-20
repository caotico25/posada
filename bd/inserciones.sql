/*
*   -----------
*   INSERCIONES
*   -----------
*/

/**  USUARIOS  **/

insert into usuarios (usuario, email, passwd, admin)
values ('admin', 'admin@admin.com', md5('admin'), true);

insert into usuarios (usuario, email, passwd, admin)
values ('jose', 'jfdominguezpalacios@gmail.com', md5('jose'), true);

insert into usuarios (usuario, email, passwd, admin)
values ('pepe', 'pepe@gmail.com', md5('pepe'), false);



/**	 SECCIONES  **/

insert into secciones (titulo, descripcion)
values ('General', 'Información general sobre el sitio web.');

insert into secciones (titulo, descripcion)
values ('Juegos', 'Todo sobre juegos de rol.');

insert into secciones (titulo, descripcion)
values ('Varios', 'De todo un poco.');


/**  TEMAS  **/

insert into temas (titulo, seccion, descripcion)
values ('Normas', 1, 'Normas del sitio web.');

insert into temas (titulo, seccion, descripcion)
values ('Presentaciones', 1, 'Pasa y presentate.');

insert into temas (titulo, seccion, descripcion)
values ('Vampiro: La Mascarada', 2, 'Todo lo referente a este juego.');

insert into temas (titulo, seccion, descripcion)
values ('Tutoriales', 3, 'Todo tipo de tutoriales.');


/**  POSTS  **/

insert into posts (titulo, tema, contenido, autor)
values ('Me presento', 2, 'Me llamo Jose y soy un gran apasionado de los juegos de rol. Espero que podamos pasar muchas horas de juego juntos!!', 2);


/** NOTICIAS **/





/**  TIPOS DE JUEGO  **/

insert into tipos_juego (nombre)
values ('Vampiro: La Mascarada');



/**  ESTADOS DE PARTIDA  **/

insert into estados (estado)
values ('Preparando partida');

insert into estados (estado)
values ('Buscando jugadores');

insert into estados (estado)
values ('Comenzada');


/**  FICHA DE VAMPIRO  **/

insert into fichas (anotaciones, usuario_id)
values ('', 1);

insert into personajes (nombre, ficha)
values('', 1);

insert into otra_info(nombre, ficha)
values ('Naturaleza', 1);

insert into otra_info(nombre, ficha)
values ('Generacion', 1);

insert into otra_info(nombre, ficha)
values ('Conducta', 1);

insert into otra_info(nombre, ficha)
values ('Refugio', 1);

insert into otra_info(nombre, ficha)
values ('Cronica', 1);

insert into otra_info(nombre, ficha)
values ('Clan', 1);


insert into atributos (nombre, categoria, ficha)
values ('Fuerza', 'Fisicos', 1);

insert into atributos (nombre, categoria, ficha)
values ('Destreza', 'Fisicos', 1);

insert into atributos (nombre, categoria, ficha)
values ('Resistencia', 'Fisicos', 1);

insert into atributos (nombre, categoria, ficha)
values ('Carisma', 'Sociales', 1);

insert into atributos (nombre, categoria, ficha)
values ('Manipulacion', 'Sociales', 1);

insert into atributos (nombre, categoria, ficha)
values ('Apariencia', 'Sociales', 1);

insert into atributos (nombre, categoria, ficha)
values ('Percepcion', 'Mentales', 1);

insert into atributos (nombre, categoria, ficha)
values ('Inteligencia', 'Mentales', 1);

insert into atributos (nombre, categoria, ficha)
values ('Astucia', 'Mentales', 1);


insert into habilidades (nombre, categoria, ficha)
values ('Alerta', 'Talentos', 1);

insert into habilidades (nombre, categoria, ficha)
values ('Atletismo', 'Talentos', 1);

insert into habilidades (nombre, categoria, ficha)
values ('Callejeo', 'Talentos', 1);

insert into habilidades (nombre, categoria, ficha)
values ('Empatia', 'Talentos', 1);

insert into habilidades (nombre, categoria, ficha)
values ('Esquivar', 'Talentos', 1);

insert into habilidades (nombre, categoria, ficha)
values ('Expresion', 'Talentos', 1);

insert into habilidades (nombre, categoria, ficha)
values ('Intimidacion', 'Talentos', 1);

insert into habilidades (nombre, categoria, ficha)
values ('Liderazgo', 'Talentos', 1);

insert into habilidades (nombre, categoria, ficha)
values ('Pelea', 'Talentos', 1);

insert into habilidades (nombre, categoria, ficha)
values ('Subterfugio', 'Talentos', 1);


insert into habilidades (nombre, categoria, ficha)
values ('Armas C.C.', 'Tecnicas', 1);

insert into habilidades (nombre, categoria, ficha)
values ('Armas de fuego', 'Tecnicas', 1);

insert into habilidades (nombre, categoria, ficha)
values ('Conducir', 'Tecnicas', 1);

insert into habilidades (nombre, categoria, ficha)
values ('Etiqueta', 'Tecnicas', 1);

insert into habilidades (nombre, categoria, ficha)
values ('Interpretacion', 'Tecnicas', 1);

insert into habilidades (nombre, categoria, ficha)
values ('Pericias', 'Tecnicas', 1);

insert into habilidades (nombre, categoria, ficha)
values ('Seguridad', 'Tecnicas', 1);

insert into habilidades (nombre, categoria, ficha)
values ('Sigilo', 'Tecnicas', 1);

insert into habilidades (nombre, categoria, ficha)
values ('Supervivencia', 'Tecnicas', 1);

insert into habilidades (nombre, categoria, ficha)
values ('Trato con animales', 'Tecnicas', 1);


insert into habilidades (nombre, categoria, ficha)
values ('Academicismo', 'Conocimientos', 1);

insert into habilidades (nombre, categoria, ficha)
values ('Ciencias', 'Conocimientos', 1);

insert into habilidades (nombre, categoria, ficha)
values ('Finanzas', 'Conocimientos', 1);

insert into habilidades (nombre, categoria, ficha)
values ('Informatica', 'Conocimientos', 1);

insert into habilidades (nombre, categoria, ficha)
values ('INvestigacion', 'Conocimientos', 1);

insert into habilidades (nombre, categoria, ficha)
values ('Leyes', 'Conocimientos', 1);

insert into habilidades (nombre, categoria, ficha)
values ('Lingüistica', 'Conocimientos', 1);

insert into habilidades (nombre, categoria, ficha)
values ('Medicina', 'Conocimientos', 1);

insert into habilidades (nombre, categoria, ficha)
values ('Ocultismo', 'Conocimientos', 1);

insert into habilidades (nombre, categoria, ficha)
values ('Politica', 'Conocimientos', 1);


insert into ventajas (nombre, categoria, ficha)
values ('', 'Trasfondos', 1);

insert into ventajas (nombre, categoria, ficha)
values ('', 'Disciplinas', 1);

insert into ventajas (nombre, categoria, ficha)
values ('Conciencia/ conviccion', 'Virtudes', 1);

insert into ventajas (nombre, categoria, ficha)
values ('Autocontrol/ instintos', 'Virtudes', 1);

insert into ventajas (nombre, categoria, ficha)
values ('Coraje', 'Virtudes', 1);


insert into otros_parametros (nombre, categoria, ficha)
values ('', 'Meritos y defectos', 1);

insert into otros_parametros (nombre, categoria, ficha)
values ('', 'Humanidad/ senda', 1);

insert into otros_parametros (nombre, categoria, ficha)
values ('Fuerza de voluntad', 'Otros', 1);

insert into otros_parametros (nombre, categoria, ficha)
values ('Reserva de sangre', 'Otros', 1);

insert into otros_parametros (nombre, categoria, ficha)
values ('', 'Salud', 1);