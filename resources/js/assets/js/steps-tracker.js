$(document).ready(function () {

    //jQuery time
    let current_fs, next_fs, previous_fs; //fieldsets
    let left, opacity, scale; //fieldset properties which we will animate
    let animating; //flag to prevent quick multi-click glitches
    let currentSection = $("section").attr('data-section');

    $(".next-step").click(function () {

        if (animating) return false;
        animating = true;

        current_fs = $(this).closest('section');
        next_fs = current_fs.next();


        //activate next step on progressbar using the index of next_fs
        $(".paginate-number li").eq($("section").index(next_fs)).addClass("done");

        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function (now) {
                //as the opacity of current_fs reduces to 0 - stored in "now"
                //1. scale current_fs down to 80%
                scale = 1 - (1 - now) * 0.2;
                //2. bring next_fs from the right(50%)
                left = (now * 50) + "%";
                //3. increase opacity of next_fs to 1 as it moves in
                opacity = 1 - now;
                current_fs.css({
                    'transform': 'scale(' + scale + ')',
                    'position': 'absolute'
                });
                next_fs.css({'left': left, 'opacity': opacity});
            },
            duration: 500,
            complete: function () {
                current_fs.hide();
                animating = false;
            },

    });
        $('html, body').animate({scrollTop:140},300);

    });





    $(".box-1").click(function () {
        // $(this).find('img').toggle();
        $(".box-1 .payment-icon-1").show();
        $(".box-1 .payment-icon").hide();

        $(".box-2 .credit-icon-1").show();
        $(".box-2 .credit-icon").hide();

    });

    $(".box-2").click(function () {
        $(".box-2 .credit-icon").show();
        $(".box-2 .credit-icon-1").hide();

        $(".box-1 .payment-icon").show();
        $(".box-1 .payment-icon-1").hide();


    });


    if ($("section.add-post").is(":hidden"))  {
        $('#page-heading').empty().append("payment method");
    }


});
