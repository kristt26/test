<?php

namespace App\Controllers\Instruktur;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use TCPDF;

class Laporan extends BaseController
{
    use ResponseTrait;
    public function __construct() {
        $this->siswa = new \App\Models\SiswaModel();
        $this->detail = new \App\Models\DetailkelasModel();
        $this->absen = new \App\Models\AbsenModel();
        $this->kelas = new \App\Models\KelasModel();
        $this->db =  \Config\Database::connect();
        $this->decode =  new \App\Libraries\Decode();
    }

    public function index()
    {
        $data['data'] = $this->kelas->by_instruktur();
        return view('instruktur/absen', $data);
    }

    public function download($id)
    {
        $siswa = $this->detail->get_daftar($id);
        $tanggal = $this->absen->get_tanggal($id);
        
        foreach ($siswa as $key => $value) {
            $value->absen = array();
            foreach ($tanggal as $key1 => $value1) {
                $date=date_create($value1->tanggal);
                $value1->hari = $this->decode->hari_ini(date_format($date,"D"));
                $item = [
                    'tanggal' => $value1->tanggal,
                    'status' => $this->absen->where('detail_id', $value->id)->where('tanggal', $value1->tanggal)->first()->keterangan
                ];
                array_push($value->absen, $item);
            }
        }
        
        $data['tanggal']=$tanggal;
        $data['kelas']=$this->kelas->kelas_by_id($id);
        $pdf = new TCPDF('L', PDF_UNIT, 'A5', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('OCS');
		$pdf->SetTitle('Rekapitulasi');
		$pdf->SetSubject('Rekapitulasi');
        
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
        $pdf->SetDisplayMode('fullpage', 'SinglePage', 'UseNone');
        $num = count($siswa)/10;
        $num = (int)$num==0 ? 1 : $num;
        $start=0;
        for ($i=1; $i <= $num; $i++) { 
            $data['key']=$i;
            $data['siswa']=array_slice($siswa, $start, ($i*10)-1);
            // dd($data);
            $html = view('instruktur/download', $data);
            $pdf->AddPage('L', 'A4');
            $pdf->writeHTML($html, true, false, true, false, '');
            // $pdf->Cell(0, 0, 'A4 LANDSCAPE', 1, 1, 'C');
            $start+9;
            
        }
        
        $this->response->setContentType('application/pdf');
        $pdf->Output(date('dmyhis').'.pdf', 'i');
    }
}
