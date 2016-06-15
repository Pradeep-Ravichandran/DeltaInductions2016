var x1 = 30;
var y1 = 222;
var x = 1000;
var xx = x + 650;
var y = 225;
var speed = 2;
var score = 0;
var stop = 1;
var breaks = 0;
var topPoint = 0;
var jump = new sound("Jump.wav");
var bgm = new sound("game.mp3");
var gameover = new sound("gameover.mp3");

window.addEventListener("keydown", move, false);
var canvas = document.getElementById("game_area");
var image1 = canvas.getContext("2d");
var image2 = canvas.getContext("2d");
var image3 = canvas.getContext("2d");

var obstacle = new Image();
obstacle.src = "pball.jpg";
image1.drawImage(obstacle, x, y, 55, 55);
image2.drawImage(obstacle, xx, y, 55, 55);

var gameObj = new Image();
gameObj.src = "pika1.jpg";
image3.drawImage(gameObj, x1, y1, 70, 70);

function sound(src) {
            this.sound = document.createElement("audio");
            this.sound.src = src;
            this.sound.setAttribute("preload", "auto");
            this.sound.setAttribute("controls", "none");
            this.sound.style.display = "none";
            document.body.appendChild(this.sound);
            this.play = function(){
            this.sound.play();
            }
            this.stop = function(){
            this.sound.pause();
            }    
            }

function animate() {
    if (stop == 0) {
        reqAnimFrame = window.mozRequestAnimationFrame || //since different browsers have different names for this function
            window.webkitRequestAnimationFrame ||
            window.msRequestAnimationFrame ||
            window.oRequestAnimationFrame;

        reqAnimFrame(animate);
        draw();
    }
}

function draw() {
    image1.clearRect(x, y, 55, 55);
    image2.clearRect(xx, y, 55, 55);
    image3.clearRect(x1, y1, 70, 70);

    x -= speed;
    xx -= speed;
    if (x == 0) {
        x = 1300;
        score++;
        document.getElementById("score").innerHTML = "SCORE : "+score;
    }

    if (xx == 0) {
        xx = 1300;
        score++;
        document.getElementById("score").innerHTML = "SCORE : "+score;
    }

    if (breaks == 1) { //this if part is executed if spacebar is pressed
        if ((y1 >= 60) && (topPoint == 0)) {
            y1 = y1 - 3;
        } else {
            y1 = y1 + 3;
            topPoint++;
        }

        if (y1 == 222) {
            breaks = 0;
            topPoint = 0;
        }
    }
    image1.drawImage(obstacle, x, y, 55, 55);
    image2.drawImage(obstacle, xx, y, 55, 55);
    image3.drawImage(gameObj, x1, y1, 70, 70);

    if ((((x1 + 70) >= x) || (x1 >= x)) && (y <= y1 + 70)) {
        bgm.stop();
        gameover.play();
        window.alert("GAME OVER !");
        stop++;
        
    }

    if ((((x1 + 70) >= xx) || (x1 >= xx)) && (y <= y1 + 70)) {
        bgm.stop();
        gameover.play();
        window.alert("GAME OVER !");
        stop++;
        
    }
}

function move(keypress) {
    if (keypress.keyCode == 32) { // to ensure if spacebar(event keycode=32) is entered
        breaks = 1;
        jump.play();
        
    }
}

function pause(){
    stop++;
    bgm.stop();
}

function start(){
    stop=0;
    bgm.play();
    animate();
}
