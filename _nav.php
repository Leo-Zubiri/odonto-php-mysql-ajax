<!-- navbar - o barra de navegacion -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <img class="me-2" src="./img/ico/diente_06.png" alt="" width="50" />
        <a class="navbar-brand" href="./home.php">OdonTam</a>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarColor01"
            aria-controls="navbarColor01"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class=
                    <?php 
                        echo '"nav-link';
                        if($menu == "home"){
                            echo ' active" href="#"';
                        }else{
                            echo '" href="./home.php"';
                        }
                    ?>                    
                    >Home
                    <!-- <span class="visually-hidden">(current)</span> -->
                    </a>
                </li>
                <li class="nav-item">
                    <a class= 
                    <?php 
                        echo '"nav-link';
                        if($menu == "medicos"){
                            echo ' active" href="#"';
                        }else{
                            echo '" href="./medicos.php"';
                        }
                    ?> 
                    >Medicos</a>
                </li>
                <li class="nav-item">
                    <a class= 
                    <?php 
                        echo '"nav-link';
                        if($menu == "pacientes"){
                            echo ' active" href="#"';
                        }else{
                            echo '" href="./pacientes.php"';
                        }
                    ?> 
                    >Pacientes</a>
                </li>
                <li class="nav-item">
                    <a class=
                    <?php 
                        echo '"nav-link';
                        if($menu == "citas"){
                            echo ' active" href="#"';
                        }else{
                            echo '" href="./citas.php"';
                        }
                    ?> 
                    >Citas</a>
                </li>
            </ul>
            <!-- <a href="index.html" class="btn btn-light" type="submit">Salir</a> -->

            <a href="index.php" type="submit" class="mx-3">
                <img src="./img/ico/logout_white.png" width="25" alt="Logout">
            </a>

        </div>
    </div>
</nav>
