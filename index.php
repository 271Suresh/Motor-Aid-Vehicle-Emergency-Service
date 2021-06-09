
<html>
  <head>

    <title>Animation Text</title>
      <style>
          
body{
  background: #3da7e0;
}
.container{

  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  width: 100%;
}
.container span{
  text-transform: uppercase;
  display: block;
}
.text1{
  color: white;
  font-size: 60px;
  font-weight: 700;
  letter-spacing: 5px;
  margin-bottom: 20px;
  background: #3da7e0;
  position: relative;
  animation: text 3s 1;
}
.text2{
  font-size: 30px;
  color: darkpurple;
}

@keyframes text {
  0%{
    color: #e66363;
    margin-bottom: -40px;
  }
  30%{
color: #e66363;
    letter-spacing: 25px;
    margin-bottom: -40px;
  }
  85%{
color: black;
    letter-spacing: 8px;
    margin-bottom: -40px;
  }
}

      </style>
      <script>
        
          setTimeout('window.location="sp_cust.php";', 5000);
         
         


      </script>
  </head>
  <body>

<div class="container">
    <span class="text1"> Motor - Aid</span>
  <span class="text2">A Vehicle Emergency Service System </span>
</div>



  </body>
</html>
