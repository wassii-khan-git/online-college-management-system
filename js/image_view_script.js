function getImage(imagename) {
    Image_path_container = document.getElementById("display_image_path");
    var newimage = imagename.replace(/^.*\\/, "");
    Image_path_container.innerHTML = newimage;
}