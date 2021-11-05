# Portable WordPress Theme + Plugin Dev Environment

Dockerized WordPress development environment. Just needs Docker + your favorite editor, all requirements/packages are installed in Docker containers. Uses Docker, GulpJS, \_s, Laravel Blade Templates, MaterializeCSS as an example.

#### Background
This is from a custom framework I worked on a few years ago. The motivation was to create a fully dockerized local dev environment so that devs didn't have to worry about installing and setting up WordPress + permissions + mysql + virtual envs...etc. Wanted devs to be able to start and initialize a new project with just one command so that we could focus on WordPress theme + plugin development.

#### Update
Most of the dependencies are outdated, but if there's interest or I get bored (:p), can update them to latest stable. Also, since it has been a few years, I assume there are frameworks/environments similar to this. Would be fun to continue working on the project or pickup a similar one, especially now that WordPress has a [REST API](https://developer.wordpress.org/rest-api/)

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

## Prerequisites
[Install Docker Compose V2](https://docs.docker.com/compose/cli-command/)

## Installation
###### Note: Tested with Arch Linux, but should work on any OS/distro with Docker. Open an issue or pull request if needed.

1. ```git clone repo```
2. ```cd repo && source .bash_docker_aliases```
4. ```dinitialsetup```
5. Open <a href="http://localhost:8001/" target="_blank">http://localhost:8001/</a>

## Usage Examples
[Awesome Docker Cheatsheet](https://github.com/LeCoupa/awesome-cheatsheets/blob/master/tools/docker.sh)  
A few motivating and useful examples of how your product can be used. Spice this up with code blocks and potentially more screenshots.

_For more examples and usage, please refer to the [Wiki][wiki]._

## Built Using
- [Composer](https://getcomposer.org/)
- [Docker](https://www.docker.com/)
- [GulpJS](https://gulpjs.com/)
- [Laravel Blade](https://laravel.com/docs/master/blade)
- [Materialize CSS](https://materializecss.com/)
- [NodeJS](https://nodejs.org/en/)
- [Underscores \_s starter theme](https://github.com/Automattic/_s)
- [WordPress](https://wordpress.org/)
- [Yarn](https://yarnpkg.com/en/)

## Related
- [Sage](https://github.com/roots/sage)
