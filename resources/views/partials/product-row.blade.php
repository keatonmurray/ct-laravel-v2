<tr>
    <td>{{ $product['product_name'] ?? '' }}</td>
    <td>{{ $product['qty_in_stock'] ?? '' }}</td>
    <td>${{ $product['price_per_item'] ?? '' }}</td>
    <td>{{ $product['created_at'] ?? '' }}</td>
    <td>${{ 
        ($product['qty_in_stock'] ?? 0) * ($product['price_per_item'] ?? 0) 
    }}</td>
</tr>
