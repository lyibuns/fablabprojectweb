<!DOCTYPE html>
<html>
<head>
  @include('NavBars.head')
  @yield('content')

  <style>
    .bookings-section {
        margin-top: 6.25vw; /* Scales from 50px at 800px width */
        margin-right: 6.25vw; /* Scales from 50px at 800px width */
    }

    .bookings-section h1 {
        font-size: 4vw; /* Scales from 32px at 800px width */
        color: #142944;
        margin-bottom: 2.5vw; /* Scales from 20px at 800px width */
    }

    .booking-filters {
        display: flex;
        gap: 2.5vw; /* Scales from 20px at 800px width */
        margin-bottom: 2.5vw; /* Scales from 20px at 800px width */
        flex-wrap: wrap; /* Allows filters to wrap on smaller screens */
    }

    .booking-filters label {
        font-weight: bold;
        font-size: 1.75vw; /* Scales from 14px at 800px width */
    }

    .booking-filters select {
        padding: 0.75vw 1.25vw; /* Scales from 6px and 10px at 800px width */
        margin-left: 0.625vw; /* Scales from 5px at 800px width */
        border-radius: 0.625vw; /* Scales from 5px at 800px width */
        border: 0.125vw solid #ccc; /* Scales from 1px at 800px width */
        font-size: 1.75vw; /* Scales from 14px at 800px width */
    }

    .booking-table-container {
        overflow-x: auto;
        margin-bottom: 12.5vw; /* Scales from 100px at 800px width */
    }

    .booking-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 1.75vw; /* Scales from 14px at 800px width */
        background-color: white;
    }

    .booking-table th,
    .booking-table td {
        border: 0.125vw solid #999; /* Scales from 1px at 800px width */
        padding: 1.5vw 2vw; /* Scales from 12px and 16px at 800px width */
        text-align: center;
    }

    .booking-table thead {
        background-color: #f5f5f5;
        font-weight: bold;
    }

    /* Status styling */
    .status-pending {
        background-color: #f8d7da; /* Light red */
        color: #721c24;
    }

    .status-completed {
        background-color: #e6f4ea; /* Light green (optional) */
        color: #1e4620;
    }

    .booking-calendar-wrapper {
        margin-top: 12.5vw; /* Scales from 100px at 800px width */
        margin: 2.5vw; /* Scales from 20px at 800px width */
        overflow-x: auto; /* Keep scroll for smaller screens */
    }

    .booking-calendar-controls {
        display: flex;
        align-items: center;
        gap: 1.25vw; /* Scales from 10px at 800px width */
        flex-wrap: wrap;
        margin-bottom: 2.5vw; /* Scales from 20px at 800px width */
    }

    .booking-calendar-btn {
        padding: 1vw 1.75vw; /* Scales from 8px and 14px at 800px width */
        border: none;
        border-radius: 0.75vw; /* Scales from 6px at 800px width */
        cursor: pointer;
        font-weight: 600;
        font-size: 1.75vw; /* Scales from 14px at 800px width */
        transition: background 0.2s ease-in-out;
    }

    .booking-open-btn {
        background-color: #c6f6d5;
        color: #065f46;
    }

    .booking-open-btn:hover {
        background-color: #9ae6b4;
    }

    .booking-close-btn {
        background-color: #feb2b2;
        color: #742a2a;
    }

    .booking-close-btn:hover {
        background-color: #fc8181;
    }

    .booking-cancel-btn {
        background-color: #e2e8f0;
        color: #1a202c;
    }

    .booking-cancel-btn:hover {
        background-color: #cbd5e0;
    }

    .booking-calendar-label {
        font-weight: 600;
        margin-left: 2.5vw; /* Scales from 20px at 800px width */
        font-size: 1.75vw; /* Optional: Scale label font size */
    }

    .booking-calendar-select {
        padding: 0.75vw 1.25vw; /* Scales from 6px and 10px at 800px width */
        border: 0.125vw solid #ccc; /* Scales from 1px at 800px width */
        border-radius: 0.5vw; /* Scales from 4px at 800px width */
        font-size: 1.75vw; /* Optional: Scale select font size */
    }

    /* Calendar Table */
    .booking-calendar-table {
        width: 100%;
        table-layout: fixed; /* Makes all cells uniform width */
        border-collapse: collapse;
        text-align: center;
        font-size: 1.75vw; /* Scales from 14px at 800px width */
    }

    .booking-calendar-table th,
    .booking-calendar-table td {
        border: 0.125vw solid #adadad; /* Scales from 1px at 800px width */
        padding: 0;
        height: 6.25vw; /* Scales from 50px at 800px width */
        width: 12.5vw; /* Scales from 100px at 800px width */
        vertical-align: middle;
        font-family: Arial, sans-serif;
    }

    /* Time column width */
    .booking-calendar-table td:first-child,
    .booking-calendar-table th:first-child {
        width: 10vw; /* Scales from 80px at 800px width */
        font-weight: bold;
    }

    /* Slot styling */
    .booking-slot {
        cursor: pointer;
        width: 100%;
        height: 100%;
    }

    .booking-slot.booking-gray {
        background-color: #d3d3d3;
    }

    .booking-slot.booking-red {
        background-color: #fca5a5;
    }

    .booking-slot.booking-opened {
        background-color: #bbf7d0 !important;
    }

    .booking-slot.booking-closed {
        background-color: #fecaca !important;
    }

    .booking-calendar-btn.active {
        box-shadow: 0 0 0 0.375vw rgba(0, 0, 0, 0.1); /* Scales from 3px at 800px width */
        transform: scale(1.02);
    }

    .select-all-day {
        padding: 0.5vw; /* Scales from 4px at 800px width */
        background-color: #f3f4f6;
        border: 0.125vw solid #ccc; /* Scales from 1px at 800px width */
        border-radius: 50%;
        font-size: 1.625vw; /* Scales from 13px at 800px width */
        cursor: pointer;
        width: 4vw; /* Scales from 32px at 800px width */
        height: 4vw; /* Scales from 32px at 800px width */
        line-height: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0 auto;
    }

    .select-all-day:hover {
        background-color: #d1d5db;
    }
  </style>
</head>
<body>

@include('NavBars.navbar')

@include('NavBars.sidebar')
@include('NavBars.leftsidebar') {{-- stays fixed, outside main wrapper --}}

<div class="page-wrapper">
        <h1> Booking Management </h1>
<!-- bookings.blade.php or a separate component -->
<div class="bookings-section">

    {{-- Filter Controls --}}
    <div class="booking-filters">
        <label>
            Machine:
            <select>
                <option>3D Printer</option>
                <option>Laser Cutter</option>
                <option>CNC</option>
            </select>
        </label>

        <label>
            Date:
            <select>
                <option>All</option>
                <option>Today</option>
                <option>Tomorrow</option>
                <option>This Week</option>
            </select>
        </label>
    </div>

    {{-- Booking Table --}}
    <div class="booking-table-container">
        <table class="booking-table">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Type</th>
                    <th>Date</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Purpose</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                {{-- Example Rows --}}
                <tr class="status-pending">
                    <td>Biancent</td>
                    <td>Student</td>
                    <td>3/25/2025</td>
                    <td>6:30pm</td>
                    <td>8:30pm</td>
                    <td>Personal Project</td>
                    <td>Pending</td>
                </tr>
                <tr class="status-completed">
                    <td>Biancent</td>
                    <td>Student</td>
                    <td>3/25/2025</td>
                    <td>6:30pm</td>
                    <td>8:30pm</td>
                    <td>Personal Project</td>
                    <td>Completed</td>
                </tr>
                {{-- Loop this dynamically from database --}}
            </tbody>
        </table>
    </div>

    <div class="booking-calendar-wrapper">
  <h2>Calendar</h2>

  <div class="booking-calendar-controls">
    <button id="bookingCancelBtn" title="Cancel slot selection" class="booking-calendar-btn booking-cancel-btn">
      ❌ Cancel
    </button>
    <button id="bookingOpenBtn" title="Mark selected slots as available" class="booking-calendar-btn booking-open-btn">
      ✅ Open Slots
    </button>
    <button id="bookingCloseBtn" title="Mark selected slots as unavailable" class="booking-calendar-btn booking-close-btn">
      ⛔ Close Slots
    </button>

    <label for="bookingMachineSelect" class="booking-calendar-label">Machine:</label>
    <select id="bookingMachineSelect" class="booking-calendar-select">
      <option>3D Printer</option>
      <option>Laser Cutter</option>
      <option>Vinyl Cutter</option>
    </select>
  </div>

  <table class="booking-calendar-table">
    <thead>
      <tr>
        <th>Time</th>
        <th>Monday</th>
        <th>Tuesday</th>
        <th>Wednesday</th>
        <th>Thursday</th>
        <th>Friday</th>
        <th>Monday</th>
        <th>Tuesday</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>8:00</td>
        <td class="booking-slot booking-gray"></td>
        <td class="booking-slot"></td>
        <td class="booking-slot"></td>
        <td class="booking-slot booking-gray"></td>
        <td class="booking-slot"></td>
        <td class="booking-slot booking-gray"></td>
        <td class="booking-slot booking-red"></td>
      </tr>
      <tr>
        <td>8:30</td>
        <td class="booking-slot"></td>
        <td class="booking-slot"></td>
        <td class="booking-slot booking-gray"></td>
        <td class="booking-slot booking-gray"></td>
        <td class="booking-slot booking-gray"></td>
        <td class="booking-slot"></td>
        <td class="booking-slot booking-red"></td>
      </tr>
      <tr>
        <td>9:00</td>
        <td class="booking-slot"></td>
        <td class="booking-slot booking-gray"></td>
        <td class="booking-slot booking-gray"></td>
        <td class="booking-slot"></td>
        <td class="booking-slot"></td>
        <td class="booking-slot"></td>
        <td class="booking-slot booking-red"></td>
      </tr>

      <tfoot>
  <tr>
    <td></td>
    <td><button class="select-all-day" data-day="1">✓</button></td>
    <td><button class="select-all-day" data-day="2">✓</button></td>
    <td><button class="select-all-day" data-day="3">✓</button></td>
    <td><button class="select-all-day" data-day="4">✓</button></td>
    <td><button class="select-all-day" data-day="5">✓</button></td>
    <td><button class="select-all-day" data-day="6">✓</button></td>
    <td><button class="select-all-day" data-day="7">✓ </button></td>
  </tr>
</tfoot>

    </tbody>
  </table>
</div>


</div>
  <script src="calendar.js"></script>

  <script src="{{ asset('js/bookings.js') }}"></script>
  <script src="{{ asset('js/sidepanel.js') }}"></script>
</body>
</html>
