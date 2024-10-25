<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Basic styles for the modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 400px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .hidden {
            display: none;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input,
        select {
            width: calc(100% - 20px);
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        input:focus,
        select:focus {
            border-color: #007bff;
            outline: none;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        .pagination {
            margin-top: 20px;
            text-align: center;
        }

        .pagination button {
            margin: 0 10px;
        }

        /* Merge */
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background: linear-gradient(120deg, #f6d365 0%, #fda085 100%);
    animation: gradientBackground 15s ease infinite;
}

@keyframes gradientBackground {
    0% {
        background: linear-gradient(120deg, #3d0101 0%, #fbf7f7 100%);
    }
    50% {
        background: linear-gradient(120deg, #3d0101 0%, #fbf7f7 100%);
    }
    100% {
        background: linear-gradient(120deg, #3d0101 0%, #fbf7f7 100%);
    }
}

nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    background: rgba(255, 255, 255, 0.8);
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

nav .nav-container {
    display: flex;
    align-items: center;
}

nav .logo img {
    width: 114px;
    height: 115px;
    margin-right: 20px;
}

nav h1 {
    font-size: 24px;
    margin: 0;
}

.cart {
    text-align: center;
    background-color: white;
    padding: 20px;
    width: 100%;
    height: fit-content;
    
}

.cart-table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
    text-align: center;
}

.cart-table th, .cart-table td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

.cart-table th {
    background-color: #f8f8f8;
}

.cart-table td {
    text-align: center;
}

.cart-table .item-quantity {
    margin: 0 10px;
}

button {
    background-color: #3d0101;
    color: white;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
    border-radius: 5px;
}
nav {
            background-color: #6a3c3c;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .logo img {
            height: 50px;
        }
        ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            align-items: center;
        }
        ul li {
            position: relative;
            margin-right: 20px;
        }
        ul li a {
            text-decoration: none;
            color: #333;
            padding: 10px;
            transition: color 0.3s;
        }
        ul li a:hover {
            color: orange;
        }
        .menu-dropdown {
            cursor: pointer;
        }
        .dropdown {
            display: none;
            position: absolute;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            min-width: 150px;
            z-index: 1;
            border-radius: 5px;
            margin-top: 5px;
        }
        .menu-dropdown:hover .dropdown {
            display: block;
        }
        .dropdown a {
            display: block;
            padding: 10px 15px;
            color: #333;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .dropdown a:hover {
            background-color: #f0f0f0;
        }
        .sign-in {
            display: flex;
            align-items: center;
        }
        #cart-count {
            margin-left: 5px;
            font-weight: bold;
        }
button:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

button:hover {
    background-color: #fda085;
}

.decrement-btn, .increment-btn {
    font-size: 14px;
}

    </style>
</head>

<body>
<nav>
    <div class="logo">
        <img src="Logo.png" alt="Logo">
    </div>
    <ul>
        <li><a href="/RibsCircle">Home</a></li>
        <li class="menu-dropdown">
            <a>Menu</a>
            <div class="dropdown">
                <a href="/RibsCircle/Menu/Dagwood_Menu/dagwood_menu.php">Dagwood Menu</a>
                <a href="/RibsCircle/Menu/Chicken_Menu/chickenmenu.php">Chicken Menu</a>
                <a href="/RibsCircle/Menu/Ribs_Menu/Ribs.php">Ribs Menu</a>
            </div>
        </li>
        <li><a href="gallery.php">Gallery</a></li>
    </ul>
    <ul style="display: flex; align-items: center; height: 100%;">
        <li>
            <a href="/RibsCircle/Cart/cart.php">
                <i class="fas fa-shopping-cart"></i>
                <span id="cart-count" style="color: orange;">0</span>
            </a>
        </li>

        <li class="sign-in">
            <li class="menu-dropdown">
                <a id="user-name"><?php echo htmlspecialchars($username); ?></a> <!-- Set username -->
                <div class="dropdown">
                    <a href="/RibsCircle/edit_profile.php">Edit Profile</a>
                    <a href="#" id="logout">Logout</a>
                </div>
            </li>
        </li>
    </ul>
</nav>

    <!-- Cart Table -->
    <div class="cart">
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Cart items will be dynamically inserted here -->
            </tbody>
        </table>
        <button id="checkoutBtn">Check Out</button>

        <!-- Pagination Controls -->
        <div class="pagination">
            <button id="prevPage" onclick="changePage(-1)">Previous</button>
            <span id="pageInfo"></span>
            <button id="nextPage" onclick="changePage(1)">Next</button>
        </div>
    </div>

    <!-- Checkout Modal -->
    <div id="checkoutModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Checkout</h2>
            <form id="paymentForm">
                <label for="name">Name:</label>
                <input type="text" id="name" required>
                <br>
                <label for="email">Email:</label>
                <input type="email" id="email" required>
                <br>
                <label for="paymentMethod">Payment Method:</label>
                <select id="paymentMethod" required onchange="showPaymentFields()">
                    <option value="" disabled selected>Select payment method</option>
                    <option value="creditCard">Credit Card</option>
                    <option value="paypal">PayPal</option>
                    <option value="bankTransfer">Bank Transfer</option>
                </select>
                <br>

                <!-- Payment Fields -->
                <div id="creditCardFields" class="hidden">
                    <label for="cardNumber">Card Number:</label>
                    <input type="text" id="cardNumber" required>
                    <br>
                    <label for="expiryDate">Expiry Date:</label>
                    <input type="text" id="expiryDate" placeholder="MM/YY" required>
                    <br>
                    <label for="cvv">CVV:</label>
                    <input type="text" id="cvv" required>
                </div>

                <div id="paypalFields" class="hidden">
                    <label for="paypalEmail">PayPal Email:</label>
                    <input type="email" id="paypalEmail" required>
                </div>

                <div id="bankTransferFields" class="hidden">
                    <label for="accountNumber">Account Number:</label>
                    <input type="text" id="accountNumber" required>
                    <br>
                    <label for="bankName">Bank Name:</label>
                    <input type="text" id="bankName" required>
                </div>

                <button type="submit">Pay Now</button>
            </form>
        </div>
    </div>

    <!-- Script to Retrieve Cart from localStorage and Display It -->
    <script>
 document.addEventListener('DOMContentLoaded', function () {
        const username = localStorage.getItem('username');
        const userNameElement = document.getElementById('user-name');

        // Check if username is available in local storage
        if (userNameElement && username) {
            userNameElement.textContent = username; // Set the username from localStorage
        } else {
            // Redirect to login page if the username is not found
            window.location.href = '/RibsCircle/login/login.php'; // Redirect to the correct login path
        }

        document.getElementById('logout').addEventListener('click', function (e) {
            e.preventDefault(); // Prevent default link behavior
            localStorage.removeItem('username'); // Clear the username from local storage
            localStorage.removeItem('userId'); // Clear the userid from local storage
            window.location.href = '/RibsCircle/login/login.php'; // Redirect to the correct login path
        });
    });



        let currentPage = 1;
        const itemsPerPage = 10;

        function populateCart() {
        l
            const cartTableBody = document.querySelector('.cart-table tbody');
            cartTableBody.innerHTML = ''; // Clear the table

            // Retrieve cart data from localStorage
            let cart = JSON.parse(localStorage.getItem('cart')) || [];

            // Check if cart is empty
            if (cart.length === 0) {
                cartTableBody.innerHTML = '<tr><td colspan="4">Your cart is empty.</td></tr>';
                updatePagination(0);
                return;
            }

            // Calculate total pages
            const totalPages = Math.ceil(cart.length / itemsPerPage);
            const startIndex = (currentPage - 1) * itemsPerPage;
            const endIndex = Math.min(startIndex + itemsPerPage, cart.length);

            let total = 0; // Initialize total price

            // Loop through each item in the current page range and create table rows
            for (let i = startIndex; i < endIndex; i++) {
                const item = cart[i];
                const itemTotalPrice = item.price * item.quantity; // Calculate item total
                total += itemTotalPrice; // Update total price

                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${item.description}</td>
                    <td>${item.quantity}</td>
                    <td>R${itemTotalPrice.toFixed(2)}</td>
                    <td><button onclick="removeItemFromCart(${item.id})">Remove</button></td>
                `;
                cartTableBody.appendChild(row);
            }

            // Add a row for the total price
            const totalRow = document.createElement('tr');
            totalRow.innerHTML = `
                <td colspan="2"><strong>Total</strong></td>
                <td><strong>R${total.toFixed(2)}</strong></td>
                <td></td>
            `;
            cartTableBody.appendChild(totalRow);

            updatePagination(totalPages);
        }

        // Function to update pagination info
        function updatePagination(totalPages) {
            const pageInfo = document.getElementById('pageInfo');
            pageInfo.textContent = `Page ${currentPage} of ${totalPages}`;

            document.getElementById('prevPage').disabled = currentPage === 1;
            document.getElementById('nextPage').disabled = currentPage === totalPages;
        }

        // Function to change the page
        function changePage(direction) {
            currentPage += direction;
            populateCart();
        }


        function removeItemFromCart(id) {
            // Retrieve cart data from localStorage
            let cart = JSON.parse(localStorage.getItem('cart')) || [];

            // Find the index of the item to be removed
            const itemIndex = cart.findIndex(item => item.id === id);

            if (itemIndex !== -1) {
                // Decrease the quantity
                cart[itemIndex].quantity -= 1;

                // If the quantity is 0, remove the item from the cart
                if (cart[itemIndex].quantity === 0) {
                    cart.splice(itemIndex, 1);
                }

                // Save updated cart back to localStorage
                localStorage.setItem('cart', JSON.stringify(cart));

                // Update the cart display
                populateCart();
            }
        }

        // Show the checkout modal
        document.getElementById('checkoutBtn').onclick = function() {
            document.getElementById('checkoutModal').style.display = "block";
        }

        function closeModal() {
            document.getElementById('checkoutModal').style.display = "none";
        }


        function showPaymentFields() {
            const paymentMethod = document.getElementById('paymentMethod').value;


            document.getElementById('creditCardFields').classList.add('hidden');
            document.getElementById('paypalFields').classList.add('hidden');
            document.getElementById('bankTransferFields').classList.add('hidden');


            if (paymentMethod === 'creditCard') {
                document.getElementById('creditCardFields').classList.remove('hidden');
            } else if (paymentMethod === 'paypal') {
                document.getElementById('paypalFields').classList.remove('hidden');
            } else if (paymentMethod === 'bankTransfer') {
                document.getElementById('bankTransferFields').classList.remove('hidden');
            }
        }


        window.onload = populateCart;
    </script>
</body>

</html>