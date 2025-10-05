<?php require __DIR__ . '/php/session.php'; ?>
<!doctype html>
<html lang="el">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Cart</title>
  <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<?php include __DIR__ . '/php/nav.php'; ?>
<main>
  <h2>My Cart</h2>
  <section class="card" id="cart-root"></section>
</main>
<footer>© 2025</footer>

<script src="/assets/js/cart.js"></script>
<script>
(function(){
  const root = document.getElementById("cart-root");
  const money = n => "€" + n.toFixed(2).replace(".", ",");
  function render(){
    const items = CartAPI.getCart();
    if (!items.length) { root.innerHTML = "<p>Your Cart is Empty.</p>"; CartAPI.updateBadge(); return; }
    let total = items.reduce((s,it)=>s+it.price*it.qty,0);
    root.innerHTML = `
      <table class="table" style="width:100%">
        <thead><tr><th>Product</th><th>Price</th><th>Quantity</th><th>Total</th><th></th></tr></thead>
        <tbody>
          ${items.map(it => `
            <tr>
              <td><img src="${it.img}" alt="" style="width:40px;height:40px;object-fit:cover;margin-right:8px;vertical-align:middle"> ${it.name}</td>
              <td>${money(it.price)}</td>
              <td>${it.qty}</td>
              <td>${money(it.price*it.qty)}</td>
              <td><button class="btn" data-remove="${it.id}">Remove from Cart</button></td>
            </tr>`).join("")}
        </tbody>
        <tfoot><tr><th colspan="3" style="text-align:right">Total:</th><th>${money(total)}</th><th></th></tr></tfoot>
      </table>

      <div class="cart-actions" style="margin-top:1rem; display:flex; gap:.75rem; justify-content:flex-end">
        <button class="btn" id="buy-btn">Buy</button>
      </div>`;
  }
  root.addEventListener("click", (e)=>{
    const id = e.target.getAttribute("data-remove");
    if (id) {
      CartAPI.removeItem(parseInt(id,10));
      render();
    }
  });
  root.addEventListener("click", (e)=>{
    if (e.target && e.target.id === "buy-btn") {
      CartAPI.buy(); // 👉 navigate to the GIF page
    }
  });
  render();
})();
</script>
</body>
</html>
