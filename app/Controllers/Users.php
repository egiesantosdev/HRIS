<?php

namespace App\Controllers;
use App\Controllers\UtilController;
use App\Models\UsersModel;
use App\Models\MasterModel;
use Myth\Auth\Entities\User;
use Myth\Auth\Password;
use Hermawan\DataTables\DataTable;
use App\Libraries\TemplateLib;

class Users extends BaseController
{

    public function index()
    {   
        // $this->viewData['departments'] = $this->masterModel->get('departments', 'dept_id');
        $this->viewData['title'] = 'System Users';
        $this->viewData['roles'] = $this->getSystemRoles();
        $this->viewData['departments'] = $this->getDepartments();

        return view('users/users', $this->viewData);
    }

    public function getUsers(){
        return DataTable::of(
            $this->masterModel->getDataTables(
                'user_info',
                'user_id, username, firstname, middlename, lastname, birthdate, role, user_photo, email, status, active, dept_name, user_info.dept_id, birthdate', 
                [], 
                [
                    ['users', 'users.id = user_info.user_id', 'left'],
                    ['departments', 'departments.dept_id = user_info.dept_id', 'left']
                ]
            )
        )->add('actions', function($row){
            return '
                <div class="dropdown ms-2">
                    <button class="btn btn-sm btn-icon btn-light-primary btn-active-primary me-2" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="svg-icon svg-icon-5 m-0">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="10" y="10" width="4" height="4" rx="2" fill="currentColor"></rect>
                                <rect x="17" y="10" width="4" height="4" rx="2" fill="currentColor"></rect>
                                <rect x="3" y="10" width="4" height="4" rx="2" fill="currentColor"></rect>
                            </svg>
                        </span>
                    </button>
                    <div class="dropdown-menu menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-150px py-4" aria-labelledby="dropdownMenuButton" style="">
                        <div class="menu-item px-3">
                            <span class="menu-link px-3 edit-btn" data-id = "'.$row->user_id.'" >Edit</span>
                        </div>
                        <div class="menu-item px-3">
                            <span class="menu-link px-3 access-btn" data-id = "'.$row->user_id.'" >Profile</span>
                        </div>
                    </div>
                </div>';
        })->toJson(true);
    }

    public function getUser($userId){
        $userInfo = $this->userInformation($userId);
    }
    
    public function addUser()
    {
        if($this->request->isAJAX()){
            $users = [
                'email' => trim($this->request->getPost('email')),
                'username' => trim($this->request->getPost('username')),
                'password_hash' => Password::hash(TemplateLib::defaultPassword()),
                'active' => 1
            ];

            $insertUser = $this->masterModel->insert('users', $users);
            
            if(!$insertUser['error']){

                $userInfo = [
                    'user_id' => $insertUser['data'],
                    'user_qrcode' => '',
                    'firstname' => trim($this->request->getPost('firstname')),
                    'middlename' => trim($this->request->getPost('middlename')),
                    'lastname' => trim($this->request->getPost('lastname')),
                    'birthdate' => $this->request->getPost('birthdate'),
                    'dept_id' => $this->request->getPost('dept_id'),
                    'role' => $this->request->getPost('role'),
                ];

                $insertUserInfo = $this->masterModel->insert('user_info', $userInfo);
                
                if(!$insertUserInfo['error']){
                    return json_encode([
                        'error' => false,
                        'message' => $insertUserInfo['message'],
                        'data' => $insertUserInfo['data']
                    ]);
                }
                else{
                    return json_encode([
                        'error' => true,
                        'message' => $insertUserInfo['message'],
                        'data' => false
                    ]);
                }
            }
        }
        else{
            return json_encode([
                'error' => true,
                'message' => $insertUser['message'],
                'data' => false
            ]);
        }
    }

    public function updateUser()
    {
        if($this->request->isAJAX()){
            $message = '';
            $users = [
                'email' => trim($this->request->getPost('email')),
                'username' => trim($this->request->getPost('username')),
            ];

            $updateUser = $this->masterModel->update('users', $users, ['id' => $this->request->getPost('user_id')]);

            if(!$updateUser['error']){
                $userInfo = [
                    'firstname' => trim($this->request->getPost('firstname')),
                    'middlename' => trim($this->request->getPost('middlename')),
                    'lastname' => trim($this->request->getPost('lastname')),
                    'birthdate' => $this->request->getPost('birthdate'),
                    'dept_id' => $this->request->getPost('dept_id'),
                    'role' => $this->request->getPost('role'),
                ];

                $updateUserInfo = $this->masterModel->update('user_info', $userInfo, ['user_id' => $this->request->getPost('user_id')]);

                if(!$updateUserInfo['error']){
                    return json_encode([
                        'error' => false,
                        'message' => ($updateUser['data'] != false) ? $updateUser['message'] : $updateUserInfo['message'],
                        'data' => $updateUserInfo['data']
                    ]);
                }
                else{
                    return json_encode([
                        'error' => true,
                        'message' => $updateUserInfo['message'],
                        'data' => $updateUserInfo['data']
                    ]);
                }
            }
        }
    }

    public function resetUserPassword($id)
    {
        if ($this->request->isAJAX())
        {
            $data = [
                'password_hash' => Password::hash(TemplateLib::defaultPassword()),
            ];

            $updatePassword = $this->masterModel->update('users', $data, ['id' => $id]);

            if(!$updatePassword['error']){
                return json_encode([
                    'error' => false,
                    'message' => 'Password Successfully Updated.',
                    'data' => $updatePassword['data']
                ]);
            }
            else{
                return json_encode([
                    'error' => false,
                    'message' => $updatePassword['message'],
                    'data' => $updatePassword['data']
                ]);
            }
        }
    }

    public function banUser($id)
    {
        $usersModel = new UsersModel();

        if ($this->request->isAJAX())
        {
            $data = [
                'status' => 'banned',
                'status_message' => NULL,
            ];

            $banned = $usersModel->updateUserData('users', $data, ['id' => $id]);

            if(is_int($banned) > 0)
            {
                return json_encode([
                    'success' => $banned,
                    'success_message' => 'User is banned!'
                ]);
            }
            else
            {
                return json_encode([
                    'error' => true,
                    'error_message' => $banned
                ]);
            }
        }
    }

    public function unbanUser($id)
    {
        $usersModel = new UsersModel();

        if ($this->request->isAJAX())
        {
            $data = [
                'status' => NULL,
                'status_message' => NULL,
            ];

            $banned = $usersModel->updateUserData('users', $data, ['id' => $id]);

            if(is_int($banned) > 0)
            {
                return json_encode([
                    'success' => $banned,
                    'success_message' => 'User is unbanned!'
                ]);
            }
            else
            {
                return json_encode([
                    'error' => true,
                    'error_message' => $banned
                ]);
            }
        }
    }

    

    public function userActivationStatus($id)
    {
        $usersModel = new UsersModel();

        if ($this->request->isAJAX())
        {
            $data = [
                'active' => ($this->request->getPost('status') == 'activate') ? 1 : 0,
            ];

            $update = $usersModel->updateUserData('users', $data, ['id' => $id]);

            if(is_int($update) > 0)
            {
                return json_encode([
                    'success' => $update,
                    'success_message' => ($this->request->getPost('status') == 'activate') ? 'User Activated!' : 'User Deactivated!',
                ]);
            }
            else
            {
                return json_encode([
                    'error' => true,
                    'error_message' => $update
                ]);
            }
        }
    }

    public function changePassword()
    {
        $view_data = [
            'title' => 'Change Password',
            'userInformation' => TemplateLib::userInformation(user_id())
        ];

        return view('users/changePassword', $view_data);
    }

    public function changeUserPassword()
    {
        $usersModel = new UsersModel();
        $errors = \Config\Services::validation()->getErrors();
        $error_cont = '';

        if ($this->request->isAJAX())
        {
            $rules = [
                'old_password' => [
                    'rules' => 'required|oldPasswordCheck',
                    'label' => 'Old Password',
                    'errors' => [
                        'oldPasswordCheck' => 'OLD PASSWORD does not match to CURRENT PASSWORD'
                    ]
                ],
                'new_password' => [
                    'rules' => 'required|min_length[8]',
                    'label' => 'New Password',

                ],
                'confirm_new_password' => [
                    'rules' => 'required|min_length[8]',
                    'label' => 'Confirm New Password',

                ]
            ];

            if($this->validate($rules))
            {
                if($this->request->getPost('new_password') === $this->request->getPost('confirm_new_password'))
                {
                    $data = [
                        'password_hash' => Password::hash($this->request->getPost('new_password')),
                    ];

                    $update = $usersModel->updateUserData('users', $data, ['id' => user_id()]);

                    if(is_int($update) > 0)
                    {
                        return json_encode([
                            'success' => $update,
                            'success_message' => 'Password Updated!'
                        ]);
                    }
                    else
                    {
                        return json_encode([
                            'error' => true,
                            'error_message' => $update
                        ]);
                    }
                }
                else
                {
                    $error_cont .= '- New Password and Confirm New Password did not match<br>';
                }
            }
            else
            {
                $errors = \Config\Services::validation()->getErrors();

                foreach ($errors as $error) {
                    $error_cont .= '-'.$error.'<br>';
                }
                return json_encode(
                    [
                        'error' => true,
                        'error_message' => $error_cont
                    ]
                );
            }
        }
    }

    public function updateUserPhoto($id, $filename)
    {
        $masterModel = new MasterModel();
        if ($this->request->isAJAX()){
            $table_name = "user_info";
            if( $this->userInformation->role == 3 ){
                $table_name = "public_user_info";
            }
            
            $result = $masterModel->update($table_name, ["user_photo"=>$filename], ["user_id"=>$id]);
            return json_encode([
                "id"=>$id,
                "filename"=>$filename,
                "result"=>$result
            ]);
        }
    }

    public function authenticateUser(){
        if(logged_in()){
            $authen = service('authentication');
            $credentials = [
                'email' => User()->getUserInfo()['email'],
                'password' => $_POST['password']
            ];
            $result = $authen->validate($credentials);
            echo $result;
            return $result;
        }
    }

    public function updateAccountPassword($id){
        if($this->request->isAJAX()){
        $users_model = new UsersModel();
        $ok = true;
        if($_POST['new_password']!=$_POST['confirm_new_password']){
            $ok = false;
        }
        if(strlen($_POST['new_password'])<8 && strlen($_POST['confirm_new_password'])<8){
            $ok = false;
        }
        $new_password = Password::hash($_POST['new_password']);
        if($ok){
            echo ($users_model->updateAccountPassword($id, $new_password));
        }else{
            echo false;
        }
        }else{throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();}
    }

    public function addPublicUserInfo()
    {
        if($this->request->isAJAX()){
            $master_model = new MasterModel();
            $data = $_POST;
            $result = $master_model->insert("public_user_info", $data);
            return $result;
        }else{throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();}
    }

    public function uploadUserIDs(){
        if ($this->request->isAJAX())
        {
            $util_controller = new UtilController();

            $id_data = [
                "id_back" => $this->request->getPost('id_back'),
                "id_front" => $this->request->getPost('id_front'),
                "id_selfie" => $this->request->getPost('id_selfie'),
            ];
            $result = TRUE;

            $util_controller->deleteFilesOn("public/assets/media/validations/temp/".$this->userInformation->user_id);

            foreach ($id_data as $key => $value) {
                $result = $util_controller->uploadImageTo(
                    $value,
                    "public/assets/media/validations/temp/".$this->userInformation->user_id,
                    $key,
                    "png"
                );

                if(!$result){break;}
            }

            if($result){
                $move_result = TRUE;
                foreach ($id_data as $key => $value) {
                    $move_result = $util_controller->moveFileTo(
                        "public/assets/media/validations/temp/".$this->userInformation->user_id,
                        "public/assets/media/validations/".$this->userInformation->user_id,
                        $key.".png"
                    );
                    
                    if(!$move_result){break;}
                }
    
                if($move_result){
                    $util_controller->deleteFilesOn("public/assets/media/validations/temp/".$this->userInformation->user_id, [], TRUE);
                    $masterModel = new MasterModel();
                    $update_result = $masterModel->update("public_user_info", ["is_validated"=>1], ["user_id"=>$this->userInformation->user_id]);
                    if($update_result){
                        return json_encode([
                            'success' => $id_data,
                            'success_message' => 'Successfully Applied for Profile Validation'
                        ]);
                    }else{
                        return json_encode([
                            'error' => true,
                            'error_message' => 'Something went wrong, try again later'
                        ]);
                    }
                }
            }else{
                return json_encode([
                    'error' => true,
                    'error_message' => 'Something went wrong, try again later'
                ]);
            }
        }
    }
}
