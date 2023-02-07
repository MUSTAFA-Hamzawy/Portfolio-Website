@php use App\Models\aboutModel; @endphp
@php
$data = aboutModel::all()->first();
@endphp

<section id="aboutSection" class="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                    <img style="height: 543px; width: 660px" src="{{url('uploads/images/about/' . $data->about_image)}}"
                         alt="about
                    image">
            </div>
            <div class="col-lg-6">
                <div class="about__content">
                    <div class="section__title">
                        <span class="sub-title">01 - About me</span>
                        <h2 class="title">{{$data->title}}</h2>
                    </div>
                    <div class="about__exp">
                        <div class="about__exp__icon">
                            <img src="{{asset('frontend')}}/assets/img/icons/about_icon.png" alt="">
                        </div>
                        <div class="about__exp__content">
                            <p> {{$data->sub_title}} </p>
                        </div>
                    </div>
                    <p class="desc">{{$data->description}} </p>
                    <a href="about.html" class="btn">Download my resume</a>
                </div>
            </div>
        </div>
    </div>
</section>
