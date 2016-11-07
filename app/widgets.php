<?php
use App\Helpers\User;
use Session as Session;
use Config as Config;
use Request as Request;
use App\Client\RestClient;

Widget::register('menu', function () {
    $menus = \App\Helpers\Menu::getMenu();
    return view('widgets.menu', ['menus' => $menus]);

    // Process menu permission and active
    foreach ($menus as $key => &$menu) {
        if (empty($menu['children'])) {
            // Check permission
            if (!Account::check($menu['permissions'])) {
                unset($menus[$key]);
            }
        } else {
            // Check children
            foreach ($menu['children'] as $key1 => &$menu1) {
                if (empty($menu1['children'])) {
                    // Check Level 1
                    if (!Account::check($menu1['permissions'])) {
                        unset($menu['children'][$key1]);
                    }
                } else {
                    // Check children Level 2
                    foreach ($menu1['children'] as $key2 => $menu2) {
                        if (!Account::check($menu2['permissions'])) {
                            unset($menu1['children'][$key2]);
                        }
                    }
                    if (empty($menu1['children'])) {
                        unset($menu['children'][$key1]);
                    }
                }
            }
            if (empty($menu['children'])) {
                unset($menus[$key]);
            }
        }
    }

    $uri = '/' . Request::segment(1, 'dashboard');
    foreach ($menus as &$menu) {
        if (!empty($menu['children'])) {
            foreach ($menu['children'] as &$menu1) {
                if (!empty($menu1['children'])) {
                    foreach ($menu1['children'] as &$menu2) {
                        if (strpos($menu2['url'], $uri . '/') === 0 || $menu2['url'] == $uri) {
                            $menu['active'] = 1;
                            $menu1['active'] = 1;
                            $menu2['active'] = 1;
                        }
                    }
                } elseif (strpos($menu1['url'], $uri . '/') === 0 || $menu1['url'] == $uri) {
                    $menu['active'] = 1;
                    $menu1['active'] = 1;
                }
            }
        } elseif (strpos($menu['url'], $uri . '/') === 0 || $menu['url'] == $uri) {
            $menu['active'] = 1;
        }
    }
    // End process menu permission and active
    return view('widgets.menu', ['menus' => $menus]);
});




