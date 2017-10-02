CREATE TABLE personal
(
  idpersonal int NOT NULL PRIMARY KEY DEFAULT '0' ,
  nombre character varying(255),
  direccion character varying(255),
  email character varying(255),
  cantidad int
);