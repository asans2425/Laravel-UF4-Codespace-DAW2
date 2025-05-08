Paste your rich text content here

# 🧠 API RESTful - Memory Game (Laravel 11 + JWT)

## 🎯 Objectiu del projecte

Aquesta API RESTful s’ha desenvolupat amb Laravel 11 per gestionar un **joc de Memory** en què els usuaris poden registrar-se, iniciar sessió, jugar partides i competir per puntuacions en un rànquing. L'API està pensada per ser consumida per un frontend fet amb JavaScript i `fetch()`.

* * *

## 🔐 Autenticació amb JWT

* *   Registre (`POST /api/register`) amb validació i rol (`admin` o `user`)
*     
* *   Login (`POST /api/login`) retorna token JWT
*     
* *   Logout (`POST /api/logout`) invalida el token
*     
* *   Obtenir perfil (`GET /api/me`) retorna dades de l’usuari autenticat
*     

* * *

## 🔧 Protecció de rutes

* *   `IsUserAuth`: middleware que permet accés només si l'usuari està autenticat
*     
* *   `IsAdmin`: només accessible si el `role` de l’usuari és `admin`
*     

* * *

## 🎮 Gestió de partides

**Models i taules relacionades:**

1. 1.  Taula `games`:
1.     
1.     * *   user\_id (clau forana)
1.     *     
1.     * *   clicks (int)
1.     *     
1.     * *   points (int)
1.     *     
1.     * *   duration (int, segons)
1.     *     
1.     * *   timestamps
1.     *     
1. 2.  Model `Game.php` amb relació belongsTo cap a `User.php`
1.     

**Controlador `GameController`:**

1. 1.  `index()` → retorna les partides de l’usuari loguejat
1.     
1. 2.  `store()` → crea una nova partida buida
1.     
1. 3.  `update()` → finalitza una partida (clicks, points, duration)
1.     
1. 4.  `destroy()` → elimina una partida si ets propietari o admin
1.     
1. 5.  `ranking()` → consulta amb `groupBy`, `MIN`, `MAX` i `with('user')` per mostrar TOP 5 jugadors
1.     
1. 6.  `getGamesByUserId($id)` → mostra totes les partides d’un usuari concret (només per admins)
1.     

* * *

## 🔁 Rutes protegides

**Usuari autenticat (token JWT):**

* *   GET `/games`
*     
* *   POST `/games`
*     
* *   PUT `/games/{id}/finish`
*     
* *   GET `/ranking`
*     
* *   POST `/logout`
*     
* *   GET `/me`
*     

**Admin:**

* *   GET `/users`
*     
* *   GET `/users/{id}`
*     
* *   PUT `/users/{id}`
*     
* *   DELETE `/users/{id}`
*     
* *   GET `/users/{id}/games`
*     

* * *

## 🧪 Seeders i proves

Inclou seeders per a:

* *   Usuaris (`UserSeeder`) amb 1 admin i 3 usuaris normals
*     
* *   Partides (`GameSeeder`) amb exemples per provar el rànquing
*     
* *   Personatges (`PersonajeSeeder`) amb URL d’imatges i timestamps
*     

Es pot executar amb:

1. 1.  `php artisan migrate:fresh --seed`
1.     

* * *

## 🧪 Proves amb Postman

Inclosa una col·lecció `.json` amb:

* *   Registre i login
*     
* *   Crear i finalitzar partida
*     
* *   Consultar rànquing
*     
* *   Operacions d’administrador
*     

* * *

## 📌 Notes finals

* *   Es recomana usar `Hash::make()` per generar contrasenyes
*     
* *   La durada de partida s’envia des del frontend com `duration` (segons)
*     
* *   La validació `email` a `updateUser` fa servir `sometimes` i controla duplicats amb `unique:users,email,{id}`
*     . You can paste directly from Word or other rich text sources.

  

  

* * *

## 🌐 Documentació d'Endpoints per a Frontend

Aquesta secció està pensada per a **desenvolupadors frontend** que necessitin comunicar-se amb l'API. S'especifiquen tots els endpoints disponibles, els models i exemples de cos (body) que cal enviar.

### 🔐 Autenticació

**POST /api/register**

* *   Crea un nou usuari.
*     
* *   Body JSON:  
*     "name": "Anna",  
*     "email": "[anna@example.com](mailto:anna@example.com)",  
*     "password": "12345678",  
*     "password\_confirmation": "12345678",  
*     "role": "user"
*     

**POST /api/login**

* *   Inicia sessió i retorna un `token`.
*     
* *   Body JSON:  
*     "email": "[anna@example.com](mailto:anna@example.com)",  
*     "password": "12345678"
*     

**GET /api/me**

* *   Retorna l'usuari autenticat (Bearer Token requerit).
*     

**POST /api/logout**

* *   Invalida el token actual.
*     

* * *

### 🎮 Partides (`games`)

**Model Game:**

* *   `id`: integer
*     
* *   `user_id`: integer
*     
* *   `clicks`: integer
*     
* *   `points`: integer
*     
* *   `duration`: integer (en segons)
*     

**GET /api/games**

* *   Llista les partides de l’usuari actual.
*     

**POST /api/games**

* *   Crea una partida buida.
*     
* *   No cal body (l'usuari actual es vincula automàticament).
*     

**PUT /api/games/{id}/finish**

* *   Finalitza una partida i registra els resultats.
*     
* *   Body JSON:  
*     "clicks": 24,  
*     "points": 10,  
*     "duration": 52
*     

**GET /api/ranking**

* *   Retorna el rànquing dels millors 5 jugadors segons durada i clics.
*     

* * *

### 👤 Gestió d’usuaris (Admin)

**Model User:**

* *   `id`: integer
*     
* *   `name`: string
*     
* *   `email`: string
*     
* *   `password`: string (enviat només en crear o actualitzar)
*     
* *   `role`: string ('admin' o 'user')
*     

**GET /api/users**

* *   Llista tots els usuaris (admin).
*     

**GET /api/users/{id}**

* *   Retorna un usuari concret (admin).
*     

**PUT /api/users/{id}**

* *   Actualitza les dades d’un usuari (admin).
*     
* *   Body JSON opcional (només enviar el que vulguis canviar):  
*     "name": "Anna Nova",  
*     "email": "[anna.nova@example.com](mailto:anna.nova@example.com)",  
*     "role": "admin",  
*     "password": "nova12345",  
*     "password\_confirmation": "nova12345"
*     

**DELETE /api/users/{id}**

* *   Elimina un usuari per ID (admin).
*     

**GET /api/users/{id}/games**

* *   Retorna totes les partides d’un usuari concret (admin).
*     

* * *

**🛡️ Autenticació**: Tots els endpoints protegits requereixen token JWT enviat a l'encapçalament:

* *   Header: `Authorization: Bearer {token}`
*     

Aquestes especificacions són imprescindibles perquè el frontend pugui fer `fetch()` amb efectivitat
Lets' go!!! 👍
