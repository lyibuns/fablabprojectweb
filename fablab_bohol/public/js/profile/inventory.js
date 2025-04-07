// Set up button listeners for each "View Inventory" button
window.addEventListener('DOMContentLoaded', () => {
  document.getElementById('view3dPrinter')?.addEventListener('click', () => {
    viewInventoryForm("3D Printer");
  });
  document.getElementById('viewLaserCutter')?.addEventListener('click', () => {
    viewInventoryForm("Laser Cutter");
  });
  document.getElementById('viewCncMilling')?.addEventListener('click', () => {
    viewInventoryForm("CNC Milling Machine");
  });
  document.getElementById('viewVinylCutter')?.addEventListener('click', () => {
    viewInventoryForm("Vinyl Cutter");
  });
  document.getElementById('viewEmbroideryMachine')?.addEventListener('click', () => {
    viewInventoryForm("Embroidery Machine");
  });
  document.getElementById('view3dScanner')?.addEventListener('click', () => {
    viewInventoryForm("3D Scanner");
  });
  document.getElementById('viewVaquform')?.addEventListener('click', () => {
    viewInventoryForm("Vaquform");
  });
  document.getElementById('viewPrintCut')?.addEventListener('click', () => {
    viewInventoryForm("Print and Cut Machine");
  });
});

// Function to redirect to inventory form page
function viewInventoryForm(category) {
  // Redirect to the inventory form page for the selected category
  window.location.href = `/inventory/${category.toLowerCase().replace(/\s+/g, '-')}`;
}


// Function to handle adding new machines to Firestore
document.getElementById('machineForm')?.addEventListener('submit', function (e) {
  e.preventDefault();
  
  const machineName = this.machine_name.value;
  const imagePath = this.image_path.value;

  // Add machine data to Firestore
  db.collection('machines').add({
    machine_name: machineName,
    image_path: imagePath
  }).then(() => {
    alert('Machine added successfully!');
    window.location.reload();
  }).catch(error => {
    console.error('Error adding machine:', error);
  });
});

// Load machines data from Firestore (if needed)
function loadMachinesData() {
  db.collection('machines').get()
    .then((querySnapshot) => {
      const machinesContainer = document.getElementById('inventoryContainer');
      machinesContainer.innerHTML = ''; // Clear existing content
      
      querySnapshot.forEach((doc) => {
        const machine = doc.data();
        const machineDiv = document.createElement('div');
        machineDiv.classList.add('machine-item');
        
        machineDiv.innerHTML = `
          <img src="${machine.image_path}" alt="${machine.machine_name}" class="img-fluid">
          <h4>${machine.machine_name}</h4>
        `;
        
        machinesContainer.appendChild(machineDiv);
      });
    })
    .catch((error) => {
      console.error('Error loading machines:', error);
    });
}

// Call loadMachinesData to populate the page on load
if (document.getElementById('inventoryContainer')) {
  loadMachinesData();
}
