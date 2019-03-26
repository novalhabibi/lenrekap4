    <ul class="sidebar navbar-nav">
      <li class="nav-item <?= $this->uri->segment(2) ==''?'active':'' ?>">
        <a class="nav-link" href="<?= site_url('admin') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item <?= $this->uri->segment(2) =='trainings'?'active':'' ?>">
        <a class="nav-link" href="<?= site_url('admin/trainings') ?>">
          <i class="fas fa-fw fa-headphones"></i>
          <span>Trainings</span>
        </a>
      </li>
      <li class="nav-item <?= $this->uri->segment(2) =='maintenances'?'active':'' ?>">
        <a class="nav-link" href="<?= site_url('admin/maintenances') ?>">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Maintenances</span></a>
      </li>
      <li class="nav-item <?= $this->uri->segment(2) =='services'?'active':'' ?>">
        <a class="nav-link" href="<?= site_url('admin/services') ?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Services</span></a>
      </li>
      <li class="nav-item <?= $this->uri->segment(2) =='news'?'active':'' ?>">
        <a class="nav-link" href="<?= site_url('admin/news') ?>">
          <i class="fas fa-fw fa-table"></i>
          <span>News</span></a>
      </li>
      <li class="nav-item <?= $this->uri->segment(2) =='setting'?'active':'' ?>">
        <a class="nav-link" href="<?= site_url('admin/setting') ?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Setting</span></a>
      </li>
      <li class="nav-item <?= $this->uri->segment(2) =='clients'?'active':'' ?>">
        <a class="nav-link" href="<?= site_url('admin/clients') ?>">
          <i class="fas fa-fw fa-users"></i>
          <span>Clients</span></a>
      </li>
      <li class="nav-item <?= $this->uri->segment(2) =='sliders'?'active':'' ?>">
        <a class="nav-link" href="<?= site_url('admin/sliders') ?>">
          <i class="fas fa-fw fa-film"></i>
          <span>Sliders</span></a>
      </li>
    </ul>