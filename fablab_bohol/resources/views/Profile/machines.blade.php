<!DOCTYPE html>
<html>
<head>
  @include('NavBars.headpro')
  @yield('content')
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
