<?php $this->assign('title', __('Dashboard')) ?>
<style>
    .box-shadow {
        box-shadow: #f889a8 0px 0px 10px 4px;
    }
</style>
<div class="g-bg-lightblue-v10-opacity-0_5 g-pa-20">
    
        <div class="row">
            <div class="col-sm-6 col-lg-6 col-xl-3 g-mb-30">
                <!-- Panel -->
                <div class="card h-100 g-brd-gray-light-v7 u-card-v1 g-rounded-3">
                    <div class="card-block g-font-weight-300 g-pa-20">
                        <div class="media">
                            <div class="d-flex g-mr-15">
                                <div
                                    class="u-header-dropdown-icon-v1 g-pos-rel g-width-60 g-height-60 g-bg-lightblue-v4 g-font-size-18 g-font-size-24--md g-color-white rounded-circle">
                                    <i class="hs-admin-user g-absolute-centered"></i>
                                </div>
                            </div>
                            
                            <div class="media-body align-self-center">
                                <div class="d-flex align-items-center g-mb-5">
                                <span
                                    class="g-font-size-24 g-line-height-1 g-color-black"><?= $totalActivities ?> </span>
                                </div>
                                
                                <h6 class="g-font-size-16 g-font-weight-300 g-color-gray-dark-v6 mb-0">Total
                                    Activities</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Panel -->
            </div>
            
            <div class="col-sm-6 col-lg-6 col-xl-3 g-mb-30">
                <!-- Panel -->
                <div class="card h-100 g-brd-gray-light-v7 u-card-v1 g-rounded-3">
                    <div class="card-block g-font-weight-300 g-pa-20">
                        <div class="media">
                            <div class="d-flex g-mr-15">
                                <div
                                    class="u-header-dropdown-icon-v1 g-pos-rel g-width-60 g-height-60 g-bg-teal-v2 g-font-size-18 g-font-size-24--md g-color-white rounded-circle">
                                    <i class="hs-admin-check-box g-absolute-centered"></i>
                                </div>
                            </div>
                            
                            <div class="media-body align-self-center">
                                <div class="d-flex align-items-center g-mb-5">
                                <span
                                    class="g-font-size-24 g-line-height-1 g-color-black"><?= $processedActivities ?> </span>
                                </div>
                                
                                <h6 class="g-font-size-16 g-font-weight-300 g-color-gray-dark-v6 mb-0">Processed
                                    Activities</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Panel -->
            </div>
            
            <div class="col-sm-6 col-lg-6 col-xl-3 g-mb-30">
                <!-- Panel -->
                <div class="card h-100 g-brd-gray-light-v7 u-card-v1 g-rounded-3">
                    <div class="card-block g-font-weight-300 g-pa-20">
                        <div class="media">
                            <div class="d-flex g-mr-15">
                                <div
                                    class="u-header-dropdown-icon-v1 g-pos-rel g-width-60 g-height-60 g-bg-darkblue-v2 g-font-size-18 g-font-size-24--md g-color-white rounded-circle">
                                    <i class="hs-admin-comment g-absolute-centered"></i>
                                </div>
                            </div>
                            
                            <div class="media-body align-self-center">
                                <div class="d-flex align-items-center g-mb-5">
                                <span
                                    class="g-font-size-24 g-line-height-1 g-color-black"><?= $pendingActivities ?></span>
                                </div>
                                
                                <h6 class="g-font-size-16 g-font-weight-300 g-color-gray-dark-v6 mb-0">Pending
                                    Activities</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Panel -->
            </div>
            
            <div class="col-sm-6 col-lg-6 col-xl-3 g-mb-30">
                <!-- Panel -->
                <div class="card h-100 g-brd-gray-light-v7 u-card-v1 g-rounded-3">
                    <div class="card-block g-font-weight-300 g-pa-20">
                        <div class="media">
                            <div class="d-flex g-mr-15">
                                <div
                                    class="u-header-dropdown-icon-v1 g-pos-rel g-width-60 g-height-60 g-bg-lightred-v2 g-font-size-18 g-font-size-24--md g-color-white rounded-circle">
                                    <i class="hs-admin-wallet g-absolute-centered"></i>
                                </div>
                            </div>
                            
                            <div class="media-body align-self-center">
                                <div class="d-flex align-items-center g-mb-5">
                                <span
                                    class="g-font-size-24 g-line-height-1 g-color-black"><?= $totalEarning ?></span>
                                </div>
                                
                                <h6 class="g-font-size-16 g-font-weight-300 g-color-gray-dark-v6 mb-0">Total
                                    Earning</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Panel -->
            </div>
        </div>
        <h3 class="g-font-weight-300 g-font-size-28 g-color-black g-mb-30">
            <?= __('Earning Stats') ?> - <?= $authUser['first_name'] . " " . $authUser['last_name'] ?>
        </h3>
        
        <div class="faqs table-responsive g-mb-40">
            <table cellpadding="0" cellspacing="0" class="table table-bordered table-hover u-table--v4 g-color-black">
                <tr>
                    <th scope="col" class="text-center">Activity Type</th>
                    <th scope="col" class="text-center">Activity Count</th>
                    <th scope="col" class="text-center">Activity Earning/Penalty</th>
                </tr>
                <?php foreach ($activityStats as $activityStat) { ?>
                    <tr>
                        <td scope="col" class="text-center"><?= $activityStat['type'] ?></td>
                        <td scope="col" class="text-center"><?= $activityStat['count'] ?></td>
                        <td scope="col" class="text-center"><?= $activityStat['money'] ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    
    <!-- Statistic Card -->
    <div class="row">
        <div class="col-xl-12"></div>
    </div>
</div>




