@extends('layouts.master')

@section('title')
Branding
@endsection

@section('content')
      <!-- Main -->
        <article id="main">
        <br><br><br>

          <header class="special container">
            <span class="icon fa-bolt"></span>
            <h2>Our Branding<strong>&nbsp;Experience</strong></h2>
          </header>

          <!-- One -->
            <section class="wrapper style4 container">

              <!-- Content -->
                <div class="content">
                  <section>
                    <a href="{{url('/branding/create')}}" class="image featured"><img src="img/brand.jpg" alt="" /></a>
                    <header>
                    <br>
                      <h3>Branding At It's Best</h3>
                    </header>
                    <p> Mighty is a community of Communication Designers & Advertisers (Brand & Graphics, Media+Event Planners, Architects, Retail Shop designers, SignMakers), Artists (Copywriters, Photographers, Furniture Makers, Welders, Sig, Project Managers) that inspires, motivates and supports one another to succeed in the ultimate achievement of a rewarding retail visibility, engagement and interactions for our numerous customers.</p>

                <p>We have been in the business of continuously elevating brands from zero level to envy zones. With a formidable team of creative minds, we have produced smart, visually engaging and mind blowing marketing and communications strategies that have conveyed powerful messages and delivered responses. We are a full service branding and advertising agency providing expertise to help companies meet business objectives, accelerate growth and compete effectively in an ever changing environment. </p>

                <p>Our business driven strategies and distinctive design solutions form the foundation for building brands that communicate the values, mission, products and services that differentiate our clients in the only place that really matters- the market place. </p>
                    <a class="button success pull-right" href="{{url('/branding/create')}}"><i class="fa fa-check-circle-o"></i>&nbsp;Request Quote</i></a><br>
                  </section>
                </div>

            </section>

          <!-- Two -->
            <section class="wrapper style1 container special">
              <div class="row">
                <div class="4u 12u(narrower)">

                  <section>
                    <header>
                      <h3>Point of Sale Display (POS Display)</h3>
                    </header>
                    <p>A point-of-sale display (POS display) is a specialized form of sales promotional material that is found near, on, or next to a checkout counter (the "point of sale"). They are intended to draw the customers' attention to products, which may be new products, or on special offer, and are also used to promote special events, e.g. seasonal or holiday-time sales. POS displays can include shelf edging, dummy packs, display packs, display stands, mobiles, posters, and banners. Collaboration is the spirit with which little strengths are coupled together to do great feats. We collaborate to achieve.</p>
                    <footer>
                      <ul class="buttons">
                        <li><a href="{{url('/branding/create')}}" class="button success small"><i class="fa fa-check-circle-o"></i>&nbsp;Request Quote</a></li>
                      </ul>
                    </footer>
                  </section>

                </div>
                <div class="4u 12u(narrower)">

                  <section>
                    <header>
                      <h3>Interior Branding</h3>
                    </header>
                     <p>In Mighty Solution, we see branding from an abstract perspective. We believe Branding is possibly the most overused and least understood term in modern business. We simply define branding as the sum of the perceptions and experiences people have of your company.</p>
                    <p>What could be a more powerful experience of your brand than when someone walks through your door? At this point, they are literally immersed in your brand – for better or worse! With standout Interior Design and Branding, customers will be inspired and more inclined to work with you.   </p>
                    <footer>
                      <ul class="buttons">
                        <li><a href="{{url('/branding/create')}}" class="button success small"><i class="fa fa-check-circle-o"></i>&nbsp;Request Quote</a></li>
                      </ul>
                    </footer>
                  </section>

                </div>
                <div class="4u 12u(narrower)">

                  <section>
                    <header>
                      <h3>Others</h3>
                    </header>
                    <p>Do you have a unique need not stated here? No worries ! </p>
                    <footer>
                      <ul class="buttons">
                        <li><a href="{{url('/branding/create')}}" class="button success small"><i class="fa fa-check-circle-o"></i>&nbsp;Request Quote</a></li>
                      </ul>
                    </footer>
                  </section>

                </div>
              </div>
            </section>

        </article>
@endsection
      