@extends('layouts.app')

@section('body')

    <section>
        <div class="h4-title profile">
            <h4 class="title">@lang('adminlte.user_cabinet')</h4>
        </div>
    </section>
    <div class="outter-profile container-fluid">
        <div class="d-flex flex-row inner-profile">
            <div class="col-3 justify-content-start side-menu">
                <ul>
                    <li><a href="?type=personal">
                            <i class="mbshow"></i>
                            {{ trans('adminlte.personal_info') }}
                        </a>
                    </li>
                    <li><a href="?type=additional">
                            <i class="mbshow"></i>
                            {{ trans('adminlte.additional_info') }}
                        </a>
                    </li>
                    <li><a href="#">
                            <i class="mbbox"></i>
                            {{ trans('menu.orders') }}
                        </a>
                    </li>
                    <li><a href="{{ route('cart') }}">
                            <i class="mbcart"></i>
                            {{ trans('frontend.cart.cart') }}
                        </a>
                    </li>
                    <li><a href="{{ route('user.favorites') }}">
                            <i class="mbfavorite"></i>
                            {{ trans('menu.favorites') }}
                        </a>
                    </li>
                    <li><a href="{{ route('logout') }}">
                            <i class="mbaccount"></i>
                            {{ trans('adminlte.log_out') }}
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-9 content">
                <!-- profile info -->
                <div class="profile-info" id="profile-info">

                   @yield('userInform')

                </div>

            </div>
        </div>
    </div>
    </div>

    <script>
        function personalInform(){
            $('#personalEdit').toggleClass('d-block');
            $('#personalView').toggleClass('d-none');
        }
        function additionalInform(){
            $('#additionalEdit').toggleClass('d-block');
            $('#additionalView').toggleClass('d-none');
        }
        window.onload = function () {
            $('#region').niceSelect();
            //Check File API support
            if (window.File && window.FileList && window.FileReader) {
                var filesInput1 = document.getElementById("files1");
                var filesInput2 = document.getElementById("files2");

                filesInput1.addEventListener("change", function (event) {

                    var files = event.target.files; //FileList object
                    var output = document.getElementById("result1");

                    for (var i = 0; i < files.length; i++) {
                        var file = files[i];

                        //Only pics
                        if (!file.type.match('image'))
                            continue;

                        var picReader = new FileReader();

                        picReader.addEventListener("load", function (event) {

                            var picFile = event.target;

                            var div = document.createElement("div");

                            div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" +
                                "title='" + picFile.name + "'/>";

                            output.insertBefore(div, null);

                        });

                        //Read the image
                        picReader.readAsDataURL(file);
                    }

                });
                filesInput2.addEventListener("change", function (event) {

                    var files = event.target.files; //FileList object
                    var output = document.getElementById("result2");

                    for (var i = 0; i < files.length; i++) {
                        var file = files[i];

                        //Only pics
                        if (!file.type.match('image'))
                            continue;

                        var picReader = new FileReader();

                        picReader.addEventListener("load", function (event) {

                            var picFile = event.target;

                            var div = document.createElement("div");

                            div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" +
                                "title='" + picFile.name + "'/>";

                            output.insertBefore(div, null);

                        });

                        //Read the image
                        picReader.readAsDataURL(file);
                    }

                });
            } else {
                console.log("Your browser does not support File API");
            }
        }

    </script>

@endsection
@section('script')
    <script src="{{ mix('js/1-index.js', 'build') }}"></script>
    <script src="{{ mix('js/2-catalog-page.js', 'build') }}"></script>
@endsection
