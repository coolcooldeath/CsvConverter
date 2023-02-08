
const departmentTable = document.querySelector(".department-table");

document.addEventListener('DOMContentLoaded', function() {
    let xhr = new XMLHttpRequest();
    xhr.responseType = 'json';
    xhr.open("GET", "php/department_table_display.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                data = xhr.response;
                arr = prepareData(JSON.stringify(data));
                departmentTable.innerHTML = "";
                var HTML = "<table border=1 width=100%><tr><th>XML_ID</th><th>XML_PARENT_ID</th><th>DEPARTMENT_NAME</th></tr><tr>";

                for(let i =0;i<arr.length;i++){
                    if(i%3==0)
                    HTML+="<tr>"
                    HTML+="<td>"+arr[i]+"</td>";
                }

                HTML+= "</table>"
                departmentTable.innerHTML += HTML
                
            }
        }
    }

    let formData = new FormData(form);
    xhr.send(formData);
}, false);

function replaceSymbols(str,...symbols){
    let clearStr = str;
    for (let i=0; i<symbols.length; i++)
        clearStr = clearStr.replace(symbols[i], '');
    return clearStr;
}
function prepareData(dataArray){
    let arr = dataArray.split(',');
    for (let i =0;i<arr.length;i++){
        arr[i] =  replaceSymbols(arr[i],"[","[","]","]",/(['"])/g,"\\r");
    }
    return arr;
}


