<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Inventory Tracker</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- EmailJS SDK -->
  <script src="https://cdn.emailjs.com/dist/email.min.js"></script>
  <script>
    (function () {
      emailjs.init("YOUR_PUBLIC_KEY"); // Replace with your EmailJS public key
    })();
  </script>

  <style>
    :root {
      --primary: #3f51b5;
      --accent: #e8eaf6;
      --background: #f0f2f5;
      --text: #333;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      background: var(--background);
      margin: 0;
      padding: 30px 15px;
    }

    h2 {
      text-align: center;
      color: var(--primary);
      margin-bottom: 30px;
      font-size: 28px;
    }

    .inventory-container {
      max-width: 950px;
      margin: auto;
      background: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 6px 16px rgba(0, 0, 0, 0.08);
    }

    .form-row {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }

    .form-group {
      flex: 1 1 45%;
      display: flex;
      flex-direction: column;
    }

    label {
      font-weight: 600;
      margin-bottom: 6px;
      color: #555;
    }

    input, select {
      padding: 12px 14px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 15px;
    }

    input:focus, select:focus {
      border-color: var(--primary);
      outline: none;
    }

    button {
      margin-top: 20px;
      padding: 12px 20px;
      font-size: 16px;
      background-color: var(--primary);
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
    }

    button:hover {
      background-color: #303f9f;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 25px;
    }

    table th, table td {
      text-align: left;
      padding: 14px;
      border-bottom: 1px solid #e0e0e0;
    }

    table th {
      background-color: var(--accent);
      color: var(--text);
    }

    .action-btn {
      padding: 6px 10px;
      border: none;
      border-radius: 6px;
      color: white;
      cursor: pointer;
      margin-right: 5px;
      font-size: 14px;
    }

    .delete-btn {
      background-color: #e53935;
    }

    .delete-btn:hover {
      background-color: #c62828;
    }

    .restock-btn {
      background-color: #43a047;
    }

    .restock-btn:hover {
      background-color: #388e3c;
    }

    .search-group {
      margin-top: 20px;
    }

    .search-group input {
      width: 100%;
      padding: 12px 14px;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 15px;
    }

    @media (max-width: 600px) {
      .form-group {
        flex: 1 1 100%;
      }
    }
  </style>
</head>
<body>

<div class="inventory-container">
  <h2>Inventory Tracker</h2>

  <form id="inventoryForm">
    <input type="hidden" id="itemId">
    <div class="form-row">
      <div class="form-group">
        <label>Item Name</label>
        <input type="text" id="itemName" required>
      </div>
      <div class="form-group">
        <label>Quantity</label>
        <input type="number" id="itemQuantity" min="0" required>
      </div>
      <div class="form-group">
        <label>Category</label>
        <select id="itemCategory" required>
          <option value="">Select Category</option>
          <option value="Skincare">Skincare</option>
          <option value="Haircare">Haircare</option>
          <option value="Tools">Tools</option>
          <option value="Other">Other</option>
        </select>
      </div>
    </div>
    <button type="submit">Save Item</button>
  </form>

  <div class="search-group">
    <label for="searchInput"><strong>🔍 Search Inventory</strong></label>
    <input type="text" id="searchInput" placeholder="Search by name, quantity, or category" oninput="filterInventory()">
  </div>

  <table id="inventoryTable">
    <thead>
      <tr>
        <th>ID</th>
        <th>Item</th>
        <th>Quantity</th>
        <th>Category</th>
        <th>Last Updated</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody></tbody>
  </table>
</div>

<script>
  let inventory = [];
  let itemCounter = 1;

  const form = document.getElementById('inventoryForm');
  const tableBody = document.querySelector('#inventoryTable tbody');

  form.addEventListener('submit', function (e) {
    e.preventDefault();

    const id = document.getElementById('itemId').value;
    const name = document.getElementById('itemName').value;
    const quantity = document.getElementById('itemQuantity').value;
    const category = document.getElementById('itemCategory').value;
    const updated = new Date().toLocaleString();

    if (id) {
      const index = inventory.findIndex(item => item.id === parseInt(id));
      inventory[index] = { id: parseInt(id), name, quantity, category, updated };
    } else {
      inventory.push({ id: itemCounter++, name, quantity, category, updated });
    }

    form.reset();
    document.getElementById('itemId').value = '';
    renderInventory();
  });

  function renderInventory() {
    tableBody.innerHTML = '';
    inventory.forEach(item => {
      const row = document.createElement('tr');
      row.innerHTML = `
        <td>${item.id}</td>
        <td>${item.name}</td>
        <td>${item.quantity}</td>
        <td>${item.category}</td>
        <td>${item.updated}</td>
        <td>
          <button class="action-btn restock-btn" onclick="sendRestockEmail(${item.id})">🔁 Restock</button>
          <button class="action-btn delete-btn" onclick="deleteItem(${item.id})">🗑️ Delete</button>
        </td>
      `;
      tableBody.appendChild(row);
    });
  }

  function deleteItem(id) {
    inventory = inventory.filter(item => item.id !== id);
    renderInventory();
  }

  function sendRestockEmail(id) {
    const item = inventory.find(i => i.id === id);
    if (!item) return;

    emailjs.send("YOUR_SERVICE_ID", "YOUR_TEMPLATE_ID", {
      item_name: item.name,
      item_quantity: item.quantity,
      category: item.category,
      to_email: "admin@example.com"
    })
    .then(() => {
      alert(`Restock email sent for "${item.name}"`);
    })
    .catch(error => {
      console.error("EmailJS error:", error);
      alert("Failed to send restock email.");
    });
  }

  function filterInventory() {
    const searchTerm = document.getElementById('searchInput').value.toLowerCase();
    const rows = tableBody.getElementsByTagName('tr');

    for (let row of rows) {
      const cells = row.getElementsByTagName('td');
      const text = (
        cells[1].innerText + cells[2].innerText + cells[3].innerText
      ).toLowerCase();
      row.style.display = text.includes(searchTerm) ? '' : 'none';
    }
  }
</script>
</body>
</html>
