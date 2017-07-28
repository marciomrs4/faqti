<?php

namespace AppBundle\EventListener;

/**
 * Created by PhpStorm.
 * User: marcio
 * Date: 26/07/17
 * Time: 17:14
 */

use AppBundle\Model\MyMenu;
use Avanzu\AdminThemeBundle\Event\SidebarMenuEvent;
use Symfony\Component\HttpFoundation\Request;

class MyMenuEventListenter
{

    public function onSetupMenu(SidebarMenuEvent $event) {

        $request = $event->getRequest();

        foreach ($this->getMenu($request) as $item) {
            $event->addItem($item);
        }

    }

    protected function getMenu(Request $request) {
        // Build your menu here by constructing a MenuItemModel array
        $menuItems = array(
            $blog = new MyMenu('ItemId', 'ItemDisplayName', 'view', array(/* options */), 'iconclasses fa fa-plane')
        );

        // Add some children

        // A child with an icon
        $blog->addChild(new MyMenu('ChildOneItemId', 'ChildOneDisplayName', 'child_1_route', array(), 'fa fa-rss-square'));

        // A child with default circle icon
        $blog->addChild(new MyMenu('ChildTwoItemId', 'ChildTwoDisplayName', 'child_2_route'));
        return $this->activateByRoute($request->get('_route'), $menuItems);
    }

    protected function activateByRoute($route, $items) {

        foreach($items as $item) {
            if($item->hasChildren()) {
                $this->activateByRoute($route, $item->getChildren());
            }
            else {
                if($item->getRoute() == $route) {
                    $item->setIsActive(true);
                }
            }
        }

        return $items;
    }


}