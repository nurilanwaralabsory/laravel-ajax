<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel Ajax CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h2 class="my-3 text-center">Abzhor App</h2>
                <button type="button" class="btn btn-primary my-2" data-bs-toggle="modal" data-bs-target="#addModal">
                 <i class="fa-solid fa-circle-plus"></i> Add Product
                </button>
                <div class="table-data">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td style="width: 20%">
                              <button class="btn btn-info"><i class="fa-solid fa-circle-info text-white"></i></button>
                              <button class="btn btn-warning"><i class="fa-solid fa-square-pen text-white"></i></button>
                              <button class="btn btn-danger"><i class="fa-solid fa-trash text-white"></i></button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
    @include('products.add_product_modal')
    @include('products.product_js')
  </body>
</html>