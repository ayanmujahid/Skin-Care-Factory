<section class="palaning">
    <div class="container">
        <div class="title text-center pb-5">

            <?php App\Helpers\Helper::inlineEditable(
                'h3',
                ['class' => ''],
                '
                                            We are planning to offer 3 subscriptions
                                                        ',
                'HOMETXT3',
            ); ?>


            <?php App\Helpers\Helper::inlineEditable(
                'p',
                ['class' => ''],
                '
                                            marketing campaign and set-up and organic lead generation campaign
                                                        ',
                'HOMETXT4',
            ); ?>

        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="planing-item">
                    <span>1</span>
                    <div class="planing-inner-item">
                        <img src="{{ asset('assets/images/planing-img-1.png') }}" alt="">
                    </div>
                    <div class="planing-content">

                        <?php App\Helpers\Helper::inlineEditable(
                            'h3',
                            ['class' => ''],
                            '
                                                        Sales Funnel set up with Videos Sales
                                                                    ',
                            'HOMETXT5',
                        ); ?>


                        <?php App\Helpers\Helper::inlineEditable(
                            'p',
                            ['class' => ''],
                            '
                                                        Define their target market, pain-point, desires, buying-power
                                                                    ',
                            'HOMETXT6',
                        ); ?>

                        <div class="planing-btn">
                            <a href="{{ route('pricing') }}" class="btn-1">Subscribe Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="planing-item">
                    <span>2</span>
                    <div class="planing-inner-item">
                        <img src="{{ asset('assets/images/planing-img-2.png') }}" alt="">
                    </div>
                    <div class="planing-content">

                        <?php App\Helpers\Helper::inlineEditable(
                            'h3',
                            ['class' => ''],
                            '
                                                        Real estate workflows automation
                                                                    ',
                            'HOMETXT7',
                        ); ?>


                        <?php App\Helpers\Helper::inlineEditable(
                            'p',
                            ['class' => ''],
                            '
                                                        Provide a something valuable to your audience, a unique insights or secrets
                                                                    ',
                            'HOMETXT8',
                        ); ?>

                        <div class="planing-btn">
                            <a href="{{ route('pricing') }}" class="btn-1">Subscribe Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="planing-item">
                    <span>3</span>
                    <div class="planing-inner-item">
                        <img src="{{ asset('assets/images/planing-img-3.png') }}" alt="">
                    </div>
                    <div class="planing-content">

                        <?php App\Helpers\Helper::inlineEditable(
                            'h3',
                            ['class' => ''],
                            '
                                                        Professional Services
                                                                    ',
                            'HOMETXT9',
                        ); ?>


                        <?php App\Helpers\Helper::inlineEditable(
                            'p',
                            ['class' => ''],
                            '
                                                        Present all the bonuses and garanties of your services to make it no-brainer
                                                                    ',
                            'HOMETXT10',
                        ); ?>

                        <div class="planing-btn">
                            <a href="{{ route('pricing') }}" class="btn-1">Subscribe Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>