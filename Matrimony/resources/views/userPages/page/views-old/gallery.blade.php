@extends('layout2.home')

@section('title')
About
@endsection

@section('content')
<main>
   <section id="work" class="section white-bg">
      <div class="container">
      <div class="row sm-m-25px-b m-35px-b">
      <div class="col-md-4 section-title padleft" style="font-size: 20px">
         <i class='fa fa-picture-o' style="padding-top:10px!important;" aria-hidden="true"></i>&nbsp;&nbsp;<a href="#"onclick="show_alldiv();">அனைத்தையும் காட்டு</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </div>
      <div class="col-md-4 section-title padleft" style="font-size: 20px">
         <i class='fa fa-picture-o' style="padding-top:10px!important;" aria-hidden="true"></i>&nbsp;&nbsp;<a href="#"onclick="show1()">வருடாந்திர  குடும்பம் 27 டிசம்பர் 2015 அன்று</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </div>
      <div class="col-md-4 section-title padleft" style="font-size: 20px">
         <i class='fa fa-picture-o' style="padding-top:10px!important;" aria-hidden="true"></i>&nbsp;&nbsp;<a href="#"onclick="show2()">வருடாந்திர  குடும்பம் 25 டிசம்பர் 2016 அன்று</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </div>
      <div>
      </div>
      <div class="container" id="allimage">
         <div class="portfolio-content lightbox-gallery">
            <div class="grid-item product branding">
               <div class="portfolio-box-01">
                  <div class="portfolio-img">
                     <img src="{{ asset('assets/images/custom/2.jpg')}}" title="" alt="">
                  </div>
                  <div class="portfolio-info">
                     <h5>எங்கள் புகைப்படம்</h5>
                  </div>
                  <a class="link-overlay" href="#"></a>
               </div>
            </div>
            <div class="grid-item product branding">
               <div class="portfolio-box-01">
                  <div class="portfolio-img">
                     <img src="{{ asset('assets/images/custom/104.jpg')}}" title="" alt="">
                  </div>
                  <div class="portfolio-info">
                     <h5>எங்கள் புகைப்படம்</h5>
                  </div>
                  <a class="link-overlay" href="#"></a>
               </div>
            </div>
            <div class="grid-item product branding">
               <div class="portfolio-box-01">
                  <div class="portfolio-img">
                     <img src="{{ asset('assets/images/custom/105.jpg')}}" title="" alt="">
                  </div>
                  <div class="portfolio-info">
                     <h5>எங்கள் புகைப்படம்</h5>
                  </div>
                  <a class="link-overlay" href="#"></a>
               </div>
            </div>
            <div class="grid-item product branding">
               <div class="portfolio-box-01">
                  <div class="portfolio-img">
                     <img src="{{ asset('assets/images/custom/106.jpg')}}" title="" alt="">
                  </div>
                  <div class="portfolio-info">
                     <h5>எங்கள் புகைப்படம்</h5>
                  </div>
                  <a class="link-overlay" href="#"></a>
               </div>
            </div>
            <div class="grid-item product branding">
               <div class="portfolio-box-01">
                  <div class="portfolio-img">
                     <img src="{{ asset('assets/images/custom/107.jpg')}}" title="" alt="">
                  </div>
                  <div class="portfolio-info">
                     <h5>எங்கள் புகைப்படம்</h5>
                  </div>
                  <a class="link-overlay" href="#"></a>
               </div>
            </div>
            <div class="grid-item product branding">
               <div class="portfolio-box-01">
                  <div class="portfolio-img">
                     <img src="{{ asset('assets/images/custom/108.jpg')}}" title="" alt="">
                  </div>
                  <div class="portfolio-info">
                     <h5>எங்கள் புகைப்படம்</h5>
                  </div>
                  <a class="link-overlay" href="#"></a>
               </div>
            </div>
            <div class="grid-item product branding">
               <div class="portfolio-box-01">
                  <div class="portfolio-img">
                     <img src="{{ asset('assets/images/custom/109.jpg')}}" title="" alt="">
                  </div>
                  <div class="portfolio-info">
                     <h5>எங்கள் புகைப்படம்</h5>
                  </div>
                  <a class="link-overlay" href="#"></a>
               </div>
            </div>
            <div class="grid-item product branding">
               <div class="portfolio-box-01">
                  <div class="portfolio-img">
                     <img src="{{ asset('assets/images/custom/110.jpg')}}" title="" alt="">
                  </div>
                  <div class="portfolio-info">
                     <h5>எங்கள் புகைப்படம்</h5>
                  </div>
                  <a class="link-overlay" href="#"></a>
               </div>
            </div>
            <div class="grid-item product branding">
               <div class="portfolio-box-01">
                  <div class="portfolio-img">
                     <img src="{{ asset('assets/images/custom/111.jpg')}}" title="" alt="">
                  </div>
                  <div class="portfolio-info">
                     <h5>எங்கள் புகைப்படம்</h5>
                  </div>
                  <a class="link-overlay" href="#"></a>
               </div>
            </div>
            <div class="grid-item product branding">
               <div class="portfolio-box-01">
                  <div class="portfolio-img">
                     <img src="{{ asset('assets/images/custom/112.jpg')}}" title="" alt="">
                  </div>
                  <div class="portfolio-info">
                     <h5>எங்கள் புகைப்படம்</h5>
                  </div>
                  <a class="link-overlay" href="#"></a>
               </div>
            </div>
            <div class="grid-item product branding">
               <div class="portfolio-box-01">
                  <div class="portfolio-img">
                     <img src="{{ asset('assets/images/custom/113.jpg')}}" title="" alt="">
                  </div>
                  <div class="portfolio-info">
                     <h5>எங்கள் புகைப்படம்</h5>
                  </div>
                  <a class="link-overlay" href="#"></a>
               </div>
            </div>
            <div class="grid-item product branding">
               <div class="portfolio-box-01">
                  <div class="portfolio-img">
                     <img src="{{ asset('assets/images/custom/114.jpg')}}" title="" alt="">
                  </div>
                  <div class="portfolio-info">
                     <h5>எங்கள் புகைப்படம்</h5>
                  </div>
                  <a class="link-overlay" href="#"></a>
               </div>
            </div>
            <div class="grid-item product branding">
               <div class="portfolio-box-01">
                  <div class="portfolio-img">
                     <img src="{{ asset('assets/images/custom/115.jpg')}}" title="" alt="">
                  </div>
                  <div class="portfolio-info">
                     <h5>எங்கள் புகைப்படம்</h5>
                  </div>
                  <a class="link-overlay" href="#"></a>
               </div>
            </div>
            <div class="grid-item product branding">
               <div class="portfolio-box-01">
                  <div class="portfolio-img">
                     <img src="{{ asset('assets/images/custom/116.jpg')}}" title="" alt="">
                  </div>
                  <div class="portfolio-info">
                     <h5>எங்கள் புகைப்படம்</h5>
                  </div>
                  <a class="link-overlay" href="#"></a>
               </div>
            </div>
            <div class="grid-item product branding">
               <div class="portfolio-box-01">
                  <div class="portfolio-img">
                     <img src="{{ asset('assets/images/custom/117.jpg')}}" title="" alt="">
                  </div>
                  <div class="portfolio-info">
                     <h5>எங்கள் புகைப்படம்</h5>
                  </div>
                  <a class="link-overlay" href="#"></a>
               </div>
            </div>
            <div class="grid-item product branding">
               <div class="portfolio-box-01">
                  <div class="portfolio-img">
                     <img src="{{ asset('assets/images/custom/118.jpg')}}" title="" alt="">
                  </div>
                  <div class="portfolio-info">
                     <h5>எங்கள் புகைப்படம்</h5>
                  </div>
                  <a class="link-overlay" href="#"></a>
               </div>
            </div>
            <div class="grid-item product branding">
               <div class="portfolio-box-01">
                  <div class="portfolio-img">
                     <img src="{{ asset('assets/images/custom/119.jpg')}}" title="" alt="">
                  </div>
                  <div class="portfolio-info">
                     <h5>எங்கள் புகைப்படம்</h5>
                  </div>
                  <a class="link-overlay" href="#"></a>
               </div>
            </div>
            <div class="grid-item product branding">
               <div class="portfolio-box-01">
                  <div class="portfolio-img">
                     <img src="{{ asset('assets/images/custom/120.jpg')}}" title="" alt="">
                  </div>
                  <div class="portfolio-info">
                     <h5>எங்கள் புகைப்படம்</h5>
                  </div>
                  <a class="link-overlay" href="#"></a>
               </div>
            </div>
         </div>
      </div>
      <div class="container hide1" id="fgt_27th_Dec_2015" >
         <div class="portfolio-content lightbox-gallery">
            <div class="grid-item product branding">
               <div class="portfolio-box-01">
                  <div class="portfolio-img">
                     <img src="{{ asset('assets/images/custom/121.jpg')}}" title="" alt="">
                  </div>
                  <div class="portfolio-info">
                     <h5>எங்கள் புகைப்படம்</h5>
                  </div>
                  <a class="link-overlay" href="#"></a>
               </div>
            </div>
            <div class="grid-item product branding">
               <div class="portfolio-box-01">
                  <div class="portfolio-img">
                     <img src="{{ asset('assets/images/custom/122.jpg')}}" title="" alt="">
                  </div>
                  <div class="portfolio-info">
                     <h5>எங்கள் புகைப்படம்</h5>
                     <span></span>
                  </div>
                  <a class="link-overlay" href="#"></a>
               </div>
            </div>
            <div class="grid-item product branding">
               <div class="portfolio-box-01">
                  <div class="portfolio-img">
                     <img src="{{ asset('assets/images/custom/123.jpg')}}" title="" alt="">
                  </div>
                  <div class="portfolio-info">
                     <h5>எங்கள் புகைப்படம்</h5>
                     <span></span>
                  </div>
                  <a class="link-overlay" href="#"></a>
               </div>
            </div>
            <div class="grid-item product branding">
               <div class="portfolio-box-01">
                  <div class="portfolio-img">
                     <img src="{{ asset('assets/images/custom/124.jpg')}}" title="" alt="">
                  </div>
                  <div class="portfolio-info">
                     <h5>எங்கள் புகைப்படம்</h5>
                     <span></span>
                  </div>
                  <a class="link-overlay" href="#"></a>
               </div>
            </div>
            <div class="grid-item product branding">
               <div class="portfolio-box-01">
                  <div class="portfolio-img">
                     <img src="{{ asset('assets/images/custom/125.jp')}}" title="" alt="">
                  </div>
                  <div class="portfolio-info">
                     <h5>எங்கள் புகைப்படம்</h5>
                     <span></span>
                  </div>
                  <a class="link-overlay" href="#"></a>
               </div>
            </div>
            <div class="grid-item product branding">
               <div class="portfolio-box-01">
                  <div class="portfolio-img">
                     <img src="{{ asset('assets/images/custom/126.jpg')}}" title="" alt="">
                  </div>
                  <div class="portfolio-info">
                     <h5>எங்கள் புகைப்படம்</h5>
                     <span></span>
                  </div>
                  <a class="link-overlay" href="#"></a>
               </div>
            </div>
         </div>
      </div>
      <div class="container hide1" id="fgt_25th_Dec_2016" >
         <div class="portfolio-content lightbox-gallery">
            <div class="grid-item product branding">
               <div class="portfolio-box-01">
                  <div class="portfolio-img">
                     <img src="{{ asset('assets/images/custom/127.jpg')}}" title="" alt="">
                  </div>
                  <div class="portfolio-info">
                     <h5>எங்கள் புகைப்படம்</h5>
                     <span></span>
                  </div>
                  <a class="link-overlay" href="#"></a>
               </div>
            </div>
            <div class="grid-item product branding">
               <div class="portfolio-box-01">
                  <div class="portfolio-img">
                     <img src="{{ asset('assets/images/custom/128.jpg')}}" title="" alt="">
                  </div>
                  <div class="portfolio-info">
                     <h5>எங்கள் புகைப்படம்</h5>
                     <span></span>
                  </div>
                  <a class="link-overlay" href="#"></a>
               </div>
            </div>
            <div class="grid-item product branding">
               <div class="portfolio-box-01">
                  <div class="portfolio-img">
                     <img src="{{ asset('assets/images/custom/129.jpg')}}" title="" alt="">
                  </div>
                  <div class="portfolio-info">
                     <h5>எங்கள் புகைப்படம்</h5>
                     <span></span>
                  </div>
                  <a class="link-overlay" href="#"></a>
               </div>
            </div>
            <div class="grid-item product branding">
               <div class="portfolio-box-01">
                  <div class="portfolio-img">
                     <img src="{{ asset('assets/images/custom/130.jpg')}}" title="" alt="">
                  </div>
                  <div class="portfolio-info">
                     <h5>எங்கள் புகைப்படம்</h5>
                     <span></span>
                  </div>
                  <a class="link-overlay" href="#"></a>
               </div>
            </div>
         </div>
      </div>
   </section>
</main>
@endsection