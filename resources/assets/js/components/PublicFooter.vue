<template>
<footer>
    <div class="container footer-text">
        <div class="col-sm-3 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <a href="/contact"><h4><i class="fa fa-fw fa-btn fa-exclamation-circle"></i>Shout</h4></a>
            <ul class="list-unstyled">
                <li class="footer-link">
                    <a href="tel:1-208-283-8654">
                        <i class="fa fa-phone" aria-hidden="true"></i> (208)283-8654
                    </a>
                </li>
                <li class="footer-link">
                    <a href="/contact">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        info
                    </a>
                </li>
            </ul>
            <hr id="hr_border2">
            <div class="hidden-xs">
                <h4 class="menu"><i class="fa fa-fw fa-btn fa-globe"></i>Hop Aboard</h4>
                <ul class="list-inline">
                    <li>
                        <a href="https://fb.me/hoboflyfishing">
                            <i style="color:white;" class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/flyfishidaho">
                            <i style="color:white;" class="fa fa-twitter" aria-hidden="true"></i>

                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/hoboflyfishing/">
                            <i style="color:white;" class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/channel/UCJwjEQAWMuxqnw5VT4a9zpg">
                            <i style="color:white;" class="fa fa-youtube-play" aria-hidden="true"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-sm-8 col-sm-offset-1 col-xs-10 col-xs-offset-1">
            <a href="/about"><h4><i class="fa fa-fw fa-btn fa-question-circle"></i>About Us</h4></a>
            <p>
                We listen to local anglers who smell like the water they fish. You know the ones.
                They give you 'the look' when they see rods on your truck. They know who the locals are.
                We are lucky enough to know a few anglers who <strong><em>live</em></strong> the water.
            </p>
            <h5>Forget <a style="color:#ababab;" href="/about" title="if you must know, click here.">about us.</a></h5>
        </div>

    </div>
</footer>
</template>
<script>
    Vue.component('newsletter-signup', require('./NewsletterSignup.vue'))
</script>
