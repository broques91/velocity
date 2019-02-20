$("#formLogin").submit(function(event) {
    event.preventDefault();
    console.log("on submit");
})
// on submit form login
    //afficher username et password (serialize)
    //Ajax request (checkUser.php)