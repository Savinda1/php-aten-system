

function tryLogin(){


    let un=$("#username").val();

    let pw=$("#password").val();

    if(un.trim()!=="" && pw.trim()!==""){
alert("can connect");
$.ajax({
    url:"ajaxhandler/loginAjax.php",
    type:"POST",
   dataType:"json",
   data:{user_name:un,password:pw,action:"verifyUser"},

   beforeSend:function (){
   // alert("about to make an ajax call");
  // if(rv["status"=="ALL OK"]){
   // document.location.replace("attendance.php");

  // }
 //  else{
//alert(rv["status"]);
 //  }
   },
   success:function (rv){
alert(JSON.stringify(rv));
   },
   error:function (){
alert("opps something went wrong");
   },
});

   
}}

      /* $.ajax({
            url:"ajaxhandler/loginAjax.php",
            type:"POST",
           dataType:"json",
           data:{user_name:un,password:pw,action:"verifyUser"},

          beforeSend: function () {
         // $("#diverror").removeClass("applyerrordiv");
//$("#errormessage").text("");
//$("#lockscreen").addClass("applylockscreen");
},
success:function(rv){

            //$("#lockscreen").removeClass("applylockscreen");

if(rv["status"]=="ALL OK")
{
document.location.replace("attendance.php");
}
else{
alert(rv["status"]);
//$("#diverror").addClass("applyerrordiv");
//$("#errormessage").text(rv['status']);
}
},

error:function(data){
alert("oops! Something went wrong");
},

});
    }
}
*/
//do everything only when the document is loaded
$(function(e){
    
$(document).on("keyup","input",function(e){
   let un=$("#username").val();
   let pw=$("#password").val();
   if(un.trim()!=="" && pw.trim()!==""){
$("#btn").removeClass("inactivecolor");
$("#btn").addClass("activecolor");
   }
else{
    $("#btn").removeClass("activecolor");
    $("#btn").addClass("inactivecolor");
}
});
$(document).on("click","#btn",function(e) {
    tryLogin();
});
});
