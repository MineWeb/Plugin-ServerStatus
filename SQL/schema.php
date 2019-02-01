<?php

class ServerStatusAppSchema extends CakeSchema
{

    public $file = 'schema.php';

    public function before($event = array())
    {
        return true;
    }

    public function after($event = array())
    {
    }

    public $serverstatus__config = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
        'isMojang' => array('type' => 'integer', 'null' => false, 'default' => '1')
    );

    public $servers = [
        'serverstatus-iconurl' => array('type' => 'string', 'null' => false, 'default' => 'https://pixelads.fr/img/cover/1497104509.png', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
        'serverstatus-motd' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
        'serverstatus-isShowIp' => array('type' => 'integer', 'null' => false, 'default' => '1', 'unsigned' => false),
        'serverstatus-isShowCount' => array('type' => 'integer', 'null' => false, 'default' => '1', 'unsigned' => false),
        'serverstatus-isShowStatus' => array('type' => 'integer', 'null' => false, 'default' => '1', 'unsigned' => false)
    ];
}
