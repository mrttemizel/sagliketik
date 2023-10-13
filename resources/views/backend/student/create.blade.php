@extends('backend.components.master')
@section('title')
    Başvuru Yap
@endsection
@section('css')
    <link href="{{asset('backend/assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    @component('backend.components.breadcrumb')
        @slot('li_1')
            Başvurular
        @endslot
        @slot('title')
            Başvuru Yap
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            @if (session()->get('success'))
                <div class="alert alert-success alert-dismissible alert-solid alert-label-icon fade show"
                     role="alert">
                    <i class="ri-check-double-line label-icon"></i><strong>  {{ session()->get('success') }}</strong></strong>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                </div>
            @endif
            @if (session()->get('error'))
                <div class="alert alert-danger alert-dismissible alert-solid alert-label-icon fade show"
                     role="alert">
                    <i class="ri-check-double-line label-icon"></i><strong>  {{ session()->get('success') }}</strong></strong>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                </div>
            @endif
            <div class="card ">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Başvuru Yap</h4>
                    <a href="{{route('application.index')}}" class="btn btn-primary waves-effect waves-light d-flex justify-content-between"><i
                            class="ri-arrow-go-back-fill"></i> &nbsp; Geri Dön</a>

                </div><!-- end card header -->

                <form action="{{route('application.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row">
                                <div class="col-xl-12 col-md-12">
                                    <!-- Danger Alert -->
                                    <div class="alert alert-danger alert-dismissible border-2 bg-body-secondary fade show" role="alert">
                                        <strong>ÖNEMLİ</strong> - Başvuruyu tamamla dedikten sonra, yüklemiş olduğunuz dosyalarda düzenleme <b>yapılamamaktadır!</b>
                                    </div>
                                    <!-- end card -->
                                </div>
                                <div class="col-xl-12 col-md-12 mt-1 ">
                                    <div>
                                        <label for="formFile" class="form-label">Başvuru Dosyası Kontrol Listesi <span class="text-danger"> Yükleyebilceğiniz dosya tipleri <b>"pdf,xlsx,docx,doc"</b>.</span></label>
                                        <input class="form-control"  type="file" name="basvuru_dosya_kontrol_listesi">
                                        <span class="text-danger">
                                    @error('basvuru_dosya_kontrol_listesi')
                                            {{ $message }}
                                            @enderror
                            </span>
                                    </div>
                                    <!-- end card -->
                                </div>
                                <div class="col-xl-12 col-md-12 mt-4">
                                    <div>
                                        <label for="formFile" class="form-label">Başvuru Dilekçesi <span class="text-danger"> Yükleyebilceğiniz dosya tipleri <b>"pdf,xlsx,docx,doc"</b>.</span></label>
                                        <input class="form-control"  type="file" name="basvuru_dilekcesi">
                                        <span class="text-danger">
                                    @error('basvuru_dilekcesi')
                                            {{ $message }}
                                            @enderror
                            </span>
                                    </div>
                                    <!-- end card -->
                                </div>
                                <div class="col-xl-12 col-md-12 mt-4">
                                    <div>
                                        <label for="formFile" class="form-label">Etik Kurul Başvuru Formu <span class="text-danger"> Yükleyebilceğiniz dosya tipleri <b>"pdf,xlsx,docx,doc"</b>.</span></label>
                                        <input class="form-control"  type="file" name="etik_kurul_basvuru_formu">
                                        <span class="text-danger">
                                    @error('etik_kurul_basvuru_formu')
                                            {{ $message }}
                                            @enderror
                            </span>
                                    </div>
                                    <!-- end card -->
                                </div>
                                <div class="col-xl-12 col-md-12 mt-4">
                                    <div>
                                        <label for="formFile" class="form-label">Bilgilendirilmiş Gönüllü Onam Formu <span class="text-danger"> Yükleyebilceğiniz dosya tipleri <b>"pdf,xlsx,docx,doc"</b>.</span></label>
                                        <input class="form-control"  type="file" name="bilgilendirilmis_gonullu_onam_formu">
                                        <span class="text-danger">
                                    @error('bilgilendirilmis_gonullu_onam_formu')
                                            {{ $message }}
                                            @enderror
                            </span>
                                    </div>
                                    <!-- end card -->
                                </div>
                                <div class="col-xl-12 col-md-12 mt-4">
                                    <div>
                                        <label for="formFile" class="form-label">Çoçuk Hasta Onam Formu<span class="text-danger"> Yükleyebilceğiniz dosya tipleri <b>"pdf,xlsx,docx,doc"</b>.</span></label>
                                        <input class="form-control"  type="file" name="cocuk_hasta_onam_formu">
                                        <span class="text-danger">
                                    @error('cocuk_hasta_onam_formu')
                                            {{ $message }}
                                            @enderror
                            </span>
                                    </div>
                                    <!-- end card -->
                                </div>
                                <div class="col-xl-12 col-md-12 mt-4">
                                    <div>
                                        <label for="formFile" class="form-label">Ebeveyn Onam Formu<span class="text-danger"> Yükleyebilceğiniz dosya tipleri <b>"pdf,xlsx,docx,doc"</b>.</span></label>
                                        <input class="form-control"  type="file" name="ebeveyn_onam_formu">
                                        <span class="text-danger">
                                    @error('ebeveyn_onam_formu')
                                            {{ $message }}
                                            @enderror
                            </span>
                                    </div>
                                    <!-- end card -->
                                </div>
                                <div class="col-xl-12 col-md-12 mt-4">
                                    <div>
                                        <label for="formFile" class="form-label">Sağlıklı Çocuk Onam Formu<span class="text-danger"> Yükleyebilceğiniz dosya tipleri <b>"pdf,xlsx,docx,doc"</b>.</span></label>
                                        <input class="form-control"  type="file" name="saglikli_cocuk_onam_formu">
                                        <span class="text-danger">
                                    @error('saglikli_cocuk_onam_formu')
                                            {{ $message }}
                                            @enderror
                            </span>
                                    </div>
                                    <!-- end card -->
                                </div>
                                <div class="col-xl-12 col-md-12 mt-4">
                                    <div>
                                        <label for="formFile" class="form-label">Bilgilendirilmiş, Gönüllü Görüntü ve Ses Kayıtları Kullanımı İzin Formu<span class="text-danger"> Yükleyebilceğiniz dosya tipleri <b>"pdf,xlsx,docx,doc"</b>.</span></label>
                                        <input class="form-control"  type="file" name="bilgilendirilmis_gonullu_goruntu_ve_ses">
                                        <span class="text-danger">
                                    @error('bilgilendirilmis_gonullu_goruntu_ve_ses')
                                            {{ $message }}
                                            @enderror
                            </span>
                                    </div>
                                    <!-- end card -->
                                </div>
                                <div class="col-xl-12 col-md-12 mt-4">
                                    <div>
                                        <label for="formFile" class="form-label">Özgeçmiş<span class="text-danger"> Yükleyebilceğiniz dosya tipleri <b>"pdf,xlsx,docx,doc"</b>.</span></label>
                                        <input class="form-control"  type="file" name="ozgecmis">
                                        <span class="text-danger">
                                    @error('ozgecmis')
                                            {{ $message }}
                                            @enderror
                            </span>
                                    </div>
                                    <!-- end card -->
                                </div>
                                <div class="col-xl-12 col-md-12 mt-4">
                                    <div>
                                        <label for="formFile" class="form-label">İlgili ABD Bilgilendirme Beyanı<span class="text-danger"> Yükleyebilceğiniz dosya tipleri <b>"pdf,xlsx,docx,doc"</b>.</span></label>
                                        <input class="form-control"  type="file" name="ilgili_abd_bilgilendirme_beyani">
                                        <span class="text-danger">
                                    @error('ilgili_abd_bilgilendirme_beyani')
                                            {{ $message }}
                                            @enderror
                            </span>
                                    </div>
                                    <!-- end card -->
                                </div>
                                <div class="col-xl-12 col-md-12 mt-4">
                                    <div>
                                        <label for="formFile" class="form-label">Covid - Genelgesi - Taahhütnamesi<span class="text-danger"> Yükleyebilceğiniz dosya tipleri <b>"pdf,xlsx,docx,doc"</b>.</span></label>
                                        <input class="form-control"  type="file" name="covid_genelgesi_taahhutnamesi">
                                        <span class="text-danger">
                                    @error('covid_genelgesi_taahhutnamesi')
                                            {{ $message }}
                                            @enderror
                            </span>
                                    </div>
                                    <!-- end card -->
                                </div>
                                <div class="col-xl-12 col-md-12 mt-4">
                                    <div>
                                        <label for="formFile" class="form-label">Biyolojik Materyal Transfer Formu<span class="text-danger"> Yükleyebilceğiniz dosya tipleri <b>"pdf,xlsx,docx,doc"</b>.</span></label>
                                        <input class="form-control"  type="file" name="biyolojik_meteryal_transfer_formu">
                                        <span class="text-danger">
                                    @error('biyolojik_meteryal_transfer_formu')
                                            {{ $message }}
                                            @enderror
                            </span>
                                    </div>
                                    <!-- end card -->
                                </div>
                                <div class="col-xl-12 col-md-12 mt-4">
                                    <div>
                                        <label for="formFile" class="form-label">Multidisipliner Araştırmalar Onay Formu<span class="text-danger"> Yükleyebilceğiniz dosya tipleri <b>"pdf,xlsx,docx,doc"</b>.</span></label>
                                        <input class="form-control"  type="file" name="multidisipliner_arastirma_onay_formu">
                                        <span class="text-danger">
                                    @error('multidisipliner_arastirma_onay_formu')
                                            {{ $message }}
                                            @enderror
                            </span>
                                    </div>
                                    <!-- end card -->
                                </div>
                                <div class="col-xl-12 col-md-12 mt-4">
                                    <div>
                                        <label for="formFile" class="form-label">ÜY-FR-1080 Değerlendirme Formu<span class="text-danger"> Yükleyebilceğiniz dosya tipleri <b>"pdf,xlsx,docx,doc"</b>.</span></label>
                                        <input class="form-control"  type="file" name="degerlendirme_formu">
                                        <span class="text-danger">
                                    @error('degerlendirme_formu')
                                            {{ $message }}
                                            @enderror
                            </span>
                                    </div>
                                    <!-- end card -->
                                </div>
                                <div class="col-xl-12 col-md-12 mt-4">
                                    <div>
                                        <label for="formFile" class="form-label">Ek-1 Yüklemek İstediğiniz Ek Dosya<span class="text-danger"> Yükleyebilceğiniz dosya tipleri <b>"pdf,xlsx,docx,doc"</b>.</span></label>
                                        <input class="form-control"  type="file" name="ek_1">
                                        <span class="text-danger">
                                    @error('ek_1')
                                            {{ $message }}
                                            @enderror
                            </span>
                                    </div>
                                    <!-- end card -->
                                </div>
                                <div class="col-xl-12 col-md-12 mt-4">
                                    <div>
                                        <label for="formFile" class="form-label">Ek-2 Yüklemek İstediğiniz Ek Dosya<span class="text-danger"> Yükleyebilceğiniz dosya tipleri <b>"pdf,xlsx,docx,doc"</b>.</span></label>
                                        <input class="form-control"  type="file" name="ek_2">
                                        <span class="text-danger">
                                    @error('ek_2')
                                            {{ $message }}
                                            @enderror
                            </span>
                                    </div>
                                    <!-- end card -->
                                </div>
                                <div class="col-xl-12 col-md-12 mt-4">
                                    <div>
                                        <label for="formFile" class="form-label">Ek-3 Yüklemek İstediğiniz Ek Dosya<span class="text-danger"> Yükleyebilceğiniz dosya tipleri <b>"pdf,xlsx,docx,doc"</b>.</span></label>
                                        <input class="form-control"  type="file" name="ek_3">
                                        <span class="text-danger">
                                    @error('ek_3')
                                            {{ $message }}
                                            @enderror
                            </span>
                                    </div>
                                    <!-- end card -->
                                </div>


                                <div class="col-lg-12 mt-4">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="submit" class="btn btn-primary" id="basvuru_yap">Başvuru Tamamla</button>
                                    </div>
                                </div>

                            </div>
                        </div><!-- end card body -->
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('addjs')
    <script>
        $(document).on('click', '#basvuru_yap', function () {
            $('#basvuru_yap').html('Başvuru Yapılıyor...');
            $('#basvuru_yap').addClass("disabled");
        });
    </script>
@endsection
