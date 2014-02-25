<?php
// prevent the server from timing out
set_time_limit(0);
include('config/config.php');
include('lib/mainLIB.php');
// include the web sockets server script (the server is started at the far bottom of this file)
require 'lib/class.PHPWebSocket.php';

// when a client connects
function wsOnOpen($clientID)
{
    global $Server;
    $ip = long2ip( $Server->wsClients[$clientID][6] );

    $Server->log( "$ip ($clientID) has connected." );

    
}

// when a client closes or lost connection
function wsOnClose($clientID, $status) {
    global $Server;
    $ip = long2ip( $Server->wsClients[$clientID][6] );

    $Server->log( "$ip ($clientID) has disconnected." );

    
}


// start the server
$Server = new PHPWebSocket();
$Server->bind('message', 'wsOnMessage');
$Server->bind('open', 'wsOnOpen');
$Server->bind('close', 'wsOnClose');
// for other computers to connect, you will probably need to change this to your LAN IP or external IP,
// alternatively use: gethostbyaddr(gethostbyname($_SERVER['SERVER_NAME']))
$Server->wsStartServer(SERVERip, isoComPortMap);
