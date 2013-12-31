# PHP-DRPC
php drpc client written on top of thrift library to connect to drpc topologies running on storm.

## How To Use

just require the `DRPC.php` file in your project and create an instance of the drpc client like.

```php

include "includes/drpc/DRPC.php";
$drpc = new DRPC("xxx.xxx.x.xx",3772,NULL);
$result = $drpc->execute("CallFunctionName",$params);

```

## Still not working?
If you still got trouble [mail me the issue](mail:mithunsatish@gmail.com)
