<?php defined('SYSPATH') or die('No direct script access.'); ?>

<!-- BEGIN: lightbox -->

<div id="form-content" class="modal hide fade in" style="display: none;">
    <div class="modal-header">
        <a class="close" data-dismiss="modal" style="color:#000;font-size:30px">×</a>
        <h3>Yêu cầu phim mà bạn thích</h3>
        <p>(Bạn có thể gửi yêu cầu thắc mắc ý kiến về phim)</p>
    </div>
    <div class="modal-body">
        <form class="contact" name="contact">
            <div class="control-groups">
                <label class="label" for="title">Tên phim</label>
                <input type="text" size="40" id="title" name="title" class="input-xlarge"><br />
            </div>

            <div class="control-groups">
                <label class="label" for="name">Tên bạn</label>
                <input type="text" size="40" id="name" name="name" class="input-xlarge"><br />
            </div>

            <div class="control-groups">
                <label class="label" for="email">E-mail</label>
                <input type="email" size="40" id="email" name="email" class="input-xlarge"><br />
            </div>

            <div class="control-groups">
                <label class="label" for="message">Nội dung yêu cầu</label>
                <textarea rows="3" cols="20" id="message" name="message" class="film-message input-xlarge"></textarea><br />
            </div>

            <div class="control-groups film-captcha">
                <label class="label" for="captcha">Mã xác nhận</label>
                <input type="text" class="temp" id="captcha" name="captcha"><img src="captcha/require?router/" class="captcha-image" alt="Catcha" />
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <input class="btn btn-success" type="submit" value="Gửi đi" id="submit">
        <a href="#" style="color:#333" class="btn btn-default" data-dismiss="modal">Hủy</a>
    </div>
</div>

<!-- END: lightbox -->