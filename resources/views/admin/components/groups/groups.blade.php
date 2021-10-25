<section class="admin-content">
    <div class="bg-dark">
        <div class="container  m-b-30">
            <div class="row">
                <div class="col-12 text-white p-t-40 p-b-20">

                    <h4 class="">
                        <div class="avatar avatar-xl">
                                    <span class="avatar-title rounded-circle bg-warning"> <i
                                            class="mdi mdi-account-group"></i> </span>
                        </div> Lista grup
                    </h4>
                    <p class="opacity-75 ">
                        Poniżej znajduje się lista grup aktualnie dodanych do twojego systemu. Masz możliwość zarządzania i edycji.


                    </p>

                    <button type="button" class="btn m-b-15 ml-2 mr-2 btn-success create">Dodaj grupę</button>


                </div>


                <div id="form-errors" class="col-12 p-b-40"></div>
            </div>
        </div>
    </div>

    <div class="container  pull-up">
        <div class="row create d-none">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Nowa grupa</h5>
                        <p>Za pomocą tego formularza można stworzyć nową grupę.</p>
                        {!! Form::open(['class'=>'create','url'=>route('admin.groups.store')]) !!}
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                {!! Form::label('name','Nazwa:') !!}
                                {!! Form::text('name',null,['class'=>'form-control','required','placeholder'=>'Wpisz nazwę']) !!}
                            </div>
                        </div>
                        {!! Form::submit('Stwórz',['class'=>'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row update" style="display: none">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Szybka edycja</h5>
                        <p>Za pomocą tego formularza można edytować istniejących już użytkowników.</p>
                        {!! Form::open(['class'=>'update','novalidate']) !!}
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                {!! Form::label('name','Nazwa:') !!}
                                {!! Form::text('name',null,['class'=>'form-control','required','placeholder'=>'Wpisz login']) !!}
                            </div>
                        </div>
                        {!! Form::submit('Edytuj',['class'=>'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <div class="table-responsive p-t-10">
                            <table id="" class="table" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Nazwa</th>
                                    <th>Ilość użytkowników</th>
                                    <th>Ilość permisji</th>
                                    <th>Wybierz</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                            <script>
                                $(document).ready(function () {
                                    window.datatable = $('.table').DataTable({
                                        columns: [
                                            {data: 'name', "sClass": 'name'},
                                            {data: 'users_count', "sClass": 'users_count'},
                                            {data: 'permissions_count', "sClass": 'permissions_count'},
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
                                                <a class="dropdown-item view"  href="#">Podgląd</a>
                                                <a class="dropdown-item update" href="#">Szybka edycja</a>
                                                <a class="dropdown-item update" href="#">Edycja</a>
                                                <a class="dropdown-item remove" href="#">Zablokuj</a>
                                            </div>
                                        </div>`
                                            }
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
                                            "url": "{{Route('admin.groups.get')}}",
                                            "type": "POST",
                                            "data":{"_token": "{{ csrf_token() }}"}
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
</section>
