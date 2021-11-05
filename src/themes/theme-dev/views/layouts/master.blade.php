<!DOCTYPE html>
<html @php language_attributes() @endphp>
    @include('includes.head')
    <body @php body_class() @endphp>
        @include('includes.header')
        @yield('hero-content')
        <div class="container">
        	@yield('content')
    	</div>
        @include('includes.footer')
    </body>
</html>