<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\MasterModel;
use App\Models\RbiModel;
use App\Models\CitizensModel;
use \AllowDynamicProperties;
use App\Libraries\TemplateLib;
#[AllowDynamicProperties]

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['auth', 'form', 'url'];

    protected $fromEmail = 'no-reply@baliwag.gov.ph';

    protected $fromName = 'Baliwag City | Human Resource Information System';

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();

        
        $this->masterModel = New MasterModel();
        $this->userInformation = $this->masterModel->get('user_info', 
            'user_id, username, firstname, middlename, lastname, birthdate, role, user_photo, email, dept_name, birthdate, role', 
            ['user_id' => user_id()], 
            [
                ['users', 'users.id = user_info.user_id', 'left'],
                ['departments', 'departments.dept_id = user_info.dept_id', 'left']
            ]
        );
        
        $this->viewData = [
            'userInformation' => $this->userInformation['data'][0]
        ];
    }

    public function getSystemRoles(){
       $roles = $this->masterModel->get('roles', //tablename
            'role_id, role_description' //columns
        );
        return (!$roles['error'] ? $roles['data'] : false);
    }

    public function getDepartments(){
        $dept = $this->masterModel->get('departments', //tablename
             'dept_id, dept_alias, dept_name' //columns
        );
        return (!$dept['error'] ? $dept['data'] : false);
     }
}
