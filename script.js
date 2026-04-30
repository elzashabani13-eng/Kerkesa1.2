const products = [
    { id: 1, name: "Smart Refrigerator.", price: 899 ,image:"images/Smart Refrigerator.avif"},
    { id: 2, name: "Washing Machine", price: 550,image:"images/Washing Machine.avif" },
    { id: 3, name: "OLED Smart TV", price: 1200 ,image:"images/OLED Smart TV.avif"},
    { id: 4, name: "Microwave Oven", price: 180,image:"images/Microwave Oven.avif" },
    { id: 5, name: "Air Conditioner", price: 650,image:"images/Air Conditioner.avif"},
    { id: 6, name: "Dishwasher", price: 500,image:"images/Dishwasher.avif" },
    { id: 7, name: "Coffee Machine", price: 120,image:"images/Coffee Machine.avif" },
    { id: 8, name: "Vacuum Cleaners", price: 250 ,image:"images/Vacuum Cleaners.avif"},
    { id: 9, name: "Electric Grill", price: 95,image:"images/Electric Grill.avif" },
    { id: 10, name: "Blender Pro", price: 70 ,image:"images/Blender Pro.avif"},
    { id: 11, name: "Toaster", price: 45,image:"images/Toaster.avif" },
    { id: 12, name: "Steam Iron", price: 55,image:"images/Steam Iron.avif" },
    { id: 13, name: "Air Fryer", price: 140 ,image:"images/Air Fryer.avif"},
    { id: 14, name: "Water Heater", price: 190,image:"images/Water Heater.avif"},
    { id: 15, name: "Induction Hob", price: 300 ,image:"images/Induction Hob.avif"},
    { id: 16, name: "Humidifier", price: 60 ,image:"images/Humidifier.avif"},
    { id: 17, name: "Stand Mixer", price: 280 ,image:"images/Stand Mixer.avif"},
    { id: 18, name: "Hair Dryer", price: 40 ,image:"images/Hair Dryer.avif"},
    { id: 19, name: "Electric Kettle", price: 35,image:"images/Electric Kettle.avif" },
    { id: 20, name: "Security Camera", price: 110,image:"images/Security Camera.avif" }
];

let cart = [];

function showPage(id) {
    document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
    
    const activePage = document.getElementById(id);
    if (activePage) {
        activePage.classList.add('active');
    }

    const navLinks = document.getElementById('navLinks');
    if (navLinks.classList.contains('active')) {
        navLinks.classList.remove('active');
    }

    if (id === 'cart') {
        renderCart();
    }
}

function toggleMenu() {
    const navLinks = document.getElementById('navLinks');
    navLinks.classList.toggle('active');
}

function renderProducts(data = products) {
    const grid = document.getElementById('productGrid');
    if (!grid) return;

    grid.innerHTML = data.map(p => `
        <div class="card">
            <!-- KËTU SHTOHET FOTOJA -->
            <div class="product-img-container">
                <img src="${p.image || 'https://via.placeholder.com/200'}" alt="${p.name}" class="product-img">
            </div>
            <h3>${p.name}</h3>
            <span class="price">$${p.price}</span>
            <button class="cta-btn main-btn" onclick="addToCart(${p.id})" style="width:100%">Add to Cart</button>
        </div>
    `).join('');
}

function addToCart(id) {
    const item = products.find(p => p.id === id);
    cart.push(item);
    
    document.getElementById('cart-count').innerText = cart.length;
    
    alert(`${item.name} u shtua në shportë!`);
}

function renderCart() {
    const container = document.getElementById('cart-items');
    const totalSpan = document.getElementById('total-price');
    if (!container) return;

    if (cart.length === 0) {
        container.innerHTML = "<p style='text-align:center; padding:20px; color:#666;'>Your cart is empty.</p>";
        totalSpan.innerText = "0";
        return;
    }

    let total = 0;
    container.innerHTML = cart.map((item, index) => {
        total += item.price;
        return `
            <div class="cart-item">
                <span>${item.name}</span>
                <span>
                    $${item.price} 
                    <i class="fas fa-trash" onclick="removeFromCart(${index})" style="color:#ff4d4d; cursor:pointer; margin-left:15px;"></i>
                </span>
            </div>
        `;
    }).join('');
    
    totalSpan.innerText = total;
}

function removeFromCart(index) {
    cart.splice(index, 1);
    document.getElementById('cart-count').innerText = cart.length;
    renderCart(); 
}

function filterProducts() {
    const term = document.getElementById('searchInput').value.toLowerCase();
    const filtered = products.filter(p => p.name.toLowerCase().includes(term));
    renderProducts(filtered);
}

window.onload = () => {
    renderProducts();
};