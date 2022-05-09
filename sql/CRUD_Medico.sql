#Create Medico
DELIMITER //
	
CREATE PROCEDURE SP_CreateMedico(
	IN Ced  int,
	IN Name varchar(50),
	IN LastName varchar(50),
	IN Phone varchar(20),
	IN Spec int
)
BEGIN
Insert into medico(Cedula,Nombres,Apellidos, Telefono, Especiadad)
values(Ced, Name, LastName, Phone, Spec);
END //

DELIMITER ;

#Read Medico
GO
DELIMITER //
	
CREATE PROCEDURE SP_ReadMedico(
	IN MedicoID int
)
BEGIN
SELECT * FROM medico
WHERE ID = MedicoID;
END //

DELIMITER ;

# Update Medico
GO
DELIMITER //
	
CREATE PROCEDURE SP_UpdateMedico(
	IN MedicoID int,
    IN Ced  int,
	IN Name varchar(50),
	IN LastName varchar(50),
	IN Phone varchar(20),
	IN Spec int
)
BEGIN
UPDATE medico SET 
Cedula = Ced,
Nombres = Name,
Apellidos = LastName,
Telefono = Phone,
Especialidad = Spec
WHERE ID = MedicoID;
END //

DELIMITER ;

# Delete Medico
GO
DELIMITER //
	
CREATE PROCEDURE SP_DeleteMedico(
	IN MedicoID int 
)
BEGIN
DELETE FROM medico WHERE ID = MedicoID;
END //

DELIMITER ;