<?php
class Kwc_Directories_TopChoose_Component extends Kwc_Directories_Top_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['showDirectoryClass'] = 'Kwc_Directories_Item_Directory_Component'; // nur für form
        $ret['ownModel'] = 'Kwc_Directories_TopChoose_Model';
        $ret['default'] = array();
        return $ret;
    }

    protected function _getItemDirectory()
    {
        $row = $this->_getRow();
        if ($row && $row->directory_component_id) {
            return Kwf_Component_Data_Root::getInstance()->getComponentByDbId($row->directory_component_id);
        }
        return null;
    }
}