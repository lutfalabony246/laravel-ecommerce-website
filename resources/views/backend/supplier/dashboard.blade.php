@extends('admin.admin_master')

@section('main-content')
    <div class="container-fluid p-4">
        <div class="row">
            <div class="mb-3 main-head">Dashboard</div>
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card">
                    <div class="card-inner d-flex justify-content-between align-items-center flex-wrap p-2">

                        <span class="dash-card-icon">
                            <svg width="34" height="25" viewBox="0 0 34 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M20.25 1H16.75H12.375M4.5 8H29M4.5 8C3.57174 8 2.6815 7.63125 2.02513 6.97487C1.36875 6.3185 1 5.42826 1 4.5C1 3.57174 1.36875 2.6815 2.02513 2.02513C2.6815 1.36875 3.57174 1 4.5 1H29C29.9283 1 30.8185 1.36875 31.4749 2.02513C32.1313 2.6815 32.5 3.57174 32.5 4.5C32.5 5.42826 32.1313 6.3185 31.4749 6.97487C30.8185 7.63125 29.9283 8 29 8M4.5 8V20.25C4.5 21.1783 4.86875 22.0685 5.52513 22.7249C6.1815 23.3813 7.07174 23.75 8 23.75H25.5C26.4283 23.75 27.3185 23.3813 27.9749 22.7249C28.6313 22.0685 29 21.1783 29 20.25V8"
                                    stroke="#8B6BE8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>

                        </span>
                        <!-- end span  -->
                        <div class="dashbord-card-info">
                            <h2>{{ $totalProduct }}</h2>
                            <p>Total Product</p>
                        </div>
                        <!-- end dashbord-card-info  -->


                    </div>
                    <!-- end card-inner  -->
                </div>
                <!-- end card  -->
            </div>
            <!-- end col  -->
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card">
                    <div class="card-inner d-flex justify-content-between align-items-center flex-wrap p-2">

                        <span class="dash-card-icon dash-card-icon2">
                            <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17.4166 4.83691C14.7494 5.13498 12.2206 6.18009 10.1212 7.85195C8.02187 9.52382 6.43722 11.7545 5.54969 14.2872C4.66216 16.82 4.50781 19.5519 5.1044 22.1685C5.701 24.7851 7.0243 27.18 8.922 29.0777C10.8197 30.9754 13.2147 32.2987 15.8313 32.8953C18.4479 33.4919 21.1797 33.3376 23.7125 32.45C26.2452 31.5625 28.4759 29.9778 30.1478 27.8785C31.8196 25.7791 32.8647 23.2503 33.1628 20.5832H17.4166V4.83691Z"
                                    stroke="#27BAD8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path
                                    d="M32.4393 14.2499H23.75V5.56055C25.7535 6.27135 27.5732 7.42023 29.0764 8.92345C30.5797 10.4267 31.7285 12.2464 32.4393 14.2499Z"
                                    stroke="#27BAD8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>


                        </span>
                        <!-- end span  -->
                        <div class="dashbord-card-info">
                            <h2>10,500</h2>
                            <p>Total Selling Product</p>
                        </div>
                        <!-- end dashbord-card-info  -->


                    </div>
                    <!-- end card-inner  -->
                </div>
                <!-- end card  -->
            </div>
            <!-- end col  -->
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card">
                    <div class="card-inner d-flex justify-content-between align-items-center flex-wrap p-2">

                        <span class="dash-card-icon dash-card-icon3">
                            <svg width="34" height="25" viewBox="0 0 34 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M20.25 1H16.75H12.375M4.5 8H29M4.5 8C3.57174 8 2.6815 7.63125 2.02513 6.97487C1.36875 6.3185 1 5.42826 1 4.5C1 3.57174 1.36875 2.6815 2.02513 2.02513C2.6815 1.36875 3.57174 1 4.5 1H29C29.9283 1 30.8185 1.36875 31.4749 2.02513C32.1313 2.6815 32.5 3.57174 32.5 4.5C32.5 5.42826 32.1313 6.3185 31.4749 6.97487C30.8185 7.63125 29.9283 8 29 8M4.5 8V20.25C4.5 21.1783 4.86875 22.0685 5.52513 22.7249C6.1815 23.3813 7.07174 23.75 8 23.75H25.5C26.4283 23.75 27.3185 23.3813 27.9749 22.7249C28.6313 22.0685 29 21.1783 29 20.25V8"
                                    stroke="#F6B13C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path
                                    d="M10 13.0016L10.5112 17.2862M10.5112 17.2862C11.0944 15.8792 12.1395 14.7008 13.4829 13.9355C14.8263 13.1703 16.392 12.8614 17.9346 13.0574C19.4772 13.2534 20.9096 13.9432 22.0072 15.0186C23.1049 16.094 23.8057 17.4943 24 19M10.5112 17.2862H14.392"
                                    stroke="#F6B13C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                            </svg>


                        </span>
                        <!-- end span  -->
                        <div class="dashbord-card-info">
                            <h2>16,500</h2>
                            <p>Total Return Product</p>
                        </div>
                        <!-- end dashbord-card-info  -->


                    </div>
                    <!-- end card-inner  -->
                </div>
                <!-- end card  -->
            </div>
            <!-- end col  -->
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card">
                    <div class="card-inner d-flex justify-content-between align-items-center flex-wrap p-2">

                        <span class="dash-card-icon dash-card-icon4">
                            <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4.75 4.75H7.91667L8.55 7.91667M8.55 7.91667H33.25L26.9167 20.5833H11.0833M8.55 7.91667L11.0833 20.5833M11.0833 20.5833L7.45275 24.2139C6.45525 25.2114 7.16142 26.9167 8.57217 26.9167H26.9167M26.9167 26.9167C26.0768 26.9167 25.2714 27.2503 24.6775 27.8442C24.0836 28.438 23.75 29.2435 23.75 30.0833C23.75 30.9232 24.0836 31.7286 24.6775 32.3225C25.2714 32.9164 26.0768 33.25 26.9167 33.25C27.7565 33.25 28.562 32.9164 29.1558 32.3225C29.7497 31.7286 30.0833 30.9232 30.0833 30.0833C30.0833 29.2435 29.7497 28.438 29.1558 27.8442C28.562 27.2503 27.7565 26.9167 26.9167 26.9167ZM14.25 30.0833C14.25 30.9232 13.9164 31.7286 13.3225 32.3225C12.7286 32.9164 11.9232 33.25 11.0833 33.25C10.2435 33.25 9.43803 32.9164 8.84416 32.3225C8.2503 31.7286 7.91667 30.9232 7.91667 30.0833C7.91667 29.2435 8.2503 28.438 8.84416 27.8442C9.43803 27.2503 10.2435 26.9167 11.0833 26.9167C11.9232 26.9167 12.7286 27.2503 13.3225 27.8442C13.9164 28.438 14.25 29.2435 14.25 30.0833Z"
                                    stroke="#1ABC9C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path
                                    d="M19.6464 17.3536C19.8417 17.5488 20.1583 17.5488 20.3536 17.3536L23.5355 14.1716C23.7308 13.9763 23.7308 13.6597 23.5355 13.4645C23.3403 13.2692 23.0237 13.2692 22.8284 13.4645L20 16.2929L17.1716 13.4645C16.9763 13.2692 16.6597 13.2692 16.4645 13.4645C16.2692 13.6597 16.2692 13.9763 16.4645 14.1716L19.6464 17.3536ZM19.5 10L19.5 17L20.5 17L20.5 10L19.5 10Z"
                                    fill="#1ABC9C"></path>
                            </svg>


                        </span>
                        <!-- end span  -->
                        <div class="dashbord-card-info">
                            <h2>16,500</h2>
                            <p>Total Stock</p>
                        </div>
                        <!-- end dashbord-card-info  -->


                    </div>
                    <!-- end card-inner  -->
                </div>
                <!-- end card  -->
            </div>
            <!-- end col  -->
        </div>
        <!-- end row  -->

        <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-12">

                <div class="card p-3">
                    <div class="card-body">
                        <div class="line-chart mb-2 d-flex justify-content-between align-items-center flex-wrap">
                            <h3>Sales Analytics</h3>

                            <div class="col-sm-12 col-lg-3 col-md-3">
                                <select class="form-select form-select-lg" aria-label=".form-select-lg example">
                                    <option selected="">January</option>
                                    <option value="1">February</option>
                                    <option value="2">March</option>
                                    <option value="3">April</option>
                                </select>
                                <!-- end select  -->
                            </div>
                            <!-- end col  -->

                        </div>
                        <!-- end line-chart  -->
                        <div>
                            <canvas id="myChart" width="350" height="175"
                                style="display: block; box-sizing: border-box; height: 175px; width: 350px;"></canvas>
                        </div>
                        <!-- end line chart js  -->
                    </div>
                    <!-- end card-body  -->
                </div>
                <!-- end card  -->
            </div>
            <!-- end col  -->


            <div class="col-lg-6 col-md-8 col-sm-12">

                <div class="card p-3">
                    <div class="card-body">
                        <div class="line-chart mb-2 d-flex justify-content-between align-items-center flex-wrap">
                            <h3>Sales Analytics</h3>

                            <div class="col-sm-12 col-lg-3 col-md-3">
                                <select class="form-select form-select-lg" aria-label=".form-select-lg example">
                                    <option selected="">January</option>
                                    <option value="1">February</option>
                                    <option value="2">March</option>
                                    <option value="3">April</option>
                                </select>
                                <!-- end select  -->
                            </div>
                            <!-- end col  -->

                        </div>
                        <!-- end line-chart  -->
                        <div>
                            <canvas id="myChart2" width="350" height="175"
                                style="display: block; box-sizing: border-box; height: 175px; width: 350px;"></canvas>
                        </div>
                        <!-- end line chart js  -->
                    </div>
                    <!-- end card-body  -->
                </div>
                <!-- end card  -->
            </div>
            <!-- end col  -->
        </div>
        <!-- end row  -->

    </div>
@endsection
