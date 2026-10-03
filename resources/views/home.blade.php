@extends('layouts.app')

@section('title')
  <title>Marispica - i Grandi Viaggi - Sicilia</title>
@endsection

@section('styles')
  <link rel="stylesheet" href="{{ url('/css/home.css') }}">
@endsection

@section('scripts')
  <script src="{{ url('/js/home.js') }}" defer="true"></script>
@endsection

@section('content')

  <div id="big_header">
    <div id="logo"></div>
    <nav>
      <a href="{{ url('home') }}" id="home">HOME</a>
      <a href="#second_section">LUOGO</a>
      <a href="#fourth_section">CAMERE</a>
      <a @if ($user) href="#api_section" @else href="#login_section" @endif>ATTIVITÀ</a>
      <a href="#user_feedback">ABOUT US</a>
      <a href="#place_section">DOVE SIAMO</a>
      <a href="#big_footer">CONTATTI</a>
      <a href=" {{ url('home/en') }}"><img src="/images/Flag/it.png" class="flag" id="big_header_flag"></a>
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
          <a href="{{ url('home') }}" id="home">HOME</a>
          <a href="#second_section">LUOGO</a>
          <a href="#fourth_section">CAMERE</a>
          <a @if ($user) href="#api_section" @else href="#login_section" @endif>ATTIVITÀ</a>
          <a href="#user_feedback">ABOUT US</a>
          <a href="#place_section">DOVE SIAMO</a>
          <a href="#big_footer">CONTATTI</a>
          <a><img src="/images/Flag/it.png" class="flag" id="big_header_flag"></a>
          </div>
      </div>
  </div>

  <div class="modal_view" id="modal_info">
    <div class="modal_section">
      <div class="modal_box">
        <div class="modal_header">
          <h3>Altre Informazioni</h3>
          <button class="close_button">
            <i class="fas fa-times"></i>
          </button>
        </div>
        <div class="modal_body">
          <p>
            <strong>- Sala convegni</strong> Marispica dispone di una Sala Convegni che può ospitare fino a 120/140 persone e che può essere allestita ad aula o a tavola rotonda, secondo le necessità.
          </p>
          <p>
            <strong>- Carte di credito accettate</strong> American Express, Diners, Maestro, MasterCard,Visa e CartaSi.
          </p>
          <p>
            <strong>- Animali</strong> Non sono ammessi.
          </p>
          <p>
            <strong>- Minori</strong> I minori non accompagnati non possono essere ospitati.
          </p>
        </div>
        <div class="modal_footer">
          <button class="buttons close_button">
            <span>CHIUDI</span>
          </button>
        </div>
      </div>
    </div>   
  </div>

  <div class="buttons" id="album_button"><span>ALBUM</span></div>

  <main>
    <section id="home_section">
      <div id="background_image"></div>
        <div id="home_title_section">
          <h1>TOTALE SERENITÀ IN SICILIA</h1>
          <h2>PENSATO PER OFFRIRE ALLA FAMIGLIA LA MIGLIORE VACANZA POSSIBILE IN <br/>SICILIA</h2>
          <a href="{{ url('booking') }}" class="buttons circle">
            <span>PRENOTA ORA</span>
          </a>
        </div>
    </section>

    <div id="img_album" class="modal_view">
      <div class="image_modal_box">
        <button  id="close_album" class="close_button">
          <i class="fas fa-times"></i>
         </button>
        <div id="images_box" class="image_box">
          <img id="front_image" src="/images/Album/image_1.jpg" >
        </div>
        <div class="thumbnail">
          <div class="miniature_box">
            <img src="/images/Album/image_1.jpg" class="miniature_photo">
          </div>
          <div class="miniature_box">
            <img src="/images/Album/image_2.jpg" class="miniature_photo">
          </div>
          <div class="miniature_box">
            <img src="/images/Album/image_3.jpg" class="miniature_photo">
          </div>
          <div class="miniature_box">
            <img src="/images/Album/image_4.jpg" class="miniature_photo">
          </div>
          <div class="miniature_box">
            <img src="/images/Album/image_5.jpg" class="miniature_photo">
          </div>
          <div class="miniature_box">
            <img src="/images/Album/image_6.jpg" class="miniature_photo">
          </div>
        </div>
      </div>
    </div>
  
      <section class="section_type white_background" id="second_section">
        <div class="central_builder">
          <div class="classic_box">
            <div id="img2" class="full_img">
            </div>
          </div>
          <div class="classic_box">
            <div id ="title2">
              <h2>Il luogo</h2>
            </div>
            <div class="separator">
            </div>
            <div id="explain2">
              <p>L’estremo Sud della Sicilia regala un meraviglioso paesaggio, in cui si fondono lunghe spiagge e macchia mediterranea.<br/>
                I suoi fortunati visitatori potranno perdersi, immergersi completamente nel verde di splendidi giardini fioriti.<br/>
                A poca distanza potranno incantarsi ammirando le splendide località del Barocco Siciliano e cedere ai peccati di gola nella casa di tante specialità gastronomiche che hanno reso questa terra famosa in tutto il mondo.</p>
                <p>Marispica sorge al limitare di una lunga spiaggia di sabbia fine completamente attrezzata. Il mare digrada dolcemente consentendo a tutti di fare il bagno. Ideale per famiglie con bambini. I nostri animatori proporranno, oltre alle varie attività sportive e ricreative, passeggiate in bicicletta e percorsi vitae fra le dune. Non ci sarà mai un minuto di noia, solo tanta gioia di vivere. I grandi potranno godersi questa vacanza in totale serenità, mentre i bambini si divertono in tutta sicurezza.</p>
            </div>
            <a id="n1_button2" class="buttons circle inverse_button" href="https://www.youtube.com/watch?v=8Acp3DMcrXk" target="_blanck">
              <i class="fa-play-circle fas button-icon-left"></i> 
              <span>GUARDA IL VIDEO</span>
            </a>
            <div id="gap2_second_section" class="white_gap"></div>
            <div id="button_block">
            <a id="n2_button2" class="buttons circle more_info">
                <span>ALTRE INFORMAZIONI</span>
            </a>
              <a href="{{ url('booking') }}" class="buttons circle" id="n3_button2">
              <span>PRENOTA ORA</span>
            </a>
            </div>
          </div>
        </div>
      </section>

      <section class="section_type gray_background" id="third_section">
        <div class="title_box">
          <h2>La struttura</h2>
        </div>
        <div class="separator margin-p--bottom">
        </div>
        <div id="explain3">
          <h3>Ambiente elegante in posizione privilegiata, tutti i servizi per<br/> bambini e ragazzi, nursery perfettamente attrezzata, servizio<br/> medico e pediatrico</h3>
        </div>
      </section>

      <section id="fourth_section" class="section_type gray_background">
        <div class="central_builder">
          <div class="classic_box">
            <div id="img4" class="full_img"><img id="img_4" src="/images/Rooms/suite.jpg"></div>
          </div>
          <div class="classic_box">
            <div  class="title_box">
              <h3>Sistemazione</h3>
            </div>
            <div class="info">
              <strong>Cottage</strong>
              <p>Inseriti nel verde di giardini fioriti, sono a 2-3-4 letti, dotati di telefono, TV, minifrigo, cassaforte, asciugacapelli, aria condizionata, veranda o terrazzino. (circa 23mq).
                @if($user)
                    <span><i class="fa-heart fas button-icon-left like" data-room="Cottage"></i></span>
                @endif
              </p>
              <strong>Cottage Deluxe</strong>
              <p>Cottage Inseriti nel verde di giardini fioriti, sono a 2-3-4 letti, dotati di telefono, TV, minifrigo, cassaforte, asciugacapelli, aria condizionata, veranda o terrazzino, ma completamente ristrutturati e rinnovati nell’arredamento.
                @if($user)
                    <span><i class="fa-heart fas button-icon-left like" data-room="Cottage Deluxe"></i></span>
                @endif
              </p>
              <strong>Superior</strong>
              <p>Completamente ristrutturati e rinnovati nell’arredamento, sono a 2-3-4 letti, dotati di telefono,TV, minifrigo, cassaforte, asciugacapelli, aria condizionata, veranda.
                @if($user)
                    <span><i class="fa-heart fas button-icon-left like" data-room="Superior"></i></span>
                @endif
              </p>
              <strong>Suite</strong>
              <p>Sono composte da due camere, una con letto matrimoniale e una con due lettini, un servizio, dotate di telefono, TV, minifrigo, cassaforte, asciugacapelli, aria condizionata, veranda.
                @if($user)
                    <span><i class="fa-heart fas button-icon-left like" data-room="Suite"></i></span>
                @endif
              </p>
              <strong>Classica</strong>
              <p>Nel corpo centrale, al piano superiore, sono disponibili alcune camere singole effettive, dotate di telefono, TV, minifrigo, cassaforte, asciugacapelli, aria condizionata.
                @if($user)
                    <span><i class="fa-heart fas button-icon-left like" data-room="Classica"></i></span>
                @endif
              </p>
            </div>
          </div>
        </div>
      </section>

      <section id="fifth_section" class="section_type gray_background">
        <div class="central_builder">
          <div class="classic_box">
            <div class="info">
              <div class="subtitle_box">
                <h3>Ristorante</h3>
              </div>
              <div class="explain">
                <p>
                  <b>Ristorante Centrale</b>: prima colazione, pranzo e cena a buffet; acqua naturale o mineralizzata e vino locale in caraffa inclusi. Tavoli liberi a riempimento.</br>
                  <b>Ristoro a mare</b>: aperto sia a mezzogiorno che la sera (escluso il sabato o per avverse condizioni meteo).</br>
                  Offre buffet di antipasti, carne e pesce alla griglia, pizze a cena, frutta e dolce; acqua naturale o mineralizzata e vino locale in caraffa inclusi (prenotazione obbligatoria gratuita). Tavoli liberi a riempimento.
                </p>
              </div>
            </div>
          </div>
          <div class="classic_box">
            <img src="/images/Immagini_Varie/ristorante.jpeg">
          </div>
        </div>
      </section>

      <section id="sixth_section" class="section_type gray_background">
        <div class="central_builder">
          <div class="classic_box">
            <img src="/images/Immagini_Varie/servizi.png">
          </div>
          <div class="classic_box">
            <div class="info">
              <div class="subtitle_box">
                <h3>Servizi</h3>
              </div>
              <div class="explain">
                <p>
                  Due ristoranti, tre bar, piano-bar, anfiteatro, piscina (con acqua dolce), palestra, bazaar, boutique, artigianato, fotografo, nursery, baby e mini club, junior e young club, servizio medico e pediatrico ambulatoriale, parcheggio esterno non custodito, Wi-Fi gratuito (nella hall, in piscina e sulla terrazza bar).
                </p>
                <p>
                  A pagamento: sala convegni, noleggio auto e scooter, teli mare, servizio lavanderia, massaggi e trattamenti estetici, escursioni. 
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="seventh_section" class="section_type gray_background">
        <div class="central_builder">
          <div class="classic_box">
            <div class="info">
              <div class="subtitle_box">
                <h3>Spiaggia</h3>
              </div>
              <div class="explain">
                <p>
                  Marispica sorge al limitare di una lunga distesa di sabbia fine, attrezzata con ombrelloni, lettini e sdraio, dotata di bar.
                </p>
                <p>
                  Il mare digrada dolcemente consentendo a tutti di fare il bagno.
                </p>
              </div>
            </div>
          </div>
          <div class="classic_box">
            <img src="/images/Immagini_Varie/spiaggia.jpg">
          </div>
        </div>
      </section>

      <section class="section_type white_background" id="eighth_section">
        <div class="title_box">
          <h2>Le attività</h2>
        </div>
        <div class="separator margin-p--bottom">
        </div>
      </section>

      <section id="ninth_section" class="white_background section_type">
        <div class="central_builder">
          <div class="classic_box">
            <img src="/images/Immagini_Varie/fuego.jpg">
          </div>
          <div class="classic_box">
            <div class="info">
              <div class="subtitle_box">
                <h3>La vita al club</h3>
              </div>
              <div class="explain">
                <p>
                  Il nostro staff di animatori proporrà durante il giorno attività sportive, giochi e tornei.
                </p>
                <p>
                  E la sera potrete divertirvi in anfiteatro con splendidi spettacoli di cabaret, musical, commedie e spettacoli teatrali in esclusiva iGV Club.                </p>
                <p>
                  Dopo lo spettacolo, il divertimento continua al piano-bar.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="tenth_section" class="section_type white_background">
        <div class="central_builder">
          <div class="classic_box">
            <div class="info">
              <div class="subtitle_box">
                <h3>Attività</h3>
              </div>
              <div class="explain">
                <p>
                  <b>Corsi collettivi</b>: vela, tennis, tiro con l’arco, fi tness, ginnastica acquatica, spinning.
                </p>
                <p>
                  <b>Campi e attrezzature</b>: windsurf, calcio a 5, pallacanestro, pallavolo, tennis (3 campi), palestra, beach volley, beach tennis, beach soccer, ping pong, bocce, canoe, sup.
                </p>
                <p>
                  <b>A pagamento</b>: tennis notturno (1 campo), lezioni di tennis private con Istruttori   certificati (secondo disponibilità) e nuoto per bambini.
                </p>
              </div>
            </div>
          </div>
          <div class="classic_box">
            <img src="/images/Immagini_Varie/vela.jpg">
          </div>
        </div>
      </section>

      <section id="eleventh_section" class="white_background section_type">
        <div class="central_builder">
          <div class="classic_box">
            <img src="/images/Immagini_Varie/scivoli.jpeg">
          </div>
          <div class="classic_box">
            <div class="info">
              <div class="subtitle_box">
                <h3>Bambini e ragazzi</h3>
              </div>
              <div class="explain">
                <p>
                  <b>SERVIZI AIGO disponibili fino al 15 Settembre 2025</b><br/>
                </p>
                <p>
                  <b>Nursery</b> da 0 a 2 anni compiuti. La nursery di Marispica, tra le più efficienti ed attrezzate esistenti nei club estivi, è gestita da personale attento
                  e cordiale ed è dotata di cucina, ristorante, biberoneria a disposizione 24 ore su 24, cameretta con fasciatoi, sala nanna, area giochi e piscina.
                  Pediatra a disposizione gratuitamente nelle ore di ambulatorio. Utilizzo gratuito dei passeggini messi a disposizione.
                </p>
                <p>
                  <strong>Le attività sono suddivise per fasce d’età <br/>
                  </strong> 
                  Club da 3 a 5 anni, Mini Club da 6 a 10 anni. Sono costantemente seguiti da nostro personale e dispongono di un’area appositamente attrezzata con ristorante, arena, piscina (con acqua dolce), area giochi.
                </p>
                <p>
                  Junior Club da 11 a 13 anni compiuti, Young Club da 14 a 17 anni compiuti.
                  Mai un minuto di noia e tanta gioia di vivere.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="twelfth_section" class="section_type white_background">
        <div class="central_builder">
          <div class="classic_box">
            <div class="info">
              <div class="subtitle_box">
                <h3>Aigo</h3>
              </div>
              <div class="explain">
                <p>
                  Aigo. Un’esclusiva iGV Club. AIGO (Attività Intrattenimento Giovani Ospiti) è uno staff dedicato esclusivamente alla cura e all’intrattenimento dei bambini e dei ragazzi.
                </p>
                <p>
                  Il personale AIGO viene preparato con metodi professionali e gestisce servizi di Nursery, Baby, Mini, Junior e Young Club.
                </p>
              </div>
            </div>
          </div>
          <div class="classic_box">
            <img src="/images/Immagini_Varie/baby.jpg">
          </div>
        </div>
      </section>

      <section id="thirteenth_section" class="white_background section_type">
        <div class="central_builder">
          <div class="classic_box">
            <img src="/images/Immagini_Varie/tempio.jpg">
          </div>
          <div class="classic_box">
            <div class="info">
              <div class="subtitle_box">
                <h3>Escursioni</h3>
              </div>
              <div class="explain">
                <p>
                  Ragusa, Ibla, Siracusa, Modica, Etna, Agrigento, Noto, Malta (in catamarano – occorre la carta di identità), escursioni in barca nella punta estrema della Sicilia.
                </p>
                <p>
                  È richiesto un numero minimo di partecipanti.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="fourteenth_section" class="white_background section_type">
        <div class="central_builder">
          <div class="classic_box">
            <button class="buttons inverse_button circle more_info">
              <span class="inverse_span">ALTRE INFORMAZIONI</span>
            </button>
          </div>
          <div class="classic_box">
            <a class="buttons circle green_button" href="{{ url('booking') }}">
              <span>PRENOTA ORA</span>
            </a>
          </div>
        </div>
      </section>

      @if (!$user)
        <section id="login_section" class="section_type">
          <div class="title_box">
            <h3>Accedi o iscriviti per prenotare la tua vacanza, conoscere il meteo locale, cercare gli eventi più interessanti e molto altro!</h3>
          </div>
          <div class="central_builder auto_height">
            <a href="{{ url('login') }}" class="login_button"><span>ACCEDI</span></a>
            <a href='{{ url('register') }}' class="signup_button"><span>ISCRIVITI</span></a>
          </div>
        </section>
      @endif

      @if($user)
        <section class="section_type" id="api_section">
          <div class="classic_box">
            <div id="title_5" class="title_box">
            <h2>Il Clima</h2>
            </div>
            <div class="separator"></div>
            <div class="info">
              <p class="margin-p--bottom p-align--center">Ispica gode di un clima soleggiato, ideale per tutte le attività al mare e all'aperto.<br/></p>
              <h3>Meteo Attuale:</h3>
            </div>
            <div id="weather_api"></div>
          </div>
          
          <div class="classic_box">
            <div class="title_box">
                <h2>Eventi</h2>
            </div>
            <div class="separator">
            </div>
            <div class="info">
              <p>La Sicilia offre tantissimi eventi estivi.</p>
                <div class="two_box_next_to">
                  <div class="author label_and_textbox margin-right--space">
                    <label>Autore</label>
                    <input type="text" class="textbox" id="author"/>
                    <div class="wrong"><span>Inserisci l'autore</span></div>

                  </div>
                  <div class="place label_and_textbox">
                    <label>Luogo</label>
                    <input type="text" class="textbox" id="event_place"/>
                    <div class="wrong"><span>Inserisci il luogo</span></div>

                  </div>
                </div>
              <div class="buttons circle" id="events_button">
                <span>CERCA EVENTI</span>
              </div>
            </div>
            <div id="events_api"></div>
          </div>
        </section>
      @endif

      <section class="section_type white_background" id="user_feedback">
        <div class="title_box"><h2>Dicono di noi</h2></div>
          <div class="separator"></div>
        <div class="central_builder_three_columns">
        </div>
      </section>

      @if($user)
        <section class="section_type blue_background" id="input_feedback">
          <div class="title_box"><h2>Lascia una recensione</h2></div>
          <div class="separator"></div>
          <div class="info">
            <div class="two_box_next_to ">
              <div class="fb_title label_and_textbox margin-right--space-more">
                <label for="fb_title">Titolo</label>
                <input type="text" class="textbox" name="fb_title" value="{{ old("fb_title") }}">
                <div class="wrong"><span>Inserisci il Titolo</span></div>
              </div>
            
                  
              <div class="fb_message label_and_textbox">
                <label for="fb_message">Esprimi la tua opinione</label>
                <textarea class="textbox" name="fb_message">{{ old("fb_message") }}</textarea>
                <div class="wrong"><span>Inserisci il messaggio</span></div>
              </div>
            </div>
            <div class="buttons circle" id="fb_button"><span>COMMENTA</span></div>
          </div>
        </section>
      @endif

      <section id="place_section" class="white_background section_type">
        <div class="central_builder">
          <div class="classic_box">
            <div class="info">
              <div class="title_box">
                <h2>Dove Siamo</h2>
              </div>
              <div class="separator"></div>
                <p>
                  S. Maria del Focallo-Ispica (Ragusa), a 5 km da Pozzallo, 10 km da Ispica.
                </p>
              <div class="subtitle_box">
                <h3>COME ARRIVARE</h3>
              </div>
              <p>
                <strong>IN AUTO</strong>: Da Catania seguire le indicazioni per Siracusa-Cassibile-Avola- Noto-Rosolini (tratto Autostrada A18 Messina-Catania-Siracusa- Gela),quindi proseguire sulla S.S. 115 in direzione Ispica. Alla rotonda ai piedi della città di Ispica girare a sinistra (S.C 46) per Santa Maria del Focallo. Seguire quindi le indicazioni per “iGV Club Marispica” (al km 5 della S.P.67 Pozzallo-Marza/Pachino).
              </p>
              <p>
                <strong>IN TRENO</strong>: stazione F.S. di Siracusa a 72 km o di Pozzallo a 7 km.
              </p>
              <p>
                <strong>IN AEREO</strong>: aeroporto di Catania a 115 km.
              </p>
              <div class="central_builder">
                <div class="classic_box">
                  <a class="buttons circle more_info">
                    <span>ALTRE INFORMAZIONI</span>
                  </a>
                </div>
                <div class="classic_box">
                  <a class="buttons circle green_button" href="{{ url('booking') }}">
                    <span>PRENOTA ORA</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="classic_box">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3197.9163168194414!2d14.911784077091932!3d36.72457097226881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13118cf2765ad19b%3A0x6330e9b1b6b5385e!2siGV%20Club%20Marispica!5e0!3m2!1sit!2sit!4v1746635220078!5m2!1sit!2sit" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </section>
    </main>
@endsection