function resizeCanvas() {
            c.width = (window.innerWidth)*0.98;
            c.height = (window.innerHeight)*0.98;

            /**
             * Your drawings need to be inside this function otherwise they will be reset when 
             * you resize the browser window and the canvas goes will be cleared.
             */
       	ctx.fillStyle="#FF0000";
	ctx.fillRect(0,0,150,75);
    }
