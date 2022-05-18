
    <!-- banner-section -->
    <section class="banner-section">
        <div class="banner-carousel owl-theme owl-carousel owl-dots-none">
            <div class="slide-item">
                <div class="image-layer" style="background-image:url({{asset($themeTrue.'frontend/assets/images/banner/banner-1.jpg')}}"></div>
                <div class="overlay"></div>
                <div class="auto-container">
                    <div class="content-box">
                        <h5>AMARC Finance - Leading Financial Institution</h5>
                        <h1>Multi-regulated Global <br />Forex and Shares Broker</h1>
                        <div class="btn-box">
                            <a href="login" class="theme-btn style-one">Login</a>
                            <a href="login" class="user-btn"><i class="far fa-user"></i><span>Open an Account</span></a>
                        </div>
                    </div>  
                </div>
            </div>
            <div class="slide-item">
                <div class="image-layer" style="background-image:url({{asset($themeTrue.'frontend/assets/images/banner/banner-2.jpg')}}"></div>
                <div class="auto-container">
                    <div class="content-box centred">
                        <ul class="list-item clearfix">
                            <li>.&nbsp;<a href="#">Forex</a>&nbsp;.&nbsp;</li>
                            <li><a href="#">Stocks</a>&nbsp;.&nbsp;</li>
                            <li><a href="#">Cryptocurrency</a>&nbsp;.&nbsp;</li>
                        </ul>
                        <h1>We Help You Trade <br /> With Financial Thinking</h1>
                        <div class="btn-box">
                            <a href="#" class="theme-btn style-one mar-0">Talk to an Expert</a>
                        </div>
                    </div> 
                </div>
            </div>
            <!-- <div class="slide-item">
                <div class="image-layer" style="background-image:url({{asset($themeTrue.'frontend/assets/images/banner/banner-3.jpg)"></div>
                <div class="auto-container">
                    <div class="content-box">
                        <h5>get on the right way</h5>
                        <h1>Boosting Relations & <br />Loyalty, Anytime</h1>
                        <div class="btn-box">
                            <a href="index.html" class="theme-btn style-one mr-10">How Can We Help</a>
                            <a href="index.html" class="banner-btn-two">Find a Consultant</a>
                        </div>
                    </div>  
                </div>
            </div> -->
        </div>
    </section>
    <!-- banner-section end -->
    
<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
    <div class="tradingview-widget-container__widget"></div>
    <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/" rel="noopener" target="_blank"><span class="blue-text">Markets</span></a> by TradingView</div>
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
    {
    "symbols": [
      {
        "proName": "FOREXCOM:SPXUSD",
        "title": "S&P 500"
      },
      {
        "proName": "FOREXCOM:NSXUSD",
        "title": "US 100"
      },
      {
        "proName": "FX_IDC:EURUSD",
        "title": "EUR/USD"
      },
      {
        "proName": "BITSTAMP:BTCUSD",
        "title": "Bitcoin"
      },
      {
        "proName": "BITSTAMP:ETHUSD",
        "title": "Ethereum"
      }
    ],
    "showSymbolLogo": false,
    "colorTheme": "dark",
    "isTransparent": false,
    "displayMode": "adaptive",
    "locale": "en"
  }
    </script>
  </div>
  <!-- TradingView Widget END -->
