var gulp    = require('gulp'),
    concat    = require('gulp-concat'),
    minifyCss = require('gulp-minify-css'),
    csslint = require('gulp-csslint'),
    jshint = require("gulp-jshint"),
    stylish = require('jshint-stylish'),
    uglify = require('gulp-uglify'),
    replace = require('gulp-replace');


var paths = {
    cssPath: './css',
    jsPath: './js',
    minified: './minified'
};

var cssFiles = [
    './fonts/icons/bytbil/bytbil-icons-base.css',
    './fonts/icons/bytbil/bytbil-icons.css',
    './fonts/icons/fontawesome/fontawesome.css',
    paths.cssPath + '/bootstrap.css',
    paths.cssPath + '/bootstrap-theme.min.css',
    paths.cssPath + '/normalize.min.css',
    paths.cssPath + '/flexslider.css',
    paths.cssPath + '/owl.carousel.css',
    paths.cssPath + '/owl.theme.css',
    paths.cssPath + '/jasny-bootstrap.css',
    "./fonts/helvetica-neue/helvetica-neue.css",
    paths.cssPath + '/extra/morphsearch.css',
    paths.cssPath + '/extra/ns-default.css.css',
    paths.cssPath + '/extra/ns-style-bar.css',
    paths.cssPath + '/extra/ns-style-attached.css',
    './fonts/volvo/volvo.css',
    './fonts/renault/renault.css',
    "./fonts/ford/ford.css",
    './fonts/dacia/dacia.css',
    './base.css',
    './style.css',
    './css/extra/bootstrap-select.css',
    './css/print.css'

];

var cssFilesClean = [
    './fonts/icons/bytbil/bytbil-icons.css', //
    './fonts/icons/fontawesome/fontawesome.css', //
    paths.cssPath + '/bootstrap.css', //
    paths.cssPath + '/bootstrap-theme.min.css', //
    paths.cssPath + '/normalize.min.css', //
    paths.cssPath + '/flexslider.css', //
    paths.cssPath + '/owl.carousel.css', //
    paths.cssPath + '/owl.theme.css', // 
    paths.cssPath + '/jasny-bootstrap.css', //
    "./fonts/helvetica-neue/helvetica-neue.css", //
    './fonts/volvo/volvo.css', //
    './base.css', //
    './style.css', //

];

var jsFiles = [
    './js/jsrender.js',
    './js/custom.js',
    './js/jquery.cookiebar.js',
    './js/um.search.js',
    './js/bootstrap.min.js',
    './js/modernizr.custom.js',
    './js/classie.js',
    './js/notificationFx.js',
    './js/jquery.flexslider-min.js',
    './js/owl.carousel.js',
    './js/extra/respimage.min.js',
    './js/jquery-ui.min.js',
    './js/jasny-bootstrap.min.js',
    './js/extra/bootstrap-select.min.js',
    './js/um.form.js',
    './js/scroll-menu.js',
    './plugins/favorites/js/favorites.js',
    './plugins/favorites/js/scripts.js',
    './js/slideshows.js'
];



gulp.task('images', function(){
    gulp.src([
            './css/AjaxLoader.gif',
            './css/grabbing.png',
            './css/grabbing.png',
            './css/img/magnifier.svg'
        ])
        .pipe(gulp.dest("./minified/images"));
});

gulp.task('fonts', function(){
    gulp.src([
            './fonts/icons/bytbil/bytbil-icons.eot',
            './fonts/icons/bytbil/bytbil-icons.woff',
            './fonts/icons/bytbil/bytbil-icons.ttf',
            './fonts/icons/bytbil/bytbil-icons.svg',
            './fonts/icons/fontawesome/fonts/fontawesome-webfont.eot',
            './fonts/icons/fontawesome/fonts/fontawesome-webfont.woff',
            './fonts/icons/fontawesome/fonts/fontawesome-webfont.ttf',
            './fonts/icons/fontawesome/fonts/fontawesome-webfont.svg',
            './fonts/flexslider-icon.eot',
            './fonts/flexslider-icon.woff',
            './fonts/flexslider-icon.ttf',
            './fonts/flexslider-icon.svg',
            './fonts/glyphicons-halflings-regular.eot',
            './fonts/glyphicons-halflings-regular.woff',
            './fonts/glyphicons-halflings-regular.ttf',
            './fonts/glyphicons-halflings-regular.svg',
            './fonts/helvetica-neue/HelveticaNeueLTStd*',
            './fonts/volvo/VolvoB*',
            './fonts/volvo/VolvoS*',
            './fonts/renault/Helvetica*',
            './fonts/ford/FordAntenna*',
            './fonts/dacia/neo*'
        ])
        .pipe(gulp.dest("./minified/fonts"))
});

gulp.task('css', function () {
    gulp.src(cssFiles)
        //.pipe(csslint())
        //.pipe(csslint.reporter(stylish))
        .pipe(concat('style.min.css'))
        .pipe(minifyCss())
        .pipe(gulp.dest('./minified/css'));
});

gulp.task('cssClean', function () {
    gulp.src(cssFilesClean)
        .pipe(concat('clean.style.min.css'))
        .pipe(minifyCss())
        .pipe(gulp.dest('./minified/css'));
});

gulp.task('js', function(){
    gulp.src(jsFiles)
        .pipe(jshint())
        .pipe(jshint.reporter(stylish))
        .pipe(concat('scripts.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./minified/js'));
});

gulp.task('jsVersion', function(){
    var newVersion = makeid();
    gulp.src(['footer.php'])
        .pipe(replace(/(scripts.min.js\?ver=)(\w*)/g, '$1'+ newVersion))
        .pipe(gulp.dest('./'));
});

gulp.task('cssVersion', function(){
    var newVersion = makeid();
    gulp.src(['header.php'])
        .pipe(replace(/(style.min.css\?ver=)(\w*)/g, '$1'+ newVersion))
        .pipe(gulp.dest('./'));
    gulp.src(['page-myfavorites.php'])
        .pipe(replace(/(style.min.css\?ver=)(\w*)/g, '$1'+ newVersion))
        .pipe(gulp.dest('./'));
});

gulp.task('watch', function(){
    gulp.watch(jsFiles, ['js']);
    gulp.watch(cssFiles, ['css']);
});



gulp.task('build', ['css', 'cssClean', 'cssVersion', "fonts", "images", "js", "jsVersion"]);

gulp.task('default', ['build', 'watch']);

function makeid()
{
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for( var i=0; i < 20; i++ )
        text += possible.charAt(Math.floor(Math.random() * possible.length));

    return text;
}