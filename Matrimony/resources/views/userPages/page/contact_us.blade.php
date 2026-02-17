@extends('layout2.home')

@section('title')
contact Us
@endsection

@section('content')
<main class="main">
    <section id="contact" class="contact section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="mb-5">
                <iframe style="width: 100%; height: 400px;"
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                    frameborder="0" allowfullscreen=""></iframe>
            </div>
            <div class="row gy-4">
                <div class="col-md-6">
                    <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">
                        <i class="icon bi bi-geo-alt flex-shrink-0"></i>
                        <div>
                            <h3>எங்கள் முகவரி</h3>
                            <p>நெ. 42, சின்னப்பா ராவுத்தர் தெரு,திருவில்லிக்கேணி,</p>
                            <p>சென்னை -5</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="300">
                        <i class="icon bi bi-telephone flex-shrink-0"></i>
                        <div>
                            <h3>தொடர்புக்கு</h3>
                            <p>+91 94444 94646</p>
                        </div>
                    </div>
                </div>
                <form action="" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="600">
                    <h4 class="dark-color font-alt m-20px-b">பின்னூட்டம்</h4>
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="பெயர்" required="">
                        </div>
                        <div class="col-md-6 ">
                            <input type="text" class="form-control" name="phonenumber" placeholder="கைபேசி எண்"
                                required="">
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="subject" placeholder="பொருள்" required="">
                        </div>
                        <div class="col-md-12">
                            <textarea class="form-control" name="message" rows="6" placeholder="உங்கள் தகவல்"
                                required=""></textarea>
                        </div>
                        <div class="col-md-12 text-center">
                            <div class="loading">Loading
                            </div>
                            <div class="error-message">
                            </div>
                            <div class="sent-message">செய்தி வெற்றிகரமாக அனுப்பப்பட்டது.
                            </div>
                            <button type="submit">செய்தி அனுப்ப</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
@endsection