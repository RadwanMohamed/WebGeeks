<h1 class="page-title"> Dashboard
    <small>
        Create New Service
    </small>
</h1>
<div class="form-body">
    <form action="{{url('admin-panel/clients/add')}}" method="post" enctype="multipart/form-data" class="form">
        <div id='form-results'> </div>
        {{csrf_field()}}

        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
            <label>name</label>
            <input class="form-control spinner" type="text" placeholder="enter the name" value="{{ old('name') }}" name="name">
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>



        <div class="form-group {{ $errors->has('img') ? ' has-error' : '' }}">
            <label for="exampleInputFile1">Enter the Image</label>
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

                formResults.removeClass().addClass('alert alert-success').html('the client added sucessfully');
            },
            cache: false,
            processData: false,
            contentType: false,
        });

    });

</script>
