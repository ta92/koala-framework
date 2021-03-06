<?php
/**
 * @group Component_Output_Cache
 * @group Component_Output_CacheSlow
 * @group slow
 */
class Kwf_Component_Output_CacheSlowTest extends Kwf_Test_TestCase
{
    private $_root;

    private function _setup($rootClass)
    {
        Kwf_Component_Data_Root::setComponentClass($rootClass);
        $this->_root = Kwf_Component_Data_Root::getInstance();

        Kwf_Component_Cache::setInstance(Kwf_Component_Cache::CACHE_BACKEND_FNF);
        Kwf_Cache::factory('Core', 'Memcached', array(
            'lifetime'=>null,
            'automatic_cleaning_factor' => false,
            'automatic_serialization'=>true))->clean();


        Kwf_Registry::get('config')->debug->componentCache->disable = false;
        Kwf_Config::deleteValueCache('debug.componentCache.disable');
    }

    public function testApcCli()
    {
        Kwf_Cache_Simple::add('foo', 'bar', 1);
        $this->assertEquals(Kwf_Cache_Simple::fetch('foo'), 'bar');
        sleep(2);
        $this->assertFalse(Kwf_Cache_Simple::fetch('foo'));
    }

    public function testC4()
    {
        $this->_setup('Kwf_Component_Output_C4_Component');
        $this->_root->render();
        $model = Kwf_Component_Cache::getInstance()->getModel('cache');
        $row = $model->getRows()->current();
        $content = $row->content;
        $this->_root->render();
        $this->assertEquals($content, $row->content);
        sleep(3);
        $this->_root->render();
        $this->assertNotEquals($content, $row->content);
    }
}
