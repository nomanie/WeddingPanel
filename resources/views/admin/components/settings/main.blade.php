<section class="admin-content">
    <div class="bg-dark">
        <div class="container  m-b-30">
            <div class="row">
                <div class="col-12 text-white p-t-40 p-b-20">

                    <h4 class="">
                        <div class="avatar avatar-xl">
                                    <span class="avatar-title rounded-circle bg-warning"> <i
                                            class="mdi mdi-cogs"></i> </span>
                        </div>
                        Zarządzanie ustawieniami serwisu
                    </h4>
                    <p class="opacity-75 ">
                        Poniżej możesz zarządzać głównymi ustawieniami serwisu.
                    </p>


                </div>


                <div id="form-errors" class="col-12 p-b-40"></div>
            </div>
        </div>
    </div>

    <div class="container  pull-up">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body active show" id="main-settings" role="tabpanel" aria-labelledby="main-settings-tab">

                        <h5 class="card-title">Zarządzanie ustawieniami strony</h5>
                        <p>Poniżej wyświetlane są główne ustawienia strony</p>
                        {!! Form::open(['class'=>'create','url'=>route('admin.settings.main.store')]) !!}
                        <div class="form-row">
                            <p>Główne ustawienia serwisu:</p>
                            <div class="form-group col-md-12">
                                {!! Form::label('server-name','Nazwa serwera:') !!}
                                {!! Form::text('server-name',Settings::get('server-name'),['class'=>'form-control','placeholder'=>'Wpisz nazwę serwera']) !!}
                            </div>
                            <div class="form-group col-md-12">
                                {!! Form::label('site-name','Nazwa strony:') !!}
                                {!! Form::text('site-name',Settings::get('site-name'),['class'=>'form-control','placeholder'=>'Wpisz nazwę strony']) !!}
                            </div>
                            <div class="form-group col-md-12">
                                {!! Form::label('technical-break','Przerwa techniczna:') !!}
                                {!! Form::select('technical-break',[1=>"Tak",0=>"Nie"],Settings::get('technical-break'),['class'=>'form-control','placeholder'=>'Włączyć przerwę techniczną?']) !!}
                            </div>
                            <p>Logowanie:</p>
                            <div class="form-group col-md-12">
                                {!! Form::label('login-enabled','Możliwość logowania:') !!}
                                {!! Form::select('login-enabled',[1=>"Tak",0=>"Nie"],Settings::get('login-enabled'),['class'=>'form-control','placeholder'=>'Umożliwić użytkownikom logowanie?']) !!}
                            </div>

                            <p>Rejestracja:</p>
                            <div class="form-group col-md-12">
                                {!! Form::label('registered-users-limit','Limit zarejestrowanych użytkowników:') !!}
                                {!! Form::select('registered-users-limit',[1=>"Tak",0=>"Nie"],Settings::get('registered-users-limit'),['class'=>'form-control','placeholder'=>'Włączyć limit zarejestrowanych użytkowników?']) !!}
                            </div>
                            <div class="form-group col-md-12">
                                {!! Form::label('registered-users-limit-value','Limit zarejestrowanych użytkowników:') !!}
                                {!! Form::number('registered-users-limit-value',Settings::get('registered-users-limit-value'),['class'=>'form-control','placeholder'=>'Wpisz limit zarejestrowanych użytkowników ']) !!}
                            </div>
                            <div class="form-group col-md-12">
                                {!! Form::label('register-enabled','Możliwość rejestracji:') !!}
                                {!! Form::select('register-enabled',[1=>"Tak",0=>"Nie"],Settings::get('register-enabled'),['class'=>'form-control','placeholder'=>'Umożliwić użytkownikom rejestracje?']) !!}
                            </div>
                            <div class="form-group col-md-12">
                                {!! Form::label('register-email-verification-enabled','Wymagane potwierdzenie konta emailem') !!}
                                {!! Form::select('register-email-verification-enabled',[1=>"Tak",0=>"Nie"],Settings::get('register-email-verification-enabled'),['class'=>'form-control','placeholder'=>'Użytkownik musi potwierdzić konto emailem?']) !!}
                            </div>
                        </div>
                        {!! Form::submit('Zapisz',['class'=>'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
            <div class="col-lg-4">

                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="avatar mr-2 avatar-xs">
                            <div class="avatar-title bg-dark rounded-circle">
                                <i class="mdi mdi-menu mdi-18px"></i>
                            </div>
                        </div>
                        Menu
                    </div>
                    <div class="list-group list  list-group-flush">

                        <div class="list-group-item ">
                            <i class="mdi mdi-chevron-right"></i> <a class="show" id="main-settings-tab" data-toggle="pill" href="#main-settings" role="tab" aria-controls="main-settings" aria-selected="true"> Ustawienia Strony </a>
                        </div>
                        <div class="list-group-item ">
                            <i class="mdi mdi-chevron-right"></i> <a class="show" id="social-media-settings-tab" data-toggle="pill" href="#social-media-settings" role="tab" aria-controls="social-media-settings" aria-selected="false"> Ustawienia social-media </a>
                        </div>
                        <div class="list-group-item ">
                            <i class="mdi mdi-chevron-right"></i> <a  class="show" href="#"> Ustawienia użytkowników </a>
                        </div>
                        <div class="list-group-item ">
                            <i class="mdi mdi-chevron-right"></i> <a class="show" href="#"> Ustawienia administracyjne </a>
                        </div>

                    </div>
                </div>
                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="avatar mr-2 avatar-xs">
                            <div class="avatar-title bg-primary rounded-circle">
                                <i class="mdi mdi-information-outline mdi-18px"></i>
                            </div>
                        </div>
                        Podstawowe informacje
                    </div>
                    <div class="list-group list  list-group-flush">

                        <div class="list-group-item d-flex  align-items-center">
                            <div class="">
                                <div class="name">Ilość zalogowanych użytkowników</div>
                                <div class="text-muted">321</div>
                            </div>
                        </div>
                        <div class="list-group-item d-flex  align-items-center">
                            <div class="">
                                <div class="name">Ilość zarejestrowanych użytkowników</div>
                                <div class="text-muted">321</div>
                            </div>
                        </div>
                        <div class="list-group-item d-flex  align-items-center">
                            <div class="">
                                <div class="name">Ilość światów</div>
                                <div class="text-muted">321</div>
                            </div>
                        </div>
                        <div class="list-group-item d-flex  align-items-center">
                            <div class="">
                                <div class="name">Ilość gangów</div>
                                <div class="text-muted">321</div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
