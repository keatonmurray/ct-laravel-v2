<tr>
    <td class="align-middle">{{ $product['product_name'] ?? '' }}</td>
    <td class="align-middle">{{ $product['qty_in_stock'] ?? '' }}</td>
    <td class="align-middle">${{ $product['price_per_item'] ?? '' }}</td>
    <td class="align-middle">{{ $product['created_at'] ?? '' }}</td>
    <td class="align-middle">${{ 
        ($product['qty_in_stock'] ?? 0) * ($product['price_per_item'] ?? 0) 
    }}</td>
    <td class="text-nowrap align-middle">
        <div class="d-flex gap-1">
            <button class="btn btn-secondary fw-bold btn-sm d-inline-flex align-items-center">
                <i class="fa-solid fa-pen-to-square me-1"></i> 
                Edit
            </button>
            <button class="btn btn-secondary fw-bold btn-sm d-inline-flex align-items-center">
                <i class="fa-solid fa-trash me-1"></i> 
                Delete
            </button>
        </div>
    </td>
</tr>
