
    <header class="stick">
        <div class="tb-br">
            <div class="container">
                <div class="scl1 float-left">
                    <a href="#" title="Twitter" itemprop="url" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="#" title="Facebook" itemprop="url" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" title="Instagram" itemprop="url" target="_blank"><i class="fab fa-instagram"></i></a>
                </div>
                <ul class="tp-lst float-right">
                    <li><i class="fas fa-envelope theme-clr"></i><a href="#" title="" itemprop="url"><span class="__cf_email__" data-cfemail="">info@thanhbinh-bca.vn</span></a></li>
                    <li><i class="flaticon-telephone theme-clr"></i>+(84) 123-345-678</li>
                    <li>
                        <a href="{{route('frontend::lang','vn')}}"><img src="{{asset('frontend/assets/images/vn.svg')}}" width="30" title="Tiếng Việt"> </a>
                        <a href="{{route('frontend::lang','en')}}"><img src="{{asset('frontend/assets/images/en.svg')}}" width="30" title="English"> </a>
                    </li>
                </ul>

            </div>
        </div>
        <div class="lg-mnu-sec sticky">
            <div class="container">
                <div class="logo">
                    <a href="{{route('frontend::home')}}" title="Logo Thanh Binh BCA" itemprop="url">
                        <img src="{{upload_url($setting['site_logo'])}}" alt="Logo Thanh Binh BCA" itemprop="image">
                    </a>
                </div>
                <nav>
                    <div>
                        @include('frontend::blocks.menu')
                        <a class="srch-btn theme-bg brd-rd3" href="#" title="" itemprop="url"><i class="fas fa-search"></i></a>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <div class="header-search">
        <span class="srch-cls-btn brd-rd5"><i class="fas fa-times"></i></span>
        <form>
            <input type="text" placeholder="Search Keywords Here...">
            <button type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>
    <div class="rspn-hdr">
        <div class="rspn-mdbr">
            <ul class="rspn-scil">
                <li><a href="#" title="Twitter" itemprop="url" target="_blank"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#" title="Facebook" itemprop="url" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#" title="Linkedin" itemprop="url" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                <li><a href="#" title="Google Plus" itemprop="url" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>
            </ul>
            <form class="rspn-srch">
                <input type="text" placeholder="Enter Your Keyword" />
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <div class="lg-mn">
            <div class="logo"><a href="index.html" title="Logo" itemprop="url"><img src="assets/images/logo2.png" alt="logo2.png" itemprop="image"></a></div>
            <div class="rspn-cnt">
                <span><i class="fas fa-envelope theme-clr"></i><a href="#" title="" itemprop="url">
                        <span class="__cf_email__" data-cfemail="4b22252d240b2e332a263b272e65282426">[email&#160;protected]</span></a></span>
                <span><i class="flaticon-telephone theme-clr"></i>+(00) 123-345-11</span>
            </div>
            <span class="rspn-mnu-btn brd-rd5"><i class="fa fa-list-ul"></i></span>
        </div>
        <div class="rsnp-mnu">
            <span class="rspn-mnu-cls"><i class="fa fa-times"></i></span>
            @include('frontend::blocks.menu_mobile')
        </div>
    </div>
