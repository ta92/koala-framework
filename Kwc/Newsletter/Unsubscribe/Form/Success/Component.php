<?php
class Kwc_Newsletter_Unsubscribe_Form_Success_Component extends Kwc_Form_Success_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['placeholder']['success'] = trlKwfStatic('You have been successfully unsubscribed from the newsletter.');
        return $ret;
    }
}
