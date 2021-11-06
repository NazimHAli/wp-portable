const gulp = require("gulp");
const autoprefixer = require("gulp-autoprefixer");
const changed = require("gulp-changed");
const minifyCSS = require("gulp-csso");
const gulpif = require("gulp-if");
const stylelint = require("gulp-stylelint");
const { allPaths } = require("./paths.js");
const sass = require("gulp-sass")(require("sass"));
const { isFileType } = require("./helpers");
const {env} = require("./config")


function compileCSS(done) {
  allPaths.map((path) => {
    const isCSSorSASS = path.process.css || path.process.scss;
    if (isCSSorSASS) {
      // cleanup(path.dest, 'css');
      gulp
        .src(isCSSorSASS, { sourcemaps: true })
        .pipe(changed(path.dest, { extension: ".css" }))
        .pipe(gulpif((file) => isFileType(file, "scss"), sass()))
        .pipe(
          gulpif(
            env === "development",
            stylelint({ fix: true, failAfterError: false })
          )
        )
        .pipe(gulpif(env === "production", autoprefixer()))
        .pipe(gulpif(env === "production", minifyCSS()))
        .pipe(gulp.dest(path.dest), { sourcemaps: true });
    }
  });
  done();
}
exports.compileCSS = compileCSS;
