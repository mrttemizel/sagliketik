<?php

namespace App\Http\Controllers\backend\application;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function index()
    {
            $data = Application::all()->where('user_id',Auth::user()->id);
            return view('backend.application.index',compact('data'));
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

        if (Auth::user()->status == 3)
        {
            if ($data->basvuru_durumu == 1){
                return back()->with('error', 'Onaylanan Projenizde Değişiklik Yapamazsınız!');
            }else{
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

    }

    public  function edit($id)
    {

    }



    public function create()
    {
        return view('backend.application.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'basvuru_dosya_kontrol_listesi' => 'file|mimes:pdf,xlsx,docx,doc|max:10240',
            'basvuru_dilekcesi' => 'file|mimes:pdf,xlsx,docx,doc|max:10240',
            'etik_kurul_basvuru_formu' => 'file|mimes:pdf,xlsx,docx,doc|max:10240',
            'bilgilendirilmis_gonullu_onam_formu' => 'file|mimes:pdf,xlsx,docx,doc|max:10240',
            'cocuk_hasta_onam_formu' => 'file|mimes:pdf,xlsx,docx,doc|max:10240',
            'ebeveyn_onam_formu' => 'file|mimes:pdf,xlsx,docx,doc|max:10240',
            'saglikli_cocuk_onam_formu' => 'file|mimes:pdf,xlsx,docx,doc|max:10240',
            'bilgilendirilmis_gonullu_goruntu_ve_ses' => 'file|mimes:pdf,xlsx,docx,doc|max:10240',
            'ozgecmis' => 'file|mimes:pdf,xlsx,docx,doc|max:10240',
            'ilgili_abd_bilgilendirme_beyani' => 'file|mimes:pdf,xlsx,docx,doc|max:10240',
            'covid_genelgesi_taahhutnamesi' => 'file|mimes:pdf,xlsx,docx,doc|max:10240',
            'biyolojik_meteryal_transfer_formu' => 'file|mimes:pdf,xlsx,docx,doc|max:10240',
            'multidisipliner_arastirma_onay_formu' => 'file|mimes:pdf,xlsx,docx,doc|max:10240',
            'degerlendirme_formu' => 'file|mimes:pdf,xlsx,docx,doc|max:10240',
            'ek_1' => 'file|mimes:pdf,xlsx,docx,doc|max:10240',
            'ek_2' => 'file|mimes:pdf,xlsx,docx,doc|max:10240',
            'ek_3' => 'file|mimes:pdf,xlsx,docx,doc|max:10240',

        ]);

        $data = new Application();
        $basvuru_id = IdGenerator::generate(['table' => 'applications', 'field' => 'basvuru_id', 'length' => 10, 'prefix' => 'BSV-']);
        $data->basvuru_id = $basvuru_id;
        $data->basvuru_durumu = 0;
        $data->user_id = Auth::user()->id;


        if ($request->hasFile('basvuru_dosya_kontrol_listesi')) {

            $basvuru_dosya_kontrol_listesi = $request->file('basvuru_dosya_kontrol_listesi');
            $basvuru_dosya_kontrol_listesi_name = Auth::user()->name . '-' . 'BDKL' . '-' . time() . '-' . uniqid() . '.' . $basvuru_dosya_kontrol_listesi->getClientOriginalExtension();
            $basvuru_dosya_kontrol_listesi->move('etik/', $basvuru_dosya_kontrol_listesi_name);
            $data->basvuru_dosya_kontrol_listesi = $basvuru_dosya_kontrol_listesi_name;

        }
        if ($request->hasFile('basvuru_dilekcesi')) {

            $basvuru_dilekcesi = $request->file('basvuru_dilekcesi');
            $basvuru_dilekcesi_name = Auth::user()->name . '-' . 'BD' . '-' . time() . '-' . uniqid() . '.' . $basvuru_dilekcesi->getClientOriginalExtension();
            $basvuru_dilekcesi->move('etik/', $basvuru_dilekcesi_name);
            $data->basvuru_dilekcesi = $basvuru_dilekcesi_name;
        }

        if ($request->hasFile('etik_kurul_basvuru_formu')) {

            $etik_kurul_basvuru_formu = $request->file('etik_kurul_basvuru_formu');
            $etik_kurul_basvuru_form_name = Auth::user()->name . '-' . 'EKBF' . '-' . time() . '-' . uniqid() . '.' . $etik_kurul_basvuru_formu->getClientOriginalExtension();
            $etik_kurul_basvuru_formu->move('etik/', $etik_kurul_basvuru_form_name);
            $data->etik_kurul_basvuru_formu = $etik_kurul_basvuru_form_name;
        }
        if ($request->hasFile('bilgilendirilmis_gonullu_onam_formu')) {

            $bilgilendirilmis_gonullu_onam_formu = $request->file('bilgilendirilmis_gonullu_onam_formu');
            $bilgilendirilmis_gonullu_onam_formu_name = Auth::user()->name . '-' . 'BGOF' . '-' . time() . '-' . uniqid() . '.' . $bilgilendirilmis_gonullu_onam_formu->getClientOriginalExtension();
            $bilgilendirilmis_gonullu_onam_formu->move('etik/', $bilgilendirilmis_gonullu_onam_formu_name);
            $data->bilgilendirilmis_gonullu_onam_formu = $bilgilendirilmis_gonullu_onam_formu_name;
        }
        if ($request->hasFile('cocuk_hasta_onam_formu')) {

            $cocuk_hasta_onam_formu = $request->file('cocuk_hasta_onam_formu');
            $cocuk_hasta_onam_formu_name = Auth::user()->name . '-' . 'CHOF' . '-' . time() . '-' . uniqid() . '.' . $cocuk_hasta_onam_formu->getClientOriginalExtension();
            $cocuk_hasta_onam_formu->move('etik/', $cocuk_hasta_onam_formu_name);
            $data->cocuk_hasta_onam_formu = $cocuk_hasta_onam_formu_name;
        }
        if ($request->hasFile('ebeveyn_onam_formu')) {

            $ebeveyn_onam_formu = $request->file('ebeveyn_onam_formu');
            $ebeveyn_onam_formu_name = Auth::user()->name . '-' . 'EOF' . '-' . time() . '-' . uniqid() . '.' . $ebeveyn_onam_formu->getClientOriginalExtension();
            $ebeveyn_onam_formu->move('etik/', $ebeveyn_onam_formu_name);
            $data->ebeveyn_onam_formu = $ebeveyn_onam_formu_name;
        }
        if ($request->hasFile('saglikli_cocuk_onam_formu')) {

            $saglikli_cocuk_onam_formu = $request->file('saglikli_cocuk_onam_formu');
            $saglikli_cocuk_onam_formu_name = Auth::user()->name . '-' . 'SCOF' . '-' . time() . '-' . uniqid() . '.' . $saglikli_cocuk_onam_formu->getClientOriginalExtension();
            $saglikli_cocuk_onam_formu->move('etik/', $saglikli_cocuk_onam_formu_name);
            $data->saglikli_cocuk_onam_formu = $saglikli_cocuk_onam_formu_name;
        }
        if ($request->hasFile('bilgilendirilmis_gonullu_goruntu_ve_ses')) {

            $bilgilendirilmis_gonullu_goruntu_ve_ses = $request->file('bilgilendirilmis_gonullu_goruntu_ve_ses');
            $bilgilendirilmis_gonullu_goruntu_ve_ses_name = Auth::user()->name . '-' . 'BGOF' . '-' . time() . '-' . uniqid() . '.' . $bilgilendirilmis_gonullu_goruntu_ve_ses->getClientOriginalExtension();
            $bilgilendirilmis_gonullu_goruntu_ve_ses->move('etik/', $bilgilendirilmis_gonullu_goruntu_ve_ses_name);
            $data->bilgilendirilmis_gonullu_goruntu_ve_ses = $bilgilendirilmis_gonullu_goruntu_ve_ses_name;
        }
        if ($request->hasFile('ozgecmis')) {

            $ozgecmis = $request->file('ozgecmis');
            $ozgecmis_name = Auth::user()->name . '-' . 'OZG' . '-' . time() . '-' . uniqid() . '.' . $ozgecmis->getClientOriginalExtension();
            $ozgecmis->move('etik/', $ozgecmis_name);
            $data->ozgecmis = $ozgecmis_name;
        }
        if ($request->hasFile('ilgili_abd_bilgilendirme_beyani')) {

            $ilgili_abd_bilgilendirme_beyani = $request->file('ilgili_abd_bilgilendirme_beyani');
            $ilgili_abd_bilgilendirme_beyani_name = Auth::user()->name . '-' . 'IABD' . '-' . time() . '-' . uniqid() . '.' . $ilgili_abd_bilgilendirme_beyani->getClientOriginalExtension();
            $ilgili_abd_bilgilendirme_beyani->move('etik/', $ilgili_abd_bilgilendirme_beyani_name);
            $data->ilgili_abd_bilgilendirme_beyani = $ilgili_abd_bilgilendirme_beyani_name;
        }
        if ($request->hasFile('covid_genelgesi_taahhutnamesi')) {

            $covid_genelgesi_taahhutnamesi = $request->file('covid_genelgesi_taahhutnamesi');
            $covid_genelgesi_taahhutnamesi_name = Auth::user()->name . '-' . 'CGT' . '-' . time() . '-' . uniqid() . '.' . $covid_genelgesi_taahhutnamesi->getClientOriginalExtension();
            $covid_genelgesi_taahhutnamesi->move('etik/', $covid_genelgesi_taahhutnamesi_name);
            $data->covid_genelgesi_taahhutnamesi = $covid_genelgesi_taahhutnamesi_name;
        }
        if ($request->hasFile('biyolojik_meteryal_transfer_formu')) {

            $biyolojik_meteryal_transfer_formu = $request->file('biyolojik_meteryal_transfer_formu');
            $biyolojik_meteryal_transfer_formu_name = Auth::user()->name . '-' . 'BMTF' . '-' . time() . '-' . uniqid() . '.' . $biyolojik_meteryal_transfer_formu->getClientOriginalExtension();
            $biyolojik_meteryal_transfer_formu->move('etik/', $biyolojik_meteryal_transfer_formu_name);
            $data->biyolojik_meteryal_transfer_formu = $biyolojik_meteryal_transfer_formu_name;
        }
        if ($request->hasFile('multidisipliner_arastirma_onay_formu')) {

            $multidisipliner_arastirma_onay_formu = $request->file('multidisipliner_arastirma_onay_formu');
            $multidisipliner_arastirma_onay_formu_name = Auth::user()->name . '-' . 'MAOF' . '-' . time() . '-' . uniqid() . '.' . $multidisipliner_arastirma_onay_formu->getClientOriginalExtension();
            $multidisipliner_arastirma_onay_formu->move('etik/', $multidisipliner_arastirma_onay_formu_name);
            $data->multidisipliner_arastirma_onay_formu = $multidisipliner_arastirma_onay_formu_name;
        }

        if ($request->hasFile('degerlendirme_formu')) {

            $degerlendirme_formu = $request->file('degerlendirme_formu');
            $degerlendirme_formu_name = Auth::user()->name . '-' . 'DF' . '-' . time() . '-' . uniqid() . '.' . $degerlendirme_formu->getClientOriginalExtension();
            $degerlendirme_formu->move('etik/', $degerlendirme_formu_name);
            $data->degerlendirme_formu = $degerlendirme_formu_name;
        }
        if ($request->hasFile('ek_1')) {

            $ek_1 = $request->file('ek_1');
            $ek_1_name = Auth::user()->name . '-' . 'EK1' . '-' . time() . '-' . uniqid() . '.' . $ek_1->getClientOriginalExtension();
            $ek_1->move('etik/', $ek_1_name);
            $data->ek_1 = $ek_1_name;
        }
        if ($request->hasFile('ek_2')) {

            $ek_2 = $request->file('ek_2');
            $ek_2_name = Auth::user()->name . '-' . 'EK2' . '-' . time() . '-' . uniqid() . '.' . $ek_2->getClientOriginalExtension();
            $ek_2->move('etik/', $ek_2_name);
            $data->ek_2 = $ek_2_name;
        }
        if ($request->hasFile('ek_3')) {

            $ek_3 = $request->file('ek_3');
            $ek_3_name = Auth::user()->name . '-' . 'EK3' . '-' . time() . '-' . uniqid() . '.' . $ek_3->getClientOriginalExtension();
            $ek_3->move('etik/', $ek_3_name);
            $data->ek_3 = $ek_3_name;
        }


        $query = $data->save();

        if (!$query) {
            return back()->with('error','Bir Hata Oluştu!');
        } else {
            return redirect()->route('application.index')->with('success','Başvurunuz Başarılı Bir Şekilde Kaydedildi!');
        }
    }
}
