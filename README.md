# Projet GDSOURCES : Gestion Des SOURCES

## Installation

### Environnement MySQl sous Docker

docker run --name mysql-gdsources -e MYSQL_ROOT_PASSWORD=gdsources -d mysql:5.7

docker run --name myadmin -d --link mysql-gdsources:db -p 8080:80 phpmyadmin