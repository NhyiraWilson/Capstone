<?php
session_start();
include '../settings/db_class.php';

// // Check if the user is logged in
// if (!isset($_SESSION['user_id'])) {
//     header("Location: payment.php");
//     exit;
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Customer Management</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    :root {
      --primary: #007bff;
      --gray-bg: #f4f4f4;
      --white: #ffffff;
      --card-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: var(--gray-bg);
      margin: 0;
    }

    /* Header */
    header {
      background-color: var(--primary);
      color: white;
      padding: 20px;
      text-align: center;
      font-size: 22px;
      font-weight: 600;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .container {
      max-width: 1000px;
      margin: auto;
      padding: 30px 20px;
    }

    .form-container,
    .table-container {
      background: var(--white);
      border-radius: 10px;
      padding: 25px;
      margin-bottom: 40px;
      box-shadow: var(--card-shadow);
    }

    label {
      font-weight: 500;
      display: block;
      margin-top: 15px;
    }

    input, textarea {
      width: 100%;
      padding: 12px;
      margin-top: 6px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 15px;
    }

    button {
      margin-top: 20px;
      padding: 12px 20px;
      background-color: var(--primary);
      color: white;
      font-size: 16px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    button:hover {
      background-color: #0056b3;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    table th,
    table td {
      padding: 14px;
      border-bottom: 1px solid #eee;
      text-align: left;
    }

    table th {
      background-color: #f0f0f0;
    }

    table tbody tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    table tbody tr:hover {
      background-color: #eef6ff;
    }

    .edit-btn {
      background-color: #28a745;
      padding: 8px 14px;
      border: none;
      color: white;
      border-radius: 5px;
      font-size: 14px;
      cursor: pointer;
    }

    .edit-btn:hover {
      background-color: #218838;
    }

    @media (max-width: 600px) {
      .form-container, .table-container {
        padding: 15px;
      }

      input, textarea, button {
        font-size: 14px;
      }
    }
  </style>
</head>
<body>

  <header>
    👥 Customer Management Dashboard
  </header>

  <div class="container">
    <div class="form-container">
      <h2>➕ Add / Edit Customer</h2>
      <form id="customerForm" action="../actions/add_customer.php" method="POST">
  <label>First Name</label>
  <input type="text" name="f_name" required>

  <label>Last Name</label>
  <input type="text" name="l_name" required>

  <label>Email</label>
  <input type="email" name="email">

  <label>Phone</label>
  <input type="text" name="phone">

  <label>Date of Birth</label>
  <input type="date" name="dob">

  <label>Preferences</label>
  <textarea name="preferences" rows="3"></textarea>

  <button type="submit">💾 Save Customer</button>
</form>

    </div>

    <div class="table-container">
      <h2>📋 Customer List</h2>
      <table id="customerTable">
        <thead>
          <tr>
            <th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>DOB</th><th>preferences</th><th>Action</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
  </div>

  <script>
    let customers = [];
    let customerIdCounter = 1;

    const form = document.getElementById('customerForm');
    const tbody = document.querySelector('#customerTable tbody');

    form.addEventListener('submit', function(e) {
      e.preventDefault();

      const id = document.getElementById('customerId').value;
      const firstName = document.getElementById('firstName').value.trim();
      const lastName = document.getElementById('lastName').value.trim();
      const email = document.getElementById('email').value.trim();
      const phone = document.getElementById('phone').value.trim();
      const dob = document.getElementById('dob').value;
      const preferences = document.getElementById('preferences').value.trim();

      if (id) {
        const index = customers.findIndex(c => c.id === parseInt(id));
        customers[index] = { id: parseInt(id), firstName, lastName, email, phone, dob, preferences };
      } else {
        customers.push({ id: customerIdCounter++, firstName, lastName, email, phone, dob, address });
      }

      form.reset();
      document.getElementById('customerId').value = '';
      renderTable();
    });

    function renderTable() {
      tbody.innerHTML = '';
      customers.forEach(customer => {
        const row = document.createElement('tr');
        row.innerHTML = `
          <td>${customer.id}</td>
          <td>${customer.firstName} ${customer.lastName}</td>
          <td>${customer.email}</td>
          <td>${customer.phone}</td>
          <td>${customer.dob}</td>
          <td>${customer.preferences}</td>
          <td><button class="edit-btn" onclick="editCustomer(${customer.id})">Edit</button></td>
        `;
        tbody.appendChild(row);
      });
    }

    function editCustomer(id) {
      const customer = customers.find(c => c.id === id);
      document.getElementById('customerId').value = customer.id;
      document.getElementById('firstName').value = customer.firstName;
      document.getElementById('lastName').value = customer.lastName;
      document.getElementById('email').value = customer.email;
      document.getElementById('phone').value = customer.phone;
      document.getElementById('dob').value = customer.dob;
      document.getElementById('preferences').value = customer.preferences;
    }
  </script>
</body>
</html>
