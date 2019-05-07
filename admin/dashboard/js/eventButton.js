document.getElementById("btnAdd").addEventListener("click", function(){         // Ajoute un évenement sur l'id "btnAdd"
    document.getElementById("formAdd").style.display = "block";                 // Affiche l'id "formAdd"
});

document.getElementById("btnAdd").addEventListener("click", function(){         // Ajoute un évenement sur l'id "btnAdd"
    document.getElementById("btnHide").style.display = "block";                 // Affiche l'id "btnHide"
});

document.getElementById("btnHide").addEventListener("click", function(){        // Ajoute un évenement sur l'id "btnHide"
    document.getElementById("formAdd").style.display = "none";                  // Cache l'id "formAdd"
    document.getElementById("btnHide").style.display = "none";                  // Cache l'id "btnHide"
});

document.getElementsById("post").addEventListener("click", function(){          // Ajoute un évenement sur l'id "post"
    document.getElementById("formAdd").style.display = "none";                  // Cache l'id "formAdd"
});
