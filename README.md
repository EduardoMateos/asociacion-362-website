<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Sobre la web

Autor: Eduardo Mateos Soto
Linkedin: https://www.linkedin.com/in/eduardo-mateos-soto/
Web creada para una asociación juvenil de Madrid. 

El backoffice esta en "/admin", desde ahi puedes:
- Crear usuarios administradores o editarlos.
- Añadir o editar paginas publicas a la web.
- Añadir o editar bloques dinamicos como el footer o el menu principal.
- Añadir o editar ubicaciones al mapa de campamentos.
- Añadir o editar la documentación adjunta y descargable.

Eres libre de usar el código de este repositorio si te es útil.

## Tecnologias

- Laravel 8.0
- Bootstrap 4.5
- PHP 7.4

Requisitos de laravel: https://laravel.com/docs/8.x/installation
En "App\Utils" hay algunas clases con funcionalidad "global" dentro de la web, el resto en general esta dentro de los controllers.

## Instalación

Genera los archivos del front con npm:
```sh
npm install && npm run prod
```

Configura la base de datos en el archivo .env

Lanza las migraciones de Laravel:
```sh
php artisan migrate
```

Lanza el servidor local con:
```sh
php artisan serve
```

