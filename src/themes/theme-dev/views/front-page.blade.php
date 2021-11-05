{{-- /**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 */ --}}

@extends('layouts.master')

@section('hero-content')
	<p>front-page.php</p>
	<div class="row">
		@component('components.slider')
			@slot('button')
				Meow
			@endslot
		@endcomponent
	</div>
@endsection

@section('content')
	<div class="section">
		<div class="row">
			<div class="col s12 m4">
				@component('components.card')
					@slot('imageSRC')
					    {{ get_template_directory_uri() }}/images/slider_backgrounds/1.jpg
					@endslot
					@slot('title')
						Card 1: Title
					@endslot
					@slot('linkText')
						Card 1 Link
					@endslot
				@endcomponent
			</div>
			<div class="col s12 m4">
				@component('components.card')
					@slot('imageSRC')
					    {{ get_template_directory_uri() }}/images/slider_backgrounds/1.jpg
					@endslot
					@slot('title')
						Card 2: Title
					@endslot
					@slot('linkText')
						Card 2 Link
					@endslot
				@endcomponent
			</div>
			<div class="col s12 m4">
				@component('components.card')
					@slot('imageSRC')
					    {{ get_template_directory_uri() }}/images/slider_backgrounds/1.jpg
					@endslot
					@slot('title')
						Card 3: Title
					@endslot
					@slot('linkText')
						Card 3 Link
					@endslot
				@endcomponent
			</div>
		</div>
	</div>
	<div class="section">
		<div class="row">
			<div class="col s12 m4">
				@component('components.iconblock')
					@slot('icon')
						flash_on
					@endslot
					@slot('title')
						Speeds up development
					@endslot
					@slot('paragraphText')
					    We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components. Additionally, we refined animations and transitions to provide a smoother experience for developers.
					@endslot
				@endcomponent
			</div>
			<div class="col s12 m4">
				@component('components.iconblock')
					@slot('icon')
						group
					@endslot
					@slot('title')
						User Experience Focused
					@endslot
					@slot('paragraphText')
					    We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components. Additionally, we refined animations and transitions to provide a smoother experience for developers.
					@endslot
				@endcomponent
			</div>
			<div class="col s12 m4">
				@component('components.iconblock')
					@slot('icon')
						settings
					@endslot
					@slot('title')
						Easy to work with
					@endslot
					@slot('paragraphText')
					    We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components. Additionally, we refined animations and transitions to provide a smoother experience for developers.
					@endslot
				@endcomponent
			</div>
		</div>
	</div>
	@include('sidebar')
@endsection
