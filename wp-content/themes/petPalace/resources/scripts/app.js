

//För ikonerna katt|hund|gnagare|fågel
jQuery(document).ready(function ($) {
    $('.icon-animals').on('click', function () {
        var tag = $(this).data('tag');
        var url = ajax_variables.siteUrl + '/product-tag/' + tag;
        window.location.href = url;
    });
});


//Home-page scroll för Varumärken
jQuery(document).ready(function ($) {
    $('.div-wrapper-homepage').on('wheel', function (e) {
        if (e.originalEvent.deltaY !== 0) {
            e.preventDefault();
            this.scrollLeft += e.originalEvent.deltaY;
        }
    });
});


//Ikonerna!!
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.icon-animals').forEach(function (icon) {
        icon.addEventListener('click', function () {
            var tag = this.getAttribute('data-tag');
            if (tag) {
                var currentUrl = new URL(window.location.href);
                currentUrl.searchParams.set('product_tag', tag);
                window.location.href = currentUrl.toString();
            }
        });
    });
});




//Scroll för relaterade produkter
jQuery(document).ready(function ($) {
    $('.related-products ul.products').slick({
        slidesToShow: 4, // Visa minst 2 produkter
        slidesToScroll: 1,
        arrows: true,
        dots: true,
        infinite: true,
        speed: 300,
        adaptiveHeight: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 4, // Visa alla 4 produkter
                    slidesToScroll: 4,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 2, // Visa 2 produkter
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1, // Visa 1 produkt
                    slidesToScroll: 1
                }
            }
        ]
    });
});



//_____________________________________ EFTER PRODUCT-CONTENT LISTING-PAGE


//Uppdaterar varukorgen automatiskt utan att behöva klicka på "Update Cart"
jQuery( function( $ ) {
    let timeout;
    $('.woocommerce').on('change', 'input.qty', function(){
        if ( timeout !== undefined ) {
            clearTimeout( timeout );
        }
        timeout = setTimeout(function() {
            $("[name='update_cart']").trigger("click");
        }, 500 ); 
    });
} );
