<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!-- BEGIN: editprofile -->
			<div class="block member-form" id="page-editprofile">
            	<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
                    <span class="item" typeof="v:Breadcrumb"><a href="{$url_base}" title="{$web_title}" property="v:title">Phim</a></span> 
                    <span class="item last-child" typeof="v:Breadcrumb">Sửa thông tin cá nhân</span>
                </div><!--/.breadcrumbs-->
                <div class="blockbody">
                	<c:if is="$messages">
                    <fieldset class="messages">
                        <ul>
                            <c:each from="$messages" value="$message">
                            <li>{$message}</li>
                            </c:each>
                        </ul>
                    </fieldset>
                    </c:if>
                    <c:if is="{$show.form}">
                    <form method="post" action="member/editprofile/">
                    	<fieldset>
                        	<legend>Tài khoản</legend>
                            <div class="control-groups">
                                <label>Tên đăng nhập</label>
                                <div class="control">
                                    <input type="text" disabled="disabled" class="disabled input" name="username" value="{$visitor.username}">
                                </div>
                            </div>
                            <div class="control-groups">
                                <label>Mật khẩu</label>
                                <div class="control">
                                    <input type="password" class="input password" name="password">
                                    <span class="help">Mật khẩu hiện tại</span>
                                </div>
                            </div>
                            <div class="control-groups">
                                <label>Mật khẩu mới</label>
                                <div class="control">
                                    <input type="password" class="input newpassword" name="newpassword" value="{$form_value.newpassword}">
                                    <span class="help">(Nếu muốn đổi)</span>
                                </div>
                            </div>
                            <div class="control-groups">
                                <label>Xác nhận mật khẩu mới</label>
                                <div class="control">
                                    <input type="password" class="input newpassword2" name="newpassword2">
                                    <span class="help">(Nếu muốn đổi)</span>
                                </div>
                            </div>
                            <div class="control-groups">
                                <label>Email</label>
                                <div class="control">
                                    <input type="text" class="input email" name="email" value="{$form_value.email}">
                                </div>
                        	</div>
                        </fieldset>
                        <fieldset>
                        	<legend>Thông tin cá nhân</legend>
                            <div class="control-groups">
                                <label>Họ tên</label>
                                <div class="control">
                                    <input type="text" class="input fullname" name="fullname" value="{$form_value.fullname}">
                                </div>
                            </div>
                            <div class="control-groups">
                                <label>Ngày sinh</label>
                                <div class="control">
                                    <input type="text" class="input span2 birthday day" name="birthday[day]" value="{$form_value.birthday_format.day}">
                                    /<input type="text" class="input span2 birthday month" name="birthday[month]" value="{$form_value.birthday_format.month}">
                                    /<input type="text" class="input span2 birthday year" name="birthday[year]" value="{$form_value.birthday_format.year}">
                                    <span class="help">Định dạng ngày/ tháng/ năm</span>
                                </div>
                            </div>
                            <div class="control-groups">
                                <label>Giới tính</label>
                                <div class="control">
                                	<input type="radio" class="sex na" name="sex" value="2"<c:if is="{$form_value.sex} == 2"> checked="checked"</c:if>> N/A
                                    <input type="radio" class="sex male" name="sex" value="1" <c:if is="{$form_value.sex} == 1"> checked="checked"</c:if>> Nam
                                    <input type="radio" class="sex female" name="sex" value="0" <c:if is="{$form_value.sex} == 0"> checked="checked"</c:if>> Nữ
                                </div>
                            </div>
                           
                        </fieldset>
                        <div class="control-groups submit">
                            <div class="control">
                                <input type="submit" class="btn" value="Submit">
                                <input type="reset" class="btn"  value="Reset">
                            </div>
                        </div>
                        </c:if>
           			</div>
             </div><!--/.block-->    
             <script type="text/javascript">
                 AppPack.Member.EditProfile.init();
             </script> 
<!-- END: editprofile -->