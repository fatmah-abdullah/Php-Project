// ====================================================================
// 1. UI ELEMENT SELECTORS AND CART TOGGLE
// ====================================================================

const cartIcon = document.querySelector("#cart-icon");
const cart = document.querySelector(".cart");
const cartClose = document.querySelector("#cart-close");
const cartContent = document.querySelector(".cart-content");
const productContent = document.querySelector(".product-content");

// عرض وإخفاء الكارت
cartIcon.addEventListener("click", () => cart.classList.add("active"));
cartClose.addEventListener("click", () => cart.classList.remove("active"));

// ====================================================================
// 2. CORE CART FUNCTIONS
// ====================================================================

const updateTotalPrice = () => {
    const totalPriceElement = document.querySelector(".total-price");
    const cartBoxes = cartContent.querySelectorAll(".cart-box");
    let total = 0;

    cartBoxes.forEach(cartBox => {
        const priceElement = cartBox.querySelector(".cart-price");
        const quantityElement = cartBox.querySelector(".number");
        const price = parseFloat(priceElement.textContent.replace("$", ""));
        const quantity = parseInt(quantityElement.textContent);

        if (!isNaN(price) && !isNaN(quantity)) {
            total += price * quantity;
        }
    });

    totalPriceElement.textContent = `$${total.toFixed(2)}`;
};

let cartItemCount = 0;

const updateCartCount = change => {
    const cartItemCountBadge = document.querySelector(".count");
    cartItemCount += change;

    if (cartItemCount > 0) {
        cartItemCountBadge.style.visibility = "visible";
        cartItemCountBadge.textContent = cartItemCount;
    } else {
        cartItemCountBadge.style.visibility = "hidden";
        cartItemCountBadge.textContent = "";
    }
};

const setupCartBoxEventListeners = (cartBox) => {
    cartBox.querySelector(".delete-icon").addEventListener("click", () => {
        cartBox.remove();
        updateCartCount(-1);
        updateTotalPrice();
    });

    cartBox.querySelector(".cart-quantity").addEventListener("click", event => {
        const numberElement = cartBox.querySelector(".number");
        const decrementButton = cartBox.querySelector("#decrement");
        let quantity = parseInt(numberElement.textContent);

        if (event.target.id === "decrement" && quantity > 1) {
            quantity--;
            if (quantity === 1) decrementButton.style.color = "#999";
        } else if (event.target.id === "increment") {
            quantity++;
            decrementButton.style.color = "#492408";
        }

        numberElement.textContent = quantity;
        updateTotalPrice();
    });
};

const addToCart = productBox => {
    const productImgSrc = productBox.querySelector("img").src;
    const productTitle = productBox.querySelector(".product-name").textContent;
    const productPrice = productBox.querySelector(".price").textContent;

    // منع التكرار
    const cartItems = cartContent.querySelectorAll(".cart-product-title");
    for (let item of cartItems) {
        if (item.textContent === productTitle) {
            alert("This Product is Already in The Cart.");
            return;
        }
    }

    const cartBox = document.createElement("div");
    cartBox.classList.add("cart-box");
    cartBox.innerHTML = `
        <img src="${productImgSrc}" class="cart-img">
        <div class="cart-detail">
            <h2 class="cart-product-title">${productTitle}</h2>
            <span class="cart-price">${productPrice}</span>
            <div class="cart-quantity">
                <button id="decrement">-</button>
                <span class="number">1</span>
                <button id="increment">+</button>
            </div>
        </div>
        <img src="menu/bin.png" class="delete-icon">
    `;

    cartContent.appendChild(cartBox);
    setupCartBoxEventListeners(cartBox);
    updateCartCount(1);
    updateTotalPrice();
};

// ====================================================================
// 3. BUY NOW WITH SAVE TO DATABASE
// ====================================================================

const buyNowButton = document.querySelector(".btn-buy");
buyNowButton.addEventListener("click", () => {
    const cartBoxes = cartContent.querySelectorAll(".cart-box");
    if (cartBoxes.length === 0) {
        alert("Your Cart is Empty. Please Add Something to Your Cart Before Buying.");
        return;
    }

    // تجهيز بيانات الكارت للإرسال للـ PHP
    const cartData = [];
    cartBoxes.forEach(box => {
        const name = box.querySelector(".cart-product-title").textContent;
        const price = parseFloat(box.querySelector(".cart-price").textContent.replace("$",""));
        const quantity = parseInt(box.querySelector(".number").textContent);
        cartData.push({name, price, quantity});
    });

    // إرسال بيانات الكارت للـ PHP باستخدام fetch
    fetch('save_order.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({cart: cartData})
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            cartBoxes.forEach(cartBox => cartBox.remove());
            cartItemCount = 0;
            updateCartCount(0);
            updateTotalPrice();
            alert("Thank You For Your Purchase! Order Saved.");
        } else {
            alert("Error saving order: " + data.message);
        }
    })
    .catch(err => {
        alert("Error: " + err);
    });
});

// ====================================================================
// 4. EVENT DELEGATION FOR ADD TO CART BUTTONS
// ====================================================================

productContent.addEventListener("click", (event) => {
    if (event.target.classList.contains("add-cart")) {
        const productBox = event.target.closest(".product-box");
        if (productBox) addToCart(productBox);
    }
});
