<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Iniciar Sesion</title>
</head>
<body>
    <!--Login-->
    <div class="container-fluid">
        <div class="row d-flex justify-content-center align-items-center vh-100">
            <div class="col-xl-8 col-lg-6 col-md-4 mx-auto">
                <div class="row">
                    <h1 class="text-center p-4">Iniciar sesión</h1>
                </div>
                <div class="row">
                    <div class="col-4 mx-auto">
                        <form method="POST" action="auth">
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Correo</label>
                              <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                              <input type="password" class="form-control" name="password" id="exampleInputPassword1" required>
                            </div>
                            <button type="submit" class="btn btn-success w-100">Iniciar sesión</button>

                            <input type="hidden" name="action" value="login">
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>