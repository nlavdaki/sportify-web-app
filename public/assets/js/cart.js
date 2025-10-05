(function () {
  const KEY = "cart_items_v1";

  function getCart() {
    try { return JSON.parse(localStorage.getItem(KEY)) || []; }
    catch { return []; }
  }
  function setCart(items) {
    localStorage.setItem(KEY, JSON.stringify(items));
    updateBadge();
  }
  function updateBadge() {
    const count = getCart().reduce((a, it) => a + it.qty, 0);
    const el = document.getElementById("cart-count");
    if (el) el.textContent = count > 0 ? String(count) : "";
  }
  function addItem(item) {
    const items = getCart();
    const idx = items.findIndex(x => x.id === item.id);
    if (idx >= 0) { items[idx].qty += 1; }
    else { items.push({...item, qty: 1}); }
    setCart(items);
  }
  function removeItem(id) {
    const items = getCart().filter(x => x.id !== id);
    setCart(items);
  }

  // 👉 Buy action (navigate to the GIF) Fun Optional
  function buy() {
    // Optional: clear cart before redirect
    // setCart([]);
    window.open("https://giphy.com/gifs/gq-kim-kardashian-make-it-rain-money-shower-3o6gDWzmAzrpi5DQU8", "_blank");

  }

  // Wire “Add” buttons
  document.addEventListener("click", (e) => {
    const btn = e.target.closest(".add-to-cart");
    if (!btn) return;
    const id = parseInt(btn.dataset.id, 10);
    const name = btn.dataset.name;
    const price = parseFloat(btn.dataset.price);
    const img = btn.dataset.img;
    if (!id || !name || isNaN(price)) return;

    addItem({ id, name, price, img });
    btn.textContent = "Added ✓";
    setTimeout(() => (btn.textContent = "Add"), 1200);
  });

  // Expose for cart page
  window.CartAPI = { getCart, setCart, removeItem, updateBadge, addItem, buy };
  updateBadge();
})();
