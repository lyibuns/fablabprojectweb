<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Machine Detail</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

  <!-- Firebase SDKs -->
  <script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-app-compat.js"></script>
  <script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-firestore-compat.js"></script>
  <script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-auth-compat.js"></script>
  <script src="{{ asset('js/firebase-essentials/firebase-init.js') }}"></script>
</head>

<body class="bg-light">
  <div class="container-fluid content-wrapper">
    <!-- Back Button -->
    <div class="d-flex justify-content-between align-items-start mb-4 mt-3 ps-2">
      <button class="btn btn-outline-secondary shadow-sm px-3 py-2 rounded-3" onclick="history.back()">
        <i class="bi bi-arrow-left-circle me-2"></i> Back to Inventory Page
      </button>
       <!-- Ready to Print Button -->
       <button class="btn btn-primary" onclick="printPage()">
          <i class="bi bi-printer"></i> Print
        </button>
    </div>

    <!-- Filters: Date -->
    <div class="row g-3 align-items-center">
      <div class="col-md-auto">
        <label for="dateFilter" class="form-label mb-1">Select Date:</label>
        <input type="date" id="dateFilter" class="form-control" />
      </div>
    </div>

    <!-- Machine Header + Buttons -->
    <div class="d-flex justify-content-between align-items-center mt-4 mb-3 flex-wrap">
      <h5 class="mb-2 mb-md-0">
        Machine: <span id="machineName" class="text-primary"></span>
      </h5>
      <div class="d-flex flex-wrap gap-2">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#inventoryModal">
          <i class="bi bi-plus-circle"></i> Add Inventory
        </button>
        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#monthlyMaintenanceModal">
          <i class="bi bi-tools"></i> Machine Monthly Maintenance Report
        </button>
      </div>
    </div>

    <!-- Month Title and Search -->
    <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2">
      <div id="monthTitle" class="fw-bold fs-5 me-3 mb-0">April 2025</div>
      <div style="width: 250px;">
        <div class="input-group">
          <span class="input-group-text">
            <i class="bi bi-search"></i>
          </span>
          <input type="text" id="searchInput" class="form-control" placeholder="Search inventory..." />
        </div>
      </div>
    </div>

    <!-- Inventory Table -->
    <div class="table-responsive">
      <table class="table table-bordered table-hover bg-white shadow-sm">
        <thead class="table-dark text-center align-middle">
          <tr>
            <th rowspan="2">Item no.</th>
            <th rowspan="2">CATEGORY</th>
            <th rowspan="2">Description</th>
            <th rowspan="2">TYPES</th>
            <th rowspan="2">COLOR</th>
            <th rowspan="2">Start of Month<br><small>(Supply Available)</small></th>
            <th rowspan="2">Additional Supply,<br><small>if any</small></th>
            <th rowspan="2">End of Month Inventory</th>
            <th rowspan="2">Month Consumption</th>
            <th rowspan="2">Remarks / Available Supply</th>
            <th rowspan="2">UNIT</th>
            <th rowspan="2">Action</th>
          </tr>
        </thead>
        <tbody id="inventoryTableBody">
          <!-- Dynamic inventory rows will be inserted here -->
        </tbody>
      </table>
    </div>
  </div>

  <!-- Inventory Modal -->
  <div class="modal fade" id="inventoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <form id="inventoryForm" class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="modalTitle">Add Inventory Item</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="itemId" />
          <input type="hidden" id="currentMonth" />

          <div class="row g-2">
            <div class="col-md-6">
              <label class="form-label">Category</label>
              <select id="itemCategory" class="form-select" required>
                <option value="" disabled selected>Select Category</option>
                <option value="Filament">Filament</option>
                <option value="Maintenance">Maintenance</option>
                <option value="Consumables">Consumables</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label">Description</label>
              <input type="text" id="itemDescription" class="form-control" required />
            </div>
            <div class="col-md-4">
              <label class="form-label">Type</label>
              <input type="text" id="itemType" class="form-control" />
            </div>
            <div class="col-md-4">
              <label class="form-label">Color</label>
              <input type="text" id="itemColor" class="form-control" />
            </div>
            <div class="col-md-3">
              <label class="form-label">Start Qty</label>
              <input type="number" id="startQty" class="form-control" required />
            </div>
            <div class="col-md-3">
              <label class="form-label">Added Qty</label>
              <input type="number" id="addQty" class="form-control" required />
            </div>
            <div class="col-md-3">
              <label class="form-label">End Qty</label>
              <input type="number" id="endQty" class="form-control" required />
            </div>
            <div class="col-md-3">
              <label class="form-label">Month Consumption</label>
              <input type="number" id="consumedQty" class="form-control" required />
            </div>
            <div class="col-md-3">
              <label class="form-label">Available Supply</label>
              <input type="number" id="availableSupply" class="form-control" required />
            </div>
            <div class="col-md-4">
              <label class="form-label">Unit</label>
              <input type="text" id="itemUnit" class="form-control" required />
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Save</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Monthly Maintenance Modal -->
  <div class="modal fade" id="monthlyMaintenanceModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <form id="maintenanceForm" class="modal-content">
        <div class="modal-header bg-warning text-white">
          <h5 class="modal-title">Machine Monthly Maintenance Report</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="maintenanceId" />
          <input type="hidden" id="maintenanceMonth" />

          <div class="row g-2">
            <div class="col-md-6">
              <label class="form-label">Maintenance Date</label>
              <input type="date" id="maintenanceDate" class="form-control" required />
            </div>
            <div class="col-md-6">
              <label class="form-label">Performed By</label>
              <input type="text" id="performedBy" class="form-control" required />
            </div>
            <div class="col-md-6">
              <label class="form-label">Machine Status</label>
              <select id="machineStatus" class="form-select" required>
                <option value="" disabled selected>Select Status</option>
                <option value="good">Good</option>
                <option value="repair">Repair</option>
                <option value="stop">Stop</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label">Problem Encountered</label>
              <textarea id="problemEncountered" class="form-control" rows="3" required></textarea>
            </div>
            <div class="col-md-12">
              <label class="form-label">Actions Taken</label>
              <textarea id="actionsTaken" class="form-control" rows="3" required></textarea>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-warning"  onclick="saveMaintenanceReportAsWord()" >Save Report</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/profile/machine-detail.js" defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/docx/7.7.1/docx.umd.min.js">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>

  
</body>
</html>
