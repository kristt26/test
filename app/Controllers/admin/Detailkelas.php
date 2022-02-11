<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\DetailkelasModel;
use App\Models\KelasModel;
use App\Models\SiswaModel;
use App\Models\ProgramKursusModel;


class Detailkelas extends BaseController
{
    function __construct()
    {
        $this->detailkelas = new DetailkelasModel();
        $this->siswa = new SiswaModel();
        $this->kelas = new KelasModel();
        $this->programkursus = new ProgramKursusModel();
        session()->set(['active' => 'detailkelas']);
        helper('form');
    }
    public function index()
    {
        $data =[
            'detailkelas' => $this->detailkelas->getDetail(),
        ];
        // dd($data);
        return view('detailkelas/get',$data);
    }
    
    

    public function updatestatus(){
        $data = $this->request->getGet();
        // dd($data);
        $this->detailkelas->update($data['id'],['status'=>$data['status']]);
        
        return redirect()->to(base_url('admin/detailkelas'))->with('success', 'Status Peserta Kursus Berhasil Di Ubah');
    }


    public function updateaktif($id)
    {
        # code...
    $ceknis = $this->request->getVar('nislama');
    $id_siswa = $this->request->getVar('idsiswa');
    // dd($ceknis);
    if($ceknis == null){
        return redirect()->to(base_url('/admin/detailkelas/nis/' . $id_siswa));
    }else{
        $ceknis;
    }
    
    $this->siswa->save([
        'id_siswa' => $this->request->getVar('idsiswa'),
        // 'nis' => 123456789,
        'nis' => $ceknis ,
    ]);
    $datas = [
        'status' => 'Aktif',
    ];
    $detail = $this->detailkelas->where('id', $id); 
    $this->detailkelas->update($detail->id, $datas);
    return redirect()->to(base_url('admin/detailkelas'))->with('success', 'Status Peserta Kursus Berhasil Di Ubah');

    }
    public function nis($id_siswa)
    {
        # code...
       
        $data = [
            'validation' => \Config\Services::validation(),
            'idsiswa' => $this->siswa->detail($id_siswa),
            'siswa' => $this->siswa->detail(),
        ];
        // dd($data['id_siswa']);
        return view('detailkelas/tambahnis', $data);
    }

    public function savenis($id_siswa)
    {
        if (!$this->validate([
            'nis' => [
               'rules'	=> 'required|is_unique[tb_siswa.nis]|numeric|max_length[4]|min_length[4]',
               'errors'	=> [
                   'required'	=> 'Tidak Boleh Kosong',
                   'is_unique'	=> 'Nis Sudah Ada',
                   'numeric' => 'NIS Harus Berupa Angka',
                   'max_length' => 'NIS Harus Berisi 4 Angka',
                   'min_length' => 'NIS Harus Berisi 4 Angka',
                   
               ]
           ],
       ])) {
           session()->setFlashdata('pesan', 'Error, Data Gagal Disimpan');
            return redirect()->back()->withInput();
        }
        $this->siswa->save([
            'id_siswa' => $id_siswa,
            'nis'=> $this->request->getVar('nis')
        ]);
        session()->setFlashdata('pesan', 'Success, NIS Berhasil Di Tambah');
        return redirect()->to('admin/detailkelas');

    }

    public function detail($id_siswa){
        
        $data['detailkelas'] = $this->detailkelas->detail($id_siswa);
        // dd($data['detailkelas']['nm_siswa']);
        return view('admin/detailkelas/detail',$data);

    }
   
        
}