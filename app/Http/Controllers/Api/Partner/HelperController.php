<?php

namespace App\Http\ControllersApi\Partner;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
class HelperController extends Controller
{

    public static function getImagefolder($email,$user_id){
    	return self::get_folder_name($email,$user_id);
    }

    public static function BulkImageUpload($image,$folder){

       $name = $image->getClientOriginalName(); //get the  file extention
      
       $sucess=$image->move($folder, $name);  //mve to destination you mentioned 
      if ($sucess) {
            return true;
        }

        return false;

    }

    public static function get_image_path(){
         return Auth::user()->user_image_path;
    }

    private static function RemoveSpecialChar($value){
			$result  = preg_replace('/[^a-zA-Z0-9_ -]/s','',$value);
		
			return $result;
	}

	private static function get_folder_name($email,$user_id){
		
		$email=explode('@', $email);

		$emailAddress=self::RemoveSpecialChar($email[0]);
			$folderName = $emailAddress.'-'.$user_id;

    	       $returnPath = 'product-image/'.$folderName.'/';
    			$path=public_path('product-image/'.$folderName);
    	 		 if (!file_exists($path)) {
    	 			mkdir($path, 0777);
    	 			return $returnPath;
				    
				}else{
					return $returnPath;
				}

				

	}

    

	

}
