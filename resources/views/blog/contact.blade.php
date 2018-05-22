<div id="cnt_form">
    <div class="status alert alert-success" style="display: none"></div>
    <form id="contact-form" class="contact" name="contact-form" method="post" action="send-mail.php">
        <div class="form-group">
            <input type="text" name="name" class="form-control name-field" required="required" placeholder="Your Name"></div>
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