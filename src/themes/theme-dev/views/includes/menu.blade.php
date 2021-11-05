@php
    wp_nav_menu(
      array(
        'menu_id'=> 'primary-menu',
        // 'menu_class' => 'menu-class',
        'container_class' => 'menu-class',
        'items_wrap' => '<ul id="'.$ulID.'" class="'.$ulClasses.'">%3$s</ul>'
      )
    );
@endphp
