Aquí tienes la documentación de tu API basada en las rutas definidas en api.php. Esta documentación está diseñada para que un frontend externo pueda consumirla fácilmente.

# Documentación de la API

Esta API permite gestionar usuarios, personajes y partidas. Incluye autenticación mediante JWT y diferentes niveles de acceso (usuarios y administradores).

## Base URL
http://localhost/api


---

## **Autenticación**

### Registro de usuario
**POST** `/register`

**Body (JSON):**
```json
{
    "name": "string",
    "role": "admin | user",
    "email": "string",
    "password": "string",
    "password_confirmation": "string"
}
Respuesta:

201 Created: Usuario registrado correctamente.
422 Unprocessable Entity: Errores de validación.
Inicio de sesión
POST /login

Body (JSON):

{
    "email": "string",
    "password": "string"
}
Respuesta:

200 OK: Devuelve el token JWT.
401 Unauthorized: Credenciales inválidas.
Cerrar sesión (requiere token)
POST /logout

Headers:

Authorization: Bearer {token}
Respuesta:

200 OK: Sesión cerrada correctamente.
Usuarios (Admin)
Obtener todos los usuarios
GET /users

Headers:

Authorization: Bearer {token}
Respuesta:

200 OK: Lista de usuarios.
Obtener un usuario por ID
GET /users/{id}

Headers:

Authorization: Bearer {token}
Respuesta:

200 OK: Detalles del usuario.
404 Not Found: Usuario no encontrado.
Actualizar un usuario
PUT /users/{id}

Headers:

Authorization: Bearer {token}
Body (JSON):

{
    "name": "string",
    "email": "string",
    "role": "admin | user",
    "password": "string",
    "password_confirmation": "string"
}
Respuesta:

200 OK: Usuario actualizado.
404 Not Found: Usuario no encontrado.
Eliminar un usuario
DELETE /users/{id}

Headers:

Authorization: Bearer {token}
Respuesta:

200 OK: Usuario eliminado.
404 Not Found: Usuario no encontrado.
Personajes
Obtener todos los personajes
GET /personajes

Respuesta:

200 OK: Lista de personajes.
Obtener un personaje por ID
GET /personajes/{id}

Respuesta:

200 OK: Detalles del personaje.
404 Not Found: Personaje no encontrado.
Crear un personaje (requiere token)
POST /personajes

Headers:

Authorization: Bearer {token}
Body (JSON):

{
    "nombre": "string",
    "url_imagen": "string"
}
Respuesta:

201 Created: Personaje creado.
422 Unprocessable Entity: Errores de validación.
Actualizar un personaje (Admin)
PUT /personajes/{id}

Headers:

Authorization: Bearer {token}
Body (JSON):

{
    "nombre": "string",
    "url_imagen": "string"
}
Respuesta:

200 OK: Personaje actualizado.
404 Not Found: Personaje no encontrado.
Eliminar un personaje (Admin)
DELETE /personajes/{id}

Headers:

Authorization: Bearer {token}
Respuesta:

200 OK: Personaje eliminado.
404 Not Found: Personaje no encontrado.
Partidas
Obtener todas las partidas del usuario (requiere token)
GET /games

Headers:

Authorization: Bearer {token}
Respuesta:

200 OK: Lista de partidas.
Crear una partida (requiere token)
POST /games

Headers:

Authorization: Bearer {token}
Respuesta:

201 Created: Partida creada.
Finalizar una partida (requiere token)
PUT /games/{game}/finish

Headers:

Authorization: Bearer {token}
Body (JSON):

{
    "clicks": "integer",
    "points": "integer",
    "duration": "integer"
}
Respuesta:

200 OK: Partida actualizada.
403 Forbidden: No tienes permiso para actualizar esta partida.
Eliminar una partida (Admin o propietario)
DELETE /games/{game}

Headers:

Authorization: Bearer {token}
Respuesta:

200 OK: Partida eliminada.
403 Forbidden: No tienes permiso para eliminar esta partida.
Obtener el ranking de los 5 mejores jugadores
GET /ranking

Respuesta:

200 OK: Ranking de jugadores.
Obtener todas las partidas de un usuario (Admin)
GET /users/{id}/games

Headers:

Respuesta:

200 OK: Lista de partidas del usuario.
404 Not Found: Usuario no tiene partidas o no existe.
Notas
Todos los endpoints protegidos requieren un token JWT en el encabezado Authorization.
Los administradores tienen acceso a rutas adicionales para gestionar usuarios y personajes.
