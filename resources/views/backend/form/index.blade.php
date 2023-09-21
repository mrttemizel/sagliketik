@extends('backend.components.master')
@section('title')
    Forms
@endsection
@section('css')
    <link href="{{asset('backend/assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />

    <!--datatable css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

@endsection
@section('content')
    @component('backend.components.breadcrumb')
        @slot('li_1')
            Formlar
        @endslot
        @slot('title')
            Form Listesi
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
                    <i class="ri-check-double-line label-icon"></i><strong>  {{ session()->get('error') }}</strong></strong>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                </div>
            @endif
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">Formlar</h5>

                            </div>
                            <div class="card-body">
                                <div class="list-group list-group-fill-success">
                                    <a href="{{asset('backend/site-forms/Başvuru Dosyası Kontrol Listesi.docx')}}" target="_blank" class="list-group-item list-group-item-action list-group-item-secondary"><i class="ri-download-2-fill align-middle me-2"></i>1 - Başvuru Dosyası Kontrol Listesi</a>
                                    <a href="{{asset('backend/site-forms/Başvuru Dilekçesi.DOCX')}}" target="_blank" class="list-group-item list-group-item-action list-group-item-warning "><i class="ri-download-2-fill align-middle me-2"></i>2 - Başvuru Dilekçesi</a>
                                    <a href="{{asset('backend/site-forms/Etik Kurul Başvuru Formu.docx')}}" target="_blank" class="list-group-item list-group-item-action list-group-item-secondary"><i class="ri-download-2-fill align-middle me-2"></i>3 - Etik Kurul Başvuru Formu</a>
                                    <a href="#" class="list-group-item list-group-item-action list-group-item-warning disabled "><i class="ri-menu-add-fill align-middle me-2"></i>4 - Bilgilendirilmiş Gönüllü Onam Formu</a>
                                    <a href="{{asset('backend/site-forms/Bilgilendirilmiş Gönüllü Onam Formu.docx')}}" target="_blank" class="list-group-item list-group-item-action ms-3 list-group-item-secondary"><i class="ri-download-2-fill align-middle me-2"></i>4.1 - Bilgilendirilmiş Gönüllü Onam Formu</a>
                                    <a href="{{asset('backend/site-forms/Çoçuk Hasta Onam Formu.DOCX')}}" target="_blank" class="list-group-item list-group-item-action ms-3 list-group-item-secondary"><i class="ri-download-2-fill align-middle me-2"></i>4.2 - Çoçuk Hasta Onam Formu</a>
                                    <a href="{{asset('backend/site-forms/Ebeveyn Onam Formu.DOCX')}}" target="_blank" class="list-group-item list-group-item-action ms-3 list-group-item-secondary"><i class="ri-download-2-fill align-middle me-2"></i>4.3 - Ebeveyn Onam Formu</a>
                                    <a href="{{asset('backend/site-forms/Sağlıklı Çocuk Onam Formu.DOCX')}}" target="_blank" class="list-group-item list-group-item-action ms-3 list-group-item-secondary"><i class="ri-download-2-fill align-middle me-2"></i>4.4 - Sağlıklı Çocuk Onam Formu</a>
                                    <a href="{{asset('backend/site-forms/Bilgilendirilmiş, Gönüllü Görüntü ve Ses Kayıtları Kullanımı İzin Formu.docx')}}" target="_blank" class="list-group-item list-group-item-action list-group-item-secondary ms-3"><i class="ri-download-2-fill align-middle me-2"></i>4.5 - Bilgilendirilmiş, Gönüllü Görüntü ve Ses Kayıtları Kullanımı İzin Formu</a>
                                    <a href="{{asset('backend/site-forms/Özgeçmiş.DOCX')}}" target="_blank" class="list-group-item list-group-item-action list-group-item-warning  "><i class="ri-download-2-fill align-middle me-2 "></i>5 - Özgeçmiş</a>
                                    <a href="{{asset('backend/site-forms/İlgili ABD Bilgilendirme Beyanı.docx')}}" target="_blank" class="list-group-item list-group-item-action list-group-item-secondary"><i class="ri-download-2-fill align-middle me-2"></i>6 - İlgili ABD Bilgilendirme Beyanı</a>
                                    <a href="{{asset('backend/site-forms/Covid-Genelgesi-Taahhütnamesi.DOCX')}}" target="_blank" class="list-group-item list-group-item-action list-group-item-warning "><i class="ri-download-2-fill align-middle me-2"></i>7 - Covid - Genelgesi Taahhütnamesi</a>
                                    <a href="{{asset('backend/site-forms/Biyolojik Materyal Transfer Formu.docx')}}" target="_blank" class="list-group-item list-group-item-action list-group-item-secondary"><i class="ri-download-2-fill align-middle me-2"></i>8 - Biyolojik Materyal Transfer Formu</a>
                                    <a href="{{asset('backend/site-forms/Multidisipliner Araştırmalar Onay Formu.DOCX')}}" target="_blank" class="list-group-item list-group-item-action list-group-item-warning"><i class="ri-download-2-fill align-middle me-2"></i>9 - Multidisipliner Araştırmalar Onay Formu</a>
                                    <a href="{{asset('backend/site-forms/ÜY-FR-1080 Değerlendirme Formu.DOCX')}}" target="_blank" class="list-group-item list-group-item-action list-group-item-secondary"><i class="ri-download-2-fill align-middle me-2"></i>10 - ÜY-FR-1080 Değerlendirme Formu</a>

                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
        </div>
    </div>

@endsection

@section('addjs')


    <script src="{{ asset('backend/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pages/sweetalerts.init.js') }}"></script>

    <!--datatable js-->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>


    <script src="{{asset('backend/assets/js/pages/datatables.init.js')}}"></script>

    <script>
        $(document).on('click', '#delete_user', function () {
            var user_id = $(this).attr('data-id');
            const url = $(this).attr('data-url');
            Swal.fire({
                title: 'Emin misiniz?',
                text: "Bu kullanıcıyı silmek istediğinize emin misiniz?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Evet, sil!',
                cancelButtonText: 'Vazgeç'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        });
    </script>

@endsection

