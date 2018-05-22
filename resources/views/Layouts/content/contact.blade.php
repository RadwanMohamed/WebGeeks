<section id="ctn_sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
                <div class="title_sec">
                    <h1>{{$contact[0]->desc}}</h1>
                    <h2>{{$contact[0]->content}}</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <div id="cnt_form">
                    <form id="contact-form" class="contact" name="contact-form" method="post" action="{{url("/send")}}" novalidate>
                       {{csrf_field()}}
                        <div class="form-group">
                            <input type="text" name="name" class="form-control name-field" required="required" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control mail-field" required="required" placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Message"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="cnt_info">
                    <ul>
                        @foreach($contactinfo as $info)
                        <li><i class="{{$info->logo}}"></i><p>{{$info->content}}</p></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
