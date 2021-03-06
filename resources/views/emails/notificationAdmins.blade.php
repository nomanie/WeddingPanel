<!DOCTYPE html>
<html>
<head>
    <title>Formularz weselny:</title>
</head>
<body style="background-color:#EDF2F9;">

<div style="background:#ffffff;background-color:#ffffff;Margin:0px auto;max-width:100%;">
    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#ffffff;background-color:#ffffff;width:100%;">
        <tbody>
        <tr>
            <td style="direction:ltr;font-size:0px;padding:15px;text-align:center;vertical-align:top;">
                <!--[if mso | IE]>
                <table role="presentation" border="0" cellpadding="0" cellspacing="0">

                    <tr>

                        <td
                            class="" style="vertical-align:top;width:570px;"
                        >
                <![endif]-->
                <div class="mj-column-per-100 outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                    <hr>
                    <h3>Nowy Formularz!</h3>
                    <div class="form-row">
                    </div>
                    <hr>
                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border:1px solid #dddddd;vertical-align:top;" width="100%">
                        <tbody><tr>
                            <td align="left" style="font-size:0px;padding:20px 20px 5px 20px;word-break:break-word;">
                                <div style="font-family:'Helvetica Neue', Helvetica, Arial, sans-serif;font-size:16px;font-weight:400;line-height:24px;text-align:left;color:#000000;">
                                    <h3 style="margin:0">Formularz weselny:</h3>
                                    <h3 style="margin:0">ID:{{$details['id']}}</h3>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size:0px;padding:0 20px;word-break:break-word;">
                                <p style="border-top:solid 1px lightgrey;font-size:1;margin:0px auto;width:100%;"> </p>
                                <!--[if mso | IE]>
                                <table
                                        align="center" border="0" cellpadding="0" cellspacing="0" style="border-top:dashed 1px lightgrey;font-size:1;margin:0px auto;width:528px;" role="presentation" width="528px"
                                >
                                  <tr>
                                    <td style="height:0;line-height:0;">
                                      &nbsp;
                                    </td>
                                  </tr>
                                </table>
                                <![endif]-->
                            </td>
                        </tr>
                        <tr>
                            <td align="left" style="font-size:0px;padding:20px;word-break:break-word;">
                                <div style="font-family:'Helvetica Neue', Helvetica, Arial, sans-serif;font-size:16px;font-weight:400;line-height:24px;text-align:left;color:#000000;">
                                    <h3>Pan m??ody</h3>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <div>Imi??: {{$details['groom_first_name']}}</div>
                                            <div>Nazwisko: {{$details['groom_last_name']}}</div>
                                            <div>Data Urodzenia: {{$details['groom_birthdate']}}</div>
                                            <div>Numer telefonu: {{$details['groom_phone_number']}}</div>
                                            <div>Adres email: {{$details['groom_email']}}</div>
                                        </div>
                                    </div >
                                    <h3>Panna m??oda</h3>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <div>Imi??: {{$details['bride_first_name']}}</div>
                                            <div>Nazwisko: {{$details['bride_last_name']}}</div>
                                            <div>Data Urodzenia: {{$details['bride_birthdate']}}</div>
                                            <div>Numer telefonu: {{$details['bride_phone_number']}}</div>
                                            <div>Adres email: {{$details['bride_email']}}</div>
                                        </div>
                                    </div>
                                    <h3>Szczeg????y wesela</h3>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">

                                            @if($details['music_for_first_dance'])<div>Utw??r na pierwszy taniec: {{$details['music_for_first_dance']}}</div>@endif

                                        </div>
                                        <div class="form-group col-md-6">
                                            @if($details['music_for_first_dance_original'])
                                                @if($details['music_for_first_dance_original'])  <div>Czy jest to orginalna wersja: @if($details['music_for_first_dance_original'])Tak @else Nie @endif</div> @endif
                                                <div>Ca??y utw??r:  @if($details['music_for_first_dance_full_length'])Tak @else Nie @endif<</div>
                                                @if($details['music_for_first_dance_start'])  <div>Od {{$details['music_for_first_dance_start']}}</div> @endif
                                                @if($details['music_for_first_dance_end'])  <div>Do {{$details['music_for_first_dance_end']}}</div> @endif
                                            @endif

                                        </div>
                                        <div class="form-group col-md-6">

                                            <div>Czy s?? planowane podzi??kowania: @if($details['thanks_to_parents'])Tak @else Nie @endif</div>
                                            @if($details['thanks_to_parents'])      <div>Je??li tak to w jakiej formie: {{$details['thanks_to_partens_description']}}</div> @endif

                                        </div>
                                        <div class="form-group col-md-6">
                                            <div>Imiona rodzic??w Panny m??odej {{$details['bride_parents_first_names']}}</div>
                                            <div>Imiona rodzic??w Pana m??odego {{$details['groom_parents_first_names']}}</div>
                                        </div>
                                        <div class="form-group col-md-6">

                                            <div>Podanie tortu: {{$details['cake_time']}}</div>
                                            <div>Podanie szynki/ud??ca: {{$details['meat_time']}}</div>


                                        </div>
                                    </div>
                                    <h3>G????wne us??ugi</h3>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">

                                            <div>Oprawa muzyczna: @if($details['services_music'])Tak @else Nie @endif</div>
                                            <div>Fotografia: @if($details['services_photo'])Tak @else Nie @endif</div>
                                            <div>Filmowanie: @if($details['services_video'])Tak @else Nie @endif</div>

                                        </div>
                                    </div>
                                    <h3>Dodatkowe us??ugi</h3>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">

                                            <div>O??wietlenie dekoracyjne: @if($details['our_services_lights'])Tak @else Nie @endif</div>
                                            <div>Ci????ki dym: @if($details['our_services_smoke'])Tak @else Nie @endif</div>
                                            <div>Fotobudka: @if($details['our_services_photo_booth'])Tak @else Nie @endif</div>

                                        </div>
                                        <div class="form-group col-md-6">
                                            <div>Napis love: @if($details['our_services_love_sign'])Tak @else Nie @endif</div>
                                            <div>Us??ugi barma??skie: @if($details['our_services_bartending'])Tak @else Nie @endif</div>
                                            <div>Oprawa live instrumental: @if($details['our_services_live_instrumental'])Tak @else Nie @endif</div>
                                        </div>
                                    </div>
                                    @if($details['services_photo'])<h3>Fotografia</h3>@endif()
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            @if($details['special_wishes_photo_description'])  <div>Specjalne ??yczenia dotycz??ce fotografii:</div>
                                            <div>{{$details['special_wishes_photo_description']}}</div>@endif()
                                        </div>
                                        <div class="form-group col-md-6">

                                            @if($details['longer_movie'] != 0 || $details['longer_movie'])  <div>D??u??sza wersja filmu:</div>
                                            <div>{{$details['longer_movie']}}</div>@endif()

                                        </div>
                                        <div class="form-group col-md-6">
                                            @if($details['special_wishes_video_description'])   <div>Specjalne ??yczenia dotycz??ce filmu, monta??u:</div>
                                            <div>{{$details['special_wishes_video_description']}}</div>@endif()
                                        </div>
                                        <div class="form-group col-md-6">
                                            @if($details['video_own_music'])  <div>W??asny podk??ad muzyczny</div>
                                            <div>{{$details['video_own_music']}}</div>@endif()

                                        </div>
                                    </div>
                                    <h3>Wa??ne momenty</h3>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            @if($details['prepare_date'])<div>Godzina przygotowa??: {{$details['prepare_date']}}</div>@endif()
                                            @if($details['groom_prepare_address']) <div>Adres przygotowa?? Pana m??odego: {{$details['groom_prepare_address']}}</div>@endif()
                                        </div>
                                        <div class="form-group col-md-6">
                                            @if($details['restaurant_come'])<div>Planowana godzina przybycia na sal??: {{$details['restaurant_come']}}</div>@endif()
                                            @if($details['bride_prepare_address'])<div>Adres przygotowa?? Panny m??odej: {{$details['bride_prepare_address']}}</div>@endif()
                                        </div>
                                        <div class="form-group col-md-6">
                                            @if($details['wedding_date'])<div>Godzina ??lubu: {{$details['wedding_date']}}</div>@endif()
                                            @if($details['wedding_address'])<div>Adres ??lubu: {{$details['wedding_address']}}</div>@endif()
                                        </div>
                                        <div class="form-group col-md-6">
                                            @if($details['party_date'])<div>Data wesela: {{$details['party_date']}}</div>@endif()
                                            @if($details['party_address'])<div>Adres wesela: {{$details['party_address']}}</div>@endif()
                                        </div>
                                    </div>
                                    <h3>Inne</h3>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            @if($details['own_music']) <div>W??asne utwory:</div>
                                            <div>{{$details['own_music']}}</div> @endif()
                                            @if($details['forbidden_music']) <div>Zakazane utwory:</div>
                                            <div>{{$details['forbidden_music']}}</div> @endif()
                                            @if($details['wishes'])  <div>W??asne ??yczenia:</div>
                                            <div>{{$details['wishes']}}</div> @endif
                                            @if($details['additional_attractions'])   <div>Czy planowane s?? dodatkowe atrakcje:</div>
                                            <div>{{$details['additional_attractions']}}</div> @endif()
                                        </div>

                                    </div>


                                </div>

                            </td>
                        </tr>
                        </tbody></table>
                </div>
                <!--[if mso | IE]>
                </td>

                </tr>

                </table>
                <![endif]-->
            </td>
        </tr>
        </tbody>
    </table>
</div>


</body>
</html>
