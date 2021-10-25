<style>
    img {
        border-radius: 50%;
    }

    .col-md-2 {
        text-align: center;
    }

    .fold {
        background-color: rgba(200, 200, 200, 0.3);
        width: 10%;
        height: 30px;
        text-align: center;
        line-height: 30px;
    }
</style>
<section class="admin-content">
    <div class="bg-dark m-b-30">
        <div class="container">
            <div class="row p-b-60 p-t-60">
                <div class="col-12 text-white p-t-40 p-b-20">
                    <div id="form-errors" class="col-12 p-b-40"></div>
                    <h4 class="">
                        <div class="avatar avatar-xl">
                            <span class="avatar-title rounded-circle bg-danger"> <i class="mdi mdi-pencil"></i> </span>
                        </div>
                        Edycja formularza weselnego {!!$data['name'] !!}
                    </h4>
                    <p class="opacity-75 ">
                        Zawansowana edycja formularza weselnego
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container  pull-up">
        <div id="notifications"></div>
        <div class="row">
            <div class="col-lg-12">

                <!--widget card begin-->
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="m-b-0">
                            Edycja
                        </h5>
                        <p class="m-b-0 text-muted">
                            Standardowa edycja formularza weselnego

                        </p>
                    </div>
                    <div class="card-body ">
                        <form action="{{route('admin.weddings.update',['wedding'=>$id])}}" id="action" data-alert="notifications"
                              data-success="Fromularz weselny został zapisany!" method="PATCH">
                            @csrf
                            <p> Przypisani pracownicy</p>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    {!! Form::label('dj','DJ:') !!}
                                    @if(!is_null($data['photo']))
                                        {!! Form::select('dj',\App\Models\Group::with('users')->where('name',"D-J")->first()->users->pluck('name','id'),$data['photo'],['class'=>'form-control custom-select','required']) !!}
                                    @else
                                        {!! Form::select('dj',\App\Models\Group::with('users')->where('name',"D-J")->first()->users->pluck('name','id'),$data['photo'],['class'=>'form-control custom-select','required']) !!}
                                    @endif()

                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('photo','Fotograf:') !!}
                                    @if(!is_null($data['photo']))
                                        {!! Form::select('photo',\App\Models\Group::with('users')->where('name',"Fotograf")->first()->users->pluck('name','id'),$data['photo'],['class'=>'form-control custom-select','required']) !!}

                                    @else
                                        {!! Form::select('photo',\App\Models\Group::with('users')->where('name',"Fotograf")->first()->users->pluck('name','id'),null,['class'=>'form-control custom-select','required']) !!}

                                    @endif()

                                </div>
                            </div>
                            <p> Pan młody</p>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="groom_first_name">Imię</label>
                                    <input value="{{$data['groom_first_name']}}" type="text" name="groom_first_name" id="groom_first_name" class="form-control"
                                           placeholder="Imie Pana młodego"  required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="groom_last_name">Nazwisko</label>
                                    <input value="{{$data['groom_last_name']}}" type="text" name="groom_last_name" id="groom_last_name" class="form-control"
                                           placeholder="Nazwisko Pana młodego" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="groom_birthdate">Data urodzenia</label>
                                    <input value="{{$data['groom_birthdate']}}" type="date"   name='groom_birthdate' id='groom_birthdate' class="form-control"
                                           placeholder="Data urodzin Pana młodego" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="groom_phone_number">Numer telefonu</label>
                                    <input value="{{$data['groom_phone_number']}}" type="number" name='groom_phone_number' id='groom_phone_number' class="form-control"
                                           placeholder="Numer telefonu Pana młodego" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="groom_email">Adres email</label>
                                    <input value="{{$data['groom_email']}}" type="email" name='groom_email' id='groom_email' class="form-control"
                                           placeholder="Adres email Pana młodego" required>
                                </div>
                            </div>
                            <p> Panna młoda</p>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="bride_first_name">Imię</label>
                                    <input value="{{$data['bride_first_name']}}" type="text" name='bride_first_name' id='bride_first_name' class="form-control"
                                           placeholder="Imie Panny młodej" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="bride_last_name">Nazwisko</label>
                                    <input value="{{$data['bride_last_name']}}" type="text" name='bride_last_name' id='bride_last_name' class="form-control"
                                           placeholder="Nazwisko Panny młodej" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="bride_birthdate">Data urodzenia</label>
                                    <input value="{{$data['bride_birthdate']}}" type="date"   name='bride_birthdate' id='bride_birthdate' class="form-control"
                                           placeholder="Data urodzin Panny młodej" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="bride_phone_number">Numer telefonu</label>
                                    <input value="{{$data['bride_phone_number']}}" type="number" name='bride_phone_number' id='bride_phone_number' class="form-control"
                                           placeholder="Numer telefonu Panny młodej" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="bride_email">Adres email</label>
                                    <input value="{{$data['bride_email']}}" type="email" name='bride_email' id='bride_email' class="form-control"
                                           placeholder="Adres email Panny młodej" required>
                                </div>
                            </div>
                            <p> Szczegóły wesela</p>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="music_for_first_dance">Pierwszy taniec</label>
                                    <input value="{{$data['music_for_first_dance']}}" type="text" name='music_for_first_dance' id='music_for_first_dance' class="form-control"
                                           placeholder="Tytuł oraz wykonawca">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <div class="custom-control custom-checkbox">
                                        <input @if($data['music_for_first_dance_original']) checked="true" @endif type="checkbox" value="1"  name='music_for_first_dance_original' id='music_for_first_dance_original' class="custom-control-input" >
                                        <label class="custom-control-label" for="music_for_first_dance_original">Czy jest to orginalna wersja?</label>
                                    </div>
                                </div>

                                <div class="form-group col-md-2">
                                    <div class="custom-control custom-checkbox">
                                        <input @if($data['music_for_first_dance_full_length']) checked="true" @endif type="checkbox" value="1"  name='music_for_first_dance_full_length' id='music_for_first_dance_full_length' class="custom-control-input" >
                                        <label class="custom-control-label" for="music_for_first_dance_full_length">Cały utwór?</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 d-flex">
                                    <div class="col-md-6">
                                        <label for="music_for_first_dance_start">Od</label>
                                        <input value="{{$data['music_for_first_dance_start']}}"  type="text" name='music_for_first_dance_start' id='music_for_first_dance_start' class="form-control"
                                               placeholder="Minuta rozpoczęcia">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="music_for_first_dance_end">Do</label>
                                        <input value="{{$data['music_for_first_dance_end']}}"  type="text" name='music_for_first_dance_end' id='music_for_first_dance_end' class="form-control"
                                               placeholder="Minuta zakończenia">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <div class="custom-control custom-checkbox">
                                        <input @if($data['thanks_to_parents']) checked="true" @endif type="checkbox" value="1"  name='thanks_to_parents' id='thanks_to_parents' class="custom-control-input" >
                                        <label class="custom-control-label" for="thanks_to_parents">Czy planowane są podziękowania?</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="thanks_to_partens_description">Jeśli tak to w jakiej formie?</label>
                                    <textarea value="{{$data['thanks_to_partens_description']}}" rows="5"   name='thanks_to_partens_description' id='thanks_to_partens_description' class="form-control"
                                              placeholder="Opisz podziękowania rodziom"></textarea>

                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">

                                    <label for="bride_parents_first_names">Imiona rodziców Panny młodej</label>
                                    <input value="{{$data['bride_parents_first_names']}}" type="text" name='bride_parents_first_names' id='bride_parents_first_names' class="form-control" placeholder="Imiona rodziców Panny młodej">

                                </div>
                                <div class="form-group col-md-6">

                                    <label for="groom_parents_first_names">Imiona rodziców Pana młodego</label>
                                    <input value="{{$data['groom_parents_first_names']}}" type="text" name='groom_parents_first_names' id='groom_parents_first_names' class="form-control" placeholder="Imiona rodziców Pana młodego">

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">

                                    <label for="cake_time">Podanie tortu</label>
                                    <input value="{{$data['cake_time']}}" type="time" name='cake_time' id='cake_time' class="form-control" required>

                                </div>
                                <div class="form-group col-md-3">

                                    <label for="meat_time">Podanie szynki/udźca</label>
                                    <input value="{{$data['meat_time']}}" type="time" name='meat_time' id='meat_time' class="form-control" required>

                                </div>
                            </div>

                            <p>
                                Dodatkowe usługi
                            </p>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <div class="custom-control custom-checkbox">
                                        <input @if($data['our_services_lights']) checked="true" @endif type="checkbox" value="1" name='our_services_lights' id='our_services_lights' class="custom-control-input" >
                                        <label class="custom-control-label" for="our_services_lights">Oświetlenie dekoracyjne</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="custom-control custom-checkbox">
                                        <input @if($data['our_services_smoke']) checked="true" @endif type="checkbox" value="1" name='our_services_smoke' id='our_services_smoke' class="custom-control-input" >
                                        <label class="custom-control-label" for="our_services_smoke">Ciężki dym</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="custom-control custom-checkbox">
                                        <input @if($data['our_services_photo_booth']) checked="true" @endif  type="checkbox" value="1"  name='our_services_photo_booth' id='our_services_photo_booth' class="custom-control-input" >
                                        <label class="custom-control-label" for="our_services_photo_booth">Fotobudka</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <div class="custom-control custom-checkbox">
                                        <input @if($data['our_services_love_sign']) checked="true" @endif  type="checkbox" value="1" name='our_services_love_sign' id='our_services_love_sign' class="custom-control-input" >
                                        <label class="custom-control-label" for="our_services_love_sign">Napis love</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="custom-control custom-checkbox">
                                        <input @if($data['our_services_bartending']) checked="true" @endif  type="checkbox" value="1" name='our_services_bartending' id='our_services_bartending' class="custom-control-input" >
                                        <label class="custom-control-label" for="our_services_bartending">Usługi barmańskie</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="custom-control custom-checkbox">
                                        <input @if($data['our_services_live_instrumental']) checked="true" @endif  type="checkbox" value="1" name='our_services_live_instrumental' id='our_services_live_instrumental' class="custom-control-input" >
                                        <label class="custom-control-label" for="our_services_live_instrumental">Oprawa live instrumental</label>
                                    </div>
                                </div>
                            </div>
                            <p>
                                Ważne momenty
                            </p>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="prepare_date">Data przygotowań</label>
                                    <input value="{{$data['prepare_date']}}" type="date" name='prepare_date' id='prepare_date' class="form-control"
                                           placeholder="Wpisz datę przygotowań" required>
                                </div>
                                <div class="form-group col-md-9">
                                    <label for="prepare_address">Adres przygotowań</label>
                                    <input value="{{$data['prepare_address']}}" type="text" name='prepare_address' id='prepare_address' class="form-control"
                                           placeholder="Wpisz adres pod którym odbedą się przygotowania" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="wedding_date">Data ślubu</label>
                                    <input value="{{$data['wedding_date']}}" type="date"     name='wedding_date' id='wedding_date' class="form-control"
                                           placeholder="Wpisz datę ślubu" required>
                                </div>
                                <div class="form-group col-md-9">
                                    <label for="wedding_address">Adres ślubu</label>
                                    <input value="{{$data['wedding_address']}}" type="text"   name='wedding_address' id='wedding_address' class="form-control"
                                           placeholder="Wpisz adres pod którym odbedzie się ślub" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="party_date">Data wesela</label>
                                    <input value="{{$data['party_date']}}" type="date"  name='party_date' id='party_date' class="form-control"
                                           placeholder="Wpisz datę wesela" required>
                                </div>
                                <div class="form-group col-md-9">
                                    <label for="party_address">Adres wesela</label>
                                    <input value="{{$data['party_address']}}" type="text"  name='party_address' id='party_address' class="form-control"
                                           placeholder="Wpisz adres pod którym odbedzie się wesele" required>
                                </div>
                            </div>
                            <p>Inne</p>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="own_music">Własne utwory</label>
                                    <textarea value="{{$data['own_music']}}" rows="5"  name='own_music' id='own_music' class="form-control"
                                              placeholder="Wpisz własne utwory"></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="wishes">Własne życzenia</label>
                                    <textarea value="{{$data['wishes']}}" rows="5"   name='wishes' id='wishes' class="form-control"
                                              placeholder="Wpisz własne życzenia"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="forbidden_music">Zakazane utwory</label>
                                    <textarea value="{{$data['forbidden_music']}}" rows="5"  name='forbidden_music' id='forbidden_music' class="form-control"
                                              placeholder="Wpisz zakazaną listę utworów"></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="additional_attractions">Czy planowane są dodatkowe atrakcje?</label>
                                    <textarea value="{{$data['additional_attractions']}}" rows="5"  name='additional_attractions' id='additional_attractions' class="form-control"
                                              placeholder="Wpisz dodatkowe atrakcje"></textarea>
                                </div>

                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-dark" value="Zapisz">
                            </div>
                        </form>
                    </div>
                </div>
                <!--widget card ends-->


            </div>
        </div>
    </div>
    </div>
    </div>
</section>
<script>
    $('.back').on('click', function () {
        let inv = $('#inventory')
        inv.addClass('active');
        inv.attr('aria-selected', 'true');
        inv.show();
        $('.row.update').hide();
    });
</script>
