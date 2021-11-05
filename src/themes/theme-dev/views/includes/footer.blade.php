<footer class="page-footer orange">
	<div class="container">
		<div class="row">
			<div class="col l6 s12">
				<h5 id="footer-title" class="white-text">
					@php
						echo get_theme_mod('footer_title', 'Footer Title')
					@endphp
				</h5>
				<p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
			</div>
			<div class="col l4 offset-l2 s12">
				<h5 class="white-text">Links</h5>
				<ul>
					<li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
					<li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
					<li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
					<li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="footer-copyright">
		<div class="container">
			©
			@php
				echo date("Y");
			@endphp
			Copyright Text
			<a class="grey-text text-lighten-4 right" href="#!">More Links</a>
		</div>
	</div>
</footer>
@php
	wp_footer()
@endphp

{{-- @php
	$fullID = 'footer-widget-area-1';
@endphp

@if (is_active_sidebar($fullID))
	@php
		dynamic_sidebar($fullID);
	@endphp
@endif --}}