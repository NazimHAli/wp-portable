{{-- 
	 * The template for displaying the blog
--}}

@extends('layouts.master')
@section('content')
	<p>page-blog.php</p>

	@include('includes.page-content-from-admin')

	@php
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$posts_per_page = 4;

		$args = array(
		  'posts_per_page' => $posts_per_page,
		  'paged' => $paged,
		  'post_type' => 'post'
		);
		$wp_query = new WP_Query( $args );
	@endphp

	@if ( $wp_query->have_posts() )

		@while ($wp_query -> have_posts())
			{{ $wp_query -> the_post() }}
			<a href="{{ the_permalink() }}">
				<div class="section blog-page">
					@if (has_post_thumbnail())
						<span>{{ the_post_thumbnail() }}</span>
					@endif

					<h3>{{ the_title() }}</h3>
					<p>{{ the_content() }}</p>
				</div>
			</a>
		@endwhile

		@if (function_exists("blog_posts_pagination"))
			<div class="row">
	  			{{ blog_posts_pagination($wp_query->max_num_pages, $posts_per_page) }}
			</div>
		@endif
	@else
		<p>{{ e( 'Sorry, no posts matched your criteria.' ) }}</p>
	@endif
@endsection
