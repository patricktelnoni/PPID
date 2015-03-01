<!-- BAGIAN HEADER -->
    	<div class="wrap1">
		   <div class="headMain">
		    <div class="headTop">
				
				<div style="float:right;text-align:bottom;">
				<?php if(!$this->session->userdata('logged_in')){?>
					<form name="frmLogin" method="post" action="./c_authentication/login">
						<input type="hidden" value="<?=isset($_GET['g'])?$_GET['g']:''?>" name="goto"/>
						<input type="hidden" value="<?=isset($_GET['id'])?$_GET['id']:''?>" name="gotoId"/>
					<table style="padding-top:0px;">
						<tr style="font-size:12px">
							<td align="left">Email: <input type="text" size="18" name="email" class="textbox" title="gunakan email sebagai username Anda"/></td>				
							<td align="left">Password: <input type="password" size="18" name="txtPassword" class="textbox"/></td>
							<td style="padding-top:10px" colspan="2" align="right"><input id="submit" type="submit"  value="Login" name="btnLogin" class="button"/>
							&nbsp;<input type="button" value="Sign Up" onClick="window.location='./c_registration'"name="btnSignup" class="button"/>
							</td>
							<td colspan="2" align="right">
								<a style="color:blue" href="index.php?g=send_password" >Lupa Password?</a>
							</td>
						</tr>
						
					</table>
					</form>
					<?php }?>
				</div>
			
			</div>
        	<div class="head">
			  <div class="headcenter">
                	<div class="logo"></div>
					<div style="float:right">
					
					</div>
           	  </div>
          	</div>
			</div>
  		</div>
        
        <div class="clearboth">
        </div>
 