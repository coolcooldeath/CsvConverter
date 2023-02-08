
allFiles = form.querySelector(".all-files");
document.addEventListener('DOMContentLoaded', function() {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "php/refresh.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                data = xhr.response;
                var dataArray = JSON.parse(data);
                allFiles.innerHTML = "";
                for (i =0;i<dataArray.length;i++)
                allFiles.innerHTML += `<li>${dataArray[i]}</li>`;
            }
        }
    }

    let formData = new FormData(form);
    xhr.send(formData);
}, false);




