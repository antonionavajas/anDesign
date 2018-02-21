var gulp = require('gulp');
var sass = require('gulp-sass');
var rename = require('gulp-rename');
var cssmin = require('gulp-cssmin');
var plumber = require('gulp-plumber');
var autoprefixer = require('gulp-autoprefixer');
var browsersync = require('browser-sync');
var reload = browsersync.reload;
var jsProdDir = 'www/js';
var cssProdDir = 'www/css';

//Dependecias
var browserify = require('gulp-browserify');
var concat = require('gulp-concat');

//Scripts a concatenar
var jsScripts = [
  // 'app/js/ejemplo.js'
];

//Concatenar
gulp.task('concat', function(){
  gulp.src(jsScripts)
    .pipe(concat('app.js'))
    .pipe(browserify())
    .pipe(gulp.dest(jsProdDir))
    .pipe(reload({stream: true}))
})

//Compilar CSS
gulp.task('sass', function(){
  gulp.src('scss/styles.scss')
    .pipe(plumber())
    .pipe(sass({
      includePaths: ['scss']
    }))
    .pipe(autoprefixer())
    .pipe(gulp.dest(cssProdDir));


});

//Minificando los ficheros CSS
gulp.task('miniCSS', function(){
  gulp.src(['www/css/*.css', '!www/css/*.min.css'])
    .pipe(cssmin())
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest(cssProdDir));
});

gulp.task('serve',['sass', 'miniCSS'], function(){
  browsersync.init(['www/css/*.css', 'www/js/*.js', 'www/*.html'],{
    server:{
      baseDir: 'www'
    }
  });
})

gulp.task('watch', ['sass', 'miniCSS', 'serve', 'concat'], function(){
  gulp.watch(['scss/*.scss'], ['sass']),
  gulp.watch(['www/css/*.css'], ['miniCSS']),
  gulp.watch(['www/js/*.js'], ['concat'])
});

gulp.task('default', ['watch']);
