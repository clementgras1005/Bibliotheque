btnSendConnect = document.querySelector(".btn.primary");

const requestHTTP = () => {
    let id = document.querySelector(".inputId").value;

    fetch('createSession.php', {
        method: 'POST',
        headers: {"content-type": "application/x-www-form-urlencoded"
    },
    body: "id=" + encodeURIComponent(id)
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
    })
    .catch(error => {
        console.error(error);
    });
}

btnSendConnect.addEventListener('click', requestHTTP);