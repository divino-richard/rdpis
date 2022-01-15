
/**
 * THIS FUNCTION WILL TOGGLE THE CONFIRM DELETE PERSON POPUP/MODAL 
 */
let modal = document.querySelector(".modal_container")
function confirmDelete(personId, firstname){
  let confirmDeleteMsg = document.querySelector(".comfirm_delete_msg")
  let confirmDeleteBtn = document.getElementById("confirm_delete")
  modal.style.display = "flex"; //SHOW THE CONFIRM DELETE PERSON POPUP/MODAL 
  confirmDeleteMsg.textContent = `Are you sure you want to delete ${firstname}'s data?` //THE MODAL MESSAGE WITH THE SELECTED PERSON NAME 
  confirmDeleteBtn.href = `./process/delete_person.php?person_id=${personId}`
}
//HIDE THE CONFIRM DELETE PERSON POPUP/MODAL 
modal.addEventListener("click", ()=>{
  modal.style.display = "none"
})
