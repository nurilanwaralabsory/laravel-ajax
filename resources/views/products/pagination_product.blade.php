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
      @foreach ($products as $product)
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $product->name }}</td>
        <td>{{ $product->price }}</td>
        <td style="width: 20%">
          <button 
            class="btn btn-warning update_product_form" 
            type="button" 
            data-bs-toggle="modal" 
            data-bs-target="#updateModal"
            data-id="{{ $product->id }}"
            data-name="{{ $product->name }}"
            data-price="{{ $product->price }}"
            >
              <i class="fa-solid fa-square-pen text-white"></i>
          </button>
          <button class="btn btn-danger delete_product" 
            type="button" 
            data-id="{{ $product->id }}"
            data-name="{{ $product->name }}">
            <i class="fa-solid fa-trash text-white"></i>
          </button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $products->links() }}