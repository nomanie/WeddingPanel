@if(!Request::ajax())
    @extends('admin.master')
@endif

@section('body')

    <main class="admin-main  ">
        <div class="container-fluid">
            <div class="col-lg-4 my-auto mx-auto">
                <div id="register_errors"></div>
            </div>
            <div class="row ">

                <div class="col-lg-4 my-auto mx-auto bg-white">

        <div class="card under-img-card-ss">
            <div class="card-header under-img-card-header"><i class="fa fa-user"></i> Zarejestruj w serwisie</div>
            <div class="card-body card-body-ss">
                <form action="{{route('register')}}" id="action" data-alert="register_errors" data-success="Pomyślnie zarejestrowano! Na twój adres email został wysłany link aktywacyjny." method="POST">
                @csrf
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"  id="inputGroup-sizing-default">Login</span>
                    </div>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                    </div>
                    <input type="text" class="form-control" name="email" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Hasło</span>
                    </div>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Powtórz hasło</span>
                    </div>
                    <input type="password" class="form-control" name="password_confirmation" required>
                </div>



                <div class="row">

                    <div class="col-sm-12">
                        <input type="submit" class="btn btn-outline-primary float-right" value="Zarejestruj"></div>


                </div>
                </form>

              </div>
        </div>
                </div>
            </div>
        </div>
    </main>


@endsection
