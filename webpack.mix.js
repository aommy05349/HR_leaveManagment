let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */


 mix.scripts([ 'node_modules/jquery/dist/jquery.js',
               'node_modules/js-base64/.attic/test-moment/moment.js',
               'node_modules/datatables.net/js/jquery.dataTables.js',
               'node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js',
            ], 'public/js/library.js');

mix .scripts( 'resources/assets/js/datatable.js','public/js/datatable/datatable.js') //
    .scripts( 'resources/assets/js/leavehistory.js','public/js/datatable/leavehistory.js') //
    .scripts( 'resources/assets/js/cheackLeave.js','public/js/datatable/cheackLeave.js') //
    .scripts( 'resources/assets/js/leaveApphistory.js','public/js/datatable/leaveApphistory.js') //
    .scripts( 'resources/assets/js/user.js','public/js/datatable/user.js') //
    .scripts( 'resources/assets/js/dropzone.js','public/js/datatable/dropzone.js') //
    .scripts( 'resources/assets/js/vendor.bundle.addons.js','public/js/vendor.bundle.addons.js')
    .scripts( 'resources/assets/js/vendor.bundle.base.js','public/js/vendor.bundle.base.js')
    .scripts( 'resources/assets/js/misc.js','public/js/misc.js')
    .scripts( 'resources/assets/js/jquery.datetimepicker.full.js','public/js/jquery.datetimepicker.full.js')
    .scripts( 'resources/assets/js/off-canvas.js','public/js/off-canvas.js')
    .scripts( 'resources/assets/js/file.js','public/js/file.js')
    .scripts( 'resources/assets/js/profile.js','public/js/datatable/profile.js')
    .scripts( 'resources/assets/js/jquery.form.validator.min.js','public/js/jquery.form.validator.min.js')
    .scripts( 'resources/assets/js/security.js','public/js/security.js')
    .scripts( 'resources/assets/js/special-char.js','public/js/special-char.js')
    .scripts( 'resources/assets/js/employee/employee.js','public/js/datatable/employee.js')
    .scripts( 'resources/assets/js/leave.js','public/js/datatable/leave.js')
    .scripts( 'resources/assets/js/jquery-1.10.2.js','public/js/jquery-1.10.2.js')//<------------
    .scripts( 'resources/assets/js/jquery-ui-1.10.4.custom.min.js','public/js/jquery-ui-1.10.4.custom.min.js')//<------------
    .scripts( 'resources/assets/js/app.js','public/js/app.js')
    .scripts( 'resources/assets/js/sweetalert2.all.min.js','public/js/sweetalert2.all.min.js');
  

mix.sass('resources/assets/sass/app.scss', 'public/css');

mix.styles('resources/assets/sass/materialdesignicons.css','public/css/materialdesignicons.css')
   .styles('resources/assets/sass/font-awesome.css','public/css/font-awesome.css')

   .styles('resources/assets/sass/vendor.bundle.addons.css','public/css/vendor.bundle.addons.css')
   .styles('resources/assets/sass/vendor.bundle.base.css','public/css/vendor.bundle.base.css')
   .styles('resources/assets/sass/style.css','public/css/style.css')
   .styles('resources/assets/sass/jquery.datetimepicker.min.css','public/css/jquery.datetimepicker.min.css')
   .styles('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css','public/css/dataTables.bootstrap4.min.css')
   .styles('resources/assets/css/jquery-ui-1.10.4.custom.min.css','public/css/jquery-ui-1.10.4.custom.min.css')//<------------
   .styles('resources/assets/css/sweetalert2.min.css','public/css/sweetalert2.min.css');//<------------

mix.copyDirectory('resources/assets/fonts', 'public/fonts');
