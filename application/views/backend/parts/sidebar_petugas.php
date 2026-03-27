<!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <li>
                      <a href="<?=site_url('backend/dashboard/')?>" <?=$this->uri->segment(2)=='dashboard' ? 'class="active"' : ''?>>
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <li>
                      <a href="<?=site_url('backend/antrian/list')?>" <?=$this->uri->segment(2)=='antrian' && $this->uri->segment(3)=='list' ? 'class="active"' : ''?>>
                          <i class="fa fa-list"></i>
                          <span>Daftar Antrian</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
