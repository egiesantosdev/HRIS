<?php

namespace App\Controllers;
use Myth\Auth\Entities\User;
use App\Models\MasterModel;
use App\Controllers\UtilController;
use App\Libraries\TemplateLib;
use Myth\Auth\Password;

class Dashboard extends BaseController
{
    // public function __construct()
    // {
    //     $this->userInformation = TemplateLib::userInformation(user_id());
    // }


    public function index()
    {   

        switch ($this->userInformation['data'][0]->role) {
            
            case '1': // System Admin
                $this->viewData['departments'] = $this->masterModel->get('departments', 'dept_id');
                return view('dashboards/systemAdmin', $this->viewData);
                break;
            default:

                $getPassword = $masterModel->get('users', 'password_hash', ['id' => user_id()]);

                if(Password::verify(TemplateLib::defaultPassword(), $getPassword['result'][0]->password_hash))
                {  
                    return view('users/changePassword', $view_data); 
                }
                else
                {
                    $view_data = [
                        'title' => 'Welcome, '.$this->userInformation->firstname.' '.$this->userInformation->lastname,
                        'userInformation' => $this->userInformation
                    ];
                    return view('dashboards/client', $view_data);
                }

                break;
        }
    }

    public function adminDashboard()
    {   
        
    }

    public function clientDashboard()
    {
        $view_data = [
            'title' => 'Welcome, '.$userInfo->firstname.' '.$userInfo->lastname,
            'userInformation' => $userInfo
        ];
    }

    public function profile(){
        if($this->userInformation->role==3){
            $masterModel = new MasterModel();

            $view_data = [
                'title' => 'My Profile',
                'userInformation' => $this->userInformation,
                'userBarangaysCitiesAndProvinces' => json_decode(UtilController::userBarangaysCitiesAndProvinces($this->userInformation->brgy_id))
            ];
            return view('users/editProfile', $view_data);
        }else{throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();}

    }
}
