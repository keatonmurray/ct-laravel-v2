$(document).ready(function() {
    // User Registration Functionality
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
                toastr.success(response.message);

                setTimeout(() => {
                    window.location.href = '/login';
                }, 1000);
            },
            error: function (xhr) {
                console.error('Registration Error:', xhr.responseJSON);
                toastr.options = {
                    "positionClass": "toast-top-center"
                };
                toastr.error(xhr.responseJSON?.message);
            }
        });
    });

    // User Login Functionality
    $('#loginForm').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: $(this).serialize(),
            success: function (response) {
                $('#loginForm')[0].reset();

                toastr.options = {
                    "positionClass": "toast-top-center"
                };
                toastr.success(response.message);

                setTimeout(() => {
                    window.location.href = '/your-inventory';
                }, 1000);
            },
            error: function (xhr) {
                console.error('Login Error:', xhr.responseJSON);
                toastr.options = {
                    "positionClass": "toast-top-center"
                };
                toastr.error(xhr.responseJSON?.message);
            }
        });
    });
});
