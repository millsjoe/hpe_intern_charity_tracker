# HPE Charity Tracking Tool 
This is a project by the 2018 Bristol interns as a Hackathon activity. The tool is designed to store the information inside of the .csv files provided to you through HPE Gives and present this information to you in the form of progress charts. This process speeds up the monitoring process by allowing all interns to know the current charity progress by visitng the site.

## Getting Started

This project uses docker which is intended to be ran on a VM. These instructions will get you a copy of the project up and running on the VM. If making changes to the code do not edit directly on the VM, instead clone the project and make changes locally then pull the changes once uploaded.

___

## Install prerequisites

For now, this project has been mainly created for Unix `(Linux/MacOS)`.

All requisites should be available for your distribution. The most important are :

* [Git](https://git-scm.com/downloads)
* [Docker](https://docs.docker.com/engine/installation/)
* [Docker Compose](https://docs.docker.com/compose/install/)

Check if `docker-compose` is already installed by entering the following command : 

```sh
which docker-compose
```

Check Docker Compose compatibility :

* [Compose file version 3 reference](https://docs.docker.com/compose/compose-file/)

The following is optional but makes life more enjoyable :

```sh
which make
```

On Ubuntu and Debian these are available in the meta-package build-essential. On other distributions, you may need to install the GNU C++ compiler separately.

```sh
sudo apt install build-essential
```

### Images to use

* [Nginx](https://hub.docker.com/_/nginx/)
* [MySQL](https://hub.docker.com/_/mysql/)
* [PHP-FPM](https://hub.docker.com/r/nanoninja/php-fpm/)
* [Composer](https://hub.docker.com/_/composer/)
* [PHPMyAdmin](https://hub.docker.com/r/phpmyadmin/phpmyadmin/)
* [Generate Certificate](https://hub.docker.com/r/jacoelho/generate-certificate/)

You should be careful when installing third party web servers such as MySQL or Nginx.

This project use the following ports :

| Server     | Port |
|------------|------|
| MySQL      | 8989 |
| PHPMyAdmin | 8080 |
| Nginx      | 8000 |
| Nginx SSL  | 3000 |

___

## Clone the project

To install [Git](http://git-scm.com/book/en/v2/Getting-Started-Installing-Git), download it and install following the instructions :

```sh
git clone https://github.com/millsjoe/hpe_intern_charity_tracker.git
```

TODO:

ADD


## Authors

* **Nanoninja** - *Docker compose* - [Nanoninja](https://github.com/nanoninja)
* **Lewis Smith** - *PHP* - [Lewisscottsmith](https://github.com/lewisscottsmith)
* **Joe Mills** - *Database* - [Millsjoe](https://github.com/millsjoe)
* **Jordan Witcombe** - *Frontend Development* - [JordanRees1](https://github.com/JordanRees1)

## License

This project is to be used interally for HPE charity tracking only.

## Acknowledgments

* Hat tip to nanoninja whose code was used
* [Base Image](https://github.com/nanoninja/docker-nginx-php-mysql)

## Todo
- [ ] Work through Issues
    - [ ] Fix key issue (userID)
    - [ ] Find a way to backup the database
    - [ ] Add SSL
    - [ ] Add startup script
    - [ ] Change error logging to console
    
