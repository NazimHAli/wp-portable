const changed = require("gulp-changed");
const gulp = require("gulp");
const { allPaths } = require("./paths.js");

function processPHP(done) {
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
}
exports.processPHP = processPHP;
