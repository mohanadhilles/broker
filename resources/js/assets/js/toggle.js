$(document).ready(function () {


    $("ul.list li.list-item").click(function () {
        var sectionName = $(this).attr('data-section');
        var sectionSelected = "section." + sectionName;
        var card = "div.card-side";

        $(sectionSelected).toggle();
        $(this).children('img').attr("src","img/listUpArrow.png");

        $(card).hide();

        if ($(card).is(":hidden")) {
            $('.hideShow').removeClass('col-lg-6');
        }


        if ($('section.resume').is(":hidden") && $('section.referral').is(":hidden") && $('section.job-applied').is(":hidden")){
            $(card).show();
            $('.hideShow').addClass('col-lg-6');
        }



        if ($('section.resume').is(":hidden")){
            $(".img1").attr("src","img/listArrow.png");
            $('.changePhoto').hide();

        } else if($('section.resume').is(":visible")){
            $(".img1").attr("src","img/listUpArrow.png");
            $('.changePhoto').show();

        }

        if ($('section.referral').is(":hidden")){
            $(".img2").attr("src","img/listArrow.png");
        } else if($('section.referral').is(":visible")){
            $(".img2").attr("src","img/listUpArrow.png");
        }

        if ($('section.job-applied').is(":hidden")){
            $(".img3").attr("src","img/listArrow.png");
        } else if($('section.job-applied').is(":visible")){
            $(".img3").attr("src","img/listUpArrow.png");
        }

    });


});
