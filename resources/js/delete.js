$(function() {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      })

    $('.delete').click(function() {

          swalWithBootstrapButtons.fire({
            title: 'Jesteś pewny?',
            text: "Nie będzie można tego cofnąć!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Tak, usuń!',
            cancelButtonText: 'Nie, anuluj!',
            reverseButtons: true
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: "DELETE",
                    url: deleteUrl + $(this).data('id')
                })
                .done(function (response) {
                    window.location.reload();
                  /*  swalWithBootstrapButtons.fire(
                        response.result,
                        response.message,
                        response.status
                    ); */
                })
                .fail(function (response) {
                    Swal.fire(
                        response.result,
                        response.message,
                        response.status
                      );
                })
            } else if (
              result.dismiss === Swal.DismissReason.cancel
            ) {
              swalWithBootstrapButtons.fire(
                'Anulowano',
                'Żadne dane nie zostały utracone.',
                'error'
              )
            }
          })
    });
});
