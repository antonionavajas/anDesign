var gulp = require('gulp');
var sass = require('gulp-sass');
var rename = require('gulp-rename');
var cssmin = require('gulp-cssmin');
var plumber = require('gulp-plumber');
var autoprefixer = require('gulp-autoprefixer');
var browsersync = require('browser-sync');
var reload = browsersync.reload;
var jsProdDir = 'www/wp-content/themes/andesign/js';
var cssProdDir = 'www/wp-content/themes/andesign/css';

//Dependecias
var browserify = require('gulp-browserify');
var concat = require('gulp-concat');

//Scripts a concatenar
var jsScripts = [
  '/scripts/web.js'
];

var cssFiles = [
  'www/wp-content/andesign/css/normalizer.min.css',
  'www/wp-content/andesign/css/aos.min.css',
  'www/wp-content/andesign/css/styles.min.css'
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
  gulp.src(['www/wp-content/themes/andesign/css/*.css', '!www/wp-content/themes/andesign/css/*.min.css'])
    .pipe(cssmin())
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest(cssProdDir));
});

gulp.task('concatCSS', function () {
  console.log("concatcss?");
  return gulp.src(['www/wp-content/themes/andesign/css/normalizer.min.css','www/wp-content/themes/andesign/css/aos.min.css','www/wp-content/themes/andesign/css/styles.min.css'])
    .pipe(concat("style.css"))
    .pipe(gulp.dest('www/wp-content/themes/andesign'));
});

gulp.task('serve', ['sass', 'miniCSS', 'concatCSS', 'concat'], function(){
  browsersync.init(['css/*.css', 'js/*.js', '*.html', '*.php'],{
    proxy: "localhost"
  });
})

gulp.task('watch', ['serve'], function(){
  gulp.watch(['scss/*.scss'], ['sass']),
  gulp.watch(['www/wp-content/themes/andesign/css/*.css'], ['miniCSS', 'concatCSS']),
  gulp.watch(['scripts/*.js'], ['concat'])
});

gulp.task('default', ['watch']);
