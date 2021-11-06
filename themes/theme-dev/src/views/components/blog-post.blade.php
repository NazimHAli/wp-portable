<div class="card hoverable">
	@isset ($imageSRC)
	    <div class="card-image waves-effect waves-block waves-light">
	    	<img class="activator" src="{{ $imageSRC }}">
	    </div>
	@endisset
	<div class="card-content">
		@isset ($title)
		    <span class="card-title activator grey-text text-darken-4">
		    	{{ $title }}
		    	<i class="material-icons right">more_vert</i>
		    </span>
		@endisset
		@isset ($linkText)
		    <p>
		    	<a href="{{ $linkURL }}">
		    		{{ $linkText }}
		    	</a>
		    </p>
		@endisset
	</div>
</div>