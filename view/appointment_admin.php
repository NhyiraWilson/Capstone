<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Appointment Scheduler</title>
  <style>
    :root {
      --primary: #007bff;
      --gray-bg: #f7f9fc;
      --white: #ffffff;
      --shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      background: var(--gray-bg);
      padding: 20px;
    }

    h2 {
      text-align: center;
      color: var(--primary);
    }

    .form-container {
      max-width: 900px;
      margin: 0 auto 30px;
      background: var(--white);
      padding: 20px;
      border-radius: 10px;
      box-shadow: var(--shadow);
    }

    form {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 20px;
    }

    label {
      font-weight: bold;
    }

    input, select, datalist {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
      width: 100%;
    }

    button {
      grid-column: span 2;
      padding: 12px;
      background: var(--primary);
      color: white;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
    }

    table {
      width: 100%;
      margin-top: 30px;
      border-collapse: collapse;
    }

    table th, table td {
      border: 1px solid #ccc;
      padding: 14px;
      text-align: center;
      vertical-align: top;
    }

    table th {
      background: #007bff;
      color: white;
    }

    .appointment {
      background: #e3f2fd;
      border: 1px solid #90caf9;
      border-radius: 6px;
      padding: 8px;
      font-size: 14px;
      margin-top: 5px;
    }
  </style>
</head>
<body>

<h2>📅 Weekly Appointment Timetable</h2>

<div class="form-container">
  <form id="appointmentForm">
    <div>
      <label>Service</label>
      <input type="text" id="service" required>
    </div>
    <div>
      <label>Assign Employee</label>
      <input list="employeeList" id="employee" required>
      <datalist id="employeeList">
        <option value="Alice Thompson">
        <option value="James Kofi">
        <option value="Rita Mensah">
        <option value="Samuel Owusu">
        <option value="Ama Nyarko">
      </datalist>
    </div>
    <div>
      <label>Assign Customer</label>
      <input list="customerList" id="customer" required>
      <datalist id="customerList">
        <option value="Linda Appiah">
        <option value="Kwame Boateng">
        <option value="Akua Mensimah">
        <option value="Yaw Johnson">
        <option value="Esi Adjei">
      </datalist>
    </div>
    <div>
      <label>Day</label>
      <select id="day" required>
        <option value="">Select Day</option>
        <option value="Monday">Monday</option>
        <option value="Tuesday">Tuesday</option>
        <option value="Wednesday">Wednesday</option>
        <option value="Thursday">Thursday</option>
        <option value="Friday">Friday</option>
        <option value="Saturday">Saturday</option>
        <option value="Sunday">Sunday</option>
      </select>
    </div>
    <div>
      <label>Time Slot</label>
      <select id="time" required>
        <option value="">Select Time</option>
        <option value="9AM">9:00 AM</option>
        <option value="10AM">10:00 AM</option>
        <option value="11AM">11:00 AM</option>
        <option value="12PM">12:00 PM</option>
        <option value="1PM">1:00 PM</option>
        <option value="2PM">2:00 PM</option>
        <option value="3PM">3:00 PM</option>
        <option value="4PM">4:00 PM</option>
        <option value="5PM">5:00 PM</option>
      </select>
    </div>
    <button type="submit">💾 Save Appointment</button>
  </form>
</div>

<table class="timetable" id="timetable">
  <thead>
    <tr>
      <th>Time</th>
      <th>Monday</th>
      <th>Tuesday</th>
      <th>Wednesday</th>
      <th>Thursday</th>
      <th>Friday</th>
      <th>Saturday</th>
      <th>Sunday</th>
    </tr>
  </thead>
  <tbody id="timetableBody"></tbody>
</table>

<script>
  const timeSlots = ["9AM", "10AM", "11AM", "12PM", "1PM", "2PM", "3PM", "4PM", "5PM"];
  const days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];

  const tableBody = document.getElementById('timetableBody');
  const form = document.getElementById('appointmentForm');

  function buildEmptyTimetable() {
    timeSlots.forEach(slot => {
      const row = document.createElement('tr');
      const timeCell = document.createElement('td');
      timeCell.textContent = slot;
      row.appendChild(timeCell);

      days.forEach(day => {
        const cell = document.createElement('td');
        cell.setAttribute('id', `${day}-${slot}`);
        row.appendChild(cell);
      });

      tableBody.appendChild(row);
    });
  }

  form.addEventListener('submit', function(e) {
    e.preventDefault();

    const service = document.getElementById('service').value;
    const employee = document.getElementById('employee').value;
    const customer = document.getElementById('customer').value;
    const day = document.getElementById('day').value;
    const time = document.getElementById('time').value;

    const cell = document.getElementById(`${day}-${time}`);
    const div = document.createElement('div');
    div.className = 'appointment';
    div.innerHTML = `<strong>${service}</strong><br><em>${employee}</em><br>${customer}`;
    cell.appendChild(div);

    form.reset();
  });

  buildEmptyTimetable();
</script>

</body>
</html>
