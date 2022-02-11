<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{ 
    protected $table            = 'tb_kelas';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields = ['id_program','waktu','jam_mulai','jam_selesai','id_instruktur'];

  
    public function getAll(){
        $builder = $this->db->table('tb_kelas');
        $builder->join('tb_instruktur', 'tb_instruktur.id_instruktur = tb_kelas.id_instruktur');
        $builder->join('tb_program', 'tb_program.id_program = tb_kelas.id_program');
        $query = $builder->get();
        return $query->getResult();
    }
    public function getKelas($id)
    {
        $kelas = $this->db->query("SELECT
                `tb_kelas`.*,
                `tb_program`.`program_kursus`
            FROM
                `tb_kelas`
                LEFT JOIN `tb_program` ON `tb_program`.`id_program` = `tb_kelas`.`id_program`
                LEFT JOIN `tb_instruktur` ON `tb_kelas`.`id_instruktur` = `tb_instruktur`.`id_instruktur`
                LEFT JOIN `tb_user` ON `tb_instruktur`.`id_user` = `tb_user`.`id`
            WHERE `tb_user`.`id` = '$id'")->getResult();
        foreach ($kelas as $key => $value) {
            $value->siswa = $this->db->query("SELECT
                    `absen`.`id`,
                    `tb_detailkelas`.`id` AS `detail_id`,
                    `absen`.`tanggal`,
                    `absen`.`keterangan`,
                    `tb_siswa`.`nama_siswa`,
                    `tb_detailkelas`.`id_kelas`,
                    `tb_detailkelas`.`id_siswa`
                FROM
                    `tb_detailkelas`
                    LEFT JOIN `absen` ON `absen`.`detail_id` = `tb_detailkelas`.`id`
                    LEFT JOIN `tb_siswa` ON `tb_detailkelas`.`id_siswa` = `tb_siswa`.`id_siswa`
                WHERE `tb_detailkelas`.`id_kelas`='$value->id'")->getResult();
        }
        return $kelas;
    }

    public function by_instruktur()
    {
        $id = session()->get('uid');
        $data = $this->db->query("SELECT
            `tb_kelas`.*,
            `tb_program`.`program_kursus`
        FROM
            `tb_kelas`
            LEFT JOIN `tb_instruktur` ON `tb_kelas`.`id_instruktur` =
        `tb_instruktur`.`id_instruktur`
            LEFT JOIN `tb_user` ON `tb_instruktur`.`id_user` = `tb_user`.`id`
            LEFT JOIN `tb_program` ON `tb_program`.`id_program` = `tb_kelas`.`id_program`
        WHERE `tb_user`.`id` = '$id'")->getResult();
        return $data;
    }

    public function kelas_by_id($id)
    {
        return $this->db->query("SELECT
            `tb_kelas`.*,
            `tb_program`.`program_kursus`
        FROM
            `tb_kelas`
            LEFT JOIN `tb_program` ON `tb_kelas`.`id_program` = `tb_program`.`id_program` WHERE `tb_kelas`.`id`='$id'")->getRow();
    }
    
}