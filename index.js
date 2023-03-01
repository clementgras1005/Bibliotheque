localStorage.setItem("connected", false)

// Vérifier si la clé "connected" existe et a la valeur "ok"
if (localStorage.getItem("connected") === "false") {
  window.location = "connexion.html"
}