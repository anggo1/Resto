<?php
	// MSG
	function show_toast($content='', $type='success', $icon='fa-info-circle', $size='14px') {
		if ($content != '') {
			return  '<p class="box-msg">
				      <div class="info-box alert-' .$type .'">
					      <div class="info-box-icon">
					      	<i class="fa ' .$icon .'"></i>
					      </div>
					      <div class="info-box-content" style="font-size:' .$size .'">
				        	' .$content
				      	.'</div>
					  </div>
				    </p>';
		}
	}
	  
	function show_msg($content='', $type='success', $icon='fa-info-circle', $size='14px') {
		if ($content != '') {
			return  '<p class="box-msg">
				      <div class="info-box alert-' .$type .'">
					      <div class="info-box-icon">
					      	<i class="fa ' .$icon .'"></i>
					      </div>
					      <div class="info-box-content" style="font-size:' .$size .'">
				        	' .$content
				      	.'</div>
					  </div>
				    </p>';
		}
	}

	function show_succ_msg($content='', $size='14px') {
		if ($content != '') {
			return   '<p class="box-msg">
				      <div class="alert alert-success alert-dismissible">
					      <div class="info-box-icon">
					      	<i class="fa fa-check-circle"></i>
					      </div>
					      <div class="info-box-content" style="font-size:' .$size .'">
				        	' .$content
				      	.'</div>
					  </div>
				    </p>';
		}
	}
    
    function show_ok_msg($content='', $size='14px') {
		if ($content != '') {
			return   $content;
		}
	}

    function show_del_msg($content='', $size='14px') {
		if ($content != '') {
			return   $content;
		}
	}
	function show_err_msg($content='', $size='14px') {
		if ($content != '') {
			return   '<p class="box-msg">
				      <div class="alert alert-danger alert-dismissible">
					      <div class="info-box-icon">
					      	<i class="fa fa-warning"></i>
					      </div>
					      <div class="info-box-content" style="font-size:' .$size .'">
				        	' .$content
				      	.'</div>
					  </div>
				    </p>';
		}
	}

	// MODAL
	function show_my_print($content='', $id='', $data='', $size='') {
		$_ci = &get_instance();

		if ($content != '') {
			$view_content = $_ci->load->view($content, $data, TRUE);

			return '<div class="modal fade" id="' .$id .'" role="dialog">
					  <div class="modal-dialog modal-' .$size .'" role="document">
					    <div class="modal-content" style="border: none;">
					        ' .$view_content .'
					    </div>
					  </div>
					</div>';
		}
	}
	function show_my_modal($content='', $id='', $data='', $size='') {
		$_ci = &get_instance();

		if ($content != '') {
			$view_content = $_ci->load->view($content, $data, TRUE);

			return '<div class="modal fade" id="' .$id .'" role="dialog">
					  <div class="modal-dialog modal-' .$size .'" role="document">
					    <div class="modal-content">
					        ' .$view_content .'
					    </div>
					  </div>
					</div>';
		}
	}

	function show_my_confirm($id='', $class='', $title='Konfirmasi', $yes = 'Ya', $no = 'Tidak') {
		$_ci = &get_instance();

		if ($id != '') {
			echo   '<div class="modal fade" id="' .$id .'" role="dialog">
					  <div class="modal-dialog modal-md" role="document">
					    <div class="modal-content">
					        <div class="col-md-offset-4 col-md-12 col-md-offset-1 well">
						      <h3 style="display:block; text-align:center;">' .$title .'</h3>
						       <table width="100%" border="0">
						          <tbody>
						            <tr>
						              <td><button class="form-control btn btn-sm btn-primary float-left ' .$class .'"> <i class="fas fa-hand-paper"></i> ' .$yes .'</button></td>
						              <td><button class="form-control btn btn-sm btn-danger float-right" data-dismiss="modal"> <i class="fas fa-times"></i> ' .$no .'</button></td>
					                </tr>
					              </tbody>
				              </table>
						      </div>
						    </div>
					    </div>
					  </div>
					</div>';
		}
	}
	
?>