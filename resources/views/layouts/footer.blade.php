<!--Page Footer-->
<footer id="page-footer">
    <span class="up-arrow">
        <a href="#up"><img alt="up" src=" {{ asset('mery/img/upArrow.png') }} "></a>
    </span>

    <span class="logo-wrapper">
        <img alt="logo" src="{{ asset('mery/img/logo.png') }}">
    </span>
    <section class="main-footer">
        <div class="container">
            <div class="row flex-row">
                <div class="col-lg-3 col-md-12 footer-section footer-section--1">
                    <div class="form-group form-select">
                        <label class="language-form" for="language">Site Language/Currency</label>
                        <select class="form-control" id="language" name="language">
                            <option value="en">English</option>
                            <option value="ar">Arabic</option>
                        </select>
                    </div>
                    <div class="form-group form-select">
                        <label class="sr-only" for="currency">Currency</label>
                        <select class="form-control" id="currency" name="currency">
                            <option value="usd">USD</option>
                            <option value="eur">EUR</option>
                            <option value="sar">SAR</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-2 col-md-12 footer-section footer-section--2">
                    <div class="app">
                        <img alt="app store btn" class="app-btn" src=" {{ asset('mery/img/btn-app.png') }}">
                    </div>
                    <div class="app">
                        <img alt="google play btn" class="app-btn" src="{{ asset('mery/img/btn-google.png') }}">
                    </div>

                </div>
                <div class="col-lg-2 col-sm-6 col-6 footer-section">
                    <h6 class="list-heading">About mery.com</h6>
                    <ul class="list-unstyled">
                        <li>
                            <a class="nav-link--footer" href="#">About</a>
                        </li>
                        <li>
                            <a class="nav-link--footer" href="#">Investor relations</a>
                        </li>
                        <li>
                            <a class="nav-link--footer" href="#">Careers</a>
                        </li>
                    </ul>

                </div>
                <div class="col-lg-2 col-sm-6 col-6 footer-section">
                    <h6 class="list-heading">Get help</h6>
                    <ul class="list-unstyled">
                        <li>
                            <a class="nav-link--footer" href="#">Safety Center</a>
                        </li>
                        <li>
                            <a class="nav-link--footer" href="#">Help and FAQs</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-12 footer-section">
                    <h6 class="list-heading">Discover</h6>
                    <ul class="list-unstyled">
                        <li>
                            <a class="nav-link--footer" href="#">HomePay℠ - nanny tax help</a>
                        </li>
                        <li>
                            <a class="nav-link--footer" href="#">List your business</a>
                        </li>
                        <li>
                            <a class="nav-link--footer" href="#">Care directory</a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </section>
    <section class="copyright">
        <div class="container">
            <div class="d-flex justify-content-between copyright--flex">
                <div class="date "> &copy;
                </div>

                <div class="footer-social">
                    <a href="#"><i class="fab fa-facebook-square subscribe-icon"></i></a>
                    <a href="#"><i class="fab fa-twitter subscribe-icon"></i></a>
                    <a href="#"><i class="fab fa-instagram subscribe-icon"></i></a>
                    <a href="#"><i class="fab fa-youtube subscribe-icon"></i></a>
                    <a href="#"><i class="fab fa-google-plus-g subscribe-icon"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p subscribe-icon"></i></a>
                </div>

            </div>
        </div>
    </section>

</footer>
