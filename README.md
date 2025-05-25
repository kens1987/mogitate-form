##  もぎたてフォーム  
###  Docker  
・git clone(git@github.com:kens1987/mogitate-form.git)  
・docker-compose up -d --build  
###  laravel環境構築  
・docker-compose exec php bash  
・composer install  
・.envファイルは.env.exampleをコピーし以下を修正  
DB_HOST=127.0.0.1 → mysql
DB_DATABASE=laravel → laravel_db  
DB_USERNAME=root → laravel_user  
DB_PASSWORD= → laravel_pass  
・php artisan key:generate  
・php artisan migrate  
・  


##  使用技術  

##  ER図  

##  URL  
もぎたてフォーム：http://localhost/  
php MyAdmin：http://localhost:8080/  
