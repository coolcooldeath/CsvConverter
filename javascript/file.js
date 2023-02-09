const form = document.querySelector(".upload form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-text");
succesText = form.querySelector(".success-text");



form.onsubmit = (e)=>{
    e.preventDefault();
}

continueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/file.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              /*if(data === "success"){
                  errorText.style.display = "none";
                  errorText.textContent = "";
                  succesText.style.display = "block";
                  succesText.textContent = data;
              }else{*/
                errorText.style.display = "block";
                errorText.textContent = data;

          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);

}