<?php 
namespace App\Helpers;
use Illuminate\Support\Facades\Auth;

class CommonHelper {
    /**
     * CommonHelper
     * ------------------
     * All the common functions and utilities are defined here which can used gloablly
     * throughout the project
     * @author Shubham Pawar
     */



     /**
      * Generates a Base64 random token
      * @param Integer $length
      * @return String
      */
    public static function generateB64Token($length) {
        $token = "";
        $sample = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $sample.= "abcdefghijklmnopqrstuvwxyz";
        $sample.= "0123456789";
        $sample.="_-";
        $max = strlen($sample);
    
        for ($i = 0; $i < $length; $i++) {
            $token .= $sample[random_int(0, $max-1)];
        }
    
        return $token;
    }

    /**
     * Check if the user is admin/superUser
     * @return Boolean
     */

     public static function checkAdmin() {
         if(Auth::user()->role == config('constants.user_roles.superUser')
         || Auth::user()->role == config('constants.user_roles.admin')) {
             return true;
         }
         return false;
     }

     
     public static function checkSU() {
        if(Auth::user()->role == config('constants.user_roles.superUser')) {
            return true;
        }
        return false;
    }
     
}
?>