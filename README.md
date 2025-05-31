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
・php artisan db:seed --class=SeasonsTableSeeder  
・php artisan db:seed --class=ProductsTableSeeder  
・php artisan db:seed --class=ProductSeasonTableSeeder  
    (Seasons、Products、ProductSeasonの順でシーダー)  



##  使用技術  

##  ER図  
![スクリーンショット (525)](https://github.com/user-attachments/assets/bb8623f7-5fed-43ba-b571-8b9f2102444b)

##  URL  
もぎたてフォーム：http://localhost/products  
php MyAdmin：http://localhost:8080/  
