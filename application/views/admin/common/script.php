<!-- Jquery Core Js -->
<script src="<?php echo base_url().'assets/admin/plugins/jquery/jquery.min.js';?>"></script>
<!-- Bootstrap Core Js -->
<script src="<?php echo base_url().'assets/admin/plugins/bootstrap/js/bootstrap.js';?>"></script>
<!-- Select Plugin Js -->
<script src="<?php //echo base_url().'assets/admin/plugins/bootstrap-select/js/bootstrap-select.js';?>"></script>
<!-- Slimscroll Plugin Js -->
<script src="<?php echo base_url().'assets/admin/plugins/jquery-slimscroll/jquery.slimscroll.js';?>"></script>
<!-- Waves Effect Plugin Js -->
<script src="<?php echo base_url().'assets/admin/plugins/node-waves/waves.js';?>"></script>
<script src="<?php echo base_url().'assets/admin/plugins/ckeditor/ckeditor.js';?>"></script>
<script src="<?php echo base_url().'assets/admin/plugins/tinymce/tinymce.js';?>"></script>
<!-- Jquery DataTable Plugin Js -->
<script src="<?php echo base_url().'assets/admin/plugins/jquery-datatable/jquery.dataTables.js';?>"></script>
<script src="<?php echo base_url().'assets/admin/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js';?>"></script>
<script src="<?php echo base_url().'assets/admin/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js';?>"></script>
<script src="<?php echo base_url().'assets/admin/plugins/jquery-datatable/extensions/export/buttons.flash.min.js';?>"></script>
<script src="<?php echo base_url().'assets/admin/plugins/jquery-datatable/extensions/export/jszip.min.js';?>"></script>
<script src="<?php echo base_url().'assets/admin/plugins/jquery-datatable/extensions/export/pdfmake.min.js';?>"></script>
<script src="<?php echo base_url().'assets/admin/plugins/jquery-datatable/extensions/export/vfs_fonts.js';?>"></script>
<script src="<?php echo base_url().'assets/admin/plugins/jquery-datatable/extensions/export/buttons.html5.min.js';?>"></script>
<script src="<?php echo base_url().'assets/admin/plugins/jquery-datatable/extensions/export/buttons.print.min.js';?>"></script>
<!-- Jquery CountTo Plugin Js -->
<script src="<?php echo base_url().'assets/admin/plugins/jquery-countto/jquery.countTo.js';?>"></script>
<!-- Morris Plugin Js -->
<script src="<?php echo base_url().'assets/admin/plugins/raphael/raphael.min.js';?>"></script>
<script src="<?php echo base_url().'assets/admin/plugins/morrisjs/morris.js';?>"></script>
<!-- Custom Js -->
<script src="<?php echo base_url().'assets/admin/js/admin.js';?>"></script>
<!-- Demo Js -->
<script src="<?php echo base_url().'assets/admin/js/demo.js';?>"></script>
<!-- Modal -->
<!-- Small Size -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="smallModalLabel"><?php echo $this->lang->line('confirmation'); ?></h4>
            </div>
            <div class="modal-body">
                <?php echo $this->lang->line('are_you_sure_want_to_delete'); ?>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnDeleteYes" class="btn btn-success btn_delete_yes float-right" tbl='' row='' col=''><?php echo $this->lang->line('YES'); ?></button>
        		<button type="button" class="btn btn-danger float-left" data-dismiss="modal">NO</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		var BaseURL = '<?php echo base_url(); ?>';
		$(document).on('focusout', '.input_edit', function(event) {
			event.preventDefault();
			var tbl   = $.trim($(this).attr('tbl'));
			var col   = $.trim($(this).attr('col'));
			var row   = $.trim($(this).attr('row'));
			var value = $.trim($(this).val());
			if (value !='') {
				$.ajax({
					url: BaseURL+'admin/admin/edit',
						type: 'POST',
						dataType: 'json',
						data: {tbl: tbl,col:col,row:row,value:value},
					})
					.done(function(obj) {
						if(obj.status == '1'){
							$.LoadingOverlay("hide");
						}
						else if(obj.status == '0') {
							$.LoadingOverlay("hide");	
						}
					}
				)
			}
		});

		$(document).on('change', '.select_change', function(event) {
			event.preventDefault();
			var tbl   = $.trim($(this).attr('tbl'));
			var col   = $.trim($(this).attr('col'));
			var row   = $.trim($(this).attr('row'));
			var value = $.trim($(this).val());
			// alert('tbl = '+tbl);
			// alert('col = '+col);
			// alert('row = '+row);
			// alert('value = '+value);
			$.LoadingOverlay("show");
			$.ajax({
				url: BaseURL+'admin/admin/edit',
				type: 'POST',
				dataType: 'json',
				data: {tbl: tbl,col:col,row:row,value:value},
			})
			.done(function(obj) {
				if(obj.status == '1'){
					$.LoadingOverlay("hide");
					//alert(obj.msg);
				}
				else if(obj.status == '0') {
					$.LoadingOverlay("hide");	
					//alert(obj.msg);
				}
			})
		});
		$(document).on('click', '.btn_delete', function(event) {
			event.preventDefault();
			var tbl = $.trim($(this).attr('tbl'));
			var row = $.trim($(this).attr('row'));
			$('#btnDeleteYes').attr('tbl', tbl);
			$('#btnDeleteYes').attr('row', row);
			$('#deleteModal').modal('show');
		});
		$(document).on('click', '#btnDeleteYes', function(event) {
			event.preventDefault();
			var tbl = $('#btnDeleteYes').attr('tbl');
			var row = $('#btnDeleteYes').attr('row');
			$.ajax({
				url: BaseURL+'admin/admin/delete',
				type: 'POST',
				dataType: 'json',
				data: {tbl: tbl,row:row},
			})
			.done(function(obj) {
				if(obj.status == '1'){
					location.reload();
				}
				else if(obj.status == '0') {
					location.reload();
				}
			})
		});	
	});
</script>
