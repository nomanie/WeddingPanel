
@extends('app')

@section('content')

    <div id="content" class="zrelative sitdown">
        <div id="provocation_area">

        </div>
        <div id="content-top" class="zabsolute">&nbsp;</div>


        <form action="{{ route('password.confirm') }}" method="post" name="formPassConfirm" id="formPassConfirm">
            <input name="redirect" type="hidden" value="">
            <div id="itemsbought" class="grunge" style="margin-left: 110px;margin-top: 20px;">
                <div class="bottom">
                    <h2>Potwierdzenie hasła</h2>
                    <div class="gbox odd">

                        <table width="450" cellpadding="4" cellspacing="1" bgcolor="#303030"
                               style="padding:5px; border: 1px solid #272727;">

                            @csrf


                            <tbody>
                            <tr>
                                <td align="right">
                                    <div align="right">Hasło:</div>
                                </td>
                                <td halign="right"><input id="password" name="password" type="password" size="28"
                                                          required></td>
                            </tr>
                            <tr>
                                <td align="right" height="10"><br></td>
                                <td halign="right"><input type="submit" style="font-size: 13px;" value="{{ __('Confirm Password') }}"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>
        <center>


        </center>


        <div id="content-bottom" class="zabsolute">&nbsp;</div>
    </div>

@endsection

