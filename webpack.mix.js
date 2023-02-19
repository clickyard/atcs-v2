const mix = require('laravel-mix');
mix.webpackConfig({
    stats: {
        children: true,
    },});

    
mix.js('resources/js/app.js', 'public/js/all.js');

mix.sass('resources/sass/app.scss', 'public/css/all.css')
   .postCss('resources/css/app.css', 'public/css/all.css');

  
   

   mix.sass('public/assets/css-rtl/sidemenu.scss', 'public/css/all.css')
        .styles([
            'public/assets/css/icons.css',
            'public/assets/plugins/mscrollbar/jquery.mCustomScrollbar.css',
            'public/assets/plugins/mscrollbar/jquery.mCustomScrollbar.css',
            'public/assets/plugins/sidebar/sidebar.css',
            'public/assets/css-rtl/sidemenu.css',
            'public/assets/css-rtl/style.css',
            'public/assets/css-rtl/style-dark.css',
            'public/assets/css-rtl/skin-modes.css',
           // 'public/assets/css-rtl/print.css'
           ////////////////////////////////////////////////
           'public/assets/plugins/datatable/css/dataTables.bootstrap4.min.css',
            'public/assets/plugins/datatable/css/buttons.bootstrap4.min.css',
            'public/assets/plugins/datatable/css/responsive.bootstrap4.min.css',
            'public/assets/plugins/datatable/css/jquery.dataTables.min.css',
            'public/assets/plugins/datatable/css/responsive.dataTables.min.css',
            'public/assets/plugins/select2/css/select2.min.css',
            ///////////////////////////////////////////////////////////
    ],
    'public/css/all.css');
    //mix.sass('public/assets/css-rtl/style.scss', 'public/css/all.css')
     //    sass('public/assets/css-rtl/sidemenu.scss', 'public/css/all.css'); 
 /* 
    mix.styles([
        'public/assets/plugins/datatable/css/dataTables.bootstrap4.min.css',
        'public/assets/plugins/datatable/css/buttons.bootstrap4.min.css',
        'public/assets/plugins/datatable/css/responsive.bootstrap4.min.css',
        'public/assets/plugins/datatable/css/jquery.dataTables.min.css',
        'public/assets/plugins/datatable/css/responsive.dataTables.min.css',
        'public/assets/plugins/select2/css/select2.min.css'

    ], 
    'public/css/plugin.css');     
*/
mix.scripts([
    'public/assets/plugins/jquery/jquery.min.js',
    'public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js',
    'public/assets/plugins/ionicons/ionicons.js',
    'public/assets/plugins/moment/moment.js',
    'public/assets/plugins/rating/jquery.rating-stars.js',
    'public/assets/plugins/rating/jquery.barrating.js',
    'public/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js',
    'public/assets/plugins/perfect-scrollbar/p-scroll.js',
    'public/assets/plugins/jquery-sparkline/jquery.sparkline.min.js',
    'public/assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js',
    'public/assets/plugins/sidebar/sidebar-rtl.js',
    'public/assets/plugins/sidebar/sidebar-custom.js',
    'public/assets/js/eva-icons.min.js',
    'public/assets/js/sticky.js',
    'public/assets/js/custom.js',
    'public/assets/plugins/side-menu/sidemenu.js',
    ///////////////////////////////////////////////////////////////
    'public/assets/plugins/datatable/js/jquery.dataTables.min.js',
    'public/assets/plugins/datatable/js/dataTables.dataTables.min.js',
    'public/assets/plugins/datatable/js/dataTables.responsive.min.js',
    'public/assets/plugins/datatable/js/responsive.dataTables.min.js',
    'public/assets/plugins/datatable/js/jquery.dataTables.js',
    'public/assets/plugins/datatable/js/dataTables.bootstrap4.js',
    'public/assets/plugins/datatable/js/dataTables.buttons.min.js',
    'public/assets/plugins/datatable/js/buttons.bootstrap4.min.js',
    'public/assets/plugins/datatable/js/buttons.html5.min.js',
    'public/assets/plugins/datatable/js/buttons.colVis.min.js',
    'public/assets/plugins/datatable/js/dataTables.responsive.min.js',
    'public/assets/plugins/datatable/js/responsive.bootstrap4.min.js',
    'public/assets/js/table-data.js',
    'public/assets/js/modal.js',
    ////////////////////////////////////////////////////////////////////////
    'public/assets/plugins/jquery-steps/jquery.steps.min.js',
    'public/assets/plugins/parsleyjs/parsley.min.js',
    'public/assets/js/form-wizard.js',
    'public/assets/plugins/select2/js/select2.min.js',
    'public/assets/js/advanced-form-elements.js',
    'public/assets/js/select2.js',
    'public/assets/plugins/jquery-ui/ui/widgets/datepicker.js',
    'public/assets/plugins/jquery.maskedinput/jquery.maskedinput.js',
    'public/assets/plugins/spectrum-colorpicker/spectrum.js'

], 'public/js/all.js');
/*
mix.scripts([
    'public/assets/plugins/datatable/js/jquery.dataTables.min.js',
    'public/assets/plugins/datatable/js/dataTables.dataTables.min.js',
    'public/assets/plugins/datatable/js/dataTables.responsive.min.js',
    'public/assets/plugins/datatable/js/responsive.dataTables.min.js',
    'public/assets/plugins/datatable/js/jquery.dataTables.js',
    'public/assets/plugins/datatable/js/dataTables.bootstrap4.js',
    'public/assets/plugins/datatable/js/dataTables.buttons.min.js',
    'public/assets/plugins/datatable/js/buttons.bootstrap4.min.js',
    'public/assets/plugins/datatable/js/buttons.html5.min.js',
    'public/assets/plugins/datatable/js/buttons.colVis.min.js',
    'public/assets/plugins/datatable/js/dataTables.responsive.min.js',
    'public/assets/plugins/datatable/js/responsive.bootstrap4.min.js',
    'public/assets/js/table-data.js',
    'public/assets/js/modal.js'

], 'public/js/plugin.js');

mix.scripts([
    'public/assets/plugins/jquery-steps/jquery.steps.min.js',
    'public/assets/plugins/parsleyjs/parsley.min.js',
    'public/assets/js/form-wizard.js',
    'public/assets/plugins/select2/js/select2.min.js',
    'public/assets/js/advanced-form-elements.js',
    'public/assets/js/select2.js',
    'public/assets/plugins/jquery-ui/ui/widgets/datepicker.js',
    'public/assets/plugins/jquery.maskedinput/jquery.maskedinput.js',
    'public/assets/plugins/spectrum-colorpicker/spectrum.js'
  

], 'public/js/steps.js');
*/
mix.copyDirectory('public/assets/img', 'public/img');

 mix.options({
//   extractVueStyles: false, // Extract .vue component styling to file, rather than inline.
//   processCssUrls: true, // Process/optimize relative stylesheet url()'s. Set to false, if you don't want them touched.
//   purifyCss: false, // Remove unused CSS selectors.
//   uglify: {}, // Uglify-specific options. https://webpack.github.io/docs/list-of-plugins.html#uglifyjsplugin
//   postCss: [] // Post-CSS options: https://github.com/postcss/postcss/blob/master/docs/plugins.md
 });