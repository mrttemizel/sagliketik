@extends('backend.components.master')
@section('title')
   Başvuru Değerlendir
@endsection
@section('css')
    <link href="{{asset('backend/assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    @component('backend.components.breadcrumb')
        @slot('li_1')
            Başvuruyu Değerlendir
        @endslot
        @slot('title')
            Başvuru Değerlendir
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            @if (session()->get('success'))
                <div class="alert alert-success alert-dismissible alert-solid alert-label-icon fade show"
                     role="alert">
                    <i class="ri-check-double-line label-icon"></i><strong>  {{ session()->get('success') }}</strong>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                </div>
            @endif
            @if (session()->get('error'))
                <div class="alert alert-danger alert-dismissible alert-solid alert-label-icon fade show"
                     role="alert">
                    <i class="ri-check-double-line label-icon"></i><strong>  {{ session()->get('success') }}</strong>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                </div>
            @endif
            <div class="card ">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{$data->basvuru_id}} ' Numaralı Başvuru Değerlendir</h4>
                    <a href="{{route('student.index')}}" class="btn btn-primary waves-effect waves-light d-flex justify-content-between"><i
                            class="ri-arrow-go-back-fill"></i> &nbsp; Geri Dön</a>

                </div><!-- end card header -->


                    @csrf
                    <div class="card-body">
                        <div class="row  border-start-outset border-info">
                            <div class="col-lg-12 d-flex align-items-center justify-content-between">
                                <div>Başvuru No :</div>
                                <div>
                                    {{$data->basvuru_id}}
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5 border-start-outset border-info">
                            <div class="col-lg-12 d-flex align-items-center justify-content-between">
                                <div>Başvuru Yapan Kişi :</div>
                                <div>
                                    {{$data->getUser->name}}
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5 border-start-outset border-info">
                            <div class="col-lg-12 d-flex align-items-center justify-content-between">
                                <div>Başvuru Tarihi :</div>
                                <div>
                                    {{$data->created_at->format('d-m-Y')}}
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5 border-start-outset border-info">
                            <div class="col-lg-12 d-flex align-items-center justify-content-between">
                                <div>Başvuru Yapan E-Posta :</div>
                                <div>
                                    {{$data->getUser->email}}
                                   </div>
                               </div>
                           </div>
                        <div class="row mt-5 border-start-outset border-info">
                            <div class="col-lg-12 d-flex align-items-center justify-content-between">
                                <div>Başvuru Yapan Telefon :</div>
                                <div>
                                    {{$data->getUser->phone}}
                                </div>
                            </div>
                        </div>
                               <div class="row mt-5 border-start-outset border-info">
                                   <div class="col-lg-12 d-flex align-items-center justify-content-between">
                                           <div>Başvuru Dosyası Kontrol Listesi</div>
                                       <div>
                                           @if(empty($data->basvuru_dosya_kontrol_listesi))
                                               <i class="ri-spam-line align-middle me-2 bg-success p-3"></i>
                                           @else
                                           <a href="{{ asset('etik/'.$data->basvuru_dosya_kontrol_listesi) }}" target="_blank" class="list-group-item list-group-item-action active"><i class="ri-download-2-fill align-middle me-2 bg-success p-3"></i></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5 border-start-outset border-info">
                                <div class="col-lg-12 d-flex align-items-center justify-content-between">
                                    <div>Başvuru Dilekçesi</div>
                                    <div>
                                        @if(empty($data->basvuru_dilekcesi))
                                            <i class="ri-spam-line align-middle me-2 bg-danger p-3"></i>
                                        @else
                                            <a href="{{ asset('etik/'.$data->basvuru_dilekcesi) }}" target="_blank" class="list-group-item list-group-item-action active"><i class="ri-download-2-fill align-middle me-2 bg-success p-3"></i></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        <div class="row mt-5 border-start-outset border-info">
                            <div class="col-lg-12 d-flex align-items-center justify-content-between">
                                <div>Etik Kurul Başvuru Formu</div>
                                <div>
                                    @if(empty($data->etik_kurul_basvuru_formu))
                                        <i class="ri-spam-line align-middle me-2 bg-danger p-3"></i>
                                    @else
                                        <a href="{{ asset('etik/'.$data->etik_kurul_basvuru_formu) }}" target="_blank" class="list-group-item list-group-item-action active"><i class="ri-download-2-fill align-middle me-2 bg-success p-3"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5  border-start-outset border-info">
                            <div class="col-lg-12 d-flex align-items-center justify-content-between">
                                <div>Bilgilendirilmiş Gönüllü Onam Formu</div>
                                <div>
                                    @if(empty($data->bilgilendirilmis_gonullu_onam_formu))
                                        <i class="ri-spam-line align-middle me-2 bg-danger p-3"></i>
                                    @else
                                        <a href="{{ asset('etik/'.$data->bilgilendirilmis_gonullu_onam_formu) }}" target="_blank" class="list-group-item list-group-item-action active"><i class="ri-download-2-fill align-middle me-2 bg-success p-3"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5  border-start-outset border-info">
                            <div class="col-lg-12 d-flex align-items-center justify-content-between">
                                <div>Çoçuk Hasta Onam Formu</div>
                                <div>
                                    @if(empty($data->cocuk_hasta_onam_formu))
                                        <i class="ri-spam-line align-middle me-2 bg-danger p-3"></i>
                                    @else
                                        <a href="{{ asset('etik/'.$data->cocuk_hasta_onam_formu) }}" target="_blank" class="list-group-item list-group-item-action active"><i class="ri-download-2-fill align-middle me-2 bg-success p-3"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5  border-start-outset border-info">
                            <div class="col-lg-12 d-flex align-items-center justify-content-between">
                                <div>Ebeveyn Onam Formu</div>
                                <div>
                                    @if(empty($data->ebeveyn_onam_formu))
                                        <i class="ri-spam-line align-middle me-2 bg-danger p-3"></i>
                                    @else
                                        <a href="{{ asset('etik/'.$data->ebeveyn_onam_formu) }}" target="_blank" class="list-group-item list-group-item-action active"><i class="ri-download-2-fill align-middle me-2 bg-success p-3"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5  border-start-outset border-info">
                            <div class="col-lg-12 d-flex align-items-center justify-content-between">
                                <div>Sağlıklı Çocuk Onam Formu</div>
                                <div>
                                    @if(empty($data->saglikli_cocuk_onam_formu))
                                        <i class="ri-spam-line align-middle me-2 bg-danger p-3"></i>
                                    @else
                                        <a href="{{ asset('etik/'.$data->saglikli_cocuk_onam_formu) }}" target="_blank" class="list-group-item list-group-item-action active"><i class="ri-download-2-fill align-middle me-2 bg-success p-3"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5  border-start-outset border-info">
                            <div class="col-lg-12 d-flex align-items-center justify-content-between">
                                <div>Bilgilendirilmiş, Gönüllü Görüntü ve Ses Kayıtları Kullanımı İzin Formu</div>
                                <div>
                                    @if(empty($data->bilgilendirilmis_gonullu_goruntu_ve_ses))
                                        <i class="ri-spam-line align-middle me-2 bg-danger p-3"></i>
                                    @else
                                        <a href="{{ asset('etik/'.$data->bilgilendirilmis_gonullu_goruntu_ve_ses) }}" target="_blank" class="list-group-item list-group-item-action active"><i class="ri-download-2-fill align-middle me-2 bg-success p-3"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5  border-start-outset border-info">
                            <div class="col-lg-12 d-flex align-items-center justify-content-between">
                                <div>Özgeçmiş</div>
                                <div>
                                    @if(empty($data->ozgecmis))
                                        <i class="ri-spam-line align-middle me-2 bg-danger p-3"></i>
                                    @else
                                        <a href="{{ asset('etik/'.$data->ozgecmis) }}" target="_blank" class="list-group-item list-group-item-action active"><i class="ri-download-2-fill align-middle me-2 bg-success p-3"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                 
                        <div class="row mt-5  border-start-outset border-info">
                            <div class="col-lg-12 d-flex align-items-center justify-content-between">
                                <div>Covid - Genelgesi - Taahhütnamesi</div>
                                <div>
                                    @if(empty($data->covid_genelgesi_taahhutnamesi))
                                        <i class="ri-spam-line align-middle me-2 bg-danger p-3"></i>
                                    @else
                                        <a href="{{ asset('etik/'.$data->covid_genelgesi_taahhutnamesi) }}" target="_blank" class="list-group-item list-group-item-action active"><i class="ri-download-2-fill align-middle me-2 bg-success p-3"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5  border-start-outset border-info">
                            <div class="col-lg-12 d-flex align-items-center justify-content-between">
                                <div>Biyolojik Materyal Transfer Formu</div>
                                <div>
                                    @if(empty($data->biyolojik_meteryal_transfer_formu))
                                        <i class="ri-spam-line align-middle me-2 bg-danger p-3"></i>
                                    @else
                                        <a href="{{ asset('etik/'.$data->biyolojik_meteryal_transfer_formu) }}" target="_blank" class="list-group-item list-group-item-action active"><i class="ri-download-2-fill align-middle me-2 bg-success p-3"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5  border-start-outset border-info">
                            <div class="col-lg-12 d-flex align-items-center justify-content-between">
                                <div>Multidisipliner Araştırmalar Onay Formu</div>
                                <div>
                                    @if(empty($data->multidisipliner_arastirma_onay_formu))
                                        <i class="ri-spam-line align-middle me-2 bg-danger p-3"></i>
                                    @else
                                        <a href="{{ asset('etik/'.$data->multidisipliner_arastirma_onay_formu) }}" target="_blank" class="list-group-item list-group-item-action active"><i class="ri-download-2-fill align-middle me-2 bg-success p-3"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5  border-start-outset border-info">
                            <div class="col-lg-12 d-flex align-items-center justify-content-between">
                                <div>ÜY-FR-1080 Değerlendirme Formu</div>
                                <div>
                                    @if(empty($data->degerlendirme_formu))
                                        <i class="ri-spam-line align-middle me-2 bg-danger p-3"></i>
                                    @else
                                        <a href="{{ asset('etik/'.$data->degerlendirme_formu) }}" target="_blank" class="list-group-item list-group-item-action active"><i class="ri-download-2-fill align-middle me-2 bg-success p-3"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5  border-start-outset border-info">
                            <div class="col-lg-12 d-flex align-items-center justify-content-between">
                                <div>EK-1</div>
                                <div>
                                    @if(empty($data->ek_1))
                                        <i class="ri-spam-line align-middle me-2 bg-danger p-3"></i>
                                    @else
                                        <a href="{{ asset('etik/'.$data->ek_1) }}" target="_blank" class="list-group-item list-group-item-action active"><i class="ri-download-2-fill align-middle me-2 bg-success p-3"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5  border-start-outset border-info">
                            <div class="col-lg-12 d-flex align-items-center justify-content-between">
                                <div>EK-2</div>
                                <div>
                                    @if(empty($data->ek_2))
                                        <i class="ri-spam-line align-middle me-2 bg-danger p-3"></i>
                                    @else
                                        <a href="{{ asset('etik/'.$data->ek_2) }}" target="_blank" class="list-group-item list-group-item-action active"><i class="ri-download-2-fill align-middle me-2 bg-success p-3"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5  border-start-outset border-info">
                            <div class="col-lg-12 d-flex align-items-center justify-content-between">
                                <div>EK-3</div>
                                <div>
                                    @if(empty($data->ek_3))
                                        <i class="ri-spam-line align-middle me-2 bg-danger p-3"></i>
                                    @else
                                        <a href="{{ asset('etik/'.$data->ek_3) }}" target="_blank" class="list-group-item list-group-item-action active"><i class="ri-download-2-fill align-middle me-2 bg-success p-3"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>


            </div>
                <div class="card ">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Başvuruyu Değerlendir</h4>
                    </div><!-- end card header -->
                    <form action="{{route('student.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$data->id}}">
                        <div class="card-body">
                            <div class="live-preview">
                                <div class="row gy-3">

                                    <div class="col-xl-12 col-md-12">
                                        <div>
                                            <label for="labelInput" class="form-label">Proje Kabul Durumu <span class="text-danger"> *</span></label>
                                            <select class="form-select" name="basvuru_durumu"  aria-label="Default select example">
                                                <option selected disabled>Proje Kabul Durumu Seçiniz</option>
                                                <option value="1" {{ $data->basvuru_durumu == 1 ? 'selected' : '' }}>Onaylandı</option>
                                                <option value="2" {{ $data->basvuru_durumu == 2 ? 'selected' : '' }}>Reddedildi</option>
                                            </select>
                                            <span class="text-danger">
                                    @error('basvuru_durumu')
                                                {{ $message }}
                                                @enderror
                                    </span>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-md-12">
                                        <!-- Example Textarea -->
                                        <div>
                                            <label for="exampleFormControlTextarea5" class="form-label">Bilgilendirme E-Postası <span class="text-danger"> *</span></label>
                                            <textarea class="form-control" id="exampleFormControlTextarea5"  name="degerlendirme" rows="3">{{$data->degerlendirme}}</textarea>
                                            <span class="text-danger">
                                    @error('degerlendirme')
                                                {{ $message }}
                                                @enderror
                                    </span>
                                        </div>

                                    <div class="col-lg-12 mt-3">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="submit" class="btn btn-primary" id="degerlendirme_yap">Değerlendirme Gönder</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </form>
                </div>



        </div>
    </div>

@endsection

@section('addjs')
    <script>
        $(document).on('click', '#degerlendirme_yap', function () {
            $('#degerlendirme_yap').html('Değerlendirme Gönderiliyor...');
            $('#degerlendirme_yap').addClass("disabled");
        });
    </script>
@endsection
