/**  ESTADOS DE PARTIDA  **/

insert into estados (estado)
values ('Preparando partida');

insert into estados (estado)
values ('Buscando jugadores');

insert into estados (estado)
values ('Comenzada');

insert into estados (estado)
values ('finalizada');


/** INICIALIZACION DE FICHA DE VAMPIRO **/
insert into fichas (usuario)
values (null);


/**  TIPOS DE JUEGO  **/

insert into tipos_juego (nombre, descripcion, ficha_base)
values ('Vampiro: La Mascarada', 'Juego clásico de rol con temática vampírica', 1);



/**  FICHA DE VAMPIRO  **/

/* DATOS DE PERSONAJE */
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Nombre', '', 'Personaje', '');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Naturaleza', '', 'Personaje', '');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Generacion', '', 'Personaje', '');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Conducta', '', 'Personaje', '');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Refugio', '', 'Personaje', '');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Cronica', '', 'Personaje', '');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Clan', '', 'Personaje', '');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Experiencia', '0', 'Personaje', '');

/* ATRIBUTOS */
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Fuerza', '0', 'Atributos', 'Fisicos');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Destreza', '0', 'Atributos', 'Fisicos');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Resistencia', '0', 'Atributos', 'Fisicos');

insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Carisma', '0', 'Atributos', 'Sociales');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Manipulacion', '0', 'Atributos', 'Sociales');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Apariencia', '0', 'Atributos', 'Sociales');

insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Percepcion', '0', 'Atributos', 'Mentales');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Inteligencia', '0', 'Atributos', 'Mentales');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Astucia', '0', 'Atributos', 'Mentales');

/* HABILIDADES */
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Alerta', '0', 'Habilidades', 'Talentos');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Atletismo', '0', 'Habilidades', 'Talentos');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Callejeo', '0', 'Habilidades', 'Talentos');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Empatia', '0', 'Habilidades', 'Talentos');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Esquivar', '0', 'Habilidades', 'Talentos');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Expresion', '0', 'Habilidades', 'Talentos');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Intimidacion', '0', 'Habilidades', 'Talentos');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Liderazgo', '0', 'Habilidades', 'Talentos');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Pelea', '0', 'Habilidades', 'Talentos');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Subterfugio', '0', 'Habilidades', 'Talentos');

insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Armas C.C.', '0', 'Habilidades', 'Tecnicas');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Armas de fuego', '0', 'Habilidades', 'Tecnicas');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Conducir', '0', 'Habilidades', 'Tecnicas');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Etiqueta', '0', 'Habilidades', 'Tecnicas');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Interpretacion', '0', 'Habilidades', 'Tecnicas');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Pericias', '0', 'Habilidades', 'Tecnicas');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Seguridad', '0', 'Habilidades', 'Tecnicas');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Sigilo', '0', 'Habilidades', 'Tecnicas');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Supervivencia', '0', 'Habilidades', 'Tecnicas');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Trato con animales', '0', 'Habilidades', 'Tecnicas');

insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Academicismo', '0', 'Habilidades', 'Conocimientos');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Ciencias', '0', 'Habilidades', 'Conocimientos');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Finanzas', '0', 'Habilidades', 'Conocimientos');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Informatica', '0', 'Habilidades', 'Conocimientos');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Investigacion', '0', 'Habilidades', 'Conocimientos');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Leyes', '0', 'Habilidades', 'Conocimientos');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Lingúistica', '0', 'Habilidades', 'Conocimientos');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Medicina', '0', 'Habilidades', 'Conocimientos');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Ocultismo', '0', 'Habilidades', 'Conocimientos');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Politica', '0', 'Habilidades', 'Conocimientos');

/* VENTAJAS */
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Trasfondos', '', 'Ventajas', '');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Disciplinas', '', 'Ventajas', '');

insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Conciencia / conviccion', '0', 'Ventajas', 'Virtudes');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Autocontrol / instintos', '0', 'Ventajas', 'Virtudes');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Coraje', '0', 'Ventajas', 'Virtudes');

/* OTROS PARAMETROS */
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Meritos y defectos', '', 'Otros', '');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Humanidad/ senda', '', 'Otros', '');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Fuerza de voluntad', '', 'Otros', '');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Reserva de sangre', '0', 'Otros', '');
insert into campos (ficha, nombre, valor, categoria, subcategoria)
values (1, 'Salud', '', 'Otros', '');
