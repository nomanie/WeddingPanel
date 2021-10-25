
$(':checkbox').change(function() {

        let checked =  $(this).attr("checked");
        if($(this).data('hide'))
        {

            console.log(2);
                let stuff = $(this).data('input').split(',');
           if(checked)
           {

                   stuff.forEach(function(e) {
                           $("." + e).attr("style", "display: none !important");
                           $('label[for='+  e  +']').attr("style", "display: none !important");
                   })
           }else{
                   stuff.forEach(function(e) {
                           $("." + e).show();
                           $('label[for='+  e  +']').show();
                   })
           }
        }
        else if($(this).data('show'))
        {

            console.log(3);
                let stuff = $(this).data('input').split(',');
                if(checked)
                {

                        stuff.forEach(function(e) {
                                $("." + e).attr("style", "display: none !important");
                                $('label[for='+  e  +']').attr("style", "display: none !important");
                        })
                }else{
                        stuff.forEach(function(e) {
                                $("." + e).show();
                                $('label[for='+  e  +']').show();
                        })
                }

        }

});
function errors(data, selector) {
    selector.empty();
    selector.show();
    const error = ({alert, message}) => `   <div class="alert ${alert}" role="alert">
                        ${message}
                    </div>
    `;
    if (data['error'])
        selector.prepend(error({'alert': 'alert-danger', 'message': data['error']}));
    else if (data['success'])
        selector.prepend(error({'alert': 'alert-success', 'message': data['success']}));
    else {
        var l = JSON.parse(data.responseText);
        var i = 0;
        $.each(l['errors'], function (heading, text) {
            i++;
            selector.prepend(error({'alert': 'alert-danger', 'message': text}));
        });
    }
}
