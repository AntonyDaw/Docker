CREATE DATABASE agenda;

use agenda;

CREATE TABLE datos(
    nombre varchar(255),
    apellido varchar(255),
    direccion varchar(255),
    telefono int,
    edad int,
    altura float
);

INSERT INTO datos 
    (nombre, apellido, direccion, telefono, edad, altura)
VALUES 
    ('Manuel Jesús', 'López de la Rosa', 'C/Juan Bautista Nº 3', 658954875, 32, 1.80),
    ('María', 'Manzano Cabezas', 'C/Arco del triunfo Nº 7', 695001002, 19, 1.99),
    ('Pedro', 'Somoza Castro', 'C/Solera nº88, B', 88834321, 44, 1.66),
    ('Juana', 'Pérez Rozas', 'Avda. Luarcato nº22', 888111222, 22, 1.77) 
; 

SELECT * FROM datos;