<?php
include("header.php");
require("connect.php");
$usr = $_SESSION['name'];
$amt = 0;

?>
<style>
    .print-button {
        text-align: center;
    }

    .content {
        display: inline-block;
        cursor: pointer;
        margin-top: 1em;
        padding: .5em 1em;
        color: white;
        text-decoration: none;
        font-size: 25px;
        border-radius: 3px;
        transition: .3s;
        background: #a60b0f;
    }

    .content:hover {
        background-color: #c40004;
    }
</style>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark ">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="viewcustomer.php">Book</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="viewcustomer-history.php">Travel History</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="viewcustomer-services.php">Services</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="viewcustomer-payment.php">Payment</a>
        </li>
    </ul>
</nav>
<div class="container m-3">
    <div class="card">
        <div class="card-header" style="background-color: #A21B00; color:bisque; text-align:center;font-size:1.2em;">Payment</div>
        <div class="card-body">
            <center>
                <h1> Payment left:
                    <?php
                    $sql = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM customer where cust_name ='$usr'"));
                    if ($sql['fare'] != null) {
                        echo $sql['fare'];
                        $amt = $sql['fare'];
                    } else {
                        echo 0;
                    }
                    ?>
                </h1>

                <div id="container" class="m-5"></div>
            </center>

            <div class="list-group">
                <?php
                $sql = mysqli_query($con, "SELECT * FROM book where cust_name='$usr'");
                if (mysqli_num_rows($sql)) {
                    while ($book = mysqli_fetch_assoc($sql)) {
                        $bookid = $book['bookid'];
                ?>
                        <div href="#" class="list-group-item list-group-item-action ">
                            <div class="d-flex w-100 justify-content-between">
                                <h1 class="mb-1"><?php echo $book['trans_id'] . " " . $book['trans_name']; ?></h1>
                                <h3 style="color:red;">RS <?php echo $book['trans_fare']; ?></h3>
                            </div>
                            <p class="mb-1">
                                The transportation is booked by the
                                <br>Name: <strong><?php echo $book['cust_name']; ?></strong>
                                <br>date: <strong><?php echo $book['date']; ?></strong>
                                <br>


                                <?php
                                $sql_service = mysqli_query($con, "SELECT * FROM service where bookid='$bookid' ");
                                if (mysqli_num_rows($sql_service)) {
                                    $book = mysqli_fetch_assoc($sql_service)
                                ?>
                                    <h3>Service</h3>
                                    <br>
                                    <ul style=" list-style: none">
                                        <li><?php if ($book['service1'] > 0) {
                                                echo "service1 =" . $book['service1'];
                                            } ?>
                                        </li>
                                        <li><?php if ($book['service2'] > 0) {
                                                echo "service2=" . $book['service2'];
                                            } ?>
                                        </li>
                                        <li><?php if ($book['service3'] > 0) {
                                                echo "service3=" . $book['service3'];
                                            } ?>
                                        </li>
                                    <?php

                                }
                                    ?>
                            </p>


                        </div>

                <?php

                    }
                }
                ?>

            </div>

            <script async src="https://pay.google.com/gp/p/js/pay.js" onload="onGooglePayLoaded()"></script>
        </div>
    </div>
    <div class="print-button my-3">

        <span class="print-button content  js__action--print" title="Print this page">
            Print Button
        </span>

    </div>
</div>
<script>
    $('.js__action--print').click(function() {
        window.print();
        return false;
    });
</script>
<script>
    /**
     * Define the version of the Google Pay API referenced when creating your
     * configuration
     *
     * @see {@link https://developers.google.com/pay/api/web/reference/request-objects#PaymentDataRequest|apiVersion in PaymentDataRequest}
     */
    const baseRequest = {
        apiVersion: 2,
        apiVersionMinor: 0,
    };

    /**
     * Card networks supported by your site and your gateway
     *
     * @see {@link https://developers.google.com/pay/api/web/reference/request-objects#CardParameters|CardParameters}
     * @todo confirm card networks supported by your site and gateway
     */
    const allowedCardNetworks = [
        "AMEX",
        "DISCOVER",
        "INTERAC",
        "JCB",
        "MASTERCARD",
        "VISA",
    ];

    /**
     * Card authentication methods supported by your site and your gateway
     *
     * @see {@link https://developers.google.com/pay/api/web/reference/request-objects#CardParameters|CardParameters}
     * @todo confirm your processor supports Android device tokens for your
     * supported card networks
     */
    const allowedCardAuthMethods = ["PAN_ONLY", "CRYPTOGRAM_3DS"];

    /**
     * Identify your gateway and your site's gateway merchant identifier
     *
     * The Google Pay API response will return an encrypted payment method capable
     * of being charged by a supported gateway after payer authorization
     *
     * @todo check with your gateway on the parameters to pass
     * @see {@link https://developers.google.com/pay/api/web/reference/request-objects#gateway|PaymentMethodTokenizationSpecification}
     */
    const tokenizationSpecification = {
        type: "PAYMENT_GATEWAY",
        parameters: {
            gateway: "example",
            gatewayMerchantId: "BCR2DN6T7PCZT2LI",
        },
    };

    /**
     * Describe your site's support for the CARD payment method and its required
     * fields
     *
     * @see {@link https://developers.google.com/pay/api/web/reference/request-objects#CardParameters|CardParameters}
     */
    const baseCardPaymentMethod = {
        type: "CARD",
        parameters: {
            allowedAuthMethods: allowedCardAuthMethods,
            allowedCardNetworks: allowedCardNetworks,
        },
    };

    /**
     * Describe your site's support for the CARD payment method including optional
     * fields
     *
     * @see {@link https://developers.google.com/pay/api/web/reference/request-objects#CardParameters|CardParameters}
     */
    const cardPaymentMethod = Object.assign({}, baseCardPaymentMethod, {
        tokenizationSpecification: tokenizationSpecification,
    });

    /**
     * An initialized google.payments.api.PaymentsClient object or null if not yet set
     *
     * @see {@link getGooglePaymentsClient}
     */
    let paymentsClient = null;

    /**
     * Configure your site's support for payment methods supported by the Google Pay
     * API.
     *
     * Each member of allowedPaymentMethods should contain only the required fields,
     * allowing reuse of this base request when determining a viewer's ability
     * to pay and later requesting a supported payment method
     *
     * @returns {object} Google Pay API version, payment methods supported by the site
     */
    function getGoogleIsReadyToPayRequest() {
        return Object.assign({}, baseRequest, {
            allowedPaymentMethods: [baseCardPaymentMethod],
        });
    }

    /**
     * Configure support for the Google Pay API
     *
     * @see {@link https://developers.google.com/pay/api/web/reference/request-objects#PaymentDataRequest|PaymentDataRequest}
     * @returns {object} PaymentDataRequest fields
     */
    function getGooglePaymentDataRequest() {
        const paymentDataRequest = Object.assign({}, baseRequest);
        paymentDataRequest.allowedPaymentMethods = [cardPaymentMethod];
        paymentDataRequest.transactionInfo = getGoogleTransactionInfo();
        paymentDataRequest.merchantInfo = {
            // @todo a merchant ID is available for a production environment after approval by Google
            // See {@link https://developers.google.com/pay/api/web/guides/test-and-deploy/integration-checklist|Integration checklist}
            // merchantId: '01234567890123456789',
            merchantName: "Example Merchant",
        };
        return paymentDataRequest;
    }

    /**
     * Return an active PaymentsClient or initialize
     *
     * @see {@link https://developers.google.com/pay/api/web/reference/client#PaymentsClient|PaymentsClient constructor}
     * @returns {google.payments.api.PaymentsClient} Google Pay API client
     */
    function getGooglePaymentsClient() {
        if (paymentsClient === null) {
            paymentsClient = new google.payments.api.PaymentsClient({
                environment: "TEST",
            });
        }
        return paymentsClient;
    }

    /**
     * Initialize Google PaymentsClient after Google-hosted JavaScript has loaded
     *
     * Display a Google Pay payment button after confirmation of the viewer's
     * ability to pay.
     */
    function onGooglePayLoaded() {
        const paymentsClient = getGooglePaymentsClient();
        paymentsClient
            .isReadyToPay(getGoogleIsReadyToPayRequest())
            .then(function(response) {
                if (response.result) {
                    addGooglePayButton(); // @todo prefetch payment data to improve performance after confirming site functionality // prefetchGooglePaymentData();
                }
            })
            .catch(function(err) {
                // show error in developer console for debugging
                console.error(err);
            });
    }

    /**
     * Add a Google Pay purchase button alongside an existing checkout button
     *
     * @see {@link https://developers.google.com/pay/api/web/reference/request-objects#ButtonOptions|Button options}
     * @see {@link https://developers.google.com/pay/api/web/guides/brand-guidelines|Google Pay brand guidelines}
     */
    function addGooglePayButton() {
        const paymentsClient = getGooglePaymentsClient();
        const button = paymentsClient.createButton({
            onClick: onGooglePaymentButtonClicked,
        });
        document.getElementById("container").appendChild(button);
    }

    /**
     * Provide Google Pay API with a payment amount, currency, and amount status
     *
     * @see {@link https://developers.google.com/pay/api/web/reference/request-objects#TransactionInfo|TransactionInfo}
     * @returns {object} transaction info, suitable for use as transactionInfo property of PaymentDataRequest
     */
    function getGoogleTransactionInfo() {
        return {
            countryCode: "US",
            currencyCode: "USD",
            totalPriceStatus: "FINAL", // set to cart total
            totalPrice: "1.00",
        };
    }

    /**
     * Prefetch payment data to improve performance
     *
     * @see {@link https://developers.google.com/pay/api/web/reference/client#prefetchPaymentData|prefetchPaymentData()}
     */
    function prefetchGooglePaymentData() {
        const paymentDataRequest = getGooglePaymentDataRequest(); // transactionInfo must be set but does not affect cache
        paymentDataRequest.transactionInfo = {
            totalPriceStatus: "NOT_CURRENTLY_KNOWN",
            currencyCode: "USD",
        };
        const paymentsClient = getGooglePaymentsClient();
        paymentsClient.prefetchPaymentData(paymentDataRequest);
    }

    /**
     * Show Google Pay payment sheet when Google Pay payment button is clicked
     */
    function onGooglePaymentButtonClicked() {
        const paymentDataRequest = getGooglePaymentDataRequest();
        paymentDataRequest.transactionInfo = getGoogleTransactionInfo();

        const paymentsClient = getGooglePaymentsClient();
        paymentsClient
            .loadPaymentData(paymentDataRequest)
            .then(function(paymentData) {
                // handle the response
                processPayment(paymentData);
            })
            .catch(function(err) {
                // show error in developer console for debugging
                console.error(err);
            });
    }

    /**
     * Process payment data returned by the Google Pay API
     *
     * @param {object} paymentData response from Google Pay API after user approves payment
     * @see {@link https://developers.google.com/pay/api/web/reference/response-objects#PaymentData|PaymentData object reference}
     */
    function processPayment(paymentData) {
        // show returned data in developer console for debugging
        console.log(paymentData); // @todo pass payment token to your gateway to process payment
        paymentToken = paymentData.paymentMethodData.tokenizationData.token;
    }
</script>