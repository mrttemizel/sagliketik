@extends('backend.components.master')
@section('title') Dashboard  @endsection
@section('content')
    @component('backend.components.breadcrumb')
        @slot('li_1') Admin @endslot
        @slot('title') Dashboard  @endslot
    @endcomponent
@endsection
@section('addjs')
    <!-- App js -->
    <script src="{{asset('backend/assets/js/app.js')}}"></script>
@endsection
