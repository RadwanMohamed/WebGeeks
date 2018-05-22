
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Update {{$cat->name}}</h4>
            </div>

            <div class="modal-body">
                <form action="/admin-panel/categories/{{$cat->id}}/update" method="POST" enctype="multipart/form-data" class="editcatform">
                    <div id='editformresults'> </div>
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <div class="form-group" id="Name">
                        <label>Name</label>
                        <input class="form-control spinner" type="text" placeholder="Press the name" value="{{$cat->name }}" name="name">
                            <span class="help-block">
                               <strong class="name"></strong>
                           </span>

                    </div>

                    <div class="form-group"id="Img">
                        <label for="exampleInputFile1">Enter Your Image</label>
                        @if($cat->img !== '')
                            <img src="{{Request::root()}}/Website/img/categories/{{$cat->img}}"  title="category image" class="img-circle" style="width: 60px; height: 60px; float: right;" >
                        @endif
                        <input type="file" id="exampleInputFile1" name="img" value="{{$cat->img}}">
                            <span class="help-block">
                                 <strong class="img"></strong>
                             </span>
                    </div>
                    
                    <input type="hidden" value="{{$cat->id}}" name="id">


                    <div class="modal-footer">
                        <input type="hidden" value="{{$cat->id}}" name="id">
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
        form = Button.parents('.editcatform');
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
               else if (error.hasOwnProperty('img')){
                   $.each(error['img'], function (i,m) {
                       $("#Img").removeClass().addClass('form-group  has-error');
                       $('.img').html(m);
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