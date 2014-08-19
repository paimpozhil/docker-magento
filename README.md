## Magento docker image 

### Requirements
This docker image expects 2 other linked containers to work .

1. Mysqldb or Mariadb linked as 'db'

2. Memcached linked as 'cache'

### Starting this container

```
$ docker run -td --name mariadb -e USER=user -e PASS=password  paintedfox/mariadb
```

```
$ docker run --name memcached -d -p 11211 sylvainlasnier/memcached
```

Then finally run our docker-magento container

```
docker run -p 80:80 -link mariadb:db --link memcached:cache -td paimpozhil/magento-docker
```

Now visit your public IP in your browser and you will see the installer ready to go.. enter the database password when installer prompts ('password') is the default. 


### Advanced information 

This Image will utilize the environment variables from the linked containers and automatically configure its magento itself.

However during install you may have to enter the database password once which is the only manual work.

Cache will be preconfigured.


### SSH 

Now as you think you may need to get into our Docker-magento container to be easily look into things, I did not package an SSH server just for this purpose.

You can use NSENTER to get into our container
#### https://github.com/jpetazzo/nsenter 


### Builing the Image yourself.

```

git clone https://github.com/paimpozhil/docker-magento.git .
docker build -t docker-magento .
docker run -p 80:80 -link mariadb:db --link memcached:cache -td docker-magento 
```

### Need support?

#### http://dockerteam.com


Credits:

Please look at these repositories  for adding more parameters/configuring them 

#### https://github.com/SylvainLasnier/memcached/blob/master/README.md

#### https://github.com/Painted-Fox/docker-mariadb


