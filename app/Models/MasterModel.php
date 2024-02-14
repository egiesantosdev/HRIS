<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

use \AllowDynamicProperties;
#[AllowDynamicProperties]

class MasterModel
{

    // protected $DBGroup = 'baliwagc_systems_db';
    public function __construct()
    {
        $this->db = db_connect();
    }

    //  ******************************************************  SELECT QUERY START *************************************************//
 

    public function get($tableName, $selectData, $whereConditions=[], $joinConditions=FALSE, $orderBy=FALSE, $limit=FALSE)
    {   

        $builder = $this->db->table($tableName);
        if($selectData=="*"){
            $builder->select();
        }else{
            $builder->select($selectData);
        }
        if($joinConditions != FALSE)
        {
            foreach ($joinConditions as $join){$builder->join($join[0], $join[1], $join[2]);}
        }
        $builder->where($whereConditions);
        ($orderBy != FALSE) ? $builder->orderBy($orderBy): NULL;
        ($limit != FALSE) ? $builder->limit($limit): NULL;

        try {
            $fetched = $builder->get()->getResult();
            if($fetched != NULL)
            {
                return ['error' => false, 'message' => 'Data found', 'data' => $fetched];
            }
            else
            {
                return ['error' => true, 'result' => 'No data found', 'data' => false];
            }

        } catch (\mysqli_sql_exception $e) {
            return ['error' => true, 'result' => $e->getMessage(), 'data' => false];
        }
    }

    public function getLike($tableName, $selectData, $whereConditions=[], $likeConditions=[], $joinConditions=FALSE, $orderBy=FALSE, $limit=FALSE)
    {   

        $builder = $this->db->table($tableName);
        if($selectData=="*"){
            $builder->select();
        }else{
            $builder->select($selectData);
        }
        if($joinConditions != FALSE)
        {
            foreach ($joinConditions as $join){$builder->join($join[0], $join[1], $join[2]);}
        }
        $builder->where($whereConditions);
        $builder->like($likeConditions);
        ($orderBy != FALSE) ? $builder->orderBy($orderBy): NULL;
        ($limit != FALSE) ? $builder->limit($limit): NULL;

        try {
            $fetched = $builder->get()->getResult();
            if($fetched != NULL)
            {
                return $fetched;
            }
            else
            {
                return false;
            }

        } catch (\mysqli_sql_exception $e) {
            return ['status' => false, 'result' => $e->getMessage()];
        }
    }

    public function getDataTables($tableName, $selectData, $whereConditions=[], $joinConditions=FALSE, $orderBy=FALSE, $limit=FALSE)
    {
        // $this->db->setDatabase($dbName);
        $builder = $this->db->table($tableName);
        if($selectData=="*"){
            $builder->select();
        }else{
            $builder->select($selectData);
        }
        if($joinConditions != FALSE)
        {
            foreach ($joinConditions as $join){$builder->join($join[0], $join[1], $join[2]);}
        }
        $builder->where($whereConditions);
        ($orderBy != FALSE) ? $builder->orderBy($orderBy): NULL;
        ($limit != FALSE) ? $builder->limit($limit): NULL;

        return $builder;
    }

    public function printGet($dbName, $selectData, $whereConditions=[], $joinConditions=FALSE, $orderBy=FALSE, $limit=FALSE)
    {
        $builder = $this->db->table($dbName);
        $builder->select($selectData);
        if($joinConditions != FALSE)
        {
            foreach ($joinConditions as $join){$builder->join($join[0], $join[1], $join[2]);}
        }
        $builder->where($whereConditions);
        ($orderBy != FALSE) ? $builder->orderBy($orderBy): NULL;
        ($limit != FALSE) ? $builder->limit($limit): NULL;

        try {
            $fetched = $builder->getCompiledSelect();

                return ['status' => true, 'result' => $fetched];


        } catch (\mysqli_sql_exception $e) {
            return ['status' => false, 'result' => $e->getMessage()];
        }
    }

    //  ******************************************************  SELECT QUERY END ***************************************************//

    //  ******************************************************  ADD QUERY START ***************************************************//

    public function insert($tableName, $data)
    {   
        $builder = $this->db->table($tableName);

        try{
            $builder->insert($data);

            if(is_int($this->db->insertID()) > 0)
            {
                return ['error' => false, 'message' => 'Data Successfully Inserted.', 'data' => $this->db->insertID()]; // insert method will return interger
            }
        }
        catch(\mysqli_sql_exception $e)
        {
            return ['error' => true, 'message' => $e->getMessage(), 'data' => false]; // insert method will return interger; 
        }
    }


    //  ******************************************************  ADD QUERY END ***************************************************//


    //  ******************************************************  UPDATE QUERY START ***************************************************//

    public function update($tableName, $data, $whereConditions)
    {
        $builder = $this->db->table($tableName);

        try
        {
            $result = $builder->update($data, $whereConditions);

            if($this->db->affectedRows() == 0){
                return ['error' => false, 'message' => 'No changes.', 'data' => false];
            }
            else{
                if($this->db->affectedRows() > 0){
                    return ['error' => false, 'message' => 'Record Successfully Updated.', 'data' => $this->db->affectedRows()];
                }
                else{
                    return ['error' => false, 'message' => 'Contact System Administrator.', 'data' => false];
                }
            }
            
        }
        catch (\mysqli_sql_exception $e)
        {
            return ['error' => true, 'message' => $e->getMessage(), 'data' => false];
        }
    }

    //  ******************************************************  UPDATE QUERY END ***************************************************//

    public function customQuery($query)
    {
        try
        {
            $fetched = $this->db->query($query);

            if($fetched)
            {
                return $fetched->getResult();
            }
            else
            {
                return false;
            }
        }
        catch (\mysqli_sql_exception $e)
        {
            return $e->getMessage();
        }
    }

    public function delete($tableName, $whereConditions)
    {
        $builder = $this->db->table($tableName);
        $builder->where($whereConditions);
        $builder->delete();
        
    }

    
}