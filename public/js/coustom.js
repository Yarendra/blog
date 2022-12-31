var root= 'http://localhost/mvc3/';
function user_exists(name,obj){
    if(name.trim()){
        $.ajax({
            url:root+"author/checkeduser",
            type:"post",
            data:"name="+name,
            success:function(r){
                obj.innerHTML=r;
                if($('#na').length){
                    user=document.getElementById('username')
                    user.value= '';
                    $(user).focus();
                }
            }
        })
    }
}