
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../assets/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" type="text/javascript"></script>
    

</head>
<body>
    <div id="return">
        <a href="index.html"><i class="bi bi-arrow-left-circle-fill"></i></a>
    </div>
<div class="container">
    <div class="d-flex min-vh-100">
      <div class="row d-flex flex-grow-1 justify-content-center align-items-center">
        <div class="col-md-4 form login-form">
          <form id="form-login" method="POST" autocomplete="off">
            <h2 class="text-center txt">Inicio de sesión</h2>
              <div class="form-group mb-3">
                  <label class="txt-inputs">email:</label>
                  <div class="input-group flex-nowrap">
                  <span class="input-group-text" id="addon-wrapping"><i class="bi bi-person-circle"></i></span>
                  <input type="text" name="email" id="email" class="form-control" placeholder="Correo electrónico" required>
                  </div>
              </div>
              <div class="form-group mb-3">
                <label class="txt-inputs">Contraseña:</label>
                <div class="input-group flex-nowrap">
                  <span class="input-group-text" id="addon-wrapping"><i class="bi bi-lock-fill"></i></span>
                  <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required>
                </div>
              </div>
              <div class="form-group mb-3" id="input-acceder">
                <button type="submit" class="form-control btn btn-primary" id="btn" value="Acceder">Acceder</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="scripts/login.js"></script>
</body>

</html>