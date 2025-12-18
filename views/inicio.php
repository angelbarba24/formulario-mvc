<?php
// views/inicio.php
?>
<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard - Inicio</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        
        <style>
            /* Mismo fondo "Deep Space" que el login para consistencia */
            body {
                background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
                background-attachment: fixed;
                min-height: 100vh;
            }
            
            /* Efecto cristal para la tarjeta */
            .card-glass {
                background-color: rgba(33, 37, 41, 0.85); 
                border: 1px solid rgba(255, 255, 255, 0.1);
                box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
                backdrop-filter: blur(4px);
            }

            /* Efecto cristal para el Navbar */
            .navbar-glass {
                background-color: rgba(33, 37, 41, 0.9) !important;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            }
        </style>
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-dark navbar-glass shadow-sm mb-5">
            <div class="container">
                <a class="navbar-brand fw-bold text-primary" href="#">
                    <i class="bi bi-shield-lock-fill me-2"></i>LOGIN-MVC
                </a>
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav align-items-center gap-3">
                        <li class="nav-item text-light">
                            <div class="d-flex align-items-center bg-dark bg-opacity-50 px-3 py-1 rounded-pill border border-secondary">
                                <i class="bi bi-person-fill me-2 text-secondary"></i>
                                <small class="text-secondary me-1">Usuario:</small> 
                                <span class="fw-bold text-light"><?php echo htmlspecialchars($_SESSION['idusuario']); ?></span>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?action=logout" class="btn btn-outline-danger btn-sm px-3">
                                <i class="bi bi-box-arrow-right me-1"></i> Cerrar Sesión
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card card-glass text-light mb-5">
                        <div class="card-header bg-transparent border-bottom border-secondary p-3">
                            <h5 class="mb-0 text-primary"><i class="bi bi-speedometer2 me-2"></i>Panel de Control</h5>
                        </div>
                        <div class="card-body p-5 text-center">
                            
                            <div class="mb-4">
                                <div class="d-inline-block p-3 rounded-circle bg-primary bg-opacity-10 mb-3">
                                    <i class="bi bi-person-circle display-1 text-primary"></i>
                                </div>
                                <h2 class="fw-light">¡Bienvenido de nuevo!</h2>
                                <p class="lead text-secondary">
                                    Hola, <strong class="text-light"><?php echo htmlspecialchars($_SESSION['idusuario']); ?></strong>.
                                </p>
                            </div>
                            
                            <div class="alert alert-success d-flex align-items-center justify-content-center bg-success bg-opacity-10 border-success border-opacity-25 text-success" role="alert">
                                <i class="bi bi-check-circle-fill me-2"></i>
                                <div>
                                    Has iniciado sesión correctamente en el sistema.
                                </div>
                            </div>

                        </div>
                        <div class="card-footer bg-transparent border-top border-secondary text-secondary text-center small py-3">
                            Ángel Barba Fernández - 2ºDAW
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>