<!DOCTYPE html>
<html>
<style>
@font-face {font-family: music ;  src: url( ../fonts/print_clearly_tt.ttf );}  
a:link {  text-decoration: none;  color: black;   font-family: music;  font-size:64px;}
a:visited {  text-decoration: none;  color: black;  }
a:hover {  text-decoration: none;  color: black;  }
a:active {  text-decoration: none;  color: black;  }

#playlist  {
  font-family: music;
}

.button {
  font-family: music;
  background-color: #fff;
  border: none;
  color: black;
  padding: 24px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 64px;
  margin: 4px;
  -webkit-transition-duration: 0.4s;
  transition-duration: 0.4s;
  cursor: pointer;
} 

.song {
  font-family: music;
  background-color: #fff;
  border: none;
  color: black;
  padding: 24px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 32px;
  margin: 4px;
  -webkit-transition-duration: 0.4s;
  transition-duration: 0.4s;
  cursor: pointer;
} 
</style> 
<body>
<br><br>
<button onclick="playAudio()" class="button">Play</button>
<button onclick="pauseAudio()" class="button">Pause</button>
<button onclick="prevAudio()" class="button">Prev</button>
<button onclick="nextAudio()" class="button">Next</button>
<button onclick="randomAudio()" class="button">Random</button>
<br><br>
<div id='playlist'></div>
<audio id="myAudio">
<?
$files = glob("*.mp3");
foreach($files as $mp3){ 
echo "<source src='" . $mp3 . "' type='audio/mpeg'>", "\n";
} 
?>
</audio>
<script>
x = document.getElementById("myAudio"); 
x.addEventListener("ended", function() {i++;if(i>x.children.length-1){i=0;};x.src = x.children[i].src;x.play();});
x.play();
i=0;
function playAudio() {x.src = x.children[i].src;x.play(); } 
function pauseAudio() {x.pause(); } 
function nextAudio() {i++;if(i>x.children.length-1){i=0;};x.src = x.children[i].src;x.play(); } 
function prevAudio() {i--;if(i<0){i=0;};x.src = x.children[i].src;x.play(); } 
function randomAudio() {i = Math.floor(Math.random() * x.children.length-1);x.src = x.children[i].src;x.play(); } 
 
songs = [];
[...x.children].forEach(item => songs.push(item.src));
songs.forEach((value, key) => document.getElementById('playlist').innerHTML += "<br>" + "<button class='song' onclick='pl("+key+")'>" + decodeURIComponent(value.slice(35, -4)) + "</button>");

function pl(k) {
i=k;
x.src = x.children[i].src;
x.play();
}
</script>
</body>
</html>
