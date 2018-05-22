        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Modal Title</h4>
            </div>
            <div class="modal-body">
                <form action="/admin-panel/users/{{$user->id}}/update" method="POST" enctype="multipart/form-data" class="edituserform">
                    <div id='editformresults'> </div>
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <div class="form-group" id="Name">
                        <label>Name</label>
                        <input class="form-control spinner" type="text" placeholder="Press your Name" value="{{$user->name }}" name="name">
                            <span class="help-block">
                    <strong class="name"></strong>
                </span>

                    </div>

                    <div class="form-group {{ $errors->has('permissions') ? ' has-error' : '' }}">
                        <label>Permissions</label>
                        <select class="form-control" name="permissions">
                            <option value="0"
                            @if($user->admin===0)
                                {{"selected"}}
                                @endif
                            >user</option>
                            <option value="1"
                            @if($user->admin===1)
                                    {{"selected"}}
                                    @endif
                            )>admin</option>
                        </select>
                        @if ($errors->has('permissions'))
                            <span class="help-block">
                    <strong>{{ $errors->first('permissions') }}</strong>
                </span>
                        @endif
                    </div>

                    <div class="form-group " id="E-mail">
                        <label>E-mail</label>
                           <div class="input-group input-icon right">
                                     <span class="input-group-addon">
                                     <i class="fa fa-envelope font-purple"></i>
                                      </span>

                            <input id="email" class="input-error form-control" type="text" value="{{ $user->email }}" name="email">
                            <i class="fa fa-exclamation tooltips" data-original-title="Invalid email." data-container="body"></i>
                        </div>
                        <span class="help-block">
                            <strong class="email"></strong>
                        </span>
                    </div>





                    <div class="form-group"id="Img">
                        <label for="exampleInputFile1">Enter Your Image</label>
                        @if($user->img !== '')
                        <img src="{{Request::root()}}/Admin/users_images/{{$user->img}}" title="user_image" class="img-circle" style="width: 60px; height: 60px; float: right;" >
                        @endif
                        <input type="file" id="exampleInputFile1" name="img" value="{{$user->img}}">

                            <span class="help-block">
                    <strong class="img"></strong>
                </span>


                    </div>
<input type="hidden" value="{{$user->id}}" name="id">
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
        form = Button.parents('.edituserform');
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
                if(error.hasOwnProperty('email'))
                {
                    result.removeClass().html('');
                    $.each(error['email'], function (i,m) {
                        $("#E-mail").removeClass().addClass('form-group  has-error');
                        $('.email').html(m);
                    });
                }else if (error.hasOwnProperty('name'))
                {
                    $.each(error['name'], function (i,m) {
                        $("#Name").removeClass().addClass('form-group  has-error');
                        $('.name').html(m);
                    });

                }else if (error.hasOwnProperty('img')){
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