@extends('layout2.home')

@section('title')
    Home
@endsection

@section('content')
<main class="main">

  <div class="container px-3">
    <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

      <div class="tab-pane fade active show" id="menu-starters">

        <div class="tab-header text-center">
          <h4>நிறுவனர்கள் / அலுவலர்கள்</h4>
        </div> 

        <div class="row gy-5">
          <div class="col-lg-3 menu-item ms-5">
            <a href="" class="glightbox">
              <img src="{{ asset('assets/images/custom/kamarajar-1.png') }}" class="menu-images images-fluid" alt="">
            </a>
            <h5>தலைவர்:</h5>
            <h5>K.பிள்ளைபெருமாள் நாடார்</h5>
            <h5>94444 94646</h5>
          </div>

          <div class="col-lg-3 menu-item ms-5">
            <a href="" class="glightbox">
              <img src="{{ asset('assets/images/custom/kamarajar-1.png') }}" class="menu-images images-fluid" alt="">
            </a>
            <h5>பொதுச் செயலாளர்:</h5>
            <h5>K. கனகராஜ் நாடார்</h5>
            <h5>91760 27770</h5>
          </div>

          <div class="col-lg-3 menu-item ms-5">
            <a href="" class="glightbox">
              <img src="{{ asset('assets/images/custom/kamarajar-1.png') }}" class="menu-images images-fluid" alt="">
            </a>
            <h5>பொருளாளர்:</h5>
            <h5>A.P இராமகிருஷ்ணன் நாடார்</h5>
            <h5>98410 94139</h5>
          </div>

          <div class="col-lg-3 menu-item ms-5">
            <a href="" class="glightbox">
              <img src="{{ asset('assets/images/custom/kamarajar-1.png') }}" class="menu-images images-fluid" alt="">
            </a>
            <h5>துணைத்தலைவர்:</h5>
            <h5>A. அய்யன்காலன் நாடார்</h5>
            <h5>94458 60245</h5>
          </div>
        </div>

      </div>

      <div class="tab-content pt-5" data-aos="fade-up" data-aos-delay="200">
        <div class="tab-pane fade active show" id="menu-starters">

          <div class="tab-header text-center">
            <h4>துணை செயலாளர்கள்</h4>
          </div> 

          <div class="row gy-5 pt-5">
            <div class="col-lg-3 menu-item ms-5">
              <a href="" class="glightbox">
                <img src="{{ asset('assets/images/custom/kamarajar-1.png') }}" class="menu-images images-fluid" alt="">
              </a>
              <h5>R.A. துரைசாமி நாடார்</h5>
              <h5>80565 36544</h5>
            </div>

            <div class="col-lg-3 menu-item ms-5">
              <a href="" class="glightbox">
                <img src="{{ asset('assets/images/custom/kamarajar-1.png') }}" class="menu-images images-fluid" alt="">
              </a>
              <h5>R. ஆறுமுகம் நாடார்</h5>
              <h5>98402 33872</h5>
            </div>

            <div class="col-lg-3 menu-item ms-5">
              <a href="" class="glightbox">
                <img src="{{ asset('assets/images/custom/kamarajar-1.png') }}" class="menu-images images-fluid" alt="">
              </a>
              <h5>C. கணேசன் நாடார்</h5>
              <h5>94442 38374</h5>
            </div>

            <div class="col-lg-3 menu-item ms-5">
              <a href="" class="glightbox">
                <img src="{{ asset('assets/images/custom/kamarajar-1.png') }}" class="menu-images images-fluid" alt="">
              </a>
              <h5>N. மூர்த்தி நாடார்</h5>
              <h5>98407 48229</h5>
            </div>
          </div>

        </div>
      </div>

      <div class="tab-content pt-5" data-aos="fade-up" data-aos-delay="200">
        <div class="tab-pane fade active show" id="menu-starters">

          <div class="tab-header text-center">
            <h4>செயற்குழு உறுப்பினர்கள்</h4>
          </div> 

          <div class="row gy-5 pt-5">
            <div class="col-lg-3 menu-item ms-5">
              <a href="" class="glightbox">
                <img src="{{ asset('assets/images/custom/kamarajar-1.png') }}" class="menu-images images-fluid" alt="">
              </a>
              <h5>A.P. இரத்தினசாமி நாடார்</h5>
              <h5>98405 35328</h5>
            </div>

            <div class="col-lg-3 menu-item ms-5">
              <a href="" class="glightbox">
                <img src="{{ asset('assets/images/custom/kamarajar-1.png') }}" class="menu-images images-fluid" alt="">
              </a>
              <h5>K. தமிழ்செல்வன் நாடார்</h5>
              <h5>94442 19567</h5>
            </div>

            <div class="col-lg-3 menu-item ms-5">
              <a href="" class="glightbox">
                <img src="{{ asset('assets/images/custom/kamarajar-1.png') }}" class="menu-images images-fluid" alt="">
              </a>
              <h5>G. ஆபிரகாம் ஏசுதாசன் நாடார்</h5>
              <h5>98844 79115</h5>
            </div>

            <div class="col-lg-3 menu-item ms-5">
              <a href="" class="glightbox">
                <img src="{{ asset('assets/images/custom/kamarajar-1.png') }}" class="menu-images images-fluid" alt="">
              </a>
              <h5>T. கார்த்திகைகுமார் நாடார்</h5>
              <h5>94442 43044</h5>
            </div>

            <div class="col-lg-3 menu-item ms-5">
              <a href="" class="glightbox">
                <img src="{{ asset('assets/images/custom/kamarajar-1.png') }}" class="menu-images images-fluid" alt="">
              </a>
              <h5>R. முருகன் நாடார்</h5>
              <h5>98848 67922</h5>
            </div>

            <div class="col-lg-3 menu-item ms-5">
              <a href="" class="glightbox">
                <img src="{{ asset('assets/images/custom/kamarajar-1.png') }}" class="menu-images images-fluid" alt="">
              </a>
              <h5>P. தேவராஜ் நாடார்</h5>
              <h5>72009 75009</h5>
            </div>

            <div class="col-lg-3 menu-item ms-5">
              <a href="" class="glightbox">
                <img src="{{ asset('assets/images/custom/kamarajar-1.png') }}" class="menu-images images-fluid" alt="">
              </a>
              <h5>S. ராம்ராஜ் நாடார்</h5>
              <h5>98840 63303</h5>
            </div>

            <div class="col-lg-3 menu-item ms-5">
              <a href="" class="glightbox">
                <img src="{{ asset('assets/images/custom/kamarajar-1.png') }}" class="menu-images images-fluid" alt="">
              </a>
              <h5>K.R. முருகன் நாடார்</h5>
              <h5>77080 20917</h5>
            </div>

            <div class="col-lg-3 menu-item ms-5">
              <a href="" class="glightbox">
                <img src="{{ asset('assets/images/custom/kamarajar-1.png') }}" class="menu-images images-fluid" alt="">
              </a>
              <h5>P. தேவராஜ் நாடார்</h5>
              <h5>72009 75009</h5>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>

</main>

<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
  <i class="bi bi-arrow-up-short"></i>
</a>
@endsection
