const { src, dest, watch, series, parallel } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const log = require('fancy-log');
// const del = require("del");

// File paths
const files = {
	scssPath: 'src/styles/kraftkallan.scss',
  watchScssPath: 'src/styles/**/*.scss',
	jsPath: 'src/js/kraftkallan.js',
};

/**
 * Compile CSS from SCSS files. 
 */
function scssTask(done) {
	src(files.scssPath, { sourcemaps: true }) // set source and turn on sourcemaps
		.pipe(sass()) // compile SCSS to CSS
		// .pipe(postcss([autoprefixer(), cssnano()])) // PostCSS plugins
		.pipe(dest('dist', { sourcemaps: '.' })); // put final CSS in dist folder with sourcemap
  log('Done compiling CSS from SCSS!');
  done();
}

// gulp.task("clean", () => {
//   return del(["dist/css/kraftkallan.css"]);
// });

exports.build = scssTask;

/**
 * Watch for file changes in SCSS files.
 */
function watchScss() {
  log('Watching for SCSS file changes...');
  watch(files.watchScssPath, scssTask);
}
exports.watch = watchScss;
