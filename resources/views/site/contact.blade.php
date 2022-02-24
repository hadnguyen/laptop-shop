@extends('layouts.site')

@section('content')
    @livewire('hero',['home' => 0])

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone"></span>
                        <h4>Điện thoại</h4>
                        <p>1900.1900</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_pin_alt"></span>
                        <h4>Địa chỉ</h4>
                        <p>Hai Bà Trưng, Hà Nội</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_clock_alt"></span>
                        <h4>Giờ làm việc</h4>
                        <p>8:00h - 23:00h</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt"></span>
                        <h4>Email</h4>
                        <p>ha.nd185445@sis.hust.edu.vn
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Contact Form Begin -->
    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Liên hệ</h2>
                    </div>
                </div>
            </div>
            <form action="#">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <input type="text" placeholder="Tên">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="text" placeholder="Email">
                    </div>
                    <div class="col-lg-12 text-center">
                        <textarea placeholder="Nội dung"></textarea>
                        <button type="submit" class="site-btn">GỬI</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Contact Form End -->
@endsection
