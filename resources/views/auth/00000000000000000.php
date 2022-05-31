@extends('frontend.main_master')
@section('islamic')

<style>
/* new models design login and ragister page */
.groceryLoginPageContainer {
    height: 100vh;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #fff;
}
.groceryLoginPage {
    border: 1px solid #AFAEAF;
    border-radius: 5px;
}
.groceryLoginPageContainer .loginTitle {
    display: flex;
    justify-content: space-between;
}
.groceryLoginPageContainer .loginTitle p{
    font-size: 20px;
}.groceryLoginPageContainer .loginTitle .btn-close:hover{
    color: red;
}
.groceryLoginPageContainer .facebookLogin {
    background: #49639F;
    border: 1px solid #3E4E7C;
    text-align: center;
    border-radius: 3px;
    margin-top: 10px;
}
.groceryLoginPageContainer .facebookLogin:hover {
    background: #3E4E7C;
}
.groceryLoginPageContainer .facebookLogin button {
    background: transparent;
    border: transparent;
    color: #FFFFFF;
    padding: 15px 0;
    font-size: 18px;
    width: 100%;
}
.groceryLoginPageContainer .facebookLogin button span {
    font-weight: 700;
}
.groceryLoginPageContainer .emailLogin {
    background: #FFFFFF;
    border: 1px solid #AFAEAF;
    text-align: center;
    border-radius: 3px;
    margin-top: 10px;
}
.groceryLoginPageContainer .emailLogin:hover {
    background: #F3F3F3;
}
.groceryLoginPageContainer .emailLogin button {
    background: transparent;
    border: transparent;
    color: #464646;
    padding: 15px 0;
    font-size: 18px;
    width: 100%;
}
.groceryLoginPageContainer .emailLogin button .emailIcon {
    color: #FCD462;
}
.groceryLoginPageContainer .emailLogin button span {
    font-weight: 700;
}
.groceryLoginPageContainer .or {
    width: 100%;
    text-align: center;
    position: relative;
    margin-top: 10px;
    margin-bottom: 30px;
}
.groceryLoginPageContainer .or p {
    background-color: #fff;
    width: auto;
    display: inline-block;
    z-index: 3;
    padding: 0 20px 0 20px;
    color: #464646;
    position: relative;
    font-weight: bold;
    margin: 0;
}
.groceryLoginPageContainer .or::after {
    content: '';
    width: 100%;
    border-bottom: solid 1px #E8E8E8;
    position: absolute;
    left: 0;
    top: 50%;
}
.groceryLoginPageContainer .phoneContainer h6 {
    text-align: center;
    font-size: 14px;
    text-transform: uppercase;
    color: #464646;
    padding-bottom: 15px;
}
.groceryLoginPageContainer .phoneContainer .phoneNumberContainer {
    display: flex;
    align-items: center;
    width: 100%;
}
.groceryLoginPageContainer .phoneContainer .phoneNumberContainer img {
    height: 25px;
    margin-right: 10px;
}
.groceryLoginPageContainer .phoneContainer .phoneNumberContainer .number {
    width: 100%;
    border-bottom: 2px solid #E8E8E8;
    padding: 10px 0;
}
.groceryLoginPageContainer .phoneContainer .phoneNumberContainer .number input {
    width: 100%;
    border: transparent;
    font-size: 18px;
    margin-left: 30px;
}
.groceryLoginPageContainer .phoneContainer .phoneNumberContainer .number input:focus {
    outline: none;
}
.groceryLoginPageContainer .phoneContainer .hidePhoneText {
    text-align: center;
    padding: 5px 0;
    opacity: -1;
}
.groceryLoginPageContainer .singUpLogin {
    background: #fc5f00c2;
    border: 1px solid #fc5f00c2;
    text-align: center;
    border-radius: 3px;
    margin-top: 10px;
    box-shadow: 0 1px 6px rgb(0 0 0 / 50%);
}
.groceryLoginPageContainer .singUpLogin:hover {
    background:#fc5f00c2;
}
.groceryLoginPageContainer .pinCodeButton {
    display: flex;
    justify-content: center;
    align-items: center;
}
.groceryLoginPageContainer .pinCodeButton button {
    background: #F9B92E;
    border: 1px solid #F9B92E;
    text-align: center;
    border-radius: 3px;
    margin: 10px 10px 0 0;
    box-shadow: 0 1px 6px rgb(0 0 0 / 50%);
    color: #fff;
    padding: 5px 30px;
}
.groceryLoginPageContainer .pinCodeButton h6 {
    color: #F9B92E;
    margin-top: 12px;
}
.groceryLoginPageContainer .singUpLogin button {
    background: transparent;
    border: transparent;
    color: #fff;
    padding: 15px 0;
    font-size: 18px;
    width: 100%;
}
#loginWithEmail2 {
    display: block;
}
#loginWithPassword2 {
    display: none;
}
.emailInput[type="email"],
.pinCodeInput[type="text"],
.passwordInput[type="password"]
{
    box-sizing: border-box;
    width: 100%;
    height: calc(4em + 1px);
    margin: 0 0 1em;
    border: none;
    border-bottom: 1px solid #D3D3D3;
    background: #fff;
    resize: none;
    outline: none;
}
.emailInput[type="email"][required]:focus,
.pinCodeInput[type="text"][required]:focus,
.passwordInput[type="password"][required]:focus
{
   border-color: #F9B92E;
}
.emailInput[type="email"][required]:focus + label[placeholder]:before,
.pinCodeInput[type="text"][required]:focus + label[placeholder]:before,
.passwordInput[type="password"][required]:focus + label[placeholder]:before
{
   color: #F9B92E;
}
.emailInput[type="email"][required]:focus + label[placeholder]:before,
.emailInput[type="email"][required]:valid + label[placeholder]:before,
.pinCodeInput[type="text"][required]:focus + label[placeholder]:before,
.pinCodeInput[type="text"][required]:valid + label[placeholder]:before,
.passwordInput[type="password"][required]:focus + label[placeholder]:before,
.passwordInput[type="password"][required]:valid + label[placeholder]:before
{
    transition-duration: .2s;
    transform: translate(0, -1.5em) scale(1, 1);
}
.emailInput[type="email"][required]:invalid + label[placeholder][alt]:before,
.pinCodeInput[type="text"][required]:invalid + label[placeholder][alt]:before,
.passwordInput[type="password"][required]:invalid + label[placeholder][alt]:before
{
    content: attr(alt);
}
.emailInput[type="email"][required] + label[placeholder],
.pinCodeInput[type="text"][required] + label[placeholder],
.passwordInput[type="password"][required] + label[placeholder]
{
    display: block;
    pointer-events: none;
    line-height: 1em;
    margin-top: calc(-3.9em - 2px);
    margin-bottom: calc((4em - 1em) + 2px);
}
.emailInput[type="email"][required] + label[placeholder]:before,
.pinCodeInput[type="text"][required] + label[placeholder]:before,
.passwordInput[type="password"][required] + label[placeholder]:before
{
    content: attr(placeholder);
    display: inline-block;
    margin: 0;
    padding: 0;
    color: #898989;
    white-space: nowrap;
    transition: 0.3s ease-in-out;
}

</style>
       <section class="groceryLoginPageContainer">
            <div class="groceryLoginPage" style="width: 400px;">
                <div class="p-4">
                    <div class="loginTitle">
                        <p>Login</p>
                        <button type="button" class="btn-close"></button>
                    </div>
                    <!-- login With Email -->
                    <div id="loginWithEmail2">
                        <div class="facebookLogin" id="facebookLogin2">
                            <a href="{{ route('login.facebook') }}"><button><i class="fa-brands fa-facebook-f pe-2"></i> Sing Up or Login with
                            <span>Facebook</span></button></a>
                        </div>
                        <div class="facebookLogin bg-danger" id="facebookLogin2">
                        <a href="{{ route('login.google') }}"><button><i class="fa-brands fa-google pe-2"></i> Sing Up or Login with
                            <span>Google</span></button></a>
                    </div>
                        <div class="emailLogin">
                            <button onclick="next2()"><i class="fa-solid fa-envelope emailIcon pe-2"></i> Login
                                with <span>Email</span></button>
                        </div>
                        <div class="or">
                            <p>Or</p>
                        </div>
                    <form method="POST" action="{{ route('loginWithOtp') }}">
                            @csrf
                        <div id="phone-container-wrapper2">
                            <div class="phoneContainer">
                                <h6>Please Enter your mobile phone number</h6>
                                <div class="phoneNumberContainer">
                                    <img src="../assets/images/cosmeticProjectImage/potaka.jpg" alt="">
                                    <div class="number" id="number2">
                                        <input id="mobile_page" name="mobile" onclick="showText2()" type="text" value="+88">
                                    </div>
                                </div>
                                <p class="hidePhoneText" id="hidePhoneText2">e.g. +01712345678</p>
                            </div>
                            <div class="singUpLogin">
                                <button type="button" onclick="sentCodeInPhone2()">SIGN UP / LOGIN</button>
                            </div>
                        </div>
                        <div id="sent-phone-code-wrapper2" class="d-none">
                            <p class="text-center">We've sent a 4-digit one time PIN in your</p>
                            <h5 class="py-2 text-center" id="sent-number_page">+8801912345678</h5>
                            <div>
                                <input class="pinCodeInput" name="otp" type='text' required>
                                <label alt='Please enter 4-digit one time pin'
                                    placeholder='Please enter 4-digit one time pin'></label>
                            </div>
                            <div class="pinCodeButton">
                                <button>ENTER</button>
                                <h6>REQUEST PIN AGAIN</h6>
                            </div>
                        </div>
                    </form>
                    </div>
                    <!-- Login With Password -->
                    <div id="loginWithPassword2">
                        <div class="facebookLogin" id="facebookLogin2">
                         <a href="{{ route('login.facebook') }}">   <button><i class="fa-brands fa-facebook-f pe-2"></i> Sing Up or Login with
                                <span>Facebook</span></button> </a>
                        </div>
                         <div class="facebookLogin bg-danger" id="facebookLogin2">
                           <a href="{{ route('login.google') }}"> <button><i class="fa-brands fa-google pe-2"></i> Sing Up or Login with
                                <span>Google</span></button> </a>
                        </div>
                        <div class="emailLogin">
                            <button onclick="prev2()"><i class="fa-solid fa-mobile-button pe-2"></i>Login with
                                <span>Phone Number</span></button>
                        </div>
                        <div class="or">
                            <p>Or</p>
                        </div>
                        <form>
                            <div>
                            <input class="emailInput" id="loginEmailSingle" type='email' name="email"required>
                                <label alt='Email Address' placeholder='Email Address'></label>
                            </div>
                            <div>
                            <input class="passwordInput" id="loginPasswordSingle" type='password' name="password" required>
                                <label alt='Password' placeholder='Password'></label>
                            </div>
                            <div class="singUpLogin mt-5">
                                <button id="login_email_single">LOGIN</button>
                            </div>
                           
                            <a class="text-center pt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Forget password ?</a>
                        </form>
                    </div>
                    <div class="footer py-4">
                        <p>This site is protected by reCAPTCHA and the Google <span><a href="">Privacy
                                    Policy</a></span> and <span><a href="#">Terms of Service</a></span> apply.
                        </p>
                    </div>
                </div>
            </div>
        </section>
@endsection
@section('script')
<script>
            function showText2() {
                document.getElementById('hidePhoneText2').style.opacity = '1';
                document.getElementById('number2').style.borderBottom = '2px solid #FF7517';
            }
            function next2(){
                document.getElementById('loginWithEmail2').style.display = "none";
                document.getElementById('loginWithPassword2').style.display = "block";
            }
            function prev2(){
                document.getElementById('loginWithPassword2').style.display = "none";
                document.getElementById('loginWithEmail2').style.display = "block";
            }
            function sentCodeInPhone2 () {
                document.getElementById('sent-phone-code-wrapper2').classList.remove('d-none');
                document.getElementById('phone-container-wrapper2').classList.add('d-none');
                document.getElementById('facebookLogin2').classList.add('d-none');
                
                $('#sent-number_page').text($('#mobile_page').val());               
                document.getElementById('sent-phone-code-wrapper2').classList.remove('d-none');
                document.getElementById('phone-container-wrapper2').classList.add('d-none');
                document.getElementById('facebookLogin2').classList.add('d-none');

                event.target.style.display = "none";
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: 'sendOtp',
                    type: 'post',
                    data: {
                        'mobile': $('#mobile_page').val()
                    },
                    success: function (data) {
                        console.log(data);
                    },
                    error: function () {
                        console.log('error');
                    }
                });
            }


        $(document).ready(function(){
         
         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
         });
 
         $('#login_email_single').click(function(e) {
             e.preventDefault();           
             let email = $("#loginEmailSingle").val();
             let password = $("#loginPasswordSingle").val();

     
             $.ajax({
                 url: 'loginWithEmail',
                 type: "post",
                 dataType: "json",
                 data:{
                     'email': email,
                     'password': password
                 }, // the value of input having id vid
                 success: function(data){ // What to do if we succeed
                     if(data == 1){
                         location.reload();
                     }
                     
                 }
                 //console.log(data);
             });
         });
             
     });

    </script>

@endsection
