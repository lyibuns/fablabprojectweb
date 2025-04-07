document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('.locp-card');
    const maps = document.querySelectorAll('.locp-map');
  
    cards.forEach(card => {
      card.addEventListener('click', () => {
        const selectedMapId = card.getAttribute('data-map-id');
  
        // Remove active state from all cards and maps
        cards.forEach(c => c.classList.remove('active'));
        maps.forEach(m => m.classList.remove('active'));
  
        // Activate clicked card and corresponding map
        card.classList.add('active');
        const selectedMap = document.getElementById(selectedMapId);
        if (selectedMap) selectedMap.classList.add('active');
      });
    });
  });
  