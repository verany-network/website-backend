<?php

class database {
    private $user;
    private $password;
    private $host;
    private $config;


    public $collectionsWeb;
    public $collectionsNetwork;

    public $collectionsRank;




     public function __construct()
    {
        $this->config = parse_ini_file(ROOT_PATH . "/config/config.ini", true);
        $this->user = $this->config['database']['user'];
        $this->password = $this->config['database']['password'];
        $this->host = $this->config['database']['host'];
        $this->connect();

    }

    private function connect() {
        try {

            $databaseWebseite = $this->config['database']['db-1'];
            $dbWebseite = (new MongoDB\Client('mongodb://' . $this->user . ':' . $this->password . '@' . $this->host . ':27017'))->$databaseWebseite;
            $databaseNetwork = $this->config['database']['db-2'];
            $dbNetwork = (new MongoDB\Client('mongodb://' . $this->user . ':' . $this->password . '@' . $this->host . ':27017'))->$databaseNetwork;
            $databaseRank = $this->config['database']['db-3'];
            $dbRank = (new MongoDB\Client('mongodb://' . $this->user . ':' . $this->password . '@' . $this->host . ':27017'))->$databaseRank;

        } catch (MongoConnectionException $e) {
            print $e;
        }


        $this->collectionsWeb['all_user'] = $dbWebseite->selectCollection('all_user');
        $this->collectionsWeb['tcp_log'] = $dbWebseite->selectCollection('tcp_log');
        $this->collectionsWeb['tcp_doc'] = $dbWebseite->selectCollection('tcp_doc');

        $this->collectionsNetwork['players'] = $dbNetwork->selectCollection('players');


        $this->collectionsRank['groups'] = $dbRank->selectCollection('groups');
        $this->collectionsRank['players'] = $dbRank->selectCollection('players');


     }

    //Querry
        public function connectionLog($ip, $uri, $uuid = "---") {
            $this->collectionsWeb['tcp_log']->insertOne(array(
                "ip" => $ip,
                "uuid" => $uuid,
                "uri" => $uri,
                "time" => time()
            ));
        }
        public function loginFilter($name) {
            $user = $this->collectionsNetwork['players']->findOne(array('name' => $name));
            if(isset($user['uuid'])) {
                $webuser = $this->collectionsWeb['all_user']->findOne(array("uuid" => $user['uuid']));
                if(isset($webuser['password'])){
                    if($this->hasPermission($user['uuid'], "web.tcp.login") == true) {
                        return $webuser;
                    }else {
                        return false;
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    public function returnUsername($uuid) {
        $user = $this->collectionsNetwork['players']->findOne(array('uuid' => $uuid));
        if(isset($user)) {
            return$user['name'];
        } else {
            return false;
        }
    }

    public function hasPermission($uuid, $permission) {
         $user = $this->collectionsRank['players']->findOne(array('uuid' => $uuid));
        foreach ($user['permissions'] as $row) {
            if($row == $permission || $row == "web.*") {
                return true;
            }
        }
        $group = $this->collectionsRank['groups']->findOne(array('name' => $user['currentGroup']['group']));
        foreach ($group['permissions'] as $row) {
            if($row == $permission || $row == "web.*") {
                return true;
            }
        }
        return false;
    }
    public function adddocument($filename, $size, $doc_name,$doc_ersteller, $uuid) {
        $this->collectionsWeb['tcp_doc']->insertOne(array(
            "id" => uniqid(),
            "filename" => $filename,
            "size" => $size,
            "name" => $doc_name,
            "ersteller" => $doc_ersteller,
            "time" => time(),
            "uuid" => $uuid
        ));
    }

    public function documentexistcheck($filename, $size, $name) {
        $user = $this->collectionsWeb['all_user']->findOne(array('filename' => $filename, 'size' => $size, 'name' => $name));
        if(isset($user)) {return true;} else {return false;}
    }
    public function getDicumentbyid($id) {
        $file = $this->collectionsWeb['tcp_doc']->findOne(array('id' => $id));
        if(isset($file)) {return $file;} else {return false;}
    }

    public function getalldoc() {

        return $this->collectionsWeb['tcp_doc']->find();
    }

    public function getOnlinePlayers() {

        return $this->collectionsWeb['networkData']->findOne(array('onlinePlayers'));
    }


    //Team -------------------------------------------------------------------------------
    public function getUserbyGroup($groupname) {
         $users = $this->collectionsRank['players']->find(array(
             "currentGroup.group" => $groupname,
         ));
         foreach($users as $row) {
             return $users;
         }
        return false;
     }

     public function getOnlineTimebyName($user) {
         $user = $this->collectionsNetwork['players']->findOne(array(
             "name" => $user,
         ));
         if(isset($user)) {
             foreach ($user as $row) {
                 return $row['onlineTime'];
             }
         } else {
             return;
         }
     }

}

