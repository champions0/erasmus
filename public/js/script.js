jQuery('.partners-carousel').slick({
    centerMode: true,
    slidesToShow: 3,
    arrows: false,
    dots: true,
    responsive: [
        {
            breakpoint: 991,
            settings: {
                arrows: false,
                slidesToShow: 1,
                centerMode: false,
            }
        },
    ]
});

jQuery('#gallery').slick({
    slidesToShow: 3,
    slideToScroll: 1,
    arrows: true,
    dots: false,
    responsive: [
        {
            breakpoint: 991,
            settings: {
                arrows: false,
                slidesToShow: 1,
            }
        },
    ]
});


$(document).on('click', '.showPasswordIcon', function () {
    if ($(this).prev().prop("type") === 'text') {
        $(this).prev().prop("type", 'password');
    } else {
        $(this).prev().prop("type", 'text');
    }
})

$(document).on('click', '.plus_span', function () {
     $(this).parent().find("span").show();
     $(this).hide();
})
$(document).on('click', '.material_language_item', function () {
    $(this).parent().next("a").attr('href', "/materials/" + $(this).data('material_id') + "?lng_code=" + $(this).data('lang'));
    $(this).parent().find("span").removeClass('active');
    $(this).addClass('active');
})
