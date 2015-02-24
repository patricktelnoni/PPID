<!-- BAGIAN HEADER -->
    	<div class="wrap1">
		   <div class="headMain">
		    <div class="headTop">
			<div style="float:left;color:#999">
				&nbsp;&nbsp;<a href="index.php?g=pokokdoa" class="topLink">Pokok Doa</a>
				&nbsp;|&nbsp;&nbsp;<a href="index.php?g=links" class="topLink">Link</a>
				&nbsp;|&nbsp;&nbsp;<a href="index.php?g=sitemap" class="topLink">Peta Situs</a>
			</div>
			
				<div style="float:right;text-align:bottom;">
					<form name="frmLogin" method="post">
						<input type="hidden" value="<?=isset($_GET['g'])?$_GET['g']:''?>" name="goto"/>
						<input type="hidden" value="<?=isset($_GET['id'])?$_GET['id']:''?>" name="gotoId"/>
					<table style="padding-top:0px;">
						<tr style="font-size:12px">
							<td align="left">Email: <input type="text" size="18" name="txtUsername" class="textbox" title="gunakan email sebagai username Anda"/></td>				
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
 