<?php
use \PhysicalAddress;
use \ContactInformation;


class UserDetail
{
       /**
        * The database table used by the model.
        *
        * @var string
        */
	protected $table = 'users_detail';
        
        
        
       /**
        * Get User detail from user detail table .
        * 
        * @access public
        * @param array $array of allowed node to the specific user, so we can make check flag true or false in data array.
        * @return array node array to build acl resources array.
        * @author Murtaza A <murtaza.a@allshoreresources.com>
        */
        public function get($sentryUserId)
        {

           try {
                
                $userDetail = DB::table($this -> table)
                                            ->where('user_id', $sentryUserId)
                                            ->first();
                
                if(is_object($userDetail)){
                    //Convert Id's into object and return array
                    if($userDetail -> contact_info != '')
                        $userDetail -> contact_info     = ContactInformation::find($userDetail -> contact_info);

                    if($userDetail -> user_addr != '')
                        $userDetail -> user_addr        = PhysicalAddress::find($userDetail -> user_addr);

                    if($userDetail -> billing_addr != '')
                        $userDetail -> billing_addr     = PhysicalAddress::find($userDetail -> billing_addr);
                }
                
                return $userDetail;

            } catch (\Exception $e) {
                echo $e->getMessage();
            }

        }

       
           
       /**
        * Save the permission in the sentry group db table .
        * 
        * @access public
        * @param int $group Id of the group against which need to save permissions.
        * @param array $access_code_by_id combination of id's of {module}{controller}{method} forms rigth code or access code.
        * @param array $access_code_by_name combination of name's of {module}{controller}{method} forms rigth code or access code.
        * @author Murtaza A <murtaza.a@allshoreresources.com>
        */
        public function add ($sentryUserId , $contactId = Null, $addressId = Null, $billingAddressId = Null)
        { 
            try { 
                    $id = DB::table($this -> table)->insertGetId(
                        array(  
                                'user_id'       => $sentryUserId,
                                'contact_info'  => $contactId,
                                'user_addr'     => $addressId,
                                'billing_addr'  => $billingAddressId,
                                'created_at'    => date('Y-m-d H:i:s'),
                        )
                               
                    );
                    
                   return $id; 
            }
            catch (\Exception $e) {
                echo $e->getMessage();
            }
        }
        
        /**
        * Save the permission in the sentry group db table .
        * 
        * @access public
        * @param int $group Id of the group against which need to save permissions.
        * @param array $access_code_by_id combination of id's of {module}{controller}{method} forms rigth code or access code.
        * @param array $access_code_by_name combination of name's of {module}{controller}{method} forms rigth code or access code.
        * @author Murtaza A <murtaza.a@allshoreresources.com>
        */
        public function update ($sentryUserId , $contactId = Null, $addressId = Null, $billingAddressId = Null)
        { 
            try {
                   
                    DB::table($this -> table)
                                        -> where('user_id', $sentryUserId)
                                        -> update(
                                        array(  
                                                'contact_info'  => $contactId,
                                                'user_addr'     => $addressId,
                                                'billing_addr'  => $billingAddressId,
                                                'updated_at'    => date('Y-m-d H:i:s'),
                                        )
                    );
                    
            }
            catch (\Exception $e) {
                echo $e->getMessage();
            }
        }
        
        
        /**
        * Save the permission in the sentry group db table .
        * 
        * @access public
        * @param int $group Id of the group against which need to save permissions.
        * @param array $access_code_by_id combination of id's of {module}{controller}{method} forms rigth code or access code.
        * @param array $access_code_by_name combination of name's of {module}{controller}{method} forms rigth code or access code.
        * @author Murtaza A <murtaza.a@allshoreresources.com>
        */
        public function delete ($userId)
        { 
            try {
                    
                    $userDetail = DB::table($this -> table)
                                            ->where('user_id', $userId)
                                            ->first();
                    if (is_object($userDetail)) {
                        
                        if($userDetail -> user_addr != '')
                            PhysicalAddress::destroy(array($userDetail -> user_addr));
                        
                        if($userDetail -> billing_addr != '')
                            PhysicalAddress::destroy(array($userDetail-> billing_addr ));
                        
                        if($userDetail -> contact_info != '')
                            ContactInformation::destroy(array($userDetail->contact_info,));

                        DB::table($this -> table)
                                            -> where('user_id', $userId)
                                            -> delete();
                    }
            }
            catch (\Exception $e) {
                echo $e->getMessage();
            }
        }
    
}