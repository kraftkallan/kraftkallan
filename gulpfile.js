const { src, dest, watch, series, parallel } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const log = require('fancy-log');
// const del = require("del");
const ts = require("gulp-typescript");
const tsProject = ts.createProject("tsconfig.json");
const svgmin = require('gulp-svgmin');


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
		.pipe(sass().on('error', sass.logError)) // compile SCSS to CSS
		// .pipe(postcss([autoprefixer(), cssnano()])) // PostCSS plugins
		.pipe(dest('dist', { sourcemaps: '.' })) // put final CSS in dist folder with sourcemap    
  logMessage('Done compiling SCSS to CSS!');
  return done();
}
exports.scss = scssTask;

function logMessage(message) {
  return log(message);
}

function buildStyles() {
  return src('./src/styles/kraftkallan.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(dest('./dist'));
};

exports.buildStyles = buildStyles;

/**
 * Build script
 */
exports.build = parallel(scssTask, scriptsTask, minifySvg);

/**
 * Compile Typescript to Javascript.  
 */
function scriptsTask() {
  return tsProject.src().pipe(tsProject()).js.pipe(dest("dist"));
}
exports.scripts = scriptsTask;

/**
 * Clean dist folder. 
 */
// function cleanDist() {
//   return del(["dist/css/kraftkallan.css"]);
// }
// exports.clean = cleanDist;

/**
 * Watch for file changes in SCSS files.
 */
function watchScss() {
  log('Watching for SCSS file changes...');
  watch(files.watchScssPath, buildStyles);
}
exports.watch = watchScss;

function minifySvg() {
  return src('./src/images/logo.svg')
    .pipe(svgmin({
      // Ensures the best optimization.
      multipass: true,
      js2svg: {
        // Beutifies the SVG output instead of
        // stripping all white space.
        pretty: true,
        indent: 2,
      },
      // Alter the default list of plugins.
      plugins: [
        // You can enable a plugin with just its name.
        'sortAttrs',
        // 'cleanupAttrs',
        // {
        //   name: 'removeViewBox',
        //   // Disable a plugin by setting active to false.
        //   active: false,
        // },
        {
          name: 'cleanupIDs',
          // Add plugin options.
          params: {
            minify: true,
          }
        },
      ],
    }))
    .pipe(dest('./dist'));
}
exports.svg = minifySvg;