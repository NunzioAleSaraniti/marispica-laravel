@extends('layouts.app-en')

@section('title')
  <title>Marispica - The Great Journeys - Sicily</title>
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
      <a href="{{ url('home/en') }}" id="home">HOME</a>
      <a href="#second_section">LOCATION</a>
      <a href="#third_section">RESORT</a>
      <a @if ($user) href="#api_section" @else href="#login_section" @endif>ACTIVITIES</a>
      <a href="#user_feedback">ABOUT US</a>
      <a href="#place_section">WHERE WE ARE</a>
      <a href="#big_footer">CONTACTS</a>
      <a href=" {{ url('home')}}"><img src="/images/Flag/en.png" class="flag" id="big_header_flag"></a>
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
          <a href="#third_section">STRUTTURA</a>
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
          <h3>More Info</h3>
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
  
  <section id="home_section">
    <div id="background_image"></div>
      <div id="home_title_section">
        <h1>ABSOLUTE SERENITY</h1>
        <h2>DESIGNED TO OFFER THE BEST HOLIDAY EVER FOR FAMILIES</h2>
        <a href="{{ url('booking') }}" class="buttons circle">
          <span>BOOK NOW</span>
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
  
  <main>
    <section class="section_type white_background" id="second_section">
      <div class="central_builder">
        <div class="classic_box">
          <div id="img2" class="full_img">
          </div>
        </div>
        <div class="classic_box">
          <div id ="title2">
            <h2>Location</h2>
          </div>
          <div class="separator">
          </div>
          <div id="explain2">
            <p>The deep south of Sicily offers a wonderful landscape, where long beaches merge with the Mediterranean maquis.
              The lucky visitors can lose themselves, immersing completely in the beautiful flower gardens.
              They can admire the enchanting towns of the Sicilian Baroque just a short distance away, and give in to epicurean pleasures in the home of many gourmand specialities that have made `this land so famous all over the world.
              Marispica is located on the edge of a long, fully equipped, fine sandy beach. The beach slopes gently into the sea, making it safe and ideal for everyone to dive in. Ideal for families with children.
              In addition to the various sports and recreational activities, our animators will propose cycling tours and fitness trails among the dunes. You will not experience a moment of boredom, but a great joy of life. Adults can enjoy this holiday in absolute tranquillity, while the children have fun in complete safety.</p>
          </div>
          <a id="n1_button2" class="buttons circle inverse_button" href="https://www.youtube.com/watch?v=8Acp3DMcrXk" target="_blanck">
            <i class="fa-play-circle fas button-icon-left"></i> 
            <span>WATCH THE VIDEO</span>
          </a>
          <div id="gap2_second_section" class="white_gap"></div>
          <div id="button_block">
          <a id="n2_button2" class="buttons circle more_info">
              <span>MORE INFO</span>
          </a>
            <a href="{{ url('booking') }}" class="buttons circle" id="n3_button2">
            <span>BOOK NOW</span>
          </a>
          </div>
        </div>
      </div>
    </section>

    <section class="section_type gray_background" id="third_section">
      <div class="title_box">
        <h2>Resort</h2>
      </div>
      <div class="separator margin-p--bottom">
      </div>
      <div id="explain3">
        <h3>Elegant atmosphere in a prime location, all services for </br>children and teenagers, fully equipped nursery, medical and </br>paediatric service</h3>
      </div>
    </section>

    <section id="fourth_section" class="section_type gray_background">
      <div class="central_builder">
        <div class="classic_box">
          <div id="img4" class="full_img"><img id="img_4" src="/images/Rooms/suite.jpg"></div>
        </div>
        <div class="classic_box">
          <div  class="title_box">
            <h3>Accomodation</h3>
          </div>
          <div class="info">
            <strong>Cottage</strong>
            <p>Immersed in the green flower gardens, with 2-3-4 beds, equipped with telephone, TV, mini bar, safe, hair dryer, air conditioning, veranda or balcony.
              @if($user)
                  <span><i class="fa-heart fas button-icon-left like" data-room="Cottage"></i></span>
              @endif
            </p>
            <strong>Superior</strong>
            <p>Fully refurbished and renovated furnishings, with 2-3-4 beds, equipped with telephone, TV, mini bar, safe, hair dryer, air conditioning, veranda.
              @if($user)
              <span><i class="fa-heart fas button-icon-left like" data-room="Superior"></i></span>
              @endif
            </p>
            <strong>Cottage Deluxe</strong>
            <p>Immersed in the green flower gardens, with 2-3-4 beds, equipped with telephone, TV, mini bar, safe, hair dryer, air conditioning, veranda or balcony.
              @if($user)
                  <span><i class="fa-heart fas button-icon-left like" data-room="Cottage Deluxe"></i></span>
              @endif
            </p>
            <strong>Suite</strong>
            <p>Consist of two rooms, one with a double bed and one with two single beds, one bathroom, equipped with telephone, TV, mini bar, safe, hair dryer, air conditioning, veranda.
              @if($user)
                  <span><i class="fa-heart fas button-icon-left like" data-room="Suite"></i></span>
              @endif
            </p>
            <strong>Classic</strong>
            <p>A limited number of single rooms is available in the main hotel building, on the upper floor, equipped with telephone, TV, mini bar, safe, hair dryer, air conditioning.
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
              <h3>Restaurant</h3>
            </div>
            <div class="explain">
              <p>
                <b>Central Restaurant</b>: breakfast, lunch and dinner buffet; still or mineral water and local wine in carafe included.</br>
                <b>Ristoro a mare</b>: until capacity is reached, open both at noon and in the evening.</br>
                In an informal setting it offers an appetizer buffet, grilled meat and fish, pizzas at dinnertime, fruit and dessert, natural or mineral water and local wine carafe included (compulsory reservation free of charge).
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
              <h3>Services</h3>
            </div>
            <div class="explain">
              <p>
                Two restaurants, three bars, a piano bar, amphitheatre, cinema, swimming pool, gym, boutique-bazaar, crafts, photographer, art gallery, nursery, baby club and mini club, junior and young club, medical and paediatric service, unattended external parking.
              </p>
              <p>
                At extra cost: conference room, car and scooter rental, beach towels, laundry service, massages and beauty treatments, Wi-Fi area, Internet point (in the lobby, at the pool and on the terrace bar), excursions.
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
              <h3>Beach</h3>
            </div>
            <div class="explain">
              <p>
                Marispica is located on the edge of a long, fine sandy beach, equipped with beach umbrellas and sun loungers and a bar.
              </p>
              <p>
                The beach slopes gently into the water, making it safe and ideal for everyone to dive in.
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
        <h2>Activities</h2>
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
              <h3>Life at the club</h3>
            </div>
            <div class="explain">
              <p>
                Our staff will propose sports activities, games and tournaments during the day.
              </p>
              <p>
                And in the evening you can enjoy exclusive iGV Club shows in the amphitheatre, such as cabaret, musicals and comedies.
              </p>
              <p>
                After the show, the fun continues at the piano bar.
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
              <h3>Courses</h3>
            </div>
            <div class="explain">
              <p>
                <b>Group courses</b>: fitness, aqua gym, dancing, fencing and spinning, tennis, archery, swimming, sailing, windsurfing.
              </p>
              <p>
                <b>Sports courts and equipment</b>: pétanque, 5-a-side football, basketball, volleyball, table tennis, tennis (3 courts), gym, beach soccer, beach tennis, beach volley, canoeing. At extra cost: night time tennis.
              </p>
              <p>
                Depending on availability, private tennis lessons with qualified instructors are available in July and August.
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
              <h3>Children and teenagers</h3>
            </div>
            <div class="explain">
              <p>
                <b>Nursery</b><br/>Nursery from 0 to 2 years. The Marispica nursery, is one of the most efficient and best equipped among the summer clubs and is managed by attentive and friendly staff and equipped with a kitchen, restaurant, a baby feeding facility available 24/7, a changing room, sleeping room, play area and swimming pool. Paediatrician A paediatrician is available free of charge during clinic hours. Free use of strollers is available.
              </p>
              <p>
                <strong>The activities are divided by age <br/></strong> 
                Club da 3 a 5 anni, Mini Club da 6 a 10 anni. Sono costantemente seguiti da nostro personale e dispongono di un’area appositamente attrezzata con ristorante, arena, piscina (con acqua dolce), area giochi.
              </p>
              <p>
                Baby Club from 3 to 5 years, Mini Club from 6 to 10 years.
                They are constantly monitored by our staff and have a specially equipped area with a restaurant, arena, swimming pool (fresh water), playground. Junior Club from 11 to 13 years, Young Club 14 to 17 years. In addition to the various sports and recreational activities, our animators will propose cycling tours and fitness trails among the dunes. There will never be a moment of boredom, just plenty of joy of living.
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
                AIGO (Attività Intrattenimento Giovani Ospiti – Entertainment Activities for Young Guests) has staff dedicated exclusively for the care and entertainment of children and teenagers.
              </p>
              <p>
                AIGO staff is trained using professional methods and manages Nursery, Baby, Mini, Junior and Young Club services.
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
              <h3>Excursion</h3>
            </div>
            <div class="explain">
              <p>
                Ragusa, Ibla, Siracusa, Modica, Etna, Taormina, Agrigento, Noto, Malta (by catamaran – valid identity card/passport is required), boat trips to the tip of Sicily A minimum number of participants is required.
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
            <span class="inverse_span">MORE INFO</span>
          </button>
        </div>
        <div class="classic_box">
          <a class="buttons circle green_button" href="{{ url('booking') }}">
            <span>BOOK NOW</span>
          </a>
        </div>
      </div>
    </section>

    @if (!$user)
      <section id="login_section" class="section_type">
        <div class="title_box">
          <h3>Log in or register to book your vacation, check the local weather, find the hottest events and much more!</h3>
        </div>
        <div class="central_builder auto_height">
          <a href="{{ url('login') }}" class="login_button"><span>LOG IN</span></a>
          <a href='{{ url('register') }}' class="signup_button"><span>SIGN UP</span></a>
        </div>
      </section>
    @endif

    @if($user)
      <section class="section_type" id="api_section">
        <div class="classic_box">
          <div id="title_5" class="title_box">
          <h2>The weather</h2>
          </div>
          <div class="separator"></div>
          <div class="info">
            <p class="margin-p--bottom p-align--center">Ispica enjoys a sunny climate, ideal for all seaside and outdoor activities.<br/></p>
            <h3>Current Weather:</h3>
          </div>
          <div id="weather_api"></div>
        </div>
        
        <div class="classic_box">
          <div class="title_box">
              <h2>Events</h2>
          </div>
          <div class="separator">
          </div>
          <div class="info">
            <p>Sicily offers many summer events.</p>
              <div class="two_box_next_to">
                <div class="author label_and_textbox margin-right--space">
                  <label>Author</label>
                  <input type="text" class="textbox" id="author"/>
                  <div class="wrong"><span>Enter the author</span></div>

                </div>
                <div class="place label_and_textbox">
                  <label>Location</label>
                  <input type="text" class="textbox" id="event_place"/>
                  <div class="wrong"><span>Enter the location</span></div>

                </div>
              </div>
            <div class="buttons circle" id="events_button">
              <span>SEARCH EVENTS</span>
            </div>
          </div>
          <div id="events_api"></div>
        </div>
      </section>
    @endif

    <section class="section_type white_background" id="user_feedback">
      <div class="title_box"><h2>About Us</h2></div>
        <div class="separator"></div>
      <div class="central_builder_three_columns">
      </div>
    </section>

    @if($user)
      <section class="section_type blue_background" id="input_feedback">
        <div class="title_box"><h2>Leave a feedback</h2></div>
        <div class="separator"></div>
        <div class="info">
          <div class="two_box_next_to ">
            <div class="fb_title label_and_textbox margin-right--space-more">
              <label for="fb_title">Title</label>
              <input type="text" class="textbox" name="fb_title" value="{{ old("fb_title") }}">
              <div class="wrong"><span>Enter the title</span></div>
            </div>
          
                
            <div class="fb_message label_and_textbox">
              <label for="fb_message">Let us know your feedback</label>
              <textarea class="textbox" name="fb_message">{{ old("fb_message") }}</textarea>
              <div class="wrong"><span>Enter your feedback</span></div>
            </div>
          </div>
          <div class="buttons circle" id="fb_button"><span>SEND</span></div>
        </div>
      </section>
    @endif

    <section id="place_section" class="white_background section_type">
      <div class="central_builder">
        <div class="classic_box">
          <div class="info">
            <div class="title_box">
              <h2>Where We Are</h2>
            </div>
            <div class="separator"></div>
              <p>
                S. Maria del Focallo-Ispica (Ragusa), 5 km from Pozzallo, 10 km from Ispica.
              </p>
            <div class="subtitle_box">
              <h3>HOW TO GET HERE</h3>
            </div>
            <p>
              <strong>BY CAR</strong>: From Catania follow the signs for Siracusa Cassibile-Avola- Noto-Rosolini (section of the A18 Messina-Catania-Siracusa-Gela motorway), then continue on S.S. 115 highway towards Ispica. At the roundabout at the foot of the town of Ispica turn left (S.C. 46) towards Santa Maria del Focallo. Follow the signs for “iGV Club Marispica” (5 km on the S.P. 67 road Pozzallo-Marza/Pachino).
            </p>
            <p>
              <strong>BY TRAIN</strong>:  Siracusa railway station is 72 km or Pozzallo railway station is 7 km from Le Castella.
            </p>
            <p>
              <strong>BY PLANE</strong>: Catania airport, 115 km from the hotel.
            </p>
            <div class="central_builder">
              <div class="classic_box">
                <a class="buttons circle more_info">
                  <span>MORE INFO</span>
                </a>
              </div>
              <div class="classic_box">
                <a class="buttons circle green_button" href="{{ url('booking') }}">
                  <span>BOOK NOW</span>
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