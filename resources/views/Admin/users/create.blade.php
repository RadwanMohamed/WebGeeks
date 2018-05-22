<h1 class="page-title"> Dashboard
    <small>
        Create New Users
    </small>
</h1>
<div class="form-body">
    <form action="{{url('admin-panel/users/add')}}" method="post" enctype="multipart/form-data" class="form">
        <div id='form-results'> </div>
        {{csrf_field()}}
        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
            <label>Name</label>
            <input class="form-control spinner" type="text" placeholder="Press your Name" value="{{ old('name') }}" name="name">
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>


        <div class="form-group {{ $errors->has('permissions') ? ' has-error' : '' }}">
            <label>Permissions</label>
            <select class="form-control" name="permissions">
                <option value="0">user</option>
                <option value="1">admin</option>
            </select>
            @if ($errors->has('permissions'))
                <span class="help-block">
                    <strong>{{ $errors->first('permissions') }}</strong>
                </span>
            @endif
        </div>





        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
            <label>E-mail</label>
            <div class="input-group input-icon right">
                <span class="input-group-addon">
                    <i class="fa fa-envelope font-purple"></i>
                </span>
                <i class="fa fa-exclamation tooltips" data-original-title="Invalid email." data-container="body"></i>
                <input id="email" class="input-error form-control" type="text" value="{{ old('name') }}" name="email">
                @if ($errors->has('email'))
                    <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="exampleInputPassword1">Password</label>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-user font-red"></i>
                </span>
                <input type="password"  value="{{ old('password') }}" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                @if ($errors->has('password'))
                    <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label for="exampleInputPassword1">Confirm Password</label>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-user font-red"></i>
                </span>
                <input type="password" class="form-control" value="{{ old('password') }}" id="exampleInputPassword1" placeholder="Password" name="password_confirmation">
                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group {{ $errors->has('img') ? ' has-error' : '' }}">
            <label for="exampleInputFile1">Enter Your Image</label>
            <input type="file" id="exampleInputFile1" name="img">
            @if ($errors->has('img'))
                <span class="help-block">
                    <strong>{{ $errors->first('img') }}</strong>
                </span>
            @endif
        </div>


        <div class="form-actions">
            <button type="button" class="btn default">Cancel</button>
            <button type="submit" class="btn red" id="submit">Submit</button>
        </div>
    </form>


</div>


<script>

    $('#submit').on('click',function(e){
        btn =$(this);
        e.preventDefault();
        form = btn.parents('.form');
        url = form.attr('action');
        data = new FormData(form[0]);
        formResults = form.find('#form-results');
        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            dataType: 'json',
            beforeSend: function () {
                formResults.removeClass().addClass('alert alert-info').html('loading....');
            },
            error: function(data) {
                var input = data.responseText;
                input = input.split(',');

                input[0] = (input[0]).replace('{','');
                input[input.length-1] = (input[input.length-1]).replace('}','');

               for (var i=0;i<input.length;i++)
               {
                      formResults.removeClass().addClass('alert alert-danger').html(input[i]);

               }


            },
            success: function (data) {

                formResults.removeClass().addClass('alert alert-success').html('the user added sucessfully');
            },
            cache: false,
            processData: false,
            contentType: false,
        });

    });

</script>
