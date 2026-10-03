<html>
    <head>
        <link rel='stylesheet' href="{{ url('/css/layout.css') }}">
        <link rel='stylesheet' href={{ url('css/signup.css') }}>
        <script src="{{ url('/js/general.js') }}" defer></script>
        <script src={{ url('/js/signup.js') }} defer></script>
        <script> const BASE_URL = "{{ url('/') }}/"; </script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <title>Iscriviti - IGV Club</title>
    </head>
    <body>
        <main id="#main">
        <section class="central_builder">

            <div id="form_title" class="centered title_box">
                <h2>ISCRIVITI</h2>
            </div>
            
            <form name='signup' method='post' enctype="multipart/form-data" autocomplete="off">
            @csrf
                <div class="centered">
                    @if ($error == 'empty_fields')
                    <section class="error">Riempi tutti i campi</section>
                @elseif($error == 'bad_password')
                    <section class="error">Le password non corrispondono</section>
                    @elseif($error == 'username_existing')
                    <section class="error">Nome utente già esistente</section>
                @elseif($error == 'email_existing')
                    <section class="error">Email già associata ad un altro account</section>
                        @elseif($error == 'not_allow')
                    <section class="error">Accetta i termini</section>
                @endif
            </div>
            
                <div class="names">
                    <div class="two_box_next_to">
                        <div class="name label_and_textbox margin-right--space-more">
                            <label for='name'>Nome</label>
                            <input type="text" name="name" class="textbox" value="{{ old("name") }}">
                            <div class="wrong"><span>Devi inserire il tuo nome</span></div>
                        </div>
                    
                        <div class="surname label_and_textbox">
                            <label for='surname'>Cognome</label>
                            <input type='text' name='surname' class="textbox" value="{{ old("surname") }}">
                            <div class="wrong"><span>Devi inserire il tuo cognome</span></div>
                        </div>
                    </div>
                </div>
                <div class="two_box_next_to">
                    <div class="username label_and_textbox margin-right--space-more">
                        <label for='username'>Nome utente</label>
                        <input type='text' name='username' class="textbox" value="{{ old("username") }}">
                        <div class="wrong"><span>Username non valido</span></div>
                    </div>
                    <div class="email label_and_textbox">
                        <label for='email'>Email</label>
                        <input type='text' name='email' class="textbox" value="{{ old("email") }}">
                        <div class="wrong"><span>Indirizzo email non valido</span></div>
                    </div>
                </div>
                <div class="password label_and_textbox">
                    <label for='password'>Password</label>
                    <div class="password_container">
                        <input type='password' name='password' class="textbox" id="password_value" value="{{ old("password") }}">
                        <button type="button"><img src="/images/Immagini_Varie/show_password.png" id="toggle_password"></button>    
                    </div>
                        <div class="wrong"><span>Requisiti minimi: 1 lettera maiuscola, 1 lettera minuscola, 1 numero, 1 carattere speciale, 8 lunghezza minima</span></div>
                </div>
                <div class="confirm_password label_and_textbox">
                    <label for='confirm_password'>Conferma Password</label>
                    <input type='password' name='confirm_password' class="textbox" value="{{ old("confirm_password") }}">
                    <div class="wrong"><span>Le password non coincidono</span></div>
                </div>
                <div class="allow"> 
                  <div class="text_of_checkbox">
                  <input type='checkbox' name='allow' value="1" class="checkbox" @if(old('allow')) checked @endif>
                  <label for='allow'>Accetto i termini e condizioni sull'informativa sulla privacy*</label>
                  </div>
                  <div class="wrong"><span>Devi accettare i termini e le condizioni</span></div>
                </div>
                <div class="centered" id="signup">
                    <input type='submit' value="ISCRIVITI" id="submit" class="signup_button">
                </div>

            <div class="menu">
                    <div class="standard_wrapper">
                    <a href="{{ url('home') }}"><i class="fas fa-house"></i></a>
                    <a><i class="fas fa-envelope"></i></a>
                    <a href="https://www.facebook.com/iGrandiViaggi"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.instagram.com/igrandiviaggi_official/"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.tripadvisor.it/Hotel_Review-g1028657-d1380068-Reviews-IGV_Club_Marispica-Ispica_Province_of_Ragusa_Sicily.html"><i class="fas fa-plane"></i></a> 
                    <a href="https://open.spotify.com/user/00vkxo2p5cak3hiuiljjw3e1z?si=tov3raTzR7Cb36qeBd7xWA&nd=1&dlsi=39a7fe314c0d4962"><i class="fab fa-spotify"></i></a>
                    </div>
                </div>
            </form>
            <div class="centered row_items">
                <span>Hai già un account?</span>
                <a href="{{ url('login') }}">Accedi</a>
            </div>
        </section>
        </main>
    </body>
</html>