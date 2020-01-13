# Introducción
Este proyecto tiene como foco el crud de 4 entidades "**Empresass**, **Usuarios**, **Roles**, **Modulos**" y un login que permite aceder a modulos según los modulos asignados a un rol y estos roles asignados a un usuario.

# Base de datos
Este es un diagrama de la base de datos
<p align="center">
![Alt text](./public/img/db_model.svg)
<img src="./public/img/db_model.svg" width="400">
</p>

# Inicialización

Para poder inicializar el sigiente repositorio devera

- Clonar.
- Ejecutar **composer install**.
- Ejecutar **cp .env.example .env** para poder generar el archivo de configuracion de ambiente.
- Configurar la base de datos en .env y crear la base de datos en su servivio de base de datos.
- Ejecutar **php artisan key:generate** para generar una nueva llave del proyecto.
- Ejecutar **php artisan serve** para verifivcar la instalación.
- Ejecutar **php artisan migrate** para migrar la base de datos.
- Ejecutar **php artisan migrate --seed** para insertar los datos de prueba

Laravel is accessible, powerful, and provides tools required for large, robust applications.