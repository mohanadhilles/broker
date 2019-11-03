$(document).ready(function () {

    $('.customer-logos').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        centerMode: true,
        centerPadding: '10px',
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 3,
                arrows: true,
                prevArrow: $('.prev'),
                nextArrow: $('.next'),
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 3,
                arrows: true,
                prevArrow: $('.prev'),
                nextArrow: $('.next'),
            }
        }]
    });

    $('.auth-nav a').click(function () {
        var tab_id = $(this).attr('data-tab');

        $('.auth-nav a').removeClass('currentTab');
        $('.tabContent').removeClass('current');

        $(this).addClass('currentTab');
        $("#" + tab_id).addClass('current');
    })

    $(".button").click(function (event) {
        event.preventDefault();
        var $button = $(this);
        var oldValue = $button.parent().find("input").val();
        var newVal;
        if ($button.hasClass("add")) {
            newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 1) {
                newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }

        if (newVal < 10) {
            newVal = '0' + newVal;
        }
        $button.parent().find("input").val(newVal);

    });


});

var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5d5ea7a177aa790be3303c72/1dll72smc';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
})();
