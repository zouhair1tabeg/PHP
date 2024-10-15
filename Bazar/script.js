var Email = document.getElementById("email");

var Password = document.getElementById("password");


Email.addEventListener("blur" , function (){
    if (Email.value ===""){
        document.getElementById("n1").innerHTML = 'Champ obligatoire'
        document.getElementById("n1").style.color = 'red'
        document.getElementById("n1").style.visibility = 'visible'

        Email.style.border = '2px double red'
    }
    else{
        document.getElementById("n1").style.visibility = 'hidden'
        Email.style.border = '2px double black'
    }

});


Password.addEventListener("blur" , function (){
    if (Password.value ===""){
        document.getElementById("n2").innerHTML = 'Champ obligatoire'
        document.getElementById("n2").style.color = 'red'
        document.getElementById("n2").style.visibility = 'visible'

        Password.style.border = '2px double red'
    }
    else{
        document.getElementById("n2").style.visibility = 'hidden'
        Password.style.border = '2px double black'
    }

});


