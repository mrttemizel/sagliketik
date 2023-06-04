@extends('backend.components.master')
@section('title')
    Kullanıcı Düzenle
@endsection
@section('css')
    <link href="{{asset('backend/assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('backend.components.breadcrumb')
        @slot('li_1')
           Kullanıcılar
        @endslot
        @slot('title')
            {{$data->name}} ' Düzenle
        @endslot
    @endcomponent

    <div class="row mt-5" >
        <div class="col-xxl-3">
            <div class="card mt-n5">
                <form action="{{route('users.image.update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <div class="card-body p-4">
                        <div class="text-center">
                            <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                                <img src="@if ($data->image != '') {{ asset('users/'.$data->image)  }}@else{{ asset('backend/my-image/no-image.svg') }} @endif"
                                     class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image">
                                <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                    <input id="profile-img-file-input" type="file" name="image" class="profile-img-file-input">
                                    <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                                    <span class="avatar-title rounded-circle bg-light text-body">
                                                        <i class="ri-camera-fill"></i>
                                                    </span>
                                    </label>
                                </div>
                            </div>
                            <h5 class="fs-16 mb-1">{{ $data->name }}</h5>
                            <p class="text-muted mb-0">     @if ($data->status == 2 )
                                    Super Admin
                                @elseif($data->status == 1 )
                                    Yönetici
                                @else
                                    Editor
                                @endif</p>
                        </div>
                    </div>
                    <div class="hstack gap-2 justify-content-center mb-2">
                            <span class="text-danger">
                                                @error('image')
                                {{ $message }}
                                @enderror
                                            </span>
                    </div>
                    <div class="hstack gap-2 justify-content-center mb-2">
                        <button type="submit" class="btn btn-primary">Güncelle</button>
                    </div>


                </form>
            </div>

        </div>
        <!--end col-->
        <div class="col-xxl-9">
            <div class="card mt-xxl-n5">
                <div class="card-header">
                    <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                                <i class="fas fa-home"></i> Profil İşlemleri
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#changePassword" role="tab">
                                <i class="far fa-user"></i> Şifre İşlemleri
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-4">
                    <div class="tab-content">
                        <div class="tab-pane active" id="personalDetails" role="tabpanel">
                            <form action="{{ route('users.information.update') }}" method="POST">

                                @csrf
                                <input type="hidden" name="id" value="{{ $data->id }}">
                                <div class="row">

                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="firstnameInput" class="form-label">Ad Soyad : <span
                                                    class="text-danger">*</span></label></label>
                                            <input type="text" class="form-control" name="name" placeholder="Ad Soyad" value="{{$data->name}}">
                                            <span class="text-danger">
                                                    @error('name')
                                                {{ $message }}
                                                @enderror
                                                </span>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="phonenumberInput" class="form-label">Telefon Numarası :</label>
                                            <input type="text" class="form-control" name="phone" placeholder="Telefon Numarası" value="{{$data->phone}}">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="emailInput" class="form-label">E-Posta Adresi : <span
                                                    class="text-danger">*</span></label></label>
                                            <input type="email" class="form-control" name="email" placeholder="E-Posta Adresi" value="{{$data->email}}">
                                            <span class="text-danger">
                                                    @error('password')
                                                {{ $email }}
                                                @enderror
                                                </span>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-md-12">
                                        <div>
                                            <label for="labelInput" class="form-label">Kullanıcı Rolü <span class="text-danger">*</span></label>
                                            <select class="form-select" name="status"  aria-label="Default select example">
                                                <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>
                                                    Yönetici</option>
                                                <option value="0"{{ $data->status == 0 ? 'selected' : '' }}>
                                                    Editör</option>
                                            </select>
                                            <span class="text-danger">
                                    @error('status')
                                                {{ $message }}
                                                @enderror
                                    </span>
                                        </div>
                                    </div>

                                    <!--end col-->
                                    <div class="col-lg-12 mt-3">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="submit" class="btn btn-primary">Güncelle</button>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                        <!--end tab-pane-->
                        <div class="tab-pane" id="changePassword" role="tabpanel">
                            <form action="{{route('users.password.update')}}" method="POST"
                                  id="changeUserPasswordForm">
                                @csrf
                                <input type="hidden" name="id" value="{{ $data->id }}">
                                <div class="row g-2">
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="oldpasswordInput" class="form-label">Kullanılan Şifre <span
                                                    class="text-danger">*</span></label>
                                            <input type="password" class="form-control" name="current_password"
                                                   id="oldpassword">
                                            <span class="text-danger error_text  current_password_error"></span>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="newpasswordInput" class="form-label">Yeni Şifre <span
                                                    class="text-danger">*</span></label>
                                            <input type="password" class="form-control" name="password" id="password">

                                        </div>
                                        <span class="text-danger error_text  password_error"></span>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="confirmpasswordInput" class="form-label">Yeni Şifre Tekrar <span
                                                    class="text-danger">*</span></label>
                                            <input type="password" class="form-control" name="password_confirmation"
                                                   id="password_confirmation">
                                            <span class="text-danger  error_text  password_confirmation_error"></span>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary">Güncelle</button>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                        <!--end tab-pane-->
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>



@endsection


@section('addjs')
    <script src="{{ asset('backend/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pages/sweetalerts.init.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pages/profile-setting.init.js') }}"></script>

    <script>

        $(document).ready(function() {

            $('#changeUserPasswordForm').on('submit', function(e) {
                e.preventDefault();
                var form = this;
                $.ajax({
                    url: $(form).attr('action'),
                    method: $(form).attr('method'),
                    data: new FormData(form),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {
                        $(form).find('span.error-text').text('');
                    },
                    success: function(data) {
                        if (data.code === 0) {
                            $.each(data.error, function(prefix, val) {
                                $(form).find('span.' + prefix + '_error').text(val[0]);
                            });
                        } else {
                            Swal.fire({
                                text: data.msg,
                                icon: 'success',
                                showCancelButton: true,
                                showConfirmButton: false,
                                cancelButtonColor: '#405189',
                                cancelButtonText: 'Kapat'
                            })
                            $(form).find('span.error_text').text('');
                            $(form).find('input:password').val('');
                        }
                    }
                });

            });

        });
    </script>

@endsection
