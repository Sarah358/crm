// everything to load before we use it
document.body.onload = () =>{
    // console.log('Loaded!');

    // add new user betton
    let showFormBtn = document.getElementById("show_new_user_form");
    let newUserForm = document.getElementById("new-user-form");
    // when the page loads we want it to hide the form
    newUserForm.style.display =  "none";

    // create eventlistener on the showformbtn
    showFormBtn.onclick = () =>{
      console.log('clicked!');
      if (newUserForm.style.display == "none") {

          newUserForm.style.display =  "block";

     }else{
         
    newUserForm.style.display =  "none";

           }

    }



}