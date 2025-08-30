-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-07-2025 a las 01:48:36
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `futbol`
--

-- --------------------------------------------------------
-- Estructura de tabla para la tabla `atleta`
--
CREATE TABLE `atleta` (
  `CODA` int(11) NOT NULL,
  `ID_Atleta` varchar(10) DEFAULT NULL,
  `CI` varchar(11) DEFAULT NULL,
  `ID_Categoria` int(11) DEFAULT NULL,
  `Grado_Instruccion` varchar(50) DEFAULT NULL,
  `Solvencia` varchar(50) DEFAULT NULL,
  `Colegio` varchar(50) DEFAULT NULL,
  `Estatus` varchar(11) DEFAULT NULL,
  `Foto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Estructura de tabla para la tabla `categoria`
--
CREATE TABLE `categoria` (
  `ID_Categoria` int(11) NOT NULL,
  `Categoria` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Estructura de tabla para la tabla `contacto`
--
CREATE TABLE `contacto` (
  `Cedula` varchar(11) NOT NULL,
  `Telefono` varchar(11) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Direccion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Estructura de tabla para la tabla `credenciales`
--
CREATE TABLE `credenciales` (
  `CODI` int(11) NOT NULL,
  `Usuario` varchar(50) DEFAULT NULL,
  `Clave` varchar(100) DEFAULT NULL,
  `Rol` varchar(20) DEFAULT NULL,
  `Inicio_Sesion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Estructura de tabla para la tabla `evento`
--
CREATE TABLE `evento` (
  `CODE` int(11) NOT NULL,
  `ID_Evento` varchar(11) DEFAULT NULL,
  `ID_Categoria` int(11) DEFAULT NULL,
  `ID_Tipo` int(11) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `ID_Horario` int(11) DEFAULT NULL,
  `Disciplina` varchar(100) DEFAULT NULL,
  `Descripcion` text DEFAULT NULL,
  `Estatus` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Estructura de tabla para la tabla `horario`
--
CREATE TABLE `horario` (
  `CODH` int(11) NOT NULL,
  `ID_Horario` int(11) NOT NULL,
  `Horario_inicio` varchar(11) DEFAULT NULL,
  `Hora_cierre` varchar(11) DEFAULT NULL,
  `Dias` varchar(11) DEFAULT NULL,
  `Estatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Estructura de tabla para la tabla `persona`
--
CREATE TABLE `persona` (
  `CI` varchar(11) NOT NULL,
  `Nombre1` varchar(50) DEFAULT NULL,
  `Nombre2` varchar(50) DEFAULT NULL,
  `Apellido1` varchar(50) DEFAULT NULL,
  `Apellido2` varchar(50) DEFAULT NULL,
  `Fecha_Nac` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Estructura de tabla para la tabla `representante`
--
CREATE TABLE `representante` (
  `CODR` int(11) NOT NULL,
  `ID_Representante` varchar(11) NOT NULL,
  `ID_Atleta` varchar(11) DEFAULT NULL,
  `CI` varchar(11) DEFAULT NULL,
  `Parentesco` varchar(50) NOT NULL,
  `Estatus` varchar(11) NOT NULL,
  `Foto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Estructura de tabla para la tabla `tipo_evento`
--
CREATE TABLE `tipo_evento` (
  `ID_Tipo` int(11) NOT NULL,
  `Tipo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

-- Primero las PKs de las tablas referenciadas
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID_Categoria`);
ALTER TABLE `persona`
  ADD PRIMARY KEY (`CI`);

-- Índices y FKs de la tabla `atleta`
ALTER TABLE `atleta`
  ADD PRIMARY KEY (`CODA`),
  ADD UNIQUE KEY `ID_Atleta` (`ID_Atleta`),
  ADD CONSTRAINT `fk_atleta_persona` FOREIGN KEY (`CI`) REFERENCES `persona`(`CI`),
  ADD CONSTRAINT `fk_atleta_categoria` FOREIGN KEY (`ID_Categoria`) REFERENCES `categoria`(`ID_Categoria`);

-- Resto de índices y relaciones
ALTER TABLE `credenciales`
  ADD PRIMARY KEY (`CODI`);
ALTER TABLE `horario`
  ADD PRIMARY KEY (`CODH`), ADD UNIQUE KEY `ID_Horario` (`ID_Horario`);
ALTER TABLE `tipo_evento`
  ADD PRIMARY KEY (`ID_Tipo`);
ALTER TABLE `evento`
  ADD PRIMARY KEY (`CODE`), ADD UNIQUE KEY `ID_Evento` (`ID_Evento`),
  ADD CONSTRAINT `fk_evento_categoria` FOREIGN KEY (`ID_Categoria`) REFERENCES `categoria`(`ID_Categoria`),
  ADD CONSTRAINT `fk_evento_tipo_evento` FOREIGN KEY (`ID_Tipo`) REFERENCES `tipo_evento`(`ID_Tipo`);
ALTER TABLE `representante`
  ADD PRIMARY KEY (`CODR`), ADD UNIQUE KEY `ID_Representante` (`ID_Representante`),
  ADD CONSTRAINT `fk_representante_persona` FOREIGN KEY (`CI`) REFERENCES `persona`(`CI`),
  ADD CONSTRAINT `fk_representante_atleta` FOREIGN KEY (`ID_Atleta`) REFERENCES `atleta`(`ID_Atleta`);
ALTER TABLE `contacto`
  ADD CONSTRAINT `fk_contacto_persona` FOREIGN KEY (`Cedula`) REFERENCES `persona`(`CI`);

-- --------------------------------------------------------
-- Ajustar AUTO_INCREMENT en las columnas de clave primaria
--
ALTER TABLE `atleta`       MODIFY `CODA`        int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `categoria`    MODIFY `ID_Categoria` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `credenciales` MODIFY `CODI`        int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `evento`       MODIFY `CODE`        int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `horario`      MODIFY `CODH`        int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `tipo_evento`  MODIFY `ID_Tipo`     int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `representante`MODIFY `CODR`        int(11) NOT NULL AUTO_INCREMENT;

--
-- Inserción de datos de ejemplo
--

-- Categorías
INSERT INTO `categoria` (`ID_Categoria`,`Categoria`) VALUES
  (1,'Senior'),
  (2,'Junior');
-- Personas
INSERT INTO `persona` (`CI`,`Nombre1`,`Nombre2`,`Apellido1`,`Apellido2`,`Fecha_Nac`) VALUES
  ('V10000001','Juan','Carlos','Pérez','Gómez','2000-01-01'),
  ('V10000002','María','Luisa','Rodríguez','López','2001-02-02'),
  ('V10000003','Pedro','Luis','Martínez','Díaz','1999-03-03'),
  ('V20000001','Luis','Fernando','Sánchez','Díaz','1975-04-04'),
  ('V20000002','Ana','Beatriz','Torres','Ruiz','1980-05-05'),
  ('V20000003','Carlos','Alberto','Gómez','Salas','1965-06-06');

-- Horario necesario para eventos
INSERT INTO `horario` (`CODH`,`ID_Horario`,`Horario_inicio`,`Hora_cierre`,`Dias`,`Estatus`) VALUES
  (1,'H-10001','08:00','10:00','Lunes',1);

-- Tipos de evento
INSERT INTO `tipo_evento` (`ID_Tipo`,`Tipo`) VALUES
  (1,'Torneo'),
  (2,'Exhibición');

-- Credenciales
INSERT INTO `credenciales` (`Usuario`,`Clave`,`Rol`,`Inicio_Sesion`) VALUES
  ('user1','clave1','admin','2025-07-25'),
  ('user2','clave2','user','2025-07-25'),
  ('user3','clave3','user','2025-07-26');

-- Atletas
INSERT INTO `atleta` (`ID_Atleta`,`CI`,`ID_Categoria`,`Grado_Instruccion`,`Solvencia`,`Colegio`,`Estatus`,`Foto`) VALUES
  ('A-10001','V10000001',1,'Licenciatura','Solvente','Colegio A','Activo',0),
  ('A-10002','V10000002',2,'Bachiller','Solvente','Colegio B','Activo',0),
  ('A-10003','V10000003',1,'Maestría','Moroso','Colegio C','Inactivo',0);

-- Contactos
INSERT INTO `contacto` (`Cedula`,`Telefono`,`Correo`,`Direccion`) VALUES
  ('V10000001','04141234567','juan.perez@example.com','Calle 1 #123'),
  ('V10000002','04149876543','maria.rodriguez@example.com','Av. 2 #456'),
  ('V20000001','04142345678','luis.sanchez@example.com','Carrera 3 #789');

-- Representantes
INSERT INTO `representante` (`ID_Representante`,`ID_Atleta`,`CI`,`Parentesco`,`Estatus`,`Foto`) VALUES
  ('R-10001','A-10001','V20000001','Padre','Activo',0),
  ('R-10002','A-10002','V20000002','Madre','Activo',0),
  ('R-10003','A-10003','V20000003','Hermano/a','Inactivo',0);

-- Eventos
INSERT INTO `evento` (`ID_Evento`,`ID_Categoria`,`ID_Tipo`,`Fecha`,`ID_Horario`,`Disciplina`,`Descripcion`,`Estatus`) VALUES
  ('E-10001',1,1,'2025-07-25','H-10001','Fútbol','Partido amistoso','1'),
  ('E-10002',2,2,'2025-07-26','H-10001','Fútbol Copa','Evento de copa','1');

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;