<?php
class Vpc_Basic_TextSessionModel_Link_TestModel extends Vpc_Basic_LinkTag_Model
{
    public function __construct($config = array())
    {
        $config['proxyModel'] = new Vps_Model_Session(array(
            'namespace' => 'TextSessionModel_Link_TestModel',
            'primaryKey' => 'component_id',
        ));
        parent::__construct($config);
    }
}