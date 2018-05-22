<h1 class="page-title"> Dashboard
    <small>
        Create New setting

    </small>
</h1>
<div class="form-body">
    <form action="{{url('admin-panel/settings/add')}}" method="post" enctype="multipart/form-data" class="form">
        <div id='form-results'> </div>
        {{csrf_field()}}

        <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
            <label>name</label>
            <input class="form-control spinner" type="text" placeholder="enter the name" value="{{ old('name') }}" name="name">
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('desc') ? ' has-error' : '' }}">
            <label>Description</label>
            <textarea class="form-control spinner"  placeholder="enter the Description" value="{{ old('desc') }}" name="desc"></textarea>
            @if ($errors->has('desc'))
                <span class="help-block">
                    <strong>{{ $errors->first('desc') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('content') ? ' has-error' : '' }}">
            <label>Content</label>
            <textarea class="form-control spinner"  placeholder="enter the Content" value="{{ old('content') }}" name="content"></textarea>
            @if ($errors->has('content'))
                <span class="help-block">
                    <strong>{{ $errors->first('content') }}</strong>
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

                formResults.removeClass().addClass('alert alert-success').html('the setting added sucessfully');
            },
            cache: false,
            processData: false,
            contentType: false,
        });

    });

</script>
