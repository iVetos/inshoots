<div class="ms-fullscreen-template" id="slider1-wrapper">
    <div id="slider-text">
        <div>
            Alex V. photography
        </div>
    </div>
    <!-- masterslider -->
    <div class="master-slider ms-skin-black-1" id="masterslider">
        <div class="ms-slide slide-2">
            <div class="slide-pattern"></div>{*}
            <h3 class="ms-layer thin-text-white blacktext" data-type="text" data-effect="rotate3dleft(50,0,0,480)" data-duration="2000" data-ease="easeInOutQuint">
                Alex V.
            </h3>
            <h3 class="ms-layer thin-text-black whitetext" data-type="text" data-effect="rotate3dright(-50,0,0,480)" data-duration="2000" data-ease="easeInOutQuint">
                Photography
            </h3>{*}
            <img src="/js/masterslider/style/blank.gif" data-src="/img/slides/2.jpg" alt="lorem ipsum dolor sit">
        </div>
        <div class="ms-slide slide-2">
            <div class="slide-pattern"></div>
            <img src="/js/masterslider/style/blank.gif" data-src="/img/slides/1.jpg" alt="lorem ipsum dolor sit">
        </div>
        <div class="ms-slide slide-3">
            <div class="slide-pattern"></div>
            <img src="/js/masterslider/style/blank.gif" data-src="/img/slides/3.jpg" alt="lorem ipsum dolor sit">
        </div>
        <div class="ms-slide slide-4">
            <div class="slide-pattern"></div>
            <img src="/js/masterslider/style/blank.gif" data-src="/img/slides//4.jpg" alt="lorem ipsum dolor sit">
        </div>
    </div>
    <!-- end of masterslider -->
</div>

{*}
<div id="container" class="intro-effect-fadeout">
    <!-- Top Navigation -->
    <header class="header">
        <div class="bg-img"><img src="/img/slides/1.jpg" alt="Background Image" /></div>
        <div class="title">
            <h1>Alex V. Photography</h1>
            <p><strong>Australian Based</strong></p>
        </div>
    </header>
    <button class="trigger" data-info="Click to see"><span>Trigger</span></button>
    <script src="/js/classie.js"></script>
</div>
<div id="carousel" class="carousel slide">
    <ol class="carousel-indicators">
        <li class="active" data-target="#carousel" data-slide-to="0"></li>
        <li data-target="#carousel" data-slide-to="1"></li>
        <li data-target="#carousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="item active">
            <img src="/img/slides/5.jpg" alt="">
            <div class="carousel-caption">
                <h3>Slide 1 title</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore libero natus quaerat quasi qui quo quod quos repudiandae similique totam vitae voluptatem voluptatibus, voluptatum! Ad animi delectus facilis provident quis.</p>
            </div>
        </div>
        <div class="item">
            <img src="/img/slides/2.jpg" alt="">
            <div class="carousel-caption">
                <h3>Slide 2 title</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore libero natus quaerat quasi qui quo quod quos repudiandae similique totam vitae voluptatem voluptatibus, voluptatum! Ad animi delectus facilis provident quis.</p>
            </div>
        </div>
        <div class="item">
            <img src="/img/slides/3.jpg" alt="">
            <div class="carousel-caption">
                <h3>Slide 3 title</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore libero natus quaerat quasi qui quo quod quos repudiandae similique totam vitae voluptatem voluptatibus, voluptatum! Ad animi delectus facilis provident quis.</p>
            </div>
        </div>
    </div>
    <a href="#carousel" class="left carousel-control" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a href="#carousel" class="right carousel-control" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
</div>{*}

<div id="main-portfolio" class="container-fluid">
    <div class="row">
        <h1><span>Portfolio Collections</span></h1>
        {foreach from=$menu_cats item="cat" name="cats"}
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <a href="/gallery/{$cat.id}" class="main-portfolio-link2">
                <img src="/admin/img/categories/{$cat.img}" class="img-responsive" alt="">
                <span class="main-portfolio-name animated fadeIn">
                    <span>
                        <img src="/img/collection-more.png" alt=""><br><br>
                        {$cat.name}
                    </span>
                </span>
            </a>
        </div>
        {/foreach}
    </div>
</div>

<div id="main-services" class="container-fluid hidden-xs">
    <div class="container">
        <div class="row">
            <h2><span>My Services</span></h2>
            {foreach from=$services item="service" name="services"}
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center">
                    <a href="/services/{$service.id}">
                        <img src="/admin/img/services/{$service.img}" alt="">
                        <span class="service-name">{$service.name}</span>
                    </a>
                </div>
            {/foreach}
        </div>
    </div>
</div>
{*}
<div id="main_products" class="wow bounceInUp">
    <div class="main_product_line"></div>
    <table>
    <tr>
    {foreach from=$products item="product"}
        <td><a href="/photo/{$product.id}" style="background-image: url('/admin/img/products/small_{$product.img_2}')"></a></td>
    {/foreach}</tr>
    </table>
    <div class="main_product_line"></div>
    <div class="clear"></div>
</div>{*}
{include file="lets_talk.tpl"}
{*}
<div id="main-instagram" class="container">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <a href="https://instagram.com/ichbinerster" class="pull-right" target="_blank"><img src="/img/inst.jpg" style="width: 100px; margin: 30px auto;" class="img-responsive" alt="" /></a>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 pull-left" style="padding-top: 70px;">
            FOLLOW MY INSTAGRAM: ICHBINERSTER
        </div>
    </div>
</div>{*}