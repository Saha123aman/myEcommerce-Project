      
   $(document).ready(function() {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    $('.removebtn').on('click', function() {
        var itemId = $(this).data('item-id');
        console.log(itemId);

        $.ajax({
            url: '/cart/remove/' + itemId, // Correctly formatted URL
            method: 'POST', // Use POST as per the route definition
            data: {
                _token: csrfToken // Include CSRF token for security
            },
            dataType: 'JSON',
            success: function(response) {
                if (response.success) {
                    console.log(response);
                    $('.removebtn[data-item-id="' + itemId + '"]').closest('.card').remove();
                    $('.cart-badge').text(response.cartCount);
                    updateOrderSummary();
                    // Optionally update the UI, e.g., remove the item from the DOM
                } else {
                    console.log(response);
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    });
});

    
document.querySelectorAll('.quantity-btn').forEach(button => {
    button.addEventListener('click', function() {
        const input = this.parentElement.querySelector('.quantity-input');
        const action = this.dataset.action;
        const currentValue = parseInt(input.value);

        if (action === 'increase') {
            input.value = currentValue + 1;
        } else if (action === 'decrease' && currentValue > 1) {
            input.value = currentValue - 1;
        }

        updateItemTotal(this);
    });
});
document.querySelectorAll('.removeButton').forEach(button => {
    button.addEventListener('click', function() {
        const card = this.closest('.card');
        card.remove();
        updateOrderSummary(); // Update the summary after removing an item
    });
});

document.querySelectorAll('.quantity-input').forEach(input => {
    input.addEventListener('change', function() {
        updateItemTotal(this);
    });
});

function updateItemTotal(element) {
    const card = element.closest('.card');
    const priceElement = card.querySelector('.product-price');
    const quantityInput = card.querySelector('.quantity-input');
    const itemTotalElement = card.querySelector('.item-total');

    const price = parseFloat(priceElement.dataset.price);
    const quantity = parseInt(quantityInput.value);
    const total = price * quantity;

    itemTotalElement.textContent = `$${total.toFixed(2)}`;
    
    updateOrderSummary();
}

function updateOrderSummary() {
    const itemTotals = document.querySelectorAll('.item-total');
    let subtotal = 0;

    itemTotals.forEach(item => {
        subtotal += parseFloat(item.textContent.replace('$', ''));
    });

    const shipping = 5.00; // Fixed shipping cost
    const taxRate = 0.05; // 5% tax rate
    const tax = subtotal * taxRate;
    const total = subtotal + shipping + tax;

    document.getElementById('subtotal').textContent = `$${subtotal.toFixed(2)}`;
    document.getElementById('shipping').textContent = `$${shipping.toFixed(2)}`;
    document.getElementById('tax').textContent = `$${tax.toFixed(2)}`;
    document.getElementById('total').textContent = `$${total.toFixed(2)}`;
}


updateOrderSummary();
