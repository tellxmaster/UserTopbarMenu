<?php 
/**
 * Plugin Name: UserMenuTopbar
 * Plugin URI: https://github.com/tellxmaster/UserTopbarMenu
 * Description: Este plugin fue diseñado para mostrar un menú de usuario en la parte superior de la página del proyecto Prowess Agricola.
 * Version: 1.0.0
 * Author: tellxmaster
 * Author URI: https://github.com/tellxmaster
 * License: GPL2
 */

 

add_shortcode( "show_user_menu", function($atts, $content){
	    global $current_user, $user_login;
        wp_get_current_user();
        add_filter('widget_text', 'apply_shortcodes');

        if ($user_login)
        {
            $user_menu = 
            '
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <div  id="user_menu" class="row">
                <div id="menu">
                    <div class="img">
                        <img class="usuario_url_topbar"  src="'.get_avatar_url(get_current_user_id()).'" alt="">
                    </div>
                    <div class="user">
                        <span style="padding: 10px;" class="text-light"> '.$current_user->display_name.' </span>
                    </div>
                </div>
                <div id="menu-items" class="col">
                    <ul class="list-group" style="list-style: none; width: 200px;">
                        <li><a href="https://prowessagrec.com/mi-cuenta/" class="text-dark text-decoration-none list-group-item list-group-item-action text-center"><i class="fa-solid fa-user"></i> Perfil</a></li>
                        <li><a href="https://prowessagrec.com/dashboard/settings/store/" class="text-dark text-decoration-none list-group-item list-group-item-action text-center"><i class="fa-solid fa-pen-to-square"></i> Editar</a></li>
                        <li><a href="'.wp_logout_url('https://prowessagrec.com/',false).'" class="text-dark text-decoration-none list-group-item list-group-item-action text-center"><i class="fa-solid fa-arrow-right-from-bracket"></i> Salir</a></li>
                    </ul>
                </div>
            </div>
            ';
        }else
        {
            $user_menu = 
            '
                <div  id="user_menu" class="row d-flex" style="max-width: 200px; margin-left: 30px;">
					<a id="access" href="https://prowessagrec.com/mi-cuenta">
                    	<span id="btn-access">
							Ingresar
						</span>
					</a>
                </div>
            ';
        }
        return $user_menu;
});

?>
