<div class="app-sidebar-menu">
                <div class="h-100" data-simplebar>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <div class="logo-box">
                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('backend/assets/images/logo-light.png') }}" alt="" height="24">
                                </span>
                            </a>
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('backend/assets/images/logo-dark.png') }}" alt="" height="24">
                                </span>
                            </a>
                        </div>

                        <ul id="side-menu">

                            <li class="menu-title">Menu</li>
                            <li>
                                <a href="{{ route('dashboard') }}" class="tp-link">
                                    <i data-feather="home"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li> 

                           
                
                            <!-- <li>
                                <a href="landing.html" target="_blank">
                                    <i data-feather="globe"></i>
                                    <span> Landing </span>
                                </a>
                            </li> -->

                            <li class="menu-title">Pages</li>

                            <li>
                                <a href="#sidebarAuth" data-bs-toggle="collapse">
                                    <i data-feather="users"></i>
                                    <span> Review Setup </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarAuth">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{route('all.review')}}" class="tp-link">All Review</a>
                                        </li>
                                        <li>
                                            <a href="{{route('add.review')}}" class="tp-link">Add Review</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#sidebarError" data-bs-toggle="collapse">
                                    <i data-feather="alert-octagon"></i>
                                    <span> Slider Setup </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarError">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{ route('get.slider') }}" class="tp-link">Get Slider</a>
                                        </li>
                                       
                                       
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#Team" data-bs-toggle="collapse">
                                    <i data-feather="users"></i>
                                    <span> Team Setup </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="Team">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{route('all.team')}}" class="tp-link">All Team</a>
                                        </li>
                                        <li>
                                            <a href="{{route('add.team')}}" class="tp-link">Add Team</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </li>

                             <li>
                                <a href="#Team" data-bs-toggle="collapse">
                                    <i data-feather="users"></i>
                                    <span> About Page Setup </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="Team">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{route('get.about.us')}}" class="tp-link">About Page</a>
                                        </li>
                                       
                                        
                                    </ul>
                                </div>
                            </li>

                            

                            <li>
                                <a href="#sidebarExpages" data-bs-toggle="collapse">
                                    <i data-feather="file-text"></i>
                                    <span> Utility </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarExpages">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="pages-starter.html" class="tp-link">Starter</a>
                                        </li>
                                        <li>
                                            <a href="pages-profile.html" class="tp-link">Profile</a>
                                        </li>
                                        <li>
                                            <a href="pages-pricing.html" class="tp-link">Pricing</a>
                                        </li>
                                        <li>
                                            <a href="pages-timeline.html" class="tp-link">Timeline</a>
                                        </li>
                                        <li>
                                            <a href="pages-invoice.html" class="tp-link">Invoice</a>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="calendar.html" class="tp-link">
                                    <i data-feather="calendar"></i>
                                    <span> Calendar </span>
                                </a>
                            </li>

                            <li class="menu-title mt-2">General</li>

                           <li>
    <a href="#BlogPost" data-bs-toggle="collapse">
        <i data-feather="alert-octagon"></i>
        <span> Blog Post Setup </span>
        <span class="menu-arrow"></span>
    </a>
    <div class="collapse" id="BlogPost">
        <ul class="nav-second-level">
            <li>
                <a href="{{ route('all.blog.post') }}"
                class="tp-link">All Blog Post </a>
            </li>
            <li>
                <a href="{{ route('add.blog.post') }}"
                class="tp-link">Add Blog Post </a>
            </li>
        </ul>
    </div>
</li>

                            <li>
                                <a href="#Blogcat" data-bs-toggle="collapse">
                                    <i data-feather="users"></i>
                                    <span> Blog Category Setup </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="Blogcat">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{route('all.blog.category')}}" class="tp-link">Blog Category</a>
                                        </li>
                                        
                                        
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="{{route('contact.all.message')}}" class="tp-link">
                                    <i data-feather="aperture"></i>
                                    <span> Contact Message </span>
                                </a>
                            </li>

                            <li>
                                <a href="#sidebarAdvancedUI" data-bs-toggle="collapse">
                                    <i data-feather="cpu"></i>
                                    <span> Extended UI </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarAdvancedUI">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="extended-carousel.html" class="tp-link">Carousel</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#sidebarIcons" data-bs-toggle="collapse">
                                    <i data-feather="award"></i>
                                    <span> Icons </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarIcons">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="icons-feather.html" class="tp-link">Feather Icons</a>
                                        </li>
                                        <li>
                                            <a href="icons-mdi.html" class="tp-link">Material Design Icons</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#sidebarForms" data-bs-toggle="collapse">
                                    <i data-feather="briefcase"></i>
                                    <span> Forms </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarForms">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="forms-elements.html" class="tp-link">General Elements</a>
                                        </li>
                                        <li>
                                            <a href="forms-validation.html" class="tp-link">Validation</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#sidebarTables" data-bs-toggle="collapse">
                                    <i data-feather="table"></i>
                                    <span> Tables </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarTables">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="tables-basic.html" class="tp-link">Basic Tables</a>
                                        </li>
                                        <li>
                                            <a href="tables-datatables.html" class="tp-link">Data Tables</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#sidebarCharts" data-bs-toggle="collapse">
                                    <i data-feather="pie-chart"></i>
                                    <span> Apex Charts </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarCharts">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href='charts-line.html'>Line</a>
                                        </li>
                                        <li>
                                            <a href='charts-area.html'>Area</a>
                                        </li>
                                        <li>
                                            <a href='charts-column.html'>Column</a>
                                        </li>
                                        <li>
                                            <a href='charts-bar.html'>Bar</a>
                                        </li>
                                        <li>
                                            <a href='charts-mixed.html'>Mixed</a>
                                        </li>
                                        <li>
                                            <a href='charts-timeline.html'>Timeline</a>
                                        </li>
                                        <li>
                                            <a href='charts-rangearea.html'>Range Area</a>
                                        </li>
                                        <li>
                                            <a href='charts-funnel.html'>Funnel</a>
                                        </li>
                                        <li>
                                            <a href='charts-candlestick.html'>Candlestick</a>
                                        </li>
                                        
                                        
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#sidebarMaps" data-bs-toggle="collapse">
                                    <i data-feather="map"></i>
                                    <span> Maps </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarMaps">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="maps-google.html" class="tp-link">Google Maps</a>
                                        </li>
                                        <li>
                                            <a href="maps-vector.html" class="tp-link">Vector Maps</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                        </ul>
            
                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
            </div> 