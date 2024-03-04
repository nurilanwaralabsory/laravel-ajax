<script src="https://kit.fontawesome.com/e8a2d6ee96.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $(document).ready(function() {
        $(document).on('click', '.add_product', function(e) {
            e.preventDefault();
            let name = $('#name').val();
            let price = $('#price').val();
            // console.log(name, price);
            $.ajax({
                url: "{{ url('products') }}",
                method: 'POST',
                data: {
                    name: name,
                    price: price
                },
                success: function(res) {
                    if (res.status == 'success') {
                        $('#addModal').modal('hide');
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: "success",
                            title: "Add product successfully"
                        });
                        $('#addProductForm')[0].reset();
                        $('.table').load(location.href + ' .table');
                    }
                },
                error: function(err) {
                    let error = err.responseJSON;
                    $('.errMsg').empty();
                    $.each(error.errors, function(fieldName, message) {
                        let $inputElement = $('[name="' + fieldName + '"]');
                        $inputElement.after('<span class="text-danger errMsg">' +
                            message + '</span>');
                    });
                }
            });
        });
        // show product value in update modal form
        $(document).on('click', '.update_product_form', function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            let name = $(this).data('name');
            let price = $(this).data('price');

            $('#up_id').val(id);
            $('#up_name').val(name);
            $('#up_price').val(price);
        });

        // update product data
        $(document).on('click', '.update_product', function(e) {
            e.preventDefault();
            let up_id = $('#up_id').val();
            let up_name = $('#up_name').val();
            let up_price = $('#up_price').val();
            $.ajax({
                url: "{{ url('products') }}" + '/' + up_id,
                method: 'POST',
                headers: {
                    'X-HTTP-Method-Override': 'PUT'
                },
                data: {
                    up_id: up_id,
                    up_name: up_name,
                    up_price: up_price,
                },
                success: function(res) {
                    if (res.status == 'success') {
                        $('#updateModal').modal('hide');
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: "success",
                            title: "Update product successfully"
                        });
                        $('#updateProductForm')[0].reset();
                        $('.table').load(location.href + ' .table');
                    }
                },
                error: function(err) {
                    let error = err.responseJSON;
                    $('.errMsg').empty();
                    $.each(error.errors, function(fieldName, message) {
                        let $inputElement = $('[name="' + fieldName + '"]');
                        $inputElement.after('<span class="text-danger errMsg">' +
                            message + '</span>');
                    });
                }
            });
        });

        // delete product data
        $(document).on('click', '.delete_product', function(e) {
            e.preventDefault();
            let product_id = $(this).data('id');
            let product_name = $(this).data('name');
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ url('products') }}" + '/' + product_id,
                        method: 'POST',
                        headers: {
                            'X-HTTP-Method-Override': 'DELETE'
                        },
                        data: {
                            product_id: product_id
                        },
                        success: function(res) {
                            if (res.status == 'success') {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: product_name +
                                        " has been deleted.",
                                    icon: "success"
                                });
                                $('.table').load(location.href + ' .table');
                            }
                        },
                        error: function(err) {
                            let error = err.responseJSON;
                            $('.errMsg').empty();
                            $.each(error.errors, function(fieldName, message) {
                                let $inputElement = $('[name="' +
                                    fieldName + '"]');
                                $inputElement.after(
                                    '<span class="text-danger errMsg">' +
                                    message + '</span>');
                            });
                        }
                    });
                }
            });
        });

        $(document).on('keyup', '#search', function(e) {
            let search = $(this).val();
            $.ajax({
                url: "{{ url('products') }}",
                method: 'GET',
                data: {
                    search: search
                },
                success: function(res) {
                    $('.table-data').html(res);
                }
            })
        })
    });
</script>
