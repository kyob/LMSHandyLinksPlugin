<?php

class HandyLinksHandler
{
    public function menuHandyLinks(array $hook_data = array())
    {
        $submenus = array(
            array(
                'name' => trans('Handy links'),
                'link' => '?m=handylinks',
                'tip' => trans('Handy links'),
                'prio' => 150,
            ),
        );
        $hook_data['admin']['submenu'] = array_merge($hook_data['admin']['submenu'], $submenus);
        return $hook_data;
    }

    public function smartyHandyLinks(Smarty $hook_data)
    {
        $template_dirs = $hook_data->getTemplateDir();
        $plugin_templates = PLUGINS_DIR . DIRECTORY_SEPARATOR . LMSHandyLinksPlugin::PLUGIN_DIRECTORY_NAME . DIRECTORY_SEPARATOR . 'templates';
        array_unshift($template_dirs, $plugin_templates);
        $hook_data->setTemplateDir($template_dirs);
        return $hook_data;
    }

    public function modulesDirHandyLinks(array $hook_data = array())
    {
        $plugin_modules = PLUGINS_DIR . DIRECTORY_SEPARATOR . LMSHandyLinksPlugin::PLUGIN_DIRECTORY_NAME . DIRECTORY_SEPARATOR . 'modules';
        array_unshift($hook_data, $plugin_modules);
        return $hook_data;
    }

    public function welcomeHandyLinks(array $hook_data = array())
    {
        // uncomment if you have current LMS version
        $SMARTY = LMSSmarty::getInstance();

        $categories = explode(',', ConfigHelper::getConfig('handy-links.categories'));
        foreach ($categories as $category) {
            $category_items = str_getcsv(ConfigHelper::getConfig('handy-links.' . $category), "\n");
            $result[$category]['color'] = substr(dechex(crc32($category)), 0, 6);
            $i = 0;
            foreach ($category_items as $item) {
                $item = explode(',', $item);
                $result[$category][$i]['name'] = $item[0];
                $result[$category][$i]['value'] = $item[1];
                $i++;
            }
        }

        $SMARTY->assign('handy_links', $result);
        return $hook_data;
    }

    public function accessTableInit()
    {
        $access = AccessRights::getInstance();
        $access->insertPermission(new Permission(
            'handylinks_full_access',
            trans('Handy links'),
            '^handylinks$'
        ), AccessRights::FIRST_FORBIDDEN_PERMISSION);
    }
}
