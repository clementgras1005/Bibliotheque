identifiant = document.querySelector(".inputId");
password = document.querySelector(".inputPass");
confirmPassword = document.querySelector(".inputConfirmPass");

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
    console.log(data);
    if(data == "false"){
        window.location.replace("connexion.html");
    }
})
.catch(error => {
    console.error(error);
});