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
                slidesToShow: 1
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
