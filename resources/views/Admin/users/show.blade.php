<h1 class="page-title"> Dashboard
    <small>
        View All Users
    </small>
</h1>
<div id="results">

</div>
<!-- BEGIN SAMPLE TABLE PORTLET-->
<div class="portlet box green">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-cogs"></i>Responsive Flip Scroll Tables </div>
        <div class="tools">
            <a href="javascript:;" class="collapse"> </a>
            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
            <a href="javascript:;" class="reload"> </a>
            <a href="javascript:;" class="remove"> </a>
        </div>
    </div>
    <div class="portlet-body flip-scroll">
        <table class="table table-bordered table-striped table-condensed flip-content">

            <thead class="flip-content">
            <tr>
                <th width="20%"> # </th>
                <th> Permissions </th>
                <th class="numeric"> Name </th>
                <th class="numeric"> E-mail </th>
                <th class="numeric"> Created at </th>
                <th class="numeric"> Updated at </th>
                <th class="numeric"> Action </th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr>

                <td> {{$user->id}} </td>
                <td>
                    @if($user->admin==1)
                        {{"Admin"}}
                    @else
                        {{"user"}}
                    @endif

                </td>
                <td class="numeric"> {{$user->name}} </td>
                <td class="numeric">{{$user->email}}</td>
                <td class="numeric"> {{$user->created_at}} </td>
                <td class="numeric"> {{$user->updated_at}} </td>
                <td class="numeric">
                    <button type="button" class="btn green edituser"  data-toggle="modal" data-target="#basic" href="/admin-panel/users/{{$user->id}}/edit" >Edit</button>
                    <button  type="button" class="btn red delete" href="/admin-panel/users/{{$user->id}}/delete" >DEL</button>
                </td>
            </tr>
            @endforeach

            <tr>
                <th width="20%"> # </th>
                <th> Permissions </th>
                <th class="numeric"> Name </th>
                <th class="numeric"> E-mail </th>
                <th class="numeric"> Created at </th>
                <th class="numeric"> Updated at </th>
                <th class="numeric"> Action </th>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog" id="container">
        </div>
</div>
<script>
    $('.edituser').on('click',function(e){
        e.preventDefault();
        button = $(this);
        $.ajax({
            url :button.attr('href'),
            type: 'GET',
            success: function (data) {
                $('#container').html(data);
            },
            error : function(data){
                console.log(data.error);

            },

        })
    });
</script>

<script>
    $('.delete').on('click',function(e){
        e.preventDefault();
        button = $(this);
        var c = confirm('do you want to datelet ?');
        if (c === true) {
            $.ajax({
                url:button.attr('href'),
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function () {
                    $('#results').removeClass().addClass('alert alert-info').html('deleting....');

                },
                success: function (data) {
                    $('#results').removeClass().addClass('alert alert-success').html(data.msg);
                    tr=button.parents('tr');
                    tr.fadeOut(function(){
                        tr.remove();
                    });
                },

            })
        }
        });
</script>
<!-- END SAMPLE TABLE PORTLET-->


