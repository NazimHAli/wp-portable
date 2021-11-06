{{-- Dropdown example --}}
{{-- <ul id="dropdown1" class="dropdown-content">
  <li><a href="#!">one</a></li>
  <li><a href="#!">two</a></li>
  <li class="divider"></li>
  <li><a href="#!">three</a></li>
</ul> --}}

<nav class="nav-styling">
  <div class="nav-wrapper">
    <div class="row">
      <div class="col s12 m4 l3">
          @if (has_custom_logo())
            @php
              $custom_logo_id = get_theme_mod( 'custom_logo' );
              $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
            @endphp
            <a href="/" class="nav-logo">
              <img src="{{ $image[0] }}" alt="Masjid Icon">
            </a>
        @else
          <a href="/" class="brand-logo">{{ bloginfo( 'name' ) }}</a>
        @endif
      </div>
        <a href="#" data-target="mobile-menu" class="sidenav-trigger">
          <i class="material-icons">menu</i>
        </a>
      <div class="col s12 m8 l9">
        @include('includes.menu', ['ulClasses' => 'right hide-on-med-and-down'])
        {{-- Dropdown example trigger --}}
        {{-- <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Dropdown<i class="material-icons right">arrow_drop_down</i></a></li> --}}
      </div>
    </div>
  </div>
</nav>
@include('includes.menu', ['ulID' => 'mobile-menu', 'ulClasses' => 'sidenav'])
