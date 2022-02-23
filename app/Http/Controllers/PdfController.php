<?php

namespace App\Http\Controllers;

use PDF;
use App\SuratKeluar;
use App\KerjaPraktek;
use App\Asisten;
use App\Custom;
use App\Dosen;
use App\Prodi;
use App\Skaktif;
use Illuminate\Http\Request;

class PdfController extends Controller
{

    public function cetak($id)
    {
        $sk = SuratKeluar::find($id);
        if ($sk->sk_kode == "KP") {
            $data = KerjaPraktek::where('id_sk', $sk->id)->first();
            $dosen = Dosen::find($sk->sk_penanggungjawab);
            $m = date_create($data->kp_mulai);
            $s = date_create($data->kp_selesai);
            $dif = date_diff($m, $s);
            if ($dif->format("%m") == 0) {
                $durasi = $dif->format("%d Hari");
            } else if ($dif->format("%m") > 0) {
                $durasi = $dif->format("%m Bulan, %d Hari");
            }
            $romawi = $this->rm(date("m"));
            $no = str_pad($data->kp_no, 3, "0", STR_PAD_LEFT);
            $detail = [
                'kp_kode' => $sk->sk_kode,
                'kp_tgl' => $sk->sk_tgl,
                'kp_penanggungjawab' => $dosen->dosen_nama,
                'kp_hal' => $data->kp_hal,
                'kp_kepada' => $sk->sk_kepada,
                'kp_perusahaan'  => $data->kp_perusahsaan,
                'kp_mahasiswa' => $data->kp_mahasiswa,
                'kp_nim' => $data->kp_nim,
                'kp_mulai' => $data->kp_mulai,
                'kp_selesai' => $data->kp_selesai,
                'kp_durasi' => $durasi,
                'kp_romawi' => $romawi,
                'kp_count'  => $no,
            ];
            $pdf = PDF::loadView('konten.pdf.kp', $detail);
            return $pdf->download($detail['kp_nim'] . '_surat.pdf');
        } elseif ($sk->sk_kode == "SKA") {
            $data = Asisten::where('id_sk', $sk->id)->first();
            $dosen = Dosen::find($sk->sk_penanggungjawab);
            $nidn = Dosen::where('dosen_nama', $sk->sk_kepada)->first();
            $prodi = Prodi::find($data->as_prodi);
            $romawi = $this->rm(date("m"));
            $detail = [
                'as_title' => $sk->sk_title,
                'as_no' => $data->as_no,
                'as_kode' => $sk->sk_kpj,
                'as_romawi' => $romawi,
                'as_nama' => $data->as_nama,
                'as_nim' => $data->as_nim,
                'as_prodi' => $prodi->prodi_nama,
                'as_makul' => $data->as_makul,
                'as_kelas' => $data->as_kelas,
                'as_kepada' => $sk->sk_kepada,
                'as_semester' => $data->as_semester,
                'as_tahun' => $data->as_tahun,
                'as_pj' => $dosen->dosen_nama,
                'as_nidn' => $nidn->dosen_nidn,
                'as_pj_nidn' => $dosen->dosen_nidn,
                'as_tgl' => $sk->sk_tgl,

            ];
            $pdf = PDF::loadView('konten.pdf.suratAsisten', $detail);
            return $pdf->download($detail['as_nim'] . '_surat_asisten.pdf');
        } elseif ($sk->sk_kode == "SKA-M") {
            $data = Skaktif::where('id_sk', $sk->id)->first();
            $dosen = Dosen::find($sk->sk_penanggungjawab);
            $nidn = Dosen::where('dosen_nama', $sk->sk_kepada)->first();
            $prodi = Prodi::find($data->m_prodi);
            $romawi = $this->rm(date("m"));
            $detail = [
                'm_no' => $data->m_no,
                'm_kode' => $sk->sk_kpj,
                'm_romawi' => $romawi,
                'm_mahasiswa' => $data->m_mahasiswa,
                'm_nim' => $data->m_nim,
                'm_prodi' => $prodi->prodi_nama,
                'm_alamat' => $data->m_alamat,
                'm_keperluan' => $data->m_keperluan,
                'm_tahun' => $data->m_tahun,
                'm_pj' => $dosen->dosen_nama,
                'm_tgl' => $sk->sk_tgl,

            ];
            $pdf = PDF::loadView('konten.pdf.suratMahasiswa', $detail);
            return $pdf->download($detail['m_nim'] . '_surat_aktif.pdf');
        } else {
            $data = Custom::where('id_sk', $sk->id)->first();
            $romawi = $this->rm(date("m"));
            $detail = [
                'c_no' => $data->c_no,
                'c_title' => $sk->sk_title,
                'c_kode' => $sk->sk_kode,
                'c_romawi' => $romawi,
                'c_kpj' => $sk->sk_pj,
                'c_isi' => $data->m_isi,

            ];
            $pdf = PDF::loadView('konten.pdf.suratCustom', $detail);
            return $pdf->download($detail['c_no'] . '_' . $detail['c_kode'] . '_surat.pdf');
        }
    }

    public function rm($data)
    {
        switch ($data) {
            case 1:
                $romawi = "I";
                break;
            case 2:
                $romawi = "II";
                break;
            case 3:
                $romawi = "III";
                break;
            case 4:
                $romawi = "IV";
                break;
            case 5:
                $romawi = "V";
                break;
            case 6:
                $romawi = "VI";
                break;
            case 7:
                $romawi = "VII";
                break;
            case 8:
                $romawi = "VIII";
                break;
            case 9:
                $romawi = "IX";
                break;
            case 10:
                $romawi = "X";
                break;
            case 11:
                $romawi = "XI";
                break;
            case 12:
                $romawi = "XII";
                break;
        }
        return $romawi;
    }
}
