<section class="testimonials">
    <div class="container">
        <div class="title pb-5">

            <?php App\Helpers\Helper::inlineEditable(
                'h3',
                ['class' => ''],
                '
                                            Amplifycloser is loved by users
                                                        ',
                'HOMETXT18',
            ); ?>

        </div>
        <div class="test-slider">
            @foreach ($testimonials as $testimonial)
                <div class="test-main-item">
                    <div class="test-item">
                        <div class="test-img">
                            <img src="{{ asset($testimonial->img_path) }}" alt="{{ $testimonial->name }}">
                        </div>
                        <div class="test-name">
                            <h4>{{ $testimonial->name }}</h4>
                            <h6>{{ $testimonial->designation }}</h6>
                        </div>
                    </div>
                    <div class="test-con">
                        <p>{{ $testimonial->description }}</p>
                        <div class="ratting">
                            <ul>
                                @for ($i = 1; $i <= 5; $i++)
                                    <li><i class="{{ $i <= $testimonial->rating ? 'fa fa-star' : 'far fa-star' }}"></i>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
