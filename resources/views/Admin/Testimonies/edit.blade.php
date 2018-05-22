
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Modal Title</h4>
            </div>

            <div class="modal-body">
                <form action="/admin-panel/Testimonies/{{$testimony->id}}/update" method="POST" enctype="multipart/form-data" class="edittestimonyform">
                    <div id='editformresults'> </div>
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <div class="form-group" id="Title">
                        <label>Title</label>
                        <input class="form-control spinner" type="text" placeholder="Press your Name" value="{{$testimony->title }}" name="title">
                            <span class="help-block">
                               <strong class="title"></strong>
                           </span>

                    </div>

                    <div class="form-group" id="TContent">
                        <label>Content</label>
                        <textarea class="form-control spinner"  name="content"> {{$testimony->content}} </textarea>
                            <span class="help-block">
                                   <strong class="tcontent"></strong>
                            </span>

                    </div>
                    <div class="form-group" id="Name">
                        <label>Name</label>
                        <input class="form-control spinner" type="text" placeholder="Press your Name" value="{{$testimony->name }}" name="name">
                            <span class="help-block">
                               <strong class="name"></strong>
                           </span>

                    </div>

                    <div class="modal-footer">
                        <input type="hidden" value="{{$testimony->id}}" name="id">
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
        form = Button.parents('.edittestimonyform');
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
               if (error.hasOwnProperty('name'))
                {
                    $.each(error['name'], function (i,m) {
                        $("#Name").removeClass().addClass('form-group  has-error');
                        $('.name').html(m);
                    });

                }
               else if (error.hasOwnProperty('title')) {
                   $.each(error['title'], function (i, m) {
                       $("#Title").removeClass().addClass('form-group  has-error');
                       $('.title').html(m);


                   });
               }else if (error.hasOwnProperty('content')) {
                   $.each(error['content'], function (i, m) {
                       $("#TContent").removeClass().addClass('form-group  has-error');
                       $('.tcontent').html(m);


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