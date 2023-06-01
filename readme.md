

https://user-images.githubusercontent.com/61996882/212542698-01454698-4ef8-4036-b492-8100f2b73341.mov


## **Project Phase 6**

## Prerequisites

-   VS Code
-   XAMPP
-   Register in the **petfinder** API
-   Generate the API key and secret
-   Get your stmp details for mail server (For testing you can use mailtrap)
-   Add the following variables to the env file

```sh
API_BASE_URL = "https://api.petfinder.com/v2/"
API_TOKEN_URL = "https://api.petfinder.com/v2/oauth2/token"
CLIENT_ID = Your API key
CLIENT_SECRET = Your secret
```

## To run forgot password

First choose an email, it can be en email created just for testing, and follow the following steps:

-   Login to your gmail
-   Go to Security setting and Enable 2 factor authentication
-   After enabling this you can see app passwords option. Click here!
-   And then, from Your app passwords tab select Other option and put your app name and click GENERATE button to get new app password.
-   Finally copy the 16 digit of password and click done. Now use this password instead of email password to send mail via your app.
-   Now you can use just email and this generated pass to send email.

Replace these values in your envitonment file, but with your own username and password:

```sh
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=youremail@gmail.com
MAIL_PASSWORD="yourpassword"
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS=youremail@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
```

## Instructions to Run the Application

clone the git repo  
Create a .env file and copy the contents of .env.example to it and enter your credentials for MySQL database

composer install  
npm install  
php artisan migrate  
php artisan db:seed  
php artisan db:seed --class=UserSeeder
npm run dev

Open a new terminal  
php artisan serve

## Login details for testing
#### User Login:  
Username: sourav@gmail.com  
Password: Sourav@1998  

#### Admin Login:  
Username: david@gmail.com  
Password: David@1234  

## Features

-   [x] Register and Login Page
-   [x] User(Profile, Add a new pet, Settings)
-   [x] Admin(Dashboard, Users, Pets) + User Features
-   [x] Find Pets based on different filters
-   [x] FAQ
-   [x] About Us
-   [x] Contact Us

## Contributors
Juan Gutierrez [<img src="https://i.stack.imgur.com/gVE0j.png" alt="Linkedin">](https://www.linkedin.com/in/-juan-gutierrez/) 
 -  [x] Register and Login Page
 -  [x] Forgot Password 
 -  [x] Find Pets
 -  [x] About Us

Jordan Chan [<img src="https://i.stack.imgur.com/gVE0j.png" alt="Linkedin">](https://www.linkedin.com/in/jordan-chan49/)  
 -  [x] Add a new Pet 
 -  [x] FAQ
 -  [x] Favourites

Rutvik Joshi [<img src="https://i.stack.imgur.com/gVE0j.png" alt="Linkedin">](https://www.linkedin.com/)  
 -  [x] Pet Profile 
 -  [x] Contact Pet Owner
 -  [x] Contact customer service

Sourav Choudhary [<img src="https://i.stack.imgur.com/gVE0j.png" alt="Linkedin">](https://www.linkedin.com/in/sourav009/)
 -  [x] Home Page
 -  [x] User Profile + View current pets
 -  [x] Settings(Change Password, Delete Account)
 -  [x] Admin Dashboard (Admin access only)
 -  [x] Users Page (Admin access only)
 -  [x] Pets Page (Admin access only)

 ## Resources

-   Datbase: MySQL
-   Server: XAMPP
-   IDE: VS Code
-   Bootstrap, Laravel Breeze, DataTables, Swiperjs, Chartjs, MailTrap, Unsplash, Git and GitHub
