<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Sistema de Gestión de Tickets de Soporte - OTI

## Descripción
Sistema de registro y seguimiento de incidencias para la Oficina de Tecnologías de Información (OTI). Este sistema permite gestionar tickets de soporte técnico, mantenimiento y capacitación para los equipos informáticos de la institución.

## Características Implementadas

### Gestión de Oficinas
- Registro y gestión de oficinas
- Seguimiento de ubicación y departamento
- Estado activo/inactivo de oficinas

### Gestión de Equipos
- Registro detallado de equipos (PCs, Impresoras, Laptops)
- Información de garantía y especificaciones técnicas
- Seguimiento del estado operativo
- Asociación con oficinas

### Sistema de Tickets
- Creación de tickets de soporte
- Asignación a técnicos
- Seguimiento de estado (abierto, en progreso, resuelto, cerrado)
- Priorización de tickets (bajo, medio, alto, crítico)
- Tipos de servicio (preventivo, correctivo, capacitación, instalación)
- Registro de resolución y notas

### Autenticación y Seguridad
- Autenticación mediante tokens (Laravel Sanctum)
- Roles de usuario (administrador, técnico, usuario)
- Protección de rutas API

## Tecnologías Utilizadas
- Laravel 8
- MySQL
- Laravel Sanctum para autenticación
- Soft Deletes para eliminación suave

## Estructura de la Base de Datos
- Usuarios (roles y autenticación)
- Oficinas (información departamental)
- Equipos (inventario técnico)
- Tickets (gestión de incidencias)

## API Endpoints

### Autenticación
- POST /api/login - Iniciar sesión
- POST /api/logout - Cerrar sesión
- GET /api/user - Obtener usuario actual

### Oficinas
- GET /api/offices - Listar oficinas
- POST /api/offices - Crear oficina
- GET /api/offices/{id} - Ver detalles de oficina
- PUT /api/offices/{id} - Actualizar oficina
- DELETE /api/offices/{id} - Eliminar oficina

### Equipos
- GET /api/equipment - Listar equipos
- POST /api/equipment - Registrar equipo
- GET /api/equipment/{id} - Ver detalles de equipo
- PUT /api/equipment/{id} - Actualizar equipo
- DELETE /api/equipment/{id} - Eliminar equipo

### Tickets
- GET /api/tickets - Listar tickets
- POST /api/tickets - Crear ticket
- GET /api/tickets/{id} - Ver detalles de ticket
- PUT /api/tickets/{id} - Actualizar ticket
- DELETE /api/tickets/{id} - Eliminar ticket
- PUT /api/tickets/{id}/assign - Asignar ticket a técnico
- PUT /api/tickets/{id}/resolve - Marcar ticket como resuelto

## Instrucciones de Instalación
1. Clonar el repositorio
2. Ejecutar `composer install`
3. Copiar `.env.example` a `.env` y configurar la base de datos
4. Ejecutar `php artisan key:generate`
5. Ejecutar `php artisan migrate --seed`
6. Ejecutar `php artisan serve`

## Credenciales de Prueba
- Administrador: admin@example.com / password
- Técnico 1: tecnico1@example.com / password
- Técnico 2: tecnico2@example.com / password
- Usuario: usuario@example.com / password

## Próximas Funcionalidades
- Sistema de notificaciones
- Subida de archivos adjuntos
- Sistema de comentarios en tickets
- Dashboard con estadísticas
- Generación de reportes
- Historial de mantenimientos por equipo
