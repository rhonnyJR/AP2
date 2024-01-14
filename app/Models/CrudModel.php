<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class CrudModel extends Model
{
    protected $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    private function getQuery($query)
    {
        return $this->db->query($query);
    }

    private function getBuilder($table)
    {
        return $this->db->table($table);
    }


    #############################################################
    // RESULT QUERY =================

    // Ambil Data Berdasarkan Query
    public function queryObj($query)
    {
        return $this->getQuery($query)->getResult();
    }

    public function queryArray($query)
    {
        return $this->getQuery($query)->getResultArray();
    }


    // Ambil data berdasarkan query menggunakan binding
    public function queryBind($query, $data)
    {
        return $this->db->query($query, $data);
    }


    // Ambil data berdasarkan query dengan nilai 1 baris
    public function queryRowObj($query)
    {
        return $this->getQuery($query)->getRow();
    }

    public function queryRowArray($query)
    {
        return $this->getQuery($query)->getRowArray();
    }



    #############################################################
    // RESULT QUERY getBuilder =================

    // Ambil semua data
    public function getAllDataObj($table)
    {
        return $this->getBuilder($table)->get()->getResult();
    }

    public function getAllDataArray($table)
    {
        return $this->getBuilder($table)->get()->getResultArray();
    }


    // Ambil semua data berdasarkan kolom yang dipilih
    public function getDataColumnObj($table, $column)
    {
        return $this->getBuilder($table)->select($column)->get()->getResult();
    }

    public function getDataColumnArray($table, $column)
    {
        return $this->getBuilder($table)->select($column)->get()->getResultArray();
    }


    // Ambil semua data berdasarkan filter where
    public function getDataWhereObj($table, $filter)
    {
        return $this->getBuilder($table)->where($filter)->get()->getResult();
    }

    public function getDataWhereArray($table, $filter)
    {
        return $this->getBuilder($table)->where($filter)->get()->getResultArray();
    }

    // Ambil hitungan data berdasarkan kolom yang dipilih
    public function getDataCount($table, $coloumCount)
    {
        return $this->getBuilder($table)->selectCount($coloumCount)->get()->getRowArray();
    }

    public function getDataCountWhere($table, $coloumCount, $filter)
    {
        return $this->getBuilder($table)->selectCount($coloumCount)->where($filter)->get()->getRowArray();
    }


    // Ambil semua data berdasarkan kolom yang dipilih dan lakukan filter
    public function getDataColumnWhereObj($table, $column, $filter)
    {
        return $this->getBuilder($table)->select($column)->where($filter)->get()->getResult();
    }

    public function getDataColumnWhereArray($table, $column, $filter)
    {
        return $this->getBuilder($table)->select($column)->where($filter)->get()->getResultArray();
    }

    public function getrOWDataColumnWhereArray($table, $column, $filter)
    {
        return $this->getBuilder($table)->select($column)->where($filter)->get()->getRowArray();
    }



    // Ambil semua data dengan pengurutan
    public function getDataOrderByObj($table, $order_by)
    {
        return $this->getBuilder($table)->orderBy($order_by)->get()->getResult();
    }

    public function getDataOrderByArray($table, $order_by)
    {
        return $this->getBuilder($table)->orderBy($order_by)->get()->getResultArray();
    }

    public function getDataOrderByWhereArray($table, $filter, $order_by)
    {
        return $this->getBuilder($table)->where($filter)->orderBy($order_by)->get()->getResultArray();
    }



    // Ambil data spesifik
    public function getRowDataArray($table, $filter)
    {
        return $this->getBuilder($table)->where($filter)->get()->getRowArray();
    }




    #############################################################
    // INSERT DATA =================

    public function insertData($table, $data)
    {
        return $this->getBuilder($table)->ignore(false)->insert($data);
    }

    public function insertDataBatch($table, $data)
    {
        return $this->getBuilder($table)->ignore(false)->insertBatch($data);
    }





    #############################################################
    // UPDATE DATA =================

    public function updateDataFilter($table, $column_filter, $filter_value, $data)
    {
        return $this->getBuilder($table)->where($column_filter, $filter_value)->update($data);
    }

    public function updateData($table, $data, $filter)
    {
        return $this->getBuilder($table)->update($data, $filter);
    }

    public function updateDataBatch($table, $data)
    {
        return $this->getBuilder($table)->updateBatch($data);
    }





    #############################################################
    // DELETE DATA =================

    public function deleteData($table, $filter)
    {
        return $this->getBuilder($table)->delete($filter);
    }





    #############################################################
    // PaymentGateway =================
    public function cektransaksi($table, $trxid) {
        $query = $this->db->table($table)->where('ID_TRANSAKSI', $trxid)->get();
        return $query->getResultArray();
    }

    public function changetrxstatus($table, $trxid, $jstatus, $signature) {
        $builder = $this->db->table($table);
        $builder->set('STATUS_PEMBAYARAN', $jstatus);
        $builder->set('BUKTI_PEMBAYARAN', $signature);
        $builder->where('ID_TRANSAKSI', $trxid);
        return $builder->update();
    }


    public function paygatelogadd($type, $mode, $trxid, $status, $time, $data) {
        $builder = $this->db->table('paygatelog');
        $data = [
            'type' => $type,
            'mode' => $mode,
            'ID_TRANSAKSI' => $trxid,
            'status' => $status,
            'time' => $time,
            'data' => $data
        ];
        return $builder->insert($data);
    }
}
