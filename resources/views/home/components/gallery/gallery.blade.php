

<div id='main' class='all_colors' data-scroll-offset='88'>
    @if(sizeof($images)>0)<div id='zdjecia'
         class='main_color   avia-builder-el-109  el_after_av_tab_section  el_before_av_section   masonry-not-first avia-no-border-styling container_wrap fullsize'
         style=' '>
        <div style="    margin-bottom: 20em;" id='av-masonry-2'
             class='av-masonry   noHover av-fixed-size av-no-gap av-hover-overlay- av-masonry-animation-active av-masonry-col-6 av-caption-always av-caption-style- av-masonry-gallery      av-mini-columns-overwrite av-mini-columns-2'>
            <div class='av-masonry-container isotope av-js-disabled '>
                <div class='av-masonry-entry isotope-item av-masonry-item-no-image '></div>


                @foreach($images as $image)
                    <a href="{{URL::asset($image->path)}}"
                       id='av-masonry-2-item-360' data-av-masonry-item='360'
                       class='av-masonry-entry isotope-item post-360 attachment type-attachment status-inherit hentry  av-masonry-item-with-image'
                       title="my-perfect-wedding (1)" itemprop="thumbnailUrl">
                        <div class='av-inner-masonry-sizer'></div>
                        <figure class='av-inner-masonry main_color'>
                            <div class="av-masonry-outerimage-container">
                                <div class="av-masonry-image-container"
                                    @if($image->type=="image") style="background-image: url({{URL::asset($image->path)}});" @else style="background-size: contain;
                                    width: 80%;
                                    margin-left: 10%; background-image: url({{URL::asset('assets/home/wp-content/uploads/2019/08/button.png')}});" @endif()
                                     title="my-perfect-wedding (1)"></div>
                            </div>
                        </figure>
                    </a>
                    @endforeach

           </div>
    </div><!-- close section -->
        <div style="margin-left: 20%;" class="flex_column av_two_third  flex_column_div av-zero-column-padding   avia-builder-el-124  el_after_av_one_third  avia-builder-el-last  "
             style='border-radius:0px; '>
            <div style="padding-bottom:20px; font-size:40px;" class="av-special-heading av-special-heading-h2  blockquote modern-quote modern-centered  avia-builder-el-75  el_before_av_textblock  avia-builder-el-first   av-thin-font av-inherit-size ">
                <h2 class="av-special-heading-tag " itemprop="headline"><strong>Powiadom mnie o pojawieniu się nowych plików w galerii</strong>
                </h2>

                <div class="special-heading-border">
                    <div class="special-heading-inner-border"></div>
                </div>
            </div>
            <div id="form-errors"></div>
            <form action="" method="post"
                  class=" av-form-labels-hidden   avia-builder-el-125  avia-builder-el-no-sibling">
                <fieldset>
                    @csrf
                    <p class=' first_form  form_element form_fullwidth' id='element_avia_1_1'>
                        <input name="email" required class="text_input is_empty" type="email" id="avia_1_1"
                               value="" placeholder='Email'/>

                    </p>
                    <div class="form-check">
                        <input type="checkbox" required class="form-check-input" id="reg">
                        <label class="form-check-label" for="reg">Akceptuje regulamin oraz chcę otrzymywać powiadomienia email.</label>
                    </div>



                    <p class="form_element "><input
                            type="submit" value="Wyślij" class="button"
                            data-sending-label="Trwa wysyłanie..."/></p></fieldset>
            </form>
            <script>
                $('form').on('submit',function(e){
                    e.preventDefault();

                    $.ajax({
                        url: document.location.href,
                        type: 'POST',
                        data: $(this).serialize(),
                        success: function (data) {
                            errors(data, $('#form-errors'));
                        },
                        error: function (data) {
                            errors(data, $('#form-errors'));
                        }
                    });
                });
            </script>
            <div id="ajaxresponse_1" class="ajaxresponse ajaxresponse_1 hidden"></div>
        </div>
        @else
            <div style="margin-left: 20%;" class="flex_column av_two_third  flex_column_div av-zero-column-padding   avia-builder-el-124  el_after_av_one_third  avia-builder-el-last  "
                 style='border-radius:0px; '>
                <div style="padding-bottom:20px; font-size:40px;" class="av-special-heading av-special-heading-h2  blockquote modern-quote modern-centered  avia-builder-el-75  el_before_av_textblock  avia-builder-el-first   av-thin-font av-inherit-size ">
                    <h2 class="av-special-heading-tag " itemprop="headline"><strong>Powiadom mnie o pojawieniu się galerii</strong>
                    </h2>

                    <div class="special-heading-border">
                        <div class="special-heading-inner-border"></div>
                    </div>
                </div>
                <div id="form-errors"></div>
                <form action="" method="post"
                      class=" av-form-labels-hidden   avia-builder-el-125  avia-builder-el-no-sibling">
                    <fieldset>
                        @csrf
                        <p class=' first_form  form_element form_fullwidth' id='element_avia_1_1'>
                            <input name="email" required class="text_input is_empty" type="email" id="avia_1_1"
                                   value="" placeholder='Email'/>
                        </p>
                        <div class="form-check">
                            <input type="checkbox" required class="form-check-input" id="reg">
                            <label class="form-check-label" for="reg">Akceptuje regulamin oraz chcę otrzymywać powiadomienia email.</label>
                        </div>
                        <p class="form_element "><input
                                type="submit" value="Wyślij" class="button"
                                data-sending-label="Trwa wysyłanie..."/></p></fieldset>
                </form>
                <script>
                    $('form').on('submit',function(e){
                        e.preventDefault();

                        $.ajax({
                            url: document.location.href,
                            type: 'POST',
                            data: $(this).serialize(),
                            success: function (data) {
                                errors(data, $('#form-errors'));
                            },
                            error: function (data) {
                                errors(data, $('#form-errors'));
                            }
                        });
                    });
                </script>
                <div id="ajaxresponse_1" class="ajaxresponse ajaxresponse_1 hidden"></div>
            </div>

        @endif
    <div id='av_section_11'
         class='avia-section main_color avia-section-default avia-no-border-styling avia-full-stretch avia-bg-style-scroll  avia-builder-el-127  el_after_av_google_map  avia-builder-el-last    container_wrap fullsize'
         style='margin-top:24em; background-repeat: no-repeat; background-image: url(../../assets/home/wp-content/uploads/2019/08/twojdj-bg-03.jpg);background-attachment: scroll; background-position: center center;  '
         data-section-bg-repeat='stretch'>
        <div class='container'>
            <div class='template-page content  av-content-full alpha units'>
                <div class='post-entry post-entry-type-page post-entry-16'>
                    <div class='entry-content-wrapper clearfix'>
                        <div class="flex_column av_one_fifth  flex_column_div av-zero-column-padding first  avia-builder-el-128  el_before_av_one_fifth  avia-builder-el-first  "
                             style='border-radius:0px; '><span
                                class="av_font_icon avia_animate_when_visible avia-icon-animate  av-icon-style-border  avia-icon-pos-center "
                                style="color:#ffffff; border-color:#ffffff;"><a href='tel:+48794794124'
                                                                                class='av-icon-char'
                                                                                style='font-size:40px;line-height:40px;width:40px;'
                                                                                aria-hidden='true' data-av_icon=''
                                                                                data-av_iconfont='entypo-fontello'></a><span
                                    class='av_icon_caption av-special-font'>794 794 124</span></span></div>
                        <div class="flex_column av_one_fifth  flex_column_div av-zero-column-padding   avia-builder-el-130  el_after_av_one_fifth  el_before_av_one_fifth  "
                             style='border-radius:0px; '><span
                                class="av_font_icon avia_animate_when_visible avia-icon-animate  av-icon-style-border  avia-icon-pos-center "
                                style="color:#ffffff; border-color:#ffffff;"><a
                                    href='mailto:info@myperfectwedding.pl' class='av-icon-char'
                                    style='font-size:40px;line-height:40px;width:40px;' aria-hidden='true'
                                    data-av_icon='' data-av_iconfont='entypo-fontello'></a><span
                                    class='av_icon_caption av-special-font'>NAPISZ</span></span></div>
                        <div class="flex_column av_one_fifth  flex_column_div av-zero-column-padding   avia-builder-el-132  el_after_av_one_fifth  el_before_av_one_fifth  "
                             style='border-radius:0px; '><span
                                class="av_font_icon avia_animate_when_visible avia-icon-animate  av-icon-style-border  avia-icon-pos-center "
                                style="color:#ffffff; border-color:#ffffff;"><a
                                    href='https://www.facebook.com/party4youPL/' target="_blank" class='av-icon-char'
                                    style='font-size:40px;line-height:40px;width:40px;' aria-hidden='true'
                                    data-av_icon='' data-av_iconfont='entypo-fontello'></a><span
                                    class='av_icon_caption av-special-font'>FACEBOOK</span></span></div>
                        <div class="flex_column av_one_fifth  flex_column_div av-zero-column-padding   avia-builder-el-134  el_after_av_one_fifth  el_before_av_one_fifth  "
                             style='border-radius:0px; '><span
                                class="av_font_icon avia_animate_when_visible avia-icon-animate  av-icon-style-border  avia-icon-pos-center "
                                style="color:#ffffff; border-color:#ffffff;"><a href='#' target="_blank"
                                                                                class='av-icon-char'
                                                                                style='font-size:40px;line-height:40px;width:40px;'
                                                                                aria-hidden='true' data-av_icon=''
                                                                                data-av_iconfont='entypo-fontello'></a><span
                                    class='av_icon_caption av-special-font'>INSTAGRAM</span></span></div>
                        <div class="flex_column av_one_fifth  flex_column_div av-zero-column-padding   avia-builder-el-136  el_after_av_one_fifth  el_before_av_hr  "
                             style='border-radius:0px; '><span
                                class="av_font_icon avia_animate_when_visible avia-icon-animate  av-icon-style-border  avia-icon-pos-center "
                                style="color:#ffffff; border-color:#ffffff;"><a href='#' target="_blank"
                                                                                class='av-icon-char'
                                                                                style='font-size:40px;line-height:40px;width:40px;'
                                                                                aria-hidden='true' data-av_icon=''
                                                                                data-av_iconfont='entypo-fontello'></a><span
                                    class='av_icon_caption av-special-font'>YOUTUBE</span></span></div>
                        <div style='height:50px'
                             class='hr hr-invisible   avia-builder-el-138  el_after_av_one_fifth  el_before_av_one_third  '>
                            <span class='hr-inner '><span class='hr-inner-style'></span></span></div>
                        <div class="flex_column av_one_third  flex_column_div av-zero-column-padding first  avia-builder-el-139  el_after_av_hr  el_before_av_one_third  "
                             style='border-radius:0px; '></div>
                        <div class="flex_column av_one_third  flex_column_div av-zero-column-padding   avia-builder-el-140  el_after_av_one_third  el_before_av_one_third  "
                             style='border-radius:0px; '>
                            <div class='avia-builder-widget-area clearfix  avia-builder-el-141  avia-builder-el-no-sibling '>
                                <section id="avia_fb_likebox-2" class="widget clearfix avia_fb_likebox">
                                    <div class='av_facebook_widget_wrap '>
                                        <div class="fb-page" data-width="500"
                                             data-href="https://www.facebook.com/Twojdjcom"
                                             data-small-header="false" data-adapt-container-width="true"
                                             data-hide-cover="false" data-show-facepile="true"
                                             data-show-posts="false">
                                            <div class="fb-xfbml-parse-ignore"></div>
                                        </div>
                                    </div>
                                    <span class="seperator extralight-border"></span></section>
                            </div>
                        </div>
                        <div class="flex_column av_one_third  flex_column_div av-zero-column-padding   avia-builder-el-142  el_after_av_one_third  avia-builder-el-last  "
                             style='border-radius:0px; '></div>
                    </div>
                </div>
            </div><!-- close content main div --> <!-- section close by builder template -->        </div>
        <!--end builder template--></div><!-- close default .container_wrap element -->


    <footer  class='container_wrap socket_color' id='socket' role="contentinfo" itemscope="itemscope"
            itemtype="https://schema.org/WPFooter">
        <div class='container'>

               <span class='copyright'><a href='https://www.hypedev.pl/'><img style="    margin-top: 8px;"
                                                                              src="{{URL::asset('assets/home/wp-content/uploads/2019/08/hypedev.png')}}"></a></span>


        </div>

        <!-- ####### END SOCKET CONTAINER ####### -->
    </footer>


    <!-- end main -->
</div>
