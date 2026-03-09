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