const babel = require("gulp-babel");
const changed = require("gulp-changed");
const gulp = require("gulp");
const gulpif = require("gulp-if");
const tsc = require("gulp-typescript");
const uglify = require("gulp-uglify-es");
const { isFileType } = require("./helpers");
const { allPaths, themeDir } = require("./paths.js");
const { env } = require("./config");
const concat = require("gulp-concat")

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

function compileJS(done) {
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
}
exports.compileJS = compileJS;
