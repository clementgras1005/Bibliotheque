
fetch('session.php', {
    method: 'POST',
    headers: {"content-type": "application/x-www-form-urlencoded"
},
body: "id=" + encodeURIComponent("connected")
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
