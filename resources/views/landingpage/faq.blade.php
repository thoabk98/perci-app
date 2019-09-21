@extends('landingpage.layouts.master')

@section('header')
  <script>document.getElementsByTagName("html")[0].className += " js";</script>
  <link rel="stylesheet" href="{{ asset('landingpage/css/faq-style.css') }}" type="text/css" media="all" />
@endsection

@section('content')
  <section class="services py-5" id="home">
    <div class="container py-md-5 py-3">
      <div class="row text-justify">
        <div class="col-1"></div>
        <div class="col-10">
          <h2 class="mb-4 heading text-center">FAQ</h2>
          <section class="cd-faq js-cd-faq container max-width-md margin-top-lg margin-bottom-lg">
            <ul class="cd-faq__categories">
              <li><a class="cd-faq__category cd-faq__category-selected truncate" href="#pricing">Pricing</a></li>
              <li><a class="cd-faq__category truncate" href="#installation">Installation & Getting Started</a></li>
              <li><a class="cd-faq__category truncate" href="#whypeasi">Highlight Benefits/Why Peasi</a></li>
              <li><a class="cd-faq__category truncate" href="#others">Others</a></li>
            </ul> <!-- cd-faq__categories -->

            <div class="cd-faq__items">
              <ul id="pricing" class="cd-faq__group">
                <li class="cd-faq__title"><h2>Pricing</h2></li>
                <li class="cd-faq__item">
                  <a class="cd-faq__trigger" href="#0"><span>Can i try it before purchase?</span></a>
                  <div class="cd-faq__content">
                    <div class="text-component">
                      <p>Yes, we&rsquo;re providing you 500 impressions through the free plan. After it ends, if you may want more time to try Peasi Ultimate Upsell, our supporters would be happy to extend the the impressions for you.</p>
                    </div>
                  </div> <!-- cd-faq__content -->
                </li>

                <li class="cd-faq__item">
                  <a class="cd-faq__trigger" href="#0"><span>Can i change my current plan?</span></a>
                  <div class="cd-faq__content">
                    <div class="text-component">
                      <p>Yes. From the box at the top right corner of the Dashboard, when you click on it, you will see button “Change Plan”</p>
                    </div>
                  </div> <!-- cd-faq__content -->
                </li>
              </ul> <!-- cd-faq__group -->

              <ul id="installation" class="cd-faq__group">
                <li class="cd-faq__title"><h2>Installation & Getting Started</h2></li>
                <li class="cd-faq__item">
                  <a class="cd-faq__trigger" href="#0"><span>Does Peasi Ultimate Upsell work with my Theme?</span></a>
                  <div class="cd-faq__content">
                    <div class="text-component">
                      <p>Yes, Peasi Ultimate Upsell works with any BigCommerce themes. You're free to change themes as often as you like, our app will work with them.</p>
                    </div>
                  </div> <!-- cd-faq__content -->
                </li>

                <li class="cd-faq__item">
                  <a class="cd-faq__trigger" href="#0"><span>Where will i start to create new Offer?</span></a>
                  <div class="cd-faq__content">
                    <div class="text-component">
                        <p>From the dashboard, you can choose which type of Offer you want to create (upsell basic, cross-sell basic, upsell with boost, cross-sell with boost) etc.. <br />
                          We have the storage of tutorial videos for you to get started with Peasi Ultimate Upsell and how to manage and optimize the offers effectively.</p>
                    </div>
                  </div> <!-- cd-faq__content -->
                </li>
              </ul> <!-- cd-faq__group -->

              <ul id="whypeasi" class="cd-faq__group">
                <li class="cd-faq__title"><h2>Highlight Benefits/Why Peasi</h2></li>
                <li class="cd-faq__item">
                  <a class="cd-faq__trigger" href="#0"><span>How many offers (basic/with boost) can i create using Peasi Ultimate Upsell?</span></a>
                  <div class="cd-faq__content">
                    <div class="text-component">
                      <p>You can create multiple types of offers (upsell basic, cross-sell basic, upsell with boost, cross-sell with boost), in any trigger you want (add to cart, before checkout, and also AFTER CHECKOUT will be available ASAP). The number of offers you can create with Peasi Ultimate Upsell is unlimited!</p>
                    </div>
                  </div> <!-- cd-faq__content -->
                </li>

                <li class="cd-faq__item">
                  <a class="cd-faq__trigger" href="#0"><span>How about customer support while I'm creating offers with Peasi Ultimate Upsell?</span></a>
                  <div class="cd-faq__content">
                    <div class="text-component">
                      <p>We’re in GTM+8 so we’d glad to assist you from Monday - Saturday, from 8:00 am (GMT+7) to 6:00 pm (GMT+7). Should you need any further information, please feel free to reach us via live chat.</p>
                    </div>
                  </div> <!-- cd-faq__content -->
                </li>
              </ul> <!-- cd-faq__group -->

              <ul id="others" class="cd-faq__group">
                <li class="cd-faq__title"><h2>Others</h2></li>
                <li class="cd-faq__item">
                  <a class="cd-faq__trigger" href="#0"><span>If i work as a Freelancer / Agency?</span></a>
                  <div class="cd-faq__content">
                    <div class="text-component">
                        <p>We're providing a white-label package for our agencies that you can purchase through Paypal.<br />
                          For Agency Plan, we will discount 20% when you buy Peasi Ultimate Upsell in a year for multiple stores. <br />
                          The total price can be counted as follow: Total = 19$/month x number of your store x 12 (months) x 0.8 ( discount 20%) .
                        </p>
                    </div>
                  </div> <!-- cd-faq__content -->
                </li>
              </ul> <!-- cd-faq__group -->
            </div> <!-- cd-faq__items -->

            <a href="#0" class="cd-faq__close-panel text-replace">Close</a>

            <div class="cd-faq__overlay" aria-hidden="true"></div>
          </section> <!-- cd-faq -->
        </div>
      </div>
    </div>
  </section>
@endsection

@section('script')
  <script src="{{ asset('landingpage/js/util.js') }}"></script> <!-- util functions included in the CodyHouse framework -->
  <script src="{{ asset('landingpage/js/main.js') }}"></script>
@endsection
