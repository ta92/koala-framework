<?php
class Kwf_Component_Cache_Menu_Root2_Menu_Component extends Kwc_Menu_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['level'] = 'root';
        $ret['generators']['subMenu']['component'] = 'Kwf_Component_Cache_Menu_Root2_Menu_Sub_Component';
        return $ret;
    }
}
