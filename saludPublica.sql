CREATE DATABASE saludPublica;

use saludPublica;


CREATE TABLE contacto(
rutContacto varchar(10) NOT NULL,
nombreContacto varchar(30)  NOT NULL,
emailContacto varchar(45) NOT NULL,
telefonoContacto varchar(15) NOT NULL,
codigoEmpresa numeric(6) NOT NULL
);

ALTER TABLE contacto ADD CONSTRAINT contacto_pk PRIMARY KEY
(rutContacto);

ALTER TABLE contacto ADD CONSTRAINT cont_emp_fk FOREIGN KEY
(codigoEmpresa) REFERENCES empresa(codigoEmpresa);


CREATE TABLE empresa(
codigoEmpresa  numeric(6) NOT NULL,
rutEmpresa varchar(10) NOT NULL,
nombreEmpresa varchar(30) NOT NULL,
passwordEmpresa varchar(10) NOT NULL,
direccionEmpresa varchar(50) NOT NULL
);

ALTER TABLE empresa ADD CONSTRAINT empresa_pk PRIMARY KEY
(codigoEmpresa);


CREATE TABLE particular(
codParticular numeric(6) NOT NULL,
rutParticular varchar(45) NOT NULL,
passwordParticular varchar(45) NOT NULL,
nombreParticular varchar(45) NOT NULL,
direccionParticular varchar(45) NOT NULL,
emailParticular varchar(100) NOT NULL
);

ALTER TABLE particular ADD CONSTRAINT particular_pk PRIMARY KEY
(codParticular);


CREATE TABLE telefono(
idTelefono integer NOT NULL,
numeroTelefono varchar(15) NOT NULL,
codParticular numeric(6) NOT NULL
);

ALTER TABLE telefono ADD CONSTRAINT telefono_pk PRIMARY KEY
(idTelefono);


ALTER TABLE telefono ADD CONSTRAINT telefono_part_fk FOREIGN KEY
(codParticular) REFERENCES particular(codParticular);


CREATE TABLE analisismuestra(
idMuestra integer NOT NULL,
fechaRecepcion DATE NOT NULL,
temp_muestra numeric(3,1) NOT NULL,
cantMuestra numeric(15) NOT NULL,
codigoEmpresa numeric(6) NOT NULL,
codParticular numeric(6) NOT NULL,
rutEmp varchar(10) NOT NULL
);

ALTER TABLE  analisismuestra ADD CONSTRAINT analisismuestra_pk
PRIMARY KEY(idMuestra);

ALTER TABLE analisismuestra ADD CONSTRAINT analisis_empresa_fk
FOREIGN KEY(codigoEmpresa) REFERENCES empresa(codigoEmpresa);

ALTER TABLE analisismuestra ADD CONSTRAINT analisis_part_fk 
FOREIGN KEY (codParticular) REFERENCES particular
(codParticular);


ALTER TABLE analisismuestra ADD CONSTRAINT analisis_empleado_fk
FOREIGN KEY(rutEmp) REFERENCES empleado(rutEmp);


CREATE TABLE empleado(
rutEmp varchar(10) NOT NULL,
nombreEmpleado varchar(50) NOT NULL,
passEmp  varchar(10) NOT NULL,
categoria varchar(1) NOT NULL
);

ALTER TABLE empleado ADD CONSTRAINT empleado_pk PRIMARY KEY
(rutEmp);



CREATE TABLE resultadoanalisis(
idTipo integer NOT NULL,
idMuestra integer NOT NULL,
fecharegistro DATE NOT NULL,
ppm numeric(7) NOT NULL,
estado numeric(7) NOT NULL,
rutEmp varchar(10) NOT NULL
);

ALTER TABLE resultadoanalisis ADD CONSTRAINT resultadoanalisis_pk
PRIMARY KEY(idTipo,idMuestra);


CREATE TABLE tipoanalisis(
idTipo integer NOT NULL,
nombre varchar(45) NOT NULL
);

ALTER TABLE tipoanalisis ADD CONSTRAINT tipoanalisis_pk
PRIMARY KEY(idTipo);


