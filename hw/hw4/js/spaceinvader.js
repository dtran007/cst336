//Variables
var gameScreen;
var output;
var bullets;
var ship;
var enemies = new Array();

var gameTimer;

var leftArrowDown = false;
var rightArrowDown = false;

//Background speed
var bg1, bg2;
const BG_SPEED = 4;

const GS_WIDTH = 800;
const GS_HEIGHT = 600;

//Functions
function init(){
	gameScreen = document.getElementById('gameScreen');
	gameScreen.style.width = GS_WIDTH + 'px';
	gameScreen.style.height = GS_HEIGHT + 'px';
	
	//game screen
	bg1 = document.createElement('IMG');
	bg1.className = 'gameObject';
	bg1.src = 'bg.jpg';
	
	// bg1.style.width = '800px';
	$(bg1).css("width", "800px");
	
	// bg1.style.height = '1422px';
	$(bg1).css("height", "1422px");
	
	// bg1.style.left = '0px';
	$(bg1).css("left", "0px");
	
	// bg1.style.top = '0px';
	$(bg1).css("top", "0px");
	
	//gameScreen.appendChild(bg1);
	$('#gameScreen').append(bg1);
	
	bg2 = document.createElement('IMG');
	bg2.className = 'gameObject';
	bg2.src = 'bg.jpg';
	
	// bg2.style.width = '800px';
	$(bg2).css("width", "800px");
	
	// bg2.style.height = '1422px';
	$(bg2).css("height", "1422px");
	
	// bg2.style.left = '0px';
	$(bg2).css("left", "0px");
	
	// bg2.style.top = '-1422px';
	$(bg2).css("top", "-1422px");
	
	//gameScreen.appendChild(bg2);
	$('#gameScreen').append(bg2);
	
	bullets = document.createElement('DIV');
	bullets.className = 'gameObject';
	
	// bullets.style.width = gameScreen.style.width;
	$(bullets).css("width", $(gameScreen).css("width"));
	
	// bullets.style.height = gameScreen.style.height;
	$(bullets).css("height", $(gameScreen).css("height"));
	
	// bullets.style.left = '0px';
	$(bullets).css("left", "0px");
	
	// bullets.style.top = '0px';
	$(bullets).css("top", "0px");
	
	gameScreen.appendChild(bullets);
	$('#gameScreen').append(bullets);

	output = document.getElementById('output');

	ship = document.createElement('IMG');
	ship.src = 'ship.gif';
	ship.className = 'gameObject';
	
	// ship.style.width = '68px';
	$(ship).css("width", "68px");
	
	// ship.style.height = '68px';
	$(ship).css("height", "68px");
	
	// ship.style.top = '500px';
	$(ship).css("top", "500px");
	
	// ship.style.left = '366px';
	$(ship).css("left", "366px");
		

	gameScreen.appendChild(ship);
	
	//enemy ship
	for(var i=0; i<10; i++) {
		var enemy = new Image();
		enemy.className = 'gameObject';
		enemy.style.width = '64px';
		enemy.style.height = '64px';
		enemy.src = 'enemyShip.gif';
		gameScreen.appendChild(enemy);
		placeEnemyShip(enemy);
		enemies[i] = enemy;
	}
	gameTimer = setInterval(gameloop, 50);
}

function placeEnemyShip(e) {
	e.speed = Math.floor(Math.random()*10) + 6;
	
	var maxX = GS_WIDTH - parseInt(e.style.width);
	var newX = Math.floor(Math.random()*maxX);
	e.style.left = newX + 'px';
	
	var newY = Math.floor(Math.random()*600) - 1000;
	e.style.top = newY + 'px';
}

function gameloop(){
	
	var bgY = parseInt(bg1.style.top) + BG_SPEED;
	if(bgY > GS_HEIGHT) {
		bg1.style.top = -1 * parseInt(bg1.style.height) + 'px';
	}
	else bg1.style.top = bgY + 'px';
	
	bgY = parseInt(bg2.style.top) + BG_SPEED;
	if(bgY > GS_HEIGHT) {
		bg2.style.top = -1 * parseInt(bg2.style.height) + 'px';
	}
	else bg2.style.top = bgY + 'px';
	

	if(leftArrowDown){
		var newX = parseInt(ship.style.left);
		if(newX > 0) ship.style.left = newX - 20 + 'px';
		else ship.style.left = '0px';
	}

	if(rightArrowDown){
		var newX = parseInt(ship.style.left);
		var maxX = GS_WIDTH - parseInt(ship.style.width);
		if(newX <  maxX) ship.style.left = newX + 20 + 'px';
		else ship.style.left = maxX + 'px';
	}
	
	//move bullet
	var b = bullets.children;
	for(var i=0; i<b.length; i++) {
		var newY = parseInt(b[i].style.top) - b[i].speed;
		if( newY < 0 ) bullets.removeChild(b[i]);
		else {
			b[i].style.top = newY + 'px';
			for(var j=0; j<enemies.length; j++) {
				if( hittest(b[i], enemies[j]) ){
					bullets.removeChild(b[i]);
					explode(enemies[j]);
					placeEnemyShip(enemies[j]);
					break;
				}
			}
			
		}
	}
	//output.innerHTML = b.length;
	
	//move ships
	for(var i=0; i<enemies.length; i++) {
		var newY = parseInt(enemies[i].style.top);
		if(newY > GS_HEIGHT) placeEnemyShip(enemies[i]);
		else enemies[i].style.top = newY + enemies[i].speed + 'px';
		
		if( hittest(enemies[i], ship) ){
			explode(ship);
			explode(enemies[i]);
			ship.style.top = '-10000px';
			placeEnemyShip(enemies[i]);
			playAgain();
		}
	}
}

function explode(obj) {
	var explosion = document.createElement('IMG');
	explosion.src = 'explosion.gif?x=' + Date.now();
	explosion.className = 'gameObject';
	
	// explosion.style.width = obj.style.width;
	$(explosion).css("width", $(obj).css("width"));
	
	// explosion.style.height = obj.style.height;
	$(explosion).css("height", $(obj).css("height"));
	
	// explosion.style.left = obj.style.left;
	$(explosion).css("left", $(obj).css("left"));
	
	// explosion.style.top = obj.style.top;
	$(explosion).css("top", $(obj).css("top"));
	
	//gameScreen.appendChild(explosion);
	$('#gameScreen').append(explosion);
	
}

function fire() {
	var bulletWidth = 4;
	var bulletHeight = 10;
	var bullet = document.createElement('DIV');
	bullet.className = 'gameObject';
	bullet.style.backgroundColor = 'yellow';
	bullet.style.width = bulletWidth;
	bullet.style.height = bulletHeight;
	bullet.speed = 20;
	bullet.style.top = parseInt(ship.style.top) - bulletHeight + 'px';
	var shipX = parseInt(ship.style.left) + parseInt(ship.style.width)/2;
	bullet.style.left = (shipX - bulletWidth/2) + 'px';
	bullets.appendChild(bullet);
}

//hittest based on distance btwn the midpoint of two objects
function hittest(a,b) {
	var aW = parseInt(a.style.width);
	var aH = parseInt(a.style.height);
	//get center point of object a
	var aX = parseInt(a.style.left) + aW/2;
	var aY = parseInt(a.style.top) + aH/2;
	//get radius of object a (avg of height and width /2)
	var aR = (aW + aH) /4;
	
	var bW = parseInt(b.style.width);
	var bH = parseInt(b.style.height);
	//get center point of object b
	var bX = parseInt(b.style.left) + bW/2;
	var bY = parseInt(b.style.top) + bH/2;
	//get radius of object b (avg of height and width/2)
	var bR = (bW + bH) / 4;
	
	var minDistance = aR + bR;
	
	var cXs = (aX - bX) * (aX - bX); //change in X squared
	var cYs = (aY - bY) * (aY - bY); //change in Y squared
	var distance = Math.sqrt(cXs + cYs);
	
	if (distance < minDistance) return true;
	else return false;
	
}

//JQuery
function playAgain() {
	$("#playAgain").append("<h2>DEATH!</h2><br><button class='center-block btn btn-warning' type='button' onclick='window.location.reload();'>PLAY AGAIN</button>")
}

//Event Listeners
document.addEventListener('keypress', function(event) {
	if(event.charCode==32) fire();
});

document.addEventListener('keydown', function(event){
	if(event.keyCode==37) leftArrowDown = true;
	if(event.keyCode==39) rightArrowDown = true;
});

document.addEventListener('keyup', function(event){
	if(event.keyCode==37) leftArrowDown = false;
	if(event.keyCode==39) rightArrowDown = false;
});

