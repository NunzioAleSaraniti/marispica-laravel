<html>
    <head>
        <link rel='stylesheet' href="{{ url('/css/layout.css') }}">
        <link rel='stylesheet' href="{{ url('/css/login.css') }}">
        <script src="{{ url('/js/general.js') }}" defer></script>
        <script src="{{ url('/js/login.js') }}" defer></script>
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
        <title>Accedi - IGV Club</title>
    </head>
    <body>
        <main id="main">
            <section class="central_builder">

                <div id="form_title" class="centered title_box">
                    <h2>ACCEDI</h2r>
                </div>

                <form name='login' method='post' autocomplete="off">
                    @csrf

                    <div class="centered">
                        @if ($error == 'empty_fields')
                            <section class="error show">Riempi tutti i campi</section>
                        @elseif ($error == 'wrong')
                            <section class="error show">Username/Password errati</section>
                        @else
                            <section class="error"> </section>
                        @endif
                    </div>
                
                    <div class="username label_and_textbox">
                        <label for='username'>Username</label>
                        <input type='text' name='username' class="textbox" value="{{ old("username") }}">
                        <div class="wrong"><span>Inserisci username</span></div>
                    </div>
                    <div class="password label_and_textbox">
                        <label for='password'>Password</label>
                        <div class="password_container">
                            <input type='password' name='password' class="textbox" id="password_value">
                            <button type="button"><img src="/images/Immagini_Varie/show_password.png" id="toggle_password"></button>    
                        </div>
                        <div class="wrong"><span>Inserisci password</span></div>
                    </div>

                    <div class="centered">
                        <input type='submit' value="ACCEDI" id="submit" class="login_button">
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
                    <span>Non hai un account?</span>
                    <a href="{{ url('register') }}">Iscriviti</a>
                </div>
            </section>
        </main>
    </body>
</html>