# El Gran Pegaso

Sitio web de empresa Venezolana el cual fue realizado bajo el stack LAMP, el cual consta de su sitio web y un sistema de información que permite la gestión de sus productos.

## Requisitos
Se debe de contar de algún servidor que permita procesar los archivos php como podría ser XAMPP.

## Instalación
1. Suponiendo que se use XAMPP: ir a `localhost/phpmyadmin/`
2. Crear una tabla con el nombre de **elgranpe_sys**.
3. Crear un usuario para dicha base de datos con el nombre **root** (sin contraseña).
4. Importar la base de datos **elgranpe_sys** que se encuentra en este repositorio a la creada a través de *phpmyadmin*.
5. Una vez importada la base de datos correctamente será posible visualizar el sitio web ubicado en la carpeta "V_1.5.1" a través de XAMPP.
>Nota: Como se quitaron las extensiones de los archivos con un el htaccess en algunos casos la navegación puede fallar si no se le agrega la extension .php de los archivos.

>Nota 2: Como la distribución de los archivos que se utilzó en el servidor es diferente puede que algunos estilos no se puedan encontrar aplicar correctamente