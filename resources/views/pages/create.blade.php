@extends('layout')

@section('content')
<div class="container-fluid my-3">
    <div class="row">
        {{-- Product Listing Form --}} 
        <div class="col-12 col-md-6">
            <div class="card border-0 shadow-lg">
                <div class="card-body py-4 px-md-5 px-4">
                    <h4 class="fw-500">
                        <i class="fa-solid fa-screwdriver-wrench me-1"></i>
                        MANAGE YOUR INVENTORY
                    </h4>
                    <div class="clearfix"></div>
                    <hr />
                    <form id="productForm" action="{{ route('store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="product_name" class="form-label">Product Name</label>
                            <input type="text" name="product_name" class="form-control text-muted small" id="product_name">
                        </div>
                        <div class="mb-4">
                            <label for="qty_in_stock" class="form-label">Quantity In Stock</label>
                            <input type="number" name="qty_in_stock" class="form-control text-muted small" id="qty_in_stock">
                        </div>
                        <div class="mb-4">
                            <label for="price_per_item" class="form-label">Price Per Item</label>
                            <input type="number" name="price_per_item" class="form-control text-muted small" id="price_per_item">
                        </div>
                        <button type="submit" class="btn btn-secondary float-end fw-bold">
                            <i class="fa-solid fa-cloud-arrow-up me-1"></i>
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Product List Display --}}
        <div class="col-12 col-md-6">
            <div class="card border-0 shadow-lg mt-4 mt-md-0">
                <div class="card-body py-4 px-md-5 px-4">
                    <h5 class="fw-500">
                        <i class="fa-brands fa-product-hunt me-1"></i>
                        PRODUCTS
                    </h5>
                    <div class="clearfix"></div>
                    <hr />

                    <div class="table-responsive mt-4">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="fw-500 text-nowrap" style="min-width: 150px;">Product Name</th>
                                    <th class="fw-500 text-nowrap" style="min-width: 180px;">Quantity In Stock</th>
                                    <th class="fw-500 text-nowrap" style="min-width: 160px;">Price Per Item</th>
                                    <th class="fw-500 text-nowrap" style="min-width: 160px;">Submitted On</th>
                                    <th class="fw-500 text-nowrap" style="min-width: 140px;">Item Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-nowrap">T-Shirt</td>
                                    <td class="text-nowrap">10</td>
                                    <td class="text-nowrap">$50</td>
                                    <td class="text-nowrap">Dec-23-2023</td>
                                    <td class="text-nowrap">$500</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>        
</div>
@endsection
