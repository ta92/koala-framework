<?php
class Kwc_Trl_ImageEnlarge_ImageEnlarge_Component extends Kwc_Basic_ImageEnlarge_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['generators']['child']['component']['linkTag'] =
            'Kwc_Trl_ImageEnlarge_ImageEnlarge_EnlargeTag_Component';
        $ret['ownModel'] = 'Kwc_Trl_ImageEnlarge_ImageEnlarge_TestModel';

        $ret['dimensions'] = array(
            'default'=>array(
                'text' => trlKwf('default'),
                'width' => 120,
                'height' => 120,
                'scale' => Kwf_Media_Image::SCALE_BESTFIT
            )
        );
        return $ret;
    }
}