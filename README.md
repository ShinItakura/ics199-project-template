# ICS 199 Applied Computing Project - Project Template
[![build status](https://gitlab.camosun.bc.ca/ics199/ics199-project-template/badges/master/build.svg)](https://gitlab.camosun.bc.ca/ics199/ics199-project-template/commits/master)

## Purpose:
This Git Repository is a starting template for your project. The *Collaborating with Git and GitLab slides* explain how to use this to start your own team's project.

### Folders in this Project:

* `/db`  - where all the database files go. In here should go your `a-schema.sql` script, `b-populate.sql` script, and the model you designed in MySQL Workbench.

* `/docs` - put your Gantt Chart and Proj. Spec here.

* `/src` - where all the source files go for the web application. This contains several sub-folders:
    * `css` - any css files you use
    * `model` - db interface scripts; the model of MVC
    * `vendor` - this folder contains PHP Add-ons installed by Composer. **Don't change or remove this folder.**
    * `view` - the view of MVC
    * php scripts not in a sub-folder are controller scripts of MVC

* `/web` - contains the Dockerfile for building the local development Web Server. **Don't change this file.**

### Files in this Project:

* `.env` - this contains two variables, MYSQL\_RP and MYSQL\_DB. This sets the root password and database for the local testing environment. **Change the database to the one you designed in MySQL Workbench. Make the password anything you like.**
    * You also need to change `db_credentials.php` to match the password and database you use here.
<br />
* `.gitlab-ci.yml` - the GitLab Continuous Integration/Delivery file. It is done in a language called YAML. It is ran on every `git push` of your project. **Don't change this file.**
<br />
* `composer.json` and `composer.lock` - Composer is PHP's Dependency Manager and a way to install PHP Add-ons. These files are used for installing PHPMailer and Stripe. **Don't change or remove these files.**
<br />
* `docker-compose.yml` - instructions for docker-compose to bring up a local testing environment. **Don't change anything in this file.**
<br />
* `Procfile` - this instructs dokku to use apache2 and that source files are under the `src` subfolder. **Don't change or remove this file.**
<br />
* `README.md` - what you're reading right now!
<br />

## Directions:

### 1. Local Development and Testing:

To create a local testing environment for your web application, do the following:

* If you are using *Docker for Windows*, **you need to share the drive that has your Project Folder**. In the System Tray, right-click on the Docker icon, select Settings then Shared Drives. Place a check mark next to the drive letter that contains your Project Folder. Hit Apply at the bottom. When it asks you for Credentials, enter in your Windows login credentials.  
<br />
* If you are using *Docker Toolbox*, **you need to either be working somewhere under C:\Users OR share your project's folder using Virtual Box's shared folders.** You can find documentation on how to do that here: https://www.virtualbox.org/manual/ch04.html#sharedfolders  
<br />
* In the Git Bash Shell, in your Project Directory, type:

    * `docker-compose up -d`
    
    This will build a web server image and create two containers -
         one for the web server and another for the database server. It will also link your project's `/src` folder with `/var/www/html` in the web container. That means you can see changes in real-time as you update code (and you can use **LiveReload** with it).  
<br />
* Your application will be at http://localhost:8080 or http://192.168.99.100:8080 if using Docker Toolbox.  
<br />
* If it isn't working, verify that the containers are running:

    * `docker-compose ps`  
<br />
* If you want to look at logs (might help with debugging):

    * `docker-compose logs`   
<br />
* If you want an interactive shell with the web server:

    * `winpty docker exec -it php-apache bash`  
<br />
* If you want an interactive shell with the database server and a MySQL prompt:

    * `winpty docker exec -it mysql bash`
    * `mysql -u root -p`  
<br />
* If you're done testing:

    * Stop Containers: `docker-compose stop`
    * Remove Them: `docker-compose rm -f`


### 2. Deployment:

* Any merge or push onto the master branch will cause your project to be deployed to the 'production' server.
<br />
* Ensure you have the SSH\_PRIVATE\_KEY Secret Variable set in Settings -> CI/CD Pipelines. If not, create an issue and assign to me.
<br />
* Ensure you have DBNAME Secret Variable set to the name of your database.
<br />
* Your web app will be deployed to: `<your GitLab project name>.ics199.site`
