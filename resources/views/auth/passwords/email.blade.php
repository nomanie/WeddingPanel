 @if(Request::ajax())
@extends('app')
@endif
@section('content')

<div class="bs-docs-section " >
      
            <form action="{{ route('password.email') }}" data-success="Link resetujący został wysłany na twojego maila!" id="action"  method="POST">
        @csrf
                <div class="row" >
          
          
                    <div class="col-lg-6 singing" >
            
          
                        <div class="bs-component">
                          <div id="errors"> </div>
           
          
                            <div class="jumbotron">
                                <div class="form-group">
                               <label for="email"> Adres email</label>
                            <input class="form-control" type="email" placeholder="Adres email" id="email" aria-describedby="emailHelp" name="email" >
                           
                          </div>
                                  

                                <button type="submit" class="btn btn-primary btn-lg btn-block">Przypomnij hasło</button>
                             
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

@endsection



