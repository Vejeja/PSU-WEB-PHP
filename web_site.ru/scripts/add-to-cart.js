function addToCart(itemId) {
    $.ajax({
        type: 'POST',
        url: 'add_to_cart.php',
        data: { id: itemId },
        success: function() {
            window.location.reload();
        },
        error: function(error) {
            console.error('Ошибка:', error);
        }
    });
}