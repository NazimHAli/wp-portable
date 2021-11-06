{{--
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Theme_Name
 */
 --}}

<article id="post-{{ the_ID() }}" {{ post_class() }}>
    <header class="entry-header">
        @if (is_singular())
            {{ the_title('<h1 class="entry-title">', '</h1>') }}
        @else
            {{ the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>') }}
        @endif

        @if (get_post_type())
            <div class="entry-meta">
                {{ the_content() }}
                {{ theme_slug_posted_on() }}
                {{ theme_slug_posted_by() }}
            </div>
        @endif
    </header>

    {{ theme_slug_post_thumbnail() }}

</article>
