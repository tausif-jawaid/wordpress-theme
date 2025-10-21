document.addEventListener('DOMContentLoaded', function(){
// smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(function(a){
a.addEventListener('click', function(e){
var target = document.querySelector(this.getAttribute('href'));
if(target){ e.preventDefault(); target.scrollIntoView({behavior:'smooth'}); }
});
});
});



// $(document).ready(function () {
//     // Clone next/prev items to make 3 visible at once
//     $('.carousel .carousel-item').each(function () {
//         const minPerSlide = 3;
//         let next = $(this).next();
//         for (let i = 1; i < minPerSlide; i++) {
//             if (!next.length) {
//                 next = $('.carousel .carousel-item').first();
//             }
//             let clone = next.find('.col-md-4').first().clone();
//             $(this).find('.row').append(clone);
//             next = next.next();
//         }
//     });

//     // Hero video mute/unmute toggle
//     const $video = $('#heroVideo');
//     const $btn = $('#soundToggle');

//     $btn.on('click', function () {
//         const muted = $video.prop('muted');
//         $video.prop('muted', !muted);
//         $btn.text(!muted ? "🔇" : "🔊");
//         if (!$video[0].paused) $video[0].play(); // ensure playback continues
//     });

//     // Initialize both carousels
//     initCustomCarousel('#carouselTrack', '.carousel-slide', '#prevBtn', '#nextBtn', '.indicator');
//     initCustomCarousel('#carouselTrackV2', '.carousel-slide-v2', '#prevBtnV2', '#nextBtnV2', '.indicator-v2');

//     function initCustomCarousel(trackSelector, slideSelector, prevBtnSelector, nextBtnSelector, indicatorSelector) {
//         const $track = $(trackSelector);
//         const $slides = $(slideSelector);
//         const $prevBtn = $(prevBtnSelector);
//         const $nextBtn = $(nextBtnSelector);
//         const $indicators = $(indicatorSelector);

//         let currentIndex = 0;
//         const totalSlides = $slides.length;
//         let visibleSlides = getVisibleSlides();
//         let slideWidth = 100 / visibleSlides;
//         let autoPlayInterval = null;
//         const autoPlayDelay = 3000;

//         function getVisibleSlides() {
//             const width = $(window).width();
//             if (width <= 768) return 1;
//             if (width <= 992) return 2;
//             return 3;
//         }

//         function updateSlideWidth() {
//             slideWidth = 100 / visibleSlides;
//             $slides.css({
//                 'width': slideWidth + '%',
//                 'min-width': slideWidth + '%'
//             });
//         }

//         function updateCarousel() {
//             const translateX = -(currentIndex * slideWidth);
//             $track.css('transform', 'translateX(' + translateX + '%)');
//             updateIndicators();
//         }

//         function updateIndicators() {
//             $indicators.removeClass('active').eq(currentIndex).addClass('active');
//         }

//         function nextSlide() {
//             currentIndex++;
//             if (currentIndex >= totalSlides) {
//                 updateCarousel();
//                 setTimeout(() => {
//                     $track.css('transition', 'none');
//                     currentIndex = 0;
//                     updateCarousel();
//                     setTimeout(() => {
//                         $track.css('transition', 'transform 0.5s ease-in-out');
//                     }, 50);
//                 }, 500);
//             } else {
//                 updateCarousel();
//             }
//         }

//         function prevSlide() {
//             if (currentIndex <= 0) {
//                 $track.css('transition', 'none');
//                 currentIndex = totalSlides;
//                 updateCarousel();
//                 setTimeout(() => {
//                     $track.css('transition', 'transform 0.5s ease-in-out');
//                     currentIndex = totalSlides - 1;
//                     updateCarousel();
//                 }, 50);
//             } else {
//                 currentIndex--;
//                 updateCarousel();
//             }
//         }

//         function goToSlide(index) {
//             currentIndex = index;
//             updateCarousel();
//         }

//         function startAutoPlay() {
//             autoPlayInterval = setInterval(nextSlide, autoPlayDelay);
//         }

//         function stopAutoPlay() {
//             clearInterval(autoPlayInterval);
//             autoPlayInterval = null;
//         }

//         function bindEvents() {
//             $prevBtn.on('click', function () {
//                 stopAutoPlay();
//                 prevSlide();
//                 startAutoPlay();
//             });

//             $nextBtn.on('click', function () {
//                 stopAutoPlay();
//                 nextSlide();
//                 startAutoPlay();
//             });

//             $indicators.each(function (index) {
//                 $(this).on('click', function () {
//                     stopAutoPlay();
//                     goToSlide(index);
//                     startAutoPlay();
//                 });
//             });

//             $track.parent().hover(
//                 () => stopAutoPlay(),
//                 () => startAutoPlay()
//             );

//             $(window).on('resize', function () {
//                 visibleSlides = getVisibleSlides();
//                 updateSlideWidth();
//                 updateCarousel();
//             });
//         }

//         // Init
//         updateSlideWidth();
//         bindEvents();
//         startAutoPlay();
//     }
// });

jQuery(document).ready(function($) {
    function initCustomCarousel(trackSelector, slideSelector, prevBtnSelector, nextBtnSelector, indicatorSelector) {
        const $track     = $(trackSelector);
        const $slides    = $(slideSelector);
        const $prevBtn   = $(prevBtnSelector);
        const $nextBtn   = $(nextBtnSelector);
        const $indicators= $(indicatorSelector);

        let currentIndex   = 0;
        const totalSlides  = $slides.length - 3; // যদি আপনি duplicate ৩টি স্লাইড রাখেন loop এর জন্য
        let visibleSlides  = getVisibleSlides();
        let slideWidth     = 100 / visibleSlides;
        let autoPlayInterval = null;
        const autoPlayDelay = 3000;

        function getVisibleSlides() {
            const width = $(window).width();
            if (width <= 768) return 1;
            if (width <= 992) return 2;
            return 3;
        }

        function updateSlideWidth() {
            visibleSlides = getVisibleSlides();
            slideWidth = 100 / visibleSlides;
            $slides.css({
                width     : slideWidth + '%',
                'min-width': slideWidth + '%'
            });
        }

        function updateCarousel() {
            const translateX = -(currentIndex * slideWidth);
            $track.css('transform', 'translateX(' + translateX + '%)');
            updateIndicators();
        }

        function updateIndicators() {
            $indicators.removeClass('active').eq(currentIndex).addClass('active');
        }

        function nextSlide() {
            currentIndex++;
            if (currentIndex >= totalSlides) {
                updateCarousel();
                setTimeout(function() {
                    $track.css('transition', 'none');
                    currentIndex = 0;
                    updateCarousel();
                    setTimeout(function() {
                        $track.css('transition', '');
                    }, 50);
                }, 500);
            } else {
                updateCarousel();
            }
        }

        function prevSlide() {
            if (currentIndex <= 0) {
                $track.css('transition', 'none');
                currentIndex = totalSlides;
                updateCarousel();
                setTimeout(function(){
                    $track.css('transition','');
                    currentIndex = totalSlides - 1;
                    updateCarousel();
                }, 50);
            } else {
                currentIndex--;
                updateCarousel();
            }
        }

        function goToSlide(index) {
            currentIndex = index;
            updateCarousel();
        }

        function startAutoPlay() {
            autoPlayInterval = setInterval(nextSlide, autoPlayDelay);
        }

        function stopAutoPlay() {
            clearInterval(autoPlayInterval);
            autoPlayInterval = null;
        }

        // Bind events
        $prevBtn.on('click', function() {
            stopAutoPlay();
            prevSlide();
            startAutoPlay();
        });
        $nextBtn.on('click', function() {
            stopAutoPlay();
            nextSlide();
            startAutoPlay();
        });
        $indicators.each(function(index) {
            $(this).on('click', function(){
                stopAutoPlay();
                goToSlide(index);
                startAutoPlay();
            });
        });
        $track.parent().hover(
            function(){ stopAutoPlay(); },
            function(){ startAutoPlay(); }
        );
        $(window).on('resize', function(){
            updateSlideWidth();
            updateCarousel();
        });

        // Initialize
        updateSlideWidth();
        startAutoPlay();
    }

    // init for your two carousels
    initCustomCarousel('#carouselTrack',     '.carousel-slide',     '#prevBtn',     '#nextBtn',     '.indicator');
    initCustomCarousel('#carouselTrackV2',   '.carousel-slide-v2', '#prevBtnV2',  '#nextBtnV2',  '.indicator-v2');
});


// Date picker initialization
$(function() {
    // Initialize datepicker
    $("#datepicker").datepicker({
        dateFormat: 'yy-mm-dd', // Format of the date
        minDate: 0, // Minimum selectable date (0 means today)
        maxDate: '+1m +1w', // Maximum selectable date (1 month and 1 week from now)
        showButtonPanel: true, // Show button panel
        changeMonth: true, // Allow month selection
        changeYear: true, // Allow year selection
        yearRange: '2020:2030' // Range of years in dropdown
    });

    // Optional: Add animation
    $("#datepicker").datepicker("option", "showAnim", "slideDown");
});

