<?php
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vending</title>
</head>
<body>
    <h2>Vendo Machine</h2>

    <form id="vendingForm">
        <fieldset>
            <legend>Products:</legend>
            <label><input type="checkbox" name="product" value="Coke" data-price="15"> Coke - ₱15</label><br>
            <label><input type="checkbox" name="product" value="Sprite" data-price="20"> Sprite - ₱20</label><br>
            <label><input type="checkbox" name="product" value="Royal" data-price="20"> Royal - ₱20</label><br>
            <label><input type="checkbox" name="product" value="Pepsi" data-price="15"> Pepsi - ₱15</label><br>
            <label><input type="checkbox" name="product" value="MountainDew" data-price="20"> Mountain Dew - ₱20</label><br>
        </fieldset>

        <fieldset>
            <legend>Options:</legend>
            <label for="size">Size:</label>
            <select id="size" name="size">
                <option value="0">Regular</option>
                <option value="5">Up-Size (Add ₱5)</option>
                <option value="10">Jumbo (Add ₱10)</option>
            </select>

            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" min="1" value="1">

            <button type="button" onclick="checkOut()">Check Out</button>
        </fieldset>
    </form>

    <hr>

    <div id="purchaseSummary">
        <h3>Purchase Summary:</h3>
        <ul id="summaryList"></ul>
        <p id="totalItems">Total Number of Items: 0</p>
        <p id="totalAmount">Total Amount: ₱0</p>
    </div>

    <script>
        function checkOut() {
            const selectedProducts = document.querySelectorAll(\'input[name="product"]:checked\');
            const sizeSelect = document.getElementById("size");
            const sizePrice = parseFloat(sizeSelect.value);
            const sizeLabel = sizeSelect.options[sizeSelect.selectedIndex].text;
            const quantity = parseInt(document.getElementById("quantity").value);

            if (selectedProducts.length === 0) {
                alert("Please select at least one product.");
                return;
            }

            const summaryList = document.getElementById("summaryList");
            summaryList.innerHTML = "";

            let totalItems = 0;
            let totalAmount = 0;

            selectedProducts.forEach(product => {
                const productName = product.value;
                const basePrice = parseFloat(product.getAttribute("data-price"));
                const itemPrice = (basePrice + sizePrice) * quantity;

                const listItem = document.createElement("li");
                listItem.textContent = `${quantity} piece(s) of ${sizeLabel} ${productName} amounting to ₱${itemPrice.toFixed(2)}`;
                summaryList.appendChild(listItem);

                totalItems += quantity;
                totalAmount += itemPrice;
            });

            document.getElementById("totalItems").textContent = `Total Number of Items: ${totalItems}`;
            document.getElementById("totalAmount").textContent = `Total Amount: ₱${totalAmount.toFixed(2)}`;
        }
    </script>
</body>
</html>';
?>
