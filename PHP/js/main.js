document.addEventListener('DOMContentLoaded', () => {
    const imagenesCarousel = document.querySelectorAll('.carousel');
    M.Carousel.init(imagenesCarousel, {
        duration: 2.5,
        dist: -80,
        shift: 5,
        padding: 5,
        indicators: true,
    });
});