# Dockerized WordPress Dev Environment

Dockerized WordPress development environment. Just needs Docker + your favorite editor, all requirements/packages are installed in Docker containers. Don't have to worry about installing and setting up WordPress + permissions + composer + mysql + virtual envs...etc.

## Pre-requisites
[Docker Compose V2](https://docs.docker.com/compose/cli-command/)

## Install
###### Note: Tested with Arch Linux, but should work on any OS/distro with Docker. Open an issue or pull request if needed.

1. ```git clone https://github.com/NazimHAli/wp-portable.git && cd wp-portable```
2. ```source .bash_docker_aliases```
3. ```dinit && dyarn_watch```  
    - Open <a href="http://localhost:8888/" target="_blank">http://localhost:8888/</a>

## Project Structure

```
├── build - created after running dinit
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

#### Motivation
This is from a custom project I worked on a few years ago. There were 2 primary objectives:
 - Fully dockerized local dev environment
 - Portable

## Related
- [Sage](https://github.com/roots/sage)
