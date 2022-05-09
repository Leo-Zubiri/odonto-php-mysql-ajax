<?php include "./_head.php"; ?>
    <link rel="stylesheet" href="css/signin.css">
    <link rel="stylesheet" href="css/personal.css">
    <title>OdonTam</title>
</head>

<body class="text-center row">
    <div class="row">      
      <img class="banner" src="img/banner_03.jpg" alt=""> 

      <main class="form-signin">
        <form>                  
          <h3 class="mb-3 fw-normal">Ingrese su usuario y contraseña</h3>      
          
          <div class="form-floating">
            <input class="form-control" id="floatingInput" placeholder="Usuario">
            <label for="floatingInput">Usuario</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Contraseña</label>
          </div>
                
          <a href="./home.php" class="w-100 btn btn-lg btn-primary" type="submit">Sign in</a>          
        </form>
      </main>
    
    </div>

<?php include "./_footer.php"; ?>



