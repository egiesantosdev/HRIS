<?php

namespace App\Libraries;
use App\Models\MasterModel;
use App\Models\HrisModel;

class TemplateLib
{
    public static function userInformation($userId)
    {
        $masterModel = new MasterModel();

        $joins = [
            [
                'user_info',
                'user_info.user_id = users.id',
                'inner',
            ],
            [
                'departments',
                'departments.dept_id = user_info.dept_id',
                'inner',
            ],
        ];

        $fetched = $masterModel->get(
            // 'baliwagc_systems_db',
            'users', //tableName
            'user_id, firstname, middlename, lastname, email, username, user_photo, role, department_name, user_info.dept_id, birthdate, contact_number, suffix, system_access, barangay', //select field
            [
                'user_info.user_id' => $userId
            ], //where conditions
            $joins, // join Conditions
            FALSE,
            FALSE
        ); 

        // var_dump($fetched[0]);

        // return $fetched[0];
    }

    public static function departments()
    {
        $masterModel = new MasterModel();

        $fetched = $masterModel->get(
            'departments', //tableName
            'dept_id, dept_alias, department_name', //select field
            [
                'is_deleted' => 0
            ], //where conditions,
            FALSE,
            'dept_id ASC',
            FALSE
        );

        return $fetched;
    }

    public static function employment_status()
    {
        $hrisModel = new HrisModel();

        $fetched = $hrisModel->get(
            'employment_status', //tableName
            'es_id, es_description',
            [
                'deleted_at' => null
            ], //where conditions,
            FALSE,
            'es_id ASC',
            FALSE
        );

        return $fetched;
    }

    public static function roles()
    {
        $masterModel = new MasterModel();

        $fetched = $masterModel->get(
            'roles', //tableName
            'role_id, role_description', //select field
            [
                'deleted_at' => NULL
            ], //where conditions,
            FALSE,
            'role_id ASC',
            FALSE
        );

        // var_dump($fetched[]);
        return $fetched;
    }

    public static function defaultPassword()
    {
        return '123baliwag123';
    }
}