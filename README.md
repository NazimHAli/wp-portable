# Dockerized WordPress Dev Environment

Dockerized WordPress development environment. Just needs Docker + your favorite editor, all requirements/packages are installed in Docker containers. Don't have to worry about installing and setting up WordPress + permissions + composer + mysql + virtual envs...etc.

#### Motivation
This is from a custom project I worked on a few years ago. There were 2 primary objectives:
 - Fully dockerized local dev environment
 - Portable

## Prerequisites
[Docker Compose V2](https://docs.docker.com/compose/cli-command/)

## Install
###### Note: Tested with Arch Linux, but should work on any OS/distro with Docker. Open an issue or pull request if needed.

1. ```git clone https://github.com/NazimHAli/wp-portable.git```
2. ```cd wp-portable```
3. ```source .bash_docker_aliases```
4. ```dinit && dyarn_watch```
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
        └── theme-dev - custom starter template using _s (underscores)
```

## Related
- [Sage](https://github.com/roots/sage)
