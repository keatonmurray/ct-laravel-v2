$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

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

     // Refresh Product List
    $('#refreshBtn').on('click', function () {
        location.reload();
    });

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

    // Logic for deleting specified resource
    $(document).on('click', '#delete-product', function () {
        const id = $(this).data('id');

        $.ajax({
            url: '/destroy',
            method: 'DELETE',
            data: { id },
            success: function (response) {
                toastr.options = {
                    "positionClass": "toast-top-center"
                };
                toastr.success(response.message);
                fetchProducts();
            },
            error: function () {
                toastr.options = {
                    "positionClass": "toast-top-center"
                };
                toastr.error('Failed to delete product');
            }
        });
    });

    // When Edit Modal opens, fetch the form values
    $(document).on('click', '.btn-edit', function () {
        const btn = $(this);
        $('#resource_id').val(btn.data('id'));
        $('#old_product_name').val(btn.data('name'));
        $('#old_qty_in_stock').val(btn.data('qty'));
        $('#old_price_per_item').val(btn.data('price'));
    });

    $('#editProductForm').on('submit', function (e) {
        e.preventDefault();

        const form = $(this);
        const formData = new FormData(this);
        formData.append('_method', 'PUT');

        $.ajax({
            url: form.attr('action'),
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                $('#editResourceModal').modal('hide');
                toastr.options = {
                    "positionClass": "toast-top-center"
                };
                toastr.success(response.message);
                fetchProducts();
            },
            error: function (xhr) {
                if (xhr.responseJSON?.errors) {
                    Object.values(xhr.responseJSON.errors).forEach(error => {
                        toastr.error(error[0]);
                    });
                } else {
                    toastr.options = {
                    "positionClass": "toast-top-center"
                };
                    toastr.error('Update failed');
                }
            }
        });
    });
});
