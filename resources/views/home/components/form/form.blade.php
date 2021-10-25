<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BootstrapDash Wizard</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{URL::asset('assets/css/bd-wizard.css')}}">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

</head>
<body>
<main class="my-5">
    <form action="{{route('home.form.post')}}" class="wedding_form" data-alert="notifications"
          data-success="Fromularz weselny został zapisany!" method="POST">
        @csrf
        <div class="container">
            <div class="notifications"></div>

            <div id="wizard" style="width:120%;margin-left:-10%;">
                <h3>
                    <div class="media">
                        <div class="bd-wizard-step-icon"><i class="mdi mdi-account-outline"></i></div>
                        <div class="media-body">
                            <div class="bd-wizard-step-title">Informacje</div>
                            <div class="bd-wizard-step-subtitle">Etap 1</div>
                        </div>
                    </div>
                </h3>
                <section>
                    <div class="content-wrapper">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="party_date">Data wesela</label>
                                <input type="date" name='party_date' id='party_date' class="form-control"
                                       placeholder="Wpisz datę wesela" required>
                            </div>
                            <div class="form-group col-md-8">
                                <label for="party_address">Adres wesela</label>
                                <input type="text" name='party_address' id='party_address' class="form-control"
                                       placeholder="Wpisz adres pod którym odbedzie się wesele (nazwa lokalu)" required>
                            </div>

                        </div>
                        <p>
                            Główne usługi (zaznacz jakie posiadacie u nas w firmie)
                        </p>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" data-show="true" data-input="dj,wedding_address,music-more" value="1"
                                           name='services_music' id='services_music'
                                           class="custom-control-input">
                                    <label class="custom-control-label" for="services_music">Oprawa muzyczna</label>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="custom-control custom-checkbox">
                                    <input data-show="true" data-input="prepare_date,wedding_address,prepare_address ,foto"
                                           type="checkbox" value="1" name='services_photo' id='services_photo'
                                           class="custom-control-input">
                                    <label class="custom-control-label" for="services_photo">Fotografia</label>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="custom-control custom-checkbox">
                                    <input data-show="true"
                                           data-input="prepare_date,prepare_address,wedding_address,foto-video,video-more,more-info"
                                           type="checkbox" value="1" name='services_video' id='services_video'
                                           class="custom-control-input">
                                    <label class="custom-control-label" for="services_video">Filmowanie</label>
                                </div>
                            </div>
                        </div>
                        <h6 class="section-heading">Panna młoda </h6>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="bride_first_name">Imię</label>
                                <input type="text" name='bride_first_name' id='bride_first_name'
                                       class="form-control"
                                       placeholder="Imie Panny młodej" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="bride_last_name">Nazwisko</label>
                                <input type="text" name='bride_last_name' id='bride_last_name' class="form-control"
                                       placeholder="Nazwisko Panny młodej" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="bride_birthdate">Data urodzenia</label>
                                <input type="date" name='bride_birthdate' id='bride_birthdate' class="form-control"
                                       placeholder="Data urodzin Panny młodej" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="bride_phone_number">Numer telefonu</label>
                                <input type="number" name='bride_phone_number' id='bride_phone_number'
                                       class="form-control"
                                       placeholder="Numer telefonu Panny młodej" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="bride_email">Adres email</label>
                                <input type="email" name='bride_email' id='bride_email' class="form-control"
                                       placeholder="Adres email Panny młodej" required>
                            </div>
                        </div>

                        <h6 class="section-heading">Pan młody </h6>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="groom_first_name">Imię</label>
                                <input type="text" name="groom_first_name" id="groom_first_name"
                                       class="form-control"
                                       placeholder="Imie Pana młodego" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="groom_last_name">Nazwisko</label>
                                <input type="text" name="groom_last_name" id="groom_last_name" class="form-control"
                                       placeholder="Nazwisko Pana młodego" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="groom_birthdate">Data urodzenia</label>
                                <input type="date" name='groom_birthdate' id='groom_birthdate' class="form-control"
                                       placeholder="Data urodzin Pana młodego" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="groom_phone_number">Numer telefonu</label>
                                <input type="number" name='groom_phone_number' id='groom_phone_number'
                                       class="form-control"
                                       placeholder="Numer telefonu Pana młodego" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="groom_email">Adres email</label>
                                <input type="email" name='groom_email' id='groom_email' class="form-control"
                                       placeholder="Adres email Pana młodego" required>
                            </div>
                        </div>
                    </div>
                </section>
                <h3>
                    <div class="media">
                        <div class="bd-wizard-step-icon"><i class="mdi mdi-script-text-outline"></i></div>
                        <div class="media-body">
                            <div class="bd-wizard-step-title" style="font-size:15px;">Harmonogram</div>
                            <div class="bd-wizard-step-subtitle">Etap 2</div>
                        </div>
                    </div>
                </h3>
                <section>
                    <p>
                        Harmonogram
                    </p>
                    <div class="prepare_address" style="display:none;">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="prepare_date">Godzina przygotowań</label>
                                <input type="time" name='prepare_date' id='prepare_date'
                                       class="form-control"
                                       placeholder="Wpisz godzinę przygotowań ( +/- 2h przed ślubem)"
                                       required>
                            </div>
                            <div class="form-group col-md-9">
                                <label for="bride_prepare_address">Adres przygotowań Pani Młodej</label>
                                <input type="text" name='bride_prepare_address' id='bride_prepare_address'
                                       class="form-control"
                                       placeholder="Wpisz adres, pod którym odbedą się przygotowania Pani Młodej" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="groom_prepare_address">Adres przygotowań Pana Młodego</label>
                                <input type="text" name='groom_prepare_address' id='groom_prepare_address'
                                       class="form-control"
                                       placeholder="Wpisz adres, pod którym odbedą się przygotowania Pana Młodego" required>
                            </div>
                        </div>
                    </div>
                    <div class="wedding_address" style="display:none;">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="wedding_date">Godzina ślubu</label>
                                <input type="time" name='wedding_date' id='wedding_date'
                                       class="form-control"
                                       placeholder="Wpisz godzinę ślubu" required>
                            </div>
                            <div class="form-group col-md-9">
                                <label for="wedding_address">Adres ślubu</label>
                                <input type="text" name='wedding_address' id='wedding_address'
                                       class="form-control"
                                       placeholder="Wpisz adres, pod którym odbędzie się ślub" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="restaurant_come">Planowana godzina przybycia na salę</label>
                                <input type="time" name='restaurant_come' id='restaurant_come'
                                       class="form-control"
                                       placeholder="Wpisz godzinę ślubu" required>
                            </div>
                        </div>
                    </div>
                </section>
                <h3>
                    <div class="media">
                        <div class="bd-wizard-step-icon"><i class="mdi mdi-bank"></i></div>
                        <div class="media-body">
                            <div class="bd-wizard-step-title">Szczegóły wesela</div>
                            <div class="bd-wizard-step-subtitle">Etap 3</div>
                        </div>
                    </div>
                </h3>
                <section>
                    <div class="content-wrapper">
                        <p>
                            Szczegóły wesela
                        </p>
                        <div class="form-row dj" style="display:none;">
                            <div class="form-group col-md-12">
                                <label for="music_for_first_dance">Utwór na pierwszy taniec</label>
                                <input type="text" name='music_for_first_dance'
                                       id='music_for_first_dance' class="form-control"
                                       placeholder="Tytuł utworu + link">

                            </div>
                            <div class="form-group col-md-3">
                                <label for="music_for_first_dance_original">Czy jest to oryginalna wersja?</label>
                                <select class="form-control" name="music_for_first_dance_original" id="music_for_first_dance_original">
                                    <option value="">--Wybierz opcje--</option>
                                    <option value="1">Tak</option>
                                    <option value="0">Nie</option>
                                </select>

                            </div>

                            <div class="form-group col-md-5">
                                <label for="music_for_first_dance_full_length">Czy ma być odtworzony od początku do końca?</label>
                                <select class="form-control" data-hide="true" data-input="music_for_first_dance"
                                        name="music_for_first_dance_full_length"
                                        id="music_for_first_dance_full_length">
                                    <option value="">--Wybierz opcje--</option>
                                    <option value="1">Tak</option>
                                    <option value="0">Nie</option>
                                </select>

                            </div>
                            <script>
                                $('select#music_for_first_dance_full_length').on('change', function () {
                                    if (this.value == 1) {
                                        $('.music_for_first_dance').hide();
                                    } else {
                                        $('.music_for_first_dance').show();
                                    }
                                });
                            </script>
                            <div class="form-group music_for_first_dance col-md-4"
                                 id="music_for_first_dance" style="display:none!important">

                                <label for="music_for_first_dance_start">Od</label>
                                <input type="text" name='music_for_first_dance_start'
                                       id='music_for_first_dance_start' class="form-control"
                                       placeholder="Dokładny czas rozpoczęcia">

                                <label for="music_for_first_dance_end">Do</label>
                                <input type="text" name='music_for_first_dance_end'
                                       id='music_for_first_dance_end' class="form-control"
                                       placeholder="Dokładny czas zakończenia">

                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">

                                <label for="bride_parents_first_names">Imiona rodziców Panny młodej</label>
                                <input type="text" name='bride_parents_first_names' id='bride_parents_first_names'
                                       class="form-control" placeholder="Imiona rodziców Panny młodej">

                            </div>
                            <div class="form-group col-md-4">

                                <label for="groom_parents_first_names">Imiona rodziców Pana młodego</label>
                                <input type="text" name='groom_parents_first_names' id='groom_parents_first_names'
                                       class="form-control" placeholder="Imiona rodziców Pana młodego">

                            </div>
                            <div class="form-group col-md-4">
                                <label for="thanks_to_parents">Czy planowane są
                                    podziękowania?</label>
                                <select class="form-control" data-hide="true" data-input="thanks_to_parents"
                                        name="thanks_to_parents"
                                        id="thanks_to_parents">
                                    <option value="0">Nie</option>
                                    <option value="1">Tak</option>
                                </select>

                            </div>

                            <script>
                                $('select#thanks_to_parents').on('change', function () {
                                    if (this.value == 0) {
                                        $('.thanks_to_partens_description').hide();
                                    } else {
                                        $('.thanks_to_partens_description').show();
                                    }
                                });
                            </script>
                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-12  thanks_to_partens_description" style="display:none;">

                                <label style="" for="thanks_to_partens_description">W jakiej
                                    formie?</label>
                                <textarea style="" rows="5" name='thanks_to_partens_description'
                                          id='thanks_to_partens_description'
                                          class="form-control thanks_to_partens_description"
                                          placeholder="Opisz podziękowania rodzicom"></textarea>


                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-3">

                                <small>(Jeśli nie ma, zostaw puste pole)</small>
                                <label for="cake_time">Godzina podania tortu</label>
                                <input type="time" name='cake_time' id='cake_time' class="form-control">

                            </div>
                            <div class="form-group col-md-3">
                                <small>(Jeśli nie ma, zostaw puste pole)</small>
                                <label for="meat_time">Godzina podania szynki/udźca</label>
                                <input type="time" name='meat_time' id='meat_time' class="form-control">

                            </div>
                        </div>

                    </div>
                </section>
                <h3>
                    <div class="media">
                        <div class="bd-wizard-step-icon"><i class="mdi mdi-emoticon-outline"></i></div>
                        <div class="media-body">
                            <div class="bd-wizard-step-title">Główne usługi</div>
                            <div class="bd-wizard-step-subtitle">Etap 4</div>
                        </div>
                    </div>
                </h3>
                <section>
                    <div class="content-wrapper">
                        <div class="music-more" style="display: none">
                            <div class="form-row">
                                <div class="form-group">
                                    <p>Oprawa muzyczna</p>
                                </div>

                            </div>
                            <div class="form-row dj" style="display:none">
                                <div class="form-group col-md-12">
                                    <label for="own_music">Proponowane utwory</label>
                                    <textarea rows="5" name='own_music' id='own_music' class="form-control"
                                              placeholder="Wpisz własne utwory"></textarea>
                                </div>
                            </div>
                            <div class="form-row dj" style="display:none">
                                <div class="form-group col-md-12">
                                    <label for="forbidden_music">Zakazane utwory</label>
                                    <textarea rows="5" name='forbidden_music' id='forbidden_music' class="form-control"
                                              placeholder="Wpisz zakazaną listę utworów"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="foto" style="display:none;">
                            <p>Fotografia</p>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="special_wishes_photo">Czy macie jakieś specjalne życzenia dotyczącą fotografii?</label>
                                    <select data-hide="true" data-input="special_wishes_photo_description" class="form-control"
                                            name="special_wishes_photo"
                                            id="special_wishes_photo">
                                        <option value="0">--Wybierz opcje--</option>
                                        <option value="1">Tak</option>
                                        <option value="0">Nie</option>
                                    </select>

                                </div>
                            </div>
                            <script>
                                $('select#special_wishes_photo').on('change', function () {
                                    if (this.value == 0) {
                                        $('.special_wishes_photo_description').parent().hide();
                                    } else {
                                        $('.special_wishes_photo_description').parent().show();
                                    }
                                });
                            </script>
                            <div class="form-row">
                                <div class="form-group col-md-12 special_wishes_photo_description"
                                     style="display: none;">
                                    <label for="special_wishes_photo_description">Czy fotograf ma zwrócić na coś szczególną uwagę?
                                    </label>
                                    <textarea rows="5" name='special_wishes_photo_description'
                                              id='special_wishes_photo_description'
                                              class="form-control special_wishes_photo_description"
                                              placeholder=""></textarea>

                                </div>
                            </div>
                        </div>
                        <div class="video-more" style="display: none">
                            <p>
                                Video
                            </p>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="longer_movie">Dłuższa wersja filmu(wg wcześniejszych ustaleń na umowie)</label>
                                    <select  class="form-control"
                                             name="longer_movie"
                                             id="longer_movie">
                                        <option value="0">--Wybierz opcje--</option>
                                        <option value="15/20">15/20min</option>
                                        <option value="20/30">20/30min</option>
                                        <option value="40/60">40/60min</option>
                                    </select>

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="special_wishes_video">Czy macie jakieś specjalnie życzenia dotyczące
                                        filmu, montażu?</label>
                                    <select data-hide="true" data-input="special_wishes_video_description"  class="form-control"
                                            name="special_wishes_video"
                                            id="special_wishes_video">
                                        <option value="0">--Wybierz opcje--</option>
                                        <option value="1">Tak</option>
                                        <option value="0">Nie</option>
                                    </select>

                                </div>
                            </div>
                            <script>
                                $('select#special_wishes_video').on('change', function () {
                                    if (this.value == 0) {
                                        $('.special_wishes_video_description').parent().hide();
                                    } else {
                                        $('.special_wishes_video_description').parent().show();
                                    }
                                });
                            </script>
                            <div class="form-row" style="display: none">
                                <div class="form-group col-md-12 special_wishes_video_description">
                                    <label for="special_wishes_video_description"> Specjalnie życzenia dotyczące
                                        filmu, montażu</label>
                                    <textarea rows="5" name='special_wishes_video_description'
                                              id='special_wishes_video_description'
                                              class="form-control special_wishes_video_description"
                                              placeholder=""></textarea>
                                </div>
                            </div>
                            <script>
                                $('select#thanks_to_parents').on('change', function () {
                                    if (this.value == 0) {
                                        console.log('schowaj');
                                        $('.thanks_to_partens_description').hide();
                                    } else {
                                        console.log('poka')
                                        $('.thanks_to_partens_description').show();
                                    }
                                });
                            </script>
                            <div class="form-group">
                                <p>Podkład muzyczny</p>
                            </div>
                            <div class="form-group col-md-4">

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" value="1" name="video_own_music_checkbox" id="video_own_music_checkbox" class="custom-control-input">
                                    <label class="custom-control-label" for="video_own_music_checkbox">Zdajemy się na was</label>
                                </div>
                            </div>
                            <div class="form-group col-md-8 video_own_music">
                                <label for="video_own_music">Własny podkład muzyczny</label>
                                <textarea rows="5" name='video_own_music'
                                          id='video_own_music'
                                          class="form-control video_own_music"
                                          placeholder="Podajcie 5 propozycji utowrów (mogą być linki) "></textarea>

                            </div>
                        </div>
                        <div class="more-info" style="display: none">
                            <script>
                                $('#video_own_music_checkbox').on('change', function () {
                                    if ($(this).is(":checked")) {
                                        $('#video_own_music').hide();
                                        return;
                                    }
                                    $('#video_own_music').show();
                                });
                            </script>
                            <script>
                                $('#f').on('change', function () {
                                    if ($(this).is(":checked")) {
                                        $('.video_own_music').hide();
                                        return;
                                    }
                                    $('.video_own_music').show();

                                });
                            </script>
                        </div>
                    </div>
                </section>
                <h3>
                    <div class="media">
                        <div class="bd-wizard-step-icon"><i class="mdi mdi-account-check-outline"></i></div>
                        <div class="media-body">
                            <div class="bd-wizard-step-title">Dodatkowe usługi</div>
                            <div class="bd-wizard-step-subtitle">Etap 5</div>
                        </div>
                    </div>
                </h3>
                <section>
                    <div class="content-wrapper">
                        <p>
                            Dodatkowe usługi
                        </p>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" value="1" name='our_services_lights'
                                           id='our_services_lights' class="custom-control-input">
                                    <label class="custom-control-label" for="our_services_lights">Oświetlenie
                                        dekoracyjne</label>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" value="1" name='our_services_smoke'
                                           id='our_services_smoke' class="custom-control-input">
                                    <label class="custom-control-label" for="our_services_smoke">Ciężki dym</label>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" value="1" name='our_services_photo_booth'
                                           id='our_services_photo_booth' class="custom-control-input">
                                    <label class="custom-control-label"
                                           for="our_services_photo_booth">Fotobudka</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" value="1" name='our_services_love_sign'
                                           id='our_services_love_sign' class="custom-control-input">
                                    <label class="custom-control-label" for="our_services_love_sign">Napis
                                        love</label>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" value="1" name='our_services_bartending'
                                           id='our_services_bartending' class="custom-control-input">
                                    <label class="custom-control-label" for="our_services_bartending">Usługi
                                        barmańskie</label>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" value="1" name='our_services_live_instrumental'
                                           id='our_services_live_instrumental' class="custom-control-input">
                                    <label class="custom-control-label" for="our_services_live_instrumental">Oprawa
                                        live instrumental</label>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>

                <h3>
                    <div class="media">
                        <div class="bd-wizard-step-icon"><i class="mdi mdi-account-outline"></i></div>
                        <div class="media-body">
                            <div class="bd-wizard-step-title">Inne</div>
                            <div class="bd-wizard-step-subtitle">Etap 6</div>
                        </div>
                    </div>
                </h3>
                <section>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="wishes">Specjalne życzenia</label>
                            <textarea rows="5" name='wishes' id='wishes' class="form-control"
                                      placeholder="Wpisz specjalne życzenia"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="additional_attractions">Czy są planowane dodatkowe atrakcje?</label>
                            <textarea rows="5" name='additional_attractions' id='additional_attractions'
                                      class="form-control"
                                      placeholder="Zimne ognie, pokaz kulinarny, występ artystyczny, prezentacja multimedialna etc. "></textarea>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </form>
</main>
<!--Skrypt sprawdzający czy wszystkie pola w Etapie 1 są wypełnione -->
<script>
    //inputs = $('#wizard-p-0 :input:not(:checkbox)');
    everyNotEmpty = false;
    $( document ).ready(function() {
        //wyłączenie przycisku "Dalej"
        let a =$('.actions li a').get(1)
        a.href = "#";
        a.style.backgroundColor = "gray";
        //
        $('#wizard-p-0 input').on("change",function() {

            $('#wizard-p-0 :input:not(:checkbox)').each(function(){
                //var element = $(this);
                if($(this) instanceof Date){
                    if($(this) == null){
                        everyNotEmpty = false
                        return false;
                    }
                    else{
                        everyNotEmpty = true;
                    }
                }
                else{
                    if($(this).val().length === 0){
                        everyNotEmpty = false
                        return false;
                    }
                    else{
                        everyNotEmpty = true;
                    }
                }
            });
            (everyNotEmpty == true)? (a.href = "#next" ,a.style.backgroundColor = "#00d69f"):null;
        });
    });
</script>
<!-- AJAX -->
<script>
    $(document).ready(function(){
        let sended = false;
        $('a[href="#finish"]').on('click',function(){
            if(!sended)
            $.ajax({
                type:'POST',
                url: "{{route('home.form.post')}}",
                cache: false,
                data: $(".wedding_form").serialize(),
                success: function(e)
                {
                    errors(e,$('.notifications'))
                    sended = true
                },
                error: function(e)
                {
                    errors({error:'Coś poszło nie tak! Czy wypełniono wszystko poprawnie?'},$('.notifications'))
                }
            });
            else{
                errors({error:'Formularz został już wysłany'},$('.notifications'))
            }
        });
    })

</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="{{URL::asset('assets/js/jquery.steps.min.js')}}"></script>
<script src="{{URL::asset('assets/js/bd-wizard.js')}}"></script>

<script src="{{URL::asset('assets/home/wp-includes/js/custom.js')}}"></script>
</body>
</html>
