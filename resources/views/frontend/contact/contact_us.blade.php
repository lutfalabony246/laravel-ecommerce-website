@extends('frontend.main_master')

@section('islamic')

<main>


    

    <div class="map_section clearfix">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1825.9918214524862!2d90.4031737!3d23.7479627!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b926c620f459%3A0xf0b4514991e507c8!2sExcel%20IT%20AI!5e0!3m2!1sbn!2sbd!4v1635045505234!5m2!1sbn!2sbd" width="100%" height="500px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>


    <!-- main_contact_section - start
    ================================================== -->
    <section class="main_contact_section sec_ptb_100 clearfix">
        <div class="container">
            <div class="row justify-content-lg-between">

                <div class="col-lg-5">
                    <div class="main_contact_content">
                        <h3 class="title_text mb_15">Get In Touch</h3>
                        <p class="mb_50">
                            If you are interested in working with us, please get in touch.
                        </p>
                        <ul class="main_contact_info ul_li_block clearfix">
                            <li>
                                <span class="icon">
                                    <i class="fal fa-map-marked-alt"></i>
                                </span>
                                <p class="mb-0">
                                    17, Alhaz Samsuddin Mansion (9th Floor), Moghbazar, New Easkaton, Ramna, Dhaka-1217
                                </p>
                            </li>
                            <li>
                                <span class="icon">
                                    <i class="fal fa-phone-volume"></i>
                                </span>
                                <p class="mb-0">+88 01611 815656</p>
                                
                            </li>
                            <li>
                                <span class="icon">
                                    <i class="fal fa-paper-plane"></i>
                                </span>
                                <p class="mb-0">info@excelitai.com</p>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="main_contact_form">
                        <h3 class="title_text mb_30">Contact</h3>
                        <form action="{{route('contactUs.send')}}" method="POST" >
                            @csrf
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form_item">
                                        <input type="text" name="name" placeholder="Your Name">
                                        @error('name')
                                            
                                            <span class="text-danger">{{$message}}</span>
                                    
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form_item">
                                        <input type="email" name="email" placeholder="Your Email">
                                        @error('email')
                                            
                                            <span class="text-danger">{{$message}}</span>
                                    
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form_item">
                                        <input type="text" name="subject" placeholder="Subject">
                                        @error('subject')
                                            
                                            <span class="text-danger">{{$message}}</span>
                                    
                                        @enderror
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="form_item">
                                <textarea name="message" placeholder="Your Message"></textarea>
                                @error('message')
                                            
                                    <span class="text-danger">{{$message}}</span>
                                    
                                 @enderror
                            </div>
                            <button type="submit" class="custom_btn bg_default_red text-uppercase">view projects</button>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- main_contact_section - end
    ================================================== -->


</main>
    
@endsection

