@extends('admin.layouts.main')
@section('content')
@include('admin.layouts.sidebar')

<div class="main-content app-content">
    <div class="container-fluid page-container main-body-container">

        <!-- Start::page-header -->
        <div class="page-header-breadcrumb mb-3">
            <div class="d-flex align-center justify-content-between flex-wrap gap-1">
                <h1 class="page-title fw-medium fs-18 mb-0">Dashboard</h1>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0);">
                            Dashboards
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0);">
                            Ecommerce
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </div>
        </div>
        <!-- End::page-header -->

        <!-- Start:: row-1 -->
        <div class="row">
            <div class="col-xxl-6">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card custom-card dashboard-main-card primary">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <h5 class="fw-semibold">$43,038.00</h5>
                                        <span class="d-block fs-12 text-muted">Total Sales</span>
                                    </div>
                                    <div>
                                        <span class="avatar avatar-lg bg-primary-transparent svg-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                <path d="M5 22h14a2 2 0 0 0 2-2V9a1 1 0 0 0-1-1h-3v-.777c0-2.609-1.903-4.945-4.5-5.198A5.005 5.005 0 0 0 7 7v1H4a1 1 0 0 0-1 1v11a2 2 0 0 0 2 2zm12-12v2h-2v-2h2zM9 7c0-1.654 1.346-3 3-3s3 1.346 3 3v1H9V7zm-2 3h2v2H7v-2z"></path>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card custom-card dashboard-main-card secondary">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <h5 class="fw-semibold">$28,346.00</h5>
                                        <span class="d-block fs-12 text-muted">Total Expenses</span>
                                    </div>
                                    <div>
                                        <span class="avatar avatar-lg bg-secondary-transparent svg-secondary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                <path d="M20 12v6a1 1 0 0 1-2 0V4a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v14c0 1.654 1.346 3 3 3h14c1.654 0 3-1.346 3-3v-6h-2zm-6-1v2H6v-2h8zM6 9V7h8v2H6zm8 6v2h-3v-2h3z"></path>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="card custom-card dashboard-main-card success">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <h5 class="fw-semibold">35,367</h5>
                                        <span class="d-block fs-12 text-muted">Total Orders</span>
                                    </div>
                                    <div>
                                        <span class="avatar avatar-lg bg-success-transparent svg-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                <path d="M21.822 7.431A1 1 0 0 0 21 7H7.333L6.179 4.23A1.994 1.994 0 0 0 4.333 3H2v2h2.333l4.744 11.385A1 1 0 0 0 10 17h8c.417 0 .79-.259.937-.648l3-8a1 1 0 0 0-.115-.921z"></path>
                                                <circle cx="10.5" cy="19.5" r="1.5"></circle>
                                                <circle cx="17.5" cy="19.5" r="1.5"></circle>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </div>
        <!-- End:: row-1 -->

        <!-- Start:: row-2 -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card overflow-hidden">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                            Order History
                        </div>
                        <div class="d-flex flex-wrap gap-2">
                            <div class="dropdown custom-invoice">
                                <a href="javascript:void(0);" class="btn btn-outline-light btn-wave waves-effect waves-light" data-bs-toggle="dropdown" aria-expanded="false">Filters<i class="ri-arrow-down-s-line align-middle ms-1 d-inline-block"></i> </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a class="dropdown-item" href="javascript:void(0);">New</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0);">Popular</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0);">Relevant</a></li>
                                </ul>
                            </div>
                            <div>
                                <input class="form-control" type="text" placeholder="Search Here" aria-label=".form-control-sm example">
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Customer</th>
                                        <th>Product</th>
                                        <th class="text-center">Quantity</th>
                                        <th>Total Amount</th>
                                        <th>Payment Method</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="javascript:void(0);">$SPK15432</a></td>
                                        <td><a href="javascript:void(0);">John Doe</a></td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="lh-1">
                                                    <span class="avatar avatar-sm avatar-rounded">
                                                        <img src="{{asset('admin/images/ecommerce/png/13.png')}}" alt="">
                                                    </span>
                                                </div>
                                                <div>Urban Chic Ladies Bag</div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            2
                                        </td>
                                        <td>$150.00</td>
                                        <td>Credit Card</td>
                                        <td>
                                            2025-02-10
                                        </td>
                                        <td>
                                            <span class="badge bg-success">Completed</span>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm btn-light border" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fe fe-more-vertical"></i> </a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-line me-2"></i>View</a></li>
                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-pencil-line me-2"></i>Edit</a></li>
                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-line me-2"></i>Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="javascript:void(0);">$SPK15433</a></td>
                                        <td><a href="javascript:void(0);">Jane Smith</a></td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="lh-1">
                                                    <span class="avatar avatar-sm avatar-rounded">
                                                        <img src="{{asset('admin/images/ecommerce/png/15.png')}}" alt="">
                                                    </span>
                                                </div>
                                                <div>TrailBlaze Runners</div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            1
                                        </td>
                                        <td>$230.75</td>
                                        <td>PayPal</td>
                                        <td>
                                            2025-02-11
                                        </td>
                                        <td>
                                            <span class="badge bg-warning">Pending</span>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm btn-light border" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fe fe-more-vertical"></i> </a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-line me-2"></i>View</a></li>
                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-pencil-line me-2"></i>Edit</a></li>
                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-line me-2"></i>Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="javascript:void(0);">$SPK15434</a></td>
                                        <td><a href="javascript:void(0);">Michael Green</a></td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="lh-1">
                                                    <span class="avatar avatar-sm avatar-rounded">
                                                        <img src="{{asset('admin/images/ecommerce/png/19.png')}}" alt="">
                                                    </span>
                                                </div>
                                                <div>VisionTech SLR</div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            3
                                        </td>
                                        <td>$95.50</td>
                                        <td>Debit Card</td>
                                        <td>
                                            2025-02-12
                                        </td>
                                        <td>
                                            <span class="badge bg-danger">Failed</span>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm btn-light border" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fe fe-more-vertical"></i> </a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-line me-2"></i>View</a></li>
                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-pencil-line me-2"></i>Edit</a></li>
                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-line me-2"></i>Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="javascript:void(0);">$SPK15435</a></td>
                                        <td><a href="javascript:void(0);">Sarah Johnson</a></td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="lh-1">
                                                    <span class="avatar avatar-sm avatar-rounded">
                                                        <img src="{{asset('admin/images/ecommerce/png/6.png')}}" alt="">
                                                    </span>
                                                </div>
                                                <div> FlexiSeat Sofa Chair</div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            1
                                        </td>
                                        <td>$112.00</td>
                                        <td>Credit Card</td>
                                        <td>
                                            2025-02-13
                                        </td>
                                        <td>
                                            <span class="badge bg-success">Completed</span>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm btn-light border" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fe fe-more-vertical"></i> </a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-line me-2"></i>View</a></li>
                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-pencil-line me-2"></i>Edit</a></li>
                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-line me-2"></i>Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="javascript:void(0);">$SPK15436</a></td>
                                        <td><a href="javascript:void(0);">William Brown</a></td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="lh-1">
                                                    <span class="avatar avatar-sm avatar-rounded">
                                                        <img src="{{asset('admin/images/ecommerce/png/11.png')}}" alt="">
                                                    </span>
                                                </div>
                                                <div>DecoDial Classic</div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            5
                                        </td>
                                        <td>$60.25</td>
                                        <td>Credit Card</td>
                                        <td>
                                            2025-02-14
                                        </td>
                                        <td>
                                            <span class="badge bg-warning">Pending</span>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm btn-light border" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fe fe-more-vertical"></i> </a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-line me-2"></i>View</a></li>
                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-pencil-line me-2"></i>Edit</a></li>
                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-line me-2"></i>Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-bottom-0"><a href="javascript:void(0);">$SPK15437</a></td>
                                        <td class="border-bottom-0"><a href="javascript:void(0);">Emma White</a></td>
                                        <td class="border-bottom-0">
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="lh-1">
                                                    <span class="avatar avatar-sm avatar-rounded">
                                                        <img src="{{asset('admin/images/ecommerce/png/12.png')}}" alt="">
                                                    </span>
                                                </div>
                                                <div>Club Fleece Hoodie</div>
                                            </div>
                                        </td>
                                        <td class="text-center border-bottom-0">
                                            2
                                        </td>
                                        <td class="border-bottom-0">$145.80</td>
                                        <td class="border-bottom-0">PayPal</td>
                                        <td class="border-bottom-0">
                                            2025-02-14
                                        </td>
                                        <td class="border-bottom-0">
                                            <span class="badge bg-success">Completed</span>
                                        </td>
                                        <td class="border-bottom-0">
                                            <div class="dropdown">
                                                <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm btn-light border" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fe fe-more-vertical"></i> </a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-line me-2"></i>View</a></li>
                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-pencil-line me-2"></i>Edit</a></li>
                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-line me-2"></i>Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex align-items-center flex-wrap">
                            <div> Showing 6 Entries <i class="bi bi-arrow-right ms-2 fw-semibold"></i> </div>
                            <div class="ms-auto">
                                <nav aria-label="Page navigation" class="pagination-style-2">
                                    <ul class="pagination mb-0 flex-wrap">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="javascript:void(0);">
                                                Prev
                                            </a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
                                        <li class="page-item active"><a class="page-link" href="javascript:void(0);">2</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="javascript:void(0);">
                                                <i class="bi bi-three-dots"></i>
                                            </a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="javascript:void(0);">17</a></li>
                                        <li class="page-item">
                                            <a class="page-link text-primary" href="javascript:void(0);">
                                                next
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End:: row-2 -->

    </div>
</div>
<!-- End::app-content -->

@endsection
@section('css')
<style type="text/css">
    /*in page css here*/
</style>
@endsection
@section('js')
<script type="text/javascript">
    (() => {

        /*in page css here*/
    })()
</script>
@endsection