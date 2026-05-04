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

  let productId = $('input[name=variant]:checked').val();
  let qty = $('#qty').val();

  let url = (window.CART_MODE === 'professional')
    ? '/professional/cart/add'
    : '/cart/add';

  let payload = (window.CART_MODE === 'professional')
    ? {
      variant_id: productId,
      quantity: qty,
      _token: $('meta[name="csrf-token"]').attr('content')
    }
    : {
      variant_id: productId,
      quantity: qty,
      _token: $('meta[name="csrf-token"]').attr('content')
    };

  $.ajax({
    url: url,
    method: 'POST',
    data: payload,

    success: function (res) {

      Swirl.fire({
        icon: 'success',
        title: res.message || 'Added to cart'
      });

      $('#quickViewModal').modal('hide');

      if (window.CART_MODE === 'professional') {
        loadProfessionalCart();   // 🔥 IMPORTANT
      } else {
        loadCart();
      }

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

function loadProfessionalCart() {

  $.get('/professional/cart/current', function (res) {

    let html = '';

    if (!res.items || res.items.length === 0) {
      html = '<p class="text-center">Cart is empty</p>';
    } else {

      res.items.forEach(item => {

        html += `
        <div class="cart-item d-flex gap-3 mb-3 position-relative">

          <img src="${item.product.main_image ? '/storage/' + item.product.main_image : '/images/no-image.png'}" width="60">

          <div class="flex-grow-1">
            <strong>${item.product.name}</strong>
            <p class="mb-1">$${item.product.price}</p>

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
    $('.cart-count').text(res.items.length);
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

  if (window.CART_MODE === 'professional') {

    $.get('/professional/cart/current', function (res) {
      console.log("PAGE CART RESPONSE:", res);

      let html = '';
      let total = 0;

      if (!res.items || res.items.length === 0) {
        $('#cart-page-items').html('<p>Your cart is empty</p>');
        $('#summary-subtotal').text('0');
        return;
      }

      res.items.forEach(item => {

        let price = parseFloat(item.product.price || 0);
        let itemTotal = price * item.quantity;

        total += itemTotal;

        html += `
  <div class="cart-item">

    <div class="cart-item-inner">

      <img src="${item.product.main_image ? '/storage/' + item.product.main_image : '/images/no-image.png'}">

      <div class="cart-details">

        <h3>${item.product.name}</h3>
        <p class="price">$${price}</p>

        <div class="quantity-box">
          <button class="qty-minus" data-id="${item.variant_id}">-</button>
          <span class="qty-value">${item.quantity}</span>
          <button class="qty-plus" data-id="${item.variant_id}">+</button>
        </div>

        <p class="total">
          Total: <span class="bold">$${itemTotal.toFixed(2)}</span>
        </p>

      </div>

    </div>

  </div>
  `;
      });

      $('#cart-page-items').html(html);
      $('#summary-subtotal').text(total.toFixed(2));

    });

  } else {

    // NORMAL CART (unchanged)
    $.get('/cart/data', function (res) {

      let html = '';

      if (res.cart.length === 0) {
        html = '<p>Your cart is empty</p>';
      }

      res.cart.forEach(item => {

        let total = item.price * item.quantity;

        html += `
        <div class="cart-item">

          <div class="remove-btn remove-item" data-id="${item.variant_id}">×</div>

          <div class="cart-item-inner">

            <img src="${item.image}">

            <div class="cart-details">

              <h3>${item.name}</h3>
              <p>$${item.price}</p>

              <div class="quantity-box">

                <button class="qty-minus" data-id="${item.variant_id}">-</button>
                <span class="qty-value">${item.quantity}</span>
                <button class="qty-plus" data-id="${item.variant_id}">+</button>

              </div>

              <p>Total: $${total.toFixed(2)}</p>

            </div>

          </div>

        </div>`;
      });

      $('#cart-page-items').html(html);
      $('#summary-subtotal').text(res.cart_total.toFixed(2));

    });
  }
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

  if (qty < 1) qty = 1;

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

  if (window.CART_MODE === 'professional') {
    loadProfessionalCart();
    loadCartPage();

  } else {
    loadCart();
    loadCartPage();
  }

});




// Wishlist toggle

$(document).ready(function () {

  // 1️⃣ Load wishlist count on page load
  function loadWishlistCount() {
    $.get('/wishlist/count', function (res) {
      $('.wishlist-count').text(res.count);
      $('.wishlist-title').text('Your Wishlist (' + res.count + ')');
    });
  }

  loadWishlistCount(); // call on page load

  // 2️⃣ Toggle wishlist from product card or quick-view (heart button)
  $(document).on('click', '.wishlist-btn', function (e) {
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
      success: function (response) {
        if (response.status === 'not_logged_in') {
          Swal.fire({
            icon: 'warning',
            title: 'Oops!',
            text: response.message,
          });
        } else if (response.status === 'added') {
          Swal.fire({
            icon: 'success',
            title: 'Added!',
            text: response.message,
            timer: 1500,
            showConfirmButton: false
          });
          button.find('i').addClass('text-danger'); // mark heart red
          loadWishlistCount(); // update badge
        } else if (response.status === 'removed') {
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
      error: function (xhr) {
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'Something went wrong. Please try again.'
        });
      }
    });
  });

  // 3️⃣ Remove from wishlist page (remove button)
  $(document).on('click', '.remove-wishlist-btn', function () {
    let button = $(this);
    let productId = button.data('product-id');

    $.ajax({
      url: '/wishlist/toggle',
      type: 'POST',
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        product_id: productId
      },
      success: function (response) {
        if (response.status === 'removed') {
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
          if ($('.wishlist-count').text() === "0") {
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
      error: function (xhr) {
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'Something went wrong. Please try again.'
        });
      }
    });
  });

});



// professional updating cart

$(document).on('click', '.qty-plus', function () {

  let id = $(this).data('id');
  let qty = parseInt($(this).siblings('.qty-value').text()) + 1;

  $.post('/professional/cart/update', {
    variant_id: id,
    quantity: qty,
    _token: $('meta[name="csrf-token"]').attr('content')
  }, function () {
    loadProfessionalCart();
  });

});

$(document).on('click', '.qty-minus', function () {

  let id = $(this).data('id');
  let qty = parseInt($(this).siblings('.qty-value').text()) - 1;

  if (qty < 1) qty = 1;

  $.post('/professional/cart/update', {
    variant_id: id,
    quantity: qty,
    _token: $('meta[name="csrf-token"]').attr('content')
  }, function () {
    loadProfessionalCart();
  });

});

$(document).on('click', '.remove-item', function () {

  let id = $(this).data('id');

  $.post('/professional/cart/remove', {
    variant_id: id,
    _token: $('meta[name="csrf-token"]').attr('content')
  }, function () {
    loadProfessionalCart();
  });

});



// point system integration
function loadPoints() {
  $.get('/points/balance', function (res) {
    $('#my-points').text(res.points);
  });
}

loadPoints();

$(document).on('click', '#apply-points', function () {

  let points = $('#use-points').val();

  $.post('/professional/apply-points', {
    points: points,
    _token: $('meta[name="csrf-token"]').attr('content')
  }, function () {
    loadCartPage(); // recalculates discount
    loadPoints();
  });

});

$(document).on('click', '#remove-points', function () {

  $.post('/professional/remove-points', {
    _token: $('meta[name="csrf-token"]').attr('content')
  }, function () {
    loadCartPage();
    loadPoints();
  });

});

$(document).on('click', '#generate-link-btn', function () {

  $.post('/professional/generate-link', {
    _token: $('meta[name="csrf-token"]').attr('content')
  }, function (res) {

    if (res.status === 'error') {
      Swal.fire({
        icon: 'error',
        title: 'Error',
        text: res.message
      });
      return;
    }

    Swal.fire({
      icon: 'success',
      title: 'Link Generated',
      html: `<a href="${res.link}" target="_blank">${res.link}</a>`
    });

  });

});