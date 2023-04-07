docker stop $(docker ps -aq) && docker rm $(docker ps -aq)
docker image prune -a
docker volume prune
