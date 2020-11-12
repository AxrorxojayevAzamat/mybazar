@extends('layouts.app')

@section('title', 'Brands')

@section('styles')
    {{-- <link rel="stylesheet" href="{{asset('css/brands.css')}}"> --}}
@endsection

@section('body')
    <section>
        <div class="h4-title brands-alphabet">
            <h4 class="title">@lang('frontend.breadcrumb.brands')</h4>
        </div>
        <div class="list-of-brands">
            <div class="filter-by-alphabet">
                <div class="first-row">
                    <div class="pn-ProductNav_Wrapper">
                        <nav id="pnProductNav" class="pn-ProductNav">
                            <div id="pnProductNavContents" class="pn-ProductNav_Contents alphabets-padding">
                                <a href="#" class="pn-ProductNav_Link chairs" aria-selected="true">Chairs</a>
                                <a href="{{ route('brands') . '?brand=' }}" class="pn-ProductNav_Link active">Все</a>
                                @foreach(\App\Helpers\BrandHelper::getCyrillicList() as $cyrill)
                                    <a href="{{ route('brands') . '?brand-cyrill=' . $cyrill }}" class="pn-ProductNav_Link">{{$cyrill}}</a>
                                @endforeach
                                <span id="pnIndicator" class="pn-ProductNav_Indicator"></span>
                            </div>
                        </nav>
                        <button id="pnAdvancerLeft" class="pn-Advancer pn-Advancer_Left" type="button">
                            <svg class="pn-Advancer_Icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 551 1024"><path d="M445.44 38.183L-2.53 512l447.97 473.817 85.857-81.173-409.6-433.23v81.172l409.6-433.23L445.44 38.18z"/></svg>
                        </button>
                        <button id="pnAdvancerRight" class="pn-Advancer pn-Advancer_Right" type="button">
                            <svg class="pn-Advancer_Icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 551 1024"><path d="M105.56 985.817L553.53 512 105.56 38.183l-85.857 81.173 409.6 433.23v-81.172l-409.6 433.23 85.856 81.174z"/></svg>
                        </button>
                    </div>
                </div>
                <div class="second-row">
                    <div class="pn-ProductNav_Wrapper">
                        <nav id="pnProductNav" class="pn-ProductNav">
                            <div id="pnProductNavContents" class="pn-ProductNav_Contents alphabets-padding">
                                @foreach(\App\Helpers\BrandHelper::getLatinList() as $latin)
                                    <a href="{{ route('brands') . '?brand-latin=' . $latin }}" class="pn-ProductNav_Link">{{$latin}}</a>
                                @endforeach
                                <span id="pnIndicator" class="pn-ProductNav_Indicator"></span>
                            </div>
                        </nav>
                        <button id="pnAdvancerLeft" class="pn-Advancer pn-Advancer_Left" type="button">
                            <svg class="pn-Advancer_Icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 551 1024"><path d="M445.44 38.183L-2.53 512l447.97 473.817 85.857-81.173-409.6-433.23v81.172l409.6-433.23L445.44 38.18z"/></svg>
                        </button>
                        <button id="pnAdvancerRight" class="pn-Advancer pn-Advancer_Right" type="button">
                            <svg class="pn-Advancer_Icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 551 1024"><path d="M105.56 985.817L553.53 512 105.56 38.183l-85.857 81.173 409.6 433.23v-81.172l-409.6 433.23 85.856 81.174z"/></svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="filtered-brands">
                {{-- {{dd($groups)}} --}}
                @foreach($groups as $letter => $group)
                    <div class="letter-item">
                        <h6 class="title">
                            {{ $letter }}
                        </h6>
                        @foreach($group as $brand)
                            <div class="brands-by-letter">
                                <div><a href="{{ route('brands.show', $brand)}}">{{ $brand['name_ru'] }}</a></div>

                            <!--<div><a href="#" class="all-brands-by-this-letter">Ве бренды на {{ $letter }}</a></div>-->
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{asset('js/1-index.js')}}"></script>
@endsection
