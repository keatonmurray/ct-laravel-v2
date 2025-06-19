$(document).ready(function() {
    // Logic for user registration
    $('#registerForm').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: $(this).serialize(),
            success: function (response) {
                $('#registerForm')[0].reset();

                toastr.options = {
                    "positionClass": "toast-top-center"
                };
                toastr.success(response.message || 'Account created successfully!');
            },
            error: function (xhr) {
                console.error('Error:', xhr.responseJSON);
                toastr.options = {
                    "positionClass": "toast-top-center"
                };
                toastr.error('There was an error saving the data.');
            }
        });
    });
});
