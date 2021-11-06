{{-- /**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Theme_Name
 */ --}}

@extends('layouts.master')
@section('content')
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			@if ( have_posts() )
				<header class="page-header">
					@php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
					@endphp
				</header>

				@while ( have_posts() )
					@php
						the_post();

						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_type() );
					@endphp
				@endwhile

				@php
					the_posts_navigation();
				@endphp
			@else
				@php
					get_template_part( 'template-parts/content', 'none' );
				@endphp
			@endif
		</main>
	</div>
@endsection
