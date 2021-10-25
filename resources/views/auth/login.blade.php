@if(!Request::ajax())
    @extends('admin.master')
@endif

@section('body')
    <main class="admin-main  ">
        <div class="container-fluid">
            <div class="col-lg-4 my-auto mx-auto">
            <div id="login_errors"></div>
            </div>
            <div class="row ">

                <div class="col-lg-4 my-auto mx-auto bg-white">


        <div class="card under-img-card-ss" style="    padding: 20px;">
            <div class="card-header under-img-card-header text-center" style="    font-size: 22px;">Logowanie</div>
            <div class="card-body card-body-ss">
                <form action="{{route('login')}}" id="action" data-alert="login_errors" data-reload="true" data-success="Pomyślnie zalogowano! Jeśli nie nastąpi przeniesienie odśwież stronę." method="POST">
                    @csrf
                    <div class="col-md-12 singing" >
                        <div class="bs-component">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"  id="inputGroup-sizing-default">Login</span>
                        </div>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Hasło</span>
                        </div>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" name="remember_me" type="checkbox" id="remember_me">
                            <label class="form-check-label" for="remember_me">
                                Zapamiętaj mnie.
                            </label>

                        </div>

                    </div>

                    <div class="form-group">
                        <a class='right' data-redirect="true" href="{{route('password.request')}}">Zapomniałeś hasła?</a>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg btn-block">Zaloguj</button>

                        </div>
                    </div>

                </form>

            </div>
        </div>

                </div>
            </div>
        </div>

    </main>
@endsection
