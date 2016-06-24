

// Process form data
$("document").ready(function(){
    $(".js-ajax-php-json").submit(function(){
        

        var data = {
            // "action": "test"
            "action": "write"
        };
        data = $(this).serialize() + "&" + $.param(data);
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "submit.php",
            data: data,
            success: function(data) {

                $("#productForm")[0].reset();

            }
        });
        return false;
    });
});

// Sum value column
var getSum = function (colNumber) {
    var sum = 0;
    var selector = '.subtot';

    $('#sum_table').find(selector).each(function (index, element) {
        sum += parseInt($(element).text());
    });

    return sum;
};

$('#sum_table').find('.total').each(function (index, element) {
    $(this).text('Total: ' + getSum(index + 1));
});

//Collapse the navbar on scroll
$(window).scroll(function() {
    if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
    }
});

//Page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});