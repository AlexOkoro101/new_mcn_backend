@extends('layouts.master')

@section('title')
  Data Cart
@endsection

@section('content')
      <!-- Main -->
        <article id="main">
        <br><br><br>
                    <section class="wrapper style3 container special">
                                  <header class="major">
                              <i class="fa fa-shopping-cart" aria-hidden="true" style="font-size: 60px"></i><br>
                                <h2><strong>Your&nbsp;</strong>Cart&nbsp;</h2>
                              </header>                            
                    <hr>
                      @if(Session::has('Success'))
                        <div class="row">
                          <div class="12u 12u(mobile)">
                            <div class="alert alert-success">
                              {{Session::get('Success')}}
                            </div>
                          </div>
                        </div>
                      @endif
                    @if(Session::has('cart'))
                      <div class="row">
                        <div class="12u 12u(mobile)">
                          <table id="cart_table">
                            <thead>
                              <tr>
                                <th><p>Quantity</p></th>
                                <th><p>Network</p></th>
                                <th><p>Price</p></th>
                                <th><p>Phone Number</p></th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                 @foreach($data as $key => $netData)
                                <td>
                                  <p>
                                    <select id="data_q">
                                      <option autofocus>{{ $netData['qty'] }}</option>
                                      <option>2</option>
                                      <option>3</option>
                                      <option>4</option>
                                      <option>5</option>
                                      <option>6</option>
                                      <option>7</option>
                                      <option>8</option>
                                      <option>9</option>
                                      <option>10</option>
                                    </select>
                                  </p>
                                </td>
                                <td><p><img src=".jpg"> {{ $netData['quantity'] }} </p></td>
                                <td><p>  &#8358 {{ $netData['price'] }}</p></td>
                                <td><p> {{ $netData['phone'] }}</p></td>
                                <td> <a href="{{url('/data/remove/'.$key)}}" type="button" class="button danger small" id="remove_item"><span class="fa fa-times"></span></a></td>
                                  
                              </tr>
                            </tbody>
                          </table>
                        <!--   <ul >

                            
                            <br>
                              <li style="text-align: center !important">
                                <span>{{ $netData['qty'] }}(Qty)</span>&nbsp;&nbsp;&nbsp;
                                <strong>
                                  {{ $netData['network']." ".$netData['quantity'] }}
                                </strong>&nbsp;&nbsp;&nbsp;
                                <span>
                                  {{ $netData['price'] }}
                                </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>
                                  {{ $netData['phone'] }}
                                </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              <a href="{{url('/data/remove/'.$key)}}" type="button" class="button danger small">Remove</a>
                              </li>
                            @endforeach
                            <br>
                          </ul> -->
                        </div>
                        <div class="12u 12u(narrower)">
                          <p class="lead">Total Price: <strong>&#x20A6;{{$totalPrice}}</strong></p>
                        </div>
                        <div class="12u 12u(mobile)">
                          <a class="button primary" href="{{url('/data/clear')}}">Clear Cart</a>
                          <a class="button info" href="{{url('/data')}}">Go to Data</a>
                          <a href="{{url('/checkout')}}" class="button success">Checkout</a>
                        </div>
                      </div>
        </div>
    @else
    <h1>NO ITEMS IN YOUR CART.</h1>
    <div class="row">
      <div class="12u 12u(mobile)">
        
          <a href="{{url('/data/mtn')}}" class="button primary small">Go to MTN</a>
          <a href="{{url('/data/airtel')}}" class="button primary small">Go to Airtel</a>
          <a href="{{url('/data/etisalat')}}" class="button primary small">Go to Etisalat</a>
          <a href="{{url('/data/glo')}}" class="button primary small">Go to Glo</a>
        
      </div>  
    </div>
    @endif
  </section>
  </article>
  </div>
@endsection