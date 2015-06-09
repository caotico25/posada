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
values ('Juegos de rol', 'Todo sobre juegos de rol.');

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
