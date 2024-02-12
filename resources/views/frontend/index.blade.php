@extends('frontend.layouts.master')

@section('body')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1>Touch And Earn Digital Platform</h1>
                    <h2>It’s a learning and earning prosses by using your valuable free time at home thought your
                        smartphone only. It’s a very eassy prosses and you can learn this prosses on your mother tounge
                        and you can earn form our comunity with selling some courses services or photo and video editing
                        and watching video.</h2>
                    <div>
                        <a href="{{ route('login') }}" class="btn-get-started scrollto">Log In</a>
                        <a href="{{ route('register') }}" class="btn-get-started scrollto">Regiester</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img">
                    <img src="{{ asset('frontend/assets/img/world.webp') }}" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <section id="about" class="about">
        <div class="container">

            <div class="row justify-content-between">
                <div class="col-lg-5 d-flex align-items-center justify-content-center about-img">
                    <img src="{{ asset('frontend/assets/img/about-img.png') }}" class="img-fluid" alt=""
                        data-aos="zoom-in">
                </div>
                <div class="col-lg-6 pt-2 pt-lg-0">
                    <h4 data-aos="fade-up">Touch And Earn Digital: Empowering Digital Income and Skill Development</h4>
                    <p data-aos="fade-up" data-aos-delay="100">
                        Touch And Earn Digital isn't just a company; it's a platform revolutionizing how individuals engage
                        with the digital world. Our members can earn rewards seamlessly by performing various tasks through
                        their online presence.
                    </p>
                    <div class="row">
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <i class="bx bx-receipt"></i>
                            <h4>*Upload, Like, and Share Images:*</h4>
                            <p>Members can earn points by creating a vibrant community, sharing photos, and staying engaged.
                            </p>
                        </div>
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                            <i class="bx bx-cube-alt"></i>
                            <h4>*Video Editing and Submission:* </h4>
                            <p> Showcase your creativity! Edit videos and earn points by submitting them on the platform.
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <i class="bx bx-receipt"></i>
                            <h4>*Task Completion:*</h4>
                            <p>Earn rewards for completing tasks available on your member ID.</p>
                        </div>
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                            <i class="bx bx-cube-alt"></i>
                            <h4>*Data Entry:*</h4>
                            <p>  Data entry involves typing information or text, a real source of income for many individuals working remotely from home over the internet.
                            </p>
                        </div>
                    </div>

                    <div data-bs-toggle="collapse" class="collapsed question" href="#faq12"><button href="" class="btn btn-warning px-4 mt-4">learn more</button>
                        <div id="faq12" class="collapse" data-bs-parent=".faq-list">
                            <div class="row">
                                <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                                    <i class="bx bx-receipt"></i>
                                    <h4>*Courses and Products:*</h4>
                                    <p> Learn and thrive! We offer courses in photo editing, video editing, and digital marketing. Additionally, members can sell courses and products on our platform.</p>
                                </div>
                                <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                                    <i class="bx bx-cube-alt"></i>
                                    <h4>*Advertisement Campaigns:*</h4>
                                    <p> Increase your income by advertising and reaching a wider audience.
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                                    <i class="bx bx-receipt"></i>
                                    <h4>*Sponsorships:*</h4>
                                    <p> Increase income by sponsoring companies for promotion.</p>
                                </div>
                                <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                                    <i class="bx bx-cube-alt"></i>
                                    <h4>*Photo and Video Editing:*</h4>
                                    <p> Unlock your artistic potential through our courses on photo and video editing.
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                                    <i class="bx bx-receipt"></i>
                                    <h4>*Digital Marketing Mastery:*</h4>
                                    <p>Dive into the world of digital marketing with our comprehensive courses.</p>
                                </div>
                                <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                                    <i class="bx bx-cube-alt"></i>
                                    <p>### Vision and Mission: </p>

                                    <p> At Touch And Earn Digital, our vision is to empower individuals for the full potential of the digital landscape. We believe in providing various earning opportunities alongside skill development and fostering a creative community.</p>

                                       <p> ### Join Us on the Digital Journey:</p>

                                        <p>Become a member of Touch And Earn Digital and embark on a journey where learning to earn is the path to shaping your career. Enhance your digital expertise and contribute to the growth of a dynamic online community. 🤟🤟🤟🤟🤟🤟</p>

                                        <p>Touch And Earn Digital: Where your digital presence transforms into income and expertise.</p>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section><!-- End About Section -->


    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Digital Marketing Courses</h2>
                <p>Check out the great services we offer</p>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon mb-2"><img src="{{ asset('frontend/photo-editing.jpg') }}" class="w-100" alt="">
                        </div>
                        <h4 class="title"><a href="">Photo Editing Through Mobile Apps</a></h4>
                        <p class="description">We will teach our Photo editing course, throuch a company prescribed,
                            flexible and user compitable mobile application through our multiple online class and trainer
                            guidence</p>

                            <div data-bs-toggle="collapse" class="collapsed question" href="#faq11"><button href="" class="btn btn-warning px-4 mt-4">learn more</button>
                                <div id="faq11" class="collapse" data-bs-parent=".faq-list">
                                        <p class="mt-2">1.Advertisement Making</p>
                                        <p>2.YouTube Thumbnail</p>
                                        <p>3.Poster Making</p>
                                        <p>4.Poster designing</p>
                                        <p>5.3D picture Making</p>
                                        <p>6.Photo designing</p>
                                </div>
                            </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box">
                        <div class="icon mb-2"><img src="{{ asset('frontend/video-editing .jpg') }}" class="w-100" alt="">
                        </div>
                        <h4 class="title"><a href="">Video Editing Through Mobile Apps</a></h4>
                        <p class="description">We will teach our Video editing course, throuch a company prescribed,
                            flexible and user compitable mobile application through our multiple online class and trainer
                            guidence</p>

                            <div data-bs-toggle="collapse" class="collapsed question" href="#faq15"><button href="" class="btn btn-warning px-4 mt-4">learn more</button>
                                <div id="faq15" class="collapse" data-bs-parent=".faq-list">
                                        <p class="mt-2">1.Making Videos across picture</p>
                                        <p>2.Sound and effects in the video</p>
                                        <p>3.Speaking in front of the camara</p>
                                        <p>4.Screen recorder video Making</p>
                                        <p>5.Advertisement video Making</p>
                                </div>
                            </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <div class="icon mb-2"><img src="{{ asset('frontend/digital-marketing.jpg') }}" class="w-100" alt="">
                        </div>
                        <h4 class="title"><a href="">Digital Editing Through Mobile Apps</a></h4>
                        <p class="description">We will teach our Digital editing course, throuch a company prescribed,
                            flexible and user compitable mobile application through our multiple online class and trainer
                            guidence</p>

                            <div data-bs-toggle="collapse" class="collapsed question" href="#faq13"><button href="" class="btn btn-warning px-4 mt-4">learn more</button>
                                <div id="faq13" class="collapse" data-bs-parent=".faq-list">
                                        <p class="mt-2">1.Lead generation</p>
                                        <p>2.Sales processes</p>
                                        <p>3.Google adsense</p>
                                        <p>4.Manager Accounts Management</p>
                                        <p>5.Sales Management</p>
                                </div>
                            </div>

                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="400">
                    <div class="icon-box">
                        <div class="icon mb-2"><img src="{{ asset('frontend/SEO-editing .jpg') }}" class="w-100" alt="">
                        </div>
                        <h4 class="title"><a href="">SEO Editing Through Mobile Apps</a></h4>
                        <p class="description">We will teach our SEO editing course, throuch a company prescribed, flexible
                            and user compitable mobile application through our multiple online class and trainer guidence
                        </p>

                        <div data-bs-toggle="collapse" class="collapsed question" href="#faq10"><button href="" class="btn btn-warning px-4 mt-4">learn more</button>
                        <div id="faq10" class="collapse" data-bs-parent=".faq-list">
                                <p class="mt-2">1.Website SEO</p>
                                <p>2.Facebook SEO</p>
                                <p>3.Fast Page Ranking</p>
                                <p>4.Youtube SEO</p>
                                <p>5.Instagram SEO</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Services Section -->



    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>F.A.Q</h2>
                <p>Frequently Asked Questions</p>
            </div>

            <ul class="faq-list" data-aos="fade-up" data-aos-delay="100">

                <li>
                    <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">What is Touch And
                        Earn Digital Platform?<i class="bi bi-chevron-down icon-show"></i><i
                            class="bi bi-chevron-up icon-close"></i></div>
                    <div id="faq1" class="collapse" data-bs-parent=".faq-list">
                        <p>
                            Through learning, you can improve your performance on the Touch & Earn Digital Platform.
                            As you may demonstrate your talents on Facebook, Instagram, tiktok, and other social
                            media platforms, you can do the same on the Touch & Earn Digital Platform, which is a
                            learning platform for digital marketing. You can enhance your work performance or skill
                            in addition to learning.
                        </p>
                    </div>
                </li>

                <li>
                    <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">What types of papers
                        and technology are required for this course? <i class="bi bi-chevron-down icon-show"></i><i
                            class="bi bi-chevron-up icon-close"></i></div>
                    <div id="faq2" class="collapse" data-bs-parent=".faq-list">
                        <p>
                            There aren’t many prerequisites for taking these courses; all you need is an electronic
                            device with a reliable internet connection, like a smartphone or laptop.
                        </p>
                    </div>
                </li>

                <li>
                    <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">Can we complete this
                        at the convenience of our home? <i class="bi bi-chevron-down icon-show"></i><i
                            class="bi bi-chevron-up icon-close"></i></div>
                    <div id="faq3" class="collapse" data-bs-parent=".faq-list">
                        <p>
                            Because it is an online process, you can indeed take this course or use these services
                            from your home.
                        </p>
                    </div>
                </li>

                <li>
                    <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">Do we need any
                        admission fees ? <i class="bi bi-chevron-down icon-show"></i><i
                            class="bi bi-chevron-up icon-close"></i></div>
                    <div id="faq4" class="collapse" data-bs-parent=".faq-list">
                        <p>
                            Yes you need to pay admission fees for taking the course , product or services
                        </p>
                    </div>
                </li>

                <li>
                    <div data-bs-toggle="collapse" href="#faq5" class="collapsed question">Is this a part-time
                        or a full-time Work? <i class="bi bi-chevron-down icon-show"></i><i
                            class="bi bi-chevron-up icon-close"></i></div>
                    <div id="faq5" class="collapse" data-bs-parent=".faq-list">
                        <p>
                            You must enroll here as a learner, and in addition to learning, you will be able to make
                            money by selling some courses’ associated items or services. It is not work or a job.
                        </p>
                    </div>
                </li>

            </ul>

        </div>
    </section><!-- End F.A.Q Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Team</h2>
                <p>Our team is always here to help</p>
            </div>

            <div class="row">

                <div class="col-xl-3 col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                    <div class="member">
                        <img src="{{ asset('frontend/assets/img/team/team-1.jpg') }}" class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>Walter White</h4>
                                <span>Chief Executive Officer</span>
                            </div>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                    <div class="member">
                        <img src="{{ asset('frontend/assets/img/team/team-2.jpg') }}" class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>Sarah Jhonson</h4>
                                <span>Product Manager</span>
                            </div>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                    <div class="member">
                        <img src="{{ asset('frontend/assets/img/team/team-3.jpg') }}" class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>William Anderson</h4>
                                <span>CTO</span>
                            </div>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="400">
                    <div class="member">
                        <img src="{{ asset('frontend/assets/img/team/team-4.jpg') }}" class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>Amanda Jepson</h4>
                                <span>Accountant</span>
                            </div>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Team Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Clients</h2>
                <p>They trusted us</p>
            </div>

            <div class="clients-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper align-items-center">
                    <div class="swiper-slide"><img src="{{ asset('frontend/assets/img/clients/client-1.png') }}"
                            class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{ asset('frontend/assets/img/clients/client-2.png') }}"
                            class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{ asset('frontend/assets/img/clients/client-3.png') }}"
                            class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{ asset('frontend/assets/img/clients/client-4.png') }}"
                            class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{ asset('frontend/assets/img/clients/client-5.png') }}"
                            class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{ asset('frontend/assets/img/clients/client-6.png') }}"
                            class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{ asset('frontend/assets/img/clients/client-7.png') }}"
                            class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{ asset('frontend/assets/img/clients/client-8.png') }}"
                            class="img-fluid" alt=""></div>
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Clients Section -->

    <!-- ======= Contact Us Section ======= -->
   {{-- <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Contact Us</h2>
                <p>Contact us the get started</p>
            </div>

            <div class="row">

                <div class="col-lg-5 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="info">
                        <div class="address">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Location:</h4>
                            <p>A108 Adam Street, New York, NY 535022</p>
                        </div>

                        <div class="email">
                            <i class="bi bi-envelope"></i>
                            <h4>Email:</h4>
                            <p>info@example.com</p>
                        </div>

                        <div class="phone">
                            <i class="bi bi-phone"></i>
                            <h4>Call:</h4>
                            <p>+1 5589 55488 55s</p>
                        </div>

                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                    </div>

                </div>

                <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">Your Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Your Name" required>
                            </div>
                            <div class="form-group col-md-6 mt-3 mt-md-0">
                                <label for="name">Your Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="name">Subject</label>
                            <input type="text" class="form-control" name="subject" id="subject"
                                placeholder="Subject" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="name">Message</label>
                            <textarea class="form-control" name="message" rows="10" required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">Send Message</button></div>
                    </form>
                </div>

            </div>

        </div>
    </section> --}}
    <!-- End Contact Us Section -->

    </main><!-- End #main -->

@section('newslater')
    <div class="footer-newsletter">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h4>Join Our Newsletter</h4>
                    <form action="" method="post">
                        <input type="email" name="email"><input type="submit" value="Subscribe">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@endsection
