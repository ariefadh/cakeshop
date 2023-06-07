
  
$(document).ready(function() {
    var currentIndex = -1;
    var images = $(".column img");
    
    // Fungsi untuk menampilkan gambar berikutnya secara otomatis
    function showNextImage() {
        currentIndex++;
        if (currentIndex >= images.length) {
            currentIndex = 0;
        }
        var img = images.eq(currentIndex);
        myFunction(img[0]);
    }
    
    // Set timer untuk menampilkan gambar berikutnya setiap 3 detik
    setInterval(showNextImage, 3000);
});
    
function myFunction(imgs) {
    var expandImg = document.getElementById("expandedImg");
    expandImg.src = imgs.src;
    expandImg.parentElement.style.display = "block";
}

