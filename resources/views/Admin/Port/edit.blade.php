{{$port->id}}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Modal Title</h4>
            </div>

            <div class="modal-body">
                <form action="/admin-panel/port/{{$port->id}}/update" method="POST" enctype="multipart/form-data" class="editportform">
                    <div id='editformresults'> </div>
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <div class="form-group" id="Name">
                        <label>Name</label>
                        <input class="form-control spinner" type="text" placeholder="Press your Name" value="{{$port->name }}" name="name">
                            <span class="help-block">
                    <strong class="name"></strong>
                </span>

                    </div>

                    <div class="form-group" id="Category">
                        <label>Category</label>
                        <input class="form-control spinner" type="text"value="{{$port->category }}" name="category">
                            <span class="help-block">
                    <strong class="category"></strong>
                            </span>

                    </div>
                    <div class="form-group" id="PContent">
                        <label>content</label>
                        <input class="form-control spinner" type="text" value="{{$port->content }}" name="content">
                            <span class="help-block">
                    <strong class="Pcontent"></strong>
                </span>

                    </div>
                    <div class="form-group" id="Desc">
                        <label>Description</label>
                        <input class="form-control spinner" type="text"  value="{{$port->desc }}" name="desc">
                            <span class="help-block">
                                   <strong class="desc"></strong>
                            </span>

                    </div>







                    <div class="form-group"id="Img">
                        <label for="exampleInputFile1">Enter Your Image</label>
                        @if($port->img !== '')
                        <img src="{{Request::root()}}/Website/img/port/{{$port->img}}" title="port_image" class="img-circle" style="width: 60px; height: 60px; float: right;" >
                        @endif
                        <input type="file" id="exampleInputFile1" name="img" value="{{$port->img}}">
                            <span class="help-block">
                                 <strong class="img"></strong>
                             </span>
                    </div>
                    <input type="hidden" value="{{$port->id}}" name="id">
                    <div class="modal-footer">
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
        form = Button.parents('.editportform');
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
                       $("#PContent").removeClass().addClass('form-group  has-error');
                       $('.Pcontent').html(m);
                   });
               }
               else if (error.hasOwnProperty('category')) {
                   $.each(error['category'], function (i, m) {
                       $("#Category").removeClass().addClass('form-group  has-error');
                       $('.category').html(m);


                   });
               }
               else if (error.hasOwnProperty('desc')) {
                   $.each(error['desc'], function (i, m) {
                       $("#Desc").removeClass().addClass('form-group  has-error');
                       $('.desc').html(m);
                   });
               }

               else if (error.hasOwnProperty('img')){
                    $.each(error['img'], function (i,m) {
                        $("#Img").removeClass().addClass('form-group  has-error');
                        $('.img').html(m);
                    });
                }else {
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