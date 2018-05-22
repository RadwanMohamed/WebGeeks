
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Modal Title</h4>
            </div>

            <div class="modal-body">
                <form action="/admin-panel/services/{{$service->id}}/update" method="POST" enctype="multipart/form-data" class="editskillform">
                    <div id='editformresults'> </div>
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <div class="form-group" id="Name">
                        <label>Name</label>
                        <input class="form-control spinner" type="text" placeholder="Press your Name" value="{{$service->name }}" name="name">
                            <span class="help-block">
                               <strong class="name"></strong>
                           </span>

                    </div>
                    <div class="form-group" id="Logo">
                        <label>Logo</label>
                        <input class="form-control spinner" type="text" placeholder="Press your Name" value="{{$service->logo }}" name="logo">
                            <span class="help-block">
                               <strong class="logo"></strong>
                           </span>

                    </div>

                    <div class="form-group" id="Desc">
                        <label>Description</label>
                        <textarea class="form-control spinner" type="text" name="Desc"> {{$service->Desc}} </textarea>
                            <span class="help-block">
                                   <strong class="desc"></strong>
                            </span>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" value="{{$service->id}}" name="id">
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
        form = Button.parents('.editskillform');
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

               if (error.hasOwnProperty('name'))
                {
                    $.each(error['name'], function (i,m) {
                        $("#Name").removeClass().addClass('form-group  has-error');
                        $('.name').html(m);
                    });

                }
               else if (error.hasOwnProperty('logo')) {
                   $.each(error['logo'], function (i, m) {
                       $("#Logo").removeClass().addClass('form-group  has-error');
                       $('.logo').html(m);


                   });
               }else if (error.hasOwnProperty('Desc')) {
                   $.each(error['Desc'], function (i, m) {
                       $("#Desc").removeClass().addClass('form-group  has-error');
                       $('.desc').html(m);


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