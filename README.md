<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Sistema de Tickets - Backend API

## Descripción
API REST desarrollada en Laravel para gestionar un sistema de tickets. La API proporciona endpoints para la gestión de tickets, usuarios, oficinas y equipos.

## Tecnologías Utilizadas
- Laravel
- MySQL
- Sanctum para autenticación
- CORS habilitado para comunicación con frontend

## Configuración del Proyecto

### Requisitos Previos
- PHP >= 7.4
- Composer
- MySQL
- XAMPP o servidor similar

### Instalación
1. Clonar el repositorio
2. Ejecutar `composer install`
3. Copiar `.env.example` a `.env` y configurar la base de datos
4. Ejecutar `php artisan key:generate`
5. Ejecutar migraciones: `php artisan migrate`
6. Ejecutar seeders: `php artisan db:seed`

### Configuración CORS
El backend está configurado para aceptar peticiones del frontend (http://localhost:5173) con las siguientes configuraciones en `config/cors.php`:
```php
'allowed_origins' => ['http://localhost:5173'],
'supports_credentials' => true,
```

## API Endpoints

### Autenticación
- POST `/api/login` - Iniciar sesión
- POST `/api/logout` - Cerrar sesión (requiere autenticación)
- GET `/api/user` - Obtener usuario actual (requiere autenticación)

### Tickets (requieren autenticación)
- GET `/api/tickets` - Listar tickets
- POST `/api/tickets` - Crear ticket
- GET `/api/tickets/{id}` - Ver ticket específico
- PUT `/api/tickets/{id}` - Actualizar ticket
- DELETE `/api/tickets/{id}` - Eliminar ticket
- PUT `/api/tickets/{id}/assign` - Asignar ticket
- PUT `/api/tickets/{id}/resolve` - Resolver ticket

### Oficinas (requieren autenticación)
- GET `/api/offices` - Listar oficinas
- POST `/api/offices` - Crear oficina
- GET `/api/offices/{id}` - Ver oficina específica
- PUT `/api/offices/{id}` - Actualizar oficina
- DELETE `/api/offices/{id}` - Eliminar oficina

### Equipos (requieren autenticación)
- GET `/api/equipment` - Listar equipos
- POST `/api/equipment` - Crear equipo
- GET `/api/equipment/{id}` - Ver equipo específico
- PUT `/api/equipment/{id}` - Actualizar equipo
- DELETE `/api/equipment/{id}` - Eliminar equipo

## Estado Actual
- ✅ Configuración básica del proyecto
- ✅ Autenticación implementada
- ✅ CRUD de Tickets
- ✅ CRUD de Oficinas
- ✅ CRUD de Equipos
- ✅ Configuración CORS para frontend

## Pendiente
- [ ] Implementar sistema de notificaciones
- [ ] Agregar validaciones adicionales
- [ ] Mejorar manejo de errores
- [ ] Implementar sistema de roles y permisos
- [ ] Agregar tests automatizados
- [ ] Documentación API con Swagger/OpenAPI
