-- Estructura de tabla para la tabla "user"
--


CREATE TABLE TP5PWD.`user` (
	mail varchar(100) NOT NULL,
	nombre varchar(100) NOT NULL,
	contraseña varchar(100) NOT NULL
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_general_ci;