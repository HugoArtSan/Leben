CREATE TABLE r_niveles_seguridad(
	id integer NOT NULL,
	clave character varying(3) NOT NULL,
	nombre character varying(30) NOT NULL,
	permisos text NOT NULL,
	modifico character varying(12) NOT NULL,
	CONSTRAINT key PRIMARY KEY (clavE)
)
WITH(
	OIDS=FALSE
	);
ALTER TABLE r_niveles_seguridad
	OWNER TO postgres;

CREATE TABLE r_usuarios( 
	id integer NOT NULL,
	login character varying(12) NOT NULL,
	pass character varying(12) NOT NULL,
	nombre character varying(50) NOT NULL,
	nivel_seguridad character varying(3) NOT NULL,
	observaciones text NOT NULL,
	modifico character varying(12) NOT NULL,
	CONSTRAINT llave PRIMARY KEY (login),
	CONSTRAINT usuarios_nivel_seguridad_fkey FOREIGN KEY (nivel_seguridad)
		REFERENCES r_niveles_seguridad (clave) MATCH SIMPLE
		ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH(
	OIDS=FALSE
	);
ALTER TABLE r_usuarios
	OWNER TO postgres;
