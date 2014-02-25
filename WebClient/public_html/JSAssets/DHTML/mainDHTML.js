ns4 = document.layers;
ie4 = document.all;
nn6 = document.getElementById && !document.all;


function onFULLSCREEN() {
document.requestFullScreen();
}


function showObject(x) {

if (ns4) {
document.x.visibility = "show";
document.n2.visibility = "show";
document.x.overflow = "auto";
}
else if (ie4) {
document.all[x].style.visibility = "visible";
document.all['n2'].style.visibility = "visible";
document.all[x].style.overflow = "auto";
}
else if (nn6) {
document.getElementById(x).style.visibility = "visible";
document.getElementById('n2').style.visibility = "visible";
document.getElementById(x).style.overflow = "auto";
}
}

function showInlineObject(x) {

if (ns4) {
document.x.visibility = "show";

document.x.overflow = "auto";
}
else if (ie4) {
document.all[x].style.visibility = "visible";

document.all[x].style.overflow = "auto";
}
else if (nn6) {
document.getElementById(x).style.visibility = "visible";

document.getElementById(x).style.overflow = "auto";
}
}

function hideObject(x) {

if (ns4) {
document.x.visibility = "hide";
document.n2.visibility = "hide";
document.x.overflow = "hidden";
}
else if (ie4) {
document.all[x].style.visibility = "hidden";
document.all['n2'].style.visibility = "hidden";
document.all[x].style.overflow = "hidden";
}
else if (nn6) {
document.getElementById(x).style.visibility = "hidden";
document.getElementById('n2').style.visibility = "hidden";
document.getElementById(x).style.overflow = "hidden";
}
}

function hideInlineObject(x) {

if (ns4) {
document.x.visibility = "hide";

document.x.overflow = "hidden";
}
else if (ie4) {
document.all[x].style.visibility = "hidden";

document.all[x].style.overflow = "hidden";
}
else if (nn6) {
document.getElementById(x).style.visibility = "hidden";

document.getElementById(x).style.overflow = "hidden";
}
}

function showSignInObject() {
if (ns4) {
document.n4.visibility = "show";
document.n3.visibility = "show";
document.n2.visibility = "show";
document.n4.overflow = "auto";
}
else if (ie4) {
    document.all['n4'].style.visibility = "visible";
document.all['n3'].style.visibility = "visible";
document.all['n2'].style.visibility = "visible";
document.all['n4'].style.overflow = "auto";
}
else if (nn6) {
document.getElementById('n4').style.visibility = "visible";
document.getElementById('n3').style.visibility = "visible";
document.getElementById('n2').style.visibility = "visible";
document.getElementById('n4').style.overflow = "auto";
}    
}

function toggleChat(x) {
if (ns4) {
if(document.x.visibility == "show") {
hideObject(x);
hideObject('log');
hideObject('message');

}
else {
showObject(x);
showObject('log');
showObject('message');
document.n2.visibility = "hide";
}
}
else if (ie4) {
if(document.all[x].style.visibility == "visible") {
hideObject(x);
hideObject('log');
hideObject('message');

}
else {
showObject(x);
showObject('log');
showObject('message');
document.all['n2'].style.visibility = "hidden";
}
}
else if (nn6) {
if(document.getElementById(x).style.visibility == "visible") {
hideObject(x);
hideObject('log');
hideObject('message');
}
else {
showObject(x);
showObject('log');
showObject('message');
document.getElementById('n2').style.visibility = "hidden";
}

}
}
