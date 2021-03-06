<?php

defined('_JEXEC') or die;

class plgButtonWidgetkit extends JPlugin
{
    /**
     * Display the button.
     */
    public function onDisplay()
    {
        if (!$app = (@include(JPATH_ADMINISTRATOR . '/components/com_widgetkit/widgetkit-app.php')) or !$app['admin']) {
            return;
        }

        $app->trigger('init.admin', array($app));

        $button = new JObject;
        $button->class   = 'btn btn-widgetkit';
        $button->text    = 'Widgetkit';
        $button->name    = 'plus';
        $button->options = 'widgetkit';

        return $button;
    }
}
