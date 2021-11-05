@extends('layouts.master')
@section('content')
	<div class="section">
		<div class="row">
			<h1>404</h1>
			<p>{{ esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'theme-slug' ); }}</p>

			@php
				get_search_form();
				the_widget( 'WP_Widget_Recent_Posts' );
			@endphp

			<div class="widget widget_categories">
				<h2 class="widget-title">
					{{ esc_html_e( 'Most Used Categories', 'theme-slug' ); }}
				</h2>
				<ul>
					@php
						wp_list_categories( array(
							'orderby'    => 'count',
							'order'      => 'DESC',
							'show_count' => 1,
							'title_li'   => '',
							'number'     => 10,
						) );
					@endphp
				</ul>
			</div>

			@php
				/* translators: %1$s: smiley */
				$theme_slug_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'theme-slug' ), convert_smilies( ':)' ) ) . '</p>';
				the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$theme_slug_archive_content" );
				the_widget( 'WP_Widget_Tag_Cloud' );
			@endphp
		</div>
	</div>
@endsection
