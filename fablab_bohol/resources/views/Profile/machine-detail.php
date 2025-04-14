<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>3D Printer Inventory - Ultimaker S5</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

  <!-- Firebase SDKs -->
  <script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-app-compat.js"></script>
  <script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-firestore-compat.js"></script>
  <script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-auth-compat.js"></script>
</head>

<body class="bg-light">

  <div class="container mt-4">

            <!-- Month Filter and Machine Name Dropdowns -->
        <div class="d-flex flex-wrap align-items-center gap-3 mt-3">
        <!-- Month Filter Dropdown -->
        <div>
            <label for="monthFilter" class="form-label mb-1">Select Month</label>
            <select id="monthFilter" class="form-select">
            <!-- Options will be populated by JS -->
            </select>
        </div>

        <!-- Machine Name Select Dropdown -->
        <div>
            <label for="machineSelect" class="form-label mb-1">Select Machine</label>
            <select id="machineSelect" class="form-select">
            <option value="3D Printer Ultimaker S5 (New)">3D Printer Ultimaker S5 (New)</option>
            <option value="3D Printer Ultimaker S5 (Old)">3D Printer Ultimaker S5 (Old)</option>
            <option value="3D Printer Bambu Lab X1C">3D Printer Bambu Lab X1C</option>
           
            </select>
        </div>
        </div>

        <!-- Header and Add Button -->
        <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
        <h5>
            Machine Name:
            <span id="machineName" class="text-primary"></span>
        </h5>

        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#inventoryModal">
            <i class="bi bi-plus-circle"></i> Add Inventory
        </button>
        </div>


    <!-- Month Title (moved below the machine name) -->
    <div id="monthTitle" class="fw-bold mb-4">January 2025</div>

    <!-- Inventory Table -->
    <div class="table-responsive">
      <table class="table table-bordered bg-white shadow-sm">
        <thead class="table-dark text-center">
          <tr>
            <th>Item no.</th>
            <th>CATEGORY</th>
            <th>Description</th>
            <th>TYPES</th>
            <th>COLOR</th>
            <th>Start of Month<br><small>(Supply Available)</small></th>
            <th>Additional Supply,<br><small>if any</small></th>
            <th>End of Month Inventory</th>
            <th>Month Consumption</th>
            <th class="highlight">Remarks / Available Supply</th>
            <th>UNIT</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="inventoryTableBody"></tbody>
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
              <input type="text" id="itemCategory" class="form-control" required />
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
            <div class="col-md-4">
              <label class="form-label">Unit</label>
              <input type="text" id="itemUnit" class="form-control" />
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
              <label class="form-label">Consumption</label>
              <input type="number" id="consumedQty" class="form-control" required />
            </div>
            <div class="col-md-12">
              <label class="form-label">Remarks / Available Supply</label>
              <input type="number" id="remarks" class="form-control" required />
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

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/profile/machine-detail.js"></script>

</body>
</html>
