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
</head>
<body>

<canvas id="myCanvas" width="200" height="100" style="border:1px solid #c3c3c3; position: fixed; top: 0; bottom: 0; left: 0; right: 0; margin: auto;">
Your browser does not support the HTML5 canvas tag.
</canvas>

<script>

var c=document.getElementById("myCanvas");
var ctx=c.getContext("2d");

window.addEventListener('resize', resizeCanvas, false);
resizeCanvas();

</script>

</body>
</html>

