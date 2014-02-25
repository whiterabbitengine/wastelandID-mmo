<!DOCTYPE html>
<html>
<head>
<!-- STYLES START -->
<link href="css/main-style-1.css" rel="stylesheet" type="text/localization/english_US/css" media="screen" />
<link href='http://fonts.googleapis.com/css?family=Jura' rel='stylesheet' type='text/css'>
<!-- STYLES END ---->
<script src="JSAssets/jquery.min.js"></script>
<script src="JSAssets/fancywebsocket.js"></script>
<script src="JSAssets/wastelandID.js/Canvas2D.js"></script>
<script src="JSAssets/DHTML/mainDHTML.js"></script>
</head>
<body>

<canvas id="myCanvas" width="200" height="100" style="background-color: #000; position: fixed; top: 0; bottom: 0; left: 0; right: 0; margin: auto;">
Your browser does not support the HTML5 canvas tag.
</canvas>

<script>

var c=document.getElementById("myCanvas");
var ctx=c.getContext("2d");

window.addEventListener('resize', resizeCanvas, false);
resizeCanvas();

</script>
<div class="dhtmlContainer" id="dhtmlContainer">
<div id="DHTMLtoolbar" class="DHTMLtoolbar" style="z-index: 3; background-color: #313f49; position: fixed; padding:4px; width:100%; bottom: 0px; visibility: visible;">
<input type="image" src="media/textures/5050t.png" style="background-image: url('media/textures/icons.png'); background-position: -2.25px 291.75px; width: 48px; height: 48px; vertical-align: middle;" id="web" class="web" />
<input type="image" src="media/textures/5050t.png" style="background-image: url('media/textures/icons.png'); background-position: 196.0px 147.75px; width: 48px; height: 48px; vertical-align: middle;" id="web" class="web" onClick="toggleChat('chat');"/>
<input type="image" src="media/textures/5050t.png" style="background-image: url('media/textures/icons.png'); background-position: 196.0px 387.75px; width: 48px; height: 48px; vertical-align: middle;" id="web" class="web" onClick="showObject('controlpanel');"/>
<input type="image" src="media/textures/5050t.png" style="background-image: url('media/textures/icons.png'); background-position: 69.5% 90.25%; width: 50px; height: 48px; vertical-align: middle;" id="web" class="web" />
    <input id="addressBar" type="text" class="addressBar" length="300" maxlength="600" style="margin-left: 30px; width: 500px; height: 20px; vertical-align: middle;"/>
</div>
</div>
</body>
</html>

