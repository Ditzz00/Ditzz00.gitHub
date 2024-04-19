document.getElementById('gambar1').addEventListener('mouseover', function() {
    this.style.transform = "scale(1.5)";
    this.style.transition = "transform 0.5s ease"; 
    this.style.backgroundColor = "#e71111"; 
});

document.getElementById('gambar1').addEventListener('mouseout', function() {
    this.style.transform = "scale(1)";
    this.style.transition = "transform 0.5s ease"; 
    this.style.backgroundColor = "transparent"; 
});

document.querySelector('.profil.ml img').addEventListener('mouseover', function() {
    this.style.transform = "scale(1.5)";
    this.style.transition = "transform 0.5s ease"; 
    this.style.backgroundColor = "#e71111"; 
});

document.querySelector('.profil.ml img').addEventListener('mouseout', function() {
    this.style.transform = "scale(1)";
    this.style.transition = "transform 0.5s ease"; 
    this.style.backgroundColor = "transparent"; 
});