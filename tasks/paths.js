/* eslint-disable max-len */
const themeName = "theme-dev";

export const themeDir = {
  src: `src/themes/${themeName}`,
  dest: `build/wp-content/themes/${themeName}`,
};

/*
 *----------------------------------------------------------
 * All paths
 *----------------------------------------------------------
 */

export const allPaths = [
  {
    src: `${themeDir.src}`,
    dest: `${themeDir.dest}`,
    process: {
      css: `${themeDir.src}/*.css`,
      php: `${themeDir.src}/*.php`,
      images: `${themeDir.src}/*.{png,gif,jpg}`,
    },
  },
  {
    src: `${themeDir.src}/blocks`,
    dest: `${themeDir.dest}/blocks`,
    process: {
      scss: `${themeDir.src}/blocks/**/*.scss`,
      js: `${themeDir.src}/blocks/**/*.js`,
      php: `${themeDir.src}/blocks/**/*.php`,
    },
  },
  {
    src: `${themeDir.src}/cache`,
    dest: `${themeDir.dest}/cache`,
    process: {
      php: `${themeDir.src}/cache/**/*.php`,
    },
  },
  {
    src: `${themeDir.src}/images`,
    dest: `${themeDir.dest}/images`,
    process: {
      images: `${themeDir.src}/images/**/*.{png,gif,jpg}`,
    },
  },
  {
    src: `${themeDir.src}/inc`,
    dest: `${themeDir.dest}/inc`,
    process: {
      php: `${themeDir.src}/inc/**/*.php`,
    },
  },
  {
    src: `${themeDir.src}/js`,
    dest: `${themeDir.dest}/js`,
    process: {
      ts: `${themeDir.src}/js/**/*.ts`,
    },
  },
  {
    src: `${themeDir.src}/languages`,
    dest: `${themeDir.dest}/languages`,
    process: {
      copy: `${themeDir.src}/languages/**/*`,
    },
  },
  {
    src: `${themeDir.src}/style`,
    dest: `${themeDir.dest}/css`,
    process: {
      scss: `${themeDir.src}/style/**/*.scss`,
    },
  },
  {
    src: `${themeDir.src}/template-parts`,
    dest: `${themeDir.dest}/template-parts`,
    process: {
      php: `${themeDir.src}/template-parts/**/*.php`,
    },
  },
  {
    src: "vendor",
    dest: `${themeDir.dest}/vendor`,
    process: {
      copy: "vendor/**/*",
    },
  },
  {
    src: `${themeDir.src}/views`,
    dest: `${themeDir.dest}/views`,
    process: {
      php: `${themeDir.src}/views/**/*.php`,
    },
  },
];

export const srcPathsToWatch = {
  css: [],
  scss: [],
  js: [],
  ts: [],
  php: [],
  images: [],
};

allPaths.map((path) => {
  const css = path.process.css;
  const images = path.process.images;
  const js = path.process.js;
  const php = path.process.php;
  const scss = path.process.scss;
  const ts = path.process.ts;

  css ? srcPathsToWatch.css.push(css) : null;
  images ? srcPathsToWatch.images.push(images) : null;
  js ? srcPathsToWatch.js.push(js) : null;
  php ? srcPathsToWatch.php.push(php) : null;
  scss ? srcPathsToWatch.scss.push(scss) : null;
  ts ? srcPathsToWatch.ts.push(ts) : null;
});
