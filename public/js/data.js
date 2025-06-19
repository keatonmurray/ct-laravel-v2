$(document).ready(function () {

    // Logic for fetching product data stored in the session
    function fetchProducts() {
        $.ajax({
            url: '/products/fetch-blade',
            method: 'GET',
            success: function (response) {
                $('#productTable tbody').html(response.html);
            },
            error: function () {
                alert('Failed to fetch product rows');
            }
        });
    }

    fetchProducts();

    // Logic for saving product data into the session
    $('#productForm').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: $(this).serialize(),
            success: function (response) {
                $('#productForm')[0].reset();

                toastr.options = {
                    "positionClass": "toast-top-center"
                };
                toastr.success('Product saved successfully!');

                fetchProducts();
            },
            error: function (xhr) {
                console.error('Error:', xhr.responseJSON);
                toastr.options = {
                    "positionClass": "toast-top-center"
                };
                toastr.error('Please fill out all fields.');
            }
        });
    });
});
