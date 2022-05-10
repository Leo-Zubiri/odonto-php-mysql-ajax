-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-05-2022 a las 06:34:39
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `odonto`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getCitas` ()  BEGIN
        SELECT m.ID,m.Nombres,m.Apellidos,p.NoAsig,p.Nombres,p.Apellidos,ci.Fecha,ci.Horario,t.Tratamiento,t.Costo,ci.Estatus
    FROM citas2 ci INNER JOIN Consulta co
    ON ci.idCita = co.IdConsulta
    INNER JOIN paciente2 p
    ON ci.IdPaciente = p.NoAsig
    INNER JOIN medico m
    ON ci.MedicoID = m.ID
    INNER JOIN DetConsulta dc
    ON co.IdConsulta = dc.IdConsulta
    INNER JOIN tratamientos t
    ON t.IdTratamiento = dc.IdTratamiento;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetMedicoByID` (IN `id` INT)  BEGIN
    SELECT * FROM medico m
    INNER JOIN especialidades e
    ON e.IdEspecialidad = m.Especialidad
    WHERE m.ID = id;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getMedicos` ()  BEGIN
    SELECT * FROM medico m
    INNER JOIN especialidades e
    ON e.IdEspecialidad = m.Especialidad;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_AgregarCita` (IN `nomM` VARCHAR(20), IN `apM` VARCHAR(20), IN `nomP` VARCHAR(20), IN `apP` VARCHAR(20), IN `fecha` DATE, IN `horario` TIME, IN `estado` VARCHAR(15))  BEGIN
    
    SELECT @idMedicoXD := m.ID FROM medico m WHERE nomM = m.Nombres AND apM = m.Apellidos;
    SELECT @idPacienteXD := p.NoAsig FROM paciente2 p WHERE nomP = p.Nombres AND apP = p.Apellidos;
    
	INSERT INTO citas2(medicoID, fecha,horario,idPaciente,Estatus)
    VALUES
    (
        @idMedicoXD,
        fecha,
        horario,
        @idPacienteXD,
        estado
    );
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_BuscarMedico` (IN `Name` VARCHAR(50), IN `LastName` VARCHAR(50), IN `Cedula` VARCHAR(50), IN `Phone` VARCHAR(20), IN `Spec` VARCHAR(50))  BEGIN


IF Cedula != "" THEN
    SELECT * FROM medico m
    INNER JOIN especialidades e
    ON e.IdEspecialidad = m.Especialidad 
    WHERE m.Cedula LIKE Cedula;

END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_BuscarMedicoZ` (IN `Name` VARCHAR(50), IN `LastName` VARCHAR(50), IN `Cedula` VARCHAR(50), IN `Phone` VARCHAR(20), IN `Spec` VARCHAR(50))  BEGIN


IF Cedula != "" THEN
    SELECT * FROM medico m
    INNER JOIN especialidades e
    ON e.IdEspecialidad = m.Especialidad 
    WHERE m.Cedula LIKE Cedula;

ELSEIF Phone != "" THEN
    SELECT * FROM medico m
    INNER JOIN especialidades e
    ON e.IdEspecialidad = m.Especialidad 
    WHERE m.Telefono LIKE Phone;

ELSEIF Spec != "" THEN
    SELECT * FROM medico m
    INNER JOIN especialidades e
    ON e.IdEspecialidad = m.Especialidad 
    WHERE e.Descripcion = Spec;

ELSEIF LastName != "" THEN
    IF Name != "" THEN
        SELECT * FROM medico m
        INNER JOIN especialidades e
        ON e.IdEspecialidad = m.Especialidad 
        WHERE m.Apellidos LIKE LastName and m.Nombres LIKE Name;
    ELSE 
        SELECT * FROM medico m
        INNER JOIN especialidades e
        ON e.IdEspecialidad = m.Especialidad 
        WHERE m.Apellidos LIKE LastName; 
    END IF;

ELSEIF Name != "" THEN
    SELECT * FROM medico m
    INNER JOIN especialidades e
    ON e.IdEspecialidad = m.Especialidad 
    WHERE m.Nombres LIKE Name;

ELSE
    SELECT * FROM medico m
    INNER JOIN especialidades e
    ON e.IdEspecialidad = m.Especialidad; 
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_BuscarPacienteZ` (IN `Name` VARCHAR(50), IN `LastName` VARCHAR(50), IN `Street` VARCHAR(50), IN `Num` VARCHAR(10), IN `Col` VARCHAR(50), IN `City` VARCHAR(50), IN `Estado` VARCHAR(50), IN `CP2` VARCHAR(10), IN `DateNac` DATE, IN `Sex` CHAR(1), IN `Phone` VARCHAR(20))  BEGIN


IF Phone != "" THEN
    SELECT * FROM Paciente2 p
    WHERE p.Telefono LIKE Phone;


ELSEIF CP2 != "" THEN
    SELECT * FROM Paciente2 p
    WHERE p.CP LIKE CP2;


ELSEIF Sex != "" THEN
    SELECT * FROM Paciente2 p
    WHERE p.Sexo LIKE Sex;

ELSEIF Col != "" THEN
    SELECT * FROM Paciente2 p
    WHERE p.Colonia LIKE Col;

ELSEIF City != "" THEN
    SELECT * FROM Paciente2 p
    WHERE p.Ciudad LIKE City;

ELSEIF DateNac != null THEN
    SELECT * FROM Paciente2 p
    WHERE p.FechaNac LIKE DateNac;

ELSEIF Estado != "" THEN
    SELECT * FROM Paciente2 p
    WHERE p.Estado LIKE Estado;

ELSEIF LastName != "" THEN
    IF Name != "" THEN
       SELECT * FROM Paciente2 p
        WHERE p.Nombres LIKE Name and p.Apellidos LIKE LastName;
    ELSE 
        SELECT * FROM Paciente2 p
        WHERE p.Apellidos LIKE LastName;
    END IF;

ELSEIF Name != "" THEN
    SELECT * FROM Paciente2 p
    WHERE p.Nombres LIKE Name ;

ELSE
    SELECT * FROM Paciente2 p;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_CreateMedico` (IN `Ced` INT, IN `Name` VARCHAR(50), IN `LastName` VARCHAR(50), IN `Phone` VARCHAR(20), IN `Spec` INT)  BEGIN
Insert into medico(Cedula,Nombres,Apellidos, Telefono, Especialidad)
values(Ced, Name, LastName, Phone, Spec);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_CreateMedicoZ` (IN `Ced` VARCHAR(50), IN `Name` VARCHAR(50), IN `LastName` VARCHAR(50), IN `Phone` VARCHAR(20), IN `Spec` VARCHAR(50))  BEGIN
SELECT @id := e.IdEspecialidad FROM especialidades e WHERE Spec LIKE e.Descripcion;

Insert into medico(Cedula,Nombres,Apellidos, Telefono, Especialidad)
values(Ced, Name, LastName, Phone, @id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_CreatePaciente` (IN `Name` VARCHAR(50), IN `LastName` VARCHAR(50), IN `Street` VARCHAR(50), IN `Number` VARCHAR(10), IN `Col` VARCHAR(50), IN `City` INT, IN `CP2` INT, IN `DateNac` DATE, IN `Sex` CHAR(1), IN `Phone` VARCHAR(20), IN `Pic` MEDIUMBLOB)  BEGIN
Insert into paciente(Nombres,Apellidos, Calle, Numero, Colonia, Ciudad, CP, FechaNac, Sexo, Telefono, Foto)
values(Name, LastName, Street, Number, Col, City, CP2, DateNac, Sex, Phone, Pic);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_CreatePacienteZ` (IN `Name` VARCHAR(50), IN `LastName` VARCHAR(50), IN `Street` VARCHAR(50), IN `Num` VARCHAR(10), IN `Col` VARCHAR(50), IN `City` VARCHAR(50), IN `Estado` VARCHAR(50), IN `CP2` VARCHAR(10), IN `DateNac` DATE, IN `Sex` CHAR(1), IN `Phone` VARCHAR(20))  BEGIN
Insert into Paciente2(Nombres,Apellidos,Calle,Numero,Colonia,Ciudad,Estado,CP,FechaNac,Sexo,Telefono)
values(Name, LastName, Street, Num, Col, City,Estado, CP2, DateNac, Sex, Phone);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_CreateUsuario` (IN `Username` VARCHAR(15), IN `Pass` VARCHAR(15), IN `Name` VARCHAR(100), IN `Pic` MEDIUMBLOB)  BEGIN
Insert into usuarios(Login,Password,Nombre, Foto)
values(Username, Pass, Name, Pic);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_DeleteMedico` (IN `MedicoID` INT)  BEGIN
DELETE FROM medico WHERE ID = MedicoID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_DeletePaciente` (IN `NoPaciente` INT)  BEGIN
DELETE FROM Paciente2 WHERE NoAsig = NoPaciente;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_DeleteUsuario` (IN `ClaveUsuario` INT)  BEGIN
DELETE FROM Usuarios WHERE Clave = ClaveUsuario;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_GetEspecialidades` ()  BEGIN
    SELECT e.Descripcion From especialidades e;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Iniciar_Sesion` (IN `usuario` VARCHAR(15), IN `pass` VARCHAR(15))  BEGIN
SELECT * FROM usuarios WHERE Login=usuario AND Password = pass;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ReadMedico` (IN `MedicoID` INT)  BEGIN
SELECT * FROM medico
WHERE ID = MedicoID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ReadMedicoZ` (IN `MedicoID` INT)  BEGIN

SELECT * FROM medico m
    INNER JOIN especialidades e
    ON e.IdEspecialidad = m.Especialidad 
    WHERE m.ID = MedicoID;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ReadPaciente` (IN `NoPaciente` INT)  BEGIN
SELECT * FROM Paciente2
WHERE NoAsig = NoPaciente;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ReadUsuario` (IN `ClaveUsuario` INT)  BEGIN
SELECT * FROM Usuarios
WHERE ClaveUsuario = Clave;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_UpdateMedico` (IN `MedicoID` INT, IN `Ced` INT, IN `Name` VARCHAR(50), IN `LastName` VARCHAR(50), IN `Phone` VARCHAR(20), IN `Spec` INT)  BEGIN
UPDATE medico SET 
Cedula = Ced,
Nombres = Name,
Apellidos = LastName,
Telefono = Phone,
Especialidad = Spec
WHERE ID = MedicoID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_UpdateMedicoZ` (IN `MedicoID` INT, IN `Ced` INT, IN `Name` VARCHAR(50), IN `LastName` VARCHAR(50), IN `Phone` VARCHAR(20), IN `Spec` VARCHAR(50))  BEGIN
SELECT @idEsp := e.IdEspecialidad FROM especialidades e WHERE Spec LIKE e.Descripcion;
UPDATE medico SET 
Cedula = Ced,
Nombres = Name,
Apellidos = LastName,
Telefono = Phone,
Especialidad = @idEsp
WHERE ID = MedicoID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_UpdatePaciente` (IN `NoPaciente` INT, IN `Name` VARCHAR(50), IN `LastName` VARCHAR(50), IN `Street` VARCHAR(50), IN `Number` VARCHAR(10), IN `Col` VARCHAR(50), IN `City` VARCHAR(50), IN `CP2` VARCHAR(10), IN `DateNac` DATE, IN `Sex` CHAR(1), IN `Phone` VARCHAR(20))  BEGIN
UPDATE Paciente2 SET 
Nombres = Name,
Apellidos = LastName, 
Calle = Street, 
Numero = Number, 
Colonia = Col, 
Ciudad = City, 
CP = CP2, 
FechaNac = DateNac, 
Sexo = Sex, 
Telefono = Phone
WHERE NoAsig = NoPaciente;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_UpdateUsuario` (IN `ClaveUsuario` INT, IN `Username` VARCHAR(15), IN `Pass` VARCHAR(15), IN `Name` VARCHAR(100), IN `Pic` MEDIUMBLOB)  BEGIN
UPDATE Usuarios SET Login = Username,
Password = Pass,
Nombre = Name,
Foto = Pic
WHERE Clave = ClaveUsuario;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `idHorario` int(11) NOT NULL,
  `MedicoId` int(11) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Horario` time DEFAULT NULL,
  `IdPaciente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas2`
--

CREATE TABLE `citas2` (
  `idCita` int(11) NOT NULL,
  `MedicoId` int(11) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Horario` time DEFAULT NULL,
  `IdPaciente` int(11) DEFAULT NULL,
  `Estatus` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `citas2`
--

INSERT INTO `citas2` (`idCita`, `MedicoId`, `Fecha`, `Horario`, `IdPaciente`, `Estatus`) VALUES
(1, 3, '2022-01-02', '23:59:59', 1, 'Programada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE `ciudades` (
  `IdCiudad` int(11) NOT NULL,
  `Ciudad` varchar(50) DEFAULT NULL,
  `Estado` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`IdCiudad`, `Ciudad`, `Estado`) VALUES
(1, 'Altamira', 'Tamaulipas'),
(2, 'CD Madero', 'Tamaulipas'),
(3, 'Tampico', 'Tamaulipas'),
(4, 'Aldama', 'Tamaulipas'),
(5, 'Mante', 'Tamaulipas'),
(6, 'Victoria', 'Tamaulipas'),
(7, 'Gonzalez', 'Tamaulipas'),
(8, 'Pueblo Viejo', 'Veracruz'),
(9, 'Panuco', 'Veracruz'),
(10, 'Ebano', 'San Luis Potosi'),
(11, 'CD Valles', 'San Luis Potosi');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE `consulta` (
  `IdConsulta` int(11) DEFAULT NULL,
  `idHorario` int(11) DEFAULT NULL,
  `Diagnostico` varchar(250) DEFAULT NULL,
  `Costo` decimal(10,2) DEFAULT NULL,
  `Observaciones` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detconsulta`
--

CREATE TABLE `detconsulta` (
  `IdConsulta` int(11) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `IdTratamiento` int(11) DEFAULT NULL,
  `Costo` decimal(10,2) DEFAULT NULL,
  `Observaciones` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disponibilidad`
--

CREATE TABLE `disponibilidad` (
  `MedicoID` int(11) DEFAULT NULL,
  `Dia` varchar(20) DEFAULT NULL,
  `Horario1` int(11) DEFAULT NULL,
  `Horario2` int(11) DEFAULT NULL,
  `Horario3` int(11) DEFAULT NULL,
  `Horario4` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disponibilidad2`
--

CREATE TABLE `disponibilidad2` (
  `MedicoID` int(11) DEFAULT NULL,
  `DiaInicial` varchar(10) DEFAULT NULL,
  `DiaFinal` varchar(10) DEFAULT NULL,
  `HorarioInicial1` int(11) DEFAULT NULL,
  `HorarioFinal1` int(11) DEFAULT NULL,
  `HorarioInicial2` int(11) DEFAULT NULL,
  `HorarioFinal2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `IdEspecialidad` int(11) NOT NULL,
  `Descripcion` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`IdEspecialidad`, `Descripcion`) VALUES
(1, 'Cirujano Dentista'),
(2, 'Ortodoncista'),
(3, 'OrtoPediatra'),
(4, 'Dentista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `ID` int(11) NOT NULL,
  `Cedula` int(11) DEFAULT NULL,
  `Nombres` varchar(50) DEFAULT NULL,
  `Apellidos` varchar(50) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `Especialidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`ID`, `Cedula`, `Nombres`, `Apellidos`, `Telefono`, `Especialidad`) VALUES
(1, 190231, 'Hedson', 'Zubiri', '8332321226', 3),
(2, 33, 'Joshua', 'Carrasco', '8332122354', 3),
(3, 333333, 'Alejandro', 'Sosa', '908182323', 4),
(14, 1, 'Nombre', 'Apellido', '833', 4),
(15, 123, 'php2', 'prueba', '1321231', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `NoAsig` int(11) NOT NULL,
  `Nombres` varchar(50) DEFAULT NULL,
  `Apellidos` varchar(50) DEFAULT NULL,
  `Calle` varchar(50) DEFAULT NULL,
  `Numero` varchar(10) DEFAULT NULL,
  `Colonia` varchar(50) DEFAULT NULL,
  `Ciudad` int(11) DEFAULT NULL,
  `CP` int(11) DEFAULT NULL,
  `FechaNac` date DEFAULT NULL,
  `Sexo` char(1) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `Foto` mediumblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente2`
--

CREATE TABLE `paciente2` (
  `NoAsig` int(11) NOT NULL,
  `Nombres` varchar(50) DEFAULT NULL,
  `Apellidos` varchar(50) DEFAULT NULL,
  `Calle` varchar(50) DEFAULT NULL,
  `Numero` varchar(10) DEFAULT NULL,
  `Colonia` varchar(50) DEFAULT NULL,
  `Ciudad` varchar(50) DEFAULT NULL,
  `Estado` varchar(50) DEFAULT NULL,
  `CP` varchar(10) DEFAULT NULL,
  `FechaNac` date DEFAULT NULL,
  `Sexo` varchar(1) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `Foto` mediumblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paciente2`
--

INSERT INTO `paciente2` (`NoAsig`, `Nombres`, `Apellidos`, `Calle`, `Numero`, `Colonia`, `Ciudad`, `Estado`, `CP`, `FechaNac`, `Sexo`, `Telefono`, `Foto`) VALUES
(1, 'Luis 2', 'Borjas', 'Escandinava', '892', 'Isotopico', 'Madero', 'Tamaulipas', '89765', '2022-05-16', 'H', '891232132', NULL),
(5, 'Carmela', 'Almeda', 'Venustiano Carranza', '371', 'Angeles', 'Madero', '', '8900', '0000-00-00', 'F', '8339698712', NULL),
(8, 'php', 'prueba', 'Callesita', '1321', 'Ipodromo', 'Tampico', '', '12', '0000-00-00', 'M', '23', NULL),
(9, 'Arturo1', 'Medina', 'Callesita', '1212', 'Ipodromo', 'Tampico', '', '23', '0000-00-00', NULL, '534', NULL),
(10, 'php', '1', 'Callesita', '123', 'Ipodromo', 'Tampico', '', '1', '0000-00-00', 'H', '1', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamientos`
--

CREATE TABLE `tratamientos` (
  `IdTratamiento` int(11) NOT NULL,
  `Tratamiento` varchar(150) DEFAULT NULL,
  `Costo` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tratamientos`
--

INSERT INTO `tratamientos` (`IdTratamiento`, `Tratamiento`, `Costo`) VALUES
(1, 'Amalgamas', '200.00'),
(2, 'Limpieza', '600.00'),
(3, 'Extraccion', '150.00'),
(4, 'Anestrecia', '20.00'),
(5, 'Radiografias', '30.00'),
(6, 'Empastes Frontales', '50.00'),
(7, 'Limpieza Profunda', '1200.00'),
(8, 'Limpieza con Laser', '1500.00'),
(9, 'Blanqueamiento de Diente', '800.00'),
(10, 'Ortodoncia Inicial', '5500.00'),
(11, 'Consulta', '50.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Clave` int(11) NOT NULL,
  `Login` varchar(15) DEFAULT NULL,
  `Password` varchar(15) DEFAULT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Foto` mediumblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Clave`, `Login`, `Password`, `Nombre`, `Foto`) VALUES
(1, 'admin', 'admin', 'Administrador', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`idHorario`);

--
-- Indices de la tabla `citas2`
--
ALTER TABLE `citas2`
  ADD PRIMARY KEY (`idCita`);

--
-- Indices de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`IdCiudad`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`IdEspecialidad`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`NoAsig`);

--
-- Indices de la tabla `paciente2`
--
ALTER TABLE `paciente2`
  ADD PRIMARY KEY (`NoAsig`);

--
-- Indices de la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  ADD PRIMARY KEY (`IdTratamiento`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Clave`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `idHorario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `citas2`
--
ALTER TABLE `citas2`
  MODIFY `idCita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  MODIFY `IdCiudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `IdEspecialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `medico`
--
ALTER TABLE `medico`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `NoAsig` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `paciente2`
--
ALTER TABLE `paciente2`
  MODIFY `NoAsig` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  MODIFY `IdTratamiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Clave` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
