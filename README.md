<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>







    <h1>Instrucciones para Inicializar el Proyecto Localmente</h1>

    <h2>Requisitos Previos</h2>
    <ul>
        <li>Gestor de Paquetes: Composer</li>
        <li>Entorno de Desarrollo Local: WAMP, Laragon u otro similar</li>
        <li>PHP: Versión 8.2.6 o superior</li>
        <li>Laravel: Versión 8.83.27</li>
    </ul>

    <h2>Pasos para Inicializar el Proyecto</h2>

    <h3>Paso 1: Clonar el Repositorio</h3>
    <p>Clona el repositorio desde Git usando el siguiente comando en tu terminal:</p>
    <code>git clone &lt;URL_del_repositorio&gt;</code>

    <h3>Paso 2: Instalar Dependencias</h3>
    <p>En la carpeta raíz del proyecto, ejecuta el siguiente comando para instalar las dependencias de Composer:</p>
    <code>composer install</code>

    <h3>Paso 3: Configurar el Archivo .env</h3>
    <p>Crea un archivo <code>.env</code> en la raíz del proyecto y configúralo con la información de tu base de datos. Aquí tienes un ejemplo:</p>
    <pre>
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=green_flame
DB_USERNAME=root
DB_PASSWORD=
    </pre>

    <h3>Paso 4: Crear la Base de Datos</h3>
    <p>Usando tu entorno local (como Laragon), crea una base de datos con el nombre especificado en el archivo <code>.env</code> (<code>DB_DATABASE=green_flame</code>) y asegúrate de utilizar el mismo puerto.</p>

    <h3>Paso 5: Ejecutar Migraciones</h3>
    <p>Ejecuta las migraciones de Laravel para crear las tablas de la base de datos con el siguiente comando:</p>
    <code>php artisan migrate</code>
    <p>También puedes verificar el estado de las migraciones con:</p>
    <code>php artisan migrate:status</code>

    <h3>Paso 6: Popular las Tablas</h3>
    <p>Para poblar las tablas con datos iniciales, utiliza el archivo <code>database_data.SQL</code>. En Laragon, puedes hacerlo de la siguiente manera:</p>
    <ul>
        <li>Abre Laragon.</li>
        <li>Navega a "Database" y crea una sesión (puerto 3306) usando el mismo nombre de base de datos (<code>green_flame</code>) que especificaste en el archivo <code>.env</code>.</li>
        <li>Abre la sesión recién creada y ejecuta el archivo <code>database_data.SQL</code> usando el botón "play". Esto llenará las tablas con datos de prueba.</li>
    </ul>
    <p><strong>Nota Importante:</strong> Si este paso no se realiza correctamente, los seeders no funcionarán correctamente.</p>

    <h3>Paso 7: Ejecutar Seeders</h3>
    <p>Popula la tabla con usuarios por defecto y otros registros de prueba utilizando el siguiente comando:</p>
    <code>php artisan db:seed</code>

    <h3>Paso 8: Levantar el Servidor Local</h3>
    <p>Finalmente, inicia el servidor local con el siguiente comando:</p>
    <code>php artisan serve</code>

    <p>¡Listo! Ahora puedes acceder a tu proyecto localmente en <a href="http://localhost:8000/">http://localhost:8000/</a>.</p>



