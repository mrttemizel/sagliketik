<?php

namespace App\Http\Controllers\backend\student;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\DegerlendirmeMail;
use Illuminate\Support\Facades\Mail;

class StudentController extends Controller
{
    public function index()
    {
        $data = Application::all();
        return view('backend.student.index',compact('data'));
    }


    public function delete($id)
    {
        $data = Application::find($id);
        $path1 = public_path() . '/etik/' . $data->basvuru_dosya_kontrol_listesi;
        $path2 = public_path() . '/etik/' . $data->basvuru_dilekcesi;
        $path3 = public_path() . '/etik/' . $data->etik_kurul_basvuru_formu;
        $path4 = public_path() . '/etik/' . $data->bilgilendirilmis_gonullu_onam_formu;
        $path5 = public_path() . '/etik/' . $data->cocuk_hasta_onam_formu;
        $path6 = public_path() . '/etik/' . $data->ebeveyn_onam_formu;
        $path7 = public_path() . '/etik/' . $data->saglikli_cocuk_onam_formu;
        $path8 = public_path() . '/etik/' . $data->bilgilendirilmis_gonullu_goruntu_ve_ses;
        $path9 = public_path() . '/etik/' . $data->ozgecmis;
        $path10 = public_path() . '/etik/' . $data->ilgili_abd_bilgilendirme_beyani;
        $path11= public_path() . '/etik/' . $data->covid_genelgesi_taahhutnamesi;
        $path12 = public_path() . '/etik/' . $data->biyolojik_meteryal_transfer_formu;
        $path13 = public_path() . '/etik/' . $data->multidisipliner_arastirma_onay_formu;
        $path14 = public_path() . '/etik/' . $data->degerlendirme_formu;
        $path15 = public_path() . '/etik/' . $data->ek_1;
        $path16 = public_path() . '/etik/' . $data->ek_2;
        $path17 = public_path() . '/etik/' . $data->ek_3;

        if (Auth::user()->status == 0 ||Auth::user()->status == 3) {
            return back()->with('error', 'Başvuru silme yetkiniz bulunmamaktadır!');
        }
        else{
            if (\File::exists($path1,$path2,$path3,$path4,$path5,$path6,$path7,$path8,$path9,$path10,$path11,$path12,$path13,$path14,$path15,$path16,$path17)) {
                \File::delete($path1,$path2,$path3,$path4,$path5,$path6,$path7,$path8,$path9,$path10,$path11,$path12,$path13,$path14,$path15,$path16,$path17);
            }

            $query = $data->delete();
            if (!$query) {
                return back()->with('error', 'Başvuru silerken bir hata oluştu!');
            } else {
                return back()->with('success', 'Başvuru silme işlemi başarılı.');
            }
        }
    }


    public  function edit($id)
    {
        return view('backend.student.edit', [
            'data' => Application::where('id', $id)->first(),
        ]);
    }

    public function store(Request $request)
    {
        $notification_success = array(
            'message' => 'Güncelleme Başarılı',
            'alert-type' => 'success'
        );

        $notification_error = array(
            'message' => 'Güncelleme Başarısız',
            'alert-type' => 'error'
        );

        $data = Application::where('id', $request->id)->first();

        $data->basvuru_durumu = $request->input('basvuru_durumu');
        $data->degerlendirme = $request->input('degerlendirme');

        if ($request->input('basvuru_durumu') == 1){
             $degerlendirme_durumu = 'Projeniz Onaylanmıştır.';
             $status = 1;
            }
            else{
                $degerlendirme_durumu = 'Projeniz Reddedilmiştir.';
                $status = 2;
            }
        $mailData = [

          'title' => $degerlendirme_durumu,
          'subject' => $request->input('degerlendirme'),
            'status' => $status,
        ];

        Mail::to('mrttemizel@gmail.com')->send(new DegerlendirmeMail($mailData));
        $query = $data->update();

        if (!$query) {
            return back()->with($notification_error);
        } else {
            return redirect()->route('student.index')->with($notification_success);
        }
    }

}
