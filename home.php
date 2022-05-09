<?php include "./_head.php"; ?>

    <title>OdonTam - Home</title>
</head>
<body class="text-center">
<?php 
$menu = "home";
include "./_nav.php"; 
?>

<!-- main - donde almacenara todo el contenido de la pagina separado por divs u otras etiquetas -->
<main class="container my-3">
    <!-- grupo de cartas - este contiene las imagenes y texto -->
    <div class="card-group">
        <div class="card mx-3">
            <img src="img/medico_01.jpg" class="card-img" alt="medico">
            <div class="card-body">
            <h5 class="card-title">Medicos</h5>
            <p class="card-text">Contamos con medicos especialistas en su área. Si cuentas con algun problema, no dudes en contactarnos, alguno podrá ayudarte.</p>            
            </div>
        </div>
        <div class="card mx-3">
            <img src="img/sonrisa_02.jpg" class="card-img" alt="paciente">
            <div class="card-body">
            <h5 class="card-title">Pacientes</h5>
            <p class="card-text">Sonríe! Ten la confianza con nosotros, tu sonrisa te lo agradecera.</p>            
            </div>
        </div>
        <div class="card mx-3">
            <img src="img/agenda_01.jpg" class="card-img" alt="citas">
            <div class="card-body">
            <h5 class="card-title">Citas</h5>
            <p class="card-text">Agenda tu cita cuando antes!. Contactanos para reservarte el día y la hora, no digas "luego...".</p>            
            </div>
        </div>
    </div>
</main>

<?php include "./_footer.php"; ?>