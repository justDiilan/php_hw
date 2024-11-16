let products = [
    { name: "Телефон", price: 300 },
    { name: "Ноутбук", price: 1000 },
    { name: "Наушники", price: 50 },
];

function displayProducts() {
    const list = document.getElementById("productList");
    list.innerHTML = "";
    products.forEach((product, index) => {
        const div = document.createElement("div");
        div.textContent = `${index + 1}. ${product.name} - $${product.price}`;
        list.appendChild(div);
    });
}

function sortItems(method) {
    if (method === "quick") {
        products.sort((a, b) => a.price - b.price);
    } else if (method === "bubble") {
        for (let i = 0; i < products.length - 1; i++) {
            for (let j = 0; j < products.length - i - 1; j++) {
                if (products[j].price > products[j + 1].price) {
                    [products[j], products[j + 1]] = [products[j + 1], products[j]];
                }
            }
        }
    }
    displayProducts();
}

function searchItem(type) {
    const query = document.getElementById("searchInput").value.toLowerCase();
    if (type === "binary") {
        products.sort((a, b) => a.name.localeCompare(b.name));
        let left = 0, right = products.length - 1;
        while (left <= right) {
            const mid = Math.floor((left + right) / 2);
            if (products[mid].name.toLowerCase() === query) {
                alert(`Найдено: ${products[mid].name}`);
                return;
            } else if (products[mid].name.toLowerCase() < query) {
                left = mid + 1;
            } else {
                right = mid - 1;
            }
        }
    } else if (type === "linear") {
        const product = products.find(p => p.name.toLowerCase() === query);
        if (product) {
            alert(`Найдено: ${product.name}`);
        } else {
            alert("Товар не найден");
        }
    }
}

function reverseList() {
    products.reverse();
    displayProducts();
}

function changeCase() {
    products = products.map(product => ({
        ...product,
        name: product.name === product.name.toUpperCase() ? product.name.toLowerCase() : product.name.toUpperCase(),
    }));
    displayProducts();
}

function filterByPrice(order) {
    products.sort((a, b) => order === "desc" ? b.price - a.price : a.price - b.price);
    displayProducts();
}

function login() {
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;
    if (username === "admin" && password === "1234") {
        document.getElementById("moderatorControls").style.display = "block";
        alert("Вход выполнен");
    } else {
        alert("Неверные данные");
    }
}

function addItem() {
    const name = prompt("Введите название товара:");
    const price = parseFloat(prompt("Введите цену товара:"));
    if (name && !isNaN(price)) {
        products.push({ name, price });
        displayProducts();
    }
}

function removeItem() {
    const name = prompt("Введите название товара для удаления:");
    products = products.filter(product => product.name.toLowerCase() !== name.toLowerCase());
    displayProducts();
}

displayProducts();
