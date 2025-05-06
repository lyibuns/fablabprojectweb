<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Inventory & Maintenance</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  @include('NavBars.head')

  <!-- Firebase SDK (Compat Version) -->
  <script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-app-compat.js"></script>
  <script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-firestore-compat.js"></script>
  <script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-auth-compat.js"></script>

  <style>
    .intfac-wrapper {
        margin-left: calc(37.5vw - 60px); /* Scales from 300px at 800px width, with a fixed offset */
        margin-top: calc(-12.5vw); /* Scales from -100px at 800px width */
    }

    .intfac-list {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); /* Responsive columns with a minimum width */
        gap: 3.75vw; /* Scales from 30px at 800px width */
        justify-content: center;
        align-items: stretch;
        padding: 2.5vw; /* Scales from 20px at 800px width */
    }
  </style>
</head>

<body>

  @include('NavBars.navbar')
  @include('NavBars.sidebar')
  @include('NavBars.leftsidebar')

  <!-- Add Machine Button -->
  <div class="addmach-wrapper">
    <div class="container">
      <div class="d-flex justify-content-end mb-4" style="margin-right: -113px; margin-top:200px;">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addMachineModal">
          <i class="bi bi-plus-circle me-1"></i> Add Machine
        </button>
      </div>
    </div>
  </div>

  <!-- Machine Category Cards (Dynamic) -->
  <div class="intfac-wrapper">
    <section class="intfac-list container d-flex flex-wrap justify-content-center gap-4" id="machineContainer">
      <!-- Dynamic machine cards will be injected here -->
    </section>
  </div>

  <!-- Modal: Add New Machine -->
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
            <label class="form-label">Machine Type</label>
            <select class="form-select" name="machine_type" required>
              <option selected disabled value="">Select Machine Type</option>
              <option value="3D Printer">3D Printer</option>
              <option value="3D Scanner">3D Scanner</option>
              <option value="Laser Cutter Machine">Laser Cutter Machine</option>
              <option value="Vinyl Cutter">Vinyl Cutter</option>
              <option value="CNC Milling Machine">CNC Milling Machine</option>
              <option value="Digital Embroidery Machine">Digital Embroidery Machine</option>
              <option value="Print & Cut Machine">Print & Cut Machine</option>
              <option value="Vaquform">Vaquform</option>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label">Google Drive Image Link</label>
            <input type="url" class="form-control" name="machine_image_url" placeholder="https://drive.google.com/uc?export=view&id=..." required>
            <div class="form-text">
              <!-- Upload to Google Drive → Get shareable link → Use format:
              <code>https://drive.google.com/uc?export=view&id=FILE_ID</code> -->
            </div>
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

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/profile/inventory.js"></script>
  <script src="js/sidepanel.js"></script>

</body>
</html>
