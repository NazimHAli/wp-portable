const gulp = require("gulp");
const { compileCSS } = require("./tasks/compileCSS");
const { deleteThemeFolder, copyOtherDependencies } = require("./tasks/helpers");

const { srcPathsToWatch } = require("./tasks/paths.js");
const { compileJS } = require("./tasks/compileJS");
const { processPHP } = require("./tasks/processPHP");
const { compressImages } = require("./tasks/compressImages");

const watchFileChanges = () => {
  gulp.watch([...srcPathsToWatch.css, ...srcPathsToWatch.scss], compileCSS);
  gulp.watch([...srcPathsToWatch.js, ...srcPathsToWatch.ts], compileJS);
  gulp.watch(srcPathsToWatch.php, processPHP);
  gulp.watch(srcPathsToWatch.images, compressImages);
};

exports.watch = gulp.series(
  deleteThemeFolder,
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
