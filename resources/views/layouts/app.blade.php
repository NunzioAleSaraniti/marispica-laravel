<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8"> 

        @yield('title')

        <link rel="shortcut icon" href="/images/Immagini_Varie/favicon.png" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i|Open+Sans:400,700" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Prata&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Nixie+One&family=Prata&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Nixie+One&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Prata&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Nixie+One&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Prata&display=swap" rel="stylesheet">
        <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/feather-icons"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <script> const USER_JS = {{ $user_id ?? 'null' }}; </script>
        <script> const BASE_URL = "{{ url('/') }}/"; </script>
        <script src="{{ url('/js/general.js') }}" defer></script>
        <link rel="stylesheet" href="{{ url('/css/layout.css') }}">

        @yield('scripts')

        @yield('styles')

    </head>

    <body>
        <header>
            <div class="standard_wrapper">
            <a>+39 012125658</a>
            <span> | </span>
            <a>email@email.it</a> 
            </div>
            <div class="standard_wrapper">
                <a class="house icons" href="{{ url('home') }}"><i class="fas fa-house" title="Home"></i></a>
                <span class="split">|</span>
                <a href=" {{ url('booking') }}" class="icons" title="Prenota"><i class="fas fa-plane"></i></a> 
                <a class="icons"><i class="fas fa-envelope"></i></a>
                <a href="https://www.facebook.com/iGrandiViaggi" class="icons"><i class="fab fa-facebook"></i></a> 
                <a href="https://www.instagram.com/igrandiviaggi_official/" class="icons"><i class="fab fa-instagram"></i></a> 
                <a href="https://open.spotify.com/user/00vkxo2p5cak3hiuiljjw3e1z?si=tov3raTzR7Cb36qeBd7xWA&nd=1&dlsi=39a7fe314c0d4962" class="icons"><i class="fab fa-spotify"></i></a> 
            
                @if(!$user)
                    <a href="{{ url('login') }}" class="login_button"><span>ACCEDI</span></a>
                    <span class="split">|</span>
                    <a href='{{ url('register') }}' class="signup_button"><span>REGISTRATI</span></a>
                @endif  

                @if($user)
                        <a href="{{ url('profile') }}" title="Profilo" class="profile_button" id="profile_button">
                            <span> Ciao, {{ $name }}</span>
                        </a>
                    <span class="split">|</span>
                    <a href="{{ url('logout') }}" class="logout_button" title="Effettua il log out"><span>ESCI</span></a>
                @endif
            </div>
            <div class="buttons" id="chat_button"></div>
            
            <div class="modal_section" id="chat_modal">
                <div class="modal_box">
                    <div class="modal_header">
                        <h4>Gelsomino - L'Amico Intelligente</h4>
                        <button id="close_chat">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal_body" id="chat_body">
                        <div class="msg_section">
                            <div class="chat_icon circle_div"></div>
                            <div class="chat_msg">
                                <p>Ciao @if($user){{$name}}@endif, sono Gelsomino, come posso aiutarti?</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal_footer">
                        <div class="input_msg">
                            <input name="input_msg" class="textbox" id="chat_value_input">
                            <div class="circle_div" id="send_msg"></div>
                        </div>
                    </div>
                </div>
            </div>

        </header>
    
        @yield('content')

        <section id="big_footer">
            <div id="first_contacts_column" class="contacts_columns">
                <div id="text_contacts_1">
                    <p id="IGV">
                    <strong>IGV CLUB MARISPICA</strong><br/>
                    </p>
                    <p>Santa Maria del Focallo, 97014 Ispica (Ragusa)</p>
                    <p>Tel: 0932 791.111</p>
                    <p>Fax: 0932 791.106</p>
                    <p>IT088005A1CZL39GS6</p>         
                </div>

                <div id="logo_section_contacts">
                    <div id="logo_IGV"></div>
                    <div id="logo_travellers_choice"></div>
                </div>
            </div>

            <div id="second_contacts_column" class="contacts_columns">
                <div id="text_contacts_2">
                    <strong>IGV HOTELS S.P.A.</strong>
                    <p>Gruppo <strong>iGrandiViaggi</strong></p>
                    <p id="address">Via della Moscova 36, Milano <br/> P.IVA 00124990797
                    </p>
                    <div class="contacts_list">
                    <i class="fas fa-phone"></i>
                    <a>+39 02 29046565</a>
                    </div>
                    <div class="contacts_list">
                    <i class="fas fa-envelope"></i>
                    <a>uff.passeggeri@igrandiviaggi.it</a>
                    </div>
                    <div class="contacts_list">
                    <i class="fas fa-envelope"></i>
                    <a>igv.up@igrandiviaggi.it</a>
                    </div>
                    <div class="contacts_list">
                    <i class="fas fa-envelope"></i>
                    <a>marispica@igrandiviaggi.it</a>
                    </div>
                </div>
            </div>
        </section>

        <footer>
            <div class="standard_wrapper">
            <span id="footer_text">
            © Copyright 2025   i Grandi Viaggi,   All Rights Reserved
            </span> 
            </div>
            <div class="standard_wrapper">
            <a class="house icons" href="{{ url('home') }}"><i class="fas fa-house" title="Home"></i></a>
                <span class="split">|</span>
                <a href=" {{ url('booking') }}" class="icons" title="Prenota"><i class="fas fa-plane"></i></a> 
                <a href="{{ url('profile') }}"><i class="fas fa-user"></i></a>
                <a class="icons"><i class="fas fa-envelope"></i></a>
                <a href="https://www.facebook.com/iGrandiViaggi" class="icons"><i class="fab fa-facebook"></i></a> 
                <a href="https://www.instagram.com/igrandiviaggi_official/" class="icons"><i class="fab fa-instagram"></i></a> 
                <a href="https://open.spotify.com/user/00vkxo2p5cak3hiuiljjw3e1z?si=tov3raTzR7Cb36qeBd7xWA&nd=1&dlsi=39a7fe314c0d4962" class="icons"><i class="fab fa-spotify"></i></a> 
            </div>
        </footer>
    </body>
</html>
