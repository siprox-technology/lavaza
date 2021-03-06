/**
 * Template Name: Delicious - v2.2.1
 * Template URL: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/
 * Author: BootstrapMade.com
 * License: https://bootstrapmade.com/license/
 */
!(function ($) {
    "use strict";

    // Smooth scroll for the navigation menu and links with .scrollto classes
    var scrolltoOffset = $('#header').outerHeight() - 1;
    $(document).on('click', '.nav-menu a, .mobile-nav a, .scrollto', function (e) {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            if (target.length) {
                e.preventDefault();

                var scrollto = target.offset().top - scrolltoOffset;

                if ($(this).attr("href") == '#header') {
                    scrollto = 0;
                }

                $('html, body').animate({
                    scrollTop: scrollto
                }, 1500, 'easeInOutExpo');

                if ($(this).parents('.nav-menu, .mobile-nav').length) {
                    $('.nav-menu .active, .mobile-nav .active').removeClass('active');
                    $(this).closest('li').addClass('active');
                }

                if ($('body').hasClass('mobile-nav-active')) {
                    $('body').removeClass('mobile-nav-active');
                    $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
                    $('.mobile-nav-overly').fadeOut();
                }
                return false;
            }
        }
    });

    // Activate smooth scroll on page load with hash links in the url
    $(document).ready(function () {
        if (window.location.hash) {
            var initial_nav = window.location.hash;
            if ($(initial_nav).length) {
                var scrollto = $(initial_nav).offset().top - scrolltoOffset;
                $('html, body').animate({
                    scrollTop: scrollto
                }, 1500, 'easeInOutExpo');
            }
        }
    });

    // Mobile Navigation
    if ($('.nav-menu').length) {
        var $mobile_nav = $('.nav-menu').clone().prop({
            class: 'mobile-nav d-lg-none'
        });
        $('body').append($mobile_nav);
        $('body').prepend('<button type="button" class="mobile-nav-toggle d-lg-none"><i class="icofont-navigation-menu"></i></button>');
        $('body').append('<div class="mobile-nav-overly"></div>');

        $(document).on('click', '.mobile-nav-toggle', function (e) {
            $('body').toggleClass('mobile-nav-active');
            $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
            $('.mobile-nav-overly').toggle();
        });

        $(document).on('click', '.mobile-nav .drop-down > a', function (e) {
            e.preventDefault();
            $(this).next().slideToggle(300);
            $(this).parent().toggleClass('active');
        });

        $(document).click(function (e) {
            var container = $(".mobile-nav, .mobile-nav-toggle");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                if ($('body').hasClass('mobile-nav-active')) {
                    $('body').removeClass('mobile-nav-active');
                    $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
                    $('.mobile-nav-overly').fadeOut();
                }
            }
        });
    } else if ($(".mobile-nav, .mobile-nav-toggle").length) {
        $(".mobile-nav, .mobile-nav-toggle").hide();
    }

    // Navigation active state on scroll
    var nav_sections = $('section');
    var main_nav = $('.nav-menu, #mobile-nav');

    $(window).on('scroll', function () {
        var cur_pos = $(this).scrollTop() + 200;

        nav_sections.each(function () {
            var top = $(this).offset().top,
                bottom = top + $(this).outerHeight();

            if (cur_pos >= top && cur_pos <= bottom) {
                if (cur_pos <= bottom) {
                    main_nav.find('li').removeClass('active');
                }
                main_nav.find('a[href="#' + $(this).attr('id') + '"]').parent('li').addClass('active');
            }
            if (cur_pos < 300) {
                $(".nav-menu ul:first li:first").addClass('active');
            }
        });
    });

    // Toggle .header-scrolled class to #header when page is scrolled
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('#header').addClass('header-scrolled');
            $('#topbar').addClass('topbar-scrolled');
        } else {
            $('#header').removeClass('header-scrolled');
            $('#topbar').removeClass('topbar-scrolled');
        }
    });

    if ($(window).scrollTop() > 100) {
        $('#header').addClass('header-scrolled');
        $('#topbar').addClass('topbar-scrolled');
    }

    // Real view height for mobile devices
    if (window.matchMedia("(max-width: 767px)").matches) {
        $('#hero').css({
            height: $(window).height()
        });
    }

    // Intro carousel
    var heroCarousel = $("#heroCarousel");
    var heroCarouselIndicators = $("#hero-carousel-indicators");
    heroCarousel.find(".carousel-inner").children(".carousel-item").each(function (index) {
        (index === 0) ?
        heroCarouselIndicators.append("<li data-target='#heroCarousel' data-slide-to='" + index + "' class='active'></li>"):
            heroCarouselIndicators.append("<li data-target='#heroCarousel' data-slide-to='" + index + "'></li>");
    });

    heroCarousel.on('slid.bs.carousel', function (e) {
        $(this).find('h2').addClass('animate__animated animate__fadeInDown');
        $(this).find('p, .btn-menu, .btn-book').addClass('animate__animated animate__fadeInUp');
    });

    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });

    $('.back-to-top').click(function () {
        $('html, body').animate({
            scrollTop: 650
        }, 1500, 'easeInOutExpo');
        return false;
    });

    // Menu list isotope and filter
    $(window).on('load', function () {
        var menuIsotope = $('.menu-container').isotope({
            itemSelector: '.menu-item',
            layoutMode: 'fitRows'
        });
        //select a main course for default on load isotop
        $("#filter-Main").addClass('filter-active');
        menuIsotope.isotope({
            filter: $("#filter-Main").data('filter')
        });
        //select different filters
        $('#menu-filters li').on('click', function () {
            $("#menu-filters li").removeClass('filter-active');
            $(this).addClass('filter-active');
            menuIsotope.isotope({
                filter: $(this).data('filter')
            });
        });
    });

    // Testimonials carousel (uses the Owl Carousel library)
    $(".events-carousel").owlCarousel({
        autoplay: true,
        dots: true,
        loop: true,
        items: 1
    });

    // Testimonials carousel (uses the Owl Carousel library)
    $(".testimonials-carousel").owlCarousel({
        autoplay: true,
        dots: true,
        loop: true,
        items: 1
    });

    // Initiate venobox lightbox
    $(document).ready(function () {
        $('.venobox').venobox();
    });

    //  Cart Open and close
    $('#cartOpen').on('click', function () {
        if ($('.cart-wrapper').hasClass('open')) {
            $('.cart-wrapper').removeClass('open');
        } else {
            $('.cart-wrapper').addClass('open');
        }
    });

    //calculate total price of an order

    $('#delivery_price').on('change', function () {
        var total_price = (parseInt($('#cart_price_input').val()) + parseInt($('#delivery_price').val()));
        var total_price_to_display = total_price.toLocaleString();
        $('#total_price').val(total_price);
        $('#display_total_price').text(total_price_to_display);
    });
    $(window).on('load', function () {
        var total_price = (parseInt($('#cart_price_input').val()) + parseInt($('#delivery_price').val()));
        var total_price_to_display = total_price.toLocaleString();
        $('#total_price').val(total_price);
        $('#display_total_price').text(total_price_to_display);
    });

    //open order details modal in order history

    $('#detailsBtn').on('click', function () {
        $('#order_details_modal').modal();
    });

    //online shop status set toggle switches values

    //shop open and close toggle
    $('#is_open_toggle').on('click', function () {
        ($('#is_open_input').val() == '0') ? $('#is_open_input').val('1'):
            $('#is_open_input').val('0');
        //display status
        ($('#is_open_input').val() == '0') ? $('#is_open_status').removeClass().addClass('text-danger').text('????????'):
            $('#is_open_status').removeClass().addClass('text-success').text('??????');

    });
    //setting between manual and auto
    $('#setting_type_toggle').on('click', function () {
        ($('#setting_type_input').val() == 'manual') ? $('#setting_type_input').val('auto'):
            $('#setting_type_input').val('manual');
        /* display setiing status manual or auto */
        ($('#setting_type_input').val() == 'manual') ? $('#setting_type_status').text('????????'):
            $('#setting_type_status').text('????????????');
        /* display open and closing times time picker*/
        ($('#setting_type_input').val() == 'manual') ? $('#open_close_times').addClass('d-none'):
            $('#open_close_times').removeClass('d-none');
        /* set open and closing times to null if manual is selected */
        if ($('#setting_type_input').val() == 'manual') {
            $('#open_time,#close_time').val(null);
        }
    });

    //check which items to select in admin page list of orders

    $('#checkAllItems').on('click', function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });

    //set action value in admin orders page i.e. cancel or process
    $('#processBtn').hover(function () {
        $('#ordersStatusInput').val('process');
    });
    $('#cancelBtn').hover(function () {
        $('#ordersStatusInput').val('cancel');
    });
    //get orders data based on order type
    function getOrdersData(order_type, order_date_from = null, order_date_to = null) {
        $.ajax({
            url: '/admin/onlineShop/orders/getData',
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                orders_status: order_type,
                order_date_from: order_date_from == null ? null : order_date_from,
                order_date_to: order_date_to == null ? null : order_date_to
            },
            beforeSend: function () {
                // Show preloader
                $('#getOrdersData i.refreshing').css('display', 'block');
                $('#getOrdersData i.refreshed').css('display', 'none');

            },
            success: function (response) {
                $('#getOrdersData i.refreshed').css('display', 'block');
                $('#getOrdersData i.refreshing').css('display', 'none');
                $('#orderDetails').empty();
                var orders = JSON.parse(response);
                for (var i = 0; i < orders.length; i++) {
                    var order_status = '??????????????';
                    switch (orders[i].status) {
                        case 'pending':
                            order_status = '????????';
                            break;
                        case 'processed':
                            order_status = '???????????? ??????';
                            break;
                        case 'canceled':
                            order_status = '????????';
                    }
                    $('#orderDetails').append(
                        '<div class="col-10 col-lg-2 col-md-3 col-sm-4 px-2 py-1 border-warning rounded mr-1 mt-1">' +
                        '<div class="row justify-content-center">' +
                        '<p class="text-center text-dark mr-2 mb-1">' + orders[i].id + '</p>' +
                        '<p class="text-center mb-1"><b>' +
                        ' : ?????????? ??????????' +
                        '</b></p>' +
                        '<input type="checkbox" class="ml-3" style="margin-top:2px;" name="order-numbers[]" value="' + orders[i].id + '" id="ordersToProcess">' +
                        '</div>' +
                        '<div class="row justify-content-center">' +
                        '<p class="text-center text-dark mb-1 mr-2">' + new Date(orders[i].created_at).toLocaleString('en-UK', {
                            hour: 'numeric',
                            minute: 'numeric',
                            day: 'numeric',
                            month: 'numeric',
                            year: 'numeric',
                            hour12: false
                        }) + '</p>' +
                        '<p class="text-center mb-1"><b>' +
                        ' : ???????? ??????????' +
                        '</b></p>' +
                        '</div>' +
                        '<div class="row justify-content-center">' +
                        '<p class="text-center text-dark mb-1 mr-2">' +
                        order_status +
                        '</p>' +
                        '<p class="text-center mb-1"><b>' +
                        ' : ?????????? ??????????' +
                        '</b></p>' +
                        '</div>' +
                        '<div class="border mt-0 mb-2"></div>' +
                        '<ul class="p-0 text-right list-unstyled menu" id="orderItemsDetails' + i + '">' +
                        '</ul>' +
                        '<div class="row justify-content-center">' +
                        '<p class="text-center text-dark mb-1 mr-2">' + orders[i].total_price.toLocaleString() + '</p>' +
                        '<p class="text-center mb-1"><b>' +
                        ' : ???????? ????' +
                        '</b></p>' +
                        '</div>' +
                        '<div class="border mt-0 mb-2"></div>' +
                        '<p class="text-right mb-1"><span class="text-dark"><b> ???????? : </b></span>' + orders[i].delivery_address +
                        '</p>' +
                        '<p class="text-right"><span class="text-dark"><b> ?????????? ???????? : </b></span>' + orders[i].phone + '</p>' +
                        '</div>');
                    for (var j = 0; j < orders[i].order_items.length; j++) {
                        $('#orderItemsDetails' + i).append(
                            '<div class="menu-content mt-0">' +
                            '<span class="p-0">' +
                            orders[i].order_items[j].price +
                            '</span>' +
                            '<p class="p-0 mb-1 text-dark" style="font-weight:400">' + orders[i].order_items[j].name_fa + '<span class="p-0 pl-2" style="font-weight:400"><b> ?????????? : </b></span><span class="pr-0 text-dark" style="font-weight:400">' + orders[i].order_items[j].quantity + '</span></p>' +
                            '</div>');
                    }
                    $('#orderItemsDetails' + i).append(
                        '<div class="menu-content mt-0">' +
                        '<span class="p-0">' +
                        orders[i].delivery_price +
                        '</span>' +
                        '<p class="p-0 mb-1 text-dark" style="font-weight:400">?????????? ?????? </p>' +
                        '</div>'
                    );
                }
            },
        });
    }
    //retrive orders data for past 24 hours
    if (top.location.pathname === '/admin/onlineShop/orders/past24hours') {
        getOrdersData('pending', 'last24h', 'now');
    }
    //retrive orders history based on date and order type
    if (top.location.pathname === '/admin/onlineShop/orders/history') {
        getOrdersData('all');
    }
    //refresh orders page to display orders based on selected order type
    $('#getOrdersData').on('click', function () {
        getOrdersData($('#orderStatus').val(), 'last24h', 'now');
    });
    //refresh orders history page based on selected order type and date
    $('#getOrdersHistoryData').on('click', function () {
        getOrdersData($('#orderStatus').val(), $('#orders_history_date_from').val(), $('#orders_history_date_to').val());
    });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
})(jQuery);

kamaDatepicker('orders_history_date_from', {
    buttonsColor: "red",
    closeAfterSelect: true,
    markToday: true,

});
kamaDatepicker('orders_history_date_to', {
    buttonsColor: "red",
    closeAfterSelect: true,
    markToday: true,

});

var customOptions = {
    placeholder: "?????? / ?????? / ??????",
    twodigit: false,
    closeAfterSelect: false,
    nextButtonIcon: "fa fa-arrow-circle-right",
    previousButtonIcon: "fa fa-arrow-circle-left",
    buttonsColor: "blue",
    forceFarsiDigits: true,
    markToday: true,
    markHolidays: true,
    highlightSelectedDay: true,
    sync: true,
    gotoToday: true
}

// init without ids inputs
document.querySelectorAll('#without-ids input').forEach(input => {
    kamaDatepicker(input);
});
