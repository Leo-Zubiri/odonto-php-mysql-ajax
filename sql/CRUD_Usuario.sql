#Create Usuario
DELIMITER //
	
CREATE PROCEDURE SP_CreateUsuario(
	IN Username varchar(15),
	IN Pass varchar(15),
	IN Name varchar(100),
	IN Pic mediumblob   
)
BEGIN
Insert into usuarios(Login,Password,Nombre, Foto)
values(Username, Pass, Name, Pic);
END //

DELIMITER ;

#Read Usuario
GO
DELIMITER //
	
CREATE PROCEDURE SP_ReadUsuario(
	IN ClaveUsuario int
)
BEGIN
SELECT * FROM Usuarios
WHERE ClaveUsuario = Clave;
END //

DELIMITER ;

# Update Usuario
GO
DELIMITER //
	
CREATE PROCEDURE SP_UpdateUsuario(
	IN ClaveUsuario int,
    IN Username varchar(15),
	IN Pass varchar(15),
	IN Name varchar(100),
	IN Pic mediumblob   
)
BEGIN
UPDATE Usuarios SET Login = Username,
Password = Pass,
Nombre = Name,
Foto = Pic
WHERE Clave = ClaveUsuario;
END //

DELIMITER ;

# Delete Usuario
GO
DELIMITER //
	
CREATE PROCEDURE SP_DeleteUsuario(
	IN ClaveUsuario int 
)
BEGIN
DELETE FROM Usuarios WHERE Clave = ClaveUsuario;
END //

DELIMITER ;