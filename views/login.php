<?php
    // Mantenemos tu lógica PHP intacta
    if (isset($_SESSION['usuario_logueado'])) {
        header("Location: index.php?action=dashboard");
        exit();
    }

    if (empty($_SESSION['csrf_token'])) {
        try {
            $csrf_token = bin2hex(random_bytes(64));
        } catch (Exception $e) {
            $csrf_token = bin2hex(openssl_random_pseudo_bytes(64));
        }
        $_SESSION['csrf_token'] = $csrf_token;
    } else {
        $csrf_token = $_SESSION['csrf_token'];
    }
?>
<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Acceso Seguro</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        
        <style>
            /* Estilo personalizado para un fondo más profesional que el gris por defecto */
            body {
                background: linear-gradient(135deg, #0f2027, #203a43, #2c5364); /* Degradado "Deep Space" */
                background-attachment: fixed;
                height: 100vh;
            }
            .card {
                /* Efecto sutil de cristal y borde suave */
                background-color: rgba(33, 37, 41, 0.95); 
                border: 1px solid rgba(255, 255, 255, 0.1);
                box-shadow: 0 0 20px rgba(0,0,0,0.5);
            }
            /* Ajuste para que el input del grupo se vea bien unido al botón */
            .input-group-text {
                background-color: transparent;
                border-left: 0;
            }
        </style>
    </head>
    <body>
        <div class="container d-flex justify-content-center align-items-center vh-100">
            <div class="card p-4 rounded-3" style="max-width: 400px; width: 100%;">
                
                <div class="text-center mb-3 text-primary">
                    <i class="bi bi-shield-lock-fill" style="font-size: 3rem;"></i>
                </div>

                <h3 class="text-center mb-4 fw-light">Iniciar Sesión</h3>

                <?php
                    if (isset($_SESSION['error'])) {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                        echo '<i class="bi bi-exclamation-triangle-fill me-2"></i>' . $_SESSION['error'];
                        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                        echo '</div>';
                        unset ($_SESSION['error']);
                    }
                ?>

                <form action="index.php?action=authenticate" method="post" id="formulario">
                    <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">

                    <div class="mb-3">
                        <label for="usuario" class="form-label text-secondary small">USUARIO</label>
                        <div class="input-group">
                            <span class="input-group-text text-secondary bg-dark border-secondary"><i class="bi bi-person"></i></span>
                            <input type="text" class="form-control bg-dark text-light border-secondary border-start-0 ps-0" id="usuario" name="usuario" placeholder="Introduce tu usuario">
                        </div>
                        <div id="usuarioHelp" class="form-text text-danger" hidden>El usuario es obligatorio.</div>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label text-secondary small">CONTRASEÑA</label>
                        <div class="input-group">
                            <span class="input-group-text text-secondary bg-dark border-secondary"><i class="bi bi-key"></i></span>
                            <input type="password" class="form-control bg-dark text-light border-secondary border-start-0 border-end-0 ps-0" id="password" name="password" placeholder="Introduce tu contraseña">
                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                        <div id="passwordHelp" class="form-text text-danger" hidden>La contraseña es obligatoria.</div>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">Entrar</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
    <script src="./views/js/validaciones.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');

            if (passwordInput.getAttribute('type') === 'password') {
                passwordInput.setAttribute('type', 'text');
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                passwordInput.setAttribute('type', 'password');
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        });
    </script>
</html>