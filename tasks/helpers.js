const del = require("del");
const gulp = require("gulp");
const { allPaths, themeDir } = require("./paths.js");


const cleanup = (path, filetype) => {
  return del.sync([`${path.dest}/**/*.${filetype}`, `!${path.dest}/vendor`]);
};

const deleteThemeFolder = (done) => {
  del.sync([themeDir.dest]);
  done();
};
exports.deleteThemeFolder = deleteThemeFolder;

const isFileType = (file, type) => {
  return file.path.endsWith(`${type}`);
};
exports.isFileType = isFileType;

const copyOtherDependencies = (done) => {
  allPaths.map((path) => {
    if (path.process.copy) {
      gulp.src(path.process.copy).pipe(gulp.dest(path.dest));
    }
  });
  done();
};
exports.copyOtherDependencies = copyOtherDependencies;
