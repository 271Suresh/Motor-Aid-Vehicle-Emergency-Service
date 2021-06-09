
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.container {
  position: relative;
  width: 50%;
}
.image {
margin-left:50%;
margin-top:30%;
height:auto;
width: 100%;
}


.overlay {
  margin-left:40%;
  margin-top:30%;
  margin-bottom:20%;
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 80%;
  width: 120%;
  opacity: 0;
  transition: .5s ease;
  background-color: #008CBA;
}

.container:hover .overlay {
  opacity: 1;
}

.text {
  color: white;
  font-size: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  text-align: center;
}
* {
  box-sizing: border-box;
}

.row {
  display: flex;
}

/* Create three equal columns that sits next to each other */
.column {
  flex: 33.33%;
  padding: 5px;
}
</style>
</head>
<body>

<div class="row">
  <div class="column">
<div class="container">
<a href="service_p/spsignlog.php">
  <img src="images/sp_.jpg" alt="Avatar" class="image">
  <div class="overlay">
    <div class="text">Login as Service provider</div>
  </div>
</div>
</a>
</div>
  <div class="column">
<div class="container">
<a href="signlog.php">
  <img src="images/cust_.jpg" alt="Avatar" class="image" >
  <div class="overlay">
    <div class="text">Login as Customer</div>
  </div>
  </a>
</div>
</div>
</div>

</body>
</html>