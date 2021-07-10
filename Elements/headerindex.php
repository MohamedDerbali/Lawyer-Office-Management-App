
<aside class="main-sidebar sidebar-dark-primary elevation-4" >
    <!-- Brand Logo -->

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <img src="dist/img/smartlawyer-white.png" style="width: 100%;height: 15%;"></span>
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="image">
                <img src="dist/img/smartlawyer-white.png" class="img-circle elevation-2" alt="User Image">
                <span class="logo-lg" style="height: 90%;">

            </div>
            <div class="info">
                <a href="calendrier/calendrier.php" class="d-block">الأستاذ أسامة ذياب </a>

            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="calendrier/calendrier.php" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>  المذكرة
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php" class="nav-link">
                        <i class="nav-icon fas fa-th"> </i>
                        <p>  لوحة التحكم
                        </p>
                    </a>
                </li>
                <?php  if  ($_SESSION['role'] == 'Admin') {
                    ?>
                    <li class="nav-item">
                        <a href="Client/AfficheClient.php" class="nav-link">
                            <i class="fa fa-users"> </i>
                            <p>قائمة الحرفاء
                            </p>
                        </a>
                    </li>

                <?php }
                ?>
                <li class="nav-item">

                    <a href="contentieux/AfficherContentieux.php" class="nav-link">

                        <i class="nav-icon fas fa-book"></i>
                        <p> القضايا

                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                </li>
                <?php
                ?>
                <li class="nav-item">

                    <a href="contentieux/AfficherContentieux.php" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p> الاستشارات

                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                </li>
                <?php
                ?>
                <li class="nav-item">

                    <a href="contentieux/AfficherContentieux.php" class="nav-link">

                        <i class="nav-icon fas fa-book"></i>
                        <p> العقود

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <?php                 if  ($_SESSION['role'] == 'Admin') {
                    ?>
                    <a href="Agent/mission.php" class="nav-link">

                        <i class="nav-icon fas fa-book"></i>
                        <p> مهام خارج المكتب

                        </p>
                    </a>
                </li> <?php
            }
            ?>
                <li class="nav-item">

                    <a href="Agent/AfficheMission.php" class="nav-link">

                        <i class="nav-icon fas fa-book"></i>
                        <p> إظهار المهام

                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-landmark"></i>
                        <p>محاكم القضاء العدلي
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="Tribual/AfficheTribualtakib.php" class="nav-link">
                                <i class="fas fa-balance-scale"></i>
                                <p>محكمة التعقيب</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="Tribual/AfficheTribualistenef.php" class="nav-link">
                                <i class="fas fa-balance-scale"></i>
                                <p>محاكم الإستئناف</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="Tribual/AfficheTribualibtidaya.php" class="nav-link">
                                <i class="fas fa-balance-scale"></i>
                                <p>المحاكم الابتدائية</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../Tribual/AfficheTribualnawahi.php" class="nav-link">
                                <i class="fas fa-balance-scale"></i>
                                <p>محاكم النواحي  </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="Tribual/AfficheTribualakariya.php" class="nav-link">
                                <i class="fas fa-balance-scale"></i>
                                <p>
                                    المحكمة العقارية   </p>
                            </a>
                        </li>
                    </ul>

                </li>
                </li>
                <li class="nav-item">
                    <a href="Client/AfficheColleugues.php" class="nav-link">
                        <i class="fas fa-graduation-cap"></i>
                        <p>
                            جدول المحامين
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="Client/AfficheColleugues1.php" class="nav-link">
                        <i class="fas fa-graduation-cap"></i>
                        <p>
                            جدول المحامين المباشرين

                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                </li>
                <?php
                ?>
                <?php                 if  ($_SESSION['role'] == 'Admin') {
                    ?>
                    <li class="nav-item has-treeview">
                        <a href="Agent/AfficheAgent.php" class="nav-link">
                            <i class="fas fa-user-graduate"></i>
                            <p>قائمة الكتبة</p>
                        </a>
                    </li>

                <?php }
                ?>
                <li class="nav-header">الخصائص   والاعدادت </li>


                <li class="nav-item">
                    <?php                 if  ($_SESSION['role'] == 'Admin') {
                    ?>
                <li class="nav-item">
                    <a href="Tribual/AddTribuale.php" class="nav-link">
                        <i class="fas fa-landmark"></i>
                        <p>إضافة محكمة</p>
                    </a>
                </li>
                <a href="Tribual/AddTribuale.php" class="nav-link">
                    <?php }
                    else{
                    ?>
                    <li class="nav-item">
                        <a href="contentieux/FormulaireGlobalAgent.php" class="nav-link">
                            <?php
                            }
                            ?>
                            <i class="nav-icon fas fa-book"></i>
                            <p> إضافة قضية  </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="Agent/addagent.php" class="nav-link">
                            <i class="fas fa-user-graduate"></i>
                            <p>إضافة كاتب</p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-envelope"></i>
                            <p>
                                Mailbox
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="mailbox/mailbox.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Inbox</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="mailbox/compose.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Echange</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="mailbox/read-mail.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Read</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="Elements/Deconnection.php" class="nav-link">
                            <i class="nav-icon far fa-calendar-alt"></i>
                            <p>
                                الخروج
                                <span class="badge badge-info right"></span>
                            </p>
                        </a>
                    </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

