btnValid = document.querySelector(".btn.primary");

function requestHTTP(){

    identifiant = document.querySelector(".inputId").value;
    password = document.querySelector(".inputPass").value;
    confirmPassword = document.querySelector(".inputConfirmPass").value;

    if(identifiant.length === 0 || password.length === 0 || confirmPassword.length === 0){
        console.log("Tous les champs demandé ne sont pas remplie")
        return false;
    }

    const formData = new FormData();
    
    formData.append('id', identifiant);
    formData.append('password', password);
    formData.append('confirmPassword', confirmPassword);

    fetch('inscription.php', {
        method: 'POST',
        headers: {"content-type": "application/x-www-form-urlencoded"
    },
    body: new URLSearchParams(formData),
    })
    .then(response => response.text())
    .then(data => {
        if (data == 1){
            window.location.href = "connexion.html";
        }else{
            console.log(data);
        }
    })
    .catch(error => {
        console.error(error);
    });
}


btnValid.addEventListener('click', requestHTTP);
