const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");

form.onsubmit = (e)=>{
    e.preventDefault();
}
 
sendBtn.onclick=()=>{
    let xhr = new XMLHttpRequest(); //xml object
    xhr.open("POST","php/insert-chat.php",true);
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
               inputField.value = "";
               scrollBottom();
            }
        }
    }
    let formData = new FormData(form); //creating new formData object
    xhr.send(formData); //sending form data to php
}
chatBox.onmouseenter = () =>{
    chatBox.classList.add("active");
}
chatBox.onmouseleave =()=>{
    chatBox.classList.remove("active");
}
setInterval(()=>{
    // lets start ajax
    let xhr = new XMLHttpRequest(); //xml object
    xhr.open("POST","php/get-chat.php",true);
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                // console.log(data);
                chatBox.innerHTML = data;
                if(!chatBox.classList.contains("active")){

                    scrollBottom();
                }
            }
        }
    }
    let formData = new FormData(form); //creating new formData object
    xhr.send(formData); //sending form data to php
},500);

function scrollBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
}