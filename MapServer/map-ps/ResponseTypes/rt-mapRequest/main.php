<?php
// THIS file works to process a map call and return tile positions in x,y
// coordinate pairing on the WebClient screen.

// request format:
// "/##mapinit::username::passhashIN::screenResX::screenResY
// ouput format:
// "tile-resource-url|poisitonX|positionY|barrierTRUEorFALSE" (uses ;; to deliniate
// between seperate resources.)
// a return of "ERROR;;;ERRORCODENUM" denotes a failed mapINIT where the error
// code number is a numeric amount signifying the type of error that was encountered.

function mapINIT($username,$passhashIN,$screenResX,$screenResY) {
return $mapINITout;
}
