
<!DOCTYPE html>

<head>
<title>login page</title>

<style>

body
{

width: 100%;
height:100vh;
background:url(image/cover1.jfif);
            background-size: cover;          
            background-position: center;      
            background-repeat: no-repeat;     
            background-attachment: fixed;

display: flex;
justify-content: center;
align-items: center;

}
.loginformd:hover{
    box-shadow: 0 0 40px 0px rgb(121, 97, 239);
}

.loginformd
{
    width: min(400px,95%);
    height: 400px;
    background-color:rgba(62, 226, 241, 0.388);
    padding: 20px;
    border-radius: 10px;
    display: flex;
   flex-direction: column;
    justify-content: center;
    align-items: center;
  


}

.inputd{
position:relative;
width: 100%;
height: 10%;



}

.inputd input{
 position: absolute;
 width: 400px;
 height: 50px;
 background-color:rgba(62, 226, 241, 0.388);
 outline: none ;
 border-left: none;
 border-right: none;
 border-top: none;
 border-radius: 10px;
transition: all 200ms;
margin-top: 10px;
font-size: 16px;


 
}

.inputd label{

    position: absolute;
  color:blue;


  font-size: 20px;
  font-weight: bold;



}

.inputd input:hover + label,
.inputd input:focus + label
{

    transform:translateY(-10px);
   
    color:black;


}

.topmargin{
    margin-top: 40px;
}
.buttond{
   width: 100%;
   height: 10%;
   background-color: transparent;
   display:flex;
   justify-content:end;
   align-items: center;
   margin-top: 50px;
   


}

.btnlog:hover{
    box-shadow: 0 0 40px 0px rgb(121, 97, 239);
}

.btnlog{
    width:25%;
    height:100%;
    padding:5px;
    border-radius: 10px;
    background-color:rgb(50,168,247);
    color:black;
    
    font-size: 22px;

}
.log{

font-size: 58px;
    font-weight: bold;
    margin-top: -70px;}
.inactivecolor{
    background-color:rgba(62, 226, 241, 0.388);
}
.activecolor{
    background-color:rgb(50,168,247);
    
}

 .diverror{
    background-color:rgba(62, 226, 241, 0.388);
   color:yellow;
   height:20px;
    width:50%;
    display:flex;
    justify-content: center;
    align_items: center;
    margin-top: 50px;
    border-radius: 10px;
    visibility: hidden;
    opacity: 0;
    
 }
 .applyerrordiv{
    visibility:visible;
    opacity:1;
  
 }
 @keyframes falldown {
    0%{opacity: 0;}
    100%{opacity:1;}

 }

 .lockscreen{
    width:100%; 
    height:100%;
    background-color:white;
    position:fixed;
    visibility: hidden;
    opacity:0.3;
    display: flex;
    flex-direction:column;
    justify-content:center;
    align_items:center;
    

 }
 .lblwait{
    margin-top:20px;
    margin-left:650px;
 }
 .applylockscreen{
    opacity:.4;
    visibility:visible;
 }
 .spinner{
width:60px;
height:60px;
border-radius:50%;
border-top:solid 5px rgb(38,0,255);
border-right:solid 5px rgb(255,77,0);
border-bottom:solid 5px rgb(64,255,0);
border-left:solid 5px transparent;
margin-left:650px;
animation:spin 2s linear infinite;
 }

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

</style>

</head> 
<body>
<div class="loginformd">

<h1 class="log">sign in</h1>

      <div class="inputd">
<input type="text" id="username" >
    <label for="username" id="lblUsername">Username</label>
    </div>

    <div class="inputd topmargin">
<input type="password" id="password" >
    <label for="password">Password</label>
    </div>

    <div class="buttond">
<button class="btnlog inactivecolor"  id="btn">sign in</button>
    </div>

<div class="diverror" id="diverror">
<label class="errormessage" id="errormessage">ERROR GOES HERE</label>
</div>

</div>


<script src="js/jquery.js"></script>
<script src="js/login.js"></script>

</body>

</html>

