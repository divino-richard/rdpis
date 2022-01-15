/**
 * PREVIEW PROFILE IMAGE
 */
function previewProfileImage(){
    let profileImage = document.getElementById("profile_image");
    let imageViewer = document.getElementById("image_viewer");
    
    // CLICK THE INPUT FILE WHEN IMAGE VIEWER IS CLICK
    imageViewer.addEventListener("click", ()=>{
        profileImage.click();
    });
    // WHEN PROFILE IMAGE IS CHANGE(image is selected) GET THE VALUE AND PUT IT INTO THE IMAGE VIEWER
    profileImage.addEventListener("change", (event)=>{
        let generatedImageUrl = URL.createObjectURL(event.target.files[0]);
        imageViewer.src = generatedImageUrl;
    });
}
previewProfileImage();

/**
 * SHOW AND HIDE SPOUSE NAME FIELD
 */
function toggleSpouseName(){
    // SHOW THE SPOUSE NAME INPUT FIELD IF THE SELECTED VALUE IS "married" 
    // OTHERWISE DISPLAY IT NONE
    let spouseNameDiv = document.getElementById("spouse_name");
    let civilStatusSelect = document.getElementById("civil_status");

    if(civilStatusSelect.value === "married"){
        spouseNameDiv.style.display = "flex";
    }
    
    civilStatusSelect.addEventListener("change", (event)=>{
        if(event.target.value === "married"){
            spouseNameDiv.style.display = "flex";
        }else{
            spouseNameDiv.style.display = "none";
            document.getElementById("spouse_fname").value = "";
            document.getElementById("spouse_mname").value = "";
            document.getElementById("spouse_lname").value = "";
        }
    });
}
toggleSpouseName();

/**
 * CALCULATE AGE BASED ON BIRTH DATE
 */
function ageCalculator(){
    let inputBirthDate = document.getElementById("birth_date");
    let ageInput = document.getElementById("age_input");

    inputBirthDate.addEventListener("change", (event)=>{
        // SUBTRACT THE CURRENT YEAR BY THE BIRTH YEAR TO GET THE AGE
        // SUBTRACT THE CURRENT MONTH BY THE BIRTH MONTH
        let dateToday = new Date();
        let birthDate = new Date(event.target.value);
        let age = dateToday.getFullYear() - birthDate.getFullYear();
        let month = dateToday.getMonth() - birthDate.getMonth();
        
        // IF MONTH ANSWER IS LESSTHAN ZERO DECREMENT THE AGE
        // IF THE MONTH IS EQUAL TO ZERO AND CURRENT DATE IS LESSTHAN TO BIRTH DATE THEN DECREMENT THE AGE
        if (month < 0 || (month === 0 && dateToday.getDate() < birthDate.getDate())){
            age--;
        }
        ageInput.value = age;
    });
}
ageCalculator();
