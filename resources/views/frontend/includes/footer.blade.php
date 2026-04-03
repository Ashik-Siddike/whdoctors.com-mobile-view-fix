<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


<style>
    .footer-social-btn {
        background: #ff8b65;
        border: none;
        width: 48px;
        height: 48px;
        display: inline-block;
        /*padding-left: 20px;*/
        /*padding-top: 10px;*/
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        transition: 0.3s ease;
        color: #fff; /* Icon color white */
    }
    /*.footer-social-btn:hover {*/
    /*    background: #DC4D01;*/
    /*    transform: scale(1.12);*/
    /*}*/

    /*.footer-divider {*/
    /*    width: 100%;*/
    /*    height: 1px;*/
    /*    background: #7c7c7c;*/
    /*    margin: 20px 0;*/
    /*}*/

    .subscribe-btn {
        background: #ff8b65;
        color: white;
        /*padding: 10px 22px;*/
        font-weight: 500;
        border-radius: 30px;
        transition: 0.3s ease;
        /*display: flex;*/
        align-items: center;
        gap: 8px;
        /*width: 48px;*/
        height: 48px;
        /*padding-top: 10px;*/
    }
    /*.subscribe-btn:hover {*/
    /*    background-color: #bb2d3b !important;*/
    /*    transform: scale(1.05) !important;*/
    /*}*/

    /*!* WhatsApp icon green only *!*/
    /*.footer-social-btn.whatsapp {*/
    /*    color: #25D366 !important;*/
    /*}*/
</style>


<div class="footer1-footer footer1-root-class-name7" style="margin-top:0;">
    <footer class="footer1-container text-center">

        <div class="d-flex justify-content-center gap-3 mb-4 flex-wrap">

            <!-- Facebook -->
            <a href="https://www.facebook.com/harun.rashid.56884761?mibextid=wwXIfr&rdid=8ONij1q4pLoQw6LN#"  target="_blank" class="footer-social-btn" style="text-align-last: center;padding-top: 12px !important;">
                <i class="fab fa-facebook-f fa-lg"></i>
            </a>

            <!-- X (Twitter) -->
            <a href="https://x.com/harunra15855182?s=21&t=iflyIj4frFfr1lYxLwOKFw" target="_blank" class="footer-social-btn" style="text-align-last: center;padding-top: 12px !important;">
                <i class="fab fa-x-twitter fa-lg"></i>
            </a>

            <!-- WeChat -->
            <a href="https://web.wechat.com/uklccp?lang=en_US&t=v2/index " target="_blank" class="footer-social-btn" style="text-align-last: center;padding-top: 12px !important;">
                <i class="fab fa-weixin fa-lg"></i>
            </a>

            <!-- WhatsApp -->
            <a href="https://wa.me/60195686867" target="_blank" class="footer-social-btn whatsapp" style="text-align-last: center;padding-top: 12px !important;">
                <i class="fab fa-whatsapp fa-lg"></i>
            </a>

            <!-- YouTube -->
            <a href="{{ getContentData(61, 'button_link') }}" target="_blank" class="footer-social-btn" style="text-align-last: center;padding-top: 12px !important;">
                <i class="fab fa-youtube fa-lg"></i>
            </a>

            <!-- Subscribe -->
            <button class="subscribe-btn" data-bs-toggle="modal" data-bs-target="#emailModal">
                <i class="fa-solid fa-envelope"></i>
                Subscribe
            </button>

        </div>

        <div class="footer-divider"></div>

        <div class="footer1-container8">
            <span style="font-family:Times New Roman;">
{{--                {{ getContentData(17, 'title') }}--}}
            &copy; {{ now()->year }} WH Doctor's Study Lab Ltd. All rights reserved
            </span><br>
            <span style="font-family:Times New Roman;">
        Designed & Developed By:
        <a href="https://whdoctors.com/" target="_blank" style="font-family:Times New Roman;">whdoctors.com</a>
      </span>
        </div>

    </footer>
</div>
