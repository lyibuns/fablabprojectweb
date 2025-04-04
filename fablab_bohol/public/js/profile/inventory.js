document.addEventListener("DOMContentLoaded", async () => {
    // ============ Firestore Refs ============
    const db = firebase.firestore();
    const inventoryRef = db.collection("inventory");
    const machinesRef = db.collection("machines");
    const machineListRef = db.collection("machineList");

    // ============ DOM Elements ============
    const inventoryTableBody = document.querySelector('#inventoryTable tbody');
    const machineTableBody = document.getElementById('machineTable');
    const machineListTableBody = document.getElementById('machineListBody');

    const inventorySection = document.getElementById('inventorySection');
    const machineSection = document.getElementById('machineSection');
    const machineListSection = document.getElementById('machineListSection');

    const hideAllSections = () => {
        inventorySection.style.display = 'none';
        machineSection.style.display = 'none';
        machineListSection.style.display = 'none';
    };

    document.getElementById('showInventoryBtn').addEventListener('click', () => {
        hideAllSections();
        inventorySection.style.display = 'block';
    });

    document.getElementById('showMachBtn').addEventListener('click', () => {
        hideAllSections();
        machineSection.style.display = 'block';
    });

    document.getElementById('showMachinesBtn').addEventListener('click', () => {
        hideAllSections();
        machineListSection.style.display = 'block';
    });

    // ============ INVENTORY ============

    const renderInventoryTable = (items) => {
        inventoryTableBody.innerHTML = '';
        items.forEach(item => {
            inventoryTableBody.innerHTML += `
                <tr>
                    <td>${item.name}</td>
                    <td>${item.category}</td>
                    <td>${item.quantity}</td>
                    <td>
                        <div class="d-flex gap-1 justify-content-center">
                            <button class="btn btn-sm btn-primary edit" data-id="${item.id}">Edit</button>
                            <button class="btn btn-sm btn-danger delete" data-id="${item.id}">Delete</button>
                        </div>
                    </td>
                </tr>`;
        });
    };

    inventoryRef.onSnapshot(snapshot => {
        const items = [];
        snapshot.forEach(doc => items.push({ id: doc.id, ...doc.data() }));
        renderInventoryTable(items);
    });

    document.getElementById('saveItem').addEventListener('click', async () => {
        const form = document.getElementById('inventoryForm');
        const name = form.name.value.trim();
        const category = form.category.value;
        const quantity = parseInt(form.quantity.value, 10);

        if (!name || !category || isNaN(quantity)) {
            return alert("Please fill out all fields properly.");
        }

        try {
            await inventoryRef.add({ name, category, quantity });
            form.reset();
            bootstrap.Modal.getInstance(document.getElementById('addInventoryModal')).hide();
        } catch (err) {
            console.error("Error saving inventory:", err);
        }
    });

    inventoryTableBody.addEventListener('click', async (e) => {
        const btn = e.target;
        const row = btn.closest('tr');
        const id = btn.dataset.id;

        if (!id) return;

        const nameCell = row.children[0];
        const categoryCell = row.children[1];
        const quantityCell = row.children[2];

        if (btn.classList.contains('edit')) {
            const name = prompt("Edit Name:", nameCell.textContent);
            const category = prompt("Edit Category:", categoryCell.textContent);
            const quantity = parseInt(prompt("Edit Quantity:", quantityCell.textContent), 10);

            if (name && category && !isNaN(quantity)) {
                await inventoryRef.doc(id).update({ name, category, quantity });
            }
        }

        if (btn.classList.contains('delete')) {
            if (confirm(`Delete "${nameCell.textContent}"?`)) {
                await inventoryRef.doc(id).delete();
            }
        }
    });

    document.getElementById('inventorySearch').addEventListener('keyup', function () {
        const term = this.value.toLowerCase();
        Array.from(inventoryTableBody.querySelectorAll('tr')).forEach(row => {
            row.style.display = row.innerText.toLowerCase().includes(term) ? '' : 'none';
        });
    });

    // ============ MACHINE MAINTENANCE ============

    const renderMachineTable = (items) => {
        machineTableBody.innerHTML = '';
        items.forEach(item => {
            machineTableBody.innerHTML += `
                <tr data-id="${item.id}">
                    <td contenteditable="true" class="editable" data-key="name">${item.name}</td>
                    <td contenteditable="true" class="editable" data-key="model">${item.model || ''}</td>
                    <td contenteditable="true" class="editable" data-key="last_maintenance">${item.last_maintenance || ''}</td>
                    <td contenteditable="true" class="editable" data-key="next_due">${item.next_due || ''}</td>
                    <td>
                        <select class="form-select form-select-sm status-select" data-id="${item.id}">
                            <option value="In Progress" ${item.status === 'In Progress' ? 'selected' : ''}>In Progress</option>
                            <option value="Overdue" ${item.status === 'Overdue' ? 'selected' : ''}>Overdue</option>
                            <option value="Completed" ${item.status === 'Completed' ? 'selected' : ''}>Completed</option>
                        </select>
                    </td>
                    <td contenteditable="true" class="editable" data-key="remarks">${item.remarks || ''}</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-danger delete-machine">Delete</button>
                    </td>
                </tr>`;
        });
    };

    machinesRef.onSnapshot(snapshot => {
        const machines = [];
        snapshot.forEach(doc => machines.push({ id: doc.id, ...doc.data() }));
        renderMachineTable(machines);
    });

    document.getElementById('machineForm').addEventListener('submit', async function (e) {
        e.preventDefault();
        const formData = new FormData(this);
        const data = {
            name: formData.get('name').trim(),
            model: formData.get('model').trim(),
            last_maintenance: formData.get('last_maintenance'),
            next_due: formData.get('next_due'),
            status: formData.get('status'),
            remarks: formData.get('remarks').trim()
        };

        if (!data.name) return alert("Name is required.");

        try {
            await machinesRef.add(data);
            this.reset();
            bootstrap.Modal.getInstance(document.getElementById('addMachineModal')).hide();
        } catch (err) {
            console.error("Error adding machine:", err);
        }
    });

    machineTableBody.addEventListener('blur', async function (e) {
        if (e.target.classList.contains('editable')) {
            const cell = e.target;
            const row = cell.closest('tr');
            const id = row.dataset.id;
            const key = cell.dataset.key;
            const value = cell.innerText.trim();

            if (value !== "") {
                await machinesRef.doc(id).update({ [key]: value });
            }
        }
    }, true);

    machineTableBody.addEventListener('change', async function (e) {
        if (e.target.classList.contains('status-select')) {
            const id = e.target.dataset.id;
            const newStatus = e.target.value;
            await machinesRef.doc(id).update({ status: newStatus });
        }
    });

    machineTableBody.addEventListener('click', async function (e) {
        if (e.target.classList.contains('delete-machine')) {
            const row = e.target.closest('tr');
            const id = row.dataset.id;
            const name = row.querySelector('[data-key="name"]').innerText || 'this machine';
            if (confirm(`Delete "${name}"?`)) {
                await machinesRef.doc(id).delete();
            }
        }
    });

    document.getElementById('machineSearch').addEventListener('keyup', function () {
        const term = this.value.toLowerCase();
        Array.from(machineTableBody.querySelectorAll('tr')).forEach(row => {
            row.style.display = row.innerText.toLowerCase().includes(term) ? '' : 'none';
        });
    });

    // ============ MACHINE LIST ============

    const renderMachineListTable = (items) => {
        machineListTableBody.innerHTML = '';
        items.forEach(item => {
            machineListTableBody.innerHTML += `
                <tr data-id="${item.id}">
                    <td contenteditable="true" class="ml-edit" data-key="brand">${item.brand}</td>
                    <td contenteditable="true" class="ml-edit" data-key="type">${item.type}</td>
                    <td contenteditable="true" class="ml-edit" data-key="status">${item.status}</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-danger ml-delete" data-id="${item.id}">Delete</button>
                    </td>
                </tr>`;
        });
    };

    machineListRef.onSnapshot(snapshot => {
        const list = [];
        snapshot.forEach(doc => list.push({ id: doc.id, ...doc.data() }));
        renderMachineListTable(list);
    });

    document.getElementById('machineListForm').addEventListener('submit', async function (e) {
        e.preventDefault();
        const form = e.target;
        const brand = form.brand.value.trim();
        const type = form.type.value.trim();
        const status = form.status.value;

        if (!brand || !type || !status) return alert("All fields required.");

        try {
            await machineListRef.add({ brand, type, status });
            form.reset();
            bootstrap.Modal.getInstance(document.getElementById('addMachineListModal')).hide();
        } catch (err) {
            console.error("Error saving machine to list:", err);
        }
    });

    document.getElementById('machineListSearch').addEventListener('keyup', function () {
        const term = this.value.toLowerCase();
        Array.from(machineListTableBody.querySelectorAll('tr')).forEach(row => {
            row.style.display = row.innerText.toLowerCase().includes(term) ? '' : 'none';
        });
    });

    machineListTableBody.addEventListener('blur', async function (e) {
        if (e.target.classList.contains('ml-edit')) {
            const cell = e.target;
            const row = cell.closest('tr');
            const id = row.dataset.id;
            const key = cell.dataset.key;
            const value = cell.innerText.trim();

            if (value !== '') {
                await machineListRef.doc(id).update({ [key]: value });
            }
        }
    }, true);

    machineListTableBody.addEventListener('click', async function (e) {
        if (e.target.classList.contains('ml-delete')) {
            const row = e.target.closest('tr');
            const id = row.dataset.id;
            const brand = row.querySelector('[data-key="brand"]').innerText || 'this machine';
            if (confirm(`Delete "${brand}"?`)) {
                await machineListRef.doc(id).delete();
            }
        }
    });
});
