
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">update {{$article->name}}</h4>
            </div>

            <div class="modal-body">
                <form action="/admin-panel/articles/{{$article->id}}/update" method="POST" enctype="multipart/form-data" class="editplanform">
                    <div id='editformresults'> </div>
                    {{csrf_field()}}
                    {{method_field('PUT')}}

                    <div class="form-group" id="Title">
                        <label>Title</label>
                        <input class="form-control spinner" type="text" placeholder="enter the title" value="{{$article->title }}" name="title">
                            <span class="help-block">
                               <strong class="title"></strong>
                           </span>
                    </div>
                    <div class="form-group" id="AContent">
                        <label>Content</label>
                        <textarea class="form-control spinner" type="text"  name="content">{{$article->content }}</textarea>
                            <span class="help-block">
                    <strong class="acontent"></strong>
                </span>

                    </div>


                    <div class="form-group" id="Category">
                        <label>Category :- {{$article->categories->name }}</label>
                            <span class="help-block">
                                <select class="form-control" name="category_id">
                                    @foreach($cats as $cat)
                                              <option value="{{$cat->id}}">
                                                    {{$cat->name}}
                                              </option>
                                    @endforeach
                                </select>
                               <strong class="category"></strong>
                           </span>
                    </div>


                    <div class="form-group"id="Img">
                        <label for="exampleInputFile1">Enter Your Image</label>
                        @if($article->img !== '')
                            <img src="{{Request::root()}}/Website/img/articles/{{$article->img}}"  title="Client image" class="img-circle" style="width: 60px; height: 60px; float: right;" >
                        @endif
                        <input type="file" id="exampleInputFile1" name="img" value="{{$article->img}}">
                            <span class="help-block">
                                 <strong class="img"></strong>
                             </span>
                    </div>
                    
                    <input type="hidden" value="{{$article->id}}" name="id">


                    <div class="modal-footer">
                        <input type="hidden" value="{{$article->id}}" name="id">
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
                if (error.hasOwnProperty('title'))
                {
                    $.each(error['title'], function (i,m) {
                        $("#Title").removeClass().addClass('form-group  has-error');
                        $('.title').html(m);
                    });

                }
                else if (error.hasOwnProperty('content')) {
                    $.each(error['content'], function (i, m) {
                        $("#AContent").removeClass().addClass('form-group  has-error');
                        $('.acontent').html(m);
                    });
                }
                else if (error.hasOwnProperty('category')) {
                    $.each(error['category'], function (i, m) {
                        $("#Category").removeClass().addClass('form-group  has-error');
                        $('.category').html(m);
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