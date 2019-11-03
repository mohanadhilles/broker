$(document).ready(function () {
    // $('.customer-logos').slick({
    //     slidesToShow: 5,
    //     slidesToScroll: 1,
    //     autoplay: true,
    //     autoplaySpeed: 1500,
    //     centerMode: true,
    //     centerPadding: '10px',
    //     arrows: false,
    //     dots: false,
    //     pauseOnHover: false,
    //     responsive: [{
    //         breakpoint: 768,
    //         settings: {
    //             slidesToShow: 3,
    //             arrows: true,
    //             prevArrow: $('.prev'),
    //             nextArrow: $('.next'),
    //         }
    //     }, {
    //         breakpoint: 520,
    //         settings: {
    //             slidesToShow: 3,
    //             arrows: true,
    //             prevArrow: $('.prev'),
    //             nextArrow: $('.next'),
    //         }
    //     }]
    // });


    $('.auth-nav a').click(function (event) {
        event.preventDefault();
        var tab_id = $(this).attr('data-tab');
        $('.auth-nav a').removeClass('currentTab');
        $('.tabContent').removeClass('current');

        $(this).addClass('currentTab');
        $("#" + tab_id).addClass('current');
        $('html, body').animate({scrollTop: 150});
    });

    // Profile Page JS

    setTimeout(function() {
        $("ul.list li.list-item:first-child").trigger('click');
    },10);

    $("ul.list li.list-item").click(function () {
        var sectionName = $(this).attr('data-section');
        var sectionSelected = "section." + sectionName;
        var card = "div.card-side";

        $(sectionSelected).toggle();
        $(this).toggleClass('list-item-active');

        $(card).hide();

        if ($(card).is(":hidden")) {
            $('.hideShow').removeClass('col-lg-6');
        }

        if ($('section.resume').is(":hidden") && $('section.referral').is(":hidden") && $('section.job-applied').is(":hidden")) {
            $(card).show();
            $('.hideShow').addClass('col-lg-6');
        }

        if($('section.resume').is(":visible")) {
            $('.changePhoto').show();
        }else {
            $('.changePhoto').hide();
            $('profile-picture').css('cursor','default');
        }

    });



      $('.profile-picture').click(function () {
          if($('section.resume').is(":visible")) {
              $('#Upload').trigger('click');
          }
      });







    // Search Pages

    $("#filter-link").click(function (event) {
        event.preventDefault();
        $(".aside-wrapper").toggle(750);
        $(this).find("img").toggle();
        $(".filter-box").toggleClass("toggle-color");
        $(".mery-wrapper").toggleClass('col-lg-9');
        $(".job-wrapper").toggleClass('job-width');


    });

    // I want mery Page

    // $("a.service").click(function (event) {
    //     event.preventDefault();
    //     $(".hide-row").hide();
    //     $(".services-row").hide();
    //     let servName = $(this).attr('data-serv');
    //     let sectionToShow = 'section#' + servName;
    //     $(sectionToShow).show();
    // });


    // $("a.now").click(function (event) {
    //     event.preventDefault();
    //     $("#need-mery").hide();
    //     $(".steps-slider").show();
    // });


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



    // $('#steps').on('slide.bs.carousel', function (e) {
    //
    //     var slidingItemsAsIndex = $('#steps .carousel-item').length - 1;
    //
    //     // If last item hide next arrow
    //     if($(e.relatedTarget).index() === slidingItemsAsIndex ){
    //         $('.carousel-next').hide();
    //     }
    //     else{
    //         $('.carousel-next').show();
    //     }
    //
    //     // If first item hide prev arrow
    //     if($(e.relatedTarget).index() === 0){
    //         $('.carousel-prev').hide();
    //     }
    //     else{
    //         $('.carousel-prev').show();
    //     }
    //
    // });

    $("#steps .back").click(function (event) {
        event.preventDefault();
        $("#steps").parent().hide();
        $("#need-mery").show();
    });

    // post details popup

    $("#largeModal").on("shown.bs.modal", function(){
        $('.modal-backdrop.show').css('position', 'absolute');
    });


    $('.more').click(function (event) {
        event.preventDefault();
        $('#largeModal').modal();

        //appending modal background inside the bigform-Content
        $('.modal-backdrop').appendTo('main');
        //removing body classes to enable click events
        $('body').css('padding-right','unset');
    });

    $('#top').on('click', function(event){
        event.preventDefault();
        $('html, body').animate({
            scrollTop: $(sectionTo).offset().top
        }, 1500);
    });


});
