<?php $query = $this->db->query("SELECT * FROM detailsal WHERE kode ='$kode' and nobatch = '$nobatch'");?>
<option type="search"></option>
<?php 
foreach($pallet as $p){ ?>
    <option value="<?= $p->kdpallet?>"><?php echo $p->kdpallet.' '. $p->status?></option>
<?php } ?>
