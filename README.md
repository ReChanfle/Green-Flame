<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>



Instrucciones para inicializar el proyecto localmente:
- Gestor de paquetes-> Composer.
- Entorno de desarrollo local (WAMP) Laragon o parecido.
- PHP v8.2.6.
- Version de Laravel utilizada v8.83.27.

1er: clonar el repositorio (git clone)
2do: con la terminal de VS u otra, ejecutar el comando ('composer i') en la carpera raiz del proyecto para instalar las dependencias.
3er: crear archivo .env con los siguientes valores:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=green_flame
DB_USERNAME=root
DB_PASSWORD=

4to: En Laragon crear la db con el nombre indicado en el archivo .env-> DB_DATABASE=green_flame y tambien utilizar el mismo puerto.
5to: 
6to : Ejecutar las migraciones para crear las tablas desde Laravel, con el siguiente comando-> 'php artisan migrate', pero se podria tirar un status por las dudas -> php artisan migrate:status, para chequear el estado de las migraciones.
7mo: se populan las tablas con el SQL provisto en el zip ->database_data.SQL, igualmente se puede encontar en la rama master en este mismo repo. Para popular las tablas, desde Laragon->database->Session manager->Crear sesion(port 3306, se elige la tabla anteriormente creada)-> open->sobre la carpeta, se busca el archivo atabase_data.SQL y con el boton play se corre el query. IMPORTANTE!! si este paso no es bien ejecutado no se van apoder ejecutar los seeder
8vo: Ahora ya se puede proceder a correr los seeder con el comando->php artisan db:seed para popular la tabla con el usuario por defecto y algunos registros para testear el ABM.
9no: Ultimo comando para levnatar el proyecto localmente php artisan serve. GUALAA!!.

URL por defecto: http://localhost:8000/


