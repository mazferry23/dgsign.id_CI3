<!-- sidebar menu start-->
<ul class="sidebar-menu" id="nav-accordion">
                  <li>
                      <a href="<?=site_url('backend/dashboard/')?>" <?=$this->uri->segment(2)=='dashboard' ? 'class="active"' : ''?>>
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a <?=$this->uri->segment(2)=='client' ? 'class="active"' : ''?> href="javascript:;">
                          <i class="fa fa-user"></i>
                          <span>Client</span>
                      </a>
                      <ul class="sub">
                          <li <?=$this->uri->segment(2)=='client' && $this->uri->segment(3)=='' ? 'class="active"' : ''?>><a  href="<?=site_url('backend/client')?>">List</a></li>
                          <li <?=$this->uri->segment(2)=='client' && $this->uri->segment(3)=='create' ? 'class="active"' : ''?>><a  href="<?=site_url('backend/client/create')?>">Create Client</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a <?=$this->uri->segment(2)=='prokes' ? 'class="active"' : ''?> href="javascript:;">
                          <i class="fa fa-gear"></i>
                          <span>Protokol Kesehatan</span>
                      </a>
                      <ul class="sub">
                          <li <?=$this->uri->segment(2)=='prokes' && $this->uri->segment(3)=='' ? 'class="active"' : ''?>><a  href="<?=site_url('backend/prokes')?>">List</a></li>
                          <li <?=$this->uri->segment(2)=='prokes' && $this->uri->segment(3)=='create' ? 'class="active"' : ''?>><a  href="<?=site_url('backend/prokes/create')?>">Create Prokes</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a <?=$this->uri->segment(2)=='GuestHistory' ? 'class="active"' : ''?> href="javascript:;">
                          <i class="fa fa-clipboard"></i>
                          <span>Operator</span>
                      </a>
                      <ul class="sub">
                          <li <?=$this->uri->segment(2)=='GuestHistory' && $this->uri->segment(3)=='' ? 'class="active"' : ''?>><a  href="<?=site_url('backend/GuestHistory')?>">Monitoring</a></li>
                          <li <?=$this->uri->segment(2)=='scanner' && $this->uri->segment(3)=='create' ? 'class="active"' : ''?>><a  href="<?=site_url('backend/Guestistory/create')?>">App Scanner</a></li>
                      </ul>
                  </li>
                  <!--
                  <li class="menu-header">Website</li>
                  <li>
                      <a <?=$this->uri->segment(2)=='invitation' ? 'class="active"' : ''?> href="backend/invitation/all">
                          <i class="fa fa-photo"></i>
                          <span>Slider</span>
                      </a>
                  </li>
                  <li>
                      <a <?=$this->uri->segment(2)=='invitation' ? 'class="active"' : ''?> href="backend/invitation/all">
                          <i class="fa fa-inbox"></i>
                          <span>Services</span>
                      </a>
                  </li>
                  <li>
                      <a <?=$this->uri->segment(2)=='invitation' ? 'class="active"' : ''?> href="backend/invitation/all">
                          <i class="fa fa-inbox"></i>
                          <span>Portofolio</span>
                      </a>
                  </li>
                  <li>
                      <a <?=$this->uri->segment(2)=='invitation' ? 'class="active"' : ''?> href="backend/invitation/all">
                          <i class="fa fa-list"></i>
                          <span>Blog</span>
                      </a>
                  </li>
                  <li>
                      <a <?=$this->uri->segment(2)=='invitation' ? 'class="active"' : ''?> href="backend/invitation/all">
                          <i class="fa fa-wrench"></i>
                          <span>Setting</span>
                      </a>
                  </li>
                  -->
                  <li class="menu-header">MANAJEMEN HAK AKSES</li>
                  <li class="sub-menu">
                      <a <?=$this->uri->segment(2)=='user' ? 'class="active"' : ''?> href="javascript:;" >
                          <i class="fa fa-group"></i>
                          <span>User Management</span>
                      </a>
                      <ul class="sub">
                          <li <?=$this->uri->segment(2)=='user' && $this->uri->segment(3)=='' ? 'class="active"' : ''?>><a  href="<?=site_url('backend/user/')?>">Users</a></li>
                          <li <?=$this->uri->segment(2)=='user' && $this->uri->segment(3)=='create' ? 'class="active"' : ''?>><a  href="<?=site_url('backend/user/create')?>">Create New User</a></li>
                      </ul>
                  </li>
              </ul>
              <br></br>
              <!-- sidebar menu end-->
