<html>
    <head>
        <link rel='stylesheet' href='/css/signup.css'>
        <script src='{{ URL::to("signup.js") }}' defer></script>
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
        <title>Iscriviti - IGV Club</title>
    </head>

    <body>
        <header>
            <a href="index.php"><img src="Immagini_Varie/logo_marispica.png" id="logo"></a>
        </header>
        <main>
            <section class="central_builder">
                <h1>Iscriviti gratuitamente per poter prenotare la tua vacanza dei sogni!</h1>
                
                <form name='signup' method='post' autocomplete="off" action="{{ route('register') }}">

                    <div class="name label_and_textbox">
                        <label for='name'>Nome</label>
                        <input type="text" name="name" class="textbox @error('name') is-invalid @enderror" value="{{ old('name') }}" autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="surname label_and_textbox">
                        <label for='surname'>Cognome</label>
                        <input type='text' name='surname' class="textbox @error('surname') is-invalid @enderror" value="{{ old('surname') }}"  autocomplete="surname" autofocus>
                        @error('surname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                        
                    <div class="username label_and_textbox">
                        <label for='username'>Nome utente</label>
                        <input type='text' name='username' class="textbox @error('username') is-invalid @enderror" value="{{ old('username') }}" autocomplete="username" autofocus>
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="email label_and_textbox">
                        <label for='email'>Email</label>
                        <input type='text' name='email' class="textbox @error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="password label_and_textbox">
                        <label for='password'>Password</label>
                        <div class="password_container">
                            <input type='password' name='password' class="textbox @error('password') is-invalid @enderror" id="password_value" value="{{ old('password') }}" autocomplete="new_password" autofocus>
                            <button type="button"><img src="Immagini_Varie/show_password.svg" id="toggle_password"></button>    
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="confirm_password label_and_textbox">
                        <label for='confirm_password'>Conferma Password</label>
                        <input type='password' name='confirm_password' class="textbox" autocomplete="new_password">                  
                    </div>
                    <div class="allow"> 
                    <div class="text_of_checkbox">
                    <input type='checkbox' name='allow' value="1" class="checkbox" value="1" {{ old('allow') ? 'checked' : '' }}>
                    <label for='allow'>Accetto i termini e condizioni sull'informativa sulla privacy*</label>
                    </div>

                    @error('allow')
                        <div class="wrong"><span>Devi accettare i termini e le condizioni</span></div>
                    @enderror
                    </div>
                    <div class="centered">
                        <input type='submit' value="Registrati" id="submit" class="signup_button">
                    </div>
                </form>
                <div class="centered">
                    <span>Hai già un account?</span>
                    <a href="{{ route('login') }}" class="login_button">ACCEDI</a>
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
