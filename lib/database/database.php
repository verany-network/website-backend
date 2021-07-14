<?php

class database {
    private $user;
    private $password;
    private $host;
    private $config;


    public $collectionsWeb;
    public $collectionsNetwork;
    public $collectionsVerification;


    public function __construct()
    {
        $this->config = parse_ini_file(ROOT_PATH . "/config/config.ini", true);
        $this->user = $this->config['database']['user'];
        $this->password = $this->config['database']['password'];
        $this->host = $this->config['database']['host'];
        $this->connect();

    }

    private function connect() {
        $databaseWebseite = $this->config['database']['db-1'];
        $dbWebseite = (new MongoDB\Client('mongodb://' . $this->user . ':' . $this->password . '@' . $this->host . ':27017'))->$databaseWebseite;
        $databaseNetwork = $this->config['database']['db-2'];
        $dbNetwork = (new MongoDB\Client('mongodb://' . $this->user . ':' . $this->password . '@' . $this->host . ':27017'))->$databaseNetwork;

        $databaseVerification = $this->config['database']['db-3'];
        $dbVerification = (new MongoDB\Client('mongodb://' . $this->user . ':' . $this->password . '@' . $this->host . ':27017'))->$databaseVerification;


        $this->collectionsWeb['all_user'] = $dbWebseite->selectCollection('all_user');
        $this->collectionsWeb['main_log'] = $dbWebseite->selectCollection('main_log');
        $this->collectionsWeb['all_apply'] = $dbWebseite->selectCollection('all_apply');

        $this->collectionsNetwork['players'] = $dbNetwork->selectCollection('players');

        $this->collectionsVerification['players'] = $dbVerification->selectCollection('players');



    }


    //Querry
    public function connectionLog($ip, $uri, $uuid = "---") {
        $this->collectionsWeb['main_log']->insertOne(array(
            "ip" => $ip,
            "uuid" => $uuid,
            "uri" => $uri,
            "time" => time()
        ));
    }

    public function userexistcheck($uuid) {
        $user = $this->collectionsWeb['all_user']->findOne(array('uuid' => $uuid));
        if(isset($user)) {return true;} else {return false;}
    }

    public function verifikationKeyexistandisvalid($key) {
        $user = $this->collectionsVerification['players']->findOne(['verificationDataMap.WEB.key' => $key]);
        if (isset($user)) {
            if($user['verificationDataMap']['WEB']['verified'] == false) {
                if ($user['verificationDataMap']['WEB']['timestamp']+600000 - round(microtime(true) * 1000) >= 0) {
                    return $user['uuid'];
                } else { return false; }
            } else { return false; }
        }else { return false; }
    }

    public function incnewuser($uuid, $passhash, $email) {
        $this->collectionsWeb['all_user']->insertOne(array(
            "uuid" => $uuid,
            "password" => $passhash,
            "email" => $email,
            "tell" => null,
            "twitter" => null,
            "tcp" => false
        ));
    }
    public function setwebverifyisused($uuid) {
        $this->collectionsVerification['players']->updateOne(
            [ 'uuid' => $uuid ],
            [ '$set' => [ 'verificationDataMap.WEB.verified' => true ]]
        );
    }
    public function loginFilter($name) {
        $user = $this->collectionsNetwork['players']->findOne(array('name' => $name));
        if(isset($user['uuid'])) {
            $webuser = $this->collectionsWeb['all_user']->findOne(array("uuid" => $user['uuid']));
            if(isset($webuser['password'])){
                    return $webuser;
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

    //Apply ------------------------------------------------------------------------------------------------------------
    public function open_apply($uuid) {
        $apply = $this->collectionsWeb['all_apply']->find(array('uuid' => $uuid));
        foreach ($apply as $row) {
            if($row['status'] == true) {
                return true;
            }
        }
        return false;
    }

    //END-Apply --------------------------------------------------------------------------------------------------------




}