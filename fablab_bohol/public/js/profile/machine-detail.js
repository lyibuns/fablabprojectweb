// DOM elements
const dateInput = document.getElementById("dateFilter");
const machineNameElement = document.getElementById("machineName");
const monthTitle = document.getElementById("monthTitle");
const inventoryTableBody = document.getElementById("inventoryTableBody");

// Get machine ID from URL
const urlParams = new URLSearchParams(window.location.search);
const machineId = urlParams.get("machineId");

let machineName = "";
let machineType = "";
let editingInventoryId = null; // Track if editing

// Ensure jQuery is loaded (for Bootstrap modal)
if (typeof $ === "undefined") {
  const script = document.createElement("script");
  script.src = "https://code.jquery.com/jquery-3.6.0.min.js";
  document.head.appendChild(script);
}

// Fetch machine details
function fetchMachineDetails() {
  if (!machineId) {
    machineNameElement.textContent = "Machine not found";
    return;
  }

  db.collection("machines").doc(machineId).get()
    .then((doc) => {
      if (doc.exists) {
        const data = doc.data();
        machineName = data.machine_name || "Unnamed Machine";
        machineType = data.machine_type || "Unknown Type";
        machineNameElement.textContent = `${machineName} (${machineType})`;
        document.title = `Inventory | ${machineName}`;

        const today = new Date().toISOString().split("T")[0];
        dateInput.value = today;
        dateInput.dispatchEvent(new Event("change"));
      } else {
        machineNameElement.textContent = "Machine not found";
      }
    })
    .catch((error) => {
      console.error("Error fetching machine details:", error);
      machineNameElement.textContent = "Error loading machine";
    });
}

fetchMachineDetails();

// Format "Month Year"
function formatDateToMonthYear(date) {
  const month = date.toLocaleString("default", { month: "long" });
  const year = date.getFullYear();
  return `${month} ${year}`;
}

// Handle date change
dateInput.addEventListener("change", () => {
  const date = new Date(dateInput.value);
  if (!isNaN(date.getTime())) {
    monthTitle.textContent = formatDateToMonthYear(date);
    loadInventoryData(date);
  }
});

// Load inventory for selected machine/month/year
function loadInventoryData(selectedDate) {
  if (!machineName) return;

  const month = selectedDate.getMonth() + 1;
  const year = selectedDate.getFullYear();

  db.collection("inventory")
    .where("machine", "==", machineName)
    .where("month", "==", month)
    .where("year", "==", year)
    .get()
    .then((querySnapshot) => {
      inventoryTableBody.innerHTML = "";
      let itemNo = 1;

      querySnapshot.forEach((doc) => {
        const data = doc.data();
        const row = document.createElement("tr");

        row.innerHTML = `
          <td style="text-align:center; vertical-align:middle;">${itemNo}</td>
          <td style="text-align:center; vertical-align:middle;">${data.category || ""}</td>
          <td style="text-align:center; vertical-align:middle;">${data.description || ""}</td>
          <td style="text-align:center; vertical-align:middle;">${data.type || ""}</td>
          <td style="text-align:center; vertical-align:middle;">${data.color || ""}</td>
          <td style="text-align:center; vertical-align:middle;">${data.startQty || ""}</td>
          <td style="text-align:center; vertical-align:middle;">${data.addedQty || ""}</td>
          <td style="text-align:center; vertical-align:middle;">${data.endQty || ""}</td>
          <td style="text-align:center; vertical-align:middle;">${data.consumedQty || ""}</td>
          <td style="text-align:center; vertical-align:middle;">${data.remarks || ""}</td>
          <td style="text-align:center; vertical-align:middle;">${data.unit || ""}</td>
          <td style="text-align:center; vertical-align:middle;">
            <button class="btn btn-warning btn-sm" onclick="editInventory('${doc.id}')">Edit</button>
            <button class="btn btn-danger btn-sm" onclick="deleteInventory('${doc.id}')">Delete</button>
          </td>
        `;

        inventoryTableBody.appendChild(row);
        itemNo++;
      });
    })
    .catch((error) => {
      console.error("Error fetching inventory data:", error);
    });
}

// Submit Inventory Form (Add or Edit)
document.getElementById("inventoryForm").addEventListener("submit", async (event) => {
  event.preventDefault();

  const selectedDate = new Date(dateInput.value);
  const month = selectedDate.getMonth() + 1;
  const year = selectedDate.getFullYear();

  const inventoryData = {
    machine: machineName,
    category: document.getElementById("itemCategory").value || '',
    description: document.getElementById("itemDescription").value || '',
    type: document.getElementById("itemType").value || '',
    color: document.getElementById("itemColor").value || '',
    startQty: document.getElementById("startQty").value || '',
    addedQty: document.getElementById("addQty").value || '',
    endQty: document.getElementById("endQty").value || '',
    consumedQty: document.getElementById("consumedQty").value || '',
    remarks: document.getElementById("availableSupply").value || '',
    unit: document.getElementById("itemUnit").value || '',
    month: month,
    year: year,
  };

  if (editingInventoryId) {
    // Update existing
    db.collection("inventory").doc(editingInventoryId).update(inventoryData)
      .then(() => {
        alert("Inventory item updated successfully.");
        $('#inventoryModal').modal('hide');
        loadInventoryData(selectedDate);
        editingInventoryId = null;
      })
      .catch((error) => {
        console.error("Error updating inventory:", error);
      });
  } else {
    // Add new
    db.collection("inventory").add(inventoryData)
      .then(() => {
        alert("Inventory item added successfully.");
        $('#inventoryModal').modal('hide');
        loadInventoryData(selectedDate);
      })
      .catch((error) => {
        console.error("Error saving inventory:", error);
      });
  }
});

// Edit inventory item
function editInventory(id) {
  db.collection("inventory").doc(id).get()
    .then((doc) => {
      if (doc.exists) {
        const data = doc.data();
        document.getElementById("itemCategory").value = data.category || '';
        document.getElementById("itemDescription").value = data.description || '';
        document.getElementById("itemType").value = data.type || '';
        document.getElementById("itemColor").value = data.color || '';
        document.getElementById("startQty").value = data.startQty || '';
        document.getElementById("addQty").value = data.addedQty || '';
        document.getElementById("endQty").value = data.endQty || '';
        document.getElementById("consumedQty").value = data.consumedQty || '';
        document.getElementById("availableSupply").value = data.remarks || '';
        document.getElementById("itemUnit").value = data.unit || '';
        editingInventoryId = id;
        $('#inventoryModal').modal('show');
      }
    })
    .catch((error) => {
      console.error("Error loading inventory for edit:", error);
    });
}

// Delete inventory item
function deleteInventory(id) {
  if (confirm("Are you sure you want to delete this inventory item?")) {
    db.collection("inventory").doc(id).delete()
      .then(() => {
        alert("Inventory item deleted successfully.");
        loadInventoryData(new Date(dateInput.value));
      })
      .catch((error) => {
        console.error("Error deleting inventory item:", error);
      });
  }
}

// Load maintenance when modal opens
$('#monthlyMaintenanceModal').on('show.bs.modal', function () {
  loadMaintenanceReport();
});

// Load maintenance reports
function loadMaintenanceReport() {
  if (!machineName) return;

  db.collection("maintenance_reports")
    .where("machine", "==", machineName)
    .get()
    .then((querySnapshot) => {
      const maintenanceReportBody = document.getElementById("maintenanceReportBody");
      maintenanceReportBody.innerHTML = "";
      querySnapshot.forEach((doc) => {
        const data = doc.data();
        const row = document.createElement("div");
        row.classList.add("mb-3", "p-2", "border", "rounded", "bg-light");
        row.innerHTML = `
          <h6>${data.maintenanceDate || "Unknown Date"}</h6>
          <p><strong>Status:</strong> ${data.machineStatus || "N/A"}</p>
          <p><strong>Problem:</strong> ${data.problemEncountered || "None"}</p>
          <p><strong>Actions:</strong> ${data.actionsTaken || "None"}</p>
          <p><strong>Type:</strong> ${data.type || "N/A"}</p>
          <p><strong>Remarks:</strong> ${data.remarks || ""}</p>
        `;
        maintenanceReportBody.appendChild(row);
      });
    })
    .catch((error) => {
      console.error("Error loading maintenance reports:", error);
    });
}

// Submit Maintenance Form
document.getElementById("maintenanceForm").addEventListener("submit", (event) => {
  event.preventDefault();

  const maintenanceData = {
    machine: machineName,
    maintenanceDate: document.getElementById("maintenanceDate").value || '',
    performedBy: document.getElementById("performedBy").value || '',
    
    machineStatus: document.getElementById("machineStatus").value || '',
    problemEncountered: document.getElementById("problemEncountered").value || '',
    actionsTaken: document.getElementById("actionsTaken").value || '',
    month: new Date(document.getElementById("maintenanceDate").value).getMonth() + 1,
  };

  db.collection("maintenance_reports").add(maintenanceData)
    .then(() => {
      alert("Maintenance report saved successfully.");
      $('#monthlyMaintenanceModal').modal('hide');
    })
    .catch((error) => {
      console.error("Error saving maintenance report:", error);
    });
});

// Search filter
document.addEventListener('DOMContentLoaded', function () {
  const searchInput = document.getElementById('searchInput');
  const tableBody = document.getElementById('inventoryTableBody');

  searchInput.addEventListener('input', function () {
    const searchTerm = this.value.toLowerCase();
    Array.from(tableBody.getElementsByTagName('tr')).forEach(row => {
      const rowText = row.textContent.toLowerCase();
      row.style.display = rowText.includes(searchTerm) ? '' : 'none';
    });
  });
});


function printPage() {
  window.print();
}

