nginx config:
```
server {
    listen 80; 
    server_name angularplayground.local;

    location / { 
        root /var/www/angularplayground/public;
        index index.php;

        try_files $uri /index.php;

        location ~ \.php$ {
            fastcgi_pass   unix:/var/run/php5-fpm.sock;
            fastcgi_param  SCRIPT_FILENAME  /var/www/angularplayground/public$fastcgi_script_name;
            fastcgi_buffer_size 16k;
            fastcgi_buffers 16 16k;
            include fastcgi_params;
        }
    }   
}
```