<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @include('NavBars.head')
    @yield('content')
</head>
<body>

@include('Navbars.navbar')
@include('NavBars.sidebar')
@include('NavBars.leftsidebar')

<div class="inventorywrapper">
  <div class="container my-5">
    <h2 class="mb-4">Inventory</h2>
    <table class="table table-bordered table-striped">
      <thead class="table-dark">
        <tr>
          <th>Item Name</th>
          <th>Category</th>
          <th>Quantity</th>
          <th>Status</th>
          <th>Notes</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody id="inventoryTable">
        <tr>
          <td>PLA Filament - Red</td>
          <td>3D Printing</td>
          <td>6</td>
          <td><span class="badge bg-success">In Stock</span></td>
          <td>1.75mm, for Ender & Prusa printers</td>
          <td>
            <button class="btn btn-sm btn-warning">Edit</button>
          </td>
        </tr>
        <tr>
          <td>Acrylic Sheet - 3mm Clear</td>
          <td>Laser Cutting</td>
          <td>3</td>
          <td><span class="badge bg-warning text-dark">Low Stock</span></td>
          <td>600x900mm, Epilog compatible</td>
          <td>
            <button class="btn btn-sm btn-warning">Edit</button>
          </td>
        </tr>
      </tbody>
    </table>

    <h2 class="mt-5 mb-4">Machine Maintenance</h2>
    <table class="table table-bordered">
      <thead class="table-dark">
        <tr>
          <th>Machine</th>
          <th>Model</th>
          <th>Last Maintenance</th>
          <th>Next Due</th>
          <th>Status</th>
          <th>Remarks</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody id="machineTable">
        <tr>
          <td>3D Printer</td>
          <td>Prusa i3 MK3S+</td>
          <td>2025-03-10</td>
          <td>2025-04-10</td>
          <td><span class="badge bg-info">Scheduled</span></td>
          <td>Nozzle cleaned, belts adjusted</td>
          <td>
            <button class="btn btn-sm btn-warning">Edit</button>
          </td>
        </tr>
        <tr>
          <td>Laser Cutter</td>
          <td>Epilog Helix 40W</td>
          <td>2025-03-01</td>
          <td>2025-04-01</td>
          <td><span class="badge bg-danger">Overdue</span></td>
          <td>Lens needs cleaning</td>
          <td>
            <button class="btn btn-sm btn-warning">Edit</button>
          </td>
        </tr>
      </tbody>
    </table>

    <div class="mt-4 d-flex gap-3">
      <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addInventoryModal">Add Inventory Item</button>
      <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addMachineModal">Add Machine</button>
    </div>
  </div>

  <!-- Inventory Modal -->
  <div class="modal fade" id="addInventoryModal" tabindex="-1" aria-labelledby="addInventoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form class="modal-content" id="inventoryForm">
        <div class="modal-header">
          <h5 class="modal-title" id="addInventoryModalLabel">Add Inventory Item</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Item Name</label>
            <input type="text" class="form-control" name="name" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Category</label>
            <input type="text" class="form-control" name="category">
          </div>
          <div class="mb-3">
            <label class="form-label">Quantity</label>
            <input type="number" class="form-control" name="quantity" min="0">
          </div>
          <div class="mb-3">
            <label class="form-label">Notes</label>
            <textarea class="form-control" name="notes" rows="3"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Add Item</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Machine Modal -->
  <div class="modal fade" id="addMachineModal" tabindex="-1" aria-labelledby="addMachineModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form class="modal-content" id="machineForm">
        <div class="modal-header">
          <h5 class="modal-title" id="addMachineModalLabel">Add Machine</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Machine Name</label>
            <input type="text" class="form-control" name="name" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Model</label>
            <input type="text" class="form-control" name="model">
          </div>
          <div class="mb-3">
            <label class="form-label">Last Maintenance</label>
            <input type="date" class="form-control" name="last_maintenance">
          </div>
          <div class="mb-3">
            <label class="form-label">Next Due</label>
            <input type="date" class="form-control" name="next_due">
          </div>
          <div class="mb-3">
            <label class="form-label">Remarks</label>
            <textarea class="form-control" name="remarks" rows="3"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Add Machine</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/sidepanel.js') }}"></script>
<script>
  document.getElementById('inventoryForm').addEventListener('submit', function(e) {
    e.preventDefault();
    alert('Inventory item submitted!');
    // Add Firebase or backend logic here...
  });

  document.getElementById('machineForm').addEventListener('submit', function(e) {
    e.preventDefault();
    alert('Machine submitted!');
    // Add Firebase or backend logic here...
  });
</script>
</body>
</html>
