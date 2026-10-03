@extends('layouts.app')

@section('title')
  <title>Prenota - Marispica</title>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ url('/css/layout.css') }}">
<link rel="stylesheet" href="{{ url('/css/booking.css') }}">
@endsection

@section('scripts')
  <script src="{{ url('/js/booking.js') }}" defer="true"></script>

@section('content')

    <div id="mobile_menu" class="mobile_hidden">
      <div id="section_mobile_menu">
        <div id="mobile_nav">
          <a href="{{ url('home') }}">HOME</a>
          <a href="{{ url('profile') }}">PROFILO</a>
        </div>
      </div>
    </div>
    
    <section id="main" class="section_type">
        <div class="centered title_box">
            <h2>Prenota Ora</h2>
        </div>
   
      <form name="booking" method="post" enctype="multipart/form-data" action="booking" autocomplete="off">
        @csrf
        <div class="centered">
          @if ($error == 'empty_fields')
              <section class="error show"><span>Riempi tutti i campi</span></section>
          @elseif ($error == 'date_error')
              <section class="error show"><span>Controlla le date</span></section>
          @elseif ($error == 'members_error')
              <section class="error show"><span>Partecipanti: min 1 - max 6</span></section>
          @elseif ($error == 'animals_error')
              <section class="error show"><span>Scegli Si o No nella voce Animali</span></section>
          @elseif ($error == 'invalid_room')
              <section class="error show"><span>Scegli una camera tra quelle disponibili</span></section>
          @elseif ($error == 'not_allow')
              <section class="error show"><span>Accetta l'informativa sulla privacy</span></section>
          @endif
        </div>
        <div class="box_input_section">
          <div class="two_box_next_to">
            <div class="name label_and_textbox margin-right--space-more">
              <label for="name">Nome</label>
              <input type="text" class="textbox" name="name" value="{{ old("name") }}">
              <div class="wrong"><span>Devi inserire il tuo nome</span></div>
            </div>
            <div class="surname label_and_textbox">
              <label for="surname">Cognome</label>
              <input type="text" class="textbox" name="surname" value="{{ old("surname") }}">
              <div class="wrong"><span>Devi inserire il tuo cognome</span></div>
            </div>
          </div>
          <div class="two_box_next_to">
            <div class="telephone label_and_textbox margin-right--space-more">
              <label for="telephone">Telefono</label>
              <input type="text" class="textbox" name="telephone"value="{{ old("telephone") }}">
              <div class="wrong"><span>Devi inserire il tuo telefono</span></div>
            </div>
            <div class="email label_and_textbox">
              <label for="email">Email</label>
              <input type="text" class="textbox" name="email" value="{{ old("email") }}">
              <div class="wrong"><span>Devi inserire la tua email</span></div>
            </div>
          </div>
          <div class="two_box_next_to">
            <div class="members label_and_textbox margin-right--space-more">
              <label for="members">N.partecipanti</label>
              <input type="number" class="textbox" name="members"value="{{ old("members") }}">
              <div class="wrong"><span>Inserisci il numero di partecipanti (min 1 - max 6)</span></div>
            </div>
            <div class="animals label_and_textbox">
              <label for="animals">Animale domestico</label>
              <input type="text" class="textbox" name="animals"value="{{ old("animals") }}">
            <div class="wrong"><span>Scegli tra Si o No</span></div>
            </div>
          </div>
          <div class="room label_and_textbox">
            <label for="room">Camera</label>
            <input type="text" class="textbox" name="room" value="{{ old("room") }}">
            <div class="wrong"><span>Scegli una tipologia valida di camera: Suite, Superior, Classica, Cottage, Cottage Deluxe</span></div>
          </div>
          <div class="two_box_next_to">
            <div class="check_in label_and_textbox margin-right--space-more">
              <label for="check_in">Inizio Soggiorno</label>
              <input type="date" class="textbox" name="check_in" value="{{ old("check_in") }}">
              <div class="wrong"><span>Scegli una data</span></div>
            </div>
            <div class="check_out label_and_textbox">
              <label for="check_out">Fine Soggiorno</label>
              <input type="date" class="textbox" name="check_out" value="{{ old("check_out") }}">
              <div class="wrong"><span class="change_desc">Scegli una data</span></div>
            </div>
          </div>
          <div class="message label_and_textbox">
            <label for="message">Messaggio (facoltativo)</label>
            <textarea class="textbox" name="message">{{ old("message") }}</textarea>
          </div>
        </div>
        
        <div class="allow"> 
          <div class="text_of_checkbox">
            <input type='checkbox' name='allow' value="1" class="checkbox" @if(old('allow')) checked @endif>
            <label for='allow'>Accetto i termini e condizioni sull'informativa sulla privacy*</label>
          </div>
            <div class="wrong"><span>Devi accettare i termini e le condizioni</span></div>
        </div>
        <div class="centered">
          <input type='submit' value="INVIA" id="submit" class="submit_button buttons">
        </div>
      </form>
    </section>
@endsection