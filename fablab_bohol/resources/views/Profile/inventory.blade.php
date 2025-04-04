<!DOCTYPE html>
<html>
<head>
    <title>Inventory & Maintenance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    @include('NavBars.head')
    <style>
        td[contenteditable="true"]:focus {
            outline: 2px solid #007bff;
            background-color: #eef7ff;
        }
    </style>
</head>
<body>

@include('NavBars.navbar')
@include('NavBars.sidebar')
@include('NavBars.leftsidebar')

<div class="inventorywrapper">
    <div class="container my-5">

        <!-- Toggle Buttons -->
        <div class="d-flex justify-content-center mb-4 gap-3">
            <button id="showMachinesBtn" class="btn btn-outline-dark">
                <i class="bi bi-gear-fill me-1"></i> Machine Lists
            </button>
            <button id="showInventoryBtn" class="btn btn-outline-dark">
                <i class="bi bi-box-seam me-1"></i> Inventory
            </button>
            <button id="showMachBtn" class="btn btn-outline-dark">
                <i class="bi bi-tools me-1"></i> Machine Maintenance 
            </button>
        </div>

        <!-- Inventory Section -->
        <div id="inventorySection">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Inventory</h2>
                <div class="d-flex gap-2">
                    <input type="text" id="inventorySearch" class="form-control" placeholder="Search Inventory">
                    <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addInventoryModal">
                        <i class="bi bi-plus-circle me-1"></i> Add Inventory
                    </button>
                </div>
            </div>
            <table id="inventoryTable" class="table table-bordered table-striped align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Item Name</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

        <!-- Machine Maintenance Section -->
        <div id="machineSection" style="display: none;">
            <div class="d-flex justify-content-between align-items-center mt-5 mb-4">
                <h2>Machine Maintenance</h2>
                <div class="d-flex gap-2">
                    <input type="text" id="machineSearch" class="form-control" placeholder="Search Machines">
                    <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addMachineModal">
                        <i class="bi bi-plus-circle me-1"></i> Add Machine
                    </button>
                </div>
            </div>
            <table class="table table-bordered align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Machine</th>
                        <th>Model</th>
                        <th>Last Maintenance</th>
                        <th>Next Due</th>
                        <th>Status</th>
                        <th>Maintenance Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="machineTable"></tbody>
            </table>
        </div>

        <!-- Machine List Section -->
        <div id="machineListSection" style="display: none;">
            <div class="d-flex justify-content-between align-items-center mt-5 mb-4">
                <h2>Machine List</h2>
                <div class="d-flex gap-2">
                    <input type="text" id="machineListSearch" class="form-control" placeholder="Search Machines">
                    <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addMachineListModal">
                        <i class="bi bi-plus-circle me-1"></i> Add Machine
                    </button>
                </div>
            </div>
            <table class="table table-bordered align-middle text-center" id="machineListTable">
                <thead class="table-dark">
                    <tr>
                        <th>Machine Brand</th>
                        <th>Machine Type</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="machineListBody"></tbody>
            </table>
        </div>
    </div>

    <!-- Inventory Modal -->
    <div class="modal fade" id="addInventoryModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <form class="modal-content" id="inventoryForm">
                <div class="modal-header">
                    <h5 class="modal-title">Add Inventory Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Item Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select class="form-select" name="category" required>
                            <option value="" disabled selected>Select Category</option>
                            <option value="3D Printer">3D Printer</option>
                            <option value="Laser Cutting Machine">Laser Cutting Machine</option>
                            <option value="CNC Milling Machine">CNC Milling Machine</option>
                            <option value="Vinyl Cutter">Vinyl Cutter</option>
                            <option value="Digital Embroidery Machine">Digital Embroidery Machine</option>
                            <option value="3D Scanner">3D Scanner</option>
                            <option value="Vaquform">Vaquform</option>
                            <option value="Print and Cut Machine">Print and Cut Machine</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="number" class="form-control" name="quantity" min="0">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="saveItem" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i> Save Item
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Machine Modal -->
    <div class="modal fade" id="addMachineModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <form class="modal-content" id="machineForm">
                <div class="modal-header">
                    <h5 class="modal-title text-success">Add Machine</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
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
                        <label class="form-label">Maintenance Type</label>
                        <textarea class="form-control" name="remarks" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="status" required>
                            <option value="" disabled selected>Select status</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Overdue">Overdue</option>
                            <option value="Completed">Completed</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="submitMachine" class="btn btn-success">
                        <i class="bi bi-save me-1"></i> Save Machine
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Machine List Modal -->
    <div class="modal fade" id="addMachineListModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <form class="modal-content" id="machineListForm">
                <div class="modal-header">
                    <h5 class="modal-title text-success">Add Machine to List</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Machine Brand</label>
                        <input type="text" class="form-control" name="brand" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Machine Type</label>
                        <input type="text" class="form-control" name="type" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="status" required>
                            <option value="" disabled selected>Select status</option>
                            <option value="Operational">Operational</option>
                            <option value="Under Maintenance">Under Maintenance</option>
                            <option value="Out of Service">Out of Service</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save me-1"></i> Add Machine
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Firebase Config & Scripts -->
<script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-app-compat.js"></script>
<script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-firestore-compat.js"></script>



<script src="{{ asset('js/profile/inventory.js') }}"></script>
<script src="{{ asset('js/sidepanel.js') }}"></script>

</body>
</html>
