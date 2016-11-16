# Nginx Reverse Proxy for Docker
Tool for easy management of Nginx reverse proxy for Docker containers

## Getting started
Copy `config.php.dist` to `config.php` and define your mappings:

**Example**

```
    [
        'serverName' => 'site.loc www.site.loc',
        'proxyPass'  => 'http://127.0.0.1:8080'
    ],
    [
        'serverName' => 'app.loc www.app.loc',
        'proxyPass'  => 'http://127.0.0.1:8081'
    ],
```

Run `php app.php > sites/default.conf` to generate Nginx config.

Copy config to Nginx config folder


## Using Docker for hosting Nginx

If you want to use Nginx in Docker, simply install Docker and Docker-compose.

After you've successfuly generated Nginx conf file in `sites/`dir, run `docker-compose up -d` and it will start Nginx in background.

Nginx will handle connections to port 80 and route them to mapped container.

## Overriding Nginx conf template

If you want to use custom `.conf` template, simply create `template.override.conf`.

`app.php` will use it over `template.conf` if exists and will replace `%SERVER_NAMES%` and `%PROXY_PASS%` tokens
with values from `config.php`.

## Nginx logs

`/var/log/nginx` folder is mounted to `logs/` so you can find nginx access and error logs there.