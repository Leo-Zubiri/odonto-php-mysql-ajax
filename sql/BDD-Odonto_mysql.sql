Create Database Odonto

Create Table Usuarios(
      Clave int PRIMARY KEY NOT NULL AUTO_INCREMENT,
      Login varchar(15),
      Password varchar(15),
      Nombre varchar(100),
      Foto mediumblob    
); 
Create Table Paciente(
    NoAsig int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Nombres varchar(50),
    Apellidos varchar(50),
    Calle varchar(50),
    Numero varchar(10),
    Colonia varchar(50),
    Ciudad int,
    CP int,
    FechaNac date,
    Sexo  char(1),
    Telefono varchar(20),
    Foto mediumblob    
);
Create Table Medico(
   ID int PRIMARY KEY NOT NULL AUTO_INCREMENT,
   Cedula  int,
   Nombres varchar(50),
   Apellidos varchar(50),
   Telefono varchar(20),
   Especialidad int
);
Create Table Disponibilidad(
  MedicoID int,
  Dia     varchar(20),
  Horario1 int,
  Horario2 int,
  Horario3 int,
  Horario4 int  
);
Create Table Citas(
   idHorario int PRIMARY KEY NOT NULL AUTO_INCREMENT,
   MedicoId  int,
   Fecha     date,
   Horario   time,
   IdPaciente int   
);
Create Table Consulta(
    IdConsulta int,
    idHorario int,
    Diagnostico varchar(250),
    Costo decimal(10,2) ,
    Observaciones varchar(250)
);
Create Table DetConsulta(
  IdConsulta int,
  Cantidad   int,
  IdTratamiento  int,
  Costo decimal(10,2) ,
  Observaciones  varchar(250)
);
Create Table Ciudades(
    IdCiudad  int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Ciudad   varchar(50),
    Estado   varchar(50)
);
Create Table Especialidades(
    IdEspecialidad int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Descripcion varchar(150)
);

Create Table Tratamientos(
    IdTratamiento int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Tratamiento varchar(150),
    Costo decimal(10,2) 
);


--------------------------------------
--------------------------------------
---------------DATOS------------------
--------------------------------------
--------------------------------------

Insert into usuarios(Login,Password,Nombre) values('admin','admin','Administrador');
 
Insert Into Ciudades (Ciudad, Estado) values ('Altamira','Tamaulipas');
Insert Into Ciudades (Ciudad, Estado) values ('CD Madero','Tamaulipas');
Insert Into Ciudades (Ciudad, Estado) values ('Tampico','Tamaulipas');
Insert Into Ciudades (Ciudad, Estado) values ('Aldama','Tamaulipas');
Insert Into Ciudades (Ciudad, Estado) values ('Mante','Tamaulipas');
Insert Into Ciudades (Ciudad, Estado) values ('Victoria','Tamaulipas');
Insert Into Ciudades (Ciudad, Estado) values ('Gonzalez','Tamaulipas');
Insert Into Ciudades (Ciudad, Estado) values ('Pueblo Viejo','Veracruz');
Insert Into Ciudades (Ciudad, Estado) values ('Panuco','Veracruz');
Insert Into Ciudades (Ciudad, Estado) values ('Ebano','San Luis Potosi');
Insert Into Ciudades (Ciudad, Estado) values ('CD Valles','San Luis Potosi');

Insert Into Tratamientos (Tratamiento, Costo) values('Amalgamas',200);
Insert Into Tratamientos (Tratamiento, Costo) values('Limpieza',600);
Insert Into Tratamientos (Tratamiento, Costo) values('Extraccion',150);
Insert Into Tratamientos (Tratamiento, Costo) values('Anestrecia',20);
Insert Into Tratamientos (Tratamiento, Costo) values('Radiografias',30);
Insert Into Tratamientos (Tratamiento, Costo) values('Empastes Frontales',50);
Insert Into Tratamientos (Tratamiento, Costo) values('Limpieza Profunda',1200);
Insert Into Tratamientos (Tratamiento, Costo) values('Limpieza con Laser',1500);
Insert Into Tratamientos (Tratamiento, Costo) values('Blanqueamiento de Diente',800);
Insert Into Tratamientos (Tratamiento, Costo) values('Ortodoncia Inicial',5500);
Insert Into Tratamientos (Tratamiento, Costo) values('Consulta',50);

insert Into Especialidades (Descripcion) values('Cirujano Dentista');
insert Into Especialidades (Descripcion) values('Ortodoncista');
insert Into Especialidades (Descripcion) values('OrtoPediatra');
insert Into Especialidades (Descripcion) values('Dentista');


