<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('page-script'); ?>
    <script src="<?php echo e(secure_asset('assets/js/pages-account-settings-account.js')); ?>">
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-style2 mb-2">
        <li class="breadcrumb-item">
          <a href="<?php echo e(secure_url('/')); ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?php echo e(route('user-management')); ?>">User Management</a>
        </li>
        <li class="breadcrumb-item active">User Profile</li>
      </ol>
    </nav>


    <!-- Header -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="user-profile-header-banner">
                    <img src="../../assets/img/backgrounds/profile-banner.png" alt="Banner image" class="rounded-top">
                </div>
                <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                    <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                        <img src="<?php echo e(secure_asset($user->picture)); ?>" alt="<?php echo e($user->firstName); ?> <?php echo e($user->lastName); ?>"
                            class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
                    </div>
                    <div class="flex-grow-1 mt-3 mt-sm-5">
                        <div
                            class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                            <div class="user-profile-info">
                                <h4><?php echo e($user->firstName); ?> <?php echo e($user->lastName); ?></h4>
                                <ul
                                    class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                    <li class="list-inline-item fw-semibold">
                                      <i class='bx bxs-briefcase-alt-2'></i> <?php echo e($user->role); ?>

                                    </li>
                                    <li class="list-inline-item fw-semibold">
                                        <i class='bx bx-map'></i> Vila Nova de Gaia
                                    </li>
                                    <li class="list-inline-item fw-semibold">
                                        <i class='bx bx-calendar-alt'></i> Joined April 2021
                                    </li>
                                </ul>
                            </div>
                  <!-- Admin action buttons -->
                  <div class="col-md-6">
                    <div class="mt-3">
                      <div class="btn-group" role="group" aria-label="Basic example">

                          
                          <?php $__env->startComponent('content.management.edit-user', ['user' => $user]); ?>
                          <?php echo $__env->renderComponent(); ?>


                          
                          <a class="btn btn-secondary btn-action" href="#" onclick="document.getElementById('forcepasswordreset-form-<?php echo e($user->id); ?>');">
                            <!-- Form code -->
                            <form method="POST" action="<?php echo e(route('users.forcePasswordReset', ['user' => $user->id])); ?>" id="forcepasswordreset-form-<?php echo e($user->id); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <button type="submit" class="dropdown-item" data-bs-toggle="tooltip"
                                    data-bs-original-title="<?php if($user->force_password_reset == 0): ?> Force password reset <?php else: ?> Already forced! <?php endif; ?>"
                                    aria-describedby="tooltip674202" onclick="confirmpasswordReset(event)">
                                    <?php if($user->force_password_reset == 0): ?>
                                        <i class="bx bx-lock me-1"></i>  Password reset
                                    <?php else: ?>
                                        <i class="bx bxs-log-in-circle"></i> Reset forced!
                                    <?php endif; ?>
                                </button>
                                <input type="hidden" name="ativo" value="0">
                            </form>
                            <!-- End of form code -->
                          </a>

                          
                          <a href="#" onclick="event.preventDefault();
                            if(confirm('Are you sure you want to <?php if($user->ativo == 1): ?>block <?php else: ?> unblock <?php endif; ?> this user?')) {
                              document.getElementById('block-form-<?php echo e($user->id); ?>').submit();
                            }" class="btn <?php if($user->ativo == 1): ?> btn-warning <?php else: ?> btn-success <?php endif; ?>" data-bs-toggle="tooltip" data-bs-original-title="<?php if($user->ativo == 1): ?> Block user <?php else: ?> Unblock User <?php endif; ?>" aria-describedby="tooltip674202">
                              <?php if($user->ativo == 1): ?>
                                <i class="bx bx-block me-1"></i> Block
                              <?php else: ?>
                                <i class="bx bx-lock-open-alt me-1"></i> Unblock
                              <?php endif; ?>
                          </a>

                        </div>

                        
                        <a class="btn btn-danger btn-action" href="#" data-bs-toggle="tooltip" aria-label="Delete user" data-bs-original-title="Delete user" aria-describedby="tooltip674202" onclick="event.preventDefault(); if (confirm('Are you sure you want to delete <?php echo e($user->firstName); ?> <?php echo e($user->lastName); ?> ?')) { document.getElementById('delete-user-<?php echo e($user->id); ?>').submit(); }">
                          <i class="bx bx-trash me-1" title="Delete User"></i> Delete
                        </a>

                        
                        <form id="delete-user-<?php echo e($user->id); ?>" action="<?php echo e(route('user-management.destroy', $user->id)); ?>" method="POST" style="display: none;">
                          <?php echo csrf_field(); ?>
                          <?php echo method_field('DELETE'); ?>
                        </form>


                        
                        <form method="POST" action="<?php echo e(route('users.block', ['user' => $user->id])); ?>" id="block-form-<?php echo e($user->id); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <input type="hidden" name="ativo" value="0">
                        </form>
                        </div>
                      </div>
                    <!-- /Admin action buttons -->
                </div>
            </div>
        </div>
    </div>
    <!--/ Header -->

    <!-- Navbar pills -->
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-sm-row mb-4">
                <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class='bx bx-user me-1'></i>
                        Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class='bx bx-group me-1'></i> Stats</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class='bx bx-grid-alt me-1'></i> Assessements</a>
                </li>
            </ul>
        </div>
    </div>
    <!--/ Navbar pills -->

    <!-- User Profile Content -->
    <div class="row">
        <div class="col-xl-4 col-lg-5 col-md-5">
            <!-- About User -->
            <div class="card mb-4">
                <div class="card-body">
                    <small class="text-muted text-uppercase">About</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="d-flex align-items-center mb-3"><i class="bx bxs-user"></i><span
                                class="fw-semibold mx-2">Name:</span> <span><?php echo e($user->firstName); ?>

                                <?php echo e($user->lastName); ?></span></li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bxs-ghost"></i><span
                                class="fw-semibold mx-2">Sigla:</span> <span><?php echo e($user->sigla); ?>

                                </span></li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-check"></i><span
                                class="fw-semibold mx-2">Status:</span>
                            <?php if(!$user->ativo): ?>
                                <span class="badge bg-label-dark me-1">Blocked 🚫</span>
                            <?php else: ?>
                                <span class="badge bg-label-success me-1">Active</span>
                            <?php endif; ?>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bxs-id-card"></i><span
                                class="fw-semibold mx-2">Permissions:</span>
                                 <span> <?php if($user->admin == 2): ?>
                                  <span class="badge bg-label-warning me-1">Admin</span>
                                        <?php elseif($user->admin == 1): ?>
                                  <span class="badge bg-label-info me-1">Manager</span>
                                        <?php else: ?>
                                  <span class="badge bg-label-primary">Pentester</span>
                                        <?php endif; ?></span>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bxs-briefcase-alt-2"></i><span
                                class="fw-semibold mx-2">Role:</span> <span><?php echo e($user->role); ?></span></li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bxs-flag"></i><span
                                class="fw-semibold mx-2">Country:</span> <span>Portugal</span></li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bxs-detail"></i><span
                                class="fw-semibold mx-2">Languages:</span> <span>English</span></li>
                    </ul>
                    <small class="text-muted text-uppercase">Contacts</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="d-flex align-items-center mb-3"><i class="bx bxs-phone"></i><span
                                class="fw-semibold mx-2">Contact:</span> <span><?php echo e($user->phone); ?></span></li>
                        <li class="d-flex align-items-center mb-3"><i class='bx bxl-microsoft-teams' ></i><span
                                class="fw-semibold mx-2">Teams:</span>
                            <span><?php echo e($user->firstName); ?>&commat;roboyo.pt</span></li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bxs-envelope"></i><span
                                class="fw-semibold mx-2">Email:</span> <span><?php echo e($user->email); ?></span></li>
                    </ul>
                    <small class="text-muted text-uppercase">Teams</small>
                    <ul class="list-unstyled mt-3 mb-0">
                        <li class="d-flex align-items-center mb-3"><i class="bx bxl-github text-primary me-2"></i>
                            <div class="d-flex flex-wrap"><span class="fw-semibold me-2">Pentesting Red
                                    Team</span><span>(6 Members)</span></div>
                        </li>
                        <li class="d-flex align-items-center"><i class="bx bxl-php text-danger me-2"></i>
                            <div class="d-flex flex-wrap"><span class="fw-semibold me-2">Laravel Developer</span><span>(18
                                    Members)</span></div>
                        </li>
                    </ul>
                </div>
            </div>
            <!--/ About User -->
        </div>
        <div class="col-xl-8 col-lg-7 col-md-7">
            <!-- Activity Timeline -->
            <div class="card card-action mb-4">
                <div class="card-header align-items-center">
                    <h5 class="card-action-title mb-0"><i class='bx bx-list-ul me-2'></i>Activity Timeline</h5>
                    <div class="card-action-element">
                        <div class="dropdown">
                            <button type="button" class="btn dropdown-toggle hide-arrow p-0" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="javascript:void(0);">Share timeline</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">Suggest edits</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="javascript:void(0);">Report bug</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="timeline ms-2">
                        <li class="timeline-item timeline-item-transparent">
                            <span class="timeline-point timeline-point-warning"></span>
                            <div class="timeline-event">
                                <div class="timeline-header mb-1">
                                    <h6 class="mb-0">Client Meeting</h6>
                                    <small class="text-muted">Today</small>
                                </div>
                                <p class="mb-2">Project meeting with john @10:15am</p>
                                <div class="d-flex flex-wrap">
                                    <div class="avatar me-3">
                                        <img src="../../assets/img/avatars/3.png" alt="Avatar"
                                            class="rounded-circle" />
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Lester McCarthy (Client)</h6>
                                        <span>CEO of Infibeam</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-item timeline-item-transparent">
                            <span class="timeline-point timeline-point-info"></span>
                            <div class="timeline-event">
                                <div class="timeline-header mb-1">
                                    <h6 class="mb-0">Create a new project for client</h6>
                                    <small class="text-muted">2 Day Ago</small>
                                </div>
                                <p class="mb-0">Add files to new design folder</p>
                            </div>
                        </li>
                        <li class="timeline-item timeline-item-transparent">
                            <span class="timeline-point timeline-point-primary"></span>
                            <div class="timeline-event">
                                <div class="timeline-header mb-1">
                                    <h6 class="mb-0">Shared 2 New Project Files</h6>
                                    <small class="text-muted">6 Day Ago</small>
                                </div>
                                <p class="mb-2">Sent by Mollie Dixon <img src="../../assets/img/avatars/4.png"
                                        class="rounded-circle ms-3" alt="avatar" height="20" width="20"></p>
                                <div class="d-flex flex-wrap gap-2">
                                    <a href="javascript:void(0)" class="me-3">
                                        <img src="../../assets/img/icons/misc/pdf.png" alt="Document image"
                                            width="20" class="me-2">
                                        <span class="h6">App Guidelines</span>
                                    </a>
                                    <a href="javascript:void(0)">
                                        <img src="../../assets/img/icons/misc/doc.png" alt="Excel image" width="20"
                                            class="me-2">
                                        <span class="h6">Testing Results</span>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-item timeline-item-transparent">
                            <span class="timeline-point timeline-point-success"></span>
                            <div class="timeline-event pb-0">
                                <div class="timeline-header mb-1">
                                    <h6 class="mb-0">Project status updated</h6>
                                    <small class="text-muted">10 Day Ago</small>
                                </div>
                                <p class="mb-0">Woocommerce iOS App Completed</p>
                            </div>
                        </li>
                        <li class="timeline-end-indicator">
                            <i class="bx bx-check-circle"></i>
                        </li>
                    </ul>
                </div>
            </div>
            <!--/ Activity Timeline -->

            <!-- Projects table -->
            <div class="card mb-4">
                <div class="card-datatable table-responsive">
                    <table class="datatables-projects border-top table">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                          <div class="card-header pb-0 pt-sm-0 d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Projects</h5>
                            <div id="DataTables_Table_0_filter" class="dataTables_filter mb-1">
                              <label class="mb-1">Search:<input type="search" class="form-control" placeholder="" aria-controls="DataTables_Table_0"></label>
                                    </div>
                                </div>
                            </div>
                            <table class="datatables-projects border-top table dataTable no-footer dtr-column collapsed"
                                id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 685px;">
                                <thead>
                                    <tr>
                                        <th class="control sorting_disabled" rowspan="1" colspan="1"
                                            style="width: 0px;" aria-label="">
                                        </th>
                                        <th class="sorting" tabindex="0"
                                            aria-controls="DataTables_Table_1" rowspan="1" colspan="1"
                                            style="width: 174px;" aria-label="Name: activate to sort column ascending"
                                            aria-sort="descending">Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1"
                                            rowspan="1" colspan="1" style="width: 62px;"
                                            aria-label="Leader: activate to sort column ascending">
                                            Leader</th>
                                        <th class="sorting" rowspan="1" colspan="1" style="width: 58px;"
                                            aria-label="Team">Team
                                        </th>
                                        <th class="w-px-200 sorting" tabindex="0" aria-controls="DataTables_Table_1"
                                            rowspan="1" colspan="1" style="width: 107px;"
                                            aria-label="Status: activate to sort column ascending">Status</th>
                                        <th class="sorting_disabled dtr-hidden" rowspan="1" colspan="1"
                                            style="width: 0px; display: none;" aria-label="Actions">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd">
                                        <td class="control" tabindex="0" style="">
                                        </td>
                                        <td class="sorting_1">
                                            <div class="d-flex justify-content-left align-items-center">
                                                <div class="avatar-wrapper">
                                                    <div class="avatar me-2">
                                                        <span
                                                            class="avatar-initial rounded-circle bg-label-danger">WS</span>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-column">
                                                    <span class="text-truncate fw-bold">Website SEO</span>
                                                    <small class="text-truncate text-muted">10 May 2021</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Eileen</td>
                                        <td>
                                            <div class="d-flex align-items-center avatar-group">
                                                <div class="avatar avatar-xs">
                                                    <img src="../../assets/img/avatars/10.png" alt="Avatar"
                                                        class="rounded-circle pull-up">
                                                </div>
                                                <div class="avatar avatar-xs"><img src="../../assets/img/avatars/3.png"
                                                        alt="Avatar" class="rounded-circle pull-up"></div>
                                                <div class="avatar avatar-xs"><img src="../../assets/img/avatars/2.png"
                                                        alt="Avatar" class="rounded-circle pull-up"></div>
                                                <div class="avatar avatar-xs"><img src="../../assets/img/avatars/8.png"
                                                        alt="Avatar" class="rounded-circle pull-up"></div>
                                            </div>
                                        </td>
                                        <td class="" style="">
                                            <div class="d-flex align-items-center">
                                                <div class="progress w-100 me-3" style="height: 6px;">
                                                    <div class="progress-bar" style="width: 38%" aria-valuenow="38%"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div><span>38%</span>
                                            </div>
                                        </td>
                                        <td class="dtr-hidden" style="display: none;">
                                            <div class="d-inline-block"><a href="javascript:;"
                                                    class="btn btn-sm btn-icon dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown"><i
                                                        class="bx bx-dots-vertical-rounded"></i></a>
                                                <div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;"
                                                        class="dropdown-item">Details</a><a href="javascript:;"
                                                        class="dropdown-item">Archive</a>
                                                    <div class="dropdown-divider"></div><a href="javascript:;"
                                                        class="dropdown-item text-danger delete-record">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td class="control" tabindex="0" style=""></td>
                                        <td class="sorting_1">
                                            <div class="d-flex justify-content-left align-items-center">
                                                <div class="avatar-wrapper">
                                                    <div class="avatar me-2"><img
                                                            src="../../assets/img/icons/brands/roboyo_R_12.jpg"
                                                            alt="Avatar" class="rounded-circle"></div>
                                                </div>
                                                <div class="d-flex flex-column"><span class="text-truncate fw-bold">Social
                                                        Banners</span><small class="text-truncate text-muted">03 Jan
                                                        2021</small></div>
                                            </div>
                                        </td>
                                        <td>Owen</td>
                                        <td>
                                            <div class="d-flex align-items-center avatar-group">
                                                <div class="avatar avatar-xs"><img src="../../assets/img/avatars/11.png"
                                                        alt="Avatar" class="rounded-circle pull-up"></div>
                                                <div class="avatar avatar-xs"><img src="../../assets/img/avatars/10.png"
                                                        alt="Avatar" class="rounded-circle pull-up"></div>
                                            </div>
                                        </td>
                                        <td class="" style="">
                                            <div class="d-flex align-items-center">
                                                <div class="progress w-100 me-3" style="height: 6px;">
                                                    <div class="progress-bar" style="width: 45%" aria-valuenow="45%"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div><span>45%</span>
                                            </div>
                                        </td>
                                        <td class="dtr-hidden" style="display: none;">
                                            <div class="d-inline-block"><a href="javascript:;"
                                                    class="btn btn-sm btn-icon dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown"><i
                                                        class="bx bx-dots-vertical-rounded"></i></a>
                                                <div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;"
                                                        class="dropdown-item">Details</a><a href="javascript:;"
                                                        class="dropdown-item">Archive</a>
                                                    <div class="dropdown-divider"></div><a href="javascript:;"
                                                        class="dropdown-item text-danger delete-record">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="odd">
                                        <td class="control" tabindex="0" style=""></td>
                                        <td class="sorting_1">
                                            <div class="d-flex justify-content-left align-items-center">
                                                <div class="avatar-wrapper">
                                                    <div class="avatar me-2"><img
                                                            src="../../assets/img/icons/brands/roboyo_R_12.jpg"
                                                            alt="Avatar" class="rounded-circle"></div>
                                                </div>
                                                <div class="d-flex flex-column"><span class="text-truncate fw-bold">Logo
                                                        Designs</span><small class="text-truncate text-muted">12 Aug
                                                        2021</small></div>
                                            </div>
                                        </td>
                                        <td>Keith</td>
                                        <td>
                                            <div class="d-flex align-items-center avatar-group">
                                                <div class="avatar avatar-xs"><img src="../../assets/img/avatars/5.png"
                                                        alt="Avatar" class="rounded-circle pull-up"></div>
                                                <div class="avatar avatar-xs"><img src="../../assets/img/avatars/7.png"
                                                        alt="Avatar" class="rounded-circle pull-up"></div>
                                                <div class="avatar avatar-xs"><img src="../../assets/img/avatars/12.png"
                                                        alt="Avatar" class="rounded-circle pull-up"></div>
                                                <div class="avatar avatar-xs"><img src="../../assets/img/avatars/4.png"
                                                        alt="Avatar" class="rounded-circle pull-up"></div>
                                            </div>
                                        </td>
                                        <td class="" style="">
                                            <div class="d-flex align-items-center">
                                                <div class="progress w-100 me-3" style="height: 6px;">
                                                    <div class="progress-bar" style="width: 92%" aria-valuenow="92%"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div><span>92%</span>
                                            </div>
                                        </td>
                                        <td class="dtr-hidden" style="display: none;">
                                            <div class="d-inline-block"><a href="javascript:;"
                                                    class="btn btn-sm btn-icon dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown"><i
                                                        class="bx bx-dots-vertical-rounded"></i></a>
                                                <div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;"
                                                        class="dropdown-item">Details</a><a href="javascript:;"
                                                        class="dropdown-item">Archive</a>
                                                    <div class="dropdown-divider"></div><a href="javascript:;"
                                                        class="dropdown-item text-danger delete-record">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td class="control" tabindex="0" style=""></td>
                                        <td class="sorting_1">
                                            <div class="d-flex justify-content-left align-items-center">
                                                <div class="avatar-wrapper">
                                                    <div class="avatar me-2"><img
                                                            src="../../assets/img/icons/brands/roboyo_R_12.jpg"
                                                            alt="Avatar" class="rounded-circle"></div>
                                                </div>
                                                <div class="d-flex flex-column"><span class="text-truncate fw-bold">IOS
                                                        App Design</span><small class="text-truncate text-muted">19 Apr
                                                        2021</small></div>
                                            </div>
                                        </td>
                                        <td>Merline</td>
                                        <td>
                                            <div class="d-flex align-items-center avatar-group">
                                                <div class="avatar avatar-xs"><img src="../../assets/img/avatars/2.png"
                                                        alt="Avatar" class="rounded-circle pull-up"></div>
                                                <div class="avatar avatar-xs"><img src="../../assets/img/avatars/8.png"
                                                        alt="Avatar" class="rounded-circle pull-up"></div>
                                                <div class="avatar avatar-xs"><img src="../../assets/img/avatars/5.png"
                                                        alt="Avatar" class="rounded-circle pull-up"></div>
                                                <div class="avatar avatar-xs"><img src="../../assets/img/avatars/1.png"
                                                        alt="Avatar" class="rounded-circle pull-up"></div>
                                            </div>
                                        </td>
                                        <td class="" style="">
                                            <div class="d-flex align-items-center">
                                                <div class="progress w-100 me-3" style="height: 6px;">
                                                    <div class="progress-bar" style="width: 56%" aria-valuenow="56%"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div><span>56%</span>
                                            </div>
                                        </td>
                                        <td class="dtr-hidden" style="display: none;">
                                            <div class="d-inline-block"><a href="javascript:;"
                                                    class="btn btn-sm btn-icon dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown"><i
                                                        class="bx bx-dots-vertical-rounded"></i></a>
                                                <div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;"
                                                        class="dropdown-item">Details</a><a href="javascript:;"
                                                        class="dropdown-item">Archive</a>
                                                    <div class="dropdown-divider"></div><a href="javascript:;"
                                                        class="dropdown-item text-danger delete-record">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="odd">
                                        <td class="control" tabindex="0" style=""></td>
                                        <td class="sorting_1">
                                            <div class="d-flex justify-content-left align-items-center">
                                                <div class="avatar-wrapper">
                                                    <div class="avatar me-2"><img
                                                            src="../../assets/img/icons/brands/roboyo_R_12.jpg"
                                                            alt="Avatar" class="rounded-circle"></div>
                                                </div>
                                                <div class="d-flex flex-column"><span class="text-truncate fw-bold">Figma
                                                        Dashboards</span><small class="text-truncate text-muted">08 Apr
                                                        2021</small></div>
                                            </div>
                                        </td>
                                        <td>Harmonia</td>
                                        <td>
                                            <div class="d-flex align-items-center avatar-group">
                                                <div class="avatar avatar-xs"><img src="../../assets/img/avatars/9.png"
                                                        alt="Avatar" class="rounded-circle pull-up"></div>
                                                <div class="avatar avatar-xs"><img src="../../assets/img/avatars/2.png"
                                                        alt="Avatar" class="rounded-circle pull-up"></div>
                                                <div class="avatar avatar-xs"><img src="../../assets/img/avatars/4.png"
                                                        alt="Avatar" class="rounded-circle pull-up"></div>
                                            </div>
                                        </td>
                                        <td class="" style="">
                                            <div class="d-flex align-items-center">
                                                <div class="progress w-100 me-3" style="height: 6px;">
                                                    <div class="progress-bar" style="width: 25%" aria-valuenow="25%"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div><span>25%</span>
                                            </div>
                                        </td>
                                        <td class="dtr-hidden" style="display: none;">
                                            <div class="d-inline-block"><a href="javascript:;"
                                                    class="btn btn-sm btn-icon dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown"><i
                                                        class="bx bx-dots-vertical-rounded"></i></a>
                                                <div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;"
                                                        class="dropdown-item">Details</a><a href="javascript:;"
                                                        class="dropdown-item">Archive</a>
                                                    <div class="dropdown-divider"></div><a href="javascript:;"
                                                        class="dropdown-item text-danger delete-record">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td class="control" tabindex="0" style=""></td>
                                        <td class="sorting_1">
                                            <div class="d-flex justify-content-left align-items-center">
                                                <div class="avatar-wrapper">
                                                    <div class="avatar me-2"><img
                                                            src="../../assets/img/icons/brands/roboyo_R_12.jpg"
                                                            alt="Avatar" class="rounded-circle"></div>
                                                </div>
                                                <div class="d-flex flex-column"><span class="text-truncate fw-bold">Crypto
                                                        Admin</span><small class="text-truncate text-muted">29 Sept
                                                        2021</small></div>
                                            </div>
                                        </td>
                                        <td>Allyson</td>
                                        <td>
                                            <div class="d-flex align-items-center avatar-group">
                                                <div class="avatar avatar-xs"><img src="../../assets/img/avatars/7.png"
                                                        alt="Avatar" class="rounded-circle pull-up"></div>
                                                <div class="avatar avatar-xs"><img src="../../assets/img/avatars/3.png"
                                                        alt="Avatar" class="rounded-circle pull-up"></div>
                                                <div class="avatar avatar-xs"><img src="../../assets/img/avatars/7.png"
                                                        alt="Avatar" class="rounded-circle pull-up"></div>
                                                <div class="avatar avatar-xs"><img src="../../assets/img/avatars/2.png"
                                                        alt="Avatar" class="rounded-circle pull-up"></div>
                                            </div>
                                        </td>
                                        <td class="" style="">
                                            <div class="d-flex align-items-center">
                                                <div class="progress w-100 me-3" style="height: 6px;">
                                                    <div class="progress-bar" style="width: 36%" aria-valuenow="36%"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div><span>36%</span>
                                            </div>
                                        </td>
                                        <td class="dtr-hidden" style="display: none;">
                                            <div class="d-inline-block"><a href="javascript:;"
                                                    class="btn btn-sm btn-icon dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown"><i
                                                        class="bx bx-dots-vertical-rounded"></i></a>
                                                <div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;"
                                                        class="dropdown-item">Details</a><a href="javascript:;"
                                                        class="dropdown-item">Archive</a>
                                                    <div class="dropdown-divider"></div><a href="javascript:;"
                                                        class="dropdown-item text-danger delete-record">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="odd">
                                        <td class="control" tabindex="0" style=""></td>
                                        <td class="sorting_1">
                                            <div class="d-flex justify-content-left align-items-center">
                                                <div class="avatar-wrapper">
                                                    <div class="avatar me-2"><img
                                                            src="../../assets/img/icons/brands/roboyo_R_12.jpg"
                                                            alt="Avatar" class="rounded-circle"></div>
                                                </div>
                                                <div class="d-flex flex-column"><span class="text-truncate fw-bold">Create
                                                        Website</span><small class="text-truncate text-muted">20 Mar
                                                        2021</small></div>
                                            </div>
                                        </td>
                                        <td>Georgie</td>
                                        <td>
                                            <div class="d-flex align-items-center avatar-group">
                                                <div class="avatar avatar-xs"><img src="../../assets/img/avatars/2.png"
                                                        alt="Avatar" class="rounded-circle pull-up"></div>
                                                <div class="avatar avatar-xs"><img src="../../assets/img/avatars/6.png"
                                                        alt="Avatar" class="rounded-circle pull-up"></div>
                                                <div class="avatar avatar-xs"><img src="../../assets/img/avatars/5.png"
                                                        alt="Avatar" class="rounded-circle pull-up"></div>
                                                <div class="avatar avatar-xs"><img src="../../assets/img/avatars/3.png"
                                                        alt="Avatar" class="rounded-circle pull-up"></div>
                                            </div>
                                        </td>
                                        <td class="" style="">
                                            <div class="d-flex align-items-center">
                                                <div class="progress w-100 me-3" style="height: 6px;">
                                                    <div class="progress-bar" style="width: 72%" aria-valuenow="72%"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div><span>72%</span>
                                            </div>
                                        </td>
                                        <td class="dtr-hidden" style="display: none;">
                                            <div class="d-inline-block"><a href="javascript:;"
                                                    class="btn btn-sm btn-icon dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown"><i
                                                        class="bx bx-dots-vertical-rounded"></i></a>
                                                <div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;"
                                                        class="dropdown-item">Details</a><a href="javascript:;"
                                                        class="dropdown-item">Archive</a>
                                                    <div class="dropdown-divider"></div><a href="javascript:;"
                                                        class="dropdown-item text-danger delete-record">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row mx-2">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_info" id="DataTables_Table_0_info" role="status"
                                        aria-live="polite">Showing 1 to 7 of 10 entries</div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_paginate paging_simple_numbers"
                                        id="DataTables_Table_0_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button page-item previous disabled"
                                                id="DataTables_Table_0_previous"><a href="#"
                                                    aria-controls="DataTables_Table_0" data-dt-idx="previous"
                                                    tabindex="0" class="page-link">Previous</a></li>
                                            <li class="paginate_button page-item active"><a href="#"
                                                    aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0"
                                                    class="page-link">1</a></li>
                                            <li class="paginate_button page-item "><a href="#"
                                                    aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0"
                                                    class="page-link">2</a></li>
                                            <li class="paginate_button page-item next" id="DataTables_Table_0_next"><a
                                                    href="#" aria-controls="DataTables_Table_0" data-dt-idx="next"
                                                    tabindex="0" class="page-link">Next</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Projects table -->
                </div>
            </div>
            <!--/ User Profile Content -->
        </div>
        <!-- / Content -->
        <?php if($errors->any()): ?>
          <script>
              $(document).ready(function(){
                  $('#modalCenter').modal('show');
              });
          </script>
        <?php endif; ?>



    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/contentNavbarLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DanielOliveira\Desktop\Roboyo\roboyo_ngrok\resources\views/content/pages/pages-user-profile.blade.php ENDPATH**/ ?>