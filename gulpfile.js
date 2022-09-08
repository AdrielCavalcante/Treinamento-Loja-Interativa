const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const watchSass = require("gulp-watch-sass");
const sourcemaps = require('gulp-sourcemaps');

const globscss = './scss/**/*.scss';
const distcss = './css';

gulp.task('sass-nocompressed', function () {
    return gulp.src(globscss)
        .pipe(sass({
            includePaths: ['node_modules/'],
        }).on('error', sass.logError))
        .pipe(gulp.dest(distcss));
});

gulp.task('sass', function () {
    return gulp.src(globscss)
        .pipe(sass({
            includePaths: ['node_modules/'],
            outputStyle: 'compressed'
        }).on('error', sass.logError))
        .pipe(gulp.dest(distcss));
});

gulp.task('sass:dev', function () {
    return gulp.src(globscss)
        .pipe(sourcemaps.init())
        .pipe(sass({
            includePaths: ['node_modules/'],
        }).on('error', sass.logError))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(distcss));
});

gulp.task('sass:watch', function () {
    watchSass([globscss])
        .pipe(sourcemaps.init())
        .pipe(sass({
            includePaths: ['node_modules/'],
            outputStyle: 'compressed'
        }).on('error', sass.logError))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(distcss));
});

gulp.task('default', gulp.parallel('sass:watch'));
