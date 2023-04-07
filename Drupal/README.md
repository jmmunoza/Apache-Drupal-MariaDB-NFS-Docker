# Drupal

 La instancia de Drupal mencionada en el contexto se encuentra dentro de un contenedor de Docker, lo que significa que se ejecuta en un entorno aislado y portátil que se puede ejecutar en cualquier máquina que tenga Docker instalado.

El archivo "docker-compose.yml" se encarga de definir el servicio de Drupal, y especifica que el contenedor de Drupal escuchará en el puerto 80 del host. También se definen volúmenes que se utilizarán para persistir datos en el contenedor de Drupal. Estos volúmenes están configurados para que utilicen un servidor NFS remoto a través de la dirección IP definida en el archivo ".env".

El archivo ".env" contiene la dirección del servidor NFS remoto, que se utilizará para montar los volúmenes en el contenedor de Docker de Drupal.

Además, es importante mencionar que el Drupal se conecta a una base de datos remota MariaDB, lo que significa que los datos de Drupal se almacenan en la base de datos MariaDB remota en lugar de dentro del contenedor de Docker. Esto permite que los datos se compartan entre múltiples instancias de Drupal.

Para la ejecución del contendor solamente es necesario usar:

```
docker-compose up
```
