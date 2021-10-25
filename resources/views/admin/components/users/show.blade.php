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
                        Edycja użytkownika {!!$data['name'] !!}
                    </h4>
                    <p class="opacity-75 ">
                        Zawansowana edycja użtykownika.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container  pull-up">
        <div id="notifications"></div>
        <div class="row create">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">
                        <form action="{{Route('admin.users.update.post',['id'=>$data->id])}}" id="action"
                              enctype="multipart/form-data" data-alert="notifications" data-profile-edit='true'
                              data-success="Zmiany użytkownika zostały zapisane!" method="POST">
                            @csrf
                            <div>
                                <div style="width:90%;display:inline-block"><h5 class="card-title"
                                                                                style="display: inline-block">Edycja
                                        Użytkownika</h5></div>
                                <span>{{Form::submit('Zapisz!',['class'=>'btn m-b-15 ml-2 mr-2 btn-dark'])}}</span>
                            </div>
                            <p>Za pomocą tego formularza można edytować istniejące już użytkownika.</p>
                            <input type="hidden" name="_method" value="POST">
                            <input type="hidden" name="setting" value="profile">
                            <div class="table-responsive">
                                <table class="table align-td-middle table-card">
                                    <thead>
                                    <tr>
                                        <th>Login</th>
                                        <th>Grupa</th>
                                        <th>Email</th>
                                        <th>Nowe Hasło</th>
                                        <th>Zweryfikowany</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr id="label">
                                        <td>{!! Form::text('name',$data['name'],['class'=>'form-control','required','placeholder'=>'Wpisz login']) !!}</td>
                                        <td>{!! Form::select('group',\App\Group::pluck('name','id'),$data['group_id'],['class'=>'form-control custom-select','required']) !!}</td>
                                        <td>{!! Form::email('email',$data['email'],['class'=>'form-control','required','placeholder'=>'Wpisz email']) !!}</td>
                                        <td>{!! Form::password('password',['class'=>'form-control','placeholder'=>'Wpisz hasło']) !!}</td>
                                        <td>
                                        {!! Form::select('is_verified',[1=>'Tak',0=>'Nie'],!is_Null($data['email_verified_at']),['class'=>'form-control custom-select','required']) !!}
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                        <br><br>



                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link show active" id="stats-tab-z" data-toggle="tab" href="#stats" role="tab" aria-controls="stats" aria-selected="false">Statystyki</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link show" id="inventory-tab-z" data-toggle="tab" href="#inventory" role="tab" aria-controls="inventory" aria-selected="false">Ekwipunek</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link show" id="other_stats-tab-z" data-toggle="tab" href="#other_stats" role="tab" aria-controls="other_stats" aria-selected="false">Pozostałe statystyki</a>
                                    </li>
                                </ul>
                        <!-- statystyki -->
                                <div class="tab-content" id="myTabContent1">
                                    <div class="tab-pane fade  active show " id="stats" role="tabpanel" aria-labelledby="stats-tab">
                                        <form action="{{Route('admin.users.update.post',['id'=>$data->id])}}" id="action"
                                              enctype="multipart/form-data" data-alert="notifications" data-inventory-edit='true'
                                              data-success="Zmiany statystyk zostały zapisane!" method="POST">
                                            @csrf
                                            <div class="list-group">

                                                <div
                                                    class="list-group-item d-flex justify-content-between align-items-center active">
                                                    <span><i class="mdi mdi-account mr-1"></i> Statystyki użytkownika {{$data->name}}</span>
                                                    <span>{{Form::submit('Zapisz!',['class'=>'btn btn-primary active'])}}</span>
                                                    <input type="hidden" name="_method" value="POST">
                                                    <input type="hidden" name="setting" value="stats">
                                                </div>
                                                <div class="list-group-item d-flex justify-content-between align-items-center ">
                                                    <span><i class="mdi mdi-book-plus" style="color: green;"></i>  Wolne punkty umiejętności</span>
                                                    <span>{!! Form::number('experience_points',$data['experience_points'],['class'=>'form-control']) !!}</span>
                                                </div>
                                                <div class="list-group-item d-flex justify-content-between align-items-center ">
                                            <span><i class="mdi mdi-apache-kafka"
                                                     style="color: green;"></i>  Level</span>
                                                    <span>{!! Form::number('experience_level',$data['experience_level'],['class'=>'form-control']) !!}</span>
                                                </div>
                                                <div class="list-group-item d-flex justify-content-between align-items-center ">
                                                    <span><i class="mdi mdi-circle" style="color: green;"></i>  Punkty Doświadczenia</span>
                                                    <span>{!! Form::number('experience',$data['experience'],['class'=>'form-control']) !!}</span>
                                                </div>
                                                <div class="list-group-item d-flex justify-content-between align-items-center ">
                                            <span><i class="mdi mdi-heart"
                                                     style="color: #ff053f;"></i>  Punkty Życia</span>
                                                    <span>{!! Form::number('hp',$data['health_points'],['class'=>'form-control']) !!}</span>
                                                </div>
                                                <div class="list-group-item d-flex justify-content-between align-items-center ">
                                                    <span><i class="mdi mdi-flash" style="color: #6957fd;"></i>  Punkty Energii</span>
                                                    <span>{!! Form::number('en',$data['energy_points'],['class'=>'form-control']) !!}</span>
                                                </div>
                                                <div class="list-group-item d-flex justify-content-between align-items-center ">
                                                    <span><i class="mdi mdi-arm-flex" style="color: #ff6409;"></i>  Punkty Siły</span>
                                                    <span>{!! Form::number('str',$data['strength_points'],['class'=>'form-control']) !!}</span>
                                                </div>
                                                <div class="list-group-item d-flex justify-content-between align-items-center ">
                                                    <span><i class="mdi mdi-hand" style="color: #a7a7a7;"></i>  Punkty Zręczności</span>
                                                    <span>{!! Form::number('dex',$data['dexterity_points'],['class'=>'form-control']) !!}</span>
                                                </div>
                                                <div class="list-group-item d-flex justify-content-between align-items-center ">
                                                    <span><i class="mdi mdi-heart-plus" style="color: #00ff1f;"></i>  Punkty Witalności</span>
                                                    <span>{!! Form::number('vit',$data['vitality_points'],['class'=>'form-control']) !!}</span>
                                                </div>
                                                <div class="list-group-item d-flex justify-content-between align-items-center ">
                                                    <span><i class="mdi mdi-head-snowflake" style="color: #61a0ff;"></i>  Punkty Inteligencji</span>
                                                    <span>{!! Form::number('int',$data['intelligence_points'],['class'=>'form-control']) !!}</span>
                                                </div>

                                            </div>

                                        </form>
                                    </div>
                                    <div class="tab-pane fade bt-5 eq" id="inventory" role="tabpanel" aria-labelledby="inventory-tab">
                                        <script>
                                            function hideList() {
                                                if (document.getElementById('update').style.display != "none") {
                                                    $('.eq').css('display', 'none');
                                                }
                                            }

                                        </script>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">

                                                    <div class="card-body">
                                                        <div class="table-responsive p-t-10">
                                                            <table id="" class="table table2" style="width:100%">
                                                                <thead>
                                                                <tr>
                                                                    <th>Nazwa</th>
                                                                    <th>Jakość</th>
                                                                    <th>Ilość</th>
                                                                    <th>Siła</th>
                                                                    <th>Zręczność</th>
                                                                    <th>Witalność</th>
                                                                    <th>Inteligencja</th>
                                                                    <th>Wybierz</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                </tbody>
                                                            </table>
                                                            <script>
                                                                $(document).ready(function () {
                                                                    window.datatable = $('.table2').DataTable({
                                                                        columns: [
                                                                            {data: 'item_id.name', "sClass": 'name'},
                                                                            {data: 'quality_id.title', "sClass": 'quality'},
                                                                            {data: 'quantity', "sClass": 'quantity'},
                                                                            {
                                                                                data: 'strength_points',
                                                                                "sClass": 'strength_points'
                                                                            },
                                                                            {
                                                                                data: 'dexterity_points',
                                                                                "sClass": 'dexterity_points'
                                                                            },
                                                                            {
                                                                                data: 'vitality_points',
                                                                                "sClass": 'vitality_points'
                                                                            },
                                                                            {
                                                                                data: 'intelligence_points',
                                                                                "sClass": 'intelligence_points'
                                                                            },
                                                                            {
                                                                                name: "buttons",
                                                                                "targets": -1,
                                                                                "data": null,
                                                                                "defaultContent": `<div class="btn-group" role="group">
                                            <button id="btnGroupDrop1" type="button"
                                                    class="btn btn-info dropdown-toggle" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                Wybierz
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                <a class="dropdown-item update" id='update' onclick='hideList()' href="#">Edycja</a>
                                                 <a class="dropdown-item remove" href="#">Usuń</a>
                                            </div>
                                        </div>`
                                                                            },

                                                                        ],
                                                                        "autoWidth": true,
                                                                        'responsive': true,
                                                                        "processing": true,
                                                                        "serverSide": true,
                                                                        oLanguage: {
                                                                            sProcessing: `<div class="lime-body">    <div class="container">        <div class="row" style="  position: absolute;  top: 50%;  left: 50%;  transform: translate(-50%, -50%);">            <div class="col-md-8">                <div class="spinner-border" style="color: #747985" le="status">                    <span class="sr-only">Loading...</span>                </div>            </div>        </div>    </div></div>`
                                                                        },
                                                                        rowId: 'id',
                                                                        ajax: {
                                                                            "url": "{{Route('admin.users.get.items',['id'=>$data->id])}}",
                                                                            "type": "POST",
                                                                            "data": {"_token": "{{ csrf_token() }}"}
                                                                        }
                                                                    });
                                                                });

                                                            </script>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade bt-5" id="other_stats" role="tabpanel" aria-labelledby="other_stats-tab">
                                        <form action="{{Route('admin.users.update.post',['id'=>$data->id])}}" id="action"
                                              enctype="multipart/form-data" data-alert="notifications" data-profile-edit='true'
                                              data-success="Zmiany pozostałych statystyk zostały zapisane!" method="POST">
                                            @csrf
                                            <div
                                                class="list-group-item d-flex justify-content-between align-items-center active">
                                                <span><i class="mdi mdi-account mr-1"></i> Pozostałe statystyki użytkownika {{$data->name}}</span>
                                                <span>{{Form::submit('Zapisz!',['class'=>'btn btn-primary active'])}}</span>
                                            </div>
                                            <input type="hidden" name="_method" value="POST">
                                            <input type="hidden" name="setting" value="other_stats">
                                            <div class="list-group-item d-flex justify-content-between align-items-center ">
                                                <span><i class="mdi mdi-shower-head" style="color:blue;"></i>  Czystość</span>
                                                <span>{!! Form::number('cleanliness_level',$data['cleanliness_level'],['class'=>'form-control']) !!}</span>
                                            </div>
                                            <div class="list-group-item d-flex justify-content-between align-items-center ">
                                                <span><i class="mdi mdi-domino-mask" style="color:black;"></i>  Poziom przestępczości</span>
                                                <span>{!! Form::number('crime_level',$data['crime_level'],['class'=>'form-control']) !!}</span>
                                            </div>
                                            <div class="list-group-item d-flex justify-content-between align-items-center ">
                                                <span><i class="mdi mdi-city" style="color: slategray;"></i>  Miasto</span>
                                                <span>{!! Form::text('city',$data['city_id'],['class'=>'form-control']) !!}</span>
                                            </div>
                                            <div class="list-group-item d-flex justify-content-between align-items-center ">
                                                <span><i class="mdi mdi-heart" style="color: red;"></i>  Żyje</span>
                                                <span style="width:19%;"> {!! Form::select('alive',[1=>'Tak',0=>'Nie'],!is_Null($data['alive']),['class'=>'form-control custom-select','required']) !!}</span>
                                                <!--<span>@if($data['alive'] == 1){!! Form::text('alive',"1",['class'=>'form-control']) !!}@else{!! Form::text('alive',"2",['class'=>'form-control']) !!}@endif</span>-->
                                            </div>
                                            <div class="list-group-item d-flex justify-content-between align-items-center ">
                                                <span><i class="mdi mdi-book" style="color: saddlebrown;"></i>  Opis</span>
                                                <span>{!! Form::text('desc',$data['description'],['class'=>'form-control']) !!}</span>
                                            </div>
                                            <div class="list-group-item d-flex justify-content-between align-items-center ">
                                                <span><i class="mdi mdi-currency-usd" style="color: #34ce57;"></i>  Ilość Pieniędzy</span>
                                                <span>{!! Form::number('balance',$data['balance'],['class'=>'form-control']) !!}</span>
                                            </div>
                                            <div class="list-group-item d-flex justify-content-between align-items-center ">
                                                <span><i class="mdi mdi-currency-usd" style="color: darkgoldenrod;"></i>  Ilość Waluty Premium</span>
                                                <span>{!! Form::number('premium_balance',$data['premium_balance'],['class'=>'form-control']) !!}</span>
                                            </div>
                                            <div class="list-group-item d-flex justify-content-between align-items-center ">
                                                <span><i class="mdi mdi-paw" style="color: sandybrown;"></i>  Zwierzak</span>
                                                <span>{!! Form::number('pet_id',$data['pet_id'],['class'=>'form-control']) !!}</span>
                                            </div>
                                            <div class="list-group-item d-flex justify-content-between align-items-center ">
                                                <span><i class="mdi mdi-image" style="color: cadetblue;"></i>  Ścieżka do Awatara</span>
                                                <span>{!! Form::text('image_path',$data['image_path'],['class'=>'form-control']) !!}</span>
                                            </div>
                                            <div class="list-group-item d-flex justify-content-between align-items-center ">
                                                <span><i class="mdi mdi-account mr-1" style="color: darkkhaki;"></i>  Rekomendujący</span>
                                                <span>{!! Form::number('recommending_id',$data['recommending_id'],['class'=>'form-control']) !!}</span>
                                            </div>
                                        </form>

                                    </div>



                        <!-- Edycja przedmiotów-->
                        <div class="row update  bt-5" style="display: none">
                            <div class="col-xl col-m">
                                <div class="card">
                                    <div class="card-body">

                                        <h5 class="card-title">Edycja przedmiotu</h5>
                                        <p>Za pomocą tego formularza można edytować przedmioty w ekwipunku
                                            gracza {{$data['name']}}.</p>
                                      {!! Form::open([
                                            'class'=>'update',
                                            'url'=>route('admin.users.update.post',['id'=>$data->id]),
                                            'id'=>'action',
                                            'enctype'=>'multipart/form-data',
                                            'data-alert'=>'notifications',
                                            'data-profile-edit'=>'true',
                                            'data-success'=>'Zmiana przedmiotu powiodła się!',
                                            'method'=>'PUT'
                                            ]) !!}
                                        @csrf
                                        <input type="hidden" name="setting" value="inventory">
                                        <div class="form-row">
                                            <div class="list-group col">
                                                <div
                                                    class="list-group-item d-flex justify-content-between align-items-center ">
                                                        <span><i class="mdi mdi-arm-flex" style="color: #ff6409;"></i>
                                                             {!! Form::label('strength_points','Siła:') !!}</span>
                                                    <span>{!! Form::number('strength_points',null,['class'=>'form-control']) !!}</span>
                                                </div>
                                                <div
                                                    class="list-group-item d-flex justify-content-between align-items-center ">
                                                    <span><i class="mdi mdi-hand" style="color: #a7a7a7;"></i>  {!! Form::label('dexterity_points','Zręczność:') !!}</span>
                                                    <span>{!! Form::number('dexterity_points',null,['class'=>'form-control']) !!}</span>
                                                </div>
                                                <div
                                                    class="list-group-item d-flex justify-content-between align-items-center ">
                                                    <span><i class="mdi mdi-heart-plus" style="color: #00ff1f;"></i>  {!! Form::label('vitality_points','Witalność:') !!}</span>
                                                    <span>{!! Form::number('vitality_points',null,['class'=>'form-control']) !!}</span>
                                                </div>
                                                <div
                                                    class="list-group-item d-flex justify-content-between align-items-center ">
                                                    <span><i class="mdi mdi-head-snowflake" style="color: #61a0ff;"></i>  {!! Form::label('intelligence_points','Inteligencja:') !!}</span>
                                                    <span>{!! Form::number('intelligence_points',null,['class'=>'form-control']) !!}</span>
                                                </div>
                                                <div
                                                    class="list-group-item d-flex justify-content-between align-items-center ">
                                                    <span><i class="mdi mdi-star" style="color: darkgoldenrod;"></i>  {!! Form::label('quality','Jakość:') !!}</span>
                                                    <span style="width:19%;">{!! Form::select('quality',\App\Quality::pluck('title','id'),null,['class'=>'form-control custom-select','required']) !!}</span>
                                                </div>
                                                <div
                                                    class="list-group-item d-flex justify-content-between align-items-center ">
                                                    <span><i class="mdi mdi-counter" style="color: black;"></i>  {!! Form::label('quantity','Ilość:') !!}</span>
                                                    <span>{!! Form::number('quantity',null,['class'=>'form-control']) !!}</span>
                                                </div>

                                            </div>
                                        </div>
                                        {!! Form::submit('Edytuj',['class'=>'btn btn-primary']) !!}
                                        {!! Form::Button('Wróć',['class'=>'btn btn-primary back']) !!}
                                        <!--  </form>-->
                                         {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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

