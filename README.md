##PHP cli command based on Symfony Console Component

###Requirements

Both composer and box should be installed

####Composer

```
curl -sS https://getcomposer.org/installer | php
```

####Box
```
curl -LSs http://box-project.org/installer.php | php
```

###php.ini Settings
```
phar.readonly = Off
```

###sha1 File signature
```
openssl sha1 build.phar
```

