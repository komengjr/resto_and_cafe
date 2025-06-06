@extends('layouts.base')
@section('content')
    <div class="row g-3 mb-3">
        <div class="col-xl-6 ">
            <div class="row g-3">
                <div class="col-12">
                    <div class="card bg-transparent-50 overflow-hidden">
                        <div class="card-header position-relative">
                            <div class="bg-holder d-none d-md-block bg-card z-index-1"
                                style="background-image:url(../assets/img/illustrations/ecommerce-bg.png);background-size:230px;background-position:right bottom;z-index:-1;">
                            </div>
                            <!--/.bg-holder-->

                            <div class="position-relative z-index-2">
                                <div>
                                    <h3 class="text-primary mb-1">Welcome, {{ Auth::user()->fullname }}!</h3>
                                    <p>Here’s what happening with your Resto today </p>
                                </div>
                                <div class="d-flex py-3">
                                    <div class="pe-3">
                                        <p class="text-600 fs--1 fw-medium">Today's visit </p>
                                        <h4 class="text-800 mb-0">{{ $ordertoday->count() }} Order</h4>
                                    </div>
                                    <div class="ps-3">
                                        <p class="text-600 fs--1">Total Orders </p>
                                        <h4 class="text-800 mb-0">{{ $order->count() }} Order</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <ul class="mb-0 list-unstyled">
                                <li class="alert mb-0 rounded-0 py-3 px-card alert-warning border-x-0 border-top-0">
                                    <div class="row flex-between-center">
                                        <div class="col">
                                            <div class="d-flex">
                                                <div class="fas fa-circle mt-1 fs--2"></div>
                                                <p class="fs--1 ps-2 mb-0"><strong>5 products</strong> didn’t publish to
                                                    your Resto</p>
                                            </div>
                                        </div>
                                        <div class="col-auto d-flex align-items-center"><a
                                                class="alert-link fs--1 fw-medium" href="#!">View Order<i
                                                    class="fas fa-chevron-right ms-1 fs--2"></i></a></div>
                                    </div>
                                </li>
                                <li
                                    class="alert mb-0 rounded-0 py-3 px-card greetings-item border-top border-x-0 border-top-0">
                                    <div class="row flex-between-center">
                                        <div class="col">
                                            <div class="d-flex">
                                                <div class="fas fa-circle mt-1 fs--2 text-primary"></div>
                                                <p class="fs--1 ps-2 mb-0"><strong>7 orders</strong> have payments that need
                                                    to be captured</p>
                                            </div>
                                        </div>
                                        <div class="col-auto d-flex align-items-center"><a
                                                class="alert-link fs--1 fw-medium" href="#!">View Order<i
                                                    class="fas fa-chevron-right ms-1 fs--2"></i></a></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="card h-md-100 ecommerce-card-min-width">
                                <div class="card-header pb-0">
                                    <h6 class="mb-0 mt-2 d-flex align-items-center">Weekly Sales<span class="ms-1 text-400"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Calculated according to last week's sales"><span
                                                class="far fa-question-circle" data-fa-transform="shrink-1"></span></span>
                                    </h6>
                                </div>
                                <div class="card-body d-flex flex-column justify-content-end">
                                    <div class="row">
                                        <div class="col">
                                            <p class="font-sans-serif lh-1 mb-1 fs-2">$47K</p><span
                                                class="badge badge-soft-success rounded-pill fs--2">+3.5%</span>
                                        </div>
                                        <div class="col-auto ps-0">
                                            <div
                                                class="echart-bar-weekly-sales h-100 echart-bar-weekly-sales-smaller-width">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card product-share-doughnut-width">
                                <div class="card-header pb-0">
                                    <h6 class="mb-0 mt-2 d-flex align-items-center">Product Share</h6>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex flex-column justify-content-between">
                                            <p class="font-sans-serif lh-1 mb-1 fs-2">34.6%</p><span
                                                class="badge badge-soft-warning rounded-pill fs--2"><span
                                                    class="fas fa-caret-up me-1"></span>3.5%</span>
                                        </div>
                                        <div>
                                            <canvas class="my-n5" id="marketShareDoughnut" width="112"></canvas>
                                            <p class="mb-0 text-center fs--2 mt-4 text-500">Target: <span
                                                    class="text-800">55% </span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-md-100 h-100">
                                <div class="card-body">
                                    <div class="row h-100 justify-content-between g-0">
                                        <div class="col-5 col-sm-6 col-xxl pe-2">
                                            <h6 class="mt-1">Market Share</h6>
                                            <div class="fs--2 mt-3">
                                                <div class="d-flex flex-between-center mb-1">
                                                    <div class="d-flex align-items-center"><span
                                                            class="dot bg-primary"></span><span
                                                            class="fw-semi-bold">Falcon</span></div>
                                                    <div class="d-xxl-none">57%</div>
                                                </div>
                                                <div class="d-flex flex-between-center mb-1">
                                                    <div class="d-flex align-items-center"><span
                                                            class="dot bg-info"></span><span
                                                            class="fw-semi-bold">Sparrow</span></div>
                                                    <div class="d-xxl-none">20%</div>
                                                </div>
                                                <div class="d-flex flex-between-center mb-1">
                                                    <div class="d-flex align-items-center"><span
                                                            class="dot bg-warning"></span><span
                                                            class="fw-semi-bold">Phoenix</span></div>
                                                    <div class="d-xxl-none">22%</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto position-relative">
                                            <div class="echart-product-share"></div>
                                            <div class="position-absolute top-50 start-50 translate-middle text-dark fs-2">
                                                26M</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-header pb-0">
                                    <h6 class="mb-0 mt-2 d-flex align-items-center">Total Order</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row align-items-end">
                                        <div class="col">
                                            <p class="font-sans-serif lh-1 mb-1 fs-2">58.4K</p>
                                            <div class="badge badge-soft-primary rounded-pill fs--2"><span
                                                    class="fas fa-caret-up me-1"></span>13.6%</div>
                                        </div>
                                        <div class="col-auto ps-0">
                                            <div class="total-order-ecommerce"
                                                data-echarts='{"series":[{"type":"line","data":[110,100,250,210,530,480,320,325]}],"grid":{"bottom":"-10px"}}'>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 ">
            <div class="card py-3 mb-3">
                <div class="card-body py-3">
                    <div class="row g-0">
                        <div class="col-6 col-md-4 border-200 border-bottom border-end pb-4">
                            <h6 class="pb-1 text-700">Orders </h6>
                            <p class="font-sans-serif lh-1 mb-1 fs-2">{{ $ordertoday->count() }}</p>
                            <div class="d-flex align-items-center">
                                <h6 class="fs--1 text-500 mb-0">{{ $ordertoday->count() }}</h6>
                                <h6 class="fs--2 ps-3 mb-0 text-primary"><span class="me-1 fas fa-caret-up"></span>21.8%
                                </h6>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 border-200 border-md-200 border-bottom border-md-end pb-4 ps-3">
                            <h6 class="pb-1 text-700">Items sold </h6>
                            <p class="font-sans-serif lh-1 mb-1 fs-2">{{ $item }} Item</p>
                            <div class="d-flex align-items-center">
                                <h6 class="fs--1 text-500 mb-0">{{ $item }} </h6>
                                <h6 class="fs--2 ps-3 mb-0 text-warning"><span class="me-1 fas fa-caret-up"></span>21.8%
                                </h6>
                            </div>
                        </div>
                        <div
                            class="col-6 col-md-4 border-200 border-bottom border-end border-md-end-0 pb-4 pt-4 pt-md-0 ps-md-3">
                            <h6 class="pb-1 text-700">Refunds </h6>
                            <p class="font-sans-serif lh-1 mb-1 fs-2">@currency(13000)</p>
                            <div class="d-flex align-items-center">
                                <h6 class="fs--1 text-500 mb-0">13,675 </h6>
                                <h6 class="fs--2 ps-3 mb-0 text-success"><span class="me-1 fas fa-caret-up"></span>21.8%
                                </h6>
                            </div>
                        </div>
                        <div
                            class="col-6 col-md-4 border-200 border-md-200 border-bottom border-md-bottom-0 border-md-end pt-4 pb-md-0 ps-3 ps-md-0">
                            <h6 class="pb-1 text-700">Total Sales</h6>
                            <p class="font-sans-serif lh-1 mb-1 fs-2">@currency($total)</p>
                            <div class="d-flex align-items-center">
                                <h6 class="fs--1 text-500 mb-0">@currency(3400)</h6>
                                <h6 class="fs--2 ps-3 mb-0 text-danger"><span class="me-1 fas fa-caret-up"></span>21.8%
                                </h6>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 border-200 border-md-bottom-0 border-end pt-4 pb-md-0 ps-md-3">
                            <h6 class="pb-1 text-700">Not Payment </h6>
                            <p class="font-sans-serif lh-1 mb-1 fs-2">@currency($totalmin)</p>
                            <div class="d-flex align-items-center">
                                <h6 class="fs--1 text-500 mb-0">13,675 </h6>
                                <h6 class="fs--2 ps-3 mb-0 text-success"><span class="me-1 fas fa-caret-up"></span>21.8%
                                </h6>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 pb-0 pt-4 ps-3">
                            <h6 class="pb-1 text-700">Payment </h6>
                            <p class="font-sans-serif lh-1 mb-1 fs-2">@currency($total - $totalmin)</p>
                            <div class="d-flex align-items-center">
                                <h6 class="fs--1 text-500 mb-0">13,675 </h6>
                                <h6 class="fs--2 ps-3 mb-0 text-info"><span class="me-1 fas fa-caret-up"></span>21.8%</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="row flex-between-center g-0">
                        <div class="col-auto">
                            <h6 class="mb-0">Total Sales</h6>
                        </div>
                        <div class="col-auto d-flex">
                            <div class="form-check mb-0 d-flex">
                                <input class="form-check-input form-check-input-primary" id="ecommerceLastMonth"
                                    type="checkbox" checked="checked" />
                                <label class="form-check-label ps-2 fs--2 text-600 mb-0" for="ecommerceLastMonth">Cabang A<span class="text-dark d-none d-md-inline">: @currency(23400000)</span></label>
                            </div>
                            <div class="form-check mb-0 d-flex ps-0 ps-md-3">
                                <input class="form-check-input ms-2 form-check-input-warning opacity-75"
                                    id="ecommercePrevYear" type="checkbox" checked="checked" />
                                <label class="form-check-label ps-2 fs--2 text-600 mb-0" for="ecommercePrevYear">Cabang B<span class="text-dark d-none d-md-inline">: @currency(50300000)</span></label>
                            </div>
                            <div class="form-check mb-0 d-flex ps-0 ps-md-3">
                                <input class="form-check-input ms-2 form-check-input-success opacity-75"
                                    id="cabangc" type="checkbox" checked="checked" />
                                <label class="form-check-label ps-2 fs--2 text-600 mb-0" for="cabangc">Cabang C<span class="text-dark d-none d-md-inline">: @currency(40300000)</span></label>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="dropdown font-sans-serif btn-reveal-trigger">
                                <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal"
                                    type="button" id="dropdown-total-sales-ecomm" data-bs-toggle="dropdown"
                                    data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span
                                        class="fas fa-ellipsis-h fs--2"></span></button>
                                <div class="dropdown-menu dropdown-menu-end border py-2"
                                    aria-labelledby="dropdown-total-sales-ecomm"><a class="dropdown-item"
                                        href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                        href="#!">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body pe-xxl-0">
                    <!-- Find the JS file for the following chart at: src/js/charts/echarts/total-sales-ecommerce.js-->
                    <!-- If you are not using gulp based workflow, you can find the transpiled code at: public/assets/js/theme.js-->
                    <div class="echart-line-total-sales-ecommerce" data-echart-responsive="true"
                        data-options='{"optionOne":"ecommerceLastMonth","optionTwo":"ecommercePrevYear"}'></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col-xxl-3 col-md-6 col-lg-5">
            <div class="card shopping-cart-bar-min-height h-100">
                <div class="card-header d-flex flex-between-center">
                    <h6 class="mb-0">Shopping Cart</h6>
                    <div class="dropdown font-sans-serif btn-reveal-trigger">
                        <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal"
                            type="button" id="dropdown-shopping-cart-bar" data-bs-toggle="dropdown"
                            data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span
                                class="fas fa-ellipsis-h fs--2"></span></button>
                        <div class="dropdown-menu dropdown-menu-end border py-2"
                            aria-labelledby="dropdown-shopping-cart-bar"><a class="dropdown-item"
                                href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                href="#!">Remove</a>
                        </div>
                    </div>
                </div>
                <div class="card-body py-0 d-flex align-items-center h-100">
                    <div class="flex-1">
                        <div class="row g-0 align-items-center pb-3">
                            <div class="col pe-4">
                                <h6 class="fs--2 text-600">Initiated</h6>
                                <div class="progress" style="height:5px">
                                    <div class="progress-bar rounded-3 bg-primary" role="progressbar" style="width: 50% "
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-auto text-end">
                                <p class="mb-0 text-900 font-sans-serif"><span
                                        class="me-1 fas fa-caret-up text-success"></span>43.6%</p>
                                <p class="mb-0 fs--2 text-500 fw-semi-bold"> Session: <span class ="text-600">6817</span>
                                </p>
                            </div>
                        </div>
                        <div class="row g-0 align-items-center pb-3 border-top pt-3">
                            <div class="col pe-4">
                                <h6 class="fs--2 text-600">Abandonment rate</h6>
                                <div class="progress" style="height:5px">
                                    <div class="progress-bar rounded-3 bg-danger" role="progressbar" style="width: 25% "
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-auto text-end">
                                <p class="mb-0 text-900 font-sans-serif"><span
                                        class="me-1 fas fa-caret-up text-danger"></span>13.11%</p>
                                <p class="mb-0 fs--2 text-500 fw-semi-bold"><span class ="text-600">44</span> of 61</p>
                            </div>
                        </div>
                        <div class="row g-0 align-items-center pb-3 border-top pt-3">
                            <div class="col pe-4">
                                <h6 class="fs--2 text-600">Bounce rate</h6>
                                <div class="progress" style="height:5px">
                                    <div class="progress-bar rounded-3 bg-primary" role="progressbar" style="width: 35% "
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-auto text-end">
                                <p class="mb-0 text-900 font-sans-serif"><span
                                        class="me-1 fas fa-caret-up text-success"></span>12.11%</p>
                                <p class="mb-0 fs--2 text-500 fw-semi-bold"><span class ="text-600">8</span> of 61</p>
                            </div>
                        </div>
                        <div class="row g-0 align-items-center pb-3 border-top pt-3">
                            <div class="col pe-4">
                                <h6 class="fs--2 text-600">Completion rate</h6>
                                <div class="progress" style="height:5px">
                                    <div class="progress-bar rounded-3 bg-primary" role="progressbar" style="width: 43% "
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-auto text-end">
                                <p class="mb-0 text-900 font-sans-serif"><span
                                        class="me-1 fas fa-caret-down text-danger"></span>43.6%</p>
                                <p class="mb-0 fs--2 text-500 fw-semi-bold"><span class ="text-600">18</span> of 179</p>
                            </div>
                        </div>
                        <div class="row g-0 align-items-center pb-3 border-top pt-3">
                            <div class="col pe-4">
                                <h6 class="fs--2 text-600">Revenue Rate</h6>
                                <div class="progress" style="height:5px">
                                    <div class="progress-bar rounded-3 bg-primary" role="progressbar" style="width: 60% "
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-auto text-end">
                                <p class="mb-0 text-900 font-sans-serif"><span
                                        class="me-1 fas fa-caret-up text-success"></span>60.5%</p>
                                <p class="mb-0 fs--2 text-500 fw-semi-bold"><span class ="text-600">18</span> of 179</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-4 col-md-6 col-lg-7 order-xxl-1">
            <div class="card h-100">
                <div class="card-header bg-light py-2 d-flex flex-between-center">
                    <h6 class="mb-0">Top Products</h6>
                    <div class="d-flex"><a class="btn btn-link btn-sm me-2" href="#!">View Details</a>
                        <div class="dropdown font-sans-serif btn-reveal-trigger">
                            <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal"
                                type="button" id="dropdown-top-products" data-bs-toggle="dropdown"
                                data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span
                                    class="fas fa-ellipsis-h fs--2"></span></button>
                            <div class="dropdown-menu dropdown-menu-end border py-2"
                                aria-labelledby="dropdown-top-products"><a class="dropdown-item"
                                    href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                    href="#!">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body d-flex h-100 flex-column justify-content-end">
                    <!-- Find the JS file for the following chart at: src/js/charts/echarts/top-products.js-->
                    <!-- If you are not using gulp based workflow, you can find the transpiled code at: public/assets/js/theme.js-->
                    <div class="echart-bar-top-products echart-bar-top-products-ecommerce" data-echart-responsive="true">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-9 col-md-12">
            <div class="card z-index-1" id="recentPurchaseTable"
                data-list='{"valueNames":["name","email","product","payment","amount"],"page":7,"pagination":true}'>
                <div class="card-header">
                    <div class="row flex-between-center">
                        <div class="col-6 col-sm-auto d-flex align-items-center pe-0">
                            <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Recent Purchases </h5>
                        </div>
                        <div class="col-6 col-sm-auto ms-auto text-end ps-0">
                            <div class="d-none" id="table-purchases-actions">
                                <div class="d-flex">
                                    <select class="form-select form-select-sm" aria-label="Bulk actions">
                                        <option selected="">Bulk actions</option>
                                        <option value="Refund">Refund</option>
                                        <option value="Delete">Delete</option>
                                        <option value="Archive">Archive</option>
                                    </select>
                                    <button class="btn btn-falcon-default btn-sm ms-2" type="button">Apply</button>
                                </div>
                            </div>
                            <div id="table-purchases-replace-element">
                                <button class="btn btn-falcon-default btn-sm" type="button"><span class="fas fa-plus"
                                        data-fa-transform="shrink-3 down-2"></span><span
                                        class="d-none d-sm-inline-block ms-1">New</span></button>
                                <button class="btn btn-falcon-default btn-sm mx-2" type="button"><span
                                        class="fas fa-filter" data-fa-transform="shrink-3 down-2"></span><span
                                        class="d-none d-sm-inline-block ms-1">Filter</span></button>
                                <button class="btn btn-falcon-default btn-sm" type="button"><span
                                        class="fas fa-external-link-alt" data-fa-transform="shrink-3 down-2"></span><span
                                        class="d-none d-sm-inline-block ms-1">Export</span></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 py-0">
                    <div class="table-responsive scrollbar">
                        <table class="table table-sm fs--1 mb-0 overflow-hidden">
                            <thead class="bg-200 text-900">
                                <tr>
                                    <th class="white-space-nowrap">
                                        <div class="form-check mb-0 d-flex align-items-center">
                                            <input class="form-check-input" id="checkbox-bulk-purchases-select"
                                                type="checkbox"
                                                data-bulk-select='{"body":"table-purchase-body","actions":"table-purchases-actions","replacedElement":"table-purchases-replace-element"}' />
                                        </div>
                                    </th>
                                    <th class="sort pe-1 align-middle white-space-nowrap" data-sort="name">No Order</th>
                                    <th class="sort pe-1 align-middle white-space-nowrap" data-sort="email">Email</th>
                                    <th class="sort pe-1 align-middle white-space-nowrap" data-sort="product">Product</th>
                                    <th class="sort pe-1 align-middle white-space-nowrap text-center" data-sort="payment">
                                        Payment</th>
                                    <th class="sort pe-1 align-middle white-space-nowrap text-end" data-sort="amount">
                                        Amount</th>
                                    <th class="no-sort pe-1 align-middle data-table-row-action"></th>
                                </tr>
                            </thead>
                            <tbody class="list" id="table-purchase-body">
                                @foreach ($order as $orders)
                                    <tr class="btn-reveal-trigger">
                                        <td class="align-middle" style="width: 28px;">
                                            <div class="form-check mb-0">
                                                <input class="form-check-input" type="checkbox" id="recent-purchase-0"
                                                    data-bulk-select-row="data-bulk-select-row" />
                                            </div>
                                        </td>
                                        <th class="align-middle white-space-nowrap name"><a
                                                href="../app/e-commerce/customer-details.html">{{ $orders->no_reg_order }}</a>
                                        </th>
                                        <td class="align-middle white-space-nowrap email">john@gmail.com</td>
                                        <td class="align-middle white-space-nowrap product">Slick - Drag &amp; Drop
                                            Bootstrap
                                            Generator</td>
                                        <td class="align-middle text-center fs-0 white-space-nowrap payment"><span
                                                class="badge badge rounded-pill badge-soft-success">Success<span
                                                    class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>
                                        </td>
                                        <td class="align-middle text-end amount">$99</td>
                                        <td class="align-middle white-space-nowrap text-end">
                                            <div class="dropstart font-sans-serif position-static d-inline-block">
                                                <button
                                                    class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal float-end"
                                                    type="button" id="dropdown0" data-bs-toggle="dropdown"
                                                    data-boundary="window" aria-haspopup="true" aria-expanded="false"
                                                    data-bs-reference="parent"><span
                                                        class="fas fa-ellipsis-h fs--1"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end border py-2"
                                                    aria-labelledby="dropdown0"><a class="dropdown-item"
                                                        href="#!">View</a><a class="dropdown-item"
                                                        href="#!">Edit</a><a class="dropdown-item"
                                                        href="#!">Refund</a>
                                                    <div class="dropdown-divider"></div><a
                                                        class="dropdown-item text-warning" href="#!">Archive</a><a
                                                        class="dropdown-item text-danger" href="#!">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row align-items-center">
                        <div class="pagination d-none"></div>
                        <div class="col">
                            <p class="mb-0 fs--1"><span class="d-none d-sm-inline-block me-2"
                                    data-list-info="data-list-info"> </span>
                            </p>
                        </div>
                        <div class="col-auto d-flex">
                            <button class="btn btn-sm btn-primary" type="button"
                                data-list-pagination="prev"><span>Previous</span></button>
                            <button class="btn btn-sm btn-primary px-4 ms-2" type="button"
                                data-list-pagination="next"><span>Next</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('base.js')
    <script src="{{ asset('vendors/chart/chart.min.js') }}"></script>
    <script src="{{ asset('vendors/countup/countUp.umd.js') }}"></script>
    <script src="{{ asset('vendors/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('vendors/dayjs/dayjs.min.js') }}"></script>
    <script>
        const rupiah = (number) => {
            return new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR"
            }).format(number);
        }
        var totalSalesEcommerce = function totalSalesEcommerce() {
            var ECHART_LINE_TOTAL_SALES_ECOMM = ".echart-line-total-sales-ecommerce";
            var $echartsLineTotalSalesEcomm = document.querySelector(
                ECHART_LINE_TOTAL_SALES_ECOMM
            );
            var months = [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec",
            ];

            function getFormatter(params) {
                return params
                    .map(function(_ref16, index) {
                        var value = _ref16.value,
                            borderColor = _ref16.borderColor;
                        return '<span class= "fas fa-circle" style="color: '
                            .concat(
                                borderColor,
                                "\"></span>\n    <span class='text-600'>"
                            )
                            .concat(index === 0 ? "Cabang A " : "Cabang B ", ": ",)
                            .concat(rupiah(value), "</span>");
                    })
                    .join("<br/>");
            }

            if ($echartsLineTotalSalesEcomm) {
                // Get options from data attribute
                var userOptions = utils.getData($echartsLineTotalSalesEcomm, "options");
                var TOTAL_SALES_LAST_MONTH = "#".concat(userOptions.optionOne);
                var TOTAL_SALES_PREVIOUS_YEAR = "#".concat(userOptions.optionTwo);
                var totalSalesLastMonth = document.querySelector(
                    TOTAL_SALES_LAST_MONTH
                );
                var totalSalesPreviousYear = document.querySelector(
                    TOTAL_SALES_PREVIOUS_YEAR
                );
                var chart = window.echarts.init($echartsLineTotalSalesEcomm);

                var getDefaultOptions = function getDefaultOptions() {
                    return {
                        color: utils.getGrays()["100"],
                        tooltip: {
                            trigger: "axis",
                            padding: [7, 10],
                            backgroundColor: utils.getGrays()["100"],
                            borderColor: utils.getGrays()["300"],
                            textStyle: {
                                color: utils.getColors().dark,
                            },
                            borderWidth: 1,
                            formatter: function formatter(params) {
                                return getFormatter(params);
                            },
                            transitionDuration: 0,
                            position: function position(pos, params, dom, rect, size) {
                                return getPosition(pos, params, dom, rect, size);
                            },
                        },
                        legend: {
                            data: ["lastMonth", "previousYear"],
                            show: false,
                        },
                        xAxis: {
                            type: "category",
                            data: [
                                "2019-01-05",
                                "2019-01-06",
                                "2019-01-07",
                                "2019-01-08",
                                "2019-01-09",
                                "2019-01-10",
                                "2019-01-11",
                                "2019-01-12",
                                "2019-01-13",
                                "2019-01-14",
                                "2019-01-15",
                                "2019-01-16",
                            ],
                            boundaryGap: false,
                            axisPointer: {
                                lineStyle: {
                                    color: utils.getColor("300"),
                                    type: "dashed",
                                },
                            },
                            splitLine: {
                                show: false,
                            },
                            axisLine: {
                                lineStyle: {
                                    // color: utils.getGrays()['300'],
                                    color: utils.rgbaColor("#000", 0.01),
                                    type: "dashed",
                                },
                            },
                            axisTick: {
                                show: false,
                            },
                            axisLabel: {
                                color: utils.getColor("400"),
                                formatter: function formatter(value) {
                                    var date = new Date(value);
                                    return ""
                                        .concat(months[date.getMonth()], " ")
                                        .concat(date.getDate());
                                },
                                margin: 15, // showMaxLabel: false
                            },
                        },
                        yAxis: {
                            type: "value",
                            axisPointer: {
                                show: false,
                            },
                            splitLine: {
                                lineStyle: {
                                    color: utils.getColor("300"),
                                    type: "dashed",
                                },
                            },
                            boundaryGap: false,
                            axisLabel: {
                                show: true,
                                color: utils.getColor("400"),
                                margin: 15,
                            },
                            axisTick: {
                                show: false,
                            },
                            axisLine: {
                                show: false,
                            },
                        },
                        series: [{
                                name: "lastMonth",
                                type: "line",
                                data: [500000, 800000, 600000, 800000, 650000, 900000, 1300000, 900000, 300000,
                                    400000, 300000, 700000
                                ],
                                lineStyle: {
                                    color: utils.getColor("primary"),
                                },
                                itemStyle: {
                                    borderColor: utils.getColor("primary"),
                                    borderWidth: 2,
                                },
                                symbol: "circle",
                                symbolSize: 10,
                                hoverAnimation: true,
                                areaStyle: {
                                    color: {
                                        type: "linear",
                                        x: 0,
                                        y: 0,
                                        x2: 0,
                                        y2: 1,
                                        colorStops: [{
                                                offset: 0,
                                                color: utils.rgbaColor(
                                                    utils.getColor("primary"),
                                                    0.2
                                                ),
                                            },
                                            {
                                                offset: 1,
                                                color: utils.rgbaColor(
                                                    utils.getColor("primary"),
                                                    0
                                                ),
                                            },
                                        ],
                                    },
                                },
                            },
                            {
                                name: "previousYear",
                                type: "line",
                                data: [
                                    1100000, 300000, 400000, 500000, 800000, 700000, 500000, 400000,
                                    1100000, 900000, 600000, 600000,
                                ],
                                lineStyle: {
                                    color: utils.rgbaColor(
                                        utils.getColor("warning"),
                                        0.3
                                    ),
                                },
                                itemStyle: {
                                    borderColor: utils.rgbaColor(
                                        utils.getColor("warning"),
                                        0.6
                                    ),
                                    borderWidth: 2,
                                },
                                symbol: "circle",
                                symbolSize: 10,
                                hoverAnimation: true,
                            },
                        ],
                        grid: {
                            right: "18px",
                            left: "40px",
                            bottom: "15%",
                            top: "5%",
                        },
                    };
                };

                echartSetOption(chart, userOptions, getDefaultOptions);
                totalSalesLastMonth.addEventListener("click", function() {
                    chart.dispatchAction({
                        type: "legendToggleSelect",
                        name: "lastMonth",
                    });
                });
                totalSalesPreviousYear.addEventListener("click", function() {
                    chart.dispatchAction({
                        type: "legendToggleSelect",
                        name: "previousYear",
                    });
                });
            }
        };
        docReady(totalSalesEcommerce);
    </script>
@endsection
