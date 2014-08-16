## Magento docker image 

This docker image expects 2 other linked containers to work .

1. Mariadb or Mysqldb

2. Memcached.

To start them 

```
$ docker run -td --name mariadb -e USER=user -e PASS=password  paintedfox/mariadb
```

```
$ docker run --name memcached -d -p 11211 sylvainlasnier/memcached

``

Then finally run our container`

```
docker run -p 80:80 -link mariadb:db --link memcached:cache -ti magento /start.sh
```

This is under construction 


