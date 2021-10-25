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
                        Lista wypełnionych formularzy weselnych
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
                        <p>Wkrótce</p>
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
                                    <th>Nazwisko</th>
                                    <th>Numer</th>
                                    <th>Imie</th>
                                    <th>Nazwisko</th>
                                    <th>Numer</th>
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
                                            {data: 'id', "sClass": 'id'},

                                            {data: 'wedding_date', "sClass": 'wedding_date'},
                                            {data: 'groom_first_name', "sClass": 'groom_first_name'},
                                            {data: 'groom_last_name', "sClass": 'groom_last_name'},
                                            {data: 'groom_phone_number', "sClass": 'groom_phone_number'},
                                            {data: 'bride_first_name', "sClass": 'bride_first_name'},
                                            {data: 'bride_last_name', "sClass": 'bride_last_name'},
                                            {data: 'bride_phone_number', "sClass": 'bride_phone_number'},

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
                                                <a class="dropdown-item update" href="#">Szybka edycja</a>
                                                <a class="dropdown-item view" href="#">Edycja</a>
                                                <a class="dropdown-item remove" href="#">Przenieś do archiwum</a>
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
                                            "url": "{{Route('admin.weddings.get')}}",
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
</section>
