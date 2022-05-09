<?php include "./_head.php"; ?>
    <link rel="stylesheet" href="css/popup.css">
    <title>OdonTam - Home</title>
</head>
<body class="text-center">
<?php 
$menu = "pacientes";
include "./_nav.php"; 
include "./bdd.php"; 
?>

<main class = "container my-3">
<!-- text-center row mt-1 mb-3">     -->
    <caption>  <!-- Titulo de la tabla -->
        <h3>Tabla pacientes</h3>                
        <a href="#popUp" id="openPopUp" type="submit" class="mx-3">
            <p>Agrega un nuevo paciente</p>
            <!-- <img src="./img/ico/logout_white.png" width="25" alt="Logout"> -->
        </a>        
    </caption>






    <aside id="popUp" class="popup">
        <div class="popUpContainer">
          <header class="container ml-auto">
            <a href="#!" class="closePopUp">X</a>
            <h2>Agregar Paciente</h2>
            <p>Ingrese los valores necesarios</p>
          </header>
          <form class="container"">
            <div class="row p-4">
                <div class="col-md-6">
                    <input type="text" id="Nombres" placeholder="Nombres" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <input type="text" id="Apellidos" placeholder="Apellidos" class="form-control" required>
                </div>                
            </div>

            <div class="row p-4">
              <div class="col-md-4">
                <input type="date" id="FechaNac" placeholder="Fecha Nacimiento" class="form-control" required>
              </div>
              <div class="col-md-2">
                <input type="text" id="Sexo" placeholder="Sexo" class="form-control" required>
              </div>
              <div class="col-md-3">
                <input type="tel" id="Telefono" placeholder="Telefono" class="form-control" required>
              </div>
              <div class="col-md-3">
                <input type="text" id="Ciudad" placeholder="Ciudad" class="form-control" required>
              </div>
            </div>

            <div class="row p-4">
                <div class="col-md-4">
                    <input type="text" id="Calle" placeholder="Calle" class="form-control" required>
                </div>
                <div class="col-md-2">
                    <input type="number" id="Numero" placeholder="Numero" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <input type="text" id="Colonia" placeholder="Colonia" class="form-control" required>
                </div>
                <div class="col-md-2">
                  <input type="number" id="CP" placeholder="Codigo Postal" class="form-control" required>
              </div>
            </div>
            
            <div class="row p-4 my-2 my-lg-0">
                <button class="btn btn-success my-2 my-sm-0" type="submit">Agregar</button>
            </div>
          </form>
        </div>
        <a href="#!" class="closePopUpOutSide"></a>
      </aside>

</main>

<?php include "./_footer.php"; ?>