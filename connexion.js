btnSendConnect = document.querySelector(".btn.primary");

const requestHTTP = () => {
    let id = document.querySelector(".inputId").value;
    let password = document.querySelector(".passwordInput").value;

    const formData = new FormData();
    
    formData.append('id', id);
    formData.append('password', password);

    fetch('connexion.php', {
        method: 'POST',
        headers: {"content-type": "application/x-www-form-urlencoded"
    },
    body: new URLSearchParams(formData)
    })
    .then(response => response.text())
    .then(data => {
        if (data == 1){
            window.location.href = "index.html";
        }else{
            console.log(data);
        }
    })
    .catch(error => {
        console.error(error);
    });
}

btnSendConnect.addEventListener('click', requestHTTP);