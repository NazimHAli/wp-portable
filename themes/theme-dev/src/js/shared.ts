/**
 * File shared.js.
 *
 * Example initializing materialize JS components
 *
 * https://materializecss.com/media.html
 */

declare const M;

document.addEventListener("DOMContentLoaded", () => {
  const slider = document.querySelectorAll(".slider");
  M.Slider.init(slider, {});

  const sidenav = document.querySelectorAll(".sidenav");
  M.Sidenav.init(sidenav, {});

  const carousel = document.querySelectorAll(".carousel");
  M.Carousel.init(carousel, {
    dist: 900,
    fullWidth: true,
    indicators: true,
    numVisible: 5,
    padding: 50,
    shift: 20,
  });
});
