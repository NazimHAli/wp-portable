<header>
{{--             @if ( is_front_page() && is_home() )
                <h1 class="site-title">
                    <a href="@php echo esc_url( home_url( '/' ) ) @endphp" rel="home">
                        {{ bloginfo( 'name' ) }}
                    </a>
                </h1>
            @else
                <p class="site-title">
                    <a href="@php echo esc_url( home_url( '/' ) ) @endphp" rel="home">
                        {{ bloginfo( 'name' ) }}
                    </a>
                </p>
            @endif --}}
            
{{--             @php
                $theme_slug_description = get_bloginfo( 'description', 'display' )
            @endphp
            
            @if ( $theme_slug_description || is_customize_preview() )
                <p class="site-description">
                    @php
                        echo $theme_slug_description; /* WPCS: xss ok. */
                    @endphp
                </p>
            @endif --}}

    @include('includes.nav')
</header>