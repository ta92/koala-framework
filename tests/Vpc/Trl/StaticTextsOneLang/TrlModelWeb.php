<?php
class Vpc_Trl_StaticTextsOneLang_TrlModelWeb extends Vps_Trl_Model_Web
{
    public function __construct(array $config = array())
    {
        $config['proxyModel'] = new Vps_Model_FnF(array(
            'data' => array(
                array('id'=>'1', 'en' => 'Visible', 'de' => 'Sichtbar'),
                array('id'=>'2', 'context' => 'time', 'en' => 'On', 'de' => 'Am'),
                array('id'=>'3', 'en' => 'reply', 'en_plural' => 'replies', 'de' => 'Antwort', 'de_plural' => 'Antworten'),
                array('id'=>'4', 'context' => 'test', 'en' => 'reply', 'en_plural' => 'replies', 'de' => 'Antwort', 'de_plural' => 'Antworten'),
            ),
            'uniqueIdentifier' => 'Vpc_Trl_StaticTexts_TrlModelWeb',
            'columns' => array('id', 'en', 'de', 'en_plural', 'de_plural', 'context')
        ));
        parent::__construct($config);
    }
}