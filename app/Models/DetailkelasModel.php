<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailkelasModel extends Model
{
    protected $table            = 'tb_detailkelas';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_siswa','id_kelas','status'];

    public function getDetail()
    {
        $data = $this->db->query("SELECT
        `tb_program`.`program_kursus`,
        `tb_kelas`.`waktu`,
        `tb_kelas`.`jam_mulai`,
        `tb_kelas`.`jam_selesai`,
        `tb_siswa`.`nama_siswa`,
        `tb_detailkelas`.`id`,
        `tb_detailkelas`.`status`,
        `tb_detailkelas`.`id_siswa`,
        `tb_kelas`.`id_program`
      FROM
        `tb_detailkelas`
        RIGHT JOIN `tb_kelas` ON `tb_kelas`.`id` = `tb_detailkelas`.`id_kelas`
        RIGHT JOIN `tb_program` ON `tb_program`.`id_program` = `tb_kelas`.`id_program`
        INNER JOIN `tb_siswa` ON `tb_siswa`.`id_siswa` = `tb_detailkelas`.`id_siswa`")->getResultObject();
      return $data;
    }
    
    
    public function kursusSiswa($id_user)
    {
      return $this->db->query("SELECT
          `tb_detailkelas`.*,
          `tb_kelas`.`waktu`,
          `tb_kelas`.`jam_mulai`,
          `tb_kelas`.`jam_selesai`,
          `tb_kelas`.`id_instruktur`,
          `tb_kelas`.`id_program`,
          `tb_instruktur`.`nm_instruktur`,
          `tb_instruktur`.`alamat`,
          `tb_instruktur`.`nohp`,
          `tb_program`.`program_kursus`
        FROM
          `tb_detailkelas`
          LEFT JOIN `tb_kelas` ON `tb_detailkelas`.`id_kelas` = `tb_kelas`.`id`
          LEFT JOIN `tb_instruktur` ON `tb_kelas`.`id_instruktur` =
        `tb_instruktur`.`id_instruktur`
          LEFT JOIN `tb_program` ON `tb_kelas`.`id_program` = `tb_program`.`id_program`
          LEFT JOIN `tb_siswa` ON `tb_detailkelas`.`id_siswa` = `tb_siswa`.`id_siswa`
        WHERE tb_siswa.id_user = '$id_user'")->getResult();
    }
    
    public function kursusAbsen($id_user, $tanggal)
    {
      $absen =  $this->db->query("SELECT
          `tb_detailkelas`.*,
          `tb_kelas`.`waktu`,
          `tb_kelas`.`jam_mulai`,
          `tb_kelas`.`jam_selesai`,
          `tb_kelas`.`id_instruktur`,
          `tb_kelas`.`id_program`,
          `tb_instruktur`.`nm_instruktur`,
          `tb_instruktur`.`alamat`,
          `tb_instruktur`.`nohp`,
          `tb_program`.`program_kursus`
        FROM
          `tb_detailkelas`
          LEFT JOIN `tb_kelas` ON `tb_detailkelas`.`id_kelas` = `tb_kelas`.`id`
          LEFT JOIN `tb_instruktur` ON `tb_kelas`.`id_instruktur` =
        `tb_instruktur`.`id_instruktur`
          LEFT JOIN `tb_program` ON `tb_kelas`.`id_program` = `tb_program`.`id_program`
          LEFT JOIN `tb_siswa` ON `tb_detailkelas`.`id_siswa` = `tb_siswa`.`id_siswa`
        WHERE tb_siswa.id_user = '$id_user' AND tb_detailkelas.status='Aktif'")->getResult();
      foreach ($absen as $key => $value) {
        $value->presensi = $this->db->query("SELECT * FROM absen WHERE detail_id='$value->id' AND tanggal='$tanggal'")->getResult();
      }
      return $absen;
    }
    

    public function getAlumni(){
      $data = $this->db->query("SELECT
      `tb_siswa`.`nama_siswa`,
      `tb_siswa`.`jenis_kelamin`,
      `tb_siswa`.`alamat`,
      `tb_siswa`.`nohp`,
      `tb_detailkelas`.`id`,
      `tb_detailkelas`.`status`,
      `tb_siswa`.`tahun_masuk`
    FROM
      `tb_detailkelas`
      RIGHT JOIN `tb_siswa` ON `tb_siswa`.`id_siswa` = `tb_detailkelas`.`id_siswa` WHERE status='Lulus' ORDER BY id DESC")->getResult();
       return $data;
     }
   

   




}