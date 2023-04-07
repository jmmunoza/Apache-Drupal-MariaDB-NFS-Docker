# Load Balancer (Apache)

Para implementar este load balancer, se utilizan varios módulos de Apache, como el módulo proxy, el módulo proxy_balancer, el módulo proxy_http, el módulo ssl, el módulo slotmem_shm, el módulo proxy_connect, el módulo lbmethod_byrequests, el módulo session y el módulo session_cookie. Estos módulos permiten al servidor Apache actuar como un proxy y balanceador de carga.

En el archivo apache.conf, se configura el servidor Apache para que escuche en el puerto 443 y se le asigna el nombre de dominio reto3.telematica.tech. Además, se configura un VirtualHost para manejar las solicitudes HTTPS, que utiliza los certificados y claves SSL almacenados en la carpeta /usr/local/apache2/conf/ssl. En el VirtualHost para manejar las solicitudes HTTP, se configura una regla de reescritura para redirigir todas las solicitudes a HTTPS.

En la sección <Proxy "balancer://mycluster"> se definen los servidores que actuarán como miembros del clúster, en este caso, los servidores drupal1.telematica.tech y drupal2.telematica.tech. La directiva ProxySet stickysession=JSESSIONID|jsessionid se utiliza para que el balanceador de carga mantenga la sesión del usuario en el mismo servidor durante toda la sesión.

El archivo docker-compose.yml define el servicio de Apache como un contenedor Docker. Se utiliza el archivo Dockerfile para crear la imagen del contenedor, que se basa en la imagen de Apache 2.4. En el archivo docker-compose.yml, se definen los puertos que el contenedor utilizará para recibir las solicitudes entrantes. Además, se definen un volumen para los certificados SSL.

Para correr el contenedor usa:

```
docker-compose build
docker-compose up
```
