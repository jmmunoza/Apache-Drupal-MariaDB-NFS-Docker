# MariaDB

El módulo de MariaDB es un servicio Dockerizado que será la parte encargada de guardar los datos de Drupal. En este caso, se utiliza la imagen oficial de MariaDB y se configura el servicio mediante el archivo docker-compose.yml.

En el archivo docker-compose.yml se define el servicio reto3-mariadb, que se basa en la imagen de MariaDB y se especifican las opciones de configuración necesarias para el funcionamiento del servicio. Se establece la contraseña de root, la base de datos, el usuario y la contraseña para la base de datos.

Además, se especifica un volumen para el almacenamiento de los datos de la base de datos en el host local, y se mapea el puerto 3306 del contenedor de MariaDB al puerto 3306 del host local para permitir el acceso a la base de datos desde el host.

Para ejecutar el servicio, se debe correr el comando 
```
docker-compose up
``` 
Esto iniciará el servicio de MariaDB y permitirá que Drupal pueda conectarse a la base de datos para almacenar y recuperar datos.
