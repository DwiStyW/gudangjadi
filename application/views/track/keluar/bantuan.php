<?php $batch = $this->db->query("SELECT * FROM detailsal WHERE kode = '$kode'");?>
<option type="search"></option>
                                                            <?php foreach($batch->result() as $b){?>
                                                                <option value="<?= $b->nobatch.'-'.$b->qty.'-'.$b->nopallet?>"> <?= $b->nobatch?></option>
                                                            <?php }?>
