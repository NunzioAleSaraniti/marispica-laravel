<html>
    <head>
        <link rel='stylesheet' href='/css/login.css'>
        <script src='/js/login.js' defer></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="Immagini_Varie/favicon.png" type="image/x-icon">
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
        <header>
            <a href="index.php"><img src="Immagini_Varie/logo_marispica.png" id="logo"></a>
        </header>
            
        <main>
            <section class="central_builder">
                <h1>Per continuare, accedi a IGV Club.</h1>
                @foreach($errors->all() as $e)
                    <p class='error'>{{ $e }}</p>
                @endforeach

                <form name='login' method='post' action="{{ route('login') }}">
                    @csrf
                    <div class="username label_and_textbox">
                        <label for='email'>Email</label>
                        <input type='email' name='email' class="textbox @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <div class="wrong"><span>Inserisci email</span></div>
                        @enderror
                    </div>

                    <div class="password label_and_textbox">
                        <label for='password'>Password</label>
                        <div class="password_container">
                            <input type='password' name='password' class="textbox  @error('password') is-invalid @enderror" id="password_value">
                            <button type="button"><img src="Immagini_Varie/show_password.svg" id="toggle_password"></button>    
                        </div>
                        @error('password')
                        <div class="wrong"><span>Inserisci password</span></div>
                        @enderror
                    </div>
                    <div class="centered">
                        <input type='submit' value="Accedi" id="submit" class="login_button">
                    </div>
                </form>
            
            <div class="centered">
                <span>Non hai un account?</span>
                <a href="{{ URL::to('signup') }}" class="signup_button">ISCRIVITI</a>
            </div>

            </section>
        </main>

        <footer>
            <div id="footer_blocco_left">
            <span id="footer_text">© Copyright 2025   i Grandi Viaggi,   All Rights Reserved</span> 
            </div>
                <div id="footer_blocco_right">
                <a><i class="fas fa-phone"></i></a>
                <a><i class="fas fa-envelope"></i></a>
                <a href="https://www.facebook.com/iGrandiViaggi"><i class="fab fa-facebook"></i></a>
                <a href="https://www.instagram.com/igrandiviaggi_official/"><i class="fab fa-instagram"></i></a>
                <a href="https://www.tripadvisor.it/Hotel_Review-g1028657-d1380068-Reviews-IGV_Club_Marispica-Ispica_Province_of_Ragusa_Sicily.html"><i class="fas fa-plane"></i></a> 
                <a href="https://open.spotify.com/user/00vkxo2p5cak3hiuiljjw3e1z?si=tov3raTzR7Cb36qeBd7xWA&nd=1&dlsi=39a7fe314c0d4962"><i class="fab fa-spotify"></i></a> 
            </div>
        </footer>
    </body>
</html>
