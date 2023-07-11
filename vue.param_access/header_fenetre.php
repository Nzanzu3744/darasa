<div class="modal fade" id="<?=$_GET['info']?>" role="dialog" style="width:100%; height:100% ; display:none" >
<?php
            (isset($_GET['wdt']))?$wdt=$_GET['wdt']:$wdt='80%';
?>
    <div class="modal-dialog" style="width:<?=$wdt?>">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" style="color:red; font-size:20px" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <?php
            (isset($_GET['hgt']))?$hgt=$_GET['hgt']:$hgt='400px';
            ?>
            <div class="modal-body table-responsive" style="width:100%; height:<?=$hgt?>" id="header_fenetre" name="header_fenetre">