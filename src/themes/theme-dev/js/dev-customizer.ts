/**
 * File dev-customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Make Theme Customizer preview reload changes asynchronously.
 */

declare const wp;
declare const jQuery;

(($) => {
  // Site title and description.
  wp.customize("blogname", (value) => {
    value.bind((to) => {
      $(".site-title a").text(to);
    });
  });

  wp.customize("blogdescription", (value) => {
    value.bind((to) => {
      $(".site-description").text(to);
    });
  });

  // Header text color.
  wp.customize("header_textcolor", (value) => {
    value.bind((to) => {
      $(".brand-logo").css({
        color: to,
      });
    });
  });
  // Header background text color.
  wp.customize("header_background_color", (value) => {
    value.bind((to) => {
      $(".nav-styling").css({
        backgroundColor: to,
      });
    });
  });

  // Footer title
  wp.customize("footer_title", (value) => {
    value.bind((to) => {
      $("#footer-title").text(to);
    });
  });
})(jQuery);
