<?php $__env->startSection('title', __('Invoices')); ?>

<?php $__env->startSection('content'); ?>
    <div class="mb-3 h4">
        <?php echo app('translator')->get('Invoices'); ?>
    </div>

    <div class="row">
        <div class="col-md-4 mb-3 d-flex align-items-stretch">
            <div class="card w-100 clickable-cell border-0 rounded-3 shadow-sm">
                <div class="card-body text-center">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" style="width: 7rem;height:7rem;">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25M9 16.5v.75m3-3v3M15 12v5.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>

                    <h3><?php echo app('translator')->get('Stats'); ?></h3>
                    <a href="#" class="stretched-link" data-bs-toggle="modal" data-bs-target="#statesModal"></a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3 d-flex align-items-stretch">
            <div class="card w-100 clickable-cell border-0 rounded-3 shadow-sm">
                <div class="card-body text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" style="width: 7rem;height:7rem;">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                    </svg>


                    <h3><?php echo app('translator')->get('Analytics'); ?></h3>
                    <a href="<?php echo e(route('orders.analytics')); ?>" class="stretched-link"></a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3 d-flex align-items-stretch">
            <div class="card w-100 clickable-cell border-0 rounded-3 shadow-sm">
                <div class="card-body text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" style="width: 7rem;height:7rem;">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                    <h3><?php echo app('translator')->get('Sales'); ?></h3>
                    <a href="<?php echo e(route('sales.index')); ?>" class="stretched-link"></a>
                </div>
            </div>
        </div>
    </div>



    <div class="modal" id="statesModal" tabindex="-1" aria-labelledby="statesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="statesModalLabel">
                        <span class="me-2"> <?php echo app('translator')->get('Stats'); ?></span>
                        <a  href="<?php echo e(route('orders.print.stats')); ?>" class="btn btn-primary btn-sm" target="_blank">
                            <i class="bi bi-printer me-2"></i> <?php echo app('translator')->get('Print'); ?>
                        </a>
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card w-100 mb-3">
                        <div class="card-body">
                            <div class=" table-responsive">
                                <table class="table table-bordered mb-0">
                                    <tr>
                                        <td><?php echo app('translator')->get('Invoices'); ?></td>
                                        <td><?php echo e($totalOrders); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo app('translator')->get('Cost'); ?></td>
                                        <td><?php echo e($totalCost); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo app('translator')->get('Sales'); ?></td>
                                        <td><?php echo e($totalSold); ?></td>
                                    </tr>
                                    <tr class=" alert-success">
                                        <td><?php echo app('translator')->get('Profit'); ?></td>
                                        <td><?php echo e($totalProfit); ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card w-100 mb-3">
                        <div class="card-body">
                            <div class="card-title h5"><?php echo app('translator')->get('Today'); ?> (<?php echo e(date('j F')); ?>)</div>
                            <div class=" table-responsive">
                                <table class="table table-bordered mb-0">
                                    <tr>
                                        <td><?php echo app('translator')->get('Invoices'); ?></td>
                                        <td><?php echo e($totalOrdersToday); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo app('translator')->get('Cost'); ?></td>
                                        <td><?php echo e($totalCostToday); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo app('translator')->get('Sales'); ?></td>
                                        <td><?php echo e($totalSoldToday); ?></td>
                                    </tr>
                                    <tr class=" alert-success">
                                        <td><?php echo app('translator')->get('Profit'); ?></td>
                                        <td><?php echo e($totalProfitToday); ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card w-100 mb-3">
                                <div class="card-body">
                                    <div class="card-title h5"><?php echo app('translator')->get('This Month'); ?> (<?php echo e(date('F')); ?>)</div>
                                    <div class=" table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <tr>
                                                <td><?php echo app('translator')->get('Invoices'); ?></td>
                                                <td><?php echo e($totalOrdersThisMonth); ?></td>
                                            </tr>
                                            <tr>
                                                <td><?php echo app('translator')->get('Cost'); ?></td>
                                                <td><?php echo e($totalCostThisMonth); ?></td>
                                            </tr>
                                            <tr>
                                                <td><?php echo app('translator')->get('Sales'); ?></td>
                                                <td><?php echo e($totalSoldThisMonth); ?></td>
                                            </tr>
                                            <tr class=" alert-success">
                                                <td><?php echo app('translator')->get('Profit'); ?></td>
                                                <td><?php echo e($totalProfitThisMonth); ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card w-100 mb-3">
                                <div class="card-body">
                                    <div class="card-title h5"><?php echo app('translator')->get('This Year'); ?> (<?php echo e(date('Y')); ?>)</div>
                                    <div class=" table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <tr>
                                                <td><?php echo app('translator')->get('Invoices'); ?></td>
                                                <td><?php echo e($totalOrdersThisYear); ?></td>
                                            </tr>
                                            <tr>
                                                <td><?php echo app('translator')->get('Cost'); ?></td>
                                                <td><?php echo e($totalCostThisYear); ?></td>
                                            </tr>
                                            <tr>
                                                <td><?php echo app('translator')->get('Sales'); ?></td>
                                                <td><?php echo e($totalSoldThisYear); ?></td>
                                            </tr>
                                            <tr class=" alert-success">
                                                <td><?php echo app('translator')->get('Profit'); ?></td>
                                                <td><?php echo e($totalProfitThisYear); ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="card w-100">
        <div class="card-body">
            <div class="d-flex align-items-baseline mb-3">
                <div class="flex-grow-1 pe-4">
                    <form action="<?php echo e(route('orders.index')); ?>" role="form">
                        <div class="input-group">
                            <input type="search" name="search_query" value="<?php echo e(Request::get('search_query')); ?>"
                                class="form-control" placeholder="<?php echo app('translator')->get('Search by invoice number or customer name...'); ?>" autocomplete="off">
                            <button class="btn btn-outline-primary" type="submit"
                                id="button-addon2"><?php echo app('translator')->get('Search'); ?></button>
                        </div>
                        <div class="form-text"><?php echo app('translator')->get('You can also use a scanner'); ?></div>
                    </form>
                </div>
                <?php echo $__env->make('orders.filter-button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <?php echo $__env->make('orders.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div>
                <?php echo e($orders->withQueryString()->links()); ?>

            </div>
        </div>
    </div>

    <?php echo $__env->make('orders.search-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XSmarl-F1\bin\resources\views/orders/index.blade.php ENDPATH**/ ?>