 @if(Request::ajax())
@extends('app')
@endif
@section('content')

<div class="bs-docs-section " >
      
            <form action="{{ route('password.request') }}" data-success="Pomyślnie zmieniono hasło!" id="action"  method="POST">
        @csrf
               <input type="hidden" name="token" value="{{ $token }}">
                <div class="row" >
          
          
                    <div class="col-lg-6 singing" >
            
          
                        <div class="bs-component">
                          <div id="errors"> </div>
           
          
                            <div class="jumbotron">
                                <div class="form-group">
                               <label for="email"> Adres email</label>
                            <input class="form-control" type="email" placeholder="Adres email" id="email" aria-describedby="emailHelp" name="email" >
                           
                          </div>
                                    <div class="form-group">
                         <label for="singing_up_password_input"> Hasło</label>
                            <input class="form-control" type="password" placeholder="Hasło" id="password" name="password">
                          </div>
                            <div class="form-group">
                          <label for="singing_up_password_input">Powtórz hasło</label>
                            <input class="form-control" type="password" placeholder="Powtórz hasło" id="password_confirmation" name="password_confirmation">
                         
                          </div>
                                  

                                <button type="submit" class="btn btn-primary btn-lg btn-block">Zmień hasło</button>
                             
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

@endsection




