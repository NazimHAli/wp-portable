{{--The sidebar containing the main widget area
 @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 @package Theme_Name--}}
<p>sidebar.php</p>

@if ( is_active_sidebar( 'sidebar-1' ) )
	<aside id="secondary" class="widget-area">
		{{ dynamic_sidebar( 'sidebar-1' ) }}
	</aside>
@endif
