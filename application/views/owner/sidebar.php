<div class="sidebar">
    <div class="scrollbar-inner sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="<?= base_url()?>assets\userwym.png">
            </div>
            <div class="info">
                <a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                    <span>
                        Admin
                        <span class="user-level">Administrator</span>
                        <span class="caret"></span>
                    </span>
                </a>
                <div class="clearfix"></div>

                <div class="collapse in" id="collapseExample" aria-expanded="true">
                    <ul class="nav">
                        <li>
                            <a href="#profile">
                                <span class="link-collapse">My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#edit">
                                <span class="link-collapse">Edit Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#settings">
                                <span class="link-collapse">Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class="nav-item <?php if($this->uri->segment(1) == 'owner') {echo "active";}
            ?>">
                <a href="<?= base_url('owner')?>">
                    <i class="fas fa-fw fa-home"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(1) == 'video') {echo "active";}
            ?>">
                <a href="<?= base_url('video')?>">
                    <i class="fas fa-fw fa-video"></i>
                    <p>Video</p>
                </a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(1) == 'film') {echo "active";}
            ?>">
                <a href="<?= base_url('film')?>">
                    <i class="fas fa-fw fa-film"></i>
                    <p>Film</p>
                </a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(1) == 'country') {echo "active";}
            ?>">
                <a href="<?= base_url('country')?>">
                    <i class="fas fa-fw fa-globe"></i>
                    <p>Country</p>
                </a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(1) == 'genre') {echo "active";}
            ?>">
                <a href="<?= base_url('genre')?>">
                    <i class="fab fa-fw fa-gratipay"></i>
                    <p>Genre</p>
                </a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(1) == 'type') {echo "active";}
            ?>">
                <a href="<?= base_url('type')?>">
                    <i class="fas fa-fw fa-check-circle"></i>
                    <p>Type</p>
                </a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(1) == 'status') {echo "active";}
            ?>">
                <a href="<?= base_url('status')?>">
                    <i class="fas fa-fw fa-info"></i>
                    <p>Status</p>
                </a>
            </li>
        </ul>
    </div>
</div>