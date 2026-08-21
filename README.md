# 🛞 Control de Neumáticos y Llantas

Sistema MVP en Laravel (PHP) para el control de neumáticos y llantas con autenticación y roles.

## Características

- **Autenticación** con login por correo y contraseña
- **4 roles**: `admin`, `slw`, `qet`, `butc`
- **Redirección automática** post-login según rol
- **CRUD de neumáticos** con filtro por área
- **Middleware de roles** para proteger rutas

## Roles y Acceso

| Usuario | Contraseña | Rol | Acceso |
|---------|------------|-----|--------|
| admin@neumaticos.local | Admin123! | admin | Dashboard admin + todos los neumáticos |
| slw@neumaticos.local | Slw123! | slw | Página SLW + neumáticos del área SLW |
| qet@neumaticos.local | Qet123! | qet | Página QET + neumáticos del área QET |
| butc@neumaticos.local | Butc123! | butc | Página BUTC + neumáticos del área BUTC |

## Instalación

```bash
# 1. Clonar el repositorio
git clone https://github.com/ArmandoCortes19/Neumaticos.git
cd Neumaticos

# 2. Instalar dependencias PHP
composer install

# 3. Configurar entorno
cp .env.example .env
php artisan key:generate

# 4. Configurar base de datos en .env
# DB_CONNECTION=sqlite  (o mysql)
# DB_DATABASE=/ruta/absoluta/database.sqlite  (para SQLite)

# 5. Crear archivo SQLite (si usas SQLite)
touch database/database.sqlite

# 6. Ejecutar migraciones y seeders
php artisan migrate --seed

# 7. Iniciar servidor
php artisan serve
```

Luego visita: http://localhost:8000

## Estructura del Proyecto

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── Auth/LoginController.php    # Login / Logout
│   │   ├── DashboardController.php     # Redirección por rol
│   │   └── NeumaticoController.php     # CRUD neumáticos
│   └── Middleware/
│       └── RoleMiddleware.php          # Control de acceso por rol
└── Models/
    ├── User.php                        # Usuario con campo role
    └── Neumatico.php                   # Modelo neumático

database/
├── migrations/
│   ├── ..._create_users_table.php      # Tabla users + campo role
│   └── ..._create_neumaticos_table.php # Tabla neumaticos
└── seeders/
    └── DatabaseSeeder.php              # 4 usuarios de prueba

resources/views/
├── auth/login.blade.php
├── layouts/app.blade.php
├── admin/index.blade.php
├── areas/{slw,qet,butc}.blade.php
└── neumaticos/{index,create,edit,show}.blade.php

routes/web.php                          # Rutas protegidas por auth + role
bootstrap/app.php                       # Registro del middleware 'role'
```

## Módulo Neumáticos

Campos:
- **Código** (único)
- **Marca**
- **Medida** (Ej: 275/80R22.5)
- **Estado**: `nuevo`, `en_uso`, `desgaste`, `baja`
- **Área**: `slw`, `qet`, `butc`
- **Observaciones** (opcional)

Reglas de negocio:
- Admin ve todos los registros y puede asignar área
- Usuarios SLW/QET/BUTC solo ven y crean en su área
