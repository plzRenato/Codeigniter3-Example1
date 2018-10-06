# Newspaper Articles
"Newspaper articles": Codeigniter 3.1.9 / PHP / HTML / MySQLi 


-------------------------------------------------------------
 User Guide:
    
  1. Download to your localhost (usually: /var/www/html )
  2. open the application/config/database.php file with a text editor and set your “news_db” database parameters:
		
                'username' => 'userxx', 
                'password' => 'passwxx',
  3. Download from https://www.codeigniter.com/download "CodeIgniter 3.x" into your PC, unzip it, copy the only "system" directory to your localhost (usually: /var/www/html ) 
  4. Open in your browser:
		
        http://localhost/index.php/news/create 

     , to create a newspaper article
  5. Open in your browser: 
  
        http://localhost/index.php/news 

     , to see all the newspaper articles

  NOTE: the “news_db” database has to be previously created :

            Table:  news
            
            id int(11)  -AUTO_INCREMENT- -PRIMARY KEY-
            title varchar(128) utf8_general_ci 
            text text utf8_general_ci
