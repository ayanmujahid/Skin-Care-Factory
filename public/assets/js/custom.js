$(document).on('click', '.quick-view-btn', function () {

  let productId = $(this).data('product-id');

  $.get('/product/quick-view/' + productId, function (product) {

    $('#modal-product-name').text(product.name);

    // Description
    $('#modal-description').html(product.long_description);

    $('#modal-category').text(product.category ? product.category.name : '');

    // Main Image
    if (product.main_image) {
      $('#modal-main-image').attr('src', '/storage/' + product.main_image.url);
    } else {
      $('#modal-main-image').attr('src', '/images/no-image.png');
    }


    // Gallery
    let gallery = '';

    product.gallery.forEach(img => {

      gallery += `<img src="/storage/${img.url}" width="70" class="gallery-thumb">`;

    });

    $('#modal-gallery').html(gallery);


    // Variants
    let variants = '';

    product.variants.forEach(v => {

      variants += `
            <div class="form-check">
            <input class="form-check-input"
            type="radio"
            name="variant"
            value="${v.id}"
            data-price="${v.price}">

            <label class="form-check-label">
            ${v.sku} - $${v.price}
            </label>
            </div>
            `;

    });

    $('#variant-options').html(variants);


    // Default price
    if (product.variants.length > 0) {
      $('#modal-price').text(product.variants[0].price);
    }


    // Select first variant
    $('input[name="variant"]').first().prop('checked', true);

    // Reset quantity
    $('#qty').val(1);

    $('#quickViewModal').modal('show');

  });

});

$(document).on('change', 'input[name=variant]', function () {

  let price = $(this).data('price');

  $('#modal-price').text(price);

});

$(document).on('click', '#add-to-cart-btn', function () {

  let variantId = $('input[name=variant]:checked').val();
  let qty = $('#qty').val();

  $.ajax({
    url: '/cart/add',
    method: 'POST',
    data: {
      variant_id: variantId,
      quantity: qty,
      _token: $('meta[name="csrf-token"]').attr('content')
    },

    success: function (res) {

      Swirl.fire({
        icon: 'success',
        title: 'Product added to cart'
      });

      $('#quickViewModal').modal('hide');

      loadCart();

      $('.cart-modal').addClass('open');
      $('.cart-modal-overlay').addClass('open');
    },

    error: function () {
      Swal.fire('Something went wrong');
    }

  });

});




// cart slider
function loadCart() {

  $.get('/cart/data', function (res) {

    let html = '';

    if (res.cart.length === 0) {

      html = '<p class="text-center">Cart is empty</p>';

    } else {

      res.cart.forEach(item => {

        html += `

<div class="cart-item d-flex gap-3 mb-3 position-relative">

<img src="${item.image}" width="60">

<div class="flex-grow-1">

<strong>${item.name}</strong>

<p class="mb-1">$${item.price}</p>

<div class="qty d-flex align-items-center gap-2">

<button class="qty-minus" data-id="${item.variant_id}">-</button>

<span class="qty-value">${item.quantity}</span>

<button class="qty-plus" data-id="${item.variant_id}">+</button>

</div>

</div>

<button class="remove-item" data-id="${item.variant_id}">&times;</button>

</div>

`;

      });

    }

    $('#cart-items').html(html);

    $('.cart-count').text(res.cart_count);

    $('#cart-total').text(res.cart_total.toFixed(2));

  });

}

$(document).on('click', '.remove-item', function () {

  let id = $(this).data('id');

  $.ajax({

    url: '/cart/remove',
    method: 'POST',

    data: {
      variant_id: id,
      _token: $('meta[name="csrf-token"]').attr('content')
    },

    success: function () {

      loadCart();

    }

  });

});

$(document).on('click', '.qty-plus', function () {

  let id = $(this).data('id');

  let qty = parseInt($(this).siblings('.qty-value').text()) + 1;

  updateCart(id, qty);

});

function updateCart(id, qty) {

  $.ajax({

    url: '/cart/update',
    method: 'POST',

    data: {
      variant_id: id,
      quantity: qty,
      _token: $('meta[name="csrf-token"]').attr('content')
    },

    success: function () {

      loadCart();

    }

  });

}



function loadCartPage() {

  $.get('/cart/data', function(res) {

    let html = '';

    if(res.cart.length === 0){
      html = '<p>Your cart is empty</p>';
    }

    res.cart.forEach(item => {

      let total = item.price * item.quantity;

      html += `

      <div class="cart-item">

        <div class="remove-btn remove-item" data-id="${item.variant_id}">×</div>

        <div class="cart-item-inner">

          <img src="${item.image}" alt="${item.name}">

          <div class="cart-details">

            <h3>${item.name}</h3>

            <p class="price">$${item.price}</p>

            <p class="variant">${item.size ?? ''} ${item.color ?? ''}</p>

            <div class="quantity-box">

              <button class="qty-minus" data-id="${item.variant_id}">-</button>

              <span class="qty-value">${item.quantity}</span>

              <button class="qty-plus" data-id="${item.variant_id}">+</button>

            </div>

            <p class="total">
              Total: <span class="bold">$${total.toFixed(2)}</span>
            </p>

          </div>

        </div>

      </div>

      `;

    });

    $('#cart-page-items').html(html);

    $('#summary-subtotal').text(res.cart_total.toFixed(2));

  });

}


$(document).on('click', '.qty-plus', function () {

  let id = $(this).data('id');
  let qty = parseInt($(this).siblings('.qty-value').text()) + 1;

  updateCart(id, qty);

  loadCartPage();
});


$(document).on('click', '.qty-minus', function () {

  let id = $(this).data('id');
  let qty = parseInt($(this).siblings('.qty-value').text()) - 1;

  if(qty < 1) qty = 1;

  updateCart(id, qty);

  loadCartPage();
});


$(document).on('click', '.remove-item', function () {

  let id = $(this).data('id');

  $.ajax({
    url: '/cart/remove',
    method: 'POST',
    data: {
      variant_id: id,
      _token: $('meta[name="csrf-token"]').attr('content')
    },
    success: function () {
      loadCartPage();
      loadCart(); // update modal cart also
    }
  });

});

$(document).ready(function () {

    loadCart();       // modal cart
    loadCartPage();   // cart page

});




// Wishlist toggle

$(document).ready(function() {

    // 1️⃣ Load wishlist count on page load
    function loadWishlistCount() {
        $.get('/wishlist/count', function(res) {
            $('.wishlist-count').text(res.count);
            $('.wishlist-title').text('Your Wishlist (' + res.count + ')');
        });
    }

    loadWishlistCount(); // call on page load

    // 2️⃣ Toggle wishlist from product card or quick-view (heart button)
    $(document).on('click', '.wishlist-btn', function(e) {
        e.preventDefault();

        let button = $(this);
        let productId = button.data('product-id');

        $.ajax({
            url: '/wishlist/toggle',
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                product_id: productId
            },
            success: function(response) {
                if(response.status === 'not_logged_in') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops!',
                        text: response.message,
                    });
                } else if(response.status === 'added') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Added!',
                        text: response.message,
                        timer: 1500,
                        showConfirmButton: false
                    });
                    button.find('i').addClass('text-danger'); // mark heart red
                    loadWishlistCount(); // update badge
                } else if(response.status === 'removed') {
                    Swal.fire({
                        icon: 'info',
                        title: 'Removed',
                        text: response.message,
                        timer: 1500,
                        showConfirmButton: false
                    });
                    button.find('i').removeClass('text-danger'); // remove red
                    loadWishlistCount(); // update badge
                }
            },
            error: function(xhr) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Something went wrong. Please try again.'
                });
            }
        });
    });

    // 3️⃣ Remove from wishlist page (remove button)
    $(document).on('click', '.remove-wishlist-btn', function() {
        let button = $(this);
        let productId = button.data('product-id');

        $.ajax({
            url: '/wishlist/toggle',
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                product_id: productId
            },
            success: function(response) {
                if(response.status === 'removed') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Removed!',
                        text: response.message,
                        timer: 1500,
                        showConfirmButton: false
                    });
                    $('#wishlist-row-' + productId).remove(); // remove row from table

                    loadWishlistCount(); // update header badge & wishlist count

                    // Optional: show empty message if wishlist is empty
                    if($('.wishlist-count').text() === "0"){
                        $('.cart-table').html('<p>Your wishlist is empty.</p>');
                    }
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message
                    });
                }
            },
            error: function(xhr){
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Something went wrong. Please try again.'
                });
            }
        });
    });

});