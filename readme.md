<h1 align="center">Instalación | Blog con Laravel 5.5</h1>

# Pasos

- **[Clonar el proyecto usando]**

  -git clone {urlDelRepositorio} "nombreProyecto"

- **[Instalar las dependencias de php]**

  - composer install

- **[Copiar el archivo .env-example, cambiarle el nombre a .env]**

  - Editarlo con los datos para la conexión a la base de datos

- **[Crear la Base de datos]**


- **[Generar las migraciones]**

  - php artisan migrate
  - php artisan migrate:refresh
  - php artisan migrate:refresh --seed  | Recrear migraciones con seeds(datos predefinidos)

- **[Generar la llave del proyecto]**

  - php artisan key:generate**
