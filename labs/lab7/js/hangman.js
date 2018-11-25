//VARIABLES
var selectedWord = "";
var selectedHint = "";
var board = [];
var remainingGuesses = 6;
var words = [ {word: "snake", hint: "It's a reptile"},
              {word: "monkey", hint: "It's a mammal"},
              {word: "beetle", hint: "It's an insect"}];

// Creating an array of available letters
var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 
                'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 
                'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

            
//LISTENERS
window.onload = startGame();

$(".letter").click(function(){
    checkLetter($(this).attr("id"));
    disableButton($(this));
})

$(".replayBtn").on("click", function() {
    location.reload();
});

$(".hintBtn").on("click", function() {
   $(this).hide();
   $("#hintMsg").append("<h4>Hint: " + selectedHint +"</h4>");
   remainingGuesses = remainingGuesses-1;
   updateMan();
   
   if(remainingGuesses<=0) {
       endGame(lose); 
   }
  
});

//FUNCTIONS
function startGame() {
    pickWord();
    initBoard();
    createLetters();
    updateBoard();
}

function pickWord() {
    var randomInt = Math.floor(Math.random() * words.length);
    selectedWord = words[randomInt].word.toUpperCase();
    selectedHint = words[randomInt].hint;
}

//Creates the letters inside the letters div
function createLetters() {
    for (var letter of alphabet) {
        $("#letters").append("<button class='letter' id='" + letter + "'>" + letter + "</button>");
    }
}

function checkLetter(letter) {
    var positions = new Array();
    
    //Put all the positions the letter exists in the array
    for(var i = 0; i < selectedWord.length; i++) {
        //console.log(selectedWord)
        if(letter == selectedWord[i]) {
            positions.push(i);
        }
    }
    if(positions.length > 0) {
        updateWord(positions, letter);
        
        //Check to see if this is a winning guess
        if(!board.includes('_')) {
            endGame(true);
        }
    } else {
        remainingGuesses -= 1;
        updateMan();
    }
    
    if(remainingGuesses <=0) {
        endGame(false);
    }
}

//Update the current word then class for a board update
function updateWord(positions, letter) {
    for(var pos of positions) {
        board[pos] = letter;
    }
    updateBoard();
}


function updateBoard() {
    $("#word").empty();
    
    for (var i=0; i < board.length; i++) {
        $("#word").append(board[i] + " ");
    }
    
    $("#word").append("<br />");
    //$("#word").append("<span class='hint'>Hint: " + selectedHint + "</span>");
}

function initBoard() {
    for (var letter in selectedWord) {
        board.push("_");
    }
}

//Calculates and updates the image for our stick man
function updateMan() {
    $("#hangImg").attr("src", "img/stick_" + (6 - remainingGuesses) + ".png");
}

//Ends the game by hiding game divs and displaying win or loss divs
function endGame(win) {
    $("#letters").hide();
    $("#hintBnt").hide();
    $("#hintMsg").hide();
    
    if(win) {
        $('#won').show();
    } else {
        $('#lost').show();
    }
}

//Disables the button and changes the style to tell the user its disabled
function disableButton(btn) {
    btn.prop("disabled", true);
    btn.attr("class", "btn btn-danger");
}