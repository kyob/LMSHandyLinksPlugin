<?php

function getHandyLinks()
{
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

    //echo '<pre>';    print_r($result);    echo '</pre>';

    return $result;
}


$SMARTY->assign('handy_links', getHandyLinks());
$SMARTY->display('handylinks.html');
