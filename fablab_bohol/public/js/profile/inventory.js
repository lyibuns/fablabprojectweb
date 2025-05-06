// Ensure viewMachine is globally available
function viewMachine(machineId) {
  // Route to Laravel-based dynamic route, not static .html file
  window.location.href = `/machine-detail?machineId=${machineId}`;
}

document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('machineForm');
  const container = document.getElementById('machineContainer');
  const db = firebase.firestore();

  // Function to convert Google Drive shareable link to direct image URL
  function convertGoogleDriveUrlToImageUrl(googleDriveUrl) {
    const regexDirectLink = /^https:\/\/drive\.google\.com\/uc\?export=view&id=(.*)$/;
    const matchDirectLink = googleDriveUrl.match(regexDirectLink);

    if (matchDirectLink && matchDirectLink[1]) {
      return googleDriveUrl;  // Already in correct format
    }

    const regexShareableLink = /(?:drive\.google\.com\/.*?\/d\/)(.*?)(?:\/|$)/;
    const matchShareableLink = googleDriveUrl.match(regexShareableLink);

    if (matchShareableLink && matchShareableLink[1]) {
      const fileId = matchShareableLink[1];
      return `https://drive.google.com/uc?export=view&id=${fileId}`;
    } else {
      return null;
    }
  }

  // Handle form submission
  form.addEventListener("submit", (e) => {
    e.preventDefault();

    const name = form.machine_name.value.trim();
    const imageUrl = form.machine_image_url.value.trim();
    const type = form.machine_type.value;

    if (!name || !imageUrl || !type) {
      alert("⚠️ Please fill in all fields including Machine Type.");
      return;
    }

    const convertedImageUrl = convertGoogleDriveUrlToImageUrl(imageUrl);
    if (!convertedImageUrl) {
      alert("⚠️ Invalid Google Drive image URL.");
      return;
    }

    // Save machine info including type
    db.collection("machines").add({
      machine_name: name,
      machine_type: type,
      image_path: convertedImageUrl,
      created_at: firebase.firestore.FieldValue.serverTimestamp()
    })
    .then(() => {
      form.reset();
      const modal = bootstrap.Modal.getInstance(document.getElementById('addMachineModal'));
      modal.hide();
      loadMachinesData();
    })
    .catch((error) => {
      console.error("❌ Error adding machine:", error);
      alert("Error saving machine. Please try again.");
    });
  });

  // Load and display machine data
  function loadMachinesData() {
    db.collection("machines").orderBy("created_at", "desc").get()
      .then((querySnapshot) => {
        container.innerHTML = "";
        if (querySnapshot.empty) return;

        querySnapshot.forEach((doc) => {
          const data = doc.data();
          const imageSrc = data.image_path;
          const machineType = data.machine_type || "Unknown Type";

          const card = `
            <div class="intfac text-center">
              <img src="${imageSrc}" alt="${data.machine_name}" class="img-fluid" style="max-height: 200px; object-fit: cover;">
              <h3>${data.machine_name}</h3>
              <p class="text-muted">${machineType}</p>
              <button class="btn btn-outline-primary mt-2" onclick="viewMachine('${doc.id}')">View Inventory</button>
            </div>`;
          container.insertAdjacentHTML("beforeend", card);
        });
      })
      .catch((error) => {
        console.error("❌ Error loading machines:", error);
      });
  }

  // Initial data load
  loadMachinesData();
});
