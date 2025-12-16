<?php
// views/inicio.php
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard - Inicio</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    </head>
    <body class="bg-light">

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <i class="bi bi-shield-lock-fill"></i> LOGIN-MVC
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item me-3 text-white">
                            <small>Usuario:</small> <strong><?php echo htmlspecialchars($_SESSION['idusuario']); ?></strong>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?action=logout" class="btn btn-danger btn-sm">
                                <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow border-0">
                        <div class="card-header bg-white border-bottom">
                            <h5 class="mb-0 text-primary">Panel de Control</h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="text-center mb-4">
                                <i class="bi bi-person-circle display-1 text-secondary"></i>
                                <h2 class="mt-3">¡Bienvenido!</h2>
                                <p class="lead text-muted">
                                    Hola, <strong><?php echo htmlspecialchars($_SESSION['idusuario']); ?></strong>.
                                </p>
                            </div>
                            
                            <div class="alert alert-success d-flex align-items-center" role="alert">
                                <i class="bi bi-check-circle-fill me-2"></i>
                                <div>
                                    Has iniciado sesión correctamente en el sistema.
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-muted text-center fs-6">
                            Ángel Barba Fernández - 2ºDAW
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>