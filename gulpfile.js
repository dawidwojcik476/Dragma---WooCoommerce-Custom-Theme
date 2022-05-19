var gulp          = require('gulp');
var sass          = require('gulp-sass');
var watch         = require('gulp-watch');
var browserSync   = require('browser-sync');
var csso          = require('gulp-csso');
var postcss       = require('gulp-postcss');
var autoprefixer  = require('autoprefixer');


function swallowError (error) {
    //Prints details of the error in the console
    console.log(error.toString());
    this.emit('end')
}

gulp.task('sass', function() {
    gulp.src('./assets/scss/app/app.scss')
        .pipe(sass())
        .on('error', swallowError)
        .pipe(postcss([ autoprefixer() ]))
        .pipe(gulp.dest('./public/css'))
        //For auto injecting the CSS into the browser. 
        .pipe(browserSync.stream({match: '**/*.css'}));
});


gulp.task('watch', function () {
    //Webpack will watch the asser files. All we need is to watch the compiled files.
    gulp.watch('./public/js/*.js').on('change', browserSync.reload);
    gulp.watch(['./assets/scss/app/*.scss', './assets/src/scss/app/components/*.scss', './assets/scss/app/elements/*.scss' ], ['sass']);
});

  
gulp.task('default', ['sass','watch']);
  