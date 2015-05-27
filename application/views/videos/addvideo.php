<div class="container">
    <div class="row" style="margin-top:60px;">
     <div class="message">
 <?php if($this->session->flashdata('flashSuccess')):?>
 <div class="col-lg-8  alert alert-success" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
<?=$this->session->flashdata('flashSuccess')?> </p>
<?php endif?>
 
<?php if($this->session->flashdata('flashError')):?>
<div class="col-lg-8  alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
  <?=$this->session->flashdata('flashError')?>
</div>

<?php endif?>
 
<?php if($this->session->flashdata('flashInfo')):?>
<p class='flashMsg flashInfo'> <?=$this->session->flashdata('flashInfo')?> </p>
<?php endif?>
 
<?php if($this->session->flashdata('flashWarning')):?>
<p class='flashMsg flashWarning'> <?=$this->session->flashdata('flashWarning')?> </p>
<?php endif?>
</div>
        <form role="form" action="<?=base_url()?>index.php/admin/c_video/save" method="POST">
        
            <div class="col-lg-14">
        		<div class="col-lg-8 form-group">
        <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Harus diisi</strong></div>
                </div>
                <div class="col-lg-8 form-group">
                   <div class="col-md-3"> <label for="InputName">Judul</label></div>
                   
                    <div class="col-lg-8 input-group">
                        <input type="text" class="form-control" name="title" id="InputName" placeholder="Masukan nama" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                   
                </div>
                <div class="col-lg-8 form-group">
                   <div class="col-md-3"> <label for="InputName">Link</label></div>
                   
                    <div class="col-lg-8 input-group">
                        <input type="text" class="form-control" name="link" id="InputName" placeholder="Masukan Link video berupa url" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                   
                </div>
                
                  <div class="col-lg-8 form-group">
                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
                </div>
            </div>
        </form>
        
    </div>
</div>