<section class="admin-content">
<section class="admin-content">
    <div class="bg-dark">
        <div class="container  m-b-30">
            <div class="row">
                <div class="col-12 text-white p-t-40 p-b-20">

                    <h4 class="">
                        <div class="avatar avatar-xl">
                                    <span class="avatar-title rounded-circle bg-warning"> <i
                                            class="mdi mdi-heart-multiple"></i> </span>
                        </div>
                        Lista przypisanych już formularzy weselnych
                    </h4>
                    <p class="opacity-75 ">
                        Poniżej znajduje się lista formularzy aktualnie dodanych do twojego systemu. Masz możliwość
                        zarządzania i edycji.


                    </p>


                </div>


                <div id="form-errors" class="col-12 p-b-40"></div>
            </div>
        </div>
    </div>

    <div class="container  pull-up">
        <div class="row update" style="display: none">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Szybka edycja</h5>
                        <p>Za pomocą tego formularza można edytować istniejące już wnioski weselne.</p>
                        {!! Form::open(['class'=>'update']) !!}
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                {!! Form::label('dj','DJ:') !!}


                                {!! Form::select('dj',$dj,null,['class'=>'form-control custom-select']) !!}


                            </div>
                            <div class="form-group col-md-3">
                                {!! Form::label('photo','Fotograf:') !!}
                                {!! Form::select('photo',$photo,null,['class'=>'form-control custom-select']) !!}

                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                {!! Form::label('operator','Operator 1:') !!}
                                {!! Form::select('operator',$operator,null,['class'=>'form-control custom-select']) !!}
                            </div>
                            <div class="form-group col-md-3">
                                {!! Form::label('operator_2','Operator 2:') !!}
                                {!! Form::select('operator_2',$operator_2,null,['class'=>'form-control custom-select']) !!}
                            </div>
                            <div class="form-group col-md-3">
                                {!! Form::label('montage','Montaż:') !!}
                                {!! Form::select('montage',$montage,null,['class'=>'form-control custom-select']) !!}
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
                                    <th>ID</th>
                                    <th>Data</th>
                                    <th>Imie</th>
                                    <th>Imie</th>
                                    <th>Numer</th>
                                    <th>Numer</th>

                                    <th>Dj</th>
                                    <th>Foto</th>
                                    <th>Oper 1</th>
                                    <th>Oper 2</th>
                                    <th>Montaż</th>
                                    <th>Wybierz</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                            <script>
                                $("select").prepend("<option value=''>Wybierz pracownika</option>").val('');
                                $(document).ready(function () {
                                    window.datatable = $('.table').DataTable({
                                        columns: [
                                            {data: 'id', "sClass": 'id'},
                                            {data: 'party_date', "sClass": 'party_date'},
                                            {data: 'groom_first_name', "sClass": 'groom_first_name'},
                                            {data: 'bride_first_name', "sClass": 'bride_first_name'},
                                            {data: 'groom_phone_number', "sClass": 'groom_phone_number'},
                                            {data: 'bride_phone_number', "sClass": 'bride_phone_number'},

                                            {data: 'dj.name', "sClass": 'dj'},
                                            {data: 'photo.name', "sClass": 'photo'},
                                            {data: 'operator.name', "sClass": 'operator'},
                                            {data: 'operator_2.name', "sClass": 'operator_2'},
                                            {data: 'montage.name', "sClass": 'montage'},

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

                                                @if(Auth::user()->group()->first()->id == 3)

                                                <a class="dropdown-item update" href="#">Przypisz pracowników</a>
                                                <a class="dropdown-item view" href="#">Edycja</a>
                                                @else
                                                <a class="dropdown-item view" href="#">Podgląd</a>
                                                @endif

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
                                            "url": "{{Route('admin.weddings.assigned.get')}}",
                                            "type": "POST",
                                            "data": {"_token": "{{ csrf_token() }}"}
                                        }
                                    });
                                    $.fn.dataTable.ext.errMode = 'none';
                                });

                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section></section>
