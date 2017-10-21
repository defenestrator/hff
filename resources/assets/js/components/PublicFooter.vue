<template>
<footer>
    <div class="container footer-text">
        <!-- About Us Section Start -->
        <div class="col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <a href="#about"><h4>About Us?</h4></a>
            <p>
                We listen to local anglers who smell like the water they fish. You know the ones.
                They give you 'the look' when they see rods on your truck. They know who the locals are.
                We are lucky enough to know a few anglers who <strong><em>live</em></strong> the water.
            </p>
            <h5>Forget <a style="color:#ababab;" href="/about" title="if you must know, click here.">about us.</a></h5>
            <br>
        </div>
        <div class="col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <newsletter-signup id="newsletter-signup"></newsletter-signup>
        </div>
        <div class="col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <!-- Contact Section Start -->
            <a href="#contact"><h4>Shout!</h4></a>
            <ul class="list-unstyled">
                <li>289 N. Hullen Pl.</li>
                <li>Star, ID 83669</li>
                <li class="footer-link">
                    <a href="tel:1-208-859-9133">
                        <i class="livicon icon4 icon3"
                           data-name="cellphone"
                           data-size="18"
                           data-loop="true"
                           data-c="#ccc" data-hc="#ccc"></i> (208)859-9133
                    </a>
                </li>
                <li class="footer-link">
                    <a href="/contact">
                        <i class="livicon icon3"
                           data-name="mail-alt"
                           data-size="20"
                           data-loop="true"
                           data-c="#ccc"
                           data-hc="#ccc"
                        ></i>
                        info@hoboflyshing.com
                    </a>
                </li>
            </ul>
            <hr id="hr_border2">
            <a href="#follow"><h4 class="menu">Hop Aboard</h4></a>
            <ul class="list-inline">
                <li>
                    <a href="https://fb.me/hoboflyfishing"> <i class="livicon" data-name="facebook" data-size="18" data-loop="true" data-c="#fff" data-hc="#757b87"></i>
                    </a>
                </li>
                <li>
                    <a href="https://twitter.com/flyfishidaho"> <i class="livicon" data-name="twitter" data-size="18" data-loop="true" data-c="#fff" data-hc="#757b87"></i>
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/hoboflyfishing/"> <i class="livicon" data-name="instagram" data-size="18" data-loop="true" data-c="#fff" data-hc="#757b87"></i>
                    </a>
                </li>
                <li>
                    <a href="https://www.youtube.com/channel/UCJwjEQAWMuxqnw5VT4a9zpg"> <i class="livicon" data-name="youtube" data-size="18" data-loop="true" data-c="#fff" data-hc="#757b87"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</footer>
</template>
<script>
    Vue.component('newsletter-signup', require('./NewsletterSignup.vue'))
</script>