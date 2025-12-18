<?php
    if (isset($_SESSION['usuario_logueado'])) {  // si el usuario estuviera ya logeado, lo derivamos al inicio interno
        header("Location: index.php?action=dashboard");    // nosotros haremos comprobación de token
        exit();
    }

    if (empty($_SESSION['csrf_token'])) {
        // Creación de un CSRF Token
        // Nota: random_bytes es más seguro que openssl_random_pseudo_bytes en PHP moderno
        try {
            $csrf_token = bin2hex(random_bytes(64));
        } catch (Exception $e) {
            $csrf_token = bin2hex(openssl_random_pseudo_bytes(64));
        }

        // Resguardo del CSRF Token en una sesión
        $_SESSION['csrf_token'] = $csrf_token;
    }else {
        // Si YA existe lo recuperamos para usarlo en el HTML
        $csrf_token = $_SESSION['csrf_token'];
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Formulario</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    </head>
    <body class="bg-light">
        <div class="container d-flex justify-content-center align-items-center vh-100">
            <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%;">
                <h3 class="text-center mb-4">Iniciar Sesión</h3>

                <?php
                    if (isset($_SESSION['error'])) {
                        echo '<div class="alert alert-danger" role="alert">';
                        echo  $_SESSION['error'];
                        echo '</div>';
                        unset ($_SESSION['error']);
                    }
                ?>

                <form action="index.php?action=authenticate" method="post" id="formulario">
                    <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">

                    <div class="mb-3">
                        <label for="usuario" class="form-label">Usuario</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Introduce tu usuario">
                        <div id="usuarioHelp" class="form-text text-danger" hidden>El usuario es obligatorio.</div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Introduce tu contraseña">
                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                        <div id="passwordHelp" class="form-text text-danger" hidden>La contraseña es obligatoria.</div>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Entrar</button>
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

            // Alternar el tipo de input
            if (passwordInput.getAttribute('type') === 'password') {
                passwordInput.setAttribute('type', 'text');
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash'); // Cambia a ojo tachado
            } else {
                passwordInput.setAttribute('type', 'password');
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye'); // Cambia a ojo normal
            }
        });
    </script>
</html>