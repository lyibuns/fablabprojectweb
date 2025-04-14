

const monthFilter = document.getElementById("monthFilter");
const monthTitle = document.getElementById("monthTitle");
const inventoryTableBody = document.getElementById("inventoryTableBody");
const machineNameSpan = document.getElementById("machineName");
const machineSelect = document.getElementById("machineSelect");

let machineName = machineSelect.value;  // Default machine name based on the select dropdown value

const monthNames = [
  "January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"
];

const currentDate = new Date();
const currentMonth = `${String(currentDate.getMonth() + 1).padStart(2, '0')}-${currentDate.getFullYear()}`;

function populateMonthDropdown() {
  const currentYear = currentDate.getFullYear();
  monthNames.forEach((name, index) => {
    const value = `${String(index + 1).padStart(2, '0')}-${currentYear}`;
    const option = document.createElement("option");
    option.value = value;
    option.textContent = `${name} ${currentYear}`;
    monthFilter.appendChild(option);
  });
  monthFilter.value = currentMonth;
  updateMonthTitle(currentMonth);
  loadInventory();
}

function updateMonthTitle(monthYear) {
  const [month, year] = monthYear.split("-");
  const monthIndex = parseInt(month) - 1;
  monthTitle.textContent = `${monthNames[monthIndex]} ${year}`;
}

function updateMachineName() {
  machineName = machineSelect.value;
  machineNameSpan.textContent = machineName;
  loadInventory();  // Reload inventory when machine name changes
}

machineSelect.addEventListener("change", updateMachineName);

monthFilter.addEventListener("change", () => {
  updateMonthTitle(monthFilter.value);
  loadInventory();
});

function loadInventory() {
  const selectedMonth = monthFilter.value;

  db.collection("inventory")
    .where("machine_name", "==", machineName)
    .where("month", "==", selectedMonth)
    .orderBy("category")
    .get()
    .then(snapshot => {
      inventoryTableBody.innerHTML = "";
      const groupedData = {};

      snapshot.forEach(doc => {
        const data = doc.data();
        const category = data.category.toUpperCase();

        if (!groupedData[category]) groupedData[category] = [];
        groupedData[category].push({ id: doc.id, ...data });
      });

      let itemNo = 1;
      for (const category in groupedData) {
        const categoryRow = document.createElement("tr");
        categoryRow.innerHTML = `<td colspan="12" class="table-secondary fw-bold text-center">${category}</td>`;
        inventoryTableBody.appendChild(categoryRow);

        groupedData[category].forEach(item => {
          const row = document.createElement("tr");
          row.innerHTML = `
            <td class="text-center">${itemNo++}</td>
            <td>${item.category}</td>
            <td>${item.description}</td>
            <td>${item.type || ''}</td>
            <td>${item.color || ''}</td>
            <td>${item.start_qty || 0}</td>
            <td>${item.added_qty || 0}</td>
            <td>${item.end_qty || 0}</td>
            <td>${item.consumed_qty || 0}</td>
            <td>${item.remarks || ''}</td>
            <td>${item.unit || ''}</td>
            <td>
              <button class="btn btn-sm btn-primary me-1" onclick="editItem('${item.id}')"><i class="bi bi-pencil"></i></button>
              <button class="btn btn-sm btn-danger" onclick="deleteItem('${item.id}')"><i class="bi bi-trash"></i></button>
            </td>
          `;
          inventoryTableBody.appendChild(row);
        });
      }
    });
}

window.editItem = function (id) {
  db.collection("inventory").doc(id).get().then(doc => {
    const data = doc.data();
    document.getElementById("itemId").value = doc.id;
    document.getElementById("itemCategory").value = data.category;
    document.getElementById("itemDescription").value = data.description;
    document.getElementById("itemType").value = data.type || '';
    document.getElementById("itemColor").value = data.color || '';
    document.getElementById("itemUnit").value = data.unit || '';
    document.getElementById("startQty").value = data.start_qty || 0;
    document.getElementById("addQty").value = data.added_qty || 0;
    document.getElementById("endQty").value = data.end_qty || 0;
    document.getElementById("consumedQty").value = data.consumed_qty || 0;
    document.getElementById("remarks").value = data.remarks || '';
    document.getElementById("currentMonth").value = data.month;

    document.getElementById("modalTitle").textContent = "Edit Inventory Item";
    const modal = new bootstrap.Modal(document.getElementById('inventoryModal'));
    modal.show();
  });
};

window.deleteItem = function (id) {
  if (confirm("Are you sure you want to delete this item?")) {
    db.collection("inventory").doc(id).delete().then(() => {
      loadInventory();
    });
  }
};

// Handle Form Submission
const inventoryForm = document.getElementById("inventoryForm");
inventoryForm.addEventListener("submit", e => {
  e.preventDefault();

  const id = document.getElementById("itemId").value;
  const item = {
    category: document.getElementById("itemCategory").value,
    description: document.getElementById("itemDescription").value,
    type: document.getElementById("itemType").value,
    color: document.getElementById("itemColor").value,
    unit: document.getElementById("itemUnit").value,
    start_qty: parseInt(document.getElementById("startQty").value),
    added_qty: parseInt(document.getElementById("addQty").value),
    end_qty: parseInt(document.getElementById("endQty").value),
    consumed_qty: parseInt(document.getElementById("consumedQty").value),
    remarks: document.getElementById("remarks").value,
    machine_name: machineName,
    month: monthFilter.value
  };

  if (id) {
    db.collection("inventory").doc(id).update(item).then(() => {
      bootstrap.Modal.getInstance(document.getElementById('inventoryModal')).hide();
      inventoryForm.reset();
      loadInventory();
    });
  } else {
    db.collection("inventory").add(item).then(() => {
      bootstrap.Modal.getInstance(document.getElementById('inventoryModal')).hide();
      inventoryForm.reset();
      loadInventory();
    });
  }
});

populateMonthDropdown();
