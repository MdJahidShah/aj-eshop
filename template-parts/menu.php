   <nav class="navbar navbar-expand-lg navbar-dark w-100">
        <div class='container-fluid customnavmenu'>
            <div class="d-flex flex-wrap flex-grow-1 align-items-center nav-color">
                <!-- Logo -->
                <div>
                    <div class="home-icon">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span class="dashicons dashicons-admin-home"></span></a>
                    </div>
                </div>


                <!-- Toggle Button for Mobile -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <label class="css-toggle-wrapper">
                        <i class="bi bi-list"></i>
                    </label>
                </button>

                <!-- Collapsible Menu -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="d-flex flex-wrap flex-grow-1 align-items-center nav-color justify-content-center">
                        <!-- Menu -->
                        <?php
                            if (has_nav_menu('primary')) {
                                wp_nav_menu(array(
                                    'theme_location' => 'primary',
                                    'menu_class' => 'navbar-nav ms-auto',
                                    'container' => false,
                                    'depth' => 3,
                                    'walker' => new WP_Bootstrap_Navwalker(),
                                    'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                                ));
                            }
                        ?>

                        <!-- Search -->
                        <div class="nav-item nav-search" style="display: none;">
                            <a class="nav-link" href="#" id="searchIcon">
                                <i class="bi bi-search"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>