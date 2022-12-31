<?php 
$code=(new mysqli('localhost','root','','country code'))->query('select * from country')->fetch_all(1)
?>
<div class="container" style="padding: 2px;">
    <div class="bg-dark text-white p-2 ">
        <h3 class="h3 text-center">Author Registration Form</h3>
        <div class="text-center "> (<span class="text-danger">*</span>) Fields are Mandantory</div>
    </div>
    <form method="post" action="<?=ROOT;?>author/store">
        <div class="mb-3">
            <label for="username" class="form-label">User Name <span class="text-danger">*</span> : </label>
            <input type="text" name="username" class="form-control" onkeyup="this.value=this.value.toLowerCase() " onchange="user_exists(this.value,ur)" id="username" placeholder="Enter Username" pattern="[A-z0-9_@]{5,50}" title="You can Only enter alphanumeric value with _ and @" required>
            <span id="ur"></span>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">User Password <span class="text-danger">*</span> :</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required onchange="if(cpassword.value){
                if(this.value==cpassword.value ){
                ps.innerHTML='Matched';
                ps.className='text-success';

                }else{
                ps.innerHTML='Not-Matched';
                ps.className='text-danger';
                this.value='';
                  cpassword.value='';      
                }}">
        </div>

        <div class="mb-3">
            <label for="cpassword" class="form-label">Confirm Password <span class="text-danger">*</span> :</label>
            <input type="password" name="cpassword" class="form-control" id="cpassword" placeholder="Re-enter password" required onchange="if(this.value==password.value){
                ps.innerHTML='Matched';
                ps.className='text-success';

                }else{
                ps.innerHTML='Not-Matched';
                ps.className='text-danger';

                this.value='';
                  password.value='';      
                }">
            <span id="ps"></span>
        </div>
        <div class="mb-3">
            <label for="fullname" class="form-label">Display Name <span class="text-danger">*</span> : </label>
            <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Enter your full name for display" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email<span class="text-danger">*</span> : </label>
            <input type="text" name="email" class="form-control" id="email" placeholder="Enter your email">
        </div>
        <div class="mb-3">
            <label for="moible" class="form-label">Enter Mobile <span class="text-danger">*</span> : </label>
            <div class="form-control" style="display: flex;">
            <select name="phonecode" style="width:10%;padding:0px,3px,0px,3px;margin: 3px;">
            <?php foreach($code as $val){?>
            <option name="<?=$val['phonecode']?>" onchange="phonecode(this,phonecode)"><?=$val['iso3']; echo "&nbsp"; echo "("; echo $val['phonecode']; echo ")";?></option>
            <?php } ?>
            </select>
            
            <input type="text" name="mobile" id="mobile" style="border:0 ; outline:0; width:100%" placeholder="Enter Mobile" pattern="[0-9]{10}"  required></div>
        </div>
       
        <div class="mb-3">
            <label for="gender" class="form-label">Gender<span class="text-danger">*</span> : </label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" checked name="gender" id="male" value="male">
                <label class="form-check-label" for="inlineCheckbox1">Male</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="gender"id="female" value="female">
                <label class="form-check-label" for="inlineCheckbox2">female</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="others" name="gender" value="others" >
                <label class="form-check-label" for="inlineCheckbox3">others</label>
            </div>
            <div class="mb-3">
               <button class="form-control btn btn-success">Save</button>
            </div>
        </div>  
    </form>
</div>