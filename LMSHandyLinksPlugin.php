<?php

/**
 * LMSHandyLinksPlugin
 * 
 * @author Łukasz Kopiszka <lukasz@alfa-system.pl>
 */
class LMSHandyLinksPlugin extends LMSPlugin
{
    const PLUGIN_NAME = 'LMS Handy Links plugin';
    const PLUGIN_DESCRIPTION = 'Useful for frequently used website links are always at hand.';
    const PLUGIN_AUTHOR = 'Łukasz Kopiszka &lt;lukasz@alfa-system.pl&gt;';
    const PLUGIN_DIRECTORY_NAME = 'LMSHandyLinksPlugin';

    public function registerHandlers()
    {
        $this->handlers = array(
            'menu_initialized' => array(
                'class' => 'HandyLinksHandler',
                'method' => 'menuHandyLinks'
            ),
            'smarty_initialized' => array(
                'class' => 'HandyLinksHandler',
                'method' => 'smartyHandyLinks'
            ),
            'modules_dir_initialized' => array(
                'class' => 'HandyLinksHandler',
                'method' => 'modulesDirHandyLinks'
            ),
            'welcome_before_module_display' => array(
                'class' => 'HandyLinksHandler',
                'method' => 'welcomeHandyLinks'
            ),
            'access_table_initialized' => array(
                'class' => 'HandyLinksHandler',
                'method' => 'accessTableInit'
            ),
        );
    }
}
