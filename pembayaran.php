<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-c4wH5JnmoxeAQqF1"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<section class="payment-submit">
    <div class="payment-box">
        <h3>RINCIAN PEMBAYARAN</h3>
        <div class="foto-dokter">
            <img src=<?php echo base_url('Asset/img/81366-middle.png') ?> alt="Dokter">
            <div class="keterangan-dokter">
                <p class="nama-dokter">Dr. Dinan Eka</p>
                <p class="jenis-dokter">Spesialis Jantung</p>
            </div>
        </div>
        <div class="payment-desc">
            <h4>RINGKASAN PEMBAYARAN</h4>
            <div class="biaya-sesi">
                <p>Biaya Dokter</p>
                <p>Rp. 20.000</p>
            </div>
            <div class="bayar-sesi">
                <p>Bayar</p>
                <p>Rp. 20.000</p>
            </div>
        </div>
        <div class="container">
            <form id="payment-form" method="post" action="<?= site_url() ?>/snap/finish">
                <input type="hidden" name="result_type" id="result-type" value="">
                <input type="hidden" name="result_data" id="result-data" value="">
                <a href="#" id="pay-button" class="submit-payment"><button>Lanjut ke Pembayaran</button></a>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        $('#pay-button').click(function(event) {
            event.preventDefault();
            $(this).attr("disabled", "disabled");

            $.ajax({
                url: '<?= site_url() ?>/snap/token',
                cache: false,

                success: function(data) {
                    //location = data;

                    console.log('token = ' + data);

                    var resultType = document.getElementById('result-type');
                    var resultData = document.getElementById('result-data');

                    function changeResult(type, data) {
                        $("#result-type").val(type);
                        $("#result-data").val(JSON.stringify(data));
                        //resultType.innerHTML = type;
                        //resultData.innerHTML = JSON.stringify(data);
                    }

                    snap.pay(data, {

                        onSuccess: function(result) {
                            changeResult('success', result);
                            console.log(result.status_message);
                            console.log(result);
                            $("#payment-form").submit();
                        },
                        onPending: function(result) {
                            changeResult('pending', result);
                            console.log(result.status_message);
                            $("#payment-form").submit();
                        },
                        onError: function(result) {
                            changeResult('error', result);
                            console.log(result.status_message);
                            $("#payment-form").submit();
                        }
                    });
                }
            });
        });
    </script>
</section>

<section class="left-description">
    <div class="description-box">
        <h3>Konsultasi dengan dokter yang terpercaya</h3>
        <p>Konsultasi kesehatan membuat anda semakin banyak masalah</p>
        <div class="img-box">
            <img src="<?php echo base_url('Asset/img/hospital.png') ?>" alt="">
        </div>
        <p>Manfaat berkonsultasi di web kami :</p>
        <div class="list-manfaat">
            <div class="list-manfaat1">
                <img src="<?php echo base_url('Asset/img/81366-middle.png') ?>" alt="">
                <p>test</p>
            </div>
            <div class="list-manfaat2">
                <img src="<?php echo base_url('Asset/img/81366-middle.png') ?>" alt="">
                <p>test</p>
            </div>
            <div class="list-manfaat3">
                <img src="<?php echo base_url('Asset/img/81366-middle.png') ?>" alt="">
                <p>test</p>
            </div>
        </div>
    </div>
</section>