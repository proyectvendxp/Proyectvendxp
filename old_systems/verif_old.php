<?php 
session_start();

	
	
	if(isset($_POST['Submit'])){

		$logins = array('123456' => '123456','Luis' => '');
		

		$Username = isset($_POST['Username']) ? $_POST['Username'] : '';
		$Password = isset($_POST['Password']) ? $_POST['Password'] : '';
		
	
		if (isset($logins[$Username]) && $logins[$Password] == $Password){

			$_SESSION['UserData']['Username']=$logins[$Username];
			header("location:./process_send");
			exit;
		} else {
			
			$msg="<span style='color:red'>No se pudo confirmar el codigo, Consulte con el gestor del sistema (Luis)</span>";
		}
	}
?>

    <!DOCTYPE html>



  <link rel="icon" type="image/png" href="https://cloud.luisweb.cf/cloud/favicon.png" />
<title>LuisCloud Login</title>
<style>
  body{
  padding:0;
  margin:0;
}
.vid-container{
  position:relative;
  height:100vh;
  overflow:hidden;
}
.bgvid{
  position:absolute;
  left:0;
  top:0;
  width:100vw;
}
.inner-container{
  width:400px;
  height:400px;
  position:absolute;
  top:calc(50vh - 200px);
  left:calc(50vw - 200px);
  overflow:hidden;
}
.bgvid.inner{
  top:calc(-50vh + 200px);
  left:calc(-50vw + 200px);
  filter: url("data:image/svg+xml;utf9,<svg%20version='1.1'%20xmlns='http://www.w3.org/2000/svg'><filter%20id='blur'><feGaussianBlur%20stdDeviation='10'%20/></filter></svg>#blur");
  -webkit-filter:blur(10px);
  -ms-filter: blur(10px);
  -o-filter: blur(10px);
  filter:blur(10px);
}
.box{
  position:absolute;
  height:100%;
  width:100%;
  font-family:Helvetica;
  color:#fff;
  background:rgba(0,0,0,0.13);
  padding:30px 0px;
}
.box h1{
  text-align:center;
  margin:30px 0;
  font-size:30px;
}
.box input{
  display:block;
  width:300px;
  margin:20px auto;
  padding:15px;
  background:rgba(0,0,0,0.2);
  color:#fff;
  border:0;
}
.box input:focus,.box input:active,.box button:focus,.box button:active{
  outline:none;
}
.box button{
  background:#2ecc71;
  border:0;
  color:#fff;
  padding:10px;
  font-size:20px;
  width:330px;
  margin:20px auto;
  display:block;
  cursor:pointer;
}
.box button:active{
  background:#27ae60;
}
.box p{
  font-size:14px;
  text-align:center;
}
.box p span{
  cursor:pointer;
  color:#666;
}
</style>
<form action="" method="post" name="Login_Form">
<div class="vid-container">
      <source src="https://cloud.luisweb.cf/cloud/bg55444.mp4" type="video/mp4">
  </video>
  <div class="inner-container">
    <video class="bgvid inner" autoplay="autoplay" muted="muted" preload="auto" loop>
      <source src="https://cloud.luisweb.cf/cloud/bg55444.mp4" type="video/mp4">
    </video>
    <div class="box">
      <h1>VERIFICACIÓN- LuisSec</h1>
      <h3>El cajero te acaba de dar un codigo, escribelo aqui</h3>
          <?php if(isset($msg)){?>
    <tr>
      <td colspan="2" align="center" valign="top"><?php echo $msg;?></td>
    </tr>
    <?php } ?>

      <input name="Username" class="Input" type="number" placeholder="Codigo"/>
      <td><button type="submit" name="Submit" >Verificar</button></td>
    </div>
  </div>
</div>

   



