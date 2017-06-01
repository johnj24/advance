var gulp = require('gulp');
var browserSync = require('browser-sync').create();

// load all plugins in 'devDependencies' into the variable $
const $ = require('gulp-load-plugins')({
  pattern: ['*'],
  scope: ['devDependencies']
});

// package vars
const pkg = require('./package.json');

gulp.task('browserSync', function() {
  browserSync.init({
    proxy: "advance.dev:8888",
  })
})

// sass - build the scss to the build folder, including the required paths, and
// writing out a sourcemap
gulp.task('sass', () => {
  $.fancyLog("-> Compiling scss: " + pkg.paths.dist.css + pkg.vars.scssName);

  var onError = function(err) {
    $.notify.onError({
      title:    "Gulp",
      subtitle: "Failure!",
      message:  "Error: <%= error.message %>",
      sound:    "Beep"
    })(err);

    this.emit('end');
  };

  return gulp.src(pkg.paths.src.scss + '/**/*.scss')
    .pipe($.plumber({ errorHandler: onError }))
    .pipe($.sourcemaps.init())
    .pipe($.sass({
            includePaths: pkg.paths.scss
        })
        .on('error', $.sass.logError))
    .pipe($.cached('sass_compile'))
    .pipe($.autoprefixer())
    .pipe($.cssnano())
    .pipe($.sourcemaps.write('./'))
    .pipe($.size({ gzip: true, showFiles: true }))
    .pipe(gulp.dest(pkg.paths.dist.css))
    .pipe(browserSync.reload({
      stream: true
    }))
});

// Moving templates
gulp.task('templates', function(){
	return gulp.src(pkg.paths.src.templates + '**/*.twig')
    .pipe($.rename({extname: ".html"}))
    .pipe($.changed(pkg.paths.dist.templates))
    .pipe($.size({ gzip: true, showFiles: true }))
	  .pipe(gulp.dest(pkg.paths.dist.templates))
    .pipe(browserSync.reload({
      stream: true
    }))
});



// Rerun the task when a file changes
gulp.task('watch', ['browserSync', 'sass', 'templates'], function(){
  gulp.watch(pkg.paths.src.scss + '/**/*', ['sass']);
  // reloads the browser whenever HTML files change
  gulp.watch(pkg.paths.src.templates + '/**/*.twig', ['templates']);
  // Other watchers
})

// The default task (called when you run `gulp` from cli)
gulp.task('default', ['watch']);
