document.getElementById('openModal').addEventListener('click', function() {
    document.getElementById('modal').style.display = 'block';
});

document.getElementById('modal').addEventListener('click', function(event) {
    if (event.target === this) {
        this.style.display = 'none';
    }
});
