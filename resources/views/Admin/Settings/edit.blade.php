
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">update {{$setting->name}}</h4>
            </div>

            <div class="modal-body">
                <form action="/admin-panel/settings/{{$setting->id}}/update" method="POST" enctype="multipart/form-data" class="editplanform">
                    <div id='editformresults'> </div>
                    {{csrf_field()}}
                    {{method_field('PUT')}}

                    <div class="form-group" id="Title">
                        <label>name</label>
                        <input class="form-control spinner" type="text" placeholder="enter the name" value="{{$setting->name }}" name="name">
                            <span class="help-block">
                               <strong class="name"></strong>
                           </span>
                    </div>
                    <div class="form-group" id="Desc">
                        <label>Description</label>
                        <input class="form-control spinner" type="text"  value="{{$setting->desc }}" name="desc">
                            <span class="help-block">
                                   <strong class="desc"></strong>
                            </span>

                    </div>
                    <div class="form-group" id="SContent">
                        <label>Content</label>
                        <textarea class="form-control spinner" type="text"  name="content">{{$setting->content }}</textarea>
                            <span class="help-block">
                    <strong class="scontent"></strong>
                </span>

                    </div>






                    
                    <input type="hidden" value="{{$setting->id}}" name="id">


                    <div class="modal-footer">
                        <input type="hidden" value="{{$setting->id}}" name="id">
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
                if (error.hasOwnProperty('name'))
                {
                    $.each(error['name'], function (i,m) {
                        $("#Name").removeClass().addClass('form-group  has-error');
                        $('.name').html(m);
                    });

                }else if (error.hasOwnProperty('content')) {
                    $.each(error['content'], function (i, m) {
                        $("#SContent").removeClass().addClass('form-group  has-error');
                        $('.scontent').html(m);
                    });
                }

                else if (error.hasOwnProperty('desc')) {
                    $.each(error['desc'], function (i, m) {
                        $("#Desc").removeClass().addClass('form-group  has-error');
                        $('.desc').html(m);
                    });
                }

                else {
                    console.log(data.responseText);
                }
            },

            success: function (data) {
                    if(data.status == "failed"){
                        result.removeClass().addClass('alert alert-warning').html(data.msg);

                    }else {
                        result.removeClass().addClass('alert alert-success').html(data.msg);

                    }
            },
            cache: false,
            processData: false,
            contentType: false,



        })
    });
</script>