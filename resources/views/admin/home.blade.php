@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('swiper/css/swiper-bundle.min.css') }}">
    <style>
        html,
        body {
            /* position: relative;
            height: 100%; */
        }

        body {
            background: #eee;
            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
            font-size: 14px;
            color: #000;
            /* margin: 0;
            padding: 0; */
        }

        .swiper {
            width: 100%;
            height: 100%;
			border-radius: 10px !important;
            /* margin-left: auto;
            margin-right: auto; */
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            /* height: calc((100% - 30px) / 2) !important; */
            height: 100% !important;

            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }
    </style>
@endsection
@section('content')
    <h2 class="main-title">Inicio</h2>
    <div class="row stat-cards">
        <div class="col-md-6 col-xl-3">
            <article class="stat-cards-item">
                <div class="stat-cards-icon primary">
                    <i data-feather="bar-chart-2" aria-hidden="true"></i>
                </div>
                <div class="stat-cards-info">
                    <p class="stat-cards-info__num">1478 286</p>
                    <p class="stat-cards-info__title">Total visits</p>
                    <p class="stat-cards-info__progress">
                        <span class="stat-cards-info__profit success">
                            <i data-feather="trending-up" aria-hidden="true"></i>4.07%
                        </span>
                        Last month
                    </p>
                </div>
            </article>
        </div>
        <div class="col-md-6 col-xl-3">
            <article class="stat-cards-item">
                <div class="stat-cards-icon warning">
                    <i data-feather="file" aria-hidden="true"></i>
                </div>
                <div class="stat-cards-info">
                    <p class="stat-cards-info__num">1478 286</p>
                    <p class="stat-cards-info__title">Total visits</p>
                    <p class="stat-cards-info__progress">
                        <span class="stat-cards-info__profit success">
                            <i data-feather="trending-up" aria-hidden="true"></i>0.24%
                        </span>
                        Last month
                    </p>
                </div>
            </article>
        </div>
        <div class="col-md-6 col-xl-3">
            <article class="stat-cards-item">
                <div class="stat-cards-icon purple">
                    <i data-feather="file" aria-hidden="true"></i>
                </div>
                <div class="stat-cards-info">
                    <p class="stat-cards-info__num">1478 286</p>
                    <p class="stat-cards-info__title">Total visits</p>
                    <p class="stat-cards-info__progress">
                        <span class="stat-cards-info__profit danger">
                            <i data-feather="trending-down" aria-hidden="true"></i>1.64%
                        </span>
                        Last month
                    </p>
                </div>
            </article>
        </div>
        <div class="col-md-6 col-xl-3">
            <article class="stat-cards-item">
                <div class="stat-cards-icon success">
                    <i data-feather="feather" aria-hidden="true"></i>
                </div>
                <div class="stat-cards-info">
                    <p class="stat-cards-info__num">1478 286</p>
                    <p class="stat-cards-info__title">Total visits</p>
                    <p class="stat-cards-info__progress">
                        <span class="stat-cards-info__profit warning">
                            <i data-feather="trending-up" aria-hidden="true"></i>0.00%
                        </span>
                        Last month
                    </p>
                </div>
            </article>
        </div>
        {{-- Mais teste com swiper --}}
        <div class="row stat-cards">
            <div class="col-md-6 col-xl-3">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="row">
                            <article class="stat-cards-item swiper-slide">
                                <div class="stat-cards-icon primary">
                                    <i data-feather="bar-chart-2" aria-hidden="true"></i>
                                </div>
                                <div class="stat-cards-info">
                                    <p class="stat-cards-info__num">1478 286</p>
                                    <p class="stat-cards-info__title">Total visits</p>
                                    <p class="stat-cards-info__progress">
                                        <span class="stat-cards-info__profit success">
                                            <i data-feather="trending-up" aria-hidden="true"></i>4.07%
                                        </span>
                                        Last month
                                    </p>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- vamos testar esse swiper --}}
        {{-- <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">Slide 1</div>
                <div class="swiper-slide">Slide 2</div>
                <div class="swiper-slide">Slide 3</div>
                <div class="swiper-slide">Slide 4</div>
                <div class="swiper-slide">Slide 5</div>
                <div class="swiper-slide">Slide 6</div>
                <div class="swiper-slide">Slide 7</div>
                <div class="swiper-slide">Slide 8</div>
                <div class="swiper-slide">Slide 9</div>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-pagination"></div>
        </div> --}}
        {{--  --}}
        {{-- <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div> --}}
    </div>
@endsection
@section('script')
    <script src="{{ asset('swiper/js/swiper-bundle.js') }}"></script>
    <script>
        // const swiper = new Swiper('.swiper', {
        //     direction: 'horizontal',
        //     loop: true,
        //     speed: 400,
        //     spaceBetween: 100,
        //     pagination: {
        //         el: '.swiper-pagination',
        //     },
        //     navigation: {
        //         nextEl: '.swiper-button-next',
        //         prevEl: '.swiper-button-prev',
        //     },
        //     scrollbar: {
        //         el: '.swiper-scrollbar',
        //     },
        // });
        var swiper = new Swiper(".swiper", {
            slidesPerView: 3,
            grid: {
                rows: 2,
            },
            spaceBetween: 30,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
@endsection
