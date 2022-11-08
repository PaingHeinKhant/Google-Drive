import './bootstrap';

let inputFileClick = document.getElementById('inputFileClick');
let fileInput = document.getElementById('fileInput');
let submitForm = document.getElementById('submitForm');
let formClick = document.getElementById('formClick');

let folder = document.getElementById('folder');
let folderSubmit = document.getElementById('folderSubmit');
let folderInput = document.getElementById('folderInput');




inputFileClick.addEventListener('click',function (){
    // return console.log('hi');
    fileInput.click();
    fileInput.addEventListener('change',function (){
        submitForm.submit();
    })
})

folder.addEventListener('click',function (){
  folderInput.click();
  fileInput.addEventListener('change',(event) => {
      let output = document.getElementById("listing");
      for (const file of event.target.files) {
          let item = document.createElement("li");
          item.textContent = file.webkitRelativePath;
          output.appendChild(item);
      };
  }, false);
    // console.log('hi');
})
//
window.handleClick= function (arg){
    // return console.log('hi')
    return window.location.href = arg;
}

