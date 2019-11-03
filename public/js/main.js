$(document).ready(function () {

    $('.auth-nav a').click(function () {
        var tab_id = $(this).attr('data-tab');

        $('.auth-nav a').removeClass('currentTab');
        $('.tabContent').removeClass('current');

        $(this).addClass('currentTab');
        $("#" + tab_id).addClass('current');
    })

    $('.profile-picture').click(function () {
        if($('section.resume').is(":visible")) {
            $('#Upload').click();
        }
    });

    // $("a.now").click(function (event) {
    //     document.getElementById('need-mery').style.display = 'none';
    //     document.getElementsByClassName('steps-slider')[0].style.display = 'block';
    //
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




    $("#steps .back").click(function (event) {
        event.preventDefault();
        $("#steps").parent().hide();
        $("#need-mery").show();
    });

// post details popup

    // $("#largeModal").on("shown.bs.modal", function(){
    //     $('.modal-backdrop.show').css('position', 'absolute');
    // });


    $('.more').click(function (event) {
        event.preventDefault();
        $('#largeModal').modal();

        //appending modal background inside the bigform-Content
        // $('.modal-backdrop').appendTo('main');
        //removing body classes to enable click events
        $('body').css('padding-right','unset');
    });

    $('#top').on('click', function(event) {
        event.preventDefault();
        $('html, body').animate({
            scrollTop: $(sectionTo).offset().top
        }, 1500);

    });

    setTimeout(function() {
        $('#homeModal').modal({
            backdrop: 'static',
            keyboard: false
        });
    }, 800);


    $('#homeModal').on('shown.bs.modal', function () {
        // will only come inside after the modal is shown
        $('.contentBlur').addClass('modalBlur');

    })

    $('#homeModal').on('hidden.bs.modal', function (e) {
        $('.contentBlur').removeClass('modalBlur');
    });

    });


