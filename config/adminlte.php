<?php

//$id= $equipo->id;  
/*foreach($id as $i){
    $id=$i['id'];
} */

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => 'AdminLTE 3',
    'title_prefix' => '',
    'title_postfix' => '',
    
    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => true,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Google Fonts
    |--------------------------------------------------------------------------
    |
    | Here you can allow or not the use of external google fonts. Disabling the
    | google fonts may be useful if your admin panel internet access is
    | restricted somehow.
    |
    | For detailed instructions you can look the google fonts section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'google_fonts' => [
        'allowed' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '<b>Río Grande </b> S.A.',
    'logo_img' => 'img/imagenes/LogoIngenio2.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'BasalMant',

    /*
    |--------------------------------------------------------------------------
    | Authentication Logo
    |--------------------------------------------------------------------------
    |
    | Here you can setup an alternative logo to use on your login and register
    | screens. When disabled, the admin panel logo will be used instead.
    |
    | For detailed instructions you can look the auth logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'auth_logo' => [
        'enabled' => false,
        'img' => [
            'path' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
            'alt' => 'Auth Logo',
            'class' => '',
            'width' => 50,
            'height' => 50,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Preloader Animation
    |--------------------------------------------------------------------------
    |
    | Here you can change the preloader animation configuration.
    |
    | For detailed instructions you can look the preloader section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'preloader' => [
        'enabled' => False,
        'img' => [
            'path' => 'img\imagenes\LogoIngenio2.png',
            'alt' => 'AdminLTE Preloader Image',
            'effect' => '',
            'width' => 260,
            'height' => 260,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => true,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => true,
    'layout_fixed_sidebar' => true,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => 'bg-white',
    'classes_brand_text' => 'text-danger',
    'classes_content_wrapper' => 'bg-dark',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => 'admin',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'menu' => [
        // Navbar items:
        
        
        [
            'text'         => 'Inicio',
             'route'       => 'home',
             'icon'        => 'fas fa-fw fa-home',
            'topnav' => true,
        ],

        [
            'text'         => 'Equipos',
             'route'       => 'equipos.index',
            'topnav_right' => true,
        ],

        [
            'text'         => 'Planes',
             'route'       => 'plans.index',
            'topnav_right' => true,
        ],

                
        [
            'text'         => 'P.d.M.',
            'route'       => 'protocolos.index',
            'topnav_right' => true,
        ],

        [
            'text'         => 'Tareas',
            'route'       => 'tareas.index',
            'topnav_right' => true,
        ],
        
        [
            'text'         => 'O.d.T.',
             'route'       => 'ordentrabajo.index',
            'topnav_right' => true,
        ],

        [
            'text'         => 'Repuestos',
             'route'       => 'repuestos.index',
            'topnav_right' => true,
        ],

        [
            'text'         => 'Seguimientos',
             'route'       => 'menu_seguimientos.index',
            'topnav_right' => true,
        ],

        [
            'text'         => 'Estadisticas',
             'route'       => 'Estadistica.index',
            'topnav_right' => true,
        ],

        [
            'text'         => 'gantt',
             'route'       => 'gantt',
            'topnav_right' => true,
        ],
        
        [
            'type'         => 'navbar-search',
            'text'         => 'search',
            'topnav_right' => false,
        ],
        

        [
            'type'         => 'fullscreen-widget',
            'topnav_right' => true,
        ],

        // Sidebar items:
        /*[
            'type' => 'sidebar-menu-search',
            'text' => 'search',
        ], 
        [
            'text' => 'blog',
            'url'  => 'admin/blog',
            'can'  => 'manage-blog',
        ],
        [
            'text'        => 'pages',
            'url'         => 'admin/pages',
            'icon'        => 'far fa-fw fa-file',
            'label'       => 4,
            'label_color' => 'success',
        ],
        ['header' => 'account_settings'],
        [
            'text' => 'profile',
            'url'  => 'admin/settings',
            'icon' => 'fas fa-fw fa-user',
        ],
        [
            'text' => 'change_password',
            'url'  => 'admin/settings',
            'icon' => 'fas fa-fw fa-lock',
        ],"Quitar opciones de  menus "*/ 
        [
            'text'    => 'Lubricaciones',
            'icon'    => 'fas fa-fw fa-share',
            'icon_color' => 'cyan',
            'submenu' => [
                [
                    'text' => 'Crear punto',
                    'icon' => 'fa-solid fa-clipboard',
                    'route'=> 'lubricacion.create',
                ],
                [
                    'text' => 'Listado',  //protocolo
                    'icon' => 'fa-solid fa-file-invoice',
                    'route'=> 'lubricacion.index',
                ],
                
                [
                    'text' => 'Planilla de seguimiento',
                    'icon' => 'fa-solid fa-list',
                    'route'=> 'equipoLubricacion.index',
                    
                ],
                 
         

                /*FOTOS[
                    'text'    => 'Fotos',
                    'url'     => '#',
                    'submenu' => [
                        [
                            'text' => 'level_two',
                            'url'  => '#',
                        ],
                        [
                            'text'    => 'level_two',
                            'url'     => '#',
                            'submenu' => [
                                [
                                    'text' => 'level_three',
                                    'url'  => '#',
                                ],
                                [
                                    'text' => 'level_three',
                                    'url'  => '#',
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'text' => 'level_one',
                    'url'  => '#',
                ], FOTOS*/
            ],
        ],
        [
            'text'    => 'Alarmas',
            'icon'    => 'fa fa-exclamation-triangle',
            'icon_color' => 'cyan',
            'submenu' => [
                [
                    'text' => 'O.d.T: Vencidas',
                    'icon' => 'fa-solid fa-clipboard',
                    'route'=> 'mostrar.alarmas',
                ],
                [
                    'text' => 'Equipos: Sin completar',
                    'icon' => 'fa-solid fa-clipboard',
                    'route'=> 'lubricacion.create',
                ],
                [
                    'text' => 'Planes: No ejecutados',
                    'icon' => 'fa-solid fa-clipboard',
                    'route'=> 'lubricacion.create',
                ],
                 
        
            ],
        ],


        [
            'text'    => 'Proyectos',
            'icon'    => 'fa fa-exclamation-triangle',
            'icon_color' => 'cyan',
            'submenu' => [
                [
                    'text' => 'Nuevo',
                    'icon' => 'fa-solid fa-clipboard',
                    'route'=> 'proyectos.create',
                ],
                [
                    'text' => 'Listar',
                    'icon' => 'fa-solid fa-clipboard',
                    'route'=> 'lubricacion.create',
                ],
                              
        
            ],
        ],
        








        ['header' => 'Acerca de:'],
        [
            'text'       => 'Nosotros',
            'icon_color' => 'red',
            'route'      => 'nosotros', // la ruta la generé yo
        ],
        [
            'text'       => 'Versión',
            'url'        => '#',
        ],
        [
            'text'       => 'Ayuda',
            'icon_color' => 'cyan',
            'url'        => '#',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'dataprint\bootstrap\js\bootstrap.bundle.min.js', //icono lapiz, ojo y otros
                ], 
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'dataprint/bootstrap/js/bootstrap.min.js',
                ], 
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'dataprint/datatables/datatables.min.css',
                ],
                
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js', //QUEDA PENDIENTE PARA LOCAL
                ],

               
                
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'dataprint/jquery/jquery-3.3.1.min.js',
                ],
                
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'dataprint/popper/popper.min.js',
                ],
                 
                
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'dataprint/datatables/datatables.min.js',
                ],

                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'dataprint/datatables/Buttons-1.5.6/js/dataTables.buttons.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'dataprint/datatables/JSZip-2.5.0/jszip.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'dataprint/datatables/pdfmake-0.1.36/pdfmake.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'dataprint/datatables/pdfmake-0.1.36/vfs_fonts.js',
                ],
                
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'dataprint/datatables/Buttons-1.5.6/js/buttons.html5.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'dataprint/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css',
                ],
             
                
                 
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'dataprint\twbs\bootstrap-icons\font\bootstrap-icons.css', //icono lapiz, ojo y otros
                ],
                
               
                



                
                
              //  <script type="text/javascript" src="{{asset('dataprint/main.js')}}"></script>
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'dataprint/main.js', //Codigo montorfano para config datatables public/dataprint/main.js  
                ],
                
                //  <script type="text/javascript" src="{{asset('dataprint/main.js')}}"></script>
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'dataprint/main1.js', //Codigo montorfano para config datatables public/dataprint/main.js  
                ],
                
              
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false, //false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@10',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    |
    | Here we change the IFrame mode configuration. Note these changes will
    | only apply to the view that extends and enable the IFrame mode.
    |
    | For detailed instructions you can look the iframe mode section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
    |
    */

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'livewire' => false,
];
