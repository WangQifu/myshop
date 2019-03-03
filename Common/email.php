<?php
?>
<form action="" method="post">
    <p>收件人邮箱：<input type="text" name="toemail" id="mail"/></p>  
    <p>标  题：<input type="text" name="title" id="sub"/></p>  
    <p>内  容：<textarea name="content" cols="50" id="con" rows="5"></textarea></p>  
    <p><input type="button" value="发送" onclick="sendMail()"/></p>  
</form>  
<script>  
    function sendMail() {  
        mail=$('#mail').val();  
        sub=$('#sub').val();  
        con=$('#con').val();  
        $.post('index.php',{mail:mail,sub:sub,con:con},function (data) {  
            if (data=='Message has been sent.'){  
                alert('发送成功');  
            }else{  
                alert('发送失败');  
            }  
        });  
    }  
</script>  