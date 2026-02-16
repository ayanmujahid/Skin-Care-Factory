<section class="push" style="background-image: url(assets/images/push-img.png);">
    <div class="container">
        <div class="title text-center pb-5">
            
    <?php App\Helpers\Helper::inlineEditable(
        'h3',
        ['class' => ''],
        '
                                Push your business with us.
                                            ',
        'HOMETXT16',
    ); ?>

            
    <?php App\Helpers\Helper::inlineEditable(
        'p',
        ['class' => ''],
        '
                                TELSON MARKETING LLC is SaaS company offering digital marketing services in a subscription business model.
                                            ',
        'HOMETXT17',
    ); ?>

        </div>
        <div class="row">
            @foreach ($services as $service)
                <div class="col-md-4">
                    <div class="push-item">
                        <div class="push-inner-item">
                            <img src="{{ asset($service->img_path) }}" alt="{{ $service->title }}">
                        </div>
                        <div class="push-con">
                            <a href="{{ route('services-detail', $service->id) }}">
                                <h3>{{ $service->title }}</h3>
                            </a>
                            <p>
                                {{ $service->shor_desc }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>