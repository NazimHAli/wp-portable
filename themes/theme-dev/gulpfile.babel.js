const del = require("del");
const gulp = require("gulp");
const babel = require("gulp-babel");
const changed = require("gulp-changed");
const concat = require("gulp-concat");
const gulpif = require("gulp-if");
const size = require("gulp-size");
const tsc = require("gulp-typescript");
const uglify = require("gulp-uglify-es");

const { allPaths, srcPathsToWatch, themeDir } = require("./tasks/paths.js");
const { compileCSS } = require("./tasks/compileCSS");

const argv = process.argv;
const isProd =
  argv.includes("--env=production") || process.env.NODE_ENV === "production";
const env = isProd ? "production" : "development";

console.log(`\n# ----------- Environment: ${env} ----------- #\n`);

/*
 *----------------------------------------------------------
 * JS & TS
 *----------------------------------------------------------
 */
const compileJS = (done) => {
  compileMaterializeJS();
  allPaths.map((path) => {
    const isJSorTS = path.process.js || path.process.ts;
    if (isJSorTS) {
      const reporter = tsc.reporter.fullReporter();
      // cleanup(path, 'js');
      gulp
        .src(isJSorTS)
        .pipe(changed(path.dest, { extension: ".js" }))
        .pipe(
          gulpif(
            (file) => isFileType(file, "ts"),
            tsc(
              {
                sourceMap: false,
              },
              reporter
            )
          )
        )
        .pipe(babel({ presets: ["@babel/preset-env"] }))
        .pipe(gulpif(env === "production", uglify.default()))
        .pipe(gulp.dest(path.dest));
    }
  });
  done();
};

/*
 *----------------------------------------------------------
 * PHP
 *----------------------------------------------------------
 */
const processPHP = (done) => {
  allPaths.map((path) => {
    if (path.process.php) {
      // cleanup(path, 'php');
      gulp
        .src(path.process.php)
        .pipe(changed(path.dest))
        .pipe(gulp.dest(path.dest));
    }
  });
  done();
};

/*
 *----------------------------------------------------------
 * External JS
 *----------------------------------------------------------
 */
const compileMaterializeJS = () => {
  /**
   * Example: Adding external file/library to build
   */

  const materializeJSpath = "node_modules/materialize-css";
  const availableJScomponents = [
    "cash.js",
    "component.js",
    "global.js",
    "anime.min.js",
    "collapsible.js",
    "dropdown.js",
    "modal.js",
    "materialbox.js",
    "parallax.js",
    "tabs.js",
    "tooltip.js",
    "waves.js",
    "toasts.js",
    "sidenav.js",
    "scrollspy.js",
    "autocomplete.js",
    "forms.js",
    "slider.js",
    "cards.js",
    "chips.js",
    "pushpin.js",
    "buttons.js",
    "datepicker.js",
    "timepicker.js",
    "characterCounter.js",
    "carousel.js",
    "tapTarget.js",
    "select.js",
    "range.js",
  ];
  const selectedJScomponents = availableJScomponents.map(
    (component) => `${materializeJSpath}/js/${component}`
  );

  const stockFile = [`${materializeJSpath}/dist/js/materialize.js`];

  return gulp
    .src(gulpif(env === "production", selectedJScomponents, stockFile))
    .pipe(
      gulpif(env === "production", babel({ presets: ["@babel/preset-env"] }))
    )
    .pipe(gulpif(env === "production", uglify.default()))
    .pipe(gulpif(env === "production", concat("materialize.js")))
    .pipe(gulp.dest(`${themeDir.dest}/js`));
};

/*
 *----------------------------------------------------------
 * Images
 *----------------------------------------------------------
 */
const compressImages = (done) => {
  allPaths.map((path) => {
    if (path.process.images) {
      // cleanup(path, '{png,gif,jpg}');
      gulp
        .src(path.process.images)
        .pipe(changed(path.dest))
        .pipe(gulp.dest(path.dest))
        .pipe(size());
    }
  });
  done();
};

/*
 *----------------------------------------------------------
 * Helpers
 *----------------------------------------------------------
 */
const cleanup = (path, filetype) => {
  return del.sync([`${path.dest}/**/*.${filetype}`, `!${path.dest}/vendor`]);
};

const deleteThemeFolder = (done) => {
  console.log("themeDir.dest", themeDir.dest);
  del.sync([themeDir.dest]);
  done();
};

const isFileType = (file, type) => {
  return file.path.endsWith(`${type}`);
};

const copyOtherDependencies = (done) => {
  allPaths.map((pathObj) => {
    if (pathObj.process.copy) {
      gulp.src(pathObj.process.copy).pipe(gulp.dest(pathObj.dest));
    }
  });
  done();
};

const watchFileChanges = () => {
  gulp.watch([...srcPathsToWatch.css, ...srcPathsToWatch.scss], compileCSS);
  gulp.watch([...srcPathsToWatch.js, ...srcPathsToWatch.ts], compileJS);
  gulp.watch(srcPathsToWatch.php, processPHP);
  gulp.watch(srcPathsToWatch.images, compressImages);
};

exports.watch = gulp.series(
  // deleteThemeFolder,
  gulp.parallel(
    compileCSS,
    compileJS,
    compressImages,
    processPHP,
    copyOtherDependencies
  ),
  watchFileChanges
);

exports.build = gulp.series(
  deleteThemeFolder,
  gulp.parallel(
    compileCSS,
    compileJS,
    compressImages,
    processPHP,
    copyOtherDependencies
  )
);
