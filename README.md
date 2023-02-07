# PHP-DRPC
php drpc client written on top of thrift library to connect to drpc topologies running on storm.

## How To Use

The preferred method of installation is via [Composer](https://getcomposer.org/).
Run the following command to install the package and add it as a requirement to your project's composer.json:

```bash
composer require mithunsatheesh/php-drpc
```

Create an instance of the drpc client to use:

```php
// Require the Composer autoloader.
require 'vendor/autoload.php';

// Instantiate the DRPC client.
$drpc = new DRPC("xxx.xxx.x.xx",3772,NULL);
$result = $drpc->execute("CallFunctionName",$params);
```

## Still not working?
If you still got trouble [mail me the issue](mail:mithunsatish@gmail.com)
