<body>
    <div class="card shadow border-0 "
        style="z-index:10;position:relative;top:-250px;width:auto;margin-left:5%;margin-right:5%">
        <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block">
            <div class="main-sparkline8-hd justify-content-between"
                style="display:flex; flex:wrap;padding-top:20px;padding-bottom:20px;padding-left:20px;">
                <h1>Mapping</h1>
            </div>
        </div>

        <div style="background-color:#fff">
            <div class="sparkline8-graph shadow">
                <div style="overflow:auto">
                    <div style="width:3760px;">
                        <div style="display:flex;justify-content:end">
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak1=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-01') order by kdpallet desc");
								foreach ($rak1->result_array() as $r1){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r1['kdpallet']) ?>"><?= $r1['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak2=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-02') order by kdpallet desc");
								foreach ($rak2->result_array() as $r2){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r2['kdpallet']) ?>"><?= $r2['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak3=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-03') order by kdpallet desc");
								foreach ($rak3->result_array() as $r3){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r3['kdpallet']) ?>"><?= $r3['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak4=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-04') order by kdpallet desc");
								foreach ($rak4->result_array() as $r4){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r4['kdpallet']) ?>"><?= $r4['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak5=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-05') order by kdpallet desc");
								foreach ($rak5->result_array() as $r5){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r5['kdpallet']) ?>"><?= $r5['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak6=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-06') order by kdpallet desc");
								foreach ($rak6->result_array() as $r6){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r6['kdpallet']) ?>"><?= $r6['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak7=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-07') order by kdpallet desc");
								foreach ($rak7->result_array() as $r7){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r7['kdpallet']) ?>"><?= $r7['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak8=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-08') order by kdpallet desc");
								foreach ($rak8->result_array() as $r8){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r8['kdpallet']) ?>"><?= $r8['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak9=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-09') order by kdpallet desc");
								foreach ($rak9->result_array() as $r9){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r9['kdpallet']) ?>"><?= $r9['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak10=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-10') order by kdpallet desc");
								foreach ($rak10->result_array() as $r10){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r10['kdpallet']) ?>"><?= $r10['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak11=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-11') order by kdpallet desc");
								foreach ($rak11->result_array() as $r11){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r11['kdpallet']) ?>"><?= $r11['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak12=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-12') order by kdpallet desc");
								foreach ($rak12->result_array() as $r12){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r12['kdpallet']) ?>"><?= $r12['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak13=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-13') order by kdpallet desc");
								foreach ($rak13->result_array() as $r13){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r13['kdpallet']) ?>"><?= $r13['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak14=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-14') order by kdpallet desc");
								foreach ($rak14->result_array() as $r14){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r14['kdpallet']) ?>"><?= $r14['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak15=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-15') order by kdpallet desc");
								foreach ($rak15->result_array() as $r15){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r15['kdpallet']) ?>"><?= $r15['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak16=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-16') order by kdpallet desc");
								foreach ($rak16->result_array() as $r16){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r16['kdpallet']) ?>"><?= $r16['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak17=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-17') order by kdpallet desc");
								foreach ($rak17->result_array() as $r17){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r17['kdpallet']) ?>"><?= $r17['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak18=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-18') order by kdpallet desc");
								foreach ($rak18->result_array() as $r18){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r18['kdpallet']) ?>"><?= $r18['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak19=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-19') order by kdpallet desc");
								foreach ($rak19->result_array() as $r19){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r19['kdpallet']) ?>"><?= $r19['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak20=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-20') order by kdpallet desc");
								foreach ($rak20->result_array() as $r20){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r20['kdpallet']) ?>"><?= $r20['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak21=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-21') order by kdpallet desc");
								foreach ($rak21->result_array() as $r21){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r21['kdpallet']) ?>"><?= $r21['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak22=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-22') order by kdpallet desc");
								foreach ($rak22->result_array() as $r22){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r22['kdpallet']) ?>"><?= $r22['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak23=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-23') order by kdpallet desc");
								foreach ($rak23->result_array() as $r23){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r23['kdpallet']) ?>"><?= $r23['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak24=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-24') order by kdpallet desc");
								foreach ($rak24->result_array() as $r24){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r24['kdpallet']) ?>"><?= $r24['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak25=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-25') order by kdpallet desc");
								foreach ($rak25->result_array() as $r25){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r25['kdpallet']) ?>"><?= $r25['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak26=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-26') order by kdpallet desc");
								foreach ($rak26->result_array() as $r26){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r26['kdpallet']) ?>"><?= $r26['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak27=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-27') order by kdpallet desc");
								foreach ($rak27->result_array() as $r27){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r27['kdpallet']) ?>"><?= $r27['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak28=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-28') order by kdpallet desc");
								foreach ($rak28->result_array() as $r28){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r28['kdpallet']) ?>"><?= $r28['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak29=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-29') order by kdpallet desc");
								foreach ($rak29->result_array() as $r29){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r29['kdpallet']) ?>"><?= $r29['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak30=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-30') order by kdpallet desc");
								foreach ($rak30->result_array() as $r30){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r30['kdpallet']) ?>"><?= $r30['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak31=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-31') order by kdpallet desc");
								foreach ($rak31->result_array() as $r31){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r31['kdpallet']) ?>"><?= $r31['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak32=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-32') order by kdpallet desc");
								foreach ($rak32->result_array() as $r32){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r32['kdpallet']) ?>"><?= $r32['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak33=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-33') order by kdpallet desc");
								foreach ($rak33->result_array() as $r33){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r33['kdpallet']) ?>"><?= $r33['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak34=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-34') order by kdpallet desc");
								foreach ($rak34->result_array() as $r34){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r34['kdpallet']) ?>"><?= $r34['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak35=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-35') order by kdpallet desc");
								foreach ($rak35->result_array() as $r35){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r35['kdpallet']) ?>"><?= $r35['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak36=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-36') order by kdpallet desc");
								foreach ($rak36->result_array() as $r36){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r36['kdpallet']) ?>"><?= $r36['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak37=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-37') order by kdpallet desc");
								foreach ($rak37->result_array() as $r37){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r37['kdpallet']) ?>"><?= $r37['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak38=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-38') order by kdpallet desc");
								foreach ($rak38->result_array() as $r38){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r38['kdpallet']) ?>"><?= $r38['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak39=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-39') order by kdpallet desc");
								foreach ($rak39->result_array() as $r39){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r39['kdpallet']) ?>"><?= $r39['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak40=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-40') order by kdpallet desc");
								foreach ($rak40->result_array() as $r40){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r40['kdpallet']) ?>"><?= $r40['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak41=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-41') order by kdpallet desc");
								foreach ($rak41->result_array() as $r41){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r41['kdpallet']) ?>"><?= $r41['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak42=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-42') order by kdpallet desc");
								foreach ($rak42->result_array() as $r42){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r42['kdpallet']) ?>"><?= $r42['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak43=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-43') order by kdpallet desc");
								foreach ($rak43->result_array() as $r43){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r43['kdpallet']) ?>"><?= $r43['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak44=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-44') order by kdpallet desc");
								foreach ($rak44->result_array() as $r44){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r44['kdpallet']) ?>"><?= $r44['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak45=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-45') order by kdpallet desc");
								foreach ($rak45->result_array() as $r45){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r45['kdpallet']) ?>"><?= $r45['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak46=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-A%-46') order by kdpallet desc");
								foreach ($rak46->result_array() as $r46){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r46['kdpallet']) ?>"><?= $r46['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                        </div>
                        <div style="display:flex;justify-content:end">
                            <div
                                style="width:980px;height:80px;background-color:purple;color:white;display: flex;flex-wrap: wrap;align-items: center;justify-content:center;border:1px solid">
                                <h4>Area Overload Koyo</h4>
                            </div>
                        </div>
                        <div style="display:flex;justify-content:end">
                            <div style="width:3420px;height:20px;background-color:red;color:black;border:1px solid">
                            </div>
                        </div>
                        <div style="display:flex;justify-content:end">
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak1=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-B%-01') order by kdpallet desc");
								foreach ($rak1->result_array() as $r1){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r1['kdpallet']) ?>"><?= $r1['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak2=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-B%-02') order by kdpallet desc");
								foreach ($rak2->result_array() as $r2){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r2['kdpallet']) ?>"><?= $r2['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak3=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-B%-03') order by kdpallet desc");
								foreach ($rak3->result_array() as $r3){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r3['kdpallet']) ?>"><?= $r3['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak4=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-B%-04') order by kdpallet desc");
								foreach ($rak4->result_array() as $r4){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r4['kdpallet']) ?>"><?= $r4['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak5=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-B%-05') order by kdpallet desc");
								foreach ($rak5->result_array() as $r5){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r5['kdpallet']) ?>"><?= $r5['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak6=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-B%-06') order by kdpallet desc");
								foreach ($rak6->result_array() as $r6){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r6['kdpallet']) ?>"><?= $r6['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak7=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-B%-07') order by kdpallet desc");
								foreach ($rak7->result_array() as $r7){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r7['kdpallet']) ?>"><?= $r7['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak8=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-B%-08') order by kdpallet desc");
								foreach ($rak8->result_array() as $r8){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r8['kdpallet']) ?>"><?= $r8['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak9=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-B%-09') order by kdpallet desc");
								foreach ($rak9->result_array() as $r9){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r9['kdpallet']) ?>"><?= $r9['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak10=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-B%-10') order by kdpallet desc");
								foreach ($rak10->result_array() as $r10){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r10['kdpallet']) ?>"><?= $r10['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak11=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-B%-11') order by kdpallet desc");
								foreach ($rak11->result_array() as $r11){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r11['kdpallet']) ?>"><?= $r11['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak12=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-B%-12') order by kdpallet desc");
								foreach ($rak12->result_array() as $r12){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r12['kdpallet']) ?>"><?= $r12['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak13=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-B%-13') order by kdpallet desc");
								foreach ($rak13->result_array() as $r13){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r13['kdpallet']) ?>"><?= $r13['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak14=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-B%-14') order by kdpallet desc");
								foreach ($rak14->result_array() as $r14){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r14['kdpallet']) ?>"><?= $r14['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak15=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-B%-15') order by kdpallet desc");
								foreach ($rak15->result_array() as $r15){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r15['kdpallet']) ?>"><?= $r15['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak16=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-B%-16') order by kdpallet desc");
								foreach ($rak16->result_array() as $r16){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r16['kdpallet']) ?>"><?= $r16['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak17=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-B%-17') order by kdpallet desc");
								foreach ($rak17->result_array() as $r17){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r17['kdpallet']) ?>"><?= $r17['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak18=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-B%-18') order by kdpallet desc");
								foreach ($rak18->result_array() as $r18){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r18['kdpallet']) ?>"><?= $r18['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak19=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-B%-19') order by kdpallet desc");
								foreach ($rak19->result_array() as $r19){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r19['kdpallet']) ?>"><?= $r19['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak20=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-B%-20') order by kdpallet desc");
								foreach ($rak20->result_array() as $r20){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r20['kdpallet']) ?>"><?= $r20['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak21=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-B%-21') order by kdpallet desc");
								foreach ($rak21->result_array() as $r21){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r21['kdpallet']) ?>"><?= $r21['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak22=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-B%-22') order by kdpallet desc");
								foreach ($rak22->result_array() as $r22){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r22['kdpallet']) ?>"><?= $r22['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak23=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-B%-23') order by kdpallet desc");
								foreach ($rak23->result_array() as $r23){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r23['kdpallet']) ?>"><?= $r23['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak24=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-B%-24') order by kdpallet desc");
								foreach ($rak24->result_array() as $r24){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r24['kdpallet']) ?>"><?= $r24['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak25=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-B%-25') order by kdpallet desc");
								foreach ($rak25->result_array() as $r25){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r25['kdpallet']) ?>"><?= $r25['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak26=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-B%-26') order by kdpallet desc");
								foreach ($rak26->result_array() as $r26){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r26['kdpallet']) ?>"><?= $r26['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak27=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-B%-27') order by kdpallet desc");
								foreach ($rak27->result_array() as $r27){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r27['kdpallet']) ?>"><?= $r27['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak28=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-B%-28') order by kdpallet desc");
								foreach ($rak28->result_array() as $r28){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r28['kdpallet']) ?>"><?= $r28['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak29=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-B%-29') order by kdpallet desc");
								foreach ($rak29->result_array() as $r29){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r29['kdpallet']) ?>"><?= $r29['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak30=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-B%-30') order by kdpallet desc");
								foreach ($rak30->result_array() as $r30){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r30['kdpallet']) ?>"><?= $r30['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak31=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-B%-31') order by kdpallet desc");
								foreach ($rak31->result_array() as $r31){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r31['kdpallet']) ?>"><?= $r31['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak32=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-B%-32') order by kdpallet desc");
								foreach ($rak32->result_array() as $r32){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r32['kdpallet']) ?>"><?= $r32['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak33=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-B%-33') order by kdpallet desc");
								foreach ($rak33->result_array() as $r33){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r33['kdpallet']) ?>"><?= $r33['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak34=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-B%-34') order by kdpallet desc");
								foreach ($rak34->result_array() as $r34){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r34['kdpallet']) ?>"><?= $r34['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak35=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-B%-35') order by kdpallet desc");
								foreach ($rak35->result_array() as $r35){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r35['kdpallet']) ?>"><?= $r35['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak36=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-B%-36') order by kdpallet desc");
								foreach ($rak36->result_array() as $r36){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r36['kdpallet']) ?>"><?= $r36['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak37=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-B%-37') order by kdpallet desc");
								foreach ($rak37->result_array() as $r37){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r37['kdpallet']) ?>"><?= $r37['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak38=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-B%-38') order by kdpallet desc");
								foreach ($rak38->result_array() as $r38){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r38['kdpallet']) ?>"><?= $r38['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak39=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-B%-39') order by kdpallet desc");
								foreach ($rak39->result_array() as $r39){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r39['kdpallet']) ?>"><?= $r39['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak40=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-B%-40') order by kdpallet desc");
								foreach ($rak40->result_array() as $r40){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r40['kdpallet']) ?>"><?= $r40['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak41=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-B%-41') order by kdpallet desc");
								foreach ($rak41->result_array() as $r41){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r41['kdpallet']) ?>"><?= $r41['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak42=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-B%-42') order by kdpallet desc");
								foreach ($rak42->result_array() as $r42){?>
                                    <div style="border:1px solid;padding:3px;background-color:#d9b432;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r42['kdpallet']) ?>"><?= $r42['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                        </div>
                        <div style="display:flex;justify-content:end">
                            <div style="display:flex;border-right:3px solid;border-top:3px solid;">
                                <div>
                                    <?php 
								$rak1=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-C%-01') order by kdpallet desc");
								foreach ($rak1->result_array() as $r1){?>
                                    <div
                                        style="border:1px solid;padding:3px;<?php if ($r1['kdpallet']=='J02-C0-01'){?>background-color:aqua;<?php }else{?>background-color:#d9b432;<?php }?>width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r1['kdpallet']) ?>"><?= $r1['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak2=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-C%-02') order by kdpallet desc");
								foreach ($rak2->result_array() as $r2){?>
                                    <div
                                        style="border:1px solid;padding:3px;<?php if ($r2['kdpallet']=='J02-C0-02'){?>background-color:aqua;<?php }else{?>background-color:#d9b432;<?php }?>width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r2['kdpallet']) ?>"><?= $r2['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid;border-top:3px solid">
                                <div>
                                    <?php 
								$rak3=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-C%-03') order by kdpallet desc");
								foreach ($rak3->result_array() as $r3){?>
                                    <div
                                        style="border:1px solid;padding:3px;<?php if ($r3['kdpallet']=='J02-C0-03'){?>background-color:aqua;<?php }else{?>background-color:#d9b432;<?php }?>width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r3['kdpallet']) ?>"><?= $r3['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak4=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-C%-04') order by kdpallet desc");
								foreach ($rak4->result_array() as $r4){?>
                                    <div
                                        style="border:1px solid;padding:3px;<?php if ($r4['kdpallet']=='J02-C0-04'){?>background-color:aqua;<?php }else{?>background-color:#d9b432;<?php }?>width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r4['kdpallet']) ?>"><?= $r4['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid;border-top:3px solid">
                                <div>
                                    <?php 
								$rak5=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-C%-05') order by kdpallet desc");
								foreach ($rak5->result_array() as $r5){?>
                                    <div
                                        style="border:1px solid;padding:3px;<?php if ($r5['kdpallet']=='J02-C0-05'){?>background-color:aqua;<?php }else{?>background-color:#d9b432;<?php }?>width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r5['kdpallet']) ?>"><?= $r5['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak6=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-C%-06') order by kdpallet desc");
								foreach ($rak6->result_array() as $r6){?>
                                    <div
                                        style="border:1px solid;padding:3px;<?php if ($r6['kdpallet']=='J02-C0-06'){?>background-color:aqua;<?php }else{?>background-color:#d9b432;<?php }?>width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r6['kdpallet']) ?>"><?= $r6['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid;border-top:3px solid">
                                <div>
                                    <?php 
								$rak7=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-C%-07') order by kdpallet desc");
								foreach ($rak7->result_array() as $r7){?>
                                    <div
                                        style="border:1px solid;padding:3px;<?php if ($r7['kdpallet']=='J02-C0-07'){?>background-color:aqua;<?php }else{?>background-color:#d9b432;<?php }?>width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r7['kdpallet']) ?>"><?= $r7['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak8=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-C%-08') order by kdpallet desc");
								foreach ($rak8->result_array() as $r8){?>
                                    <div
                                        style="border:1px solid;padding:3px;<?php if ($r8['kdpallet']=='J02-C0-08'){?>background-color:aqua;<?php }else{?>background-color:#d9b432;<?php }?>width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r8['kdpallet']) ?>"><?= $r8['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid;border-top:3px solid">
                                <div>
                                    <?php 
								$rak9=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-C%-09') order by kdpallet desc");
								foreach ($rak9->result_array() as $r9){?>
                                    <div
                                        style="border:1px solid;padding:3px;<?php if ($r9['kdpallet']=='J02-C0-09'){?>background-color:aqua;<?php }else{?>background-color:#d9b432;<?php }?>width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r9['kdpallet']) ?>"><?= $r9['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak10=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-C%-10') order by kdpallet desc");
								foreach ($rak10->result_array() as $r10){?>
                                    <div
                                        style="border:1px solid;padding:3px;<?php if ($r10['kdpallet']=='J02-C0-10'){?>background-color:aqua;<?php }else{?>background-color:#d9b432;<?php }?>width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r10['kdpallet']) ?>"><?= $r10['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak11=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-C%-11') order by kdpallet desc");
								foreach ($rak11->result_array() as $r11){?>
                                    <div
                                        style="border:1px solid;padding:3px;<?php if ($r11['kdpallet']=='J02-C0-11'){?>background-color:aqua;<?php }else{?>background-color:#d9b432;<?php }?>width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r11['kdpallet']) ?>"><?= $r11['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid;border-top:3px solid">
                                <div>
                                    <?php 
								$rak12=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-C%-12') order by kdpallet desc");
								foreach ($rak12->result_array() as $r12){?>
                                    <div
                                        style="border:1px solid;padding:3px;<?php if ($r12['kdpallet']=='J02-C0-12'){?>background-color:aqua;<?php }else{?>background-color:#d9b432;<?php }?>width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r12['kdpallet']) ?>"><?= $r12['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak13=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-C%-13') order by kdpallet desc");
								foreach ($rak13->result_array() as $r13){?>
                                    <div
                                        style="border:1px solid;padding:3px;<?php if ($r13['kdpallet']=='J02-C0-13'){?>background-color:aqua;<?php }else{?>background-color:#d9b432;<?php }?>width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r13['kdpallet']) ?>"><?= $r13['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid;border-top:3px solid">
                                <div>
                                    <?php 
								$rak14=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-C%-14') order by kdpallet desc");
								foreach ($rak14->result_array() as $r14){?>
                                    <div
                                        style="border:1px solid;padding:3px;<?php if ($r14['kdpallet']=='J02-C0-14'){?>background-color:aqua;<?php }else{?>background-color:#d9b432;<?php }?>width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r14['kdpallet']) ?>"><?= $r14['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak15=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-C%-15') order by kdpallet desc");
								foreach ($rak15->result_array() as $r15){?>
                                    <div
                                        style="border:1px solid;padding:3px;<?php if ($r15['kdpallet']=='J02-C0-15'){?>background-color:aqua;<?php }else{?>background-color:#d9b432;<?php }?>width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r15['kdpallet']) ?>"><?= $r15['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid;border-top:3px solid">
                                <div>
                                    <?php 
								$rak16=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-C%-16') order by kdpallet desc");
								foreach ($rak16->result_array() as $r16){?>
                                    <div
                                        style="border:1px solid;padding:3px;<?php if ($r16['kdpallet']=='J02-C0-16'){?>background-color:aqua;<?php }else{?>background-color:#d9b432;<?php }?>width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r16['kdpallet']) ?>"><?= $r16['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak17=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-C%-17') order by kdpallet desc");
								foreach ($rak17->result_array() as $r17){?>
                                    <div
                                        style="border:1px solid;padding:3px;<?php if ($r17['kdpallet']=='J02-C0-17'){?>background-color:aqua;<?php }else{?>background-color:#d9b432;<?php }?>width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r17['kdpallet']) ?>"><?= $r17['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid;border-top:3px solid">
                                <div>
                                    <?php 
								$rak18=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-C%-18') order by kdpallet desc");
								foreach ($rak18->result_array() as $r18){?>
                                    <div
                                        style="border:1px solid;padding:3px;<?php if ($r18['kdpallet']=='J02-C0-18'){?>background-color:aqua;<?php }else{?>background-color:#d9b432;<?php }?>width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r18['kdpallet']) ?>"><?= $r18['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak19=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-C%-19') order by kdpallet desc");
								foreach ($rak19->result_array() as $r19){?>
                                    <div
                                        style="border:1px solid;padding:3px;<?php if ($r19['kdpallet']=='J02-C0-19'){?>background-color:aqua;<?php }else{?>background-color:#d9b432;<?php }?>width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r19['kdpallet']) ?>"><?= $r19['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid;border-top:3px solid">
                                <div>
                                    <?php 
								$rak20=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-C%-20') order by kdpallet desc");
								foreach ($rak20->result_array() as $r20){?>
                                    <div
                                        style="border:1px solid;padding:3px;<?php if ($r20['kdpallet']=='J02-C0-20'){?>background-color:aqua;<?php }else{?>background-color:#d9b432;<?php }?>width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r20['kdpallet']) ?>"><?= $r20['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak21=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-C%-21') order by kdpallet desc");
								foreach ($rak21->result_array() as $r21){?>
                                    <div
                                        style="border:1px solid;padding:3px;<?php if ($r21['kdpallet']=='J02-C0-21'){?>background-color:aqua;<?php }else{?>background-color:#d9b432;<?php }?>width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r21['kdpallet']) ?>"><?= $r21['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid;border-top:3px solid">
                                <div>
                                    <?php 
								$rak22=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-C%-22') order by kdpallet desc");
								foreach ($rak22->result_array() as $r22){?>
                                    <div
                                        style="border:1px solid;padding:3px;<?php if ($r22['kdpallet']=='J02-C0-22'){?>background-color:aqua;<?php }else{?>background-color:#d9b432;<?php }?>width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r22['kdpallet']) ?>"><?= $r22['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak23=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-C%-23') order by kdpallet desc");
								foreach ($rak23->result_array() as $r23){?>
                                    <div
                                        style="border:1px solid;padding:3px;<?php if ($r23['kdpallet']=='J02-C0-23'){?>background-color:aqua;<?php }else{?>background-color:#d9b432;<?php }?>width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r23['kdpallet']) ?>"><?= $r23['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid;border-top:3px solid">
                                <div>
                                    <?php 
								$rak24=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-C%-24') order by kdpallet desc");
								foreach ($rak24->result_array() as $r24){?>
                                    <div
                                        style="border:1px solid;padding:3px;<?php if ($r24['kdpallet']=='J02-C0-24'){?>background-color:aqua;<?php }else{?>background-color:#d9b432;<?php }?>width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r24['kdpallet']) ?>"><?= $r24['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak25=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-C%-25') order by kdpallet desc");
								foreach ($rak25->result_array() as $r25){?>
                                    <div
                                        style="border:1px solid;padding:3px;<?php if ($r25['kdpallet']=='J02-C0-25'){?>background-color:aqua;<?php }else{?>background-color:#d9b432;<?php }?>width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r25['kdpallet']) ?>"><?= $r25['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid;border-top:3px solid">
                                <div>
                                    <?php 
								$rak26=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-C%-26') order by kdpallet desc");
								foreach ($rak26->result_array() as $r26){?>
                                    <div
                                        style="border:1px solid;padding:3px;<?php if ($r26['kdpallet']=='J02-C0-26'){?>background-color:aqua;<?php }else{?>background-color:#d9b432;<?php }?>width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r26['kdpallet']) ?>"><?= $r26['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak27=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-C%-27') order by kdpallet desc");
								foreach ($rak27->result_array() as $r27){?>
                                    <div
                                        style="border:1px solid;padding:3px;<?php if ($r27['kdpallet']=='J02-C0-27'){?>background-color:aqua;<?php }else{?>background-color:#d9b432;<?php }?>width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r27['kdpallet']) ?>"><?= $r27['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid;border-top:3px solid">
                                <div>
                                    <?php 
								$rak28=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-C%-28') order by kdpallet desc");
								foreach ($rak28->result_array() as $r28){?>
                                    <div
                                        style="border:1px solid;padding:3px;<?php if ($r28['kdpallet']=='J02-C0-28'){?>background-color:aqua;<?php }else{?>background-color:#d9b432;<?php }?>width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r28['kdpallet']) ?>"><?= $r28['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak29=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-C%-29') order by kdpallet desc");
								foreach ($rak29->result_array() as $r29){?>
                                    <div
                                        style="border:1px solid;padding:3px;<?php if ($r29['kdpallet']=='J02-C0-29'){?>background-color:aqua;<?php }else{?>background-color:#d9b432;<?php }?>width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r29['kdpallet']) ?>"><?= $r29['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak30=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-C%-30') order by kdpallet desc");
								foreach ($rak30->result_array() as $r30){?>
                                    <div
                                        style="border:1px solid;padding:3px;<?php if ($r30['kdpallet']=='J02-C0-30'){?>background-color:aqua;<?php }else{?>background-color:#d9b432;<?php }?>width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r30['kdpallet']) ?>"><?= $r30['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid;border-top:3px solid">
                                <div>
                                    <?php 
								$rak31=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-C%-31') order by kdpallet desc");
								foreach ($rak31->result_array() as $r31){?>
                                    <div
                                        style="border:1px solid;padding:3px;<?php if ($r31['kdpallet']=='J02-C0-31'){?>background-color:aqua;<?php }else{?>background-color:#d9b432;<?php }?>width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r31['kdpallet']) ?>"><?= $r31['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak32=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-C%-32') order by kdpallet desc");
								foreach ($rak32->result_array() as $r32){?>
                                    <div
                                        style="border:1px solid;padding:3px;<?php if ($r32['kdpallet']=='J02-C0-32'){?>background-color:aqua;<?php }else{?>background-color:#d9b432;<?php }?>width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r32['kdpallet']) ?>"><?= $r32['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid;border-top:3px solid">
                                <div>
                                    <?php 
								$rak33=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-C%-33') order by kdpallet desc");
								foreach ($rak33->result_array() as $r33){?>
                                    <div
                                        style="border:1px solid;padding:3px;<?php if ($r33['kdpallet']=='J02-C0-33'){?>background-color:aqua;<?php }else{?>background-color:#d9b432;<?php }?>width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r33['kdpallet']) ?>"><?= $r33['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak34=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-C%-34') order by kdpallet desc");
								foreach ($rak34->result_array() as $r34){?>
                                    <div
                                        style="border:1px solid;padding:3px;<?php if ($r34['kdpallet']=='J02-C0-34'){?>background-color:aqua;<?php }else{?>background-color:#d9b432;<?php }?>width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r34['kdpallet']) ?>"><?= $r34['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid;border-top:3px solid">
                                <div>
                                    <?php 
								$rak35=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-C%-35') order by kdpallet desc");
								foreach ($rak35->result_array() as $r35){?>
                                    <div
                                        style="border:1px solid;padding:3px;<?php if ($r35['kdpallet']=='J02-C0-35'){?>background-color:aqua;<?php }else{?>background-color:#d9b432;<?php }?>width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r35['kdpallet']) ?>"><?= $r35['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak36=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-C%-36') order by kdpallet desc");
								foreach ($rak36->result_array() as $r36){?>
                                    <div
                                        style="border:1px solid;padding:3px;<?php if ($r36['kdpallet']=='J02-C0-36'){?>background-color:aqua;<?php }else{?>background-color:#d9b432;<?php }?>width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r36['kdpallet']) ?>"><?= $r36['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid;border-top:3px solid">
                                <div>
                                    <?php 
								$rak37=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-C%-37') order by kdpallet desc");
								foreach ($rak37->result_array() as $r37){?>
                                    <div
                                        style="border:1px solid;padding:3px;<?php if ($r37['kdpallet']=='J02-C0-37'){?>background-color:aqua;<?php }else{?>background-color:#d9b432;<?php }?>width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r37['kdpallet']) ?>"><?= $r37['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak38=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-C%-38') order by kdpallet desc");
								foreach ($rak38->result_array() as $r38){?>
                                    <div
                                        style="border:1px solid;padding:3px;<?php if ($r38['kdpallet']=='J02-C0-38'){?>background-color:aqua;<?php }else{?>background-color:#d9b432;<?php }?>width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r38['kdpallet']) ?>"><?= $r38['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid;border-top:3px solid">
                                <div>
                                    <?php 
								$rak39=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-C%-39') order by kdpallet desc");
								foreach ($rak39->result_array() as $r39){?>
                                    <div
                                        style="border:1px solid;padding:3px;<?php if ($r39['kdpallet']=='J02-C0-39'){?>background-color:aqua;<?php }else{?>background-color:#d9b432;<?php }?>width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r39['kdpallet']) ?>"><?= $r39['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak40=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-C%-40') order by kdpallet desc");
								foreach ($rak40->result_array() as $r40){?>
                                    <div
                                        style="border:1px solid;padding:3px;<?php if ($r40['kdpallet']=='J02-C0-40'){?>background-color:aqua;<?php }else{?>background-color:#d9b432;<?php }?>width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r40['kdpallet']) ?>"><?= $r40['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid;border-top:3px solid">
                                <div>
                                    <?php 
								$rak41=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-C%-41') order by kdpallet desc");
								foreach ($rak41->result_array() as $r41){?>
                                    <div
                                        style="border:1px solid;padding:3px;<?php if ($r41['kdpallet']=='J02-C0-41'){?>background-color:aqua;<?php }else{?>background-color:#d9b432;<?php }?>width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r41['kdpallet']) ?>"><?= $r41['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak42=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-C%-42') order by kdpallet desc");
								foreach ($rak42->result_array() as $r42){?>
                                    <div
                                        style="border:1px solid;padding:3px;<?php if ($r42['kdpallet']=='J02-C0-42'){?>background-color:aqua;<?php }else{?>background-color:#d9b432;<?php }?>;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r42['kdpallet']) ?>"><?= $r42['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                        </div>
                        <div style="display:flex;justify-content:end">
                            <div
                                style="width:650px;height:80px;background-color:grey;color:white;display: flex;flex-wrap: wrap;align-items: center;justify-content:center;border:1px solid">
                                <h4>Area Tunggu Pengiriman</h4>
                            </div>
                            <div
                                style="width:240px;height:30px;display: flex;flex-wrap: wrap;align-items: center;justify-content:center;border-top:1px solid black">

                            </div>
                            <div
                                style="width:330px;height:30px;background-color:grey;color:white;display: flex;flex-wrap: wrap;align-items: center;justify-content:center;border:1px solid">

                            </div>
                            <div
                                style="width:1220px;height:80px;color:white;display: flex;flex-wrap: wrap;align-items: center;justify-content:center;border:1px solid">

                            </div>
                            <div
                                style="width:980px;height:80px;background-color:purple;color:white;display: flex;flex-wrap: wrap;align-items: center;justify-content:center;border:1px solid">
                                <h4>Area Overload Koyo <br><br> Area Overload Alkes</h4>
                            </div>
                        </div>
                        <div style="display:flex;justify-content:end">
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak1=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-D%-01') order by kdpallet desc");
								foreach ($rak1->result_array() as $r1){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r1['kdpallet']) ?>"><?= $r1['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak2=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-D%-02') order by kdpallet desc");
								foreach ($rak2->result_array() as $r2){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r2['kdpallet']) ?>"><?= $r2['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak3=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-D%-03') order by kdpallet desc");
								foreach ($rak3->result_array() as $r3){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r3['kdpallet']) ?>"><?= $r3['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak4=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-D%-04') order by kdpallet desc");
								foreach ($rak4->result_array() as $r4){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r4['kdpallet']) ?>"><?= $r4['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak5=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-D%-05') order by kdpallet desc");
								foreach ($rak5->result_array() as $r5){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r5['kdpallet']) ?>"><?= $r5['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak6=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-D%-06') order by kdpallet desc");
								foreach ($rak6->result_array() as $r6){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r6['kdpallet']) ?>"><?= $r6['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak7=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-D%-07') order by kdpallet desc");
								foreach ($rak7->result_array() as $r7){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r7['kdpallet']) ?>"><?= $r7['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak8=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-D%-08') order by kdpallet desc");
								foreach ($rak8->result_array() as $r8){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r8['kdpallet']) ?>"><?= $r8['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak9=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-D%-09') order by kdpallet desc");
								foreach ($rak9->result_array() as $r9){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r9['kdpallet']) ?>"><?= $r9['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak10=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-D%-10') order by kdpallet desc");
								foreach ($rak10->result_array() as $r10){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r10['kdpallet']) ?>"><?= $r10['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak11=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-D%-11') order by kdpallet desc");
								foreach ($rak11->result_array() as $r11){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r11['kdpallet']) ?>"><?= $r11['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak12=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-D%-12') order by kdpallet desc");
								foreach ($rak12->result_array() as $r12){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r12['kdpallet']) ?>"><?= $r12['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak13=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-D%-13') order by kdpallet desc");
								foreach ($rak13->result_array() as $r13){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r13['kdpallet']) ?>"><?= $r13['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak14=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-D%-14') order by kdpallet desc");
								foreach ($rak14->result_array() as $r14){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r14['kdpallet']) ?>"><?= $r14['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak15=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-D%-15') order by kdpallet desc");
								foreach ($rak15->result_array() as $r15){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r15['kdpallet']) ?>"><?= $r15['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak16=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-D%-16') order by kdpallet desc");
								foreach ($rak16->result_array() as $r16){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r16['kdpallet']) ?>"><?= $r16['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak17=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-D%-17') order by kdpallet desc");
								foreach ($rak17->result_array() as $r17){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r17['kdpallet']) ?>"><?= $r17['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak18=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-D%-18') order by kdpallet desc");
								foreach ($rak18->result_array() as $r18){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r18['kdpallet']) ?>"><?= $r18['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak19=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-D%-19') order by kdpallet desc");
								foreach ($rak19->result_array() as $r19){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r19['kdpallet']) ?>"><?= $r19['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak20=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-D%-20') order by kdpallet desc");
								foreach ($rak20->result_array() as $r20){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r20['kdpallet']) ?>"><?= $r20['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak21=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-D%-21') order by kdpallet desc");
								foreach ($rak21->result_array() as $r21){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r21['kdpallet']) ?>"><?= $r21['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak22=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-D%-22') order by kdpallet desc");
								foreach ($rak22->result_array() as $r22){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r22['kdpallet']) ?>"><?= $r22['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak23=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-D%-23') order by kdpallet desc");
								foreach ($rak23->result_array() as $r23){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r23['kdpallet']) ?>"><?= $r23['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak24=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-D%-24') order by kdpallet desc");
								foreach ($rak24->result_array() as $r24){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r24['kdpallet']) ?>"><?= $r24['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak25=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-D%-25') order by kdpallet desc");
								foreach ($rak25->result_array() as $r25){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r25['kdpallet']) ?>"><?= $r25['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak26=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-D%-26') order by kdpallet desc");
								foreach ($rak26->result_array() as $r26){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r26['kdpallet']) ?>"><?= $r26['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak27=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-D%-27') order by kdpallet desc");
								foreach ($rak27->result_array() as $r27){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r27['kdpallet']) ?>"><?= $r27['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak28=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-D%-28') order by kdpallet desc");
								foreach ($rak28->result_array() as $r28){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r28['kdpallet']) ?>"><?= $r28['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak29=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-D%-29') order by kdpallet desc");
								foreach ($rak29->result_array() as $r29){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r29['kdpallet']) ?>"><?= $r29['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak30=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-D%-30') order by kdpallet desc");
								foreach ($rak30->result_array() as $r30){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r30['kdpallet']) ?>"><?= $r30['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak31=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-D%-31') order by kdpallet desc");
								foreach ($rak31->result_array() as $r31){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r31['kdpallet']) ?>"><?= $r31['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak32=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-D%-32') order by kdpallet desc");
								foreach ($rak32->result_array() as $r32){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r32['kdpallet']) ?>"><?= $r32['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak33=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-D%-33') order by kdpallet desc");
								foreach ($rak33->result_array() as $r33){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r33['kdpallet']) ?>"><?= $r33['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak34=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-D%-34') order by kdpallet desc");
								foreach ($rak34->result_array() as $r34){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r34['kdpallet']) ?>"><?= $r34['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak35=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-D%-35') order by kdpallet desc");
								foreach ($rak35->result_array() as $r35){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r35['kdpallet']) ?>"><?= $r35['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak36=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-D%-36') order by kdpallet desc");
								foreach ($rak36->result_array() as $r36){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r36['kdpallet']) ?>"><?= $r36['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak37=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-D%-37') order by kdpallet desc");
								foreach ($rak37->result_array() as $r37){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r37['kdpallet']) ?>"><?= $r37['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak38=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-D%-38') order by kdpallet desc");
								foreach ($rak38->result_array() as $r38){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r38['kdpallet']) ?>"><?= $r38['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak39=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-D%-39') order by kdpallet desc");
								foreach ($rak39->result_array() as $r39){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r39['kdpallet']) ?>"><?= $r39['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak40=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-D%-40') order by kdpallet desc");
								foreach ($rak40->result_array() as $r40){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r40['kdpallet']) ?>"><?= $r40['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak41=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-D%-41') order by kdpallet desc");
								foreach ($rak41->result_array() as $r41){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r41['kdpallet']) ?>"><?= $r41['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak42=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-D%-42') order by kdpallet desc");
								foreach ($rak42->result_array() as $r42){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r42['kdpallet']) ?>"><?= $r42['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                        </div>
                        <div style="display:flex;justify-content:end">
                            <div style="display:flex;border-right:3px solid;border-top:3px solid;">
                                <div>
                                    <?php 
								$rak1=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-E%-01') order by kdpallet desc");
								foreach ($rak1->result_array() as $r1){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r1['kdpallet']) ?>"><?= $r1['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak2=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-E%-02') order by kdpallet desc");
								foreach ($rak2->result_array() as $r2){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r2['kdpallet']) ?>"><?= $r2['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid;border-top:3px solid;">
                                <div>
                                    <?php 
								$rak3=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-E%-03') order by kdpallet desc");
								foreach ($rak3->result_array() as $r3){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r3['kdpallet']) ?>"><?= $r3['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak4=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-E%-04') order by kdpallet desc");
								foreach ($rak4->result_array() as $r4){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r4['kdpallet']) ?>"><?= $r4['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid;border-top:3px solid;">
                                <div>
                                    <?php 
								$rak5=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-E%-05') order by kdpallet desc");
								foreach ($rak5->result_array() as $r5){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r5['kdpallet']) ?>"><?= $r5['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak6=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-E%-06') order by kdpallet desc");
								foreach ($rak6->result_array() as $r6){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r6['kdpallet']) ?>"><?= $r6['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid;border-top:3px solid;">
                                <div>
                                    <?php 
								$rak7=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-E%-07') order by kdpallet desc");
								foreach ($rak7->result_array() as $r7){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r7['kdpallet']) ?>"><?= $r7['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak8=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-E%-08') order by kdpallet desc");
								foreach ($rak8->result_array() as $r8){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r8['kdpallet']) ?>"><?= $r8['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid;border-top:3px solid;">
                                <div>
                                    <?php 
								$rak9=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-E%-09') order by kdpallet desc");
								foreach ($rak9->result_array() as $r9){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r9['kdpallet']) ?>"><?= $r9['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak10=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-E%-10') order by kdpallet desc");
								foreach ($rak10->result_array() as $r10){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r10['kdpallet']) ?>"><?= $r10['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak11=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-E%-11') order by kdpallet desc");
								foreach ($rak11->result_array() as $r11){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r11['kdpallet']) ?>"><?= $r11['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid;border-top:3px solid;">
                                <div>
                                    <?php 
								$rak12=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-E%-12') order by kdpallet desc");
								foreach ($rak12->result_array() as $r12){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r12['kdpallet']) ?>"><?= $r12['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak13=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-E%-13') order by kdpallet desc");
								foreach ($rak13->result_array() as $r13){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r13['kdpallet']) ?>"><?= $r13['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid;border-top:3px solid;">
                                <div>
                                    <?php 
								$rak14=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-E%-14') order by kdpallet desc");
								foreach ($rak14->result_array() as $r14){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r14['kdpallet']) ?>"><?= $r14['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak15=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-E%-15') order by kdpallet desc");
								foreach ($rak15->result_array() as $r15){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r15['kdpallet']) ?>"><?= $r15['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid;border-top:3px solid;">
                                <div>
                                    <?php 
								$rak16=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-E%-16') order by kdpallet desc");
								foreach ($rak16->result_array() as $r16){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r16['kdpallet']) ?>"><?= $r16['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak17=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-E%-17') order by kdpallet desc");
								foreach ($rak17->result_array() as $r17){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r17['kdpallet']) ?>"><?= $r17['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid;border-top:3px solid;">
                                <div>
                                    <?php 
								$rak18=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-E%-18') order by kdpallet desc");
								foreach ($rak18->result_array() as $r18){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r18['kdpallet']) ?>"><?= $r18['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak19=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-E%-19') order by kdpallet desc");
								foreach ($rak19->result_array() as $r19){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r19['kdpallet']) ?>"><?= $r19['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid;border-top:3px solid;">
                                <div>
                                    <?php 
								$rak20=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-E%-20') order by kdpallet desc");
								foreach ($rak20->result_array() as $r20){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r20['kdpallet']) ?>"><?= $r20['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak21=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-E%-21') order by kdpallet desc");
								foreach ($rak21->result_array() as $r21){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r21['kdpallet']) ?>"><?= $r21['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid;border-top:3px solid;">
                                <div>
                                    <?php 
								$rak22=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-E%-22') order by kdpallet desc");
								foreach ($rak22->result_array() as $r22){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r22['kdpallet']) ?>"><?= $r22['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak23=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-E%-23') order by kdpallet desc");
								foreach ($rak23->result_array() as $r23){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r23['kdpallet']) ?>"><?= $r23['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid;border-top:3px solid;">
                                <div>
                                    <?php 
								$rak24=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-E%-24') order by kdpallet desc");
								foreach ($rak24->result_array() as $r24){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r24['kdpallet']) ?>"><?= $r24['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak25=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-E%-25') order by kdpallet desc");
								foreach ($rak25->result_array() as $r25){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r25['kdpallet']) ?>"><?= $r25['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid;border-top:3px solid;">
                                <div>
                                    <?php 
								$rak26=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-E%-26') order by kdpallet desc");
								foreach ($rak26->result_array() as $r26){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r26['kdpallet']) ?>"><?= $r26['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak27=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-E%-27') order by kdpallet desc");
								foreach ($rak27->result_array() as $r27){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r27['kdpallet']) ?>"><?= $r27['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid;border-top:3px solid;">
                                <div>
                                    <?php 
								$rak28=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-E%-28') order by kdpallet desc");
								foreach ($rak28->result_array() as $r28){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r28['kdpallet']) ?>"><?= $r28['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak29=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-E%-29') order by kdpallet desc");
								foreach ($rak29->result_array() as $r29){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r29['kdpallet']) ?>"><?= $r29['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak30=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-E%-30') order by kdpallet desc");
								foreach ($rak30->result_array() as $r30){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r30['kdpallet']) ?>"><?= $r30['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid;border-top:3px solid;">
                                <div>
                                    <?php 
								$rak31=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-E%-31') order by kdpallet desc");
								foreach ($rak31->result_array() as $r31){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r31['kdpallet']) ?>"><?= $r31['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak32=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-E%-32') order by kdpallet desc");
								foreach ($rak32->result_array() as $r32){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r32['kdpallet']) ?>"><?= $r32['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid;border-top:3px solid;">
                                <div>
                                    <?php 
								$rak33=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-E%-33') order by kdpallet desc");
								foreach ($rak33->result_array() as $r33){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r33['kdpallet']) ?>"><?= $r33['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak34=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-E%-34') order by kdpallet desc");
								foreach ($rak34->result_array() as $r34){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r34['kdpallet']) ?>"><?= $r34['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid;border-top:3px solid;">
                                <div>
                                    <?php 
								$rak35=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-E%-35') order by kdpallet desc");
								foreach ($rak35->result_array() as $r35){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r35['kdpallet']) ?>"><?= $r35['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak36=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-E%-36') order by kdpallet desc");
								foreach ($rak36->result_array() as $r36){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r36['kdpallet']) ?>"><?= $r36['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid;border-top:3px solid;">
                                <div>
                                    <?php 
								$rak37=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-E%-37') order by kdpallet desc");
								foreach ($rak37->result_array() as $r37){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r37['kdpallet']) ?>"><?= $r37['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak38=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-E%-38') order by kdpallet desc");
								foreach ($rak38->result_array() as $r38){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r38['kdpallet']) ?>"><?= $r38['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid;border-top:3px solid;">
                                <div>
                                    <?php 
								$rak39=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-E%-39') order by kdpallet desc");
								foreach ($rak39->result_array() as $r39){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r39['kdpallet']) ?>"><?= $r39['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak40=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-E%-40') order by kdpallet desc");
								foreach ($rak40->result_array() as $r40){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r40['kdpallet']) ?>"><?= $r40['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid;border-top:3px solid;">
                                <div>
                                    <?php 
								$rak41=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-E%-41') order by kdpallet desc");
								foreach ($rak41->result_array() as $r41){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r41['kdpallet']) ?>"><?= $r41['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak42=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-E%-42') order by kdpallet desc");
								foreach ($rak42->result_array() as $r42){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r42['kdpallet']) ?>"><?= $r42['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                        </div>
                        <div style="display:flex;justify-content:end">
                            <div
                                style="width:650px;height:80px;background-color:grey;color:white;display: flex;flex-wrap: wrap;align-items: center;justify-content:center;border:1px solid">
                                <h4>Area Tunggu Pengiriman</h4>
                            </div>
                            <div
                                style="width:240px;height:30px;display: flex;flex-wrap: wrap;align-items: center;justify-content:center;border-top:1px solid black">

                            </div>
                            <div
                                style="width:330px;height:30px;background-color:grey;color:white;display: flex;flex-wrap: wrap;align-items: center;justify-content:center;border:1px solid">

                            </div>
                            <div
                                style="width:1220px;height:80px;color:white;display: flex;flex-wrap: wrap;align-items: center;justify-content:center;border:1px solid">

                            </div>
                            <div
                                style="width:980px;height:80px;background-color:purple;color:white;display: flex;flex-wrap: wrap;align-items: center;justify-content:center;border:1px solid">
                                <h4>Area Overload Alkes</h4>
                            </div>
                        </div>
                        <div style="display:flex;justify-content:end">
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak1=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-F%-01') order by kdpallet desc");
								foreach ($rak1->result_array() as $r1){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r1['kdpallet']) ?>"><?= $r1['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak2=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-F%-02') order by kdpallet desc");
								foreach ($rak2->result_array() as $r2){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r2['kdpallet']) ?>"><?= $r2['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak3=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-F%-03') order by kdpallet desc");
								foreach ($rak3->result_array() as $r3){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r3['kdpallet']) ?>"><?= $r3['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak4=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-F%-04') order by kdpallet desc");
								foreach ($rak4->result_array() as $r4){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r4['kdpallet']) ?>"><?= $r4['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak5=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-F%-05') order by kdpallet desc");
								foreach ($rak5->result_array() as $r5){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r5['kdpallet']) ?>"><?= $r5['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak6=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-F%-06') order by kdpallet desc");
								foreach ($rak6->result_array() as $r6){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r6['kdpallet']) ?>"><?= $r6['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak7=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-F%-07') order by kdpallet desc");
								foreach ($rak7->result_array() as $r7){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r7['kdpallet']) ?>"><?= $r7['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak8=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-F%-08') order by kdpallet desc");
								foreach ($rak8->result_array() as $r8){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r8['kdpallet']) ?>"><?= $r8['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak9=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-F%-09') order by kdpallet desc");
								foreach ($rak9->result_array() as $r9){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r9['kdpallet']) ?>"><?= $r9['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak10=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-F%-10') order by kdpallet desc");
								foreach ($rak10->result_array() as $r10){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r10['kdpallet']) ?>"><?= $r10['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak11=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-F%-11') order by kdpallet desc");
								foreach ($rak11->result_array() as $r11){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r11['kdpallet']) ?>"><?= $r11['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak12=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-F%-12') order by kdpallet desc");
								foreach ($rak12->result_array() as $r12){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r12['kdpallet']) ?>"><?= $r12['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak13=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-F%-13') order by kdpallet desc");
								foreach ($rak13->result_array() as $r13){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r13['kdpallet']) ?>"><?= $r13['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak14=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-F%-14') order by kdpallet desc");
								foreach ($rak14->result_array() as $r14){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r14['kdpallet']) ?>"><?= $r14['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak15=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-F%-15') order by kdpallet desc");
								foreach ($rak15->result_array() as $r15){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r15['kdpallet']) ?>"><?= $r15['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak16=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-F%-16') order by kdpallet desc");
								foreach ($rak16->result_array() as $r16){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r16['kdpallet']) ?>"><?= $r16['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak17=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-F%-17') order by kdpallet desc");
								foreach ($rak17->result_array() as $r17){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r17['kdpallet']) ?>"><?= $r17['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak18=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-F%-18') order by kdpallet desc");
								foreach ($rak18->result_array() as $r18){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r18['kdpallet']) ?>"><?= $r18['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak19=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-F%-19') order by kdpallet desc");
								foreach ($rak19->result_array() as $r19){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r19['kdpallet']) ?>"><?= $r19['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak20=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-F%-20') order by kdpallet desc");
								foreach ($rak20->result_array() as $r20){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r20['kdpallet']) ?>"><?= $r20['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak21=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-F%-21') order by kdpallet desc");
								foreach ($rak21->result_array() as $r21){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r21['kdpallet']) ?>"><?= $r21['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak22=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-F%-22') order by kdpallet desc");
								foreach ($rak22->result_array() as $r22){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r22['kdpallet']) ?>"><?= $r22['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak23=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-F%-23') order by kdpallet desc");
								foreach ($rak23->result_array() as $r23){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r23['kdpallet']) ?>"><?= $r23['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak24=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-F%-24') order by kdpallet desc");
								foreach ($rak24->result_array() as $r24){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r24['kdpallet']) ?>"><?= $r24['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak25=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-F%-25') order by kdpallet desc");
								foreach ($rak25->result_array() as $r25){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r25['kdpallet']) ?>"><?= $r25['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak26=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-F%-26') order by kdpallet desc");
								foreach ($rak26->result_array() as $r26){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r26['kdpallet']) ?>"><?= $r26['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak27=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-F%-27') order by kdpallet desc");
								foreach ($rak27->result_array() as $r27){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r27['kdpallet']) ?>"><?= $r27['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak28=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-F%-28') order by kdpallet desc");
								foreach ($rak28->result_array() as $r28){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r28['kdpallet']) ?>"><?= $r28['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak29=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-F%-29') order by kdpallet desc");
								foreach ($rak29->result_array() as $r29){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r29['kdpallet']) ?>"><?= $r29['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak30=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-F%-30') order by kdpallet desc");
								foreach ($rak30->result_array() as $r30){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r30['kdpallet']) ?>"><?= $r30['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak31=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-F%-31') order by kdpallet desc");
								foreach ($rak31->result_array() as $r31){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r31['kdpallet']) ?>"><?= $r31['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak32=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-F%-32') order by kdpallet desc");
								foreach ($rak32->result_array() as $r32){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r32['kdpallet']) ?>"><?= $r32['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak33=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-F%-33') order by kdpallet desc");
								foreach ($rak33->result_array() as $r33){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r33['kdpallet']) ?>"><?= $r33['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak34=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-F%-34') order by kdpallet desc");
								foreach ($rak34->result_array() as $r34){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r34['kdpallet']) ?>"><?= $r34['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak35=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-F%-35') order by kdpallet desc");
								foreach ($rak35->result_array() as $r35){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r35['kdpallet']) ?>"><?= $r35['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak36=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-F%-36') order by kdpallet desc");
								foreach ($rak36->result_array() as $r36){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r36['kdpallet']) ?>"><?= $r36['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak37=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-F%-37') order by kdpallet desc");
								foreach ($rak37->result_array() as $r37){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r37['kdpallet']) ?>"><?= $r37['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak38=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-F%-38') order by kdpallet desc");
								foreach ($rak38->result_array() as $r38){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r38['kdpallet']) ?>"><?= $r38['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak39=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-F%-39') order by kdpallet desc");
								foreach ($rak39->result_array() as $r39){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r39['kdpallet']) ?>"><?= $r39['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak40=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-F%-40') order by kdpallet desc");
								foreach ($rak40->result_array() as $r40){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r40['kdpallet']) ?>"><?= $r40['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak41=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-F%-41') order by kdpallet desc");
								foreach ($rak41->result_array() as $r41){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r41['kdpallet']) ?>"><?= $r41['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak42=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-F%-42') order by kdpallet desc");
								foreach ($rak42->result_array() as $r42){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r42['kdpallet']) ?>"><?= $r42['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                        </div>
                        <div style="display:flex;justify-content:end">
                            <div
                                style="width:3420px;height:20px;background-color:red;color:black;border:1px solid;border-top:3px solid;">
                            </div>
                        </div>
                        <div style="display:flex;justify-content:end">
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak1=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-G%-01') order by kdpallet desc");
								foreach ($rak1->result_array() as $r1){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r1['kdpallet']) ?>"><?= $r1['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak2=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-G%-02') order by kdpallet desc");
								foreach ($rak2->result_array() as $r2){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r2['kdpallet']) ?>"><?= $r2['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak3=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-G%-03') order by kdpallet desc");
								foreach ($rak3->result_array() as $r3){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r3['kdpallet']) ?>"><?= $r3['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak4=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-G%-04') order by kdpallet desc");
								foreach ($rak4->result_array() as $r4){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r4['kdpallet']) ?>"><?= $r4['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak5=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-G%-05') order by kdpallet desc");
								foreach ($rak5->result_array() as $r5){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r5['kdpallet']) ?>"><?= $r5['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak6=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-G%-06') order by kdpallet desc");
								foreach ($rak6->result_array() as $r6){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r6['kdpallet']) ?>"><?= $r6['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak7=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-G%-07') order by kdpallet desc");
								foreach ($rak7->result_array() as $r7){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r7['kdpallet']) ?>"><?= $r7['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak8=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-G%-08') order by kdpallet desc");
								foreach ($rak8->result_array() as $r8){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r8['kdpallet']) ?>"><?= $r8['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak9=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-G%-09') order by kdpallet desc");
								foreach ($rak9->result_array() as $r9){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r9['kdpallet']) ?>"><?= $r9['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak10=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-G%-10') order by kdpallet desc");
								foreach ($rak10->result_array() as $r10){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r10['kdpallet']) ?>"><?= $r10['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak11=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-G%-11') order by kdpallet desc");
								foreach ($rak11->result_array() as $r11){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r11['kdpallet']) ?>"><?= $r11['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak12=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-G%-12') order by kdpallet desc");
								foreach ($rak12->result_array() as $r12){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r12['kdpallet']) ?>"><?= $r12['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak13=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-G%-13') order by kdpallet desc");
								foreach ($rak13->result_array() as $r13){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r13['kdpallet']) ?>"><?= $r13['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak14=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-G%-14') order by kdpallet desc");
								foreach ($rak14->result_array() as $r14){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r14['kdpallet']) ?>"><?= $r14['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak15=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-G%-15') order by kdpallet desc");
								foreach ($rak15->result_array() as $r15){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r15['kdpallet']) ?>"><?= $r15['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak16=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-G%-16') order by kdpallet desc");
								foreach ($rak16->result_array() as $r16){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r16['kdpallet']) ?>"><?= $r16['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak17=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-G%-17') order by kdpallet desc");
								foreach ($rak17->result_array() as $r17){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r17['kdpallet']) ?>"><?= $r17['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak18=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-G%-18') order by kdpallet desc");
								foreach ($rak18->result_array() as $r18){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r18['kdpallet']) ?>"><?= $r18['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak19=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-G%-19') order by kdpallet desc");
								foreach ($rak19->result_array() as $r19){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r19['kdpallet']) ?>"><?= $r19['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak20=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-G%-20') order by kdpallet desc");
								foreach ($rak20->result_array() as $r20){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r20['kdpallet']) ?>"><?= $r20['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak21=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-G%-21') order by kdpallet desc");
								foreach ($rak21->result_array() as $r21){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r21['kdpallet']) ?>"><?= $r21['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak22=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-G%-22') order by kdpallet desc");
								foreach ($rak22->result_array() as $r22){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r22['kdpallet']) ?>"><?= $r22['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak23=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-G%-23') order by kdpallet desc");
								foreach ($rak23->result_array() as $r23){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r23['kdpallet']) ?>"><?= $r23['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak24=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-G%-24') order by kdpallet desc");
								foreach ($rak24->result_array() as $r24){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r24['kdpallet']) ?>"><?= $r24['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak25=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-G%-25') order by kdpallet desc");
								foreach ($rak25->result_array() as $r25){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r25['kdpallet']) ?>"><?= $r25['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak26=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-G%-26') order by kdpallet desc");
								foreach ($rak26->result_array() as $r26){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r26['kdpallet']) ?>"><?= $r26['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak27=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-G%-27') order by kdpallet desc");
								foreach ($rak27->result_array() as $r27){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r27['kdpallet']) ?>"><?= $r27['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak28=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-G%-28') order by kdpallet desc");
								foreach ($rak28->result_array() as $r28){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r28['kdpallet']) ?>"><?= $r28['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak29=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-G%-29') order by kdpallet desc");
								foreach ($rak29->result_array() as $r29){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r29['kdpallet']) ?>"><?= $r29['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak30=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-G%-30') order by kdpallet desc");
								foreach ($rak30->result_array() as $r30){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r30['kdpallet']) ?>"><?= $r30['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak31=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-G%-31') order by kdpallet desc");
								foreach ($rak31->result_array() as $r31){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r31['kdpallet']) ?>"><?= $r31['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak32=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-G%-32') order by kdpallet desc");
								foreach ($rak32->result_array() as $r32){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r32['kdpallet']) ?>"><?= $r32['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak33=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-G%-33') order by kdpallet desc");
								foreach ($rak33->result_array() as $r33){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r33['kdpallet']) ?>"><?= $r33['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak34=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-G%-34') order by kdpallet desc");
								foreach ($rak34->result_array() as $r34){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r34['kdpallet']) ?>"><?= $r34['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak35=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-G%-35') order by kdpallet desc");
								foreach ($rak35->result_array() as $r35){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r35['kdpallet']) ?>"><?= $r35['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak36=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-G%-36') order by kdpallet desc");
								foreach ($rak36->result_array() as $r36){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r36['kdpallet']) ?>"><?= $r36['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak37=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-G%-37') order by kdpallet desc");
								foreach ($rak37->result_array() as $r37){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r37['kdpallet']) ?>"><?= $r37['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak38=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-G%-38') order by kdpallet desc");
								foreach ($rak38->result_array() as $r38){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r38['kdpallet']) ?>"><?= $r38['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak39=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-G%-39') order by kdpallet desc");
								foreach ($rak39->result_array() as $r39){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r39['kdpallet']) ?>"><?= $r39['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak40=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-G%-40') order by kdpallet desc");
								foreach ($rak40->result_array() as $r40){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r40['kdpallet']) ?>"><?= $r40['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak41=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-G%-41') order by kdpallet desc");
								foreach ($rak41->result_array() as $r41){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r41['kdpallet']) ?>"><?= $r41['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak42=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-G%-42') order by kdpallet desc");
								foreach ($rak42->result_array() as $r42){?>
                                    <div style="border:1px solid;padding:3px;background-color:#f5cac1;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r42['kdpallet']) ?>"><?= $r42['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                        </div>
                        <div style="display:flex;justify-content:end">
                            <div
                                style="width:240px;height:80px;background-color:white;display: flex;flex-wrap: wrap;align-items: center;justify-content:center;border-top:1px solid">

                            </div>
                            <div
                                style="width:1310px;height:80px;background-color:#00b3ff;color:white;display: flex;flex-wrap: wrap;align-items: center;justify-content:center;border:1px solid">

                            </div>
                            <div
                                style="width:240px;height:80px;color:white;display: flex;flex-wrap: wrap;align-items: center;justify-content:center;border:1px solid">

                            </div>
                            <div
                                style="width:980px;height:80px;background-color:purple;color:white;display: flex;flex-wrap: wrap;align-items: center;justify-content:center;border:1px solid">
                                <h4>Area Overload Alkes<br><br>Area Overload PKRT</h4>
                            </div>
                        </div>
                        <div style="display:flex;justify-content:end">
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak1=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-H%-01') order by kdpallet desc");
								foreach ($rak1->result_array() as $r1){?>
                                    <div style="border:1px solid;padding:3px;background-color:#b185cc;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r1['kdpallet']) ?>"><?= $r1['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak2=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-H%-02') order by kdpallet desc");
								foreach ($rak2->result_array() as $r2){?>
                                    <div style="border:1px solid;padding:3px;background-color:#b185cc;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r2['kdpallet']) ?>"><?= $r2['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak3=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-H%-03') order by kdpallet desc");
								foreach ($rak3->result_array() as $r3){?>
                                    <div style="border:1px solid;padding:3px;background-color:#b185cc;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r3['kdpallet']) ?>"><?= $r3['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak4=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-H%-04') order by kdpallet desc");
								foreach ($rak4->result_array() as $r4){?>
                                    <div style="border:1px solid;padding:3px;background-color:#b185cc;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r4['kdpallet']) ?>"><?= $r4['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak5=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-H%-05') order by kdpallet desc");
								foreach ($rak5->result_array() as $r5){?>
                                    <div style="border:1px solid;padding:3px;background-color:#b185cc;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r5['kdpallet']) ?>"><?= $r5['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak6=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-H%-06') order by kdpallet desc");
								foreach ($rak6->result_array() as $r6){?>
                                    <div style="border:1px solid;padding:3px;background-color:#b185cc;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r6['kdpallet']) ?>"><?= $r6['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak7=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-H%-07') order by kdpallet desc");
								foreach ($rak7->result_array() as $r7){?>
                                    <div style="border:1px solid;padding:3px;background-color:#b185cc;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r7['kdpallet']) ?>"><?= $r7['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak8=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-H%-08') order by kdpallet desc");
								foreach ($rak8->result_array() as $r8){?>
                                    <div style="border:1px solid;padding:3px;background-color:#b185cc;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r8['kdpallet']) ?>"><?= $r8['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak9=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-H%-09') order by kdpallet desc");
								foreach ($rak9->result_array() as $r9){?>
                                    <div style="border:1px solid;padding:3px;background-color:#b185cc;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r9['kdpallet']) ?>"><?= $r9['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak10=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-H%-10') order by kdpallet desc");
								foreach ($rak10->result_array() as $r10){?>
                                    <div style="border:1px solid;padding:3px;background-color:#b185cc;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r10['kdpallet']) ?>"><?= $r10['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak11=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-H%-11') order by kdpallet desc");
								foreach ($rak11->result_array() as $r11){?>
                                    <div style="border:1px solid;padding:3px;background-color:#b185cc;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r11['kdpallet']) ?>"><?= $r11['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak12=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-H%-12') order by kdpallet desc");
								foreach ($rak12->result_array() as $r12){?>
                                    <div style="border:1px solid;padding:3px;background-color:#b185cc;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r12['kdpallet']) ?>"><?= $r12['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak13=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-H%-13') order by kdpallet desc");
								foreach ($rak13->result_array() as $r13){?>
                                    <div style="border:1px solid;padding:3px;background-color:#b185cc;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r13['kdpallet']) ?>"><?= $r13['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak14=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-H%-14') order by kdpallet desc");
								foreach ($rak14->result_array() as $r14){?>
                                    <div style="border:1px solid;padding:3px;background-color:#b185cc;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r14['kdpallet']) ?>"><?= $r14['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak15=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-H%-15') order by kdpallet desc");
								foreach ($rak15->result_array() as $r15){?>
                                    <div style="border:1px solid;padding:3px;background-color:#b185cc;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r15['kdpallet']) ?>"><?= $r15['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak16=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-H%-16') order by kdpallet desc");
								foreach ($rak16->result_array() as $r16){?>
                                    <div style="border:1px solid;padding:3px;background-color:#b185cc;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r16['kdpallet']) ?>"><?= $r16['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak17=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-H%-17') order by kdpallet desc");
								foreach ($rak17->result_array() as $r17){?>
                                    <div style="border:1px solid;padding:3px;background-color:#b185cc;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r17['kdpallet']) ?>"><?= $r17['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak18=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-H%-18') order by kdpallet desc");
								foreach ($rak18->result_array() as $r18){?>
                                    <div style="border:1px solid;padding:3px;background-color:#b185cc;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r18['kdpallet']) ?>"><?= $r18['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak19=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-H%-19') order by kdpallet desc");
								foreach ($rak19->result_array() as $r19){?>
                                    <div style="border:1px solid;padding:3px;background-color:#b185cc;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r19['kdpallet']) ?>"><?= $r19['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak20=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-H%-20') order by kdpallet desc");
								foreach ($rak20->result_array() as $r20){?>
                                    <div style="border:1px solid;padding:3px;background-color:#b185cc;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r20['kdpallet']) ?>"><?= $r20['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak21=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-H%-21') order by kdpallet desc");
								foreach ($rak21->result_array() as $r21){?>
                                    <div style="border:1px solid;padding:3px;background-color:#b185cc;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r21['kdpallet']) ?>"><?= $r21['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak22=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-H%-22') order by kdpallet desc");
								foreach ($rak22->result_array() as $r22){?>
                                    <div style="border:1px solid;padding:3px;background-color:#b185cc;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r22['kdpallet']) ?>"><?= $r22['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak23=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-H%-23') order by kdpallet desc");
								foreach ($rak23->result_array() as $r23){?>
                                    <div style="border:1px solid;padding:3px;background-color:#b185cc;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r23['kdpallet']) ?>"><?= $r23['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak24=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-H%-24') order by kdpallet desc");
								foreach ($rak24->result_array() as $r24){?>
                                    <div style="border:1px solid;padding:3px;background-color:#b185cc;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r24['kdpallet']) ?>"><?= $r24['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak25=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-H%-25') order by kdpallet desc");
								foreach ($rak25->result_array() as $r25){?>
                                    <div style="border:1px solid;padding:3px;background-color:#b185cc;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r25['kdpallet']) ?>"><?= $r25['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak26=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-H%-26') order by kdpallet desc");
								foreach ($rak26->result_array() as $r26){?>
                                    <div style="border:1px solid;padding:3px;background-color:#b185cc;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r26['kdpallet']) ?>"><?= $r26['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak27=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-H%-27') order by kdpallet desc");
								foreach ($rak27->result_array() as $r27){?>
                                    <div style="border:1px solid;padding:3px;background-color:#b185cc;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r27['kdpallet']) ?>"><?= $r27['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak28=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-H%-28') order by kdpallet desc");
								foreach ($rak28->result_array() as $r28){?>
                                    <div style="border:1px solid;padding:3px;background-color:#b185cc;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r28['kdpallet']) ?>"><?= $r28['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak29=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-H%-29') order by kdpallet desc");
								foreach ($rak29->result_array() as $r29){?>
                                    <div style="border:1px solid;padding:3px;background-color:#b185cc;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r29['kdpallet']) ?>"><?= $r29['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak30=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-H%-30') order by kdpallet desc");
								foreach ($rak30->result_array() as $r30){?>
                                    <div style="border:1px solid;padding:3px;background-color:#b185cc;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r30['kdpallet']) ?>"><?= $r30['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak31=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-H%-31') order by kdpallet desc");
								foreach ($rak31->result_array() as $r31){?>
                                    <div style="border:1px solid;padding:3px;background-color:#b185cc;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r31['kdpallet']) ?>"><?= $r31['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak32=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-H%-32') order by kdpallet desc");
								foreach ($rak32->result_array() as $r32){?>
                                    <div style="border:1px solid;padding:3px;background-color:#b185cc;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r32['kdpallet']) ?>"><?= $r32['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak33=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-H%-33') order by kdpallet desc");
								foreach ($rak33->result_array() as $r33){?>
                                    <div style="border:1px solid;padding:3px;background-color:#b185cc;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r33['kdpallet']) ?>"><?= $r33['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak34=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-H%-34') order by kdpallet desc");
								foreach ($rak34->result_array() as $r34){?>
                                    <div style="border:1px solid;padding:3px;background-color:#b185cc;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r34['kdpallet']) ?>"><?= $r34['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak35=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-H%-35') order by kdpallet desc");
								foreach ($rak35->result_array() as $r35){?>
                                    <div style="border:1px solid;padding:3px;background-color:#b185cc;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r35['kdpallet']) ?>"><?= $r35['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak36=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-H%-36') order by kdpallet desc");
								foreach ($rak36->result_array() as $r36){?>
                                    <div style="border:1px solid;padding:3px;background-color:#b185cc;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r36['kdpallet']) ?>"><?= $r36['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak37=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-H%-37') order by kdpallet desc");
								foreach ($rak37->result_array() as $r37){?>
                                    <div style="border:1px solid;padding:3px;background-color:#b185cc;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r37['kdpallet']) ?>"><?= $r37['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak38=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-H%-38') order by kdpallet desc");
								foreach ($rak38->result_array() as $r38){?>
                                    <div style="border:1px solid;padding:3px;background-color:#b185cc;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r38['kdpallet']) ?>"><?= $r38['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak39=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-H%-39') order by kdpallet desc");
								foreach ($rak39->result_array() as $r39){?>
                                    <div style="border:1px solid;padding:3px;background-color:#b185cc;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r39['kdpallet']) ?>"><?= $r39['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak40=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-H%-40') order by kdpallet desc");
								foreach ($rak40->result_array() as $r40){?>
                                    <div style="border:1px solid;padding:3px;background-color:#b185cc;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r40['kdpallet']) ?>"><?= $r40['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak41=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-H%-41') order by kdpallet desc");
								foreach ($rak41->result_array() as $r41){?>
                                    <div style="border:1px solid;padding:3px;background-color:#b185cc;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r41['kdpallet']) ?>"><?= $r41['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak42=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-H%-42') order by kdpallet desc");
								foreach ($rak42->result_array() as $r42){?>
                                    <div style="border:1px solid;padding:3px;background-color:#b185cc;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r42['kdpallet']) ?>"><?= $r42['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                            <div style="display:flex;border-right:3px solid">
                                <div>
                                    <?php 
								$rak43=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-H%-43') order by kdpallet desc");
								foreach ($rak43->result_array() as $r43){?>
                                    <div style="border:1px solid;padding:3px;background-color:#b185cc;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r43['kdpallet']) ?>"><?= $r43['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                                <div>
                                    <?php 
								$rak44=$this->db->query("SELECT * FROM pallet where (kdpallet like 'J02-H%-44') order by kdpallet desc");
								foreach ($rak44->result_array() as $r44){?>
                                    <div style="border:1px solid;padding:3px;background-color:#b185cc;width:80px;">
                                        <a id="lihatPallet" type="button" data-toggle="modal"
                                            data-target="#exampleModal" style="color:black"
                                            href="<?= base_url("mapping/modal/".$r44['kdpallet']) ?>"><?= $r44['kdpallet']?></a>
                                    </div>
                                    <?php }
										?>
                                </div>
                            </div>
                        </div>
                        <div style="display:flex;justify-content:end">
                            <div
                                style="width:240px;background-color:white;display: flex;flex-wrap: wrap;align-items: center;justify-content:center;border-top:1px solid">

                            </div>
                            <div
                                style="width:1310px;background-color:white;color:white;display: flex;flex-wrap: wrap;align-items: center;justify-content:center;border:1px solid">

                            </div>
                            <div
                                style="width:240px;color:white;display: flex;flex-wrap: wrap;align-items: center;justify-content:center;border:1px solid">

                            </div>
                            <div
                                style="width:980px;background-color:white;color:white;display: flex;flex-wrap: wrap;align-items: center;justify-content:center;border:1px solid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
