# Load Balancer (Apache)

Para implementar este load balancer, se utilizan varios módulos de Apache, como el módulo proxy, el módulo proxy_balancer, el módulo proxy_http, el módulo ssl, el módulo slotmem_shm, el módulo proxy_connect, el módulo lbmethod_byrequests, el módulo session y el módulo session_cookie. Estos módulos permiten al servidor Apache actuar como un proxy y balanceador de carga.

En el archivo apache.conf, se configura el servidor Apache para que escuche en el puerto 443 y se le asigna el nombre de dominio reto3.telematica.tech. Además, se configura un VirtualHost para manejar las solicitudes HTTPS, que utiliza los certificados y claves SSL almacenados en la carpeta /usr/local/apache2/conf/ssl. En el VirtualHost para manejar las solicitudes HTTP, se configura una regla de reescritura para redirigir todas las solicitudes a HTTPS.

En la sección <Proxy "balancer://mycluster"> se definen los servidores que actuarán como miembros del clúster, en este caso, los servidores drupal1.telematica.tech y drupal2.telematica.tech. La directiva ProxySet stickysession=JSESSIONID|jsessionid se utiliza para que el balanceador de carga mantenga la sesión del usuario en el mismo servidor durante toda la sesión.

Las directivas ProxyPass y ProxyPassReverse se utilizan para indicar al servidor Apache cómo dirigir las solicitudes entrantes a los servidores miembros del clúster.

La sección SSLProxyEngine on habilita la función de proxy SSL, mientras que las directivas SSLProxyVerify none y SSLProxyCheckPeerName off se utilizan para deshabilitar la verificación del certificado SSL del servidor de origen.

El archivo docker-compose.yml define el servicio de Apache como un contenedor Docker. Se utiliza el archivo Dockerfile para crear la imagen del contenedor, que se basa en la imagen de Apache 2.4. En el archivo docker-compose.yml, se definen los puertos que el contenedor utilizará para recibir las solicitudes entrantes. Además, se definen dos volúmenes, uno para el contenido del sitio web y otro para los certificados SSL.

En conclusión, el load balancer hecho en Apache y dockerizado utiliza varios módulos de Apache para actuar como un proxy y balanceador de carga. Utiliza certificados SSL generados con Certbot y se ha configurado para escuchar en los puertos 80 y 443. La carpeta ssl contiene los certificados y claves SSL necesarios para el correcto funcionamiento del load balancer.
