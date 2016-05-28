function timing(){
    var a = new Date("July 28, 2016 18:15:00");
    var b = new Date(); 
    var c = Date.parse(a)- Date.parse(b);
    if(c<=0){ 
    clearInterval(id);  
    }
    var sec1 = parseInt((c/1000)%60);
    var min1= parseInt((c/(1000*60))%60);
    var hr1 = parseInt((c/(1000*3600))%24);
    var day1 = parseInt(c/(1000*3600*24));

    document.getElementById("days").innerHTML=day1;
    document.getElementById("hours").innerHTML=hr1;
    document.getElementById("mins").innerHTML=min1;
    document.getElementById("secs").innerHTML=sec1;
}
timing();
var id= setInterval(timing,1000);
