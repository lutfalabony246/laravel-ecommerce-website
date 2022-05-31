@extends('frontend.main_master')

 @section('index')


            <!--section start-->
            <section class="main-content" id="main-content">
                <div class="container-fluid profile mt-3">
                   <!-- breadcrumb start -->
                   <div class="breadcrumb-main ">
                      <div class="container">
                         <div class="row">
                            <div class="col">
                               <div class="breadcrumb-contain">
                                  <div>
                                     <h2>Sign Up</h2>
                                     <ul>
                                        <li><a href="{{ route('user.index') }}">home</a></li>
                                        <li><i class="fa fa-angle-double-right"></i></li>
                                        <li><a href="javascript:void(0)">Sign Up</a></li>
                                     </ul>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                   <!-- breadcrumb End -->
                   <!--section start-->
                   <section class="login-page section-big-py-space b-g-light px-md-5 px-3">
                      <div class="custom-container">
                         <div class="row">
                            <div class="col-lg-4 col-sm-12">
                               <div class="signUp-wrapper">

                                <form method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('register') }}">
                                    @csrf
                                     <h3 class="">Sign UP</h3>
                                     <div class="row ">
                                        <div class="col-md-12 form-group">
                                           <label for="">Please fill in the information below</label>
                                           <input type="text" class="form-control" name="name" id="name" placeholder="Your name"
                                              required="">
                                        </div>
                                        <div class="col-md-12 form-group">
                                           <input type="email" class="form-control" name="email" id="email" placeholder="Your email address"
                                              required="">
                                        </div>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="col-md-12 form-group">
                                            <input type="number" class="form-control" name="phone" id="phone" placeholder="Your phone"
                                               required="">
                                         </div>
                                         @error('phone')
                                         <span class="text-danger">{{ $message }}</span>
                                         @enderror
                                     </div>
                                     <div class="row ">
                                        <div class="col-md-12 form-group">
                                           <input type="password" class="form-control" name="password" placeholder="Your Password" required="">
                                        </div>
                                        @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="col-md-12 form-group">
                                           <input type="password" class="form-control" name="password_confirmation" placeholder="Password confirmation"
                                              required="">
                                        </div>
                                        @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <p class="reg-cont mb-3">Your personal data will be used to support your experience
                                           throughout this website, to manage access to your account, and for other purposes
                                           described in our privacy policy.</p>

                                        <div class="form-check reg-aggree-check">
                                           <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                           <label class="form-check-label" for="flexCheckDefault">
                                              I agree to terms & policy
                                           </label>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            {{--  <a href="javascript:void(0)" class="btn btn-normal btn-login">SIGN UP</a>  --}}
                                            <button type="submit" class="btn btn-normal btn-login">Sign Up</button>
                                        </div>
                                     </div>
                                     <div class="row ">
                                        <div class="col-md-12 ">
                                           <p>Have you already account? <a href="{{ route('user.logout') }}" class="txt-default">click</a> here
                                              to &nbsp;<a href="{{ route('user.logout') }}" class="txt-default">Login</a></p>
                                        </div>
                                     </div>
                                  </form>
                               </div>
                               <!-- end signUp-wrapper  -->
                            </div>
                            <!-- end col  -->

                            <div class="col-lg-8 col-sm-12">
                               <div class="signup-image-wrapper">
                                <img class="img-fluid" src="{{asset('frontend/assets/images/registation2.png')}}" width="400px" alt="">
                               </div>
                               <!-- end signup-image-wrapper  -->
                            </div>
                            <!-- end col  -->

                         </div>
                      </div>
                   </section>
                   <!--Section ends-->
                </div>

             </section>



@endsection
