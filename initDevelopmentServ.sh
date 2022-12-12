# Modifies the maximum number of Node monitored files
echo "Alterado fs.inotify.max_user_watches para:"
sysctl -n -w fs.inotify.max_user_watches=524288

docker-compose -f ./containers/developer/docker-compose.dev.yml up
