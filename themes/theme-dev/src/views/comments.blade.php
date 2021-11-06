{{-- The template for displaying comments

 This is the template that displays the area of the page that contains both the current comments
 and the comment form.

 @link https://developer.wordpress.org/themes/basics/template-hierarchy/

 @package Theme_Name --}}

{{-- If the current post is protected by a password and
 the visitor has not yet entered the password we will
 return early without loading the comments. --}}
@if (post_password_required())
    return;
@endif

<div id="comments" class="comments-area">

    @if (have_comments())
        <h2 class="comments-title">
            @php
            	$theme_slug_comment_count = get_comments_number();
            @endphp
            
            @if ($theme_slug_comment_count === '1')
                @php
	                printf(
	                    /* translators: 1: title. */
	                    esc_html__('One thought on &ldquo;%1$s&rdquo;', 'theme-slug'),
	                    '<span>' . get_the_title() . '</span>'
	                );
                @endphp
            @else
                @php
	                printf( // WPCS: XSS OK.
	                    /* translators: 1: comment count number, 2: title. */
	                    esc_html(_nx('%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $theme_slug_comment_count, 'comments title', 'theme-slug')),
	                    number_format_i18n($theme_slug_comment_count),
	                    '<span>' . get_the_title() . '</span>'
	                );
                @endphp
            @endif
        </h2><!-- .comments-title -->

        @php
        	the_comments_navigation()
        @endphp

        <ol class="comment-list">
            @php
	            wp_list_comments(array(
	                'style'      => 'ol',
	                'short_ping' => true,
	            ));
            @endphp
        </ol><!-- .comment-list -->

        @php
        	the_comments_navigation()
        @endphp

        {{-- If comments are closed and there are comments, let's leave a little note, shall we? --}}
        @if (! comments_open())
            <p class="no-comments">
	            @php
	            	esc_html_e('Comments are closed.', 'theme-slug')
	        	@endphp
        	</p>
        @endif
    @endif

    @php
    	comment_form()
    @endphp

</div><!-- #comments -->
