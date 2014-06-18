<?php

defined('_JEXEC') or die;

class PlgButtonYoutube extends JPlugin {

    const IMG_ID = "system-youtube";

    protected $autoloadLanguage = true;

    function PlgButtonYoutube( &$subject, $params ) {
        parent::__construct( $subject, $params );
    }

    public function onDisplay($name, $asset, $author) {
        $doc = JFactory::getDocument();

        $js = "
                function insertYoutube(editor, defaultCode) {
                     var code = prompt('" . JText::_('PLG_YOUTUBE_XTD_PROMPT') . "', defaultCode);
                     var src = 'http://i1.ytimg.com/vi/' + code + '/sddefault.jpg';
                     jInsertEditorText('<img id=\"". self::IMG_ID . "\" src=\"' + src +'\" />', editor);
                }
        ";

        $doc->addScriptDeclaration($js);

        $button = new JObject;
        $button->modal = false;
        $button->class = 'btn';
        $button->onclick = 'insertYoutube(\'' . $name . '\', \'\');return false;';
        $button->text = JText::_('PLG_YOUTUBE_XTD_BUTTON');
        $button->name = 'video';
        $button->link = '#';
        return $button;
    }

}