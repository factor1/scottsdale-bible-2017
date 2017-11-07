/*------------------------------------------------------------------------------
  Gulpfile.js
------------------------------------------------------------------------------*/
// Set the paths you will be working with
var cssFiles     = ['./css/*.css', '!./css/*.min.css'],
    sassFiles    = ['./css/scss/**/*.scss'],
    styleFiles   = [cssFiles, sassFiles],
    jsFiles      = ['./js/theme.js'],
    concatFiles  = ['./js/*.js', './js/src/theme.js', '!./js/*.min.js', '!./js/theme.min.js', '!./js/all.js'];

// Include gulp
var gulp         = require('gulp');

// Include plugins
var jshint       = require('gulp-jshint'),
    sass         = require('gulp-sass'),
    concat       = require('gulp-concat'),
    uglify       = require('gulp-uglify'),
    rename       = require('gulp-rename'),
    nano         = require('gulp-cssnano'),
    sourcemaps   = require('gulp-sourcemaps'),
    autoprefixer = require('gulp-autoprefixer'),
    plumber      = require('gulp-plumber'),
    stylish      = require('jshint-stylish'),
    notify       = require('gulp-notify');

/*------------------------------------------------------------------------------
  Development Tasks
------------------------------------------------------------------------------*/

// Compile Sass
gulp.task('sass', function() {
  return gulp.src( sassFiles )
    .pipe(sourcemaps.init())
      .pipe(plumber())
      .pipe(sass({
        includePaths: []
      })
        .on('error', sass.logError))
        .on('error', notify.onError("Error compiling SASS!")
      )
      .pipe(autoprefixer({
        browsers: ['last 3 versions', 'Safari > 7'],
        cascade: false
      }))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest( './css' ));
});

// Lint JavaScript
gulp.task('lint', function() {
  return gulp.src( jsFiles )
    .pipe(sourcemaps.init())
      .pipe(plumber())
      .pipe(jshint())
      .pipe(jshint.reporter(stylish))
      .pipe(jshint.reporter('fail'))
      .on('error', notify.onError({ message: 'Error compiling JavaScript!'}))
    .pipe(sourcemaps.write());
});

/*------------------------------------------------------------------------------
  Production Tasks
------------------------------------------------------------------------------*/
// Minimize CSS
gulp.task('minify-css', ['sass'], function() {
	return gulp.src( cssFiles )
  	.pipe(rename({
      suffix: '.min'
    }))
    .pipe(nano({
      discardComments: {removeAll: true},
      autoprefixer: false,
      discardUnused: false,
      mergeIdents: false,
      reduceIdents: false,
      calc: {mediaQueries: true},
      zindex: false
    }))
    .pipe(gulp.dest( './css' ));
});

// Concatenate & Minify JavaScript
gulp.task('scripts', ['lint'], function() {
  return gulp.src( concatFiles )
    .pipe(concat( 'all.js' ))
    .pipe(gulp.dest( './js/' ))
    .pipe(rename('theme.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest( './js/' ));
});


// Styles Task - minify-css is the only task we call, because it is dependent upon sass running first.
gulp.task('styles', ['minify-css']);

/*------------------------------------------------------------------------------
  Default Tasks
------------------------------------------------------------------------------*/
// Default Task
gulp.task('default', ['styles', 'scripts', 'watch']);

// Watch Files For Changes
gulp.task('watch', function() {
  gulp.watch( sassFiles, ['styles']);
  gulp.watch( jsFiles, ['scripts']);
});
