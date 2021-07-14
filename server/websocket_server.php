<?php
set_time_limit(0);

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;


define('ROOT_PATH', realpath(dirname(__FILE__) . '/../'));

require_once ROOT_PATH."/vendor/autoload.php";
require_once ROOT_PATH."/lib/database/database.php";


class Manager implements MessageComponentInterface {
	protected $clients;
	protected $users;
	protected $db;

	public function __construct() {
		$this->clients = new \SplObjectStorage;
		$this->db = new database();
	}

	public function onOpen(ConnectionInterface $conn) {
	    $this->clients->attach($conn);
	}

	public function onClose(ConnectionInterface $conn) {
		$this->clients->detach($conn);
	}

	public function onMessage(ConnectionInterface $from,  $msg) {

	}

	public function onError(ConnectionInterface $conn, \Exception $e) {
		$conn->close();
	}
}
$server = IoServer::factory(
	new HttpServer(new WsServer(new Manager())),
	8080
);
echo "
INFO Text                                                   
\n";
echo "[WEBSOCKET][INFO]: \t\tStart on port: 8080!\n";
$server->run();
sleep(50000);


?>