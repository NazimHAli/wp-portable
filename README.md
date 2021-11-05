# PortableWP
Dockerized WordPress development environment. Just need Docker + your favorite editor, all requirements/packages are installed in Docker containers: Docker, GulpJS, \_s, Laravel Blade Templates, MaterializeCSS.


## Project Structure


```
├── build
│   └── wp-content
│       ├── plugins
│       ├── themes
│       │   └── theme-dev
│       ├── upgrade
│       └── uploads
└── src
    ├── plugins
    └── themes
        └── theme-dev
            ├── blocks
            │   └── movie
            ├── cache
            ├── images
            │   └── slider_backgrounds
            ├── inc
            ├── js
            ├── languages
            ├── layouts
            ├── sass
            │   ├── elements
            │   ├── forms
            │   ├── layout
            │   ├── media
            │   ├── mixins
            │   ├── modules
            │   ├── navigation
            │   ├── site
            │   │   ├── primary
            │   │   └── secondary
            │   ├── typography
            │   └── variables-site
            ├── scss
            ├── template-parts
            └── views
                ├── components
                ├── includes
                ├── layouts
                └── posts
```

## Prerequisites
[Install Docker Compose](https://docs.docker.com/compose/install/)

## Installation
###### Note: Only used with Arch Linux, but should work on any OS/distro with Docker. Open an issue or pull request if needed.

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

## Contributing
1. Fork it (<https://github.com/yourname/yourproject/fork>)
2. Create your feature branch (`git checkout -b feature/fooBar`)
3. Commit your changes (`git commit -am 'Add some fooBar'`)
4. Push to the branch (`git push origin feature/fooBar`)
5. Create a new Pull Request

## Related
- [Sage](https://github.com/roots/sage)
- [aaa](aaaa)
- [aaa](aaaa)
- [aaa](aaaa)
- [aaa](aaaa)

## License
- License