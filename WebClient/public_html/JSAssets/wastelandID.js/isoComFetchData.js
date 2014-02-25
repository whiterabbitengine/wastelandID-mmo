var Server;
var notVari = "";	

        function send( text ) {
            Server.send( 'message', text );
        }

        $(document).ready(function() {
            log('Connecting...');
            Server = new FancyWebSocket('ws://208.109.101.135:9600');
	    isoMap = "default";
	    isoDrawTerrain(isoMap);
            
            });

            //Let the user know we're connected
            Server.bind('open', function() {
                
            });

            //OH NOES! Disconnection occurred.
            Server.bind('close', function( data ) {
                return notVari;
            });

            //Log any messages sent from server
            Server.bind('message', function( payload ) {
                return payload;
            });

            Server.connect();
        });

