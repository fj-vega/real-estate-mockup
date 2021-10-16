# Real Estate mockup site

This repo contains a mockup of a real state website.

It's built with Laravel, Vue.js, Tailwind CSS and SASS.

It can be cloned and ran locally using Laravel Homestead.

## Required software

- PHP
- Composer
- Virtual Box (recommended)
- Vagrant

## Installation

After cloning the project, you may notice that there is no '.env' file as it has been gitignored. 

There is however a '.env.example' file, which serves as a blueprint for the project's config. 

This should be renamed to '.env':

```
mv .env.example .env
```

You must then install vendor files and run the relevant 'make' command for the system being used.

This will share and map the correct folders for Homestead to work. 

Remember to edit the Homestead.yaml file to reflect the correct file paths and your /etc/hosts configuration

```
composer install

php vendor/bin/homestead make
```

After that, you are ready to get the VM running.

```
vagrant up
```

A production build is already compiled in /public.

You are free to access the VM, install npm packages and experiment.

```
vagrant ssh

cd project-folder

npm install

```