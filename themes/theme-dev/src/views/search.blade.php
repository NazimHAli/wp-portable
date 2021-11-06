
{{--/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Theme_Name
 */--}}
@extends('layouts.master')
@section('content')
	<p>search.php</p>
	
	@if ( have_posts() )
		<header class="page-header">
			<h1 class="page-title">
				@php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'theme-slug' ), '<span>' . get_search_query() . '</span>' );
				@endphp
			</h1>
		</header>

		{{-- /* Start the Loop */ --}}
		@include('includes.page-content-from-admin')

		@php
			the_posts_navigation();
		@endphp

	@else
		@php
			get_template_part( 'template-parts/content', 'none' );
		@endphp
	@endif
@endsection
