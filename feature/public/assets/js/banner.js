//for index banner play
$(function() {
    var get_no = $(".bannerslide ul li").size(); //抓數量
    var rand_no = Math.floor(Math.random() * get_no); //避免零
    if ($(window).width() > 801) {
        var mySwiper = new Swiper('.bannerslide', {
            slidesPerView: 'auto',
            loop: true,
            loopedSlides: 3,
            centeredSlides: true,
            spaceBetween: 0,
            initialSlide: rand_no,
            navigation: {
                nextEl: '.banner-next',
                prevEl: '.banner-prev'
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true
            },
            autoplay: {
                delay: 5000
            }
        });
    } else {
        var swiperBanner = new Swiper('.bannerslide', {
            autoplay: {
                delay: 5000
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true
            },
            loop: true,
            initialSlide: rand_no
        });
    }
});
