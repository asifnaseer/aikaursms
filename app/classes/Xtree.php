<?php

class Xtree 
{
   
    /**
    * getResources It prepare array for data fo all node .
    * 
    * @access public
    * @param array $array of allowed node to the specific user, so we can make check flag true or false in data array.
    * @return array node array to build acl resources tree.
    * @author Murtaza A <murtaza.a@allshoreresources.com>
    */
    
    public static function createXTree($array, $currentParent, $currLevel = 0, $prevLevel = -1) {
       
        if ( is_array($array) && count($array) > 0 ) {

                 foreach ($array as $categoryId => $category) {

                        if ($currentParent == $category['direct_parent_id']) {						

                                if($category['node_type'] == 1){
                                    $cbName = 'acl_module[]';
                                    $cbvalue = $category['name'].'##'.$categoryId;
                                }elseif($category['node_type'] == 2){
                                    $cbName = $category['parents'][0]['name'].'_controller[]';
                                    $cbvalue = $category['name'].'##'.$categoryId;
                                }elseif($category['node_type'] == 3){
                                    $cbName  = $category['parents'][1]['name'].'_'.$category['parents'][0]['name'].'_method[]';
                                    $cbvalue = $category['name'].'##'.$categoryId;
                                }

                                if ($currLevel > $prevLevel) echo " <ul> \n"; 

                                if ($currLevel == $prevLevel) echo " </li> \n";

                                echo '<li id="'.$categoryId.'" rel="'.$currLevel.'">
                                            <input type="checkbox" class="events-child-category-all" 
                                                   id="id-'.$categoryId.'"
                                                   name="'.$cbName.'"
                                                   value="'.$cbvalue.'"
                                                   '.$category['checked'].'
                                                   style="margin-left:0px;"
                                            />
                                            <span style="padding-left:5px;">'.$category['display_name'].'</span>';

                                if($category['node_type'] == 1 OR $category['node_type'] == 2)
                                     echo '<img src="' . asset('public/assets/plugins/xtree/images/16-circle-blue-add.png') . '" alt="add subcategory" width="16" height="16" class="add_category"/>';
                                          //<img src="images/16-circle-red-remove.png" alt="remove" width="16" height="16" class="delete_category"/>';

                                if ($currLevel > $prevLevel) { $prevLevel = $currLevel; }

                                $currLevel++; 

                                self::createXTree ($array, $categoryId, $currLevel, $prevLevel);

                                $currLevel--;	 		 	

                        }	

                }

                 if ($currLevel == $prevLevel) echo "\n </li> \n </ul> \n";
        }   

    }  
    
    
    
}