@extends('layouts.base')
@section('content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
            style="background-image:url(../../assets/img/icons/spot-illustrations/corner-4.png);">
        </div>
        <!--/.bg-holder-->

        <div class="card-body position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Frequently Asked Questions</h3>
                    <p class="mb-0">Below you'll find answers to the questions we get <br class="d-none.d-sm-block"> asked
                        the most about to join with Falcon</p>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-body">
            <h6> <a href="#!">How does Falcon's pricing work?<svg class="svg-inline--fa fa-caret-right fa-w-6 ms-2"
                        aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-right" role="img"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512" data-fa-i2svg="">
                        <path fill="currentColor"
                            d="M0 384.662V127.338c0-17.818 21.543-26.741 34.142-14.142l128.662 128.662c7.81 7.81 7.81 20.474 0 28.284L34.142 398.804C21.543 411.404 0 402.48 0 384.662z">
                        </path>
                    </svg><!-- <span class="fas fa-caret-right ms-2"></span> Font Awesome fontawesome.com --></a></h6>
            <p class="fs--1 mb-0">The free version of Falcon is available for teams of up to 15 people. Our Falcon Premium
                plans of 15 or fewer qualify for a small team discount. As your team grows to 20 users or more and gets more
                value out of Falcon, you'll get closer to our standard monthly price per seat. The price of a paid Falcon
                plan is tiered, starting in groups of 5 and 10 users, based on the number of people you have in your Team or
                Organization.</p>
            <hr class="my-3">
            <h6> <a href="#!">What forms of payment do you accept?<svg
                        class="svg-inline--fa fa-caret-right fa-w-6 ms-2" aria-hidden="true" focusable="false"
                        data-prefix="fas" data-icon="caret-right" role="img" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 192 512" data-fa-i2svg="">
                        <path fill="currentColor"
                            d="M0 384.662V127.338c0-17.818 21.543-26.741 34.142-14.142l128.662 128.662c7.81 7.81 7.81 20.474 0 28.284L34.142 398.804C21.543 411.404 0 402.48 0 384.662z">
                        </path>
                    </svg><!-- <span class="fas fa-caret-right ms-2"></span> Font Awesome fontawesome.com --></a></h6>
            <p class="fs--1 mb-0">You can purchase Falcon with any major credit card. For annual subscriptions, we can issue
                an invoice payable by bank transfer or check. Please contact us to arrange an invoice purchase. Monthly
                purchases must be paid for by credit card.</p>
            <hr class="my-3">
            <h6> <a href="#!">We need to add more people to our team. How will that be billed?<svg
                        class="svg-inline--fa fa-caret-right fa-w-6 ms-2" aria-hidden="true" focusable="false"
                        data-prefix="fas" data-icon="caret-right" role="img" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 192 512" data-fa-i2svg="">
                        <path fill="currentColor"
                            d="M0 384.662V127.338c0-17.818 21.543-26.741 34.142-14.142l128.662 128.662c7.81 7.81 7.81 20.474 0 28.284L34.142 398.804C21.543 411.404 0 402.48 0 384.662z">
                        </path>
                    </svg><!-- <span class="fas fa-caret-right ms-2"></span> Font Awesome fontawesome.com --></a></h6>
            <p class="fs--1 mb-0">You can add as many new teammates as you need before changing your subscription. We will
                subsequently ask you to correct your subscription to cover current usage.</p>
            <hr class="my-3">
            <h6> <a href="#!">How secure is Falcon?<svg class="svg-inline--fa fa-caret-right fa-w-6 ms-2"
                        aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-right" role="img"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512" data-fa-i2svg="">
                        <path fill="currentColor"
                            d="M0 384.662V127.338c0-17.818 21.543-26.741 34.142-14.142l128.662 128.662c7.81 7.81 7.81 20.474 0 28.284L34.142 398.804C21.543 411.404 0 402.48 0 384.662z">
                        </path>
                    </svg><!-- <span class="fas fa-caret-right ms-2"></span> Font Awesome fontawesome.com --></a></h6>
            <p class="fs--1 mb-0">Protecting the data you trust to Falcon is our first priority. Falcon uses physical,
                procedural, and technical safeguards to preserve the integrity and security of your information. We
                regularly back up your data to prevent data loss and aid in recovery. Additionally, we host data in secure
                SSAE 16 / SOC1 certified data centers, implement firewalls and access restrictions on our servers to better
                protect your information, and work with third party security researchers to ensure our practices are secure.
            </p>
            <hr class="my-3">
            <h6> <a href="#!">Will I be charged sales tax?<svg class="svg-inline--fa fa-caret-right fa-w-6 ms-2"
                        aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-right" role="img"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512" data-fa-i2svg="">
                        <path fill="currentColor"
                            d="M0 384.662V127.338c0-17.818 21.543-26.741 34.142-14.142l128.662 128.662c7.81 7.81 7.81 20.474 0 28.284L34.142 398.804C21.543 411.404 0 402.48 0 384.662z">
                        </path>
                    </svg><!-- <span class="fas fa-caret-right ms-2"></span> Font Awesome fontawesome.com --></a></h6>
            <p class="fs--1 mb-0">As of May 2016, state and local sales tax will be applied to fees charged to customers
                with a billing address in the State of New York.</p>
            <hr class="my-3">
            <h6> <a href="#!">Do you offer discounts?<svg class="svg-inline--fa fa-caret-right fa-w-6 ms-2"
                        aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-right" role="img"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512" data-fa-i2svg="">
                        <path fill="currentColor"
                            d="M0 384.662V127.338c0-17.818 21.543-26.741 34.142-14.142l128.662 128.662c7.81 7.81 7.81 20.474 0 28.284L34.142 398.804C21.543 411.404 0 402.48 0 384.662z">
                        </path>
                    </svg><!-- <span class="fas fa-caret-right ms-2"></span> Font Awesome fontawesome.com --></a></h6>
            <p class="fs--1 mb-0">We've built in discounts at each tier for teams smaller than 15 members. We also offer two
                months for free in exchange for an annual subscription.</p>
            <hr class="my-3">
            <h6> <a href="#!">Do you offer academic pricing?<svg class="svg-inline--fa fa-caret-right fa-w-6 ms-2"
                        aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-right" role="img"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512" data-fa-i2svg="">
                        <path fill="currentColor"
                            d="M0 384.662V127.338c0-17.818 21.543-26.741 34.142-14.142l128.662 128.662c7.81 7.81 7.81 20.474 0 28.284L34.142 398.804C21.543 411.404 0 402.48 0 384.662z">
                        </path>
                    </svg><!-- <span class="fas fa-caret-right ms-2"></span> Font Awesome fontawesome.com --></a></h6>
            <p class="fs--1 mb-0">We're happy to work with student groups using Falcon. Contact Us</p>
            <hr class="my-3">
            <h6> <a href="#!">Is there an on-premise version of Falcon?<svg
                        class="svg-inline--fa fa-caret-right fa-w-6 ms-2" aria-hidden="true" focusable="false"
                        data-prefix="fas" data-icon="caret-right" role="img" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 192 512" data-fa-i2svg="">
                        <path fill="currentColor"
                            d="M0 384.662V127.338c0-17.818 21.543-26.741 34.142-14.142l128.662 128.662c7.81 7.81 7.81 20.474 0 28.284L34.142 398.804C21.543 411.404 0 402.48 0 384.662z">
                        </path>
                    </svg><!-- <span class="fas fa-caret-right ms-2"></span> Font Awesome fontawesome.com --></a></h6>
            <p class="fs--1 mb-0">We are passionate about the web. We don't plan to offer an internally hosted version of
                Falcon. We hope you trust us to provide a robust and secure service so you can do the work only your team
                can do.</p>
            <hr class="my-3">
            <h6> <a href="#!">What is your refund policy?<svg class="svg-inline--fa fa-caret-right fa-w-6 ms-2"
                        aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-right" role="img"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512" data-fa-i2svg="">
                        <path fill="currentColor"
                            d="M0 384.662V127.338c0-17.818 21.543-26.741 34.142-14.142l128.662 128.662c7.81 7.81 7.81 20.474 0 28.284L34.142 398.804C21.543 411.404 0 402.48 0 384.662z">
                        </path>
                    </svg><!-- <span class="fas fa-caret-right ms-2"></span> Font Awesome fontawesome.com --></a></h6>
            <p class="fs--1 mb-0">We do not offer refunds apart from exceptions listed below. If you cancel your plan
                before the next renewal cycle, you will retain access to paid features until the end of your subscription
                period. When your subscription expires, you will lose access to paid features and all data associated with
                those features. Exceptions to our refund policy: canceling within 48 hours of initial charge will result in
                a full refund. If you cancel within this timeframe, you will lose access to paid features and associated
                data immediately upon canceling.</p>
        </div>
        <div class="card-footer d-flex align-items-center bg-light">
            <h5 class="d-inline-block me-3 mb-0 fs--1">Was this information helpful?</h5>
            <button class="btn btn-falcon-default btn-sm">Yes</button>
            <button class="btn btn-falcon-default btn-sm ms-2">No</button>
        </div>
    </div>
@endsection
