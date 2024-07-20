function removeFromCart(itemId) {
    $.ajax({
        type: 'POST',
        url: 'remove_from_cart.php',
        data: { id: itemId },
        success: function() {
            window.location.reload();
        },
        error: function(error) {
            console.error('Ошибка:', error);
        }
    });
}