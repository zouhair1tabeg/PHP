var Nom = document.getElementById("s1");

var Adresse = document.getElementById("s2");

var Telephone = document.getElementById("s3");

var Email = document.getElementById("s4");

var MotdePasse = document.getElementById("s5");


Nom.addEventListener("blur" , function (){
    if (Nom.value ===""){
        document.getElementById("n1").innerHTML = 'nom obligatoire'
        document.getElementById("n1").style.color = 'red'
        document.getElementById("n1").style.visibility = 'visible'

        Nom.style.border = '2px double red'
    }
    else{
        document.getElementById("n1").style.visibility = 'hidden'
        Nom.style.border = '2px double black'
    }

});



Adresse.addEventListener("blur" , function (){
    if (Adresse.value ===""){
        document.getElementById("n2").innerHTML = '  adresse obligatoire'
        document.getElementById("n2").style.color = 'red'
        document.getElementById("n2").style.visibility = 'visible'

        Adresse.style.border = '2px double red'
    }
    else{
        document.getElementById("n2").style.visibility = 'hidden'
        Adresse.style.border = '2px double black'
    }

});

Telephone.addEventListener("blur" , function (){
    if (Telephone.value ===""){
        document.getElementById("n3").innerHTML = ' telephone obligatoire'
        document.getElementById("n3").style.color = 'red'
        document.getElementById("n3").style.visibility = 'visible'

        Telephone.style.border = '2px double red'
    }
    else{
        document.getElementById("n3").style.visibility = 'hidden'
        Telephone.style.border = '2px double black'
    }

});

Email.addEventListener("blur" , function (){
    if (Email.value ===""){
        document.getElementById("n4").innerHTML = ' email obligatoire'
        document.getElementById("n4").style.color = 'red'
        document.getElementById("n4").style.visibility = 'visible'

        Email.style.border = '2px double red'
    }
    else{
        document.getElementById("n4").style.visibility = 'hidden'
        Email.style.border = '2px double black'
    }

});

MotdePasse.addEventListener("blur" , function (){
    if (MotdePasse.value ===""){
        document.getElementById("n5").innerHTML = 'motdePasse obligatoire'
        document.getElementById("n5").style.color = 'red'
        document.getElementById("n5").style.visibility = 'visible'

        MotdePasse.style.border = '2px double red'
    }
    else{
        document.getElementById("n5").style.visibility = 'hidden'
        MotdePasse.style.border = '2px double black'
    }

});
