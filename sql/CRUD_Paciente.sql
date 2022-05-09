

#Create Paciente
DELIMITER //

CREATE PROCEDURE SP_CreatePaciente(
	IN Name varchar(50),
    IN LastName varchar(50),
    IN Street varchar(50),
    IN Number varchar(10),
    IN Col varchar(50),
    IN City int,
    IN CP2 int,
    IN DateNac date,
    IN Sex  char(1),
    IN Phone varchar(20),
    IN Pic mediumblob   
)
BEGIN
Insert into paciente(Nombres,Apellidos, Calle, Numero, Colonia, Ciudad, CP, FechaNac, Sexo, Telefono, Foto)
values(Name, LastName, Street, Number, Col, City, CP2, DateNac, Sex, Phone, Pic);
END //

DELIMITER ;

#Read Paciente
GO
DELIMITER //
	
CREATE PROCEDURE SP_ReadPaciente(
	IN NoPaciente int
)
BEGIN
SELECT * FROM paciente
WHERE NoAsig = NoPaciente;
END //

DELIMITER ;

# Update Paciente
GO
DELIMITER //
	
CREATE PROCEDURE SP_UpdatePaciente(
	IN NoPaciente int,
    IN Name varchar(50),
    IN LastName varchar(50),
    IN Street varchar(50),
    IN Number varchar(10),
    IN Col varchar(50),
    IN City int,
    IN CP2 int,
    IN DateNac date,
    IN Sex  char(1),
    IN Phone varchar(20),
    IN Pic mediumblob  
)
BEGIN
UPDATE paciente SET 
Nombres = Name,
Apellidos = LastName, 
Calle = Street, 
Numero = Number, 
Colonia = Col, 
Ciudad = City, 
CP = CP2, 
FechaNac = DateNac, 
Sexo = Sex, 
Telefono = Phone, 
Foto = Pic
WHERE NoAsig = NoPaciente;
END //

DELIMITER ;

# Delete Paciente
GO
DELIMITER //
	
CREATE PROCEDURE SP_DeletePaciente(
	IN NoPaciente int 
)
BEGIN
DELETE FROM Paciente WHERE NoAsig = NoPaciente;
END //

DELIMITER ;







# Seleccionar pacientes

GO

DELIMITER //
CREATE PROCEDURE     (
)
BEGIN
SELECT NoAsig, Nombre, Apellidos, FechaNac, Telefono
FROM Paciente;
END //
DELIMITER;