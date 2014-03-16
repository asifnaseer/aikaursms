<?php

class Menu
{
       /**
        * The database table used by the model.
        *
        * @var string
        */
	protected $table = 'gen_menu_item';
        
        
        
       /**
        * It fetch the menu items from DB .
        * 
        * @access public
        * @param int $group     group of the current logged in user.
        * @param int $position  position for which menu is need to fetch.
        * @return array Menu item formated in specific way.
        * @author Murtaza A <murtaza.a@allshoreresources.com>
        */
        public static function loadMenu( $group, $position )
        {

           try {
               
                $menuItems = DB::table('gen_menu_item')
                                
                                ->select('gen_menu_item.id', 'gen_menu_item.parent_id', 'gen_menu_item.title', 'gen_menu_item.route', 'gen_menu_item.route_name', 'gen_menu_item.icon' )
                        
                                ->join('gen_menu_item_by_group',    'gen_menu_item.id',     '=', 'gen_menu_item_by_group.menu_item_id')
                                ->join('gen_menu_item_by_position', 'gen_menu_item.id',     '=', 'gen_menu_item_by_position.menu_item_id')
                               
                                ->join('groups',                    'groups.id',            '=', 'gen_menu_item_by_group.group_id')
                                ->join('gen_menu_position',         'gen_menu_position.id', '=', 'gen_menu_item_by_position.menu_position_id')
                                
                                ->where('gen_menu_position.id',     '=', $position)
                                ->where('groups.id',                '=', $group)
                                ->where('gen_menu_item.is_deleted', '=', '0')
                                
                                ->orderBy('gen_menu_item.order_by', 'asc')
                                ->orderBy('gen_menu_item.parent_id', 'asc')
                                ->orderBy('gen_menu_item.id',        'asc')
                        
                                -> get();
                
                return self :: arrangeMenu($menuItems);
              
            } catch (\Exception $e) {
                echo $e->getMessage();
            }

        }

       
       /**
        * Arrange the menu item into specific foramted array
        * 
        * @access public
        * @param array $array of filtered menu items.
        * @return array array of arranged menu items
        * @author Murtaza A <murtaza.a@allshoreresources.com>
        */
        public static function arrangeMenu($menuItems) 
        {
    
            $arrangedMenu = array();
            
            $currentPath  = Route::getCurrentRoute()->getPath();
            
            foreach ($menuItems as $menu) {

                $id         = $menu -> id;
                $pid        = $menu -> parent_id;
                $title      = $menu -> title;
                $route      = $menu -> route;
                $routeName  = $menu -> route_name;
                $icon       = $menu -> icon;

                $isActive   = ($currentPath == $route) ? True : False;

                if ( $pid == 0 ) {

                    $arrangedMenu['menu'][$id]['title']          = $title;
                    $arrangedMenu['menu'][$id]['route']          = $route;
                    $arrangedMenu['menu'][$id]['route_name']     = $routeName;
                    $arrangedMenu['menu'][$id]['icon']           = $icon;
                    $arrangedMenu['menu'][$id]['isActive']       = $isActive;

                } else {
                    $arrangedMenu['menu'][$pid]['sub_menu'][$id]['title']      = $title;
                    $arrangedMenu['menu'][$pid]['sub_menu'][$id]['route']      = $route;
                    $arrangedMenu['menu'][$pid]['sub_menu'][$id]['route_name'] = $routeName;
                    $arrangedMenu['menu'][$pid]['sub_menu'][$id]['icon']       = $icon;
                    $arrangedMenu['menu'][$pid]['sub_menu'][$id]['isActive']   = $isActive;

                    if( $isActive )
                       $arrangedMenu['menu'][$pid]['isActive']                 = $isActive;

                }
            }
            
            return $arrangedMenu;
         }
       
    
}