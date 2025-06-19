<div class="modal fade" id="editResourceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" class="fw-bold" id="exampleModalLabel">
            <i class="fa-solid fa-screwdriver-wrench me-1"></i>
            UPDATE DETAILS
        </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="editProductForm" action="{{ route('updateResource') }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Hidden dynamic resource ID --}}
            <input type="hidden" name="id" id="resource_id">

            <div class="mb-4">
                <label for="old_product_name" class="form-label">Product Name</label>
                <input type="text" name="product_name" class="form-control text-muted small" id="old_product_name">
            </div>
            <div class="mb-4">
                <label for="old_qty_in_stock" class="form-label">Quantity In Stock</label>
                <input type="number" name="qty_in_stock" class="form-control text-muted small" id="old_qty_in_stock">
            </div>
            <div class="mb-4">
                <label for="old_price_per_item" class="form-label">Price Per Item</label>
                <input type="number" name="price_per_item" class="form-control text-muted small" id="old_price_per_item" step="0.01" min="0">
            </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary fw-bold" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary float-end fw-bold">
                    <i class="fa-solid fa-cloud-arrow-up me-1"></i>
                    Save
                </button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>