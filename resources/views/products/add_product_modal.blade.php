<!-- Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <form action="" method="POST" id="addProductForm">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="addModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <div class="form-group mb-2">
                    <label for="name">Product Name</label>
                    <input type="text" class="form-control" name="name" id="name">
                    <p class="errMsg"></p>
                </div>
                <div class="form-group mb-2">
                    <label for="price">Product Price</label>
                    <input type="text" class="form-control" name="price" id="price">
                    <p class="errMsg"></p>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary add_product">Save product</button>
              </div>
            </div>
          </div>
    </form>
  </div>