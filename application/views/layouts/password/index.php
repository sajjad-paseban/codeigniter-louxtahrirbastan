<div class="row"">
    <div class="col-xl-8 offset-xl-2 col-lg-2 offset-lg-5 col-md-4 offset-md-4 col-sm-6 offset-sm-3 col-10 offset-1" style="margin-top: 50px;">
        <div class="row">
            <div class="col">
            <?php if($this->session->flashdata('change_errors')): ?>
                <div class="alert alert-danger text-right" role="alert">
                    <?php echo $this->session->flashdata('change_errors'); ?>
                </div>
            <?php endif; ?>
            <?php if($this->session->flashdata('change_successful')): ?>
                <div class="alert alert-success text-right" role="alert">
                    <?php echo $this->session->flashdata('change_successful'); ?>
                </div>
            <?php endif; ?>
            <?php if($this->session->flashdata('change_fail')): ?>
                <div class="alert alert-danger text-right" role="alert">
                    <?php echo $this->session->flashdata('change_fail'); ?>
                </div>
            <?php endif; ?>
            
            </div>
        </div>
        <div class="row" style="background-color: #FF5733;border-radius: 25px 0px 25px 0px">
            <div class="col border-right">
                <p class="text-center pt-2 text-light" style="text-shadow: -1px 2px 5px black;"> تغییر گذرواژه</p>
            </div>
        </div>
        <div class="row border border-top-0 rounded-bottom py-3">
            <div class="col">
                <?php echo form_open('password/change',['name'=>'change_password']); ?>
                <div class="form-group">
                    <label class="float-right small" for="change_password_newPassword">گذرواژه جدید</label>
                    <input type="password" name="change_password_newPassword" class="form-control form-control-sm" id="change_password_newPassword">
                    <div id="validation0" class="text-right"></div>
                </div>
                <div class="form-group">
                    <label class="float-right small" for="change_password_RepeatnewPassword">تکرار گذرواژه جدید</label>
                    <input type="password" name="change_password_RepeatnewPassword" class="form-control form-control-sm" id="change_password_RepeatnewPassword">
                    <div id="validation1" class="text-right"></div>
                </div>
                <button type="submit" onclick="validation_change_password();" class="btn btn-info btn-block btn-sm">انجام عملیات</button>
                <?php echo form_close(); ?>
                <script type="text/javascript">
                    function validation_change_password(){
	                    document.forms['change_password'][2].setAttribute("type","button")
	                    var counter = 0;
	                    for (var i = 0;i<document.forms['change_password'].length-1;i++){
		                    if(document.forms['change_password'][i].value == ""){
		                    	document.forms['change_password'][i].classList.add("is-invalid");
                                document.forms['change_password'][i].title = ".فیلد خالی می باشد";
                                document.getElementById("validation"+i).innerText = ".فیلد خالی می باشد";
                                document.getElementById("validation"+i).classList.add("invalid-feedback");
		                    	counter++;
	                    	}else{
                                document.forms['change_password'][i].classList.remove("is-invalid");
                                document.forms['change_password'][i].title = "";
                            }
                        }
	                    if (counter == 0){
                            if(!(document.forms['change_password'][0].value.length >= 8)){
                                document.forms['change_password'][0].classList.add("is-invalid");
                                document.getElementById("validation"+0).innerText = ".گذرواژه می بایست شامل 8 کاراکتر باشد";
                                document.getElementById("validation"+0).classList.add("invalid-feedback");
                            }else{
                                if(document.forms['change_password'][1].value != document.forms['change_password'][0].value){
                                    document.forms['change_password'][1].classList.add("is-invalid");
                                    document.getElementById("validation"+1).innerText = ".فیلد تکرار گذرواژه جدید با فیلد گذرواژه جدید یکسان نمی باشد";
                                    document.getElementById("validation"+1).classList.add("invalid-feedback");
                                }else{
                                    document.forms['change_password'][2].setAttribute("type","submit");
                                }
                            }
                    	}
                    }
                </script>
            </div>
        </div>
    </div>
</div>