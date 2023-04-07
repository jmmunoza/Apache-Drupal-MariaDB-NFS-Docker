# NFS

El módulo NFS Server es utilizado para guardar el estado de las instancias de Drupal. En este caso, no fue necesario dockerizarlo ya que se trata de una instalación de NFS convencional. Para correr el servidor, solo es necesario ejecutar el siguiente archivo bash llamado "nfssetup.sh":

```sh
sudo apt-get update
sudo apt-get install nfs-kernel-server
sudo mkdir -p /var/nfs
echo "/var/nfs *(rw,sync,no_subtree_check)" | sudo tee -a /etc/exports
sudo systemctl restart nfs-kernel-server
```

Este script instalará y configurará el servicio de NFS en el servidor. Después de que el servidor esté configurado, será necesario conectar una instancia de Drupal e instalarla utilizando el NFS.

Una vez que la instancia de Drupal esté creada, será necesario editar el archivo "settings.php" y añadir estos valores:

```php

<?php

$databases['default']['default'] = array(
    'database' => 'mariadb',
    'username' => 'mariadb',
    'password' => 'mariadb',
    'prefix' => '',
    'host' => 'database.telematica.tech',
    'port' => '3306',
    'namespace' => 'Drupal\\mysql\\Driver\\Database\\mysql',
    'driver' => 'mysql',
    'autoload' => 'core/modules/mysql/src/Driver/Database/mysql/',
);
$settings['config_sync_directory'] = 'sites/default/files/config_tBpgt5EjVTx7Hub0-y27i6kaC1TPkU2iry5--XEPpxTtsO0g04RLINjMzBB7DlamKiaUJ179PQ/sync';


$settings['reverse_proxy'] = TRUE;
$settings['reverse_proxy_addresses'] = array($_SERVER['REMOTE_ADDR']);
$settings['trusted_host_patterns'] = [
    '^telematica\.tech$',
    '^.+\.telematica\.tech$'
];

```

Estos valores configurarán la conexión a la base de datos remota MariaDB y la ubicación del directorio de configuración de Drupal. También se configura el servidor proxy inverso y las direcciones de proxy confiables.

Con esto, el módulo NFS Server queda configurado para guardar el estado de las instancias de Drupal.
