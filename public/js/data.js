$(document).ready(function () {
    $('#productForm').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: $(this).serialize(),
            success: function (response) {
                // console.log('Success:', response);
                toastr.options = {
                    "positionClass": "toast-top-center"
                };
                toastr.success('Product saved successfully!');
            },
            error: function (xhr) {
                console.error('Error:', xhr.responseJSON);
                alert('There was an error saving the data.');
            }
        });
    });
});
