<?php 
/*
Template Name: Contact TMPL
*/
get_header(); ?>

 <!-- Contact Section -->
<section class="hero-section">
        <div class="container">
            <div class="row g-4 align-items-stretch">
                <h4>Start a Conversation</h4>
                <p> If you’d like to work with ELMA, please share a few details below.  We’ll    review your message and respond 
                    within 2–3 business days to discuss next steps or schedule a discovery call<p>
            </div>

            <div class="row g-0 align-items-stretch">
                <div class="col-lg-12 d-flex flex-column bg-white p-4">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Your Name</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="First and Last" aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label"> Organization / Affiliation</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Optional" aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Your best contact email" aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label"> Phone Number*</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Your best contact phone number" aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5 mb-5">
                            <p>Type of Inquiry* (Select One) </p>
                            <div class="col-md-5">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Strategic Communications or Branding Project
                                </label>
                            </div>
                            <div class="col-md-3">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                     Speaking Engagement
                                </label>
                            </div>
                            <div class="col-md-4">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                     General Collaboration
                                </label>
                            </div>
                            <div class="col-md-5">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                     Training or Workshop
                                </label>
                            </div>
                            <div class="col-md-3">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                     Media / Interview Request
                                </label>
                            </div>
                        </div>

                        <div class="row mt-5 mb-5">
                            <p>Tell Us About Your Project or Event*</p>
                            <p> (What would you like to achieve? Please include key goals, audience, and timeline.)</p>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                <label for="floatingTextarea2"> Text field – up to 500 words</label>
                            </div>
                        </div>


                        <div class="row mb-5">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="datepicker">Preferred Start Date or Event Date</label>
                                    <input type="text" id="datepicker">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label"> How Did You Hear About ELMA? <br>Referral, social media, news, event, etc</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text"></div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1"> I consent to ELMA using my information for the purpose of responding to this inquiry</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        
                    </form>
                </div>
            </div>

        </div>
    </section>


<?php
get_footer();?>