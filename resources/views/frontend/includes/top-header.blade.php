<style>
    .bottom-menu-lang-dropdown-list {
        width: max-content;
        top: 100%;
        right: 0;
        display: none;
        z-index: 100;
        position: absolute;
        min-width: 100%;
        transition: 0.3s;
        align-items: stretch;
        border-color: var(--dl-color-newtheme-highlight);
        border-width: 2px;
        border-radius: 4px;
        flex-direction: column;
        list-style-type: none;
        list-style-position: inside;
    }
    .goog-logo-link {
        display: none !important;
    }
    .goog-te-gadget {
        border: none !important;
        font-size: 11px;
        color: #ee7e15;
        white-space: nowrap;
        padding-top: 10px;
    }

    @media screen and (max-width: 344px) {
  .home-header-container {
      padding: 8px;
  }

  .header-header {
      padding-left: 10px !important;
      padding-right: 10px !important;
      flex-direction: column !important;
      align-items: center !important;
      justify-content: center !important;
      text-align: center !important;
  }

  .header-container,
  .header-container1,
  .header-container2,
  .header-call-to-action {
      flex-direction: column !important;
      align-items: center !important;
      justify-content: center !important;
      text-align: center !important;
      gap: 8px;
  }

  .header-social-bar {
      flex-direction: row;
      justify-content: center !important;
      align-items: center !important;
      flex-wrap: wrap;
      gap: 0px;
      padding: 0px;
  }

  .header-icon,
  .header-icon02,
  .header-icon04 {
      margin: 0 auto;
      width: 20px;
      height: 20px;
      margin-top: -5px
  }

  .header-address1,
  .header-call,
  .header-email1 {
      font-size: 12px;
      line-height: 1.4;
      text-align: center;
  }

  .header-title,
  .header-subtitle {
      font-size: 16px !important;
      text-align: center !important;
  }

  .header-button {
      width: 100%;
      padding: 8px 12px;
      font-size: 14px;
  }

  .header-logo img {
      max-width: 120px;
      height: auto;
  }
  button{
    margin-right: -35px
  }
}

@media screen and (max-width: 360px) {
    .header-social-bar {
      flex-direction: row;
      justify-content: center !important;
      align-items: center !important;
      flex-wrap: wrap;
      gap: 0px !important;
      padding: 8px;
  }
}

    @media screen and (max-width: 430px){
        .header-social-bar {
      flex-direction: row;
      justify-content: center !important;
      align-items: center !important;
      flex-wrap: wrap;
      gap: 0px !important;
      padding: 8px;
  }
    }



    @media screen and (max-width: 768px) {
  .home-header-container {
      padding: 10px;
  }

  .header-header {
      padding-left: 20px !important;
      padding-right: 20px !important;
      flex-direction: column !important;
      align-items: center !important;
      justify-content: center !important;
      text-align: center !important;
  }

  .header-container {
      flex-direction: column !important;
      align-items: center !important;
      justify-content: center !important;
      text-align: center !important;
      gap: 10px;
  }

  .header-call-to-action {
      flex-direction: column !important;
      align-items: center !important;
      gap: 10px;
      text-align: center;
  }

  .header-container1,
  .header-container2 {
      display: flex !important;
      flex-direction: column !important;
      align-items: center !important;
      justify-content: center !important;
      gap: 10px;
      text-align: center;
  }

  .header-social-bar {
      display: flex !important;
      flex-direction: row;
      justify-content: center !important;
      align-items: center !important;
      gap: 12px;
      padding: 10px;
      flex-wrap: wrap;
  }

  .header-icon,
  .header-icon02,
  .header-icon04 {
      margin: 0 auto;
      width: 24px;
      height: 24px;
  }

  .header-address1,
  .header-call,
  .header-email1 {
      display: block;
      text-align: center;
      font-size: 14px;
      line-height: 1.5;
  }

  /* Extra styles for better mobile appearance */
  .header-title,
  .header-subtitle {
      font-size: 18px !important;
      text-align: center !important;
  }

  .header-button {
      width: 100%;
      padding: 10px 15px;
      font-size: 16px;
  }

  .header-logo img {
      max-width: 150px;
      height: auto;
  }
}

@media screen and (max-width: 991px) {
    /* Hide long address to save vertical space */
    .header-address {
        display: none !important;
    }
    /* Compact the whole header bar */
    .header-header {
        padding: 6px 12px !important;
        min-height: unset !important;
    }
    .header-call-to-action {
        flex-direction: row !important;
        flex-wrap: wrap !important;
        gap: 8px !important;
        justify-content: center !important;
    }
    .header-mobile,
    .header-email {
        display: flex !important;
        align-items: center !important;
        gap: 4px !important;
    }
    .header-social-bar {
        flex-direction: row !important;
        justify-content: center !important;
        align-items: center !important;
        flex-wrap: nowrap !important;
        gap: 10px !important;
        padding: 4px 8px !important;
    }
    .header-social-bar button {
        min-width: 36px !important;
        min-height: 36px !important;
        margin: 0 !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        background: none !important;
        border: none !important;
        padding: 2px !important;
    }
    /* Google Translate compact */
    #google_translate_element {
        max-width: 120px !important;
        overflow: hidden !important;
    }
    .goog-te-gadget,
    .goog-te-combo {
        font-size: 11px !important;
        max-width: 110px !important;
    }
}






</style>

<div id="header" data-role="" class="home-header-container">
  <header class="header-header header-root-class-name13" style="background-color:  #dc4d01 !important;">
    <div class="header-container">
      <div class="header-call-to-action">
        <div class="header-address">
          <svg viewBox="0 0 1024 1024" class="header-icon">
            <path
              d="M512 490q44 0 75-31t31-75-31-75-75-31-75 31-31 75 31 75 75 31zM512 86q124 0 211 87t87 211q0 62-31 142t-75 150-87 131-73 97l-32 34q-12-14-32-37t-72-92-91-134-71-147-32-144q0-124 87-211t211-87z"
            ></path>
          </svg>
          <span class="header-address1" style="font-family:Times New Roman;">
            {{ getTopNavData('full_address') }}
          </span>
        </div>
        <div class="header-mobile">
          <svg viewBox="0 0 1024 1024" class="header-icon02">
            <path
              d="M854 656q18 0 30 12t12 30v148q0 50-42 50-298 0-512-214t-214-512q0-42 50-42h148q18 0 30 12t12 30q0 78 24 150 8 26-10 44l-82 72q92 192 294 290l66-84q12-12 30-12 10 0 14 2 72 24 150 24z"
            ></path>
          </svg>
          <a href="tel:{{ getTopNavData('phone') }}" class="header-call" style="font-family:Times New Roman;">
            {{ getTopNavData('phone') }}
        </a>


          </span>
        </div>
        <div class="header-email">
          <svg viewBox="0 0 1024 1024" class="header-icon04">
            <path
              d="M854 342v-86l-342 214-342-214v86l342 212zM854 170q34 0 59 26t25 60v512q0 34-25 60t-59 26h-684q-34 0-59-26t-25-60v-512q0-34 25-60t59-26h684z"
            ></path>
          </svg>

       <a href="mailto:{{ trim(getTopNavData('email')) }}?subject=Hello%20From%20Website&body=Dear%20Team,%0D%0A%0D%0AI%20would%20like%20to%20contact%20you..." class="header-email1" style="font-family:Times New Roman;">
    {{ getTopNavData('email') }}
</a>



        </div>
      </div>

      <div class="header-container1">
        <div class="header-container2">
          <div class="header-social-bar">
            <button>
              <a href="https://www.facebook.com/harun.rashid.56884761?mibextid=wwXIfr&rdid=U5mcc7125czXYgJS#" target="_blank">
                <svg viewBox="0 0 877.7142857142857 1024" class="home-icon33">
                  <path
                  d="M713.143 73.143c90.857 0 164.571 73.714 164.571 164.571v548.571c0 90.857-73.714 164.571-164.571 164.571h-107.429v-340h113.714l17.143-132.571h-130.857v-84.571c0-38.286 10.286-64 65.714-64l69.714-0.571v-118.286c-12-1.714-53.714-5.143-101.714-5.143-101.143 0-170.857 61.714-170.857 174.857v97.714h-114.286v132.571h114.286v340h-304c-90.857 0-164.571-73.714-164.571-164.571v-548.571c0-90.857 73.714-164.571 164.571-164.571h548.571z" >
                  </path>
                </svg>
              </a>
            </button>
              <button>
                  <a href="https://web.wechat.com/uklccp?lang=en_US&t=v2/index " target="_blank">
                      <svg width="30px" height="30px" class="home-icon33" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M11.8088 7.05902C11.3508 7.06746 10.9637 7.45766 10.9718 7.90277C10.9802 8.36421 11.3599 8.7252 11.8309 8.7196C12.3031 8.71385 12.6613 8.3491 12.6568 7.87785C12.6529 7.41534 12.2749 7.05051 11.8088 7.05902ZM7.35079 7.91557C7.36789 7.47215 6.98366 7.07275 6.52729 7.05933C6.06002 7.04561 5.67572 7.40269 5.66207 7.8632C5.64827 8.32985 6.0052 8.70373 6.47584 8.71569C6.94241 8.72757 7.33354 8.36996 7.35079 7.91557ZM15.8953 8.67099C14.0388 8.76798 12.4244 9.33078 11.1137 10.6023C9.7894 11.887 9.18488 13.4611 9.35012 15.4126C8.62446 15.3226 7.96351 15.2237 7.2988 15.1678C7.06924 15.1484 6.7968 15.1759 6.60235 15.2856C5.95689 15.6498 5.33812 16.061 4.60471 16.5195C4.73928 15.9108 4.82638 15.3778 4.98058 14.8652C5.09398 14.4884 5.04146 14.2788 4.69434 14.0333C2.46568 12.4599 1.52624 10.1051 2.22929 7.68071C2.87973 5.43794 4.47705 4.07778 6.64744 3.36875C9.60982 2.4011 12.939 3.38815 14.7404 5.74012C15.391 6.58969 15.7899 7.54323 15.8953 8.67099Z" fill="#fff"/>
                          <path d="M17.6884 12.3843C17.3253 12.3818 17.0167 12.6791 17.0019 13.046C16.9861 13.4383 17.2912 13.7605 17.6794 13.7615C18.055 13.7627 18.3517 13.4787 18.3655 13.105C18.38 12.7117 18.0749 12.387 17.6884 12.3843ZM13.3745 13.7662C13.7489 13.7666 14.057 13.4737 14.0711 13.1041C14.0861 12.7127 13.7713 12.3845 13.3795 12.3828C12.9915 12.381 12.6664 12.714 12.6799 13.0994C12.6927 13.4678 13.003 13.7658 13.3745 13.7662ZM20.0664 20.2452C19.4785 19.9835 18.9392 19.5907 18.3652 19.5308C17.7932 19.471 17.1919 19.801 16.5936 19.8622C14.771 20.0486 13.138 19.5407 11.7916 18.2956C9.23081 15.927 9.59671 12.2954 12.5594 10.3543C15.1925 8.62927 19.0542 9.20435 20.9107 11.598C22.5307 13.6866 22.3403 16.4592 20.3626 18.2139C19.7903 18.7217 19.5843 19.1397 19.9515 19.809C20.0193 19.9326 20.027 20.0891 20.0664 20.2452Z" fill="#fff"/>
                      </svg>
                  </a>
              </button>
{{--            <button>--}}
{{--            <a href="{{ getContentData(60, 'button_link'); }}"><svg xmlns="http://www.w3.org/2000/svg" class="home-icon33" viewBox="0 0 448 512"><path fill="#ffffff" d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm297.1 84L257.3 234.6 379.4 396H283.8L209 298.1 123.3 396H75.8l111-126.9L69.7 116h98l67.7 89.5L313.6 116h47.5zM323.3 367.6L153.4 142.9H125.1L296.9 367.6h26.3z"/></svg>--}}
{{--              </a>--}}
{{--            </button>--}}
            <button>
                <a href="https://wa.me/60195686867" target="_blank">
                  <svg width="30px" height="30px" class="home-icon33" viewBox="0 0 32 32" fill="#25D366" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16 .004C7.164.004 0 7.17 0 16c0 2.821.733 5.466 2.014 7.778L.03 32l8.391-2.003A15.956 15.956 0 0 0 16 31.996c8.836 0 16-7.166 16-16S24.836.004 16 .004zm0 29.404c-2.57 0-5.036-.687-7.207-1.988l-.514-.304-4.985 1.188 1.06-5.057-.333-.52a13.375 13.375 0 0 1-2.028-7.12c0-7.384 6.015-13.397 13.397-13.397 7.382 0 13.397 6.013 13.397 13.397S23.383 29.408 16 29.408zm7.523-10.67c-.412-.206-2.44-1.206-2.82-1.343-.38-.138-.656-.206-.933.206-.276.412-1.07 1.343-1.313 1.62-.243.276-.487.31-.9.103-.412-.207-1.741-.642-3.317-2.045-1.227-1.093-2.055-2.44-2.296-2.852-.243-.413-.026-.635.18-.84.184-.183.412-.478.618-.72.206-.243.275-.412.412-.688.137-.275.07-.516-.034-.72-.103-.207-.933-2.25-1.28-3.08-.337-.813-.68-.704-.933-.72l-.797-.014c-.276 0-.72.103-1.098.516-.38.412-1.44 1.407-1.44 3.43s1.474 3.975 1.678 4.248c.206.275 2.9 4.428 7.023 6.211 2.862 1.236 3.977 1.34 5.41 1.176 1.1-.138 2.44-1 2.783-1.964.343-.963.343-1.79.24-1.964-.103-.173-.38-.275-.793-.48z"/>
                  </svg>
                </a>
              </button>


{{--            <button>--}}
{{--                <a href="{{ getContentData(61, 'button_link'); }}">--}}
{{--                <svg width="30px" class="home-icon33" height="30px" viewBox="0 -3 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">--}}
{{--                  <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                      <g id="Dribbble-Light-Preview" transform="translate(-300.000000, -7442.000000)" fill="#fff">--}}
{{--                          <g id="icons" transform="translate(56.000000, 160.000000)">--}}
{{--                              <path d="M251.988432,7291.58588 L251.988432,7285.97425 C253.980638,7286.91168 255.523602,7287.8172 257.348463,7288.79353 C255.843351,7289.62824 253.980638,7290.56468 251.988432,7291.58588 M263.090998,7283.18289 C262.747343,7282.73013 262.161634,7282.37809 261.538073,7282.26141 C259.705243,7281.91336 248.270974,7281.91237 246.439141,7282.26141 C245.939097,7282.35515 245.493839,7282.58153 245.111335,7282.93357 C243.49964,7284.42947 244.004664,7292.45151 244.393145,7293.75096 C244.556505,7294.31342 244.767679,7294.71931 245.033639,7294.98558 C245.376298,7295.33761 245.845463,7295.57995 246.384355,7295.68865 C247.893451,7296.0008 255.668037,7296.17532 261.506198,7295.73552 C262.044094,7295.64178 262.520231,7295.39147 262.895762,7295.02447 C264.385932,7293.53455 264.28433,7285.06174 263.090998,7283.18289" id="youtube-[#168]">--}}

{{--              </path>--}}
{{--                          </g>--}}
{{--                      </g>--}}
{{--                  </g>--}}
{{--              </svg>--}}
{{--                </a>--}}
{{--              </button> --}}

            <div id="google_translate_element" style="font-family:Times New Roman;"></div>
            <script type="text/javascript">
                function googleTranslateElementInit() {
                    new google.translate.TranslateElement({
                        // pageLanguage: 'en',
                        includedLanguages: 'en,ar,zh-CN',
                        autoDisplay: false,
                    }, 'google_translate_element');
                }
            </script>

            <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


          </div>
        </div>
      </div>
    </div>
  </header>
</div>
