<?php
/**
 * @package Vpc
 * @subpackage Basic
 */
class Vpc_Basic_ParentContent_Component extends Vpc_Abstract
{
    public function getTemplateVars()
    {
        $ret = parent::getTemplateVars();
        $ret['parentComponent'] = $this->_getParentContentData();
        return $ret;
    }

    private function _getParentContentData()
    {
        $data = $this->getData();
        $ids = array();
        while ($data && !$data->inherits) {
            $ids[] = strrchr($data->componentId, '-');
            $data = $data->parent;
        }
        while ($data) {
            if ($data->inherits) {
                $d = $data;
                foreach (array_reverse($ids) as $id) {
                    $d = $d->getChildComponent($id);
                }
                if (!$d) break;
                if ($d->componentClass != $this->getData()->componentClass) {
                    return $d;
                }
            }
            $data = $data->parent;
        }
        return null;
    }

    public function hasContent()
    {
        //TODO, ist mit cache loeschen womoeglich ein problem
        return true;
    }

    public static function getStaticCacheMeta($componentClass)
    {
        $ret = parent::getStaticCacheMeta($componentClass);
        foreach (Vps_Component_Data_Root::getInstance()->getPageGenerators() as $generator) {
            $ret[] = new Vpc_Basic_ParentContent_CacheMeta($generator->getModel());
        }
        return $ret;
    }
}