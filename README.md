# Sistema de Login Seguro en PHP (MVC)

Un sistema de autenticación de usuarios robusto y modular desarrollado en **PHP nativo** siguiendo el patrón de arquitectura **MVC (Modelo-Vista-Controlador)**. Este proyecto implementa prácticas modernas de seguridad y un diseño responsivo utilizando **Bootstrap 5**.

![Estado del Proyecto](https://img.shields.io/badge/Estado-Terminado-green)
![PHP](https://img.shields.io/badge/PHP-7.4%2B-blue)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-purple)

## 📋 Características

### Arquitectura
- **Estructura MVC:** Separación clara entre la lógica de negocio (Controladores), acceso a datos (Modelos) e interfaz de usuario (Vistas).
- **Enrutamiento:** Un único punto de entrada (`index.php`) que gestiona las peticiones.

### 🔒 Seguridad Implementada
- **Hashing de Contraseñas:** Las contraseñas **nunca** se almacenan en texto plano. Se utiliza `password_hash()` (algoritmo Bcrypt) para el cifrado y `password_verify()` para la autenticación segura.
- **Protección CSRF:** Generación y validación de tokens únicos por sesión para evitar falsificación de peticiones en sitios cruzados.
- **Protección contra Fuerza Bruta:** Bloqueo temporal del usuario tras 5 intentos fallidos de inicio de sesión.
- **Sesiones Seguras:**
  - Cookies con atributos `HttpOnly` y `Secure`.
  - Regeneración automática de ID de sesión para evitar *Session Fixation*.
  - Configuración `SameSite` estricta.
- **Prevención de XSS:** Sanitización de salidas utilizando `htmlspecialchars`.
- **Prevención de SQL Injection:** Uso de *Prepared Statements* (PDO) en todas las consultas a base de datos.

### 🎨 Interfaz (UI)
- **Diseño Responsivo:** Adaptable a móviles y escritorio con Modo Oscuro (Dark Mode).
- **Feedback Visual:** Alertas de error y éxito claras para el usuario.
- **Validación Frontend:** Validación en tiempo real con JavaScript antes de enviar el formulario.
- **UX Mejorada:** Botón para mostrar/ocultar contraseña.

## 📂 Estructura del Proyecto

```text
/
├── config/
│   └── Database.php        # Conexión a Base de Datos (PDO)
├── controllers/
│   └── AuthController.php  # Lógica de login, logout y seguridad
├── models/
│   └── User.php            # Consultas SQL relacionadas con usuarios
├── views/
│   ├── js/
│   │   └── validaciones.js # Validaciones del lado del cliente
│   ├── inicio.php          # Dashboard (Área privada)
│   └── login.php           # Formulario de acceso
├── establecer-sesion.php   # Configuración de seguridad de cookies y sesiones
└── index.php               # Enrutador principal (Entry Point)
