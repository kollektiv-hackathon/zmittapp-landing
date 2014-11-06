// Include gulp
var gulp = require('gulp'); 

// Include Our Plugins
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var autoprefixer = require('gulp-autoprefixer');
var minifycss = require('gulp-minify-css');
var resolveDependencies = require('gulp-resolve-dependencies');

var source_folder = 'source/assets/';
var build_folder = 'assets/';



// Compile Our Sass
gulp.task('sass', function() {
    // backend
    gulp.src(source_folder + 'scss/admin/admin.scss')
        .pipe(sass())
        .pipe(autoprefixer('last 2 version', 'Explorer 8'))
        .pipe(gulp.dest(build_folder + 'css'))
        .pipe(rename('admin.min.css'))
        .pipe(minifycss({keepSpecialComments: 0}))
        .pipe(gulp.dest(build_folder + 'css'));

    // fontend
    return gulp.src(source_folder + 'scss/main.scss')
        .pipe(sass())
        .pipe(autoprefixer('last 2 version', 'Explorer 8'))
        .pipe(gulp.dest(build_folder + 'css'))
        .pipe(rename('main.min.css'))
        .pipe(minifycss({keepSpecialComments: 0}))
        .pipe(gulp.dest(build_folder + 'css'));
});

// Concatenate & Minify JS
gulp.task('scripts', function() {

    gulp.src(source_folder + 'js/jquery.js')
            .pipe(resolveDependencies({
                pattern: /\* @requires [\s-]*(.*?\.js)/g,
                log: true
            }))
            .pipe(concat('jquery.js'))
            .pipe(gulp.dest(build_folder + 'js'))
            .pipe(rename('jquery.min.js'))
            .pipe(uglify())
            .pipe(gulp.dest(build_folder + 'js'));

    return gulp.src(source_folder + 'js/main.js')
        .pipe(resolveDependencies({
            pattern: /\* @requires [\s-]*(.*?\.js)/g,
            log: true
        }))
        .pipe(concat('main.js'))
        .pipe(gulp.dest(build_folder + 'js'))
        .pipe(rename('main.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest(build_folder + 'js'));
});

// Copy Files
gulp.task('move-assets', function() {

    return gulp.src(source_folder + 'img/*')
        .pipe(gulp.dest(build_folder + 'img'));
});

// Watch Files For Changes
gulp.task('watch', function() {
    //gulp.watch(source_folder + 'js/{,**/}*.js', ['lint', 'scripts']);
    gulp.watch(source_folder + 'scss/{,**/}*.scss', ['sass']);
});

// Default Task
gulp.task('default', ['sass', 'move-assets', 'scripts']);
