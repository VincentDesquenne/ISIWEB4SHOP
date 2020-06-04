<html>
    <body>

        <div class="col justify-content-lg-center">

            <form action="index.php?action=payement" method="post">
                <div class="form-check col-lg-2">
                    <input class="form-check-input" type="radio" name="payement" value="0"/>
                    <label class="form-check-label" for="paypal">
                        Payer via Paypal
                    </label>
                </div>
                <div class="form-check col-lg-2">
                    <input class="form-check-input" type="radio" name="payement" value="1"/>
                    <label class="form-check-label" for="cheque">
                        Payer par cheque
                    </label>
                </div>
                <button type="submit" class="btn btn-secondary btn-lg center-block"> Payer </button>
            </form>
        </div>

    </body>
</html>
