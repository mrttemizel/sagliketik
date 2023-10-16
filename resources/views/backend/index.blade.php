@extends('backend.components.master')
@section('title') Dashboard  @endsection
@section('content')
    @component('backend.components.breadcrumb')
        @slot('li_1') Admin @endslot
        @slot('title') Dashboard  @endslot
    @endcomponent


        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        Sıkça Sorulan Sorular
                    </div>
                    <div class="card-body">
                        <!-- Accordions with Icons -->
                        <!-- Accordions with Icons -->
                        <div class="accordion custom-accordionwithicon" id="accordionWithicon">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="accordionwithiconExample1">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#accor_iconExamplecollapse1" aria-expanded="true" aria-controls="accor_iconExamplecollapse1">
                                         How Does Age Verification Work?
                                    </button>
                                </h2>
                                <div id="accor_iconExamplecollapse1" class="accordion-collapse collapse show" aria-labelledby="accordionwithiconExample1" data-bs-parent="#accordionWithicon">
                                    <div class="accordion-body">
                                        Increase or decrease the letter spacing depending on the situation and try, try again until it looks right, and each assumenda labore aes Homo nostrud organic, assumenda labore aesthetic magna elements, buttons, everything.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="accordionwithiconExample2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accor_iconExamplecollapse2" aria-expanded="false" aria-controls="accor_iconExamplecollapse2">
                                        How Does Link Tracking Work?
                                    </button>
                                </h2>
                                <div id="accor_iconExamplecollapse2" class="accordion-collapse collapse" aria-labelledby="accordionwithiconExample2" data-bs-parent="#accordionWithicon">
                                    <div class="accordion-body">
                                        Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero. Fusce vulputate eleifend sapien.
                                    </div>
                                </div>
                            </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        Etkinlik Gurubuna Göre TopDağılım
                    </div>
                    <div class="card-body">
                        {!! $chart->container() !!}
                    </div>
                </div>
            </div>


    </div>
@endsection


@section('addjs')





    <script src="{{ $chart->cdn() }}"></script>

    {{ $chart->script() }}

@endsection
