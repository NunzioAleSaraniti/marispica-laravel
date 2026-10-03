@extends('layouts.app')

@section('title')
  <title>Profilo - {{ $name }}</title>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ url('/css/layout.css') }}">
  <link rel="stylesheet" href="{{ url('/css/profile.css') }}">
@endsection

@section('scripts')
  <script src="{{ url('/js/profile.js') }}" defer="true"></script>
@endsection

@section('content')
<div class="ghost"></div>
    <div id="big_header">     
        <div id="logo"></div>
        <nav>
            <a href="{{ url('home') }}" id="home_nav">HOME</a>
            <a href="{{ url('booking') }}">PRENOTA ORA</a>
        </nav>
        <div id="menu">
          <div></div>
          <div></div>
          <div></div>
        </div>
    </div>

    <div id="mobile_menu" class="mobile_hidden">
      <div id="section_mobile_menu">
        <div id="mobile_nav">
          <a href="{{ url('home') }}">HOME</a>
          <a href="{{ url('booking') }}">PRENOTA ORA</a>
        </div>
      </div>
    </div>

    <section class="section_type sidebar">
      <div class="classic_box">
        <div class="classic_wrap center_text">
            <div class="title_box"><h2>{{ $name }}</h2></div>
            <div class="title_box"><h5>Benvenuto sul tuo profilo</h5></div>
        </div>
      </div>

      <div class="sidebar_tools">
        <a href="#holiday" class="sidebar_tool" id="booking_tool">
          <h4>La tua vacanza</h4>
        </a>
        <a href="#activity" class="sidebar_tool" id="booking_tool">
          <h4>Le tua attività</h4>
        </a>
        <a href="#info_section" class="sidebar_tool" id="booking_tool">
          <h4>Le tue Info</h4>
        </a>
      <div class="separator"></div>
    </section>
    <main>
      <section class="section_type" id="holiday">
        <div class="centered"><h2>La tua vacanza</h2></div>
        <div class="central_builder">
          <div class="classic_box">
            <div class="classic_wrap" id="fav_room_container">
              <h3>La tua camera preferita:</h3>
              <div class="classic_wrap center_text" id="fav_room_box">
                <div id="fav_room_img"></div>
                <a href="{{ url('home#fourth_section')}}" class="title_box" id="fav_room"></a>
              </div>
            </div>
          </div>
          <div class="classic_box">
            <div class="classic_wrap" id="booking_container">
                <h3>Le tue prenotazioni:</h3>
                  <a href=" {{ url('/booking') }}" class="x_button buttons"><span>+</span></a>
                  <div class="central_builder_three_columns" id="bookings">
                  </div>
              </div>
          </div>
        </div>
      </section>

      <section class="section_type" id="activity">
        <div class="centered"><h2>Le tue attività</h2></div>
          <div class="central_builder">
            <div class="classic_box">
              <div class="classic_wrap" id="fb_container">
                <h3>Le tue recensioni:</h3>
                <a href=" {{ url('/home#input_feedback') }}" class="x_button buttons"><span>+</span></a>
              <div class="classic_wrap" id="fb_list"></div>  
              </div>
            </div>
            <div class="classic_box" id="events_box">
              <div class="classic_wrap" id="events_container">
                <h3>I tuoi eventi:</h3>
                <a href=" {{ url('/home#api_section') }}" class="x_button buttons"><span>+</span></a>
                <div class="classic_wrap" id="events"></div>  
            </div>
            </div>
          </div>
      </section>
      <section class="section_type" id="info_section">
        <div class="centered"><h2>Le tue info</h2></div>
        <section class="section_type" id="data">
          <div class="central_builder">
            <div class="classic_box">
              <div class="classic_wrap" id="data_fetch">
                <h3>Le tue info:</h3>
                <div class="classic_wrap" id="results"></div>
              <div class="centered">
                <a href="{{ url('home') }}" class="x_button buttons delete_user"><span>Elimina</span></a>
                <div class="x_button buttons mod_user_button"><span>Modifica</span></div>
              </div>
              </div>
            </div>         
              <div class="classic_box" id="modify_data">
                <div class="classic_wrap">
                  <h3>Modifica i dati</h3>
                  <form method="POST" action="{{ url('user/modify/data') }}">
                    @csrf

                    <div clasS="centered">
                      @if ($error == 'empty_fields')
                      <section class="error show"><span>Riempi tutti i campi</span></section>
                    @elseif ($error == 'same_data')
                      <section class="error show"><span>Nome/Cognome invariati</span></section>
                    @endif
                    </div>
              
                      <div class="label_and_textbox name">
                          <label for="name_input">Nome</label>
                          <input type="text" class="textbox" name="name" id="name_input" value="{{ old("name") }}">
                      </div>
                      <div class="label_and_textbox surname">
                          <label for="surname_input">Cognome</label>
                          <input type="text" class="textbox" name="surname" id="surname_input" value="{{ old("surname") }}">
                      </div>
                      <span>*Non puoi effettuare il cambio dell'username o dell'email. Questo comporta creare un nuovo account.</span>         
                        <input type="submit" value="Salva" class="x_button buttons" id="submit_modify"></input>
                  </form>
                </div>
              </div>
        </section>
      </section>
    </main>
@endsection
 