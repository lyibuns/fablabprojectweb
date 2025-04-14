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
      return googleDriveUrl;  // Return as is if it's already in direct view format
    }

    const regexShareableLink = /(?:drive\.google\.com\/.*?\/d\/)(.*?)(?:\/|$)/;
    const matchShareableLink = googleDriveUrl.match(regexShareableLink);

    if (matchShareableLink && matchShareableLink[1]) {
      const fileId = matchShareableLink[1];
      return `https://drive.google.com/uc?export=view&id=${fileId}`;  // Convert to direct image URL
    } else {
      return null;  // Return null if URL is invalid
    }
  }

  // Handle form submission with image URL
  form.addEventListener("submit", (e) => {
    e.preventDefault();

    const name = form.machine_name.value.trim();
    const imageUrl = form.machine_image_url.value.trim();

    if (!name || !imageUrl) {
      alert("⚠️ Please fill in both the machine name and image URL.");
      return;
    }

    const convertedImageUrl = convertGoogleDriveUrlToImageUrl(imageUrl);
    if (!convertedImageUrl) {
      alert("⚠️ Invalid Google Drive image URL.");
      return;
    }

    // Save machine info with image URL to Firestore
    db.collection("machines").add({
      machine_name: name,
      image_path: convertedImageUrl,
      created_at: firebase.firestore.FieldValue.serverTimestamp()
    })
    .then(() => {
      form.reset();
      const modal = bootstrap.Modal.getInstance(document.getElementById('addMachineModal'));
      modal.hide();
      loadMachinesData();  // Refresh the list
    })
    .catch((error) => {
      console.error("❌ Error adding machine:", error);
      alert("Error saving machine. Please try again.");
    });
  });

  // Load machine data from Firestore
  function loadMachinesData() {
    db.collection("machines").orderBy("created_at", "desc").get()
      .then((querySnapshot) => {
        container.innerHTML = "";  // Clear previous content
        if (querySnapshot.empty) return;

        querySnapshot.forEach((doc) => {
          const data = doc.data();
          const imageSrc = data.image_path;

          const card = `
            <div class="intfac text-center">
              <img src="${imageSrc}" alt="${data.machine_name}" class="img-fluid" style="max-height: 200px; object-fit: cover;">
              <h3>${data.machine_name}</h3>
              <button class="btn btn-outline-primary mt-3" onclick="viewMachine('${doc.id}')">View Inventory</button>
            </div>`;
          container.insertAdjacentHTML("beforeend", card);
        });
      })
      .catch((error) => {
        console.error("❌ Error loading machines:", error);
      });
  }

  // Load machine data on page load
  loadMachinesData();
});
