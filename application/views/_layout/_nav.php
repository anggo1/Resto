
 <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
        <span class="brand-text font-weight-light"><?php echo $userdata->pengguna_nama; ?></span> <i class="fa fa-sign-out-alt"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"><?php echo $userdata->pengguna_nama; ?></span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
           <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?php echo base_url(); ?>assets/images/<?php echo $userdata->pengguna_photo; ?>"
                       alt="User profile picture">
                </div>
          </a>
         
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url('Profile'); ?>" class="dropdown-item dropdown-footer btn btn-primary">Profile</a>
          <a href="<?php echo base_url('Auth/logout'); ?>" class="dropdown-item dropdown-footer">Sign out</a>
        </div>
      </li>
			
