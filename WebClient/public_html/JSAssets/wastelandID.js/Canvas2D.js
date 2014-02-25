function resizeViewer() {
        isoViewerWidth = (window.innerWidth)*0.98;
        isoViewerHeight = (window.innerHeight)*0.98;
	document.getElementByID('myCanvas').style.width=isoViewerWidth;
	document.getElementByID('myCanvas').style.height=isoViewerHeight;
    }
