<h1 class="page-title"> Dashboard
    <small>
        Create New Plane
    </small>
</h1>
<div class="form-body">
    <form action="{{url('admin-panel/pricingplans/add')}}" method="post" enctype="multipart/form-data" class="form">
        <div id='form-results'> </div>
        {{csrf_field()}}

        <div class="form-group {{ $errors->has('type') ? ' has-error' : '' }}">
            <label>type</label>
            <input class="form-control spinner" type="text" placeholder="enter the type" value="{{ old('type') }}" name="type">
            @if ($errors->has('type'))
                <span class="help-block">
                    <strong>{{ $errors->first('type') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group {{ $errors->has('price') ? ' has-error' : '' }}">
            <label>price</label>
            <input class="form-control spinner" type="text" placeholder="enter the price" value="{{ old('price') }}" name="price">
            @if ($errors->has('price'))
                <span class="help-block">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('currency') ? ' has-error' : '' }}">
            <label>currency</label>
            <input class="form-control spinner" type="text" placeholder="enter the currency" value="{{ old('currency') }}" name="currency">
            @if ($errors->has('currency'))
                <span class="help-block">
                    <strong>{{ $errors->first('currency') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('time') ? ' has-error' : '' }}">
            <label>time</label>
            <input class="form-control spinner" type="text" placeholder="enter the time" value="{{ old('time') }}" name="time">
            @if ($errors->has('time'))
                <span class="help-block">
                    <strong>{{ $errors->first('time') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group {{ $errors->has('properties') ? ' has-error' : '' }}">
            <label>properties :  (seprate each property by ' , ')</label>
            <textarea class="form-control spinner"  placeholder="enter the properties" value="{{ old('properties') }}" name="properties"></textarea>
            @if ($errors->has('properties'))
                <span class="help-block">
                    <strong>{{ $errors->first('properties') }}</strong>
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

                formResults.removeClass().addClass('alert alert-success').html('the plan added sucessfully');
            },
            cache: false,
            processData: false,
            contentType: false,
        });

    });

</script>
