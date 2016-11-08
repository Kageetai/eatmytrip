var gulp = require('gulp');
var browserSync = require('browser-sync').create();
var reload = browserSync.reload;
var plumber = require('gulp-plumber');
var rename = require('gulp-rename');
var sourcemaps = require('gulp-sourcemaps');
var sass = require('gulp-sass');
var autoPrefixer = require('gulp-autoprefixer');
//if node version is lower than v.0.1.2
require('es6-promise').polyfill();
var cssComb = require('gulp-csscomb');
var cmq = require('gulp-merge-media-queries');
var cleanCss = require('gulp-clean-css');
var uglify = require('gulp-uglify');

gulp.task('scss', function () {
    gulp.src(['scss/main.scss'])
        .pipe(plumber({
            handleError: function (err) {
                console.log(err);
                this.emit('end');
            }
        }))
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(autoPrefixer())
        .pipe(cssComb())
        .pipe(cmq({log: true}))
        .pipe(gulp.dest('css'))
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(cleanCss())
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('css'))
        .pipe(browserSync.stream());
});

gulp.task('js', function () {
    gulp.src(['js/**/*.js'])
        .pipe(plumber({
            handleError: function (err) {
                console.log(err);
                this.emit('end');
            }
        }))
        .pipe(gulp.dest('js'))
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(uglify())
        .pipe(gulp.dest('js'))
        .pipe(browserSync.stream());
});

gulp.task('default', ['js', 'scss'], function () {
    browserSync.init({
        files: ['**/*.php', '*.php', 'css/*.css', 'js/*.js'],
        open: false,
        proxy: "http://localhost/eatmytrip/",
        snippetOptions: {
            whitelist: ['/wp-admin/admin-ajax.php'],
            blacklist: ['/wp-admin/**']
        }
    });
    gulp.watch('js/**/*.js', ['js']);
    gulp.watch('scss/**/*.scss', ['scss']);
    gulp.watch('images/src/**/*', ['image']);
});
