<?php
session_start();
$_SESSION['User_Name'] = $_SESSION['User_Name'] ?? 'Ewura Adjoa Wilson';
$_SESSION['User_Email'] = $_SESSION['User_Email'] ?? 'admin@beautify.com';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Dashboard</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      display: flex;
      height: 100vh;
      background-color: #f4f6f9;
      transition: all 0.3s ease;
    }

    /* Sidebar */
    .sidebar {
      width: 240px;
      background-color: #343a40;
      color: #fff;
      padding: 30px 20px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .sidebar h2 {
      margin-bottom: 30px;
      font-size: 24px;
      text-align: center;
    }

    .sidebar a {
      display: block;
      color: #ccc;
      text-decoration: none;
      margin: 15px 0;
      font-size: 16px;
    }

    .sidebar a:hover {
      color: #fff;
    }

    /* Main content */
    .main {
      flex: 1;
      padding: 30px;
      overflow-y: auto;
    }

    .top-bar {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }

    .toggle-btn {
      font-size: 24px;
      cursor: pointer;
      background: none;
      border: none;
      margin-right: 20px;
    }

    .summary-cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
      gap: 20px;
    }

    .card {
      background: #fff;
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      text-align: center;
    }

    .card strong {
      display: block;
      font-size: 22px;
      margin-top: 10px;
    }

    .quick-links {
      margin: 40px 0 30px;
    }

    .quick-links h3 {
      margin-bottom: 15px;
    }

    .link-grid {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }

    .link-grid a {
      flex: 1 1 200px;
      text-align: center;
      background: #007bff;
      color: #fff;
      padding: 15px;
      border-radius: 6px;
      text-decoration: none;
      transition: background 0.3s ease;
    }

    .link-grid a:hover {
      background: #0056b3;
    }

    .activity-log h3 {
      margin-bottom: 15px;
    }

    .activity-log ul {
      list-style: none;
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }

    .activity-log li {
      padding: 10px 0;
      border-bottom: 1px solid #e9ecef;
      font-size: 15px;
    }

    .activity-log li:last-child {
      border-bottom: none;
    }

    /* Profile Section at Bottom */
    .sidebar-profile {
      margin-top: 30px;
      padding: 15px;
      background-color: #212529;
      border-radius: 8px;
      text-align: center;
    }

    .sidebar-profile a {
      text-decoration: none;
      color: #fff;
    }

    .sidebar-profile a:hover {
      text-decoration: underline;
    }

    .sidebar-profile p {
      font-size: 13px;
      color: #ccc;
      margin-top: 5px;
    }

    @media (max-width: 768px) {
      .sidebar {
        position: absolute;
        z-index: 1000;
        height: 100%;
      }

      .main {
        padding: 20px;
      }
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar" id="sidebar">
    <div>
      <h2>Admin Panel</h2>
      <a href="#">Dashboard</a>
      <a href="../view/user_admin.php">Manage Users</a>
      <a href="../view/appointment_admin.php">Appointments</a>
      <a href="../view/manage_inventory_admin.php">Inventory</a>
      <a href="../view/logout.php">Logout</a>
    </div>

    <!-- ✅ Clickable Profile at bottom -->
    <div class="sidebar-profile">
      <a href="../view/profile.php">
        <strong><?php echo $_SESSION['User_Name']; ?></strong>
      </a>
      <p><?php echo $_SESSION['User_Email']; ?></p>
    </div>
  </div>

  <!-- Main Content -->
  <div class="main">
    <div class="top-bar">
      <button class="toggle-btn" onclick="toggleSidebar()">☰</button>
      <h1>Welcome, Admin!</h1>
    </div>
    <p>Here’s your dashboard overview.</p>

    <!-- Summary Cards -->
    <div class="summary-cards">
      <div class="card">👤 Customers <strong>218</strong></div>
      <div class="card">📅 Today’s Appointments <strong>14</strong></div>
      <div class="card">🧑‍💼 Active Employees <strong>12</strong></div>
      <div class="card">📦 Low Stock Items <strong>5</strong></div>
    </div>

    <!-- Quick Links -->
    <div class="quick-links">
      <h3>Quick Management</h3>
      <div class="link-grid">
        <a href="../view/user_admin.php">Manage Users</a>
        <a href="../view/appointment_admin.php">View Appointments</a>
        <a href="../view/manage_inventory_admin.php">Track Inventory</a>
      </div>
    </div>

    <!-- Activity Log -->
    <div class="activity-log">
      <h3>Recent Activity</h3>
      <ul>
        <li>Sarah booked a Facial - Apr 5, 11:30 AM</li>
        <li>Inventory updated by Admin - Apr 4, 5:20 PM</li>
        <li>New user registered: alex@gmail.com</li>
        <li>Appointment canceled: User #145</li>
        <li>Admin updated employee records</li>
      </ul>
    </div>
  </div>

  <script>
    function toggleSidebar() {
      document.getElementById("sidebar").classList.toggle("collapsed");
    }
  </script>
</body>
</html>
