# Sprint 4 Laravel Project

## Entorno
Proyecto desarrollado con el framework Laravel.

Para la visualización del proyecto, es necesario disponer de Node.js y ejecutar un servidor de desarrollo. En terminal:
``` shell
npm run dev
```

## Configuración del archivo .env
Para el funcionamiento del framework Livewire en localhost es necesario añadir al final del archivo .env la siguiente configuración:

``` shell
APP_URL="/{directorio del proyecto}"
```

En este mismo archivo, se deben configurar los parámetros para el envío de emails. Para ello, es necesario disponer de un servidor de pruebas como, por ejemeplo mailtrap.io. Los parámetros de configuración de este servidor deben añadirse en el archivo .env es:

``` shell
MAIL_MAILER= *********
MAIL_HOST= *********
MAIL_PORT= *********
MAIL_USERNAME= *********
MAIL_PASSWORD= *********
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="leaguemanager@leaguemanager.com"
MAIL_FROM_NAME="${League Manager}"
```

## Migraciones y seed de datos
Para realizar las migraciones del proyecto y generar datos ficticios, se debe ejecutar el comando:
``` shell
php artisan migrate --seed
```
