# Complete Dockerized WordPress Dev Environment
##### Docker, GulpJS, \_s, Laravel Blade Templates, MaterializeCSS as an example

Dockerized WordPress development environment. Just needs Docker + your favorite editor, all requirements/packages are installed in Docker containers.

#### Motivation
This is from a custom project I worked on a few years ago. There were 2 primary objectives:
 - Create a fully dockerized local dev environment so that devs didn't have to worry about installing and setting up WordPress + permissions + mysql + virtual envs...etc.
 - Rapidly compile WordPress templates and static assets (including pre-compiled HTML and PHP)

#### Dependencies
Some of the dependencies are outdated (I updated a few), but if there's interest or I get bored (:p), can update them to latest stable. Also, since it has been a few years, I assume there are frameworks/environments similar to this. Would be fun to continue working on the project or pickup a similar one, especially now that WordPress has a [REST API](https://developer.wordpress.org/rest-api/)

## Prerequisites
[Install Docker Compose V2](https://docs.docker.com/compose/cli-command/)

## Install
###### Note: Tested with Arch Linux, but should work on any OS/distro with Docker. Open an issue or pull request if needed.

1. ```git clone https://github.com/NazimHAli/wp-portable.git```
2. ```cd wp-portable```
3. ```source .bash_docker_aliases```
4. ```dinitialsetup```
5. Open <a href="http://localhost:8001/" target="_blank">http://localhost:8001/</a>

## Project Structure

```
├── build - automatically created on initialization
│   └── wp-content
│       ├── plugins
│       ├── themes
│       │   └── theme-dev
│       ├── upgrade
│       └── uploads
└── src
    ├── plugins
    └── themes
        └── theme-dev - boilerplate template with _s (underscores) using WordPress best practices
            ├── blocks
            │   └── movie
            ├── cache
            ├── images
            │   └── slider_backgrounds
            ├── inc
            ├── js
            ├── languages
            ├── layouts
            ├── scss
            ├── template-parts
            └── views
                ├── components
                ├── includes
                ├── layouts
                └── posts
```

## Related
- [Sage](https://github.com/roots/sage)
