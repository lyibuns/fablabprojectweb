<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Inventory & Maintenance</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  @include('NavBars.head')
</head>
<body>

@include('NavBars.navbar')
@include('NavBars.sidebar')
@include('NavBars.leftsidebar')

<div class="addmach-wrapper">
  <div class="container">
    <div class="d-flex justify-content-end mb-4" style="margin-right: -113px; margin-top:200px;">
      <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addMachineModal">
        <i class="bi bi-plus-circle me-1"></i> Add Machine
      </button>
    </div>
  </div>
</div>

<div class="intfac-wrapper">
  <section class="intfac-list">

    <div class="intfac">
      <img src="{{ asset('../images/mac3d.png') }}" alt="3D Printer">
      <h3>3D Printer</h3>
      <button class="btn btn-outline-primary mt-3" data-category="3D Printer" id="view3dPrinter">View Inventory</button>
    </div>

    <div class="intfac">
      <img src="{{ asset('../images/maclaser.png') }}" alt="Laser Cutter">
      <h3>Laser Cutting Machine</h3>
      <button class="btn btn-outline-primary mt-3" data-category="Laser Cutter" id="viewLaserCutter">View Inventory</button>
    </div>

    <div class="intfac">
      <img src="{{ asset('../images/maccnc.png') }}" alt="CNC Milling Machine">
      <h3>CNC Milling Machine</h3>
      <button class="btn btn-outline-primary mt-3" data-category="CNC Milling Machine" id="viewCncMilling">View Inventory</button>
    </div>

    <div class="intfac">
      <img src="{{ asset('../images/macvinyl.png') }}" alt="Vinyl Cutter">
      <h3>Vinyl Cutter</h3>
      <button class="btn btn-outline-primary mt-3" data-category="Vinyl Cutter" id="viewVinylCutter">View Inventory</button>
    </div>

    <div class="intfac">
      <img src="{{ asset('../images/macemb.png') }}" alt="Digital Embroidery Machine">
      <h3>Digital Embroidery Machine</h3>
      <button class="btn btn-outline-primary mt-3" data-category="Embroidery Machine" id="viewEmbroideryMachine">View Inventory</button>
    </div>

    <div class="intfac">
      <img src="{{ asset('../images/macscan.png') }}" alt="3D Scanner">
      <h3>3D Scanner</h3>
      <button class="btn btn-outline-primary mt-3" data-category="3D Scanner" id="view3dScanner">View Inventory</button>
    </div>

    <div class="intfac">
      <img src="{{ asset('../images/macvaq.png') }}" alt="Vaquform">
      <h3>Vaquform</h3>
      <button class="btn btn-outline-primary mt-3" data-category="Vaquform" id="viewVaquform">View Inventory</button>
    </div>

    <div class="intfac">
      <img src="{{ asset('../images/macronald.png') }}" alt="Print and Cut">
      <h3>Print and Cut Machine</h3>
      <button class="btn btn-outline-primary mt-3" data-category="Print and Cut Machine" id="viewPrintCut">View Inventory</button>
    </div>

  </section>
</div>

<!-- Inventory Display Section -->
<div class="container mt-5" id="inventoryContainer">
  <!-- Inventory content will be dynamically inserted here -->
</div>

<!-- Add Machine Modal -->
<div class="modal fade" id="addMachineModal" tabindex="-1" aria-labelledby="addMachineLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form class="modal-content" id="machineForm">
      <div class="modal-header">
        <h5 class="modal-title" id="addMachineLabel">Add New Machine</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">Machine Name</label>
          <input type="text" class="form-control" name="machine_name" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Image URL or Path</label>
          <input type="text" class="form-control" name="image_path" placeholder="e.g. ../images/newmachine.png">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">
          <i class="bi bi-save me-1"></i> Save Machine
        </button>
      </div>
    </form>
  </div>
</div>

<!-- Firebase SDK -->
<script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-app-compat.js"></script>
<script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-firestore-compat.js"></script>

<!-- Scripts -->
<script src="js/profile/inventory.js"></script>
<script src="js/sidepanel.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
