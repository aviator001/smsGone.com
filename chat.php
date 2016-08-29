<?
$db = new mysqli("199.91.65.85", "gautamadmin", "Shadow2015!","gaysugardaddyforme");
$sql="select locked_by from locked where id=1";
if($result = $db->query($sql)){
	while($row = $result->fetch_assoc()){
		$port=$row[locked_by];
	}
}
?>	
<html><head><title>WebSocket</title>
<style type="text/css">
html,body {
	font:normal 0.9em arial,helvetica;
}
#log {
	width:600px; 
	height:300px; 
	border:1px solid #7F9DB9; 
	overflow:auto;
}
#msg {
	width:400px;
}
</style>
<script>
var socket;

function init(mid) {
	if (!mid) mid = 1
	var host = "ws://199.91.65.85:7777"  // SET THIS TO YOUR SERVER
	try {
		socket = new WebSocket(host);
		log('WebSocket - status '+socket.readyState);
		socket.onopen    = function(msg) { 
							   log("Welcome - status "+this.readyState); 
							   console.log(socket)
						   };
		socket.onmessage = function(msg) { 
							   log("Received: "+msg.data); 
						   };
		socket.onclose   = function(msg) { 
							   log("Disconnected - status "+this.readyState); 
						   };
		socket.onerror = function(msg) { 
							   alert("Disconnected - status "+msg); 
						   };
	}
	catch(ex){ 
		log('G'+ex); 
	}
}

function send(){
	var txt,msg;
	txt = $("msg");
	msg = txt.value;
	if(!msg) { 
		alert("Message can not be empty"); 
		return; 
	}
	txt.value="";
	txt.focus();
	try { 
		socket.send(msg); 
		log('Sent: '+msg); 
	} catch(ex) { 
		log(ex); 
	}
}
function quit(){
	if (socket != null) {
		log("Goodbye!");
		socket.close();
		socket=null;
	}
}

function reconnect() {
	quit();
	init();
}

// Utilities
function $(id){ return document.getElementById(id); }
function log(msg){ $("log").innerHTML+="<br>"+msg; }
function onkey(event){ if(event.keyCode==13){ send(); } }

function load() {
	
		for (i=0;i<document.getElementById(client_count)*1; i++) {
			
			
		}

}

</script>

</head>
<body onload="init()">
<h3>WebSocket v2.00</h3>
<div id="log"></div>
<input id="msg" type="textbox" onkeypress="onkey(event)"/>
<input id="client_count" type="textbox""/>
<button onclick="send()">Send</button>
<button onclick="quit()">Quit</button>
<button onclick="reconnect()">Reconnect</button>
<button onclick="load()">Simulate Load</button>

</body>
</html>