<div class="modal-dialog modal-lg" style="z-index:10000;">
    <div class="modal-content">
        <div class="modal-header">
            <?php
			echo $pallet
			?>
        </div>
        <div class="modal-body">
            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true"
                data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true"
                data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId"
                data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                <thead>
                    <tr>
                        <th rowspan="2" style="vertical-align : middle;text-align:center;">No</th>
                        <th rowspan="2">Tanggal</th>
                        <th rowspan="2">No Batch</th>
                        <th rowspan="2">Kode</th>
                        <th rowspan="2">Nama Barang</th>
                        <th colspan="3" style="vertical-align : middle;text-align:center;">saldo</th>
                    </tr>
                    <tr>
                        <th>Sat 1</th>
                        <th>Sat 2</th>
                        <th>Sat 3</th>
                    </tr>
                </thead>


                <tbody>
                    <td></td>
                </tbody>
            </table>

        </div>
    </div>
</div>