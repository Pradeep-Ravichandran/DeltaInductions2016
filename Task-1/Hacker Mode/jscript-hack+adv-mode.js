var t,dy,hr,mn,sc;
var flag = 0;
var n = localStorage.getItem('on_load_counter');
 
if (n === null) {
    n = 0;
}
 
n++;
 
localStorage.setItem("on_load_counter", n);
if(n>=1)
   t=setInterval(timing,1000);

function input() {

    dy=document.getElementById("day").value;
    hr=document.getElementById("hr").value;
    mn=document.getElementById("min").value;
    sc=document.getElementById("sec").value;

    
    start1();
}

function timing() {
var count = localStorage.getItem('onloadcounter');
    count = ((dy * 86400) + (hr * 3600) + (mn * 60) + (sc * 1));
    if (count >= 0 && flag == 1) {
        var sec1 = Math.floor(count % 60);
        var min1 = Math.floor((count / 60)) % 60;
        var hr1 = Math.floor((count / 3600) % 24);
        var day1 = Math.floor(count / (3600 * 24));

        document.getElementById("days").innerHTML = day1;
        document.getElementById("hours").innerHTML = hr1;
        document.getElementById("mins").innerHTML = min1;
        document.getElementById("secs").innerHTML = sec1;

        count--;
        localStorage.setItem("onloadcounter",c);
    }
}

function start1() {
    if(flag!=1)            //To prevent setting of more intervals for executing timing() when 'start' button is pressed twice
    {
    flag = 1;
    t = setInterval(timing, 1000);
    }
}

function stop1() {
    flag = 0;
    clearInterval(t);
}

function rese() {
    flag = 0;              
    clearInterval(t);
    document.getElementById("days").innerHTML = 00;
    document.getElementById("hours").innerHTML = 00;
    document.getElementById("mins").innerHTML = 00;
    document.getElementById("secs").innerHTML = 00;

    intime();

}