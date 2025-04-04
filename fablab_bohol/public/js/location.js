const cards = document.querySelectorAll('.locp-card');
const mapImage = document.getElementById('locp-map-img');
const mapLink = document.getElementById('locp-map-link');

cards.forEach(card => {
    card.addEventListener('click', () => {
        const newMap = card.getAttribute('data-map');
        const newLink = card.getAttribute('data-link');

        mapImage.src = newMap;
        mapLink.href = newLink;
    });
});
