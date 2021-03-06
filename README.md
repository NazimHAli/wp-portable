# Dockerized WordPress Dev Environment

Example of a Dockerized WordPress development environment. Just needs Docker + your favorite editor, all requirements/packages are installed in Docker containers. Don't have to install and set-up WordPress, permissions, composer, mysql, node.

I used this 5+ years ago and extracted some of the build logic. The setup can be used with any current theme framework, a custom (old) example is provided. Some of the dependencies were updated, but not all. Since this is pretty old, I'd expect similar (and better) ones out by now.

*Update:* Looks like there's finally a setup package [@wordpress/env](https://developer.wordpress.org/block-editor/reference-guides/packages/packages-env/)
> `wp-env` lets you easily set up a local WordPress environment for building and testing plugins and themes. It’s simple to install and requires no configuration.

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
        └── theme-dev - example starter template using _s (underscores)
```

## Related
- [ddev](https://ddev.readthedocs.io/en/stable/)
- [Sage](https://github.com/roots/sage)
