import Flickity from 'flickity';
import ScrollReveal from 'scrollreveal';
import IMask from 'imask';

try {
    window.jQuery = window.$ = require('jquery');
    require('pagepiling.js');

} catch (e) {
    console.error(e);
}

let mapboxgl = require('mapbox-gl/dist/mapbox-gl.js');

(function () {
    let header = $('#app-header');
    let menu = $('.menu');
    let headerMenu = $('.header-nav-list');
    let burgerMenu = $('.burger-menu');

    if ($(window).width() >= 1200) {
        burgerMenu.addClass('active');
        headerMenu.addClass('active');
    }

    /**
     * Burger-menu
     */
    $(burgerMenu).click(function () {
        $(this).toggleClass('active');
        headerMenu.toggleClass('active');
        menu.toggleClass('active');
    });

    /**
     * Scroll
     */
    $(".scroll-link").on("click", function (event) {
        event.preventDefault();
        let id = $(this).attr('href');
        if (id.length > 1) {
            let top = ($(id).offset().top - $('#app-header').height());

            $('body,html').animate({
                scrollTop: top
            }, 1500);
        }
        burgerMenu.removeClass('active');
        menu.slideUp();
    });

    /**
     * PagePiling
     */
    if ($(window).width() >= 1200) {
        $('#app').pagepiling({
            anchors: [],
            verticalCentered: false,
            navigation: {
                'textColor': '#000',
                'bulletsColor': '#000',
                'position': 'left',
            },
            sectionSelector: 'section',

            //events
            afterLoad: function (anchorLink, index) {
                let ppNav = $('#pp-nav');
                let laboratoryImage = $('.laboratory-image');
                let productOverviewImage = $('.product-overview-decor-image');
                let allClassHeader = 'white dark';
                let allClassNav = 'white dark primary last';
                let classHeader = $('.pp-section.active').data('classHeader');
                let classNav = $('.pp-section.active').data('classNav');

                burgerMenu.removeClass('active');
                headerMenu.removeClass('active');

                header.removeClass(allClassHeader).addClass(classHeader);
                ppNav.removeClass(allClassNav).addClass(classNav);

                if (index === 2) {
                    laboratoryImage.addClass('start-animation');
                }

                if (index === 3 || index === 2) {
                    productOverviewImage.addClass('start-animation');
                }
            },
        });
    }

    /**
     * Products accordion
     */
    $('.products-item').on('click', function () {
        $('.products-item').removeClass('active');
        $(this).addClass('active');
    });

    /**
     * Tabs
     */

    $('.custom-tabs-nav').on('click', 'div:not(.active)', function () {
        $(this)
            .addClass('active').siblings().removeClass('active')
            .closest('.custom-tabs').find('.custom-tabs-body-item').removeClass('active').eq($(this).index()).addClass('active');
    });

    /**
     * Custom dropdown
     * @type {Element}
     */

    $('.buy-selected').on('click', function () {
        let creamName = $(this).data('cream');
        let creamID = $(this).data('cream-id');
        $('.custom-dropdown-input').addClass('is-selected');
        $('.custom-dropdown-input__title').text(creamName);
        $('input[name*="cream"]').val(creamName);
        $('.product-selected-item').removeClass('active').eq($(this).index());
        $('.product-selected-item[data-product-selected-id='+creamID+']').addClass('active');
    });

    $('.custom-dropdown-body ul li').on('click', function () {
        let creamName = $(this).data('cream');
        $('.custom-dropdown-input').addClass('is-selected');
        $('.custom-dropdown-input__title').text(creamName);
        $('input[name*="cream"]').val(creamName);
        $('.product-selected-item').removeClass('active').eq($(this).index()).addClass('active');
    });

    $('.custom-dropdown-input').on('click', function () {
        $(this).toggleClass('active');
        $(this).siblings('.custom-dropdown-body').slideToggle();
    });

    if ($('.custom-dropdown-input')) {
        $(document).on('click', e => {
            if (!$('.custom-dropdown-input').is(e.target) && $('.custom-dropdown-input').has(e.target).length === 0) {
                $('.custom-dropdown-input').removeClass('active');
                $('.custom-dropdown-body').slideUp();
            }
        })
    }


    /**
     * Form-label
     */

    $('.form-control').on('focus', function () {
        $(this).parents('.form-group').addClass('in-focus');
    });

    $('.form-control').on('blur', function () {
        if ($(this).val() !== "") {
            $(this).parents('.form-group').addClass('in-focus');
        } else {
            $(this).parents('.form-group').removeClass('in-focus');
        }
    });

    /**
     * Phone mask
     * @type {*|jQuery.fn.init|jQuery|HTMLElement}
     */
    const phones = $('[type="tel"]');
    Array.from(phones).forEach(phone => {
        new IMask(phone, {
            mask: '+{38} (000) 000-00-00'
        });
    });

    /**
     * Modal
     */
    let feedbackModal = $('.custom-modal-wrapper--feedback');
    let adviceModal = $('.custom-modal-wrapper--advice');
    let closeModal = $('.close-modal');
    let modalMask = $('.modal-mask');

    $('.open-feedback').on('click', function (e) {
        e.preventDefault();
        $(feedbackModal).addClass('active');
        $(modalMask).addClass('active');
    });

    $('.open-advice').on('click', function (e) {
        e.preventDefault();
        $(adviceModal).addClass('active');
        $(modalMask).addClass('active');
    });

    $(closeModal).on('click', function () {
        $(adviceModal).removeClass('active');
        $(feedbackModal).removeClass('active');
        $(modalMask).removeClass('active');
    });

    $(modalMask).on('click', function () {
        $(adviceModal).removeClass('active');
        $(feedbackModal).removeClass('active');
        $(modalMask).removeClass('active');
    });


    /**
     * Youtube video
     */
    $('[data-youtube]').on('click', function () {
        let id = $(this).data('youtube'),
            padding = $(window).innerWidth() > 768 ? 120 : 30,
            ratio = 9 / 16,
            width = $(window).innerWidth() > 768 ? $(window).innerWidth() - padding - 200 : $(window).innerWidth() - padding,
            height = width * ratio,
            html = '<iframe style="width: ' + width + 'px; height: ' + height + 'px;" ' +
                'src="' +
                id + '" frameborder="0" gesture="media" allowfullscreen></iframe>';
        $('body').append('<div class="outer">' + html + '</div>');
    });

    $(document).mouseup(function (e) {
        let container = $('.outer iframe');

        if (!container.is(e.target) && container.has(e.target).length === 0) {
            $('.outer').remove();
        }
    });

    $(document).on('keyup', function (e) {
        if (e.keyCode === 27) {
            if ($(feedbackModal).lenght > 0) {
                $(feedbackModal).removeClass('active');
                $(modalMask).removeClass('active');
            }
        }
    });

    /**
     * Sliders
     */
    if ($('.reviews-slider').length) {

        let elem1 = document.querySelector('.reviews-slider');
        if (elem1) {
            const flkty1 = new Flickity(elem1, {
                prevNextButtons: false,
                pageDots: false,
                contain: true,
                draggable: false,
                wrapAround: false,
                cellAlign: 'left',
                adaptiveHeight: true
            });

            let prevArrowIntro = document.querySelector('.slider-arrow--reviews .slider-arrow-item--prev');

            prevArrowIntro.addEventListener('click', function () {
                flkty1.previous(false, false);
            });

            let nextArrowIntro = document.querySelector('.slider-arrow--reviews .slider-arrow-item--next');

            nextArrowIntro.addEventListener('click', function () {
                flkty1.next(false, false);
            });
        }
    }

    if ($('.page-laboratory-slider').length) {

        let elem2 = document.querySelector('.page-laboratory-slider');
        if (elem2) {
            const flkty2 = new Flickity(elem2, {
                prevNextButtons: false,
                pageDots: false,
                contain: true,
                draggable: false,
                wrapAround: false,
                cellAlign: 'left',
                adaptiveHeight: true,
                on: {
                    change: function (index) {
                        $('.slider-nav--laboratory .slider-nav-item--index').text(('0' + (index + 1)).slice(-2));
                    }
                }
            });

            $('.slider-nav--laboratory .slider-nav-item--last').text(('0' + flkty2.getCellElements().length).slice(-2));

            let prevArrowIntro = document.querySelector('.slider-arrow--laboratory .slider-arrow-item--prev');

            prevArrowIntro.addEventListener('click', function () {
                flkty2.previous(false, false);
            });

            let nextArrowIntro = document.querySelector('.slider-arrow--laboratory .slider-arrow-item--next');

            nextArrowIntro.addEventListener('click', function () {
                flkty2.next(false, false);
            });
        }
    }

    /**
     * Animate scroll
     */
    ScrollReveal().reveal('.some-class', {
        origin: 'bottom',
        delay: 400,
        distance: '200px',
        interval: 80
    });

    /**
     * Map
     */
    if ($('#contacts-map').length > 0) {
        $('.map-mask').on('click', function () {
            $(this).addClass('is-disabled');
        });
        let mapLon = $('#contacts-map').data('lon');
        let mapLat = $('#contacts-map').data('lat');
        let mapIcon = $('#contacts-map').data('icon');
        mapboxgl.accessToken = 'pk.eyJ1IjoibWFwYm94dXNlcm11c2V1bSIsImEiOiJjanRya2FoZXQwcjVlNDVtdTNlOWNoMzUyIn0.oMm4w0lY15eiIFOcl-gkIA';
        let map = new mapboxgl.Map({
            container: 'contacts-map',
            style: 'mapbox://styles/mapbox/light-v9',
            center: [mapLon, mapLat],
            zoom: 16
        });

        map.on('load', function () {
            map.loadImage(`${mapIcon}`, function (error, image) {
                if (error) throw error;
                map.addImage('cat', image);
                map.addLayer({
                    "id": "points",
                    "type": "symbol",
                    "source": {
                        "type": "geojson",
                        "data": {
                            "type": "FeatureCollection",
                            "features": [{
                                "type": "Feature",
                                "geometry": {
                                    "type": "Point",
                                    "coordinates": [mapLon, mapLat],
                                }
                            }]
                        }
                    },
                    "layout": {
                        "icon-image": "cat",
                        "icon-size": 1
                    }
                });
            });
        });
    }
})(jQuery);