
window.onscroll = function () { mostrarBotao() };

var restart_sumido = false;
var bottom_sumido = false;

function mostrarBotao() {
    if (document.body.scrollTop > 5000 || document.documentElement.scrollTop > 5000) {
        document.getElementById("btn-bottom").style.display = "none";
        document.getElementById("btn-restart").style.bottom = "10px";
        bottom_sumido = false;
    } else if (document.body.scrollTop > 250 || document.documentElement.scrollTop > 250) {
        if (restart_sumido == false) {
            document.getElementById("btn-restart").style.display = "flex";
        };
        if (bottom_sumido == false) {
            document.getElementById("btn-bottom").style.display = "flex";
            document.getElementById("btn-restart").style.bottom = "70px";
        } else {
            document.getElementById("btn-restart").style.bottom = "10px";
        };
    } else {
        document.getElementById("btn-restart").style.display = "none"; 
        if (document.body.scrollTop == 0 || document.documentElement.scrollTop == 0) {
            restart_sumido = false;
        };
    };
};

function sumirRestart() {
    document.getElementById("btn-restart").style.display = "none";
    restart_sumido = true;
};


function sumirBottom() {
    document.getElementById("btn-bottom").style.display = "none";
    bottom_sumido = true;
};

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("a-menu").addEventListener("click", function(event) {
        event.preventDefault();

        document.body.classList.add("no-interaction");

        document.querySelector(this.getAttribute("href")).scrollIntoView({
            behavior: "smooth"
        });

        setTimeout(function() {
            document.body.classList.remove("no-interaction");

        }, 500);
    });

    document.getElementById("a-footer").addEventListener("click", function(event) {
        event.preventDefault();

        document.body.classList.add("no-interaction");

        document.querySelector(this.getAttribute("href")).scrollIntoView({
            behavior: "smooth"
        });

        setTimeout(function() {
            document.body.classList.remove("no-interaction");

        }, 500);
    });
})