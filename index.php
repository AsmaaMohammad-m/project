<?php 
$div1="";
$div2="";
$result="";

if ($_SERVER['REQUEST_METHOD']=='POST'){

    $text1=$_POST['text1'];
    $text2=$_POST['text2'];
  
 
   if( is_numeric( $text1)){ 
     
    
       if(gettype(strpos( $text1,".") )=="integer" ){
       
         $div1="This box only accepts
         integers";}

        else{
            $text1=(int)$text1; 
        }

           }
   else{
    $div1="This box only accepts
    integers";
   }
   if( is_numeric( $text2)){
    
     if(gettype(strpos( $text2,"."))=="integer")
      $text2=(float)$text2;

     else{
        $div2="This box only accepts
        decimal value";
     }

}
else{
    $div2="This box only accepts
    decimal value";
}



    if ((gettype($text1)=='integer')&& (gettype($text2)=='double')){
        $result=($text1**2)+($text2/3);
       }


}
?>


<!DOCTYPE>
<html>
    <head>
        <title>Asmaa website</title>
        <style>
            
            body{
                background:#333;
               
                font-family: cursive;
            }
            #h{
                color: #FFFF5C;
                margin-top:10%;
                margin-bottom:5%;
            }
            form{
                
                
                width:40%;
                
            }
            input {
                width: 100%;
                padding: 15px;
                margin: 5px 0 22px 0;
                display: inline-block;
                border: none;
                background: #f1f1f1;
                border-radius:7px;
                font-family: cursive;
                            }
            input[type=text]:focus {
                background-color: #ddd;
                outline: none;
                                }



            div{
               background-color:#FFC1CC;;
               color:white;
               margin-top:-4%;
               border-radius:5px;
               margin-bottom:2%;
               color:#333;
               
              
                
            }
            .pad{
                border:1px solid #F00;
                padding-top:5px; ;
                padding-bottom:20px;
            }
           #but {
                background-color: #00AEEF;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border-radius:7px;
                cursor: pointer;
                width: 100%;
                opacity: 0.9;
                }

            #but:hover {
                opacity:1;
                    }
            #result{
                width:40%;
                display:none;
                }
        </style>

    </head>
    <body>
        <center>
        <h2 id="h"></h2>
        <form action="<?php  echo $_SERVER['PHP_SELF']  ?>" method="POST">
        
            <input type="text" id="input1" name="text1" value="" placeholder="Please enter integer only"
             required onkeyup="intFun()">
            <div id="div1"><?php  echo $div1; ?></div>
            

            <input type="text" id="input2" name="text2" value="" placeholder="Please enter decimal only" 
            onkeyup="decFun()" required>
            <div id="div2"><?php  echo $div2; ?></div>
           
           <input type="submit" id="but"  name="" value="Calculate"> 
        </form>
        <input type=" text" id="result"  value="<?php echo $result;  ?>">
        </center>

        <script>
                
            var welcome="Welcome to our website";
            var index=1;

            function write(){
                document.getElementById("h").innerHTML=welcome.slice(0,index);
                index++;
                if(index>welcome.length)
                index=1;
            }
            setInterval(function(){
                write();
            },200)

            btn=document.getElementById("but");
            var inbut1= document.getElementById("input1");
            var inbut2= document.getElementById("input2");
            var div1= document.getElementById("div1");
                var div2= document.getElementById("div2");
               
          
                var result= document.getElementById("result");
         
                if(div1.innerHTML =="" && div2.innerHTML =="" ){
                
                   document.getElementById("result").style.display="inline";
                   
                   
                   }
                   else if (div1.innerHTML !="" && div2.innerHTML !=""){
                       div1.classList.add("pad");
                       div2.classList.add("pad");

                   }
                   else if (div1.innerHTML !="" ){
                    div1.classList.add("pad");
                   }
                   else if (div2.innerHTML !="" ){
                    div2.classList.add("pad");
                   }

                   var inval1="";
                   
                   function intFun() {
                          inval1=inbut1.value;
                            if(inval1.includes(".") || (isNaN(inval1))){
                                div1.innerHTML="This box only accepts integer";
                                div1.classList.add("pad");
                            }
                            else if(inval1==""){
                                div1.innerHTML="This field is required";
                                div1.classList.add("pad");
                            }
                            else{
                                div1.innerHTML="";
                                div1.classList.remove("pad");
                            }
                                }

                        var inval2="";
                 function decFun() {
                          inval2=inbut2.value;
                           if(inval2==""){
                                div2.innerHTML="This field is required";
                                div2.classList.add("pad");
                            }
                         else   if( ! inval2.includes(".")  || (isNaN(inval2))){
                                div2.innerHTML="This box only accepts decimal";
                                div2.classList.add("pad");
                            }
                           
                            else{
                                div2.innerHTML="";
                                div2.classList.remove("pad");
                            }
                                }
           

            
        </script>
    </body>
</html>