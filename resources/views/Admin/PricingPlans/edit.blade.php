
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Modal Title</h4>
            </div>

            <div class="modal-body">
                <form action="/admin-panel/pricingplans/{{$plan->id}}/update" method="POST" enctype="multipart/form-data" class="editplanform">
                    <div id='editformresults'> </div>
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <div class="form-group" id="Type">
                        <label>Type</label>
                        <input class="form-control spinner" type="text" placeholder="Press your type" value="{{$plan->type }}" name="type">
                            <span class="help-block">
                               <strong class="type"></strong>
                           </span>

                    </div>
                    <div class="form-group" id="Price">
                        <label>Price</label>
                        <input class="form-control spinner" type="text" placeholder="Press the price" value="{{$plan->price }}" name="price">
                            <span class="help-block">
                               <strong class="price"></strong>
                           </span>

                    </div>
                   <div class="form-group" id="Currency">
                        <label>currency</label>
                        <input class="form-control spinner" type="text" placeholder="Press the currency" value="{{$plan->currency }}" name="currency">
                            <span class="help-block">
                               <strong class="currency"></strong>
                           </span>

                    </div>
                    <div class="form-group" id="Time">
                        <label>Time</label>
                        <input class="form-control spinner" type="text" placeholder="Press the time" value="{{$plan->time }}" name="time">
                            <span class="help-block">
                               <strong class="time"></strong>
                           </span>

                    </div>
                    <div class="form-group" id="Properties">
                        <label>Properties : (seprate each property by ' , ')</label>
                        <textarea class="form-control spinner"  name="properties"> {{$plan->properties}} </textarea>
                            <span class="help-block">
                                   <strong class="properties"></strong>
                            </span>

                    </div>
                    <input type="hidden" value="{{$plan->id}}" name="id">


                    <div class="modal-footer">
                        <input type="hidden" value="{{$plan->id}}" name="id">
                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                        <button type="button" id="save" class="btn green">Save changes</button>
                    </div>
                </form>

            </div>

        </div>
        <!-- /.modal-content -->

    <!-- /.modal-dialog -->

<script>
    $('#save').on('click',function(e){
        e.preventDefault();
        Button = $(this);
        form = Button.parents('.editplanform');
        url = form.attr('action');
        data = new FormData(form[0]);
        result = form.find('#editformresults');
       $.ajax({
       type: 'POST',
       url: url,
       data: data,
       dataType: 'json',

      beforeSend: function () {
          result.removeClass().addClass('alert alert-info').html('loading....');
        },
            error: function(data) {
                var error = data.responseJSON;
                console.log(error);
               if (error.hasOwnProperty('type'))
                {
                    $.each(error['type'], function (i,m) {
                        $("#Type").removeClass().addClass('form-group  has-error');
                        $('.type').html(m);
                    });

                }
               else if (error.hasOwnProperty('price')) {
                   $.each(error['price'], function (i, m) {
                       $("#Price").removeClass().addClass('form-group  has-error');
                       $('.price').html(m);


                   });
               } else if (error.hasOwnProperty('currency')) {
                   $.each(error['currency'], function (i, m) {
                       $("#Currency").removeClass().addClass('form-group  has-error');
                       $('.currency').html(m);


                   });
               } else if (error.hasOwnProperty('time')) {
                   $.each(error['time'], function (i, m) {
                       $("#Time").removeClass().addClass('form-group  has-error');
                       $('.time').html(m);


                   });
               }else if (error.hasOwnProperty('properties')) {
                   $.each(error['properties'], function (i, m) {
                       $("#Properties").removeClass().addClass('form-group  has-error');
                       $('.properties').html(m);


                   });
               }
              else {
                    console.log(data.responseText);
                }
            },
            success: function (data) {
                result.removeClass().addClass('alert alert-success').html(data.msg);

            },
            cache: false,
            processData: false,
            contentType: false,



        })
    });
</script>