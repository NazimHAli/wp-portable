const changed = require("gulp-changed");
const gulp = require("gulp");
const size = require("gulp-size");
const { allPaths } = require("./paths.js");

function compressImages(done) {
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
}
exports.compressImages = compressImages;
