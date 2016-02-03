var gulp    = require('gulp'),
    concat    = require('gulp-concat'),
    minifyCss = require('gulp-minify-css'),
    csslint = require('gulp-csslint'),
    jshint = require("gulp-jshint"),
    stylish = require('jshint-stylish'),
    uglify = require('gulp-uglify'),
    replace = require('gulp-replace');


var paths = {
    cssPath: './assets/styles/theme',
    cssVendorPath: './assets/styles/vendor',
    jsPath: './assets/scripts/theme',
    jsVendorPath: './assets/scripts/vendor',
    minified: './public',
    build: "./gulpbuild"
};

var cssFiles = [
    paths.cssPath + "/**/*.css"
];
var cssFilesCopy = [
    paths.cssVendorPath + '/ionicons.min.css',
];

var cssFilesVendor = [
    paths.cssVendorPath + "/bootstrap.min.css",
    paths.cssVendorPath + "/bootstrap-theme.min.css",
    paths.cssVendorPath + "/flexslider.css",
    paths.cssVendorPath + "/bootstrap.offcanvas.min.css",
    paths.cssVendorPath + "/bootstrap-select.min.css",
    paths.cssVendorPath + "/normalize.css",
    paths.cssVendorPath + "/ionicons.min.css"
];

var jsFiles = [
    paths.jsPath + "/**/*.js"
];

var jsFilesVendor = [
    paths.jsVendorPath + '/jquery-1.11.3.min.js',
    paths.jsVendorPath + '/bootstrap.min.js',
    paths.jsVendorPath + '/jquery.flexslider-min.js',
    paths.jsVendorPath + '/bootstrap.offcanvas.min.js',
    paths.jsVendorPath + '/bootstrap-select.min.js'
];
var jsFilesCopy = [
    paths.jsVendorPath + '/modernizr.custom.js',
];

//move images
gulp.task('images', function(){
    gulp.src([
            "./assets/images/**/*.*"
        ])
        .pipe(gulp.dest( paths.minified + "/images"));
});

//move fonts
gulp.task('fonts', function(){
    gulp.src([
            "./assets/fonts/**/*.*"
        ])
        .pipe(gulp.dest(paths.minified + "/fonts"))
});

//concat and minify theme specific css
gulp.task('themeCss', function () {
    var stream = gulp.src(cssFiles)
        //.pipe(csslint())
        //.pipe(csslint.reporter(stylish))
        .pipe(concat('theme.min.css'))
        .pipe(minifyCss())
        .pipe(gulp.dest(paths.build + '/css'));
    return stream;
});

//concat vendor css
gulp.task('vendorCss', function () {
    var stream = gulp.src(cssFilesVendor)
        .pipe(concat('vendor.min.css'))
        .pipe(gulp.dest(paths.build + '/css'));
    return stream;
});

//concat vendor and theme
gulp.task('concatCss', ["themeCss", "vendorCss"], function () {
    gulp.src([paths.build + "/css/vendor.min.css", paths.build + "/css/theme.min.css"])
        .pipe(concat('style.min.css'))
        .pipe(gulp.dest(paths.minified + '/css'));
});


gulp.task('copycss', function(){
    gulp.src(cssFilesCopy)
        .pipe(gulp.dest( paths.minified + "/css"));
});

gulp.task('themejs', function(){
    var stream = gulp.src(jsFiles)
        .pipe(jshint())
        .pipe(jshint.reporter(stylish))
        .pipe(concat('theme.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest(paths.build + '/js'));
    return stream;
});

gulp.task('vendorjs', function(){
    console.log(jsFilesVendor);
    var stream = gulp.src(jsFilesVendor)
        .pipe(concat('vendor.min.js'))
        .pipe(gulp.dest(paths.build + '/js'));
    return stream;
});

gulp.task('concatjs', ["themejs", "vendorjs"], function(){
    gulp.src([paths.build + "/js/vendor.min.js", paths.build + "/js/theme.min.js"])
        .pipe(concat('scripts.min.js'))
        .pipe(gulp.dest(paths.minified + '/js'));
});
gulp.task('copyjs', function(){
    gulp.src(jsFilesCopy)
        .pipe(gulp.dest( paths.minified + "/js"));
});

gulp.task('watch', function(){
    gulp.watch(jsFiles, ['js']);
    gulp.watch(cssFiles, ['css']);
});

gulp.task('css', ['themeCss', 'vendorCss', "concatCss", "copycss", "images", "fonts"]);

gulp.task('js', ['vendorjs', 'themejs', "concatjs", "copyjs"]);

gulp.task('build', ['css', "js"]);

gulp.task('default', ['build', 'watch']);