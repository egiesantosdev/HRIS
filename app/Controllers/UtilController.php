<?php

namespace App\Controllers;
use App\Models\UsersModel;
use App\Models\MasterModel;
use App\Models\CitizensModel;
use Myth\Auth\Entities\User;
use Myth\Auth\Password;
use Hermawan\DataTables\DataTable;
use App\Libraries\TemplateLib;

class UtilController extends BaseController
{
    /**
     * The function moves a user's avatar photo from a temporary directory to a permanent directory.
     * 
     * @param photo_name The parameter "photo_name" is the name of the photo file that needs to be
     * moved from the temporary directory to the avatar directory.
     * 
     * @return a boolean value, which indicates whether the user avatar was successfully moved or not.
     */
    public function moveUserAvatar($photo_name){
        if($this->request->isAJAX()){
            $result = false;
            $avatar_dir = str_replace("\\","/",ROOTPATH)."public/assets/media/avatars/";
            if (!file_exists($avatar_dir)) {
                mkdir($avatar_dir, 0777, true);
            }
            if($photo_name){
                $temp_dir = str_replace("\\","/",ROOTPATH)."public/assets/media/avatars/temp/";
                $result = rename( $temp_dir.$photo_name, $avatar_dir.$photo_name);
            }
            return $result;
        }else{throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();}
    }

    /**
     * The function `uploadUserAvatar` uploads a user's avatar image file to a temporary directory on
     * the server.
     * 
     * @param id The "id" parameter is the unique identifier of the user for whom the avatar is being
     * uploaded. It is used to generate a unique filename for the avatar image.
     */
    public function uploadUserAvatar($id){
        if($this->request->isAJAX()){
            $dataURL = $_POST["dataURL"];
            $file = file_get_contents($dataURL) or die('File too large or inacessible');
            $filename = $id.'-'.date("YmdHis").'.jpeg';
            $dir = str_replace("\\","/",ROOTPATH)."public/assets/media/avatars/temp/";
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }
            $fp = fopen($dir.$filename,"w");
            $result = fwrite($fp, $file);
            fclose($fp);
            if($result){    
                $this->deleteOldTempAvatars($id, $filename);
                echo $filename;
            }else{
                echo $result;
            }
        }else{throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();}
    }

    /**
     * It deletes all files in the temp folder that start with the user's id.
     * 
     * @param id the id of the user
     */
    public function deleteOldTempAvatars($id, $exception){
        $dir = str_replace("\\","/",ROOTPATH)."public/assets/media/avatars/temp/";
        $files = scandir($dir);
        if(is_array($files)){
            foreach($files as $file){
                if(is_file($dir.$file) && explode("-", $file)[0]==$id){
                    if($file == $exception){continue;}
                    unlink($dir.$file);
                }
            }
        }
    }

    /**
     * It deletes all files in the avatars folder that start with the user's id
     * 
     * @param id the id of the user
     */
    public function deleteOldUserAvatars($id){
        $dir = str_replace("\\","/",ROOTPATH)."public/assets/media/avatars/";
        $files = scandir($dir);
        if(is_array($files)){
            foreach($files as $file){
                if(is_file($dir.$file) && explode("-", $file)[0]==$id){
                    unlink($dir.$file);
                }
            }
        }
    }
    
    /**
     * It takes a dataURL, and saves it to a file
     * 
     * @param dataURL The dataURL of the image you want to upload.
     * @param directory The directory where you want to save the image.
     * @param file_name The name of the file you want to save it as.
     * @param file_extension The file extension of the image.
     * 
     * @return The result of the fwrite function.
     */
    public function uploadImageTo($dataURL, $directory = "public/assets/media/temp", $file_name = FALSE, $file_extension = "jpeg"){
        $file_name = $file_name ? $file_name : date("YmdHis");
        $filename = $file_name.'.'.$file_extension;
        $slash = substr($directory, -1) == "/" ? "" : "/";
        $dir = str_replace("\\","/",ROOTPATH).$directory.$slash;
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }
        $fp = fopen($dir.$filename,"w");
        $result = fwrite($fp, file_get_contents($dataURL));
        fclose($fp);

        return $result;
    }

    /**
     * It deletes all files in a directory that match the conditions passed to it
     * 
     * @param directory The directory where the files are located.
     * @param conditions 
     * @param is_folder If you want to delete a folder, set this to TRUE.
     */
    public function deleteFilesOn($directory, $conditions = [], $is_folder = FALSE){
        $slash = substr($directory, -1) == "/" ? "" : "/";
        $dir = str_replace("\\","/",ROOTPATH).$directory.$slash;
        if (!file_exists($dir)) {
            return TRUE;
        }
        $files = scandir($dir);
        $result = TRUE;
        if(!$is_folder){
            $file_names = [];
            if(!empty($conditions)){
                $starts_with = isset($conditions["starts_with"]) ? $conditions["starts_with"] : "*" ;
                $ends_with = isset($conditions["ends_with"]) ? $conditions["ends_with"] : "*" ;
                $file_extension = isset($conditions["file_extension"]) ? $conditions["file_extension"] : "*" ;
                $path = $dir.$starts_with.$ends_with.'.'.$file_extension;
                $file_names = glob($path);
            }
            if(is_array($files)){
                foreach($files as $file){
                    if(is_file($dir.$file)){
                        if(!empty($conditions) && !in_array($dir.$file, $file_names)){
                            continue;
                        }

                        if(!unlink($dir.$file)){
                            $result = FALSE;
                            break;
                        }
                    }
                }
            }

            return $result;
        }else{
            $folder_names = [];
            if(!empty($conditions)){
                $starts_with = isset($conditions["starts_with"]) ? $conditions["starts_with"] : "*" ;
                $ends_with = isset($conditions["ends_with"]) ? $conditions["ends_with"] : "*" ;
                $path = $dir.$starts_with.$ends_with;
                $folder_names = glob($path, GLOB_ONLYDIR);
            }
            print_r($files);
            print_r($folder_names);
            print_r($folder_names);

            if(is_array($files)){
                foreach($files as $folder){
                    if(is_dir($dir.$folder)){
                        if(!empty($conditions) && !in_array($dir.$folder, $folder_names)){
                            continue;
                        }

                        if(!$this->rrmdir($dir.$folder)){
                            $result = FALSE;
                            break;
                        }
                    }else{
                        $result = FALSE;
                    }
                }
            }

            return $result;
            // return rmdir($directory);
        }
    }

    private function rrmdir($dir) {
        $result = TRUE;
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (filetype($dir."/".$object) == "dir"){
                        rrmdir($dir."/".$object); 
                    }else{
                        if(!unlink($dir."/".$object)){
                            $result = FALSE;
                            break;
                        }  
                    } 
                }
            }
            reset($objects);
            rmdir($dir);
        }

        return $result;
    }

    /**
     * It moves a file from one directory to another.
     * 
     * @param from the directory where the file is currently located
     * @param to the directory you want to move the file to
     * @param file_name The name of the file to be moved.
     * 
     * @return The result of the rename function.
     */
    public function moveFileTo($from, $to, $file_name = TRUE){
        $slash = gettype($file_name)!=="string" ? "" : "/" ;
        $from_dir = str_replace("\\","/",ROOTPATH).$from.$slash;
        $to_dir = str_replace("\\","/",ROOTPATH).$to.$slash;
        if (!file_exists($to_dir)) {
            mkdir($to_dir, 0777, true);
        }

        if(gettype($file_name)=="string"){
            $to_dir = $to_dir.$file_name;
            $from_dir = $from_dir.$file_name;
        }

        $result = rename( $from_dir, $to_dir);
        return $result;
    }

    public function zipFiles($file_list, $zip_path="public/assets/media", $zip_name="archive.zip"){
        if(gettype($file_list)!=="array"){
            throw new \Exception('Files must be array');
        }

        $root_path = str_replace("\\","/",ROOTPATH);
        $zip_file = $root_path.$this->addSlashToDir($zip_path).$zip_name; 
        touch($zip_file);
        
        $zip = new \ZipArchive;
        $flag = filesize($zip_file) ? \ZipArchive::CREATE : \ZipArchive::OVERWRITE;

        $opened_zip = $zip->open($zip_file, $flag);
        if($opened_zip){
            foreach ($file_list as $key => $file_data) {
                $local_file_name = $file_data["file_name"];
                if(isset($file_data["local_dir"])){
                    $zip->addEmptyDir($file_data["local_dir"]);
                    $local_file_name = $this->addSlashToDir($file_data["local_dir"]).$file_data["file_name"];
                }
                $zip->addFile($root_path.$this->addSlashToDir($file_data["current_dir"]).$file_data["file_name"], $local_file_name);
            }
        }else{
            return ['status' => 0, 'result' => 'The zip file not opened'];
        }

        $zip->close();

        return ['status' => 1, 'result' => 'The file(s) successfully zipped', "url"=>base_url($this->addSlashToDir($zip_path).$zip_name)];
    }

    public function zipFileTree($source, $destination, $flag = '')
    {
        if (!extension_loaded('zip') || !file_exists($source)) {
            return false;
        }

        $zip = new \ZipArchive();
        if (!$zip->open($destination, \ZipArchive::CREATE)) {
            return false;
        }

        $source = str_replace('\\', '/', realpath($source));
        if($flag)
        {
            $flag = basename($source) . '/';
            //$zip->addEmptyDir(basename($source) . '/');
        }

        if (is_dir($source) === true)
        {
            $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($source), \RecursiveIteratorIterator::SELF_FIRST);
            foreach ($files as $file)
            {
                $file = str_replace('\\', '/', realpath($file));
                if (strpos($flag.$file,$source) !== false) {
                    if (is_dir($file) === true)
                    {
                        $zip->addEmptyDir(str_replace($source . '/', '', $flag.$file . '/'));
                    }
                    else if (is_file($file) === true)
                    {
                        $zip->addFromString(str_replace($source . '/', '', $flag.$file), file_get_contents($file));
                    }
                }
            }
        }
        else if (is_file($source) === true)
        {
            $zip->addFromString($flag.basename($source), file_get_contents($source));
        }

        return $zip->close();
    }

    private function addSlashToDir($dir){
        $slash = substr($dir, -1) == "/" ? "" : "/";
        return $dir.$slash;
    }

    /**
     * The function `barangaysCitiesAndProvinces` retrieves barangays, cities, and provinces from a
     * database and returns them as JSON or an array.
     * 
     * @param is_json A boolean parameter that determines whether the output should be in JSON format
     * or not. If set to true, the function will return the result as a JSON string. If set to false,
     * the function will return the result as an associative array.
     * @param barangay_id The `barangay_id` parameter is used to specify a specific barangay (a small
     * administrative division in the Philippines) for which you want to retrieve information about its
     * corresponding city and province. If a `barangay_id` is provided, the function
     * `userBarangaysCitiesAndPronvinces
     * 
     * @return either a JSON-encoded string or an array, depending on the value of the 
     * parameter. If  is false, it returns a JSON-encoded string containing the "barangays",
     * "cities", and "provinces" arrays. If  is true, it returns an array containing the
     * "barangays", "cities", and "provinces" arrays.
     */
    public static function barangaysCitiesAndPronvinces($is_json = false, $barangay_id = false){
        if($barangay_id){
            return userBarangaysCitiesAndPronvinces($barangay_id);
        }
        $master_model = new MasterModel();

        $barangays = $master_model->get("refbrgy", "*");
        $cities = $master_model->get("refcitymun", "*");
        $provinces = $master_model->get("refprovince", "*");
        if(!$is_json){
            return json_encode([
                "barangays" => $barangays,
                "cities" => $cities,
                "provinces" => $provinces,
            ]);
        }
        return [
            "barangays" => $barangays,
            "cities" => $cities,
            "provinces" => $provinces,
        ];
    }

    public static function getBarangays($is_json = "0", $citymunCode = false){
        $master_model = new MasterModel();

        $where_condition = [];
        if($citymunCode){
            $where_condition = ["citymunCode" => $citymunCode];
        }
        $barangays = $master_model->get("refbrgy", "*", $where_condition);

        if((int)$is_json){
            return json_encode($barangays);
        }
        return $barangays;
    }

    public static function getCitiesMunicipalities($is_json = "0", $provCode = false){
        $master_model = new MasterModel();

        $where_condition = [];
        if($provCode){
            $where_condition = ["provCode" => $provCode];
        }
        $cities_municipalities = $master_model->get("refcitymun", "*", $where_condition);

        if((int)$is_json){
            return json_encode($cities_municipalities);
        }
        return $cities_municipalities;
    }

    public static function getCitiesMunicipalitiesAndProvinces($is_json = "0", $brgyCode = false){
        $master_model = new MasterModel();
        if($brgyCode === false){
            return "No brgyCode set";
        }
        $barangay = $master_model->get("refbrgy", "*", ["brgyCode" => $brgyCode]);
        
        if($barangay){
            $citymunCode = $barangay[0]->citymunCode;
            $city_municipality = $master_model->get("refcitymun", "*", ["citymunCode" => $citymunCode]);

            if($city_municipality){
                $provCode = $city_municipality[0]->provCode;

                $result = [
                    "barangays" => UtilController::getBarangays(0, $citymunCode),
                    "cities_municipalities" => UtilController::getCitiesMunicipalities(0, $provCode),
                    "provCode" => $provCode
                ];

                if((int)$is_json){
                    return json_encode($result);
                } 

                return $result;
            }

            return json_encode($city_municipality);

        }

        return json_encode($barangay);
    }

    public static function getProvinces($is_json = "0"){
        $master_model = new MasterModel();

        $provinces = $master_model->get("refprovince", "*");
        if((int)$is_json){
            return json_encode($provinces);
        }
        return $provinces;
    }
}
?>