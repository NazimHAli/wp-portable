<div class="icon-block">
	@isset ($icon)
	    <h2 class="center green-text text-accent-4">
	    	<i class="large material-icons">{{ $icon }}</i>
	    </h2>
	@endisset
	@isset ($title)
	    <h5 class="center">{{ $title }}</h5>
	@endisset
	@isset ($paragraphText)
	    <p class="light">
	    	{{ $paragraphText }}
	    </p>
	@endisset
</div>