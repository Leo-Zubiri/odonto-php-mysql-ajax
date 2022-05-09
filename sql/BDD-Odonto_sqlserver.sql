Create Database Odonto

Create Table Usuarios(
      Clave int IDENTITY (1, 1) NOT NULL,
      Login varchar(15),
      Password varchar(15),
      Nombre varchar(100),
      foto imagen     
) 
Create Table Paciente(
    NoAsig int IDENTITY (1, 1) NOT NULL,
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
    Foto imagen    
)
Create Table Medico(
   ID int IDENTITY(1,1) NOT NULL,
   Cedula  int,
   Nombres varchar(50),
   Apellidos varchar(50),
   Telefono varchar(20),
   Especialidad int
)
Create Table Disponibilidad(
  MedicoID int,
  Dia     varchar(20),
  Horario1 int,
  Horario2 int,
  Horario3 int,
  Horario4 int  
)
Create Table Citas(
   idHorario int IDENTITY(1,1) NOT NULL,
   MedicoId  int,
   Fecha     date,
   Horario   time,
   IdPaciente int   
)
Create Table Consulta(
    IdConsulta  int,
    idHorario   int,
    Diagnostico     varchar(250),
    Costo    money,
    Observaciones varchar(250)
)
Create Table DetConsulta(
  IdConsulta int,
  Cantidad   int,
  IdTratamiento  int,
  Costo        money,
  Observaciones  varchar(250)
)
Create Table Ciudades(
    IdCiudad  int IDENTITY (1, 1) NOT NULL,
    Ciudad   varchar(50),
    Estado   varchar(50)
)
Create Table Especialidades(
    IdEspecialidad  int IDENTITY (1, 1) NOT NULL,
    Descripcion   varchar(150)    
)

Create Table Tratamientos(
    IdTratamiento  int IDENTITY (1, 1) NOT NULL,
    Tratamiento   varchar(150),
    Costo   money
)

///////Datos
 Insert into usuarios(Login,Password,Nombre) values(,'admin','admin','Administrador');
 
Insert Into Ciudades values ('Altamira','Tamaulipas');
Insert Into Ciudades values ('CD Madero','Tamaulipas');
Insert Into Ciudades values ('Tampico','Tamaulipas');
Insert Into Ciudades values ('Aldama','Tamaulipas');
Insert Into Ciudades values ('Mante','Tamaulipas');
Insert Into Ciudades values ('Victoria','Tamaulipas');
Insert Into Ciudades values ('Gonzalez','Tamaulipas');
Insert Into Ciudades values ('Pueblo Viejo','Veracruz');
Insert Into Ciudades values ('Panuco','Veracruz');
Insert Into Ciudades values ('Ebano','San Luis Potosi');
Insert Into Ciudades values ('CD Valles','San Luis Potosi');

Insert Into Tratamientos values('Amalgamas',200);
Insert Into Tratamientos values('Limpieza',600);
Insert Into Tratamientos values('Extraccion',150);
Insert Into Tratamientos values('Anestrecia',20);
Insert Into Tratamientos values('Radiografias',30);
Insert Into Tratamientos values('Empastes Frontales',50);
Insert Into Tratamientos values('Limpieza Profunda',1200);
Insert Into Tratamientos values('Limpieza con Laser',1500);
Insert Into Tratamientos values('Blanqueamiento de Diente',800);
Insert Into Tratamientos values('Ortodoncia Inicial',5500);
Insert Into Tratamientos values('Consulta',50);

insert Into Especialidades values('Cirujano Dentista');
insert Into Especialidades values('Ortodoncista');
insert Into Especialidades values('OrtoPediatra');
insert Into Especialidades values('Dentista');


