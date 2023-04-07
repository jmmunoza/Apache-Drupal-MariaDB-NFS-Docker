# Apache-Drupal-MariaDB-NFS-Docker (Reto 3 - TET)

Este proyecto de alta disponibilidad es una implementación para la asignatura de Tópicos Especiales de Telemática. La arquitectura de este proyecto consta de cinco máquinas virtuales (VM) en AWS.

El usuario se conecta a la URL reto3.telematica.tech mediante https, utilizando el puerto 443. Esta URL lleva al balanceador de carga Apache, el cual recibe el tráfico web https de Internet con múltiples instancias de procesamiento.

Detrás del balanceador de carga, se encuentran dos instancias de procesamiento Drupal, las cuales están dockerizadas y distribuidas en varios nodos para mejorar la disponibilidad de la aplicación. El balanceador de carga utiliza round-robin para conectarse a las instancias de Drupal por http, mediante el puerto 80.

Además, hay una instancia de base de datos MariaDB y una instancia de archivos distribuidos en NFS. Todas las instancias de Drupal están conectadas al NFS compartido y a la base de datos MariaDB para compartir la información entre ellas.

En pocas palabras, esta es la arquitectura diseñada:

<p align="center">
<img src="https://user-images.githubusercontent.com/69641274/230683327-eddd9bc0-78c6-4485-af33-370072f7cd4d.png" />
</p>

