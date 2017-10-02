CREATE TABLE personal
(
  idpersonal SERIAL PRIMARY KEY,
  fecha TIMESTAMP DEFAULT now(),
  nombre character varying(255),
  direccion character varying(255),
  email character varying(255),
  cantidad integer,
  asunto character varying(255),
  estado character varying(50),
  supervisor character varying(255),
  bitacora character varying(750)
  
)