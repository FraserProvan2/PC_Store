var gulp = require('gulp')
var autoprefixer = require('gulp-autoprefixer')
var cleanCSS = require('gulp-clean-css')
var concat = require('gulp-concat')
var data = require('gulp-data')
var rename = require('gulp-rename')
var sass = require('gulp-sass')
var sourcemaps = require('gulp-sourcemaps')
var twig = require('gulp-twig')
var uglify = require('gulp-uglify')
var filter = require('gulp-filter')
var clean = require('gulp-clean')
var fs = require('fs')

// Copy required modules from 'node_modules' to 'plugins'
gulp.task('plugins', function () {
  // Bootstrap
  gulp.src('node_modules/bootstrap/dist/css/**/*').pipe(gulp.dest('plugins/bootstrap/css'))
  gulp.src('node_modules/bootstrap/dist/js/**/*').pipe(gulp.dest('plugins/bootstrap/js'))

  // jQuery
  gulp.src([
    'node_modules/jquery/dist/jquery.js',
    'node_modules/jquery/dist/jquery.min.js'
  ]).pipe(gulp.dest('plugins/jquery'))

  // Perfect Scrollbar
  gulp.src('node_modules/perfect-scrollbar/css/perfect-scrollbar.css').pipe(gulp.dest('plugins/perfect-scrollbar'))
    .pipe(cleanCSS()).pipe(rename({ suffix: '.min' })).pipe(gulp.dest('plugins/perfect-scrollbar'))
  gulp.src(['node_modules/perfect-scrollbar/dist/perfect-scrollbar.js', 'node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js'])
    .pipe(gulp.dest('plugins/perfect-scrollbar'))

  // Feather Icons
  gulp.src([
    'node_modules/feather-icons/dist/feather.js',
    'node_modules/feather-icons/dist/feather.min.js'
  ]).pipe(gulp.dest('plugins/feather-icons'))

  // Metismenu
  gulp.src('node_modules/metismenu/dist/*.{css,js}').pipe(gulp.dest('plugins/metismenu'))

  // Card (credit card for checkout)
  gulp.src('node_modules/card/dist/card.css').pipe(gulp.dest('plugins/card'))
    .pipe(cleanCSS()).pipe(rename({ suffix: '.min' })).pipe(gulp.dest('plugins/card'))
  gulp.src(['node_modules/card/dist/card.js', 'node_modules/card/dist/jquery.card.js']).pipe(gulp.dest('plugins/card'))
    .pipe(uglify()).pipe(rename({ suffix: '.min' })).pipe(gulp.dest('plugins/card'))

  // noUiSlider
  gulp.src('node_modules/nouislider/distribute/**/*').pipe(gulp.dest('plugins/nouislider'))

  // Photoswipe
  gulp.src('node_modules/photoswipe/dist/photoswipe.css').pipe(gulp.dest('plugins/photoswipe')).pipe(cleanCSS()).pipe(rename({ suffix: '.min' })).pipe(gulp.dest('plugins/photoswipe'))
  gulp.src('node_modules/photoswipe/dist/default-skin/*.*').pipe(gulp.dest('plugins/photoswipe/photoswipe-default-skin'))
  gulp.src('node_modules/photoswipe/dist/default-skin/default-skin.css').pipe(cleanCSS()).pipe(rename({ suffix: '.min' })).pipe(gulp.dest('plugins/photoswipe/photoswipe-default-skin'))
  gulp.src(['node_modules/photoswipe/dist/photoswipe.js', 'node_modules/photoswipe/dist/photoswipe.min.js']).pipe(gulp.dest('plugins/photoswipe'))
  gulp.src(['node_modules/photoswipe/dist/photoswipe-ui-default.js', 'node_modules/photoswipe/dist/photoswipe-ui-default.min.js']).pipe(gulp.dest('plugins/photoswipe'))

  // Swiper
  gulp.src(['node_modules/swiper/dist/css/swiper.css', 'node_modules/swiper/dist/css/swiper.min.css']).pipe(gulp.dest('plugins/swiper'))
  gulp.src(['node_modules/swiper/dist/js/swiper.js', 'node_modules/swiper/dist/js/swiper.min.js']).pipe(gulp.dest('plugins/swiper'))

  // Card (credit card for checkout)
  gulp.src('node_modules/card/dist/**/*').pipe(gulp.dest('plugins/card'))
  gulp.src('node_modules/card/dist/jquery.card.js').pipe(uglify()).pipe(rename({ suffix: '.min' })).pipe(gulp.dest('plugins/card'))

  // Noty
  gulp.src('node_modules/noty/lib/*.js').pipe(gulp.dest('plugins/noty'))
  gulp.src('node_modules/noty/lib/noty.css').pipe(gulp.dest('plugins/noty'))
    .pipe(cleanCSS()).pipe(rename({ suffix: '.min' })).pipe(gulp.dest('plugins/noty'))
  gulp.src('node_modules/noty/lib/themes/*.css').pipe(gulp.dest('plugins/noty/themes'))
    .pipe(cleanCSS()).pipe(rename({ suffix: '.min' })).pipe(gulp.dest('plugins/noty/themes'))

  // Autosize
  gulp.src(['node_modules/autosize/dist/autosize.js', 'node_modules/autosize/dist/autosize.min.js']).pipe(gulp.dest('plugins/autosize'))

  // jQuery Countdown
  gulp.src(['node_modules/jquery-countdown/dist/jquery.countdown.js', 'node_modules/jquery-countdown/dist/jquery.countdown.min.js']).pipe(gulp.dest('plugins/jquery-countdown'))
})

// REQUIRED VENDOR CSS: FONT, BOOTSTRAP, METISMENU, PERFECT-SCROLLBAR  -->
gulp.task('vendor', function () {
  return gulp.src('src/scss/vendor.scss')
    .pipe(sourcemaps.init())
    .pipe(sass({ outputStyle: 'expanded' }).on('error', sass.logError)) // compile scss
    .pipe(autoprefixer({ browsers: ['last 2 versions'], cascade: false })) // autoprefix
    .pipe(sourcemaps.write('.')) // write sourcemap
    .pipe(gulp.dest('dist/css')) // move to dist/css
    .pipe(cleanCSS()).pipe(rename({ suffix: '.min' })) // minify & rename
    .pipe(filter(['**', '!dist/css/vendor.css.min.map'])) // ignore minified sourcemap
    .pipe(gulp.dest('dist/css')) // move minified result
})

// Compile 'twig' to 'html'
gulp.task('html', function () {
  return gulp.src('src/twig/[^_]*.twig')
    .pipe(data(function () {
      return JSON.parse(fs.readFileSync('src/twig/data.json'))
    }))
    .pipe(twig())
    .pipe(gulp.dest('html'))
})

// Compile 'scss' to 'css'
gulp.task('css', function () {
  return gulp.src('src/scss/style.scss')
    .pipe(sourcemaps.init())
    .pipe(sass({ outputStyle: 'expanded' }).on('error', sass.logError)) // compile scss
    .pipe(autoprefixer({ browsers: ['last 2 versions'], cascade: false })) // autoprefix
    .pipe(sourcemaps.write('.')) // write sourcemap
    .pipe(gulp.dest('dist/css')) // move to dist/css
    .pipe(cleanCSS()).pipe(rename({ suffix: '.min' })) // minify & rename
    .pipe(filter(['**', '!dist/css/style.css.min.map'])) // ignore minified sourcemap
    .pipe(gulp.dest('dist/css')) // move minified result
})

// Concat js
gulp.task('js', function () {
  return gulp.src('src/js/*.js')
    .pipe(concat('script.js')) // concat
    .pipe(gulp.dest('dist/js/'))
    .pipe(uglify()).pipe(rename({ suffix: '.min' })).pipe(gulp.dest('dist/js')) // minify & rename
})

// Watch changes
gulp.task('watch', function () {
  gulp.watch(['src/scss/vendor.scss', 'src/scss/_variables-vendor.scss'], ['vendor'])
  gulp.watch('src/twig/data.json', ['html'])
  gulp.watch('src/twig/*.twig', ['html'])
  gulp.watch(['src/scss/*.scss', '!src/scss/vendor.scss'], ['css'])
  gulp.watch('src/js/*.js', ['js'])
})

// Clean
gulp.task('clean', function () {
  return gulp.src(['plugins', 'dist', 'html'], { read: false })
    .pipe(clean())
})

// Default task
gulp.task('default', ['clean'], function () {
  gulp.start('plugins', 'vendor', 'html', 'css', 'js')
})
