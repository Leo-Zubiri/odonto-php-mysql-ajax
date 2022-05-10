<?php include "./_head.php"; ?>
    <link rel="stylesheet" href="css/popup.css">
    <title>OdonTam - Home</title>
</head>
<body class="text-center">
<?php 
$menu = "citas";
include "./_nav.php"; 
include_once "DB/CRUD.php";


$Citas = getCitas();
$Medicos = getMedicos();
$Pacientes = getPacientes();
$Cita = null;


if(isset($_GET["id"])){
    
    $id = $_GET["id"];
    $Cita = getCitaByID($id);

    // echo '<script type="text/javascript"> document.getElementById("openPopUp").click(); </script> ';  
    
}else{
    $id=-1;
}

// ID CITA | MEDICO ID | FECHA | Horario | ID PACIENTE
?>



<main class = "container my-3">
    <caption>  <!-- Titulo de la tabla -->
        <h3>Tabla citas</h3>                
        <a href="#popUp" id="openPopUp" type="submit" class="mx-3">
            <img src="img/ico/sala.png" width="150" height="150">
            <p>Agrega una nueva cita</p>
            <!-- <img src="./img/ico/logout_white.png" width="25" alt="Logout"> -->
        </a>        
    </caption>


    <section class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered first">
                <thead>
                    <tr>                                                
                        <th>ID Cita</th>   
                        <th>Medico ID</th>                      
                        <th>Fecha</th>
                        <th>Horario</th>                        
                        <th>Paciente ID</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                
                    <?php foreach($Citas as $r){ ?>
                    <tr>
                        <td><?php echo $r->idCita?></td>
                        <td><?php echo $r->MedicoId?></td>
                        <td><?php echo $r->Fecha ?></td>
                        <td><?php echo $r->Horario ?></td>
                        <td><?php echo $r->IdPaciente ?></td>                        
                        <td>
                            <a href="citas.php?id=<?php echo $r->idCita?>#EditUp">
                                <img  class="me-2" src="./img/ico/modificar.png" width="25" alt="Modificar">
                            </a>

                            <a href="DB/actionCita.php?action=DEL&id=<?php echo $r->idCita ?>">
                                <img class="ms-2" src="./img/ico/eliminar2.png" width="25" alt="Eliminar">
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>

    <aside id="popUp" class="popup">
        <div class="popUpContainer">
          <header class="container ml-auto">
            <a href="#!" class="closePopUp">X</a>
            <h2>Agregar Citas</h2>
            <p>Ingrese los valores necesarios</p>
          </header>
          <form class="container" method="POST" action="DB/actionPaciente.php?action=POST">

            <div class="row px-4">
              <label class="col-md-6">Medico</label>
              <label class="col-md-6">Paciente</label>
            </div>
            <div class="row pb-4 px-4">
                <div class="col-md-6">
                    <input type="text" id="Medico" name="Medico0" placeholder="Medico" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <input type="text" id="Paciente" name="Paciente0" placeholder="Paciente" class="form-control" required>
                </div>                
            </div>

  
            <div class="row px-4">
              <label class="col-md-4">Fecha</label>
              <label class="col-md-4">Horario</label>              
              <label class="col-md-4"></label>              
            </div>
            <div class="row pb-4 px-4">
              <div class="col-md-4">
                <input type="date" id="Fecha" name="Fecha0" class="form-control" required>
              </div>              
              <div class="col-md-4">
                <input type="time" id="Horario" name="Horario0" class="form-control" required>
              </div>   
              <div class="col-md-4">
                <button class="btn btn-success my-2 my-sm-0" type="submit">Agregar</button>
              </div>           
            </div>                 
            
          </form>
        </div>
        <a href="#!" class="closePopUpOutSide"></a>
      </aside>



      <aside id="EditUp" class="popup">
        <div class="popUpContainer">
          <header class="container ml-auto">
            <a href="#!" class="closePopUp">X</a>
            <h2>Editar Cita</h2>
            <p>Ingrese los valores necesarios</p>
          </header>
          <form class="container" method="POST" action="DB/actionPaciente.php?action=POST">

            <div class="row px-4">
              <label class="col-md-6">Medico</label>
              <label class="col-md-6">Paciente</label>
            </div>
            <div class="row pb-4 px-4">
                <div class="col-md-6">
                    <input type="text" id="Medico" name="Medico1" placeholder="Medico" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <input type="text" id="Paciente" name="Paciente1" placeholder="Paciente" class="form-control" required>
                </div>                
            </div>

  
            <div class="row px-4">
              <label class="col-md-4">Fecha</label>
              <label class="col-md-4">Horario</label>              
              <label class="col-md-4"></label>              
            </div>
            <div class="row pb-4 px-4">
              <div class="col-md-4">
                <input type="date" id="Fecha" name="Fecha1" class="form-control" required>
              </div>              
              <div class="col-md-4">
                <input type="time" id="Horario" name="Horario1" class="form-control" required>
              </div>   
              <div class="col-md-4">
                <button class="btn btn-success my-2 my-sm-0" type="submit">Editar</button>
              </div>           
            </div>                 
            
          </form>
        </div>
        <a href="#!" class="closePopUpOutSide"></a>
      </aside>


</main>



<?php include "./_footer.php"; ?>