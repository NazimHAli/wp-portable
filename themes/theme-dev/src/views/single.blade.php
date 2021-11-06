{{--
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Theme_Name
 */
 --}}

@extends('layouts.master')
@section('content')
	<p>single.php</p>
	@while ( have_posts() )
		@php
			the_post();
			get_template_part( 'template-parts/content', get_post_type() );
		@endphp
		
		@if ( comments_open() || get_comments_number() )
			@php
				comments_template();
			@endphp
		@endif
	@endwhile
@endsection