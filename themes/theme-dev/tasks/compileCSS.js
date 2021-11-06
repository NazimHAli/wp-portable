const autoprefixer = require("gulp-autoprefixer");
const changed = require("gulp-changed");
const minifyCSS = require("gulp-csso");
const gulpif = require("gulp-if");
const rename = require("gulp-rename");
const sass = require("gulp-sass")(require("sass"));
const stylelint = require("gulp-stylelint");

const compileCSS = (done) => {
  allPaths.map((pathObj) => {
    const isCSSorSASS = pathObj.process.css || pathObj.process.scss;

    if (isCSSorSASS) {
      gulp
        .src(isCSSorSASS, { sourcemaps: true })
        .pipe(changed(pathObj.dest, { extension: ".css" }))
        .pipe(gulpif((file) => isFileType(file, "scss"), sass()))
        .pipe(
          gulpif(
            env === "development",
            stylelint({ fix: true, failAfterError: false })
          )
        )
        .pipe(gulpif(env === "production", autoprefixer()))
        .pipe(gulpif(env === "production", minifyCSS()))
        .pipe(gulpif(env === "production", rename({ extname: ".min.css" })))
        .pipe(gulp.dest(pathObj.dest), { sourcemaps: true });
    }
  });
  done();
};
pool
export { compileCSS };
