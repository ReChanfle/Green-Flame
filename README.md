<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>







   # Instrucciones para Inicializar el Proyecto Localmente

## Requisitos Previos

- Gestor de Paquetes: Composer
- Entorno de Desarrollo Local: WAMP, Laragon u otro similar
- PHP: Versión 8.2.6 o superior
- Laravel: Versión 8.83.27

## Pasos para Inicializar el Proyecto

### Paso 1: Clonar el Repositorio

Clona el repositorio desde Git usando el siguiente comando en tu terminal:

```
git clone https://github.com/ReChanfle/Green-Flame.git

```

### Paso 2: Instalar Dependencias

En la carpeta raíz del proyecto, ejecuta el siguiente comando para instalar las dependencias de Composer:





```
composer install
```






### Paso 3: Configurar el Archivo .env

Crea un archivo .env en la raíz del proyecto y configúralo con la información de tu base de datos. Aquí tienes un ejemplo:

```

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=green_flame
DB_USERNAME=root
DB_PASSWORD=
```
### Paso 4: Crear la Base de Datos
Usando tu entorno local (como Laragon), crea una base de datos con el nombre especificado en el archivo .env (DB_DATABASE=green_flame) y asegúrate de utilizar el mismo puerto.

### Paso 5: Ejecutar Migraciones
Ejecuta las migraciones de Laravel para crear las tablas de la base de datos con el siguiente comando:

```
php artisan migrate
```
También puedes verificar el estado de las migraciones con:

```
php artisan migrate:status
```
### Paso 6: Popular las Tablas
Para poblar las tablas con datos iniciales, utiliza el archivo database_data.SQL. En Laragon, puedes hacerlo de la siguiente manera:

Abre Laragon.
Navega a "Database" y crea una sesión (puerto 3306) usando el mismo nombre de base de datos (green_flame) que especificaste en el archivo .env.
Abre la sesión recién creada y ejecuta el archivo database_data.SQL usando el botón "play". Esto llenará las tablas con datos de prueba.
Nota Importante: Si este paso no se realiza correctamente, los seeders no funcionarán correctamente.

### Paso 7: Ejecutar Seeders
Popula la tabla con usuarios por defecto y otros registros de prueba utilizando el siguiente comando:

```
php artisan db:seed
```
### Paso 8: Levantar el Servidor Local
Finalmente, inicia el servidor local con el siguiente comando:

```
php artisan serve
```
¡Listo! Ahora puedes acceder a tu proyecto localmente en http://localhost:8000/.

Datos de logueo:

```
user: admin@example.com
password: password
```

### PD:
El proyecto carece de ordenamiento, si posee filtros, pero no ordenamiento como se exije, todas las demas funcionalidades estan aplicadas(incluso la de exportacion de csv :)). Lo entrego antes de tiempo ya que mañana Sabado, tengo que hacer un trabajo no oficial. Muchas Gracias!, estoy a disposicion.

### Saludos cordiales!!.



   
