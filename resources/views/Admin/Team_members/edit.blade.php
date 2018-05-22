
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Modal Title</h4>
            </div>

            <div class="modal-body">
                <form action="/admin-panel/team_members/{{$member->id}}/update" method="POST" enctype="multipart/form-data" class="editmemberform">
                    <div id='editformresults'> </div>
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <div class="form-group" id="Name">
                        <label>Name</label>
                        <input class="form-control spinner" type="text" placeholder="Press your Name" value="{{$member->name }}" name="name">
                            <span class="help-block">
                    <strong class="name"></strong>
                </span>

                    </div>

                    <div class="form-group" id="Job">
                        <label>Job</label>
                        <input class="form-control spinner" type="text"value="{{$member->job }}" name="job">
                            <span class="help-block">
                    <strong class="job"></strong>
                            </span>

                    </div>

                    <div class="form-group" id="Desc">
                        <label>Description</label>
                        <textarea class="form-control spinner" type="text"   name="Desc">{{$member->Desc }}</textarea>
                            <span class="help-block">
                                   <strong class="desc"></strong>
                            </span>

                    </div>







                    <div class="form-group"id="Img">
                        <label for="exampleInputFile1">Enter Your Image</label>
                        @if($member->img !== '')
                        <img src="{{Request::root()}}/Website/img/port/{{$member->img}}" title="{{$member->name}}" class="img-circle" style="width: 60px; height: 60px; float: right;" >
                        @endif
                        <input type="file" id="exampleInputFile1" name="img" value="{{$member->img}}">

                            <span class="help-block">
                    <strong class="img"></strong>
                </span>


                    </div>
                    <input type="hidden" value="{{$member->id}}" name="id">
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
        form = Button.parents('.editmemberform');
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
               else if (error.hasOwnProperty('job')) {
                   $.each(error['job'], function (i, m) {
                       $("#Job").removeClass().addClass('form-group  has-error');
                       $('.job').html(m);


                   });
               }
               else if (error.hasOwnProperty('Desc')) {
                   $.each(error['Desc'], function (i, m) {
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