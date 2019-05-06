document.getElementById("btnAdd").addEventListener("click", function(){
    document.getElementById("formAdd").style.display = "block";
});

document.getElementById("btnAdd").addEventListener("click", function(){
    document.getElementById("btnHide").style.display = "block";
});

document.getElementById("btnHide").addEventListener("click", function(){
    document.getElementById("formAdd").style.display = "none";
    document.getElementById("btnHide").style.display = "none";
});

document.getElementsById("post").addEventListener("click", function(){
    document.getElementById("formAdd").style.display = "none";
});
