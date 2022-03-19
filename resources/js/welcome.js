$(function() {

    $('button.add-cart-button').click(function(event) {
       event.preventDefault();

        $.ajax({
           method: "POST",
           url: WELCOME_DATA.addToCart + $(this).data('id')
        })

        .done(function () {
            Swal.fire({
                title: "Brawo!",
                text: "Produkt dodany do koszyka!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: '<i class="fas fa-cart-plus"></i> Przejdź do koszyka',
                cancelButtonText: '<i class="fas fa-shopping-bag"></i> Kontynuuj zakupy'
            }).then((result) => {
                if (result.value) {
                    window.location = WELCOME_DATA.listCart;
                }
            })
        })
            .fail(function () {
                Swal.fire('Ooops...', "Wystąpił błąd", 'error');
            })
    });

    $('a#filter-button').click(function() {
        const form = $('form.sidebar-filter').serialize();
        $.ajax({
            method: "GET",
            url: "/",
            data: form
        })
            .done(function (response) {
                $('div#products-wrapper').empty();
                $.each(response.data, function (index, product) {
                    const html = '<div class="col-6 col-md-6 col-lg-4 mb-3">' +
                        '<div class="card h-100 border-0">' +
                        '   <div class="card-img-top">' +
                        '       <img src="'+ getImage(product) +'" width="240" height="240" class="img-fluid mx-auto d-block" alt="Card image cap">' +
                        '   </div>' +
                        '       <div class="card-body text-center">' +
                        '            <h4 class="card-title">' +
                                                product.name +
                        '             </h4>' +
                        '             <h5 class="card-price small">' +
                        '                <i>PLN ' + product.price + '</i>' +
                        '             </h5>' +
                        '                <button class="btn btn-success btn-sm add-cart-button"' + getDisabled() + ' data-id="' + product.id + '">' +
                        '                <i class="fa-solid fa-cart-shopping"></i> Dodaj do koszyka ' +
                        '                 </button> ' +
                        '        </div>' +
                        '   </div>' +
                        '</div>';

                    $('div#products-wrapper').append(html);
                })
            })

            function getImage(product) {
                if(!!product.image_path)
                    return WELCOME_DATA.storagePath + product.image_path;

                return WELCOME_DATA.defaultImage;
            }

            function getDisabled() {
                if(WELCOME_DATA.isGuest) {
                    return ' disabled';
                }
                return '';
            }
    });
});
