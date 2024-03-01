@extends('backend.components.master')
@section('title')
    Başvurular
@endsection
@section('css')
    <link href="{{asset('backend/assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />

    <!--datatable css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

@endsection
@section('content')
    @component('backend.components.breadcrumb')
        @slot('li_1')
            Başvurular
        @endslot
        @slot('title')
            {{Auth::user()->status == 3 ? 'Başvurularım' : 'Başvurular'}}
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
                                <h5 class="card-title mb-0"> Başvurularımı Listele</h5>


                                    <a href="{{ route('application.create') }}" class="btn btn-primary waves-effect waves-light d-flex justify-content-between"><i class="ri-add-box-line"></i> &nbsp; Yeni Başvuru Yap</a>



                            </div>
                            <div class="col-xl-12 col-md-12">
                                <!-- Danger Alert -->
                                <div class="alert alert-danger alert-dismissible border-2 bg-body-secondary fade show" role="alert">
                                    <strong>ÖNEMLİ</strong> - Başvuruyu durumu onaylanan başvurularda silme işlemini <b>yapılamamaktadır!</b>
                                </div>
                                <!-- end card -->
                            </div>
                            <div class="card-body">
                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">

                                <thead>
                                    <tr>
                                        <th>SR No.</th>
                                        <th>Başvuru No</th>
                                        <th>Başvuru Yapan Kişi</th>
                                        <th>Başvuru Tarihi</th>
                                        <th>Başvuru Durumu</th>
                                        <th>Başvuru Değerlendirme</th>
                                        <th>Başvuru Dosya Kontrol Listesi</th>
                                        <th>Başvuru Dilekcesi</th>
                                        <th>Etik Kurul Başvuru Formu</th>
                                        <th>Bilgilendirişmiş Gönüllü Onam Formu</th>
                                        <th>Çocuk Hasta Onam Formu</th>
                                        <th>Ebeveyn Onam Formu</th>
                                        <th>Sağlıklı Çocuk Onam Formu</th>
                                        <th>Bilgilendirilmiş Gönüllü Onam Formu</th>
                                        <th>Özgeçmiş</th>
                                        <th>Covid Genelgesi Taahütnamesi</th>
                                        <th>Biyolojik Meteryal Transfer Formu</th>
                                        <th>Multidisipliner Araşturma Onay Formu</th>
                                        <th>Taahutname</th>
                                        <th>Değerlendirme Formu</th>
                                        <th>EK-1</th>
                                        <th>EK-2</th>
                                        <th>EK-3</th>
                                        <th>Düzenle</th>
                                    </tr>
                                    </thead>
                                    <tbody
                                    @php $i = 0 @endphp
                                    @foreach($data as $datas)
                                        @php $i++ @endphp
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$datas->basvuru_id}}</td>
                                            <td>{{$datas->getUser->name}}</td>
                                            <td>{{$datas->created_at->format('d-m-Y')}}</td>
                                            @if ($datas->basvuru_durumu == 0 )
                                                <td><span class="badge border border-secondary text-secondary">İNCELEMEDE</span></td>
                                            @elseif($datas->basvuru_durumu == 1 )
                                                <td><span class="badge border border-success text-success">ONAYLANDI</span></td>
                                            @else
                                                <td><span class="badge border border-danger text-danger">REDDEDİLDİ</span></td>
                                            @endif
                                            <td>
                                                @if(empty($datas->degerlendirme))
                                                    Henüz Değerlendirme Yapılmamıştır.
                                                @else
                                                    {{$datas->degerlendirme}}
                                                @endif
                                            </td>
                                            <td>
                                                @if(empty($datas->basvuru_dosya_kontrol_listesi))
                                                    Belge Yüklenmemiş
                                                @else
                                                    <a href="{{ asset('etik/'.$datas->basvuru_dosya_kontrol_listesi) }}" target="_blank" class="btn btn-success btn-sm">İNDİR</a>
                                                @endif
                                            </td>
                                            <td>
                                                @if(empty($datas->basvuru_dilekcesi))
                                                    Belge Yüklenmemiş
                                                @else
                                                    <a href="{{ asset('etik/'.$datas->basvuru_dilekcesi) }}" target="_blank" class="btn btn-success btn-sm">İNDİR</a>
                                                @endif
                                            </td>
                                            <td>
                                                @if(empty($datas->etik_kurul_basvuru_formu))
                                                    Belge Yüklenmemiş
                                                @else
                                                    <a href="{{ asset('etik/'.$datas->etik_kurul_basvuru_formu) }}" target="_blank" class="btn btn-success btn-sm">İNDİR</a>
                                                @endif
                                            </td>
                                            <td>
                                                @if(empty($datas->bilgilendirilmis_gonullu_onam_formu))
                                                    Belge Yüklenmemiş
                                                @else
                                                    <a href="{{ asset('etik/'.$datas->bilgilendirilmis_gonullu_onam_formu) }}" target="_blank" class="btn btn-success btn-sm">İNDİR</a>
                                                @endif
                                            </td>
                                            <td>
                                                @if(empty($datas->cocuk_hasta_onam_formu))
                                                    Belge Yüklenmemiş
                                                @else
                                                    <a href="{{ asset('etik/'.$datas->cocuk_hasta_onam_formu) }}" target="_blank" class="btn btn-success btn-sm">İNDİR</a>
                                                @endif
                                            </td>
                                            <td>
                                                @if(empty($datas->ebeveyn_onam_formu))
                                                    Belge Yüklenmemiş
                                                @else
                                                    <a href="{{ asset('etik/'.$datas->ebeveyn_onam_formu) }}" target="_blank" class="btn btn-success btn-sm">İNDİR</a>
                                                @endif
                                            </td>
                                            <td>
                                                @if(empty($datas->saglikli_cocuk_onam_formu))
                                                    Belge Yüklenmemiş
                                                @else
                                                    <a href="{{ asset('etik/'.$datas->saglikli_cocuk_onam_formu) }}" target="_blank" class="btn btn-success btn-sm">İNDİR</a>
                                                @endif
                                            </td>
                                            <td>
                                                @if(empty($datas->bilgilendirilmis_gonullu_goruntu_ve_ses))
                                                    Belge Yüklenmemiş
                                                @else
                                                    <a href="{{ asset('etik/'.$datas->bilgilendirilmis_gonullu_goruntu_ve_ses) }}" target="_blank" class="btn btn-success btn-sm">İNDİR</a>
                                                @endif
                                            </td>
                                            <td>
                                                @if(empty($datas->ozgecmis))
                                                    Belge Yüklenmemiş
                                                @else
                                                    <a href="{{ asset('etik/'.$datas->ozgecmis) }}" target="_blank" class="btn btn-success btn-sm">İNDİR</a>
                                                @endif
                                            </td>

                                            <td>
                                                @if(empty($datas->covid_genelgesi_taahhutnamesi))
                                                    Belge Yüklenmemiş
                                                @else
                                                    <a href="{{ asset('etik/'.$datas->covid_genelgesi_taahhutnamesi) }}" target="_blank" class="btn btn-success btn-sm">İNDİR</a>
                                                @endif
                                            </td>
                                            <td>
                                                @if(empty($datas->biyolojik_meteryal_transfer_formu))
                                                    Belge Yüklenmemiş
                                                @else
                                                    <a href="{{ asset('etik/'.$datas->biyolojik_meteryal_transfer_formu) }}" target="_blank" class="btn btn-success btn-sm">İNDİR</a>
                                                @endif
                                            </td>
                                            <td>
                                                @if(empty($datas->multidisipliner_arastirma_onay_formu))
                                                    Belge Yüklenmemiş
                                                @else
                                                    <a href="{{ asset('etik/'.$datas->multidisipliner_arastirma_onay_formu) }}" target="_blank" class="btn btn-success btn-sm">İNDİR</a>
                                                @endif
                                            </td>
                                            <td>
                                                @if(empty($datas->taahutname))
                                                    Belge Yüklenmemiş
                                                @else
                                                    <a href="{{ asset('etik/'.$datas->taahutname) }}" target="_blank" class="btn btn-success btn-sm">İNDİR</a>
                                                @endif
                                            </td>
                                            <td>
                                                @if(empty($datas->degerlendirme_formu))
                                                    Belge Yüklenmemiş
                                                @else
                                                    <a href="{{ asset('etik/'.$datas->degerlendirme_formu) }}" target="_blank" class="btn btn-success btn-sm">İNDİR</a>
                                                @endif
                                            </td>
                                            <td>
                                                @if(empty($datas->ek_1))
                                                    Belge Yüklenmemiş
                                                @else
                                                    <a href="{{ asset('etik/'.$datas->ek_1) }}" target="_blank" class="btn btn-success btn-sm">İNDİR</a>
                                                @endif
                                            </td>
                                            <td>
                                                @if(empty($datas->ek_2))
                                                    Belge Yüklenmemiş
                                                @else
                                                    <a href="{{ asset('etik/'.$datas->ek_2) }}" target="_blank" class="btn btn-success btn-sm">İNDİR</a>
                                                @endif
                                            </td>
                                            <td>
                                                @if(empty($datas->ek_3))
                                                    Belge Yüklenmemiş
                                                @else
                                                    <a href="{{ asset('etik/'.$datas->ek_3) }}" target="_blank" class="btn btn-success btn-sm">İNDİR</a>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="hstack gap-3 fs-15">
                                                    <a href="javascript:void(0)"  data-url={{route('application.delete', ['id'=>$datas->id]) }} data-id={{ $datas->id }} class="link-danger" id="delete_application"><i class="ri-delete-bin-5-line"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach

                                        </tbody>
                                </table>
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
    <script src="{{asset('backend/assets/libs/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/datatable/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/datatable/dataTables.buttons.min.js')}}"></script>




    <script>
        $(document).on('click', '#delete_application', function () {
            var user_id = $(this).attr('data-id');
            const url = $(this).attr('data-url');
            Swal.fire({
                title: 'Emin misiniz?',
                text: "Bu başvuruyu silmek istediğinize emin misiniz?",
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

        $('#datatable').DataTable( {

            paging: true,
            scrollX: true,
            fixedHeader: {headerOffset: 45},

            "lengthMenu": [[1, 10, 25, 50, 100, -1], [1, 10, 25, 50, 100, "Hepsi"]],
            "iDisplayLength":25,
            "pagingType": "full_numbers",
            "language": {
                "sDecimal":        ",",
                "sEmptyTable":     "Tabloda herhangi bir veri mevcut değil",
                "sInfo":           "_TOTAL_ kayıttan _START_ - _END_ arasındaki kayıtlar gösteriliyor",
                "sInfoEmpty":      "Kayıt yok",
                "sInfoFiltered":   "(_MAX_ kayıt içerisinden bulunan)",
                "sInfoPostFix":    "",
                "sInfoThousands":  ".",
                "sLengthMenu":     "Sayfada _MENU_ kayıt göster",
                "sLoadingRecords": "Yükleniyor...",
                "sProcessing":     "İşleniyor...",
                "sSearch":         "Ara:",
                "sZeroRecords":    "Eşleşen kayıt bulunamadı",
                "oPaginate": {
                    "sFirst":    "İlk",
                    "sLast":     "Son",
                    "sNext":     "Sonraki",
                    "sPrevious": "Önceki"
                },
                "oAria": {
                    "sSortAscending":  ": artan sütun sıralamasını aktifleştir",
                    "sSortDescending": ": azalan sütun sıralamasını aktifleştir"
                }
            }
        });

    </script>

@endsection

