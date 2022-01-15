

/**
 * VIEW THE PROFILE IMAGE ONCE IT IS CLICKED
 * WHEN THE PROFILE IMAGE IS CLICKED, THE  showProfileImage() FUNCTION WILL RUN
 * THIS FUCTION WILL CARRY THE IMAGE NAME
 * WE WILL PASS THAT IMAGE NAME INTO THE IMAGE VIEWER SOURCE
 */
let imageViewer = document.getElementById("image_viewer")
let modalContainer = document.querySelector(".modal_container")
const showProfileImage = (imageName) => {
    modalContainer.style.display = "flex"
    imageViewer.src = `./uploads/profileImages/${imageName}`
}
modalContainer.addEventListener('click', () => {
    modalContainer.style.display = "none"
})