@extends('layouts.main')

@section('content')
    {{-- ── BREADCRUMB BANNER ── --}}
    <section class="pd-banner">
        <div class="pd-banner__inner">
            <span class="pd-banner__eyebrow">Home / Product Details</span>
            <h1 class="pd-banner__title">{{ $product->name }}</h1>
        </div>
    </section>

    {{-- ── MAIN PRODUCT VIEW ── --}}
    <section class="pd-view">
        <div class="pd-view__container">

            {{-- LEFT: Gallery filmstrip --}}
            <aside class="pd-gallery">
                <p class="pd-gallery__label">Gallery</p>
                <div class="pd-gallery__strip">
                    @forelse($product->gallery as $image)
                        <div class="pd-gallery__thumb {{ $loop->first ? 'is-active' : '' }}"
                            data-src="{{ asset('storage/' . $image->url) }}">
                            <img src="{{ asset('storage/' . $image->url) }}" alt="Product view">
                        </div>
                    @empty
                        <p class="pd-gallery__empty">No images</p>
                    @endforelse
                </div>
            </aside>

            {{-- CENTER: Main image --}}
            <div class="pd-main-image">
                <div class="pd-main-image__frame">
                    <img id="mainProductImage" src="{{ asset('storage/' . $product->mainImage->url) }}"
                        alt="{{ $product->name }}">
                </div>
            </div>

            {{-- RIGHT: Product info --}}
            <div class="pd-info">

                <span class="pd-info__brand">{{ $product->brand->name ?? 'N/A' }}</span>
                <h2 class="pd-info__name">{{ $product->name }}</h2>

                <div class="pd-info__price-row">
                    <span class="pd-info__currency">$</span>
                    <span class="pd-info__price" id="product-price">
                        {{ $product->variants->first()->price ?? $product->price }}
                    </span>
                </div>

                <p class="pd-info__short-desc">{{ $product->short_description }}</p>

                <div class="pd-info__divider"></div>

                {{-- Variant selector --}}
                <p class="pd-info__section-label">Choose Variant</p>
                <div class="pd-variants" id="variant-options">
                    @foreach ($product->variants as $v)
                        @php
                            $variantLabel = $v->attributes
                                ->map(fn($attr) => $attr->attribute->name . ': ' . $attr->value)
                                ->implode(', ');
                        @endphp
                        <label class="pd-variant-pill {{ $loop->first ? 'is-selected' : '' }}">
                            <input type="radio" name="variant" value="{{ $v->id }}"
                                data-price="{{ $v->price }}" data-stock="{{ $v->stock ?? 0 }}" class="variant-radio"
                                {{ $loop->first ? 'checked' : '' }}>
                            <span class="pd-variant-pill__text">{{ $variantLabel }}</span>
                            <span class="pd-variant-pill__price">${{ $v->price }}</span>
                        </label>
                    @endforeach
                </div>

                <div class="pd-info__divider"></div>

                {{-- Meta --}}
                <div class="pd-meta">
                    <div class="pd-meta__row">
                        <span class="pd-meta__key">Vendor</span>
                        <span class="pd-meta__val">{{ $product->brand->name ?? 'N/A' }}</span>
                    </div>
                    <div class="pd-meta__row">
                        <span class="pd-meta__key">Availability</span>
                        <span class="pd-meta__val stock-badge">
                            <span class="stock">{{ $product->variants->first()->stock ?? 0 }}</span> in stock
                        </span>
                    </div>
                </div>

                <div class="pd-info__divider"></div>

                {{-- Qty + Actions --}}
                <div class="pd-actions">
                    <div class="pd-qty">
                        <button type="button" class="pd-qty__btn" id="qty-minus">−</button>
                        <input type="text" id="qty" value="1" class="pd-qty__input" readonly>
                        <button type="button" class="pd-qty__btn" id="qty-plus">+</button>
                    </div>

                    <button class="pd-btn pd-btn--cart" id="add-to-cart-btn">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <circle cx="9" cy="21" r="1" />
                            <circle cx="20" cy="21" r="1" />
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6" />
                        </svg>
                        Add to Cart
                    </button>

                    <button
                        class="pd-btn pd-btn--wish wishlist-btn {{ auth()->check() && auth()->user()->wishlist->pluck('product_id')->contains($product->id) ? 'is-wishlisted' : '' }}"
                        data-product-id="{{ $product->id }}">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path
                                d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" />
                        </svg>
                        Wishlist
                    </button>
                </div>

            </div>{{-- /pd-info --}}

        </div>{{-- /pd-view__container --}}
    </section>

    {{-- ── TABS ── --}}
    <section class="pd-tabs-section">
        <div class="pd-tabs-section__inner">

            <div class="pd-tabs">
                <button class="pd-tab-btn is-active" data-tab="description">Description</button>
                <button class="pd-tab-btn" data-tab="benefits">Benefits</button>
                <button class="pd-tab-btn" data-tab="ingredients">Ingredients</button>
                <button class="pd-tab-btn" data-tab="howto">How to Use</button>
                <button class="pd-tab-btn" data-tab="protip">Pro Tip</button>
            </div>

            <div class="pd-tab-panels">
                <div class="pd-tab-panel is-active" id="description">{!! $product->long_description !!}</div>
                <div class="pd-tab-panel" id="benefits">{!! $product->benefits !!}</div>
                <div class="pd-tab-panel" id="ingredients">{!! $product->ingredients !!}</div>
                <div class="pd-tab-panel" id="howto">{!! $product->how_to_use !!}</div>
                <div class="pd-tab-panel" id="protip">{!! $product->pro_tip !!}</div>
            </div>

        </div>
    </section>

    {{-- ── REVIEWS ── --}}
    @php
        $reviews = $product->reviews->where('status', 1);
        $total = $reviews->count();
        $avg = $total ? round($reviews->avg('rating'), 1) : 0;
        $ratingCount = [
            5 => $reviews->where('rating', 5)->count(),
            4 => $reviews->where('rating', 4)->count(),
            3 => $reviews->where('rating', 3)->count(),
            2 => $reviews->where('rating', 2)->count(),
            1 => $reviews->where('rating', 1)->count(),
        ];
    @endphp

    <section class="pd-reviews">
        <div class="pd-reviews__inner">
            <h3 class="pd-reviews__heading">Customer Reviews</h3>

            {{-- Summary --}}
            <div class="pd-reviews__summary">
                <div class="pd-reviews__avg-box">
                    <span class="pd-reviews__big-score">{{ $avg }}</span>
                    <div class="pd-reviews__stars pd-reviews__stars--lg">
                        @for ($i = 1; $i <= 5; $i++)
                            <span class="{{ $i <= round($avg) ? 'star-fill' : 'star-empty' }}">★</span>
                        @endfor
                    </div>
                    <span class="pd-reviews__base">Based on {{ $total }} review(s)</span>
                </div>

                <div class="pd-reviews__bars">
                    @for ($i = 5; $i >= 1; $i--)
                        @php $pct = $total ? round(($ratingCount[$i] / $total) * 100, 1) : 0; @endphp
                        <div class="pd-bar-row">
                            <span class="pd-bar-row__label">{{ $i }}★</span>
                            <div class="pd-bar-row__track">
                                <div class="pd-bar-row__fill" data-pct="{{ $pct }}" style="width:0%"></div>
                            </div>
                            <span class="pd-bar-row__count">{{ $ratingCount[$i] }}</span>
                        </div>
                    @endfor
                </div>

                <div class="pd-reviews__cta-box">
                    <p class="pd-reviews__cta-text">Share your experience</p>
                    <button id="openReview" type="button" class="pd-btn pd-btn--dark">Write a Review</button>
                </div>
            </div>{{-- /summary --}}

            <div class="pd-reviews__divider"></div>

            {{-- Review list --}}
            @forelse($reviews as $review)
                <div class="pd-review-card">
                    <div class="pd-review-card__header">
                        <div>
                            <div class="pd-review-card__stars">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span class="{{ $i <= $review->rating ? 'star-fill' : 'star-empty' }}">★</span>
                                @endfor
                            </div>
                            <span class="pd-review-card__name">{{ $review->name }}</span>
                        </div>
                        <span class="pd-review-card__date">{{ $review->created_at->format('M d, Y') }}</span>
                    </div>

                    <p class="pd-review-card__body">{{ $review->content }}</p>

                    {{-- ✅ MEDIA PREVIEW --}}
                    @if ($review->files && $review->files->count())
                        <div class="pd-review-card__media">
                            @foreach ($review->files as $file)
                                @php
                                    $url = asset('storage/' . $file->url); // adjust if needed
                                    $isVideo = str_contains($file->mime_type, 'video');
                                @endphp

                                <div class="review-media-item">
                                    @if ($isVideo)
                                        <video src="{{ $url }}" class="review-media" muted></video>
                                        <div class="play-icon">▶</div>
                                    @else
                                        <img src="{{ $url }}" class="review-media" />
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @empty
                <p class="pd-reviews__empty">No reviews yet — be the first!</p>
            @endforelse


            {{-- Review form --}}
            <div id="reviewForm" class="pd-review-form" style="display:none;">
                <h4 class="pd-review-form__title">Write a Review</h4>

                <div id="reviewAlert" class="pd-review-form__alert" style="display:none;"></div>

                <div class="pd-review-form__stars-wrap">
                    <p class="pd-review-form__label">Your Rating</p>
                    <div id="formStarRating" class="pd-review-form__stars">
                        <span data-value="1">☆</span>
                        <span data-value="2">☆</span>
                        <span data-value="3">☆</span>
                        <span data-value="4">☆</span>
                        <span data-value="5">☆</span>
                    </div>
                    <input type="hidden" id="rating" value="0">
                </div>

                <div class="pd-review-form__grid">
                    <div class="pd-review-form__field">
                        <label>Display Name</label>
                        <input type="text" id="name" placeholder="Your name">
                    </div>
                    <div class="pd-review-form__field">
                        <label>Email Address</label>
                        <input type="email" id="email" placeholder="your@email.com">
                    </div>
                </div>

                <div class="pd-review-form__field">
                    <label>Review</label>
                    <textarea id="content" rows="4" placeholder="Tell others what you think…"></textarea>
                </div>

                <div class="pd-review-form__upload" onclick="document.getElementById('files').click()">
                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.5"
                        viewBox="0 0 24 24">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                        <polyline points="17 8 12 3 7 8" />
                        <line x1="12" y1="3" x2="12" y2="15" />
                    </svg>
                    <span>Upload Photo / Video <em>(optional)</em></span>
                    <input type="file" id="files" multiple hidden accept="image/*,video/*">
                </div>

                <div id="previewContainer" class="mt-3 d-flex flex-wrap justify-content-center gap-2"></div>

                <p class="pd-review-form__privacy">We only use your email to follow up on your review.</p>

                <div class="pd-review-form__actions">
                    <button id="cancelReview" type="button" class="pd-btn pd-btn--ghost">Cancel</button>
                    <button id="submitReview" type="button" class="pd-btn pd-btn--dark">
                        <span id="submitReviewText">Submit Review</span>
                    </button>
                </div>
            </div>
        </div>
    </section>
    <div id="mediaModal" class="media-modal">
        <span class="media-modal__close">&times;</span>
        <div class="media-modal__content"></div>
    </div>
@endsection

@section('css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600&family=DM+Sans:wght@300;400;500&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --pd-charcoal: #1a1a1a;
            --pd-off-white: #fbf5ec;
            --pd-gold: #c9a96e;
            --pd-gold-lt: #e8dcc8;
            --pd-sage: #e8ede8;
            --pd-muted: #6b6b6b;
            --pd-border: #a7a39d;
            --pd-font-display: 'Playfair Display', Georgia, serif;
            --pd-font-body: 'DM Sans', system-ui, sans-serif;
            --pd-radius: 4px;
            --pd-transition: 0.25s ease;
        }

        /* ═══════════════════════════════════════
                                                                               RESET (scoped)
                                                                            ═══════════════════════════════════════ */
        .pd-banner,
        .pd-view,
        .pd-tabs-section,
        .pd-reviews {
            font-family: var(--pd-font-body);
            color: var(--pd-charcoal);
            box-sizing: border-box;
        }

        .review-media-item {
            width: 80px;
            height: 80px;
            position: relative;
            margin-right: 8px;
            display: inline-block;
            cursor: pointer;
        }

        .review-media {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 6px;
        }

        .play-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 18px;
            pointer-events: none;
        }

        .media-modal {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.85);
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .media-modal__content img,
        .media-modal__content video {
            max-width: 90vw;
            max-height: 90vh;
            border-radius: 8px;
        }

        .media-modal__close {
            position: absolute;
            top: 20px;
            right: 30px;
            font-size: 32px;
            color: white;
            cursor: pointer;
        }

        /* *,
                                                            *::before,
                                                            *::after {
                                                                box-sizing: inherit;
                                                            } */

        /* ═══════════════════════════════════════
                                                                               BANNER
                                                                            ═══════════════════════════════════════ */
        .pd-banner {
            background: #f2ddc3;
            padding: 64px 40px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .pd-banner::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse 60% 80% at 50% 120%, rgba(201, 169, 110, 0.18) 0%, transparent 70%);
            pointer-events: none;
        }

        .pd-banner__eyebrow {
            display: block;
            font-family: var(--pd-font-body);
            font-size: 11px;
            font-weight: 400;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--pd-charcoal);
            margin-bottom: 12px;
        }

        .pd-banner__title {
            font-family: var(--pd-font-display);
            font-size: clamp(28px, 4vw, 48px);
            font-weight: 400;
            color: var(--pd-charcoal);
            margin: 0;
            letter-spacing: 0.02em;
        }

        /* ═══════════════════════════════════════
                                                                               PRODUCT VIEW
                                                                            ═══════════════════════════════════════ */
        .pd-view {
            background: var(--pd-off-white);
            padding: 60px 0;
        }

        .pd-view__container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 40px;
            display: grid;
            grid-template-columns: 100px 1fr 1fr;
            gap: 40px;
            align-items: start;
        }

        /* Gallery filmstrip */
        .pd-gallery__label {
            font-size: 10px;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: var(--pd-muted);
            margin-bottom: 16px;
            font-weight: 500;
        }

        .pd-gallery__strip {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .pd-gallery__thumb {
            width: 80px;
            height: 80px;
            border: 2px solid transparent;
            border-radius: var(--pd-radius);
            overflow: hidden;
            cursor: pointer;
            transition: border-color var(--pd-transition);
            background: #fff;
        }

        .pd-gallery__thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform var(--pd-transition);
        }

        .pd-gallery__thumb:hover img {
            transform: scale(1.05);
        }

        .pd-gallery__thumb.is-active {
            border-color: var(--pd-gold);
        }

        .pd-gallery__empty {
            font-size: 12px;
            color: var(--pd-muted);
        }

        /* Main image */
        .pd-main-image {
            position: sticky;
            top: 100px;
        }

        .pd-main-image__frame {
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            aspect-ratio: 3/4;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.06);
        }

        .pd-main-image__frame img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.4s ease;
        }

        .pd-main-image__frame:hover img {
            transform: scale(1.03);
        }

        /* Info panel */
        .pd-info {
            padding-top: 8px;
        }

        .pd-info__brand {
            font-size: 11px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--pd-gold);
            font-weight: 500;
        }

        .pd-info__name {
            font-family: var(--pd-font-display);
            font-size: clamp(22px, 2.5vw, 36px);
            font-weight: 500;
            margin: 8px 0 20px;
            line-height: 1.2;
            letter-spacing: 0.01em;
        }

        .pd-info__price-row {
            display: flex;
            align-items: baseline;
            gap: 4px;
            margin-bottom: 16px;
        }

        .pd-info__currency {
            font-size: 18px;
            color: var(--pd-muted);
            font-weight: 300;
        }

        .pd-info__price {
            font-family: var(--pd-font-display);
            font-size: 32px;
            font-weight: 500;
            color: var(--pd-charcoal);
            transition: color 0.2s;
        }

        .pd-info__short-desc {
            font-size: 14px;
            color: var(--pd-muted);
            line-height: 1.7;
            margin: 0;
        }

        .pd-info__divider {
            height: 1px;
            background: var(--pd-border);
            margin: 24px 0;
        }

        .pd-info__section-label {
            font-size: 11px;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: var(--pd-muted);
            font-weight: 500;
            margin-bottom: 14px;
        }

        /* Variant pills */
        .pd-variants {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .pd-variant-pill {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 16px;
            border: 1.5px solid var(--pd-border);
            border-radius: var(--pd-radius);
            cursor: pointer;
            transition: border-color var(--pd-transition), background var(--pd-transition);
            user-select: none;
        }

        .pd-variant-pill input[type="radio"] {
            display: none;
        }

        .pd-variant-pill:hover {
            border-color: var(--pd-gold);
        }

        .pd-variant-pill.is-selected {
            border-color: var(--pd-gold);
            background: linear-gradient(135deg, rgba(201, 169, 110, 0.08), rgba(201, 169, 110, 0.02));
        }

        .pd-variant-pill__text {
            font-size: 13px;
            font-weight: 400;
            color: var(--pd-charcoal);
        }

        .pd-variant-pill__price {
            font-size: 13px;
            font-weight: 500;
            color: var(--pd-gold);
        }

        /* Meta */
        .pd-meta {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .pd-meta__row {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 13px;
        }

        .pd-meta__key {
            min-width: 80px;
            color: var(--pd-muted);
            font-weight: 400;
        }

        .pd-meta__val {
            color: var(--pd-charcoal);
            font-weight: 500;
        }

        .stock-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--pd-sage);
            color: #3a5c3a;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 12px;
        }

        /* Actions */
        .pd-actions {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .pd-qty {
            display: flex;
            align-items: center;
            border: 1.5px solid var(--pd-border);
            border-radius: var(--pd-radius);
            overflow: hidden;
        }

        .pd-qty__btn {
            width: 40px;
            height: 46px;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 18px;
            color: var(--pd-charcoal);
            transition: background var(--pd-transition);
            font-family: var(--pd-font-body);
        }

        .pd-qty__btn:hover {
            background: var(--pd-sage);
        }

        .pd-qty__input {
            width: 48px;
            height: 46px;
            border: none;
            border-left: 1.5px solid var(--pd-border);
            border-right: 1.5px solid var(--pd-border);
            text-align: center;
            font-size: 15px;
            font-family: var(--pd-font-body);
            background: #fff;
            outline: none;
        }

        /* Buttons */
        .pd-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 13px 24px;
            border-radius: var(--pd-radius);
            font-family: var(--pd-font-body);
            font-size: 13px;
            font-weight: 500;
            letter-spacing: 0.5px;
            cursor: pointer;
            border: 1.5px solid transparent;
            transition: all var(--pd-transition);
        }

        /* .pd-btn.pd-btn--wish#add-to-cart-btn {
        padding: 13px 20px;

     } */
        .pd-btn--cart {
            background: var(--pd-charcoal);
            color: #fff;
            flex: 1;
        }

        .pd-btn--cart:hover {
            background: #333;
            transform: translateY(-1px);
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.18);
        }

        /* .wishlist-btn {
                                                            width: !important;
                                                            background: #000;
                                                            color: #ecdfcd;
                                                            border: none;
                                                            padding: 0 !important;
                                                            margin-bottom: 0 !important;
                                                            border-radius: 6px;
                                                            font-weight: 700;
                                                        } */

        .pd-btn.pd-btn--wish.wishlist-btn {
            width: auto !important;
            background: transparent !important;
            color: var(--pd-charcoal) !important;
            padding: 13px 24px !important;
            margin-bottom: 0 !important;
            border: 1.5px solid var(--pd-border) !important;
            border-radius: 4px !important;
        }

        /* .pd-btn--wish {
                                                            background: transparent;
                                                            border-color: var(--pd-border);
                                                            color: var(--pd-charcoal);
                                                        } */

        button.pd-btn.pd-btn--wish.wishlist-btn:hover {
            border-color: #c0392b !important;
            color: #c0392b !important;
        }

        .pd-btn--wish:hover,
        .pd-btn--wish.is-wishlisted {
            border-color: #c0392b !important;
            color: #c0392b !important;
        }

        .pd-btn--wish.is-wishlisted svg {
            fill: #c0392b !important;
        }

        .pd-btn--dark {
            background: var(--pd-charcoal);
            color: #fff;
            border-color: var(--pd-charcoal);
        }

        .pd-btn--dark:hover {
            background: #333;
        }

        .pd-btn--ghost {
            background: transparent;
            border-color: var(--pd-border);
            color: var(--pd-muted);
        }

        .pd-btn--ghost:hover {
            border-color: var(--pd-charcoal);
            color: var(--pd-charcoal);
        }

        /* ═══════════════════════════════════════
                                                                               TABS
                                                                            ═══════════════════════════════════════ */
        .pd-tabs-section {
            background: #fbf5ec;
            padding: 60px 0;
            border-top: 1px solid var(--pd-border);
        }

        .pd-tabs-section__inner {
            max-width: 820px;
            margin: 0 auto;
            padding: 0 40px;
        }

        .pd-tabs {
            display: flex;
            gap: 0;
            border-bottom: 1.5px solid var(--pd-border);
            margin-bottom: 40px;
            overflow-x: auto;
        }

        .pd-tab-btn {
            background: none;
            border: none;
            padding: 12px 20px;
            font-family: var(--pd-font-body);
            font-size: 13px;
            font-weight: 400;
            color: var(--pd-muted);
            cursor: pointer;
            position: relative;
            letter-spacing: 0.5px;
            white-space: nowrap;
            transition: color var(--pd-transition);
        }

        .pd-tab-btn::after {
            content: '';
            position: absolute;
            bottom: -1.5px;
            left: 0;
            right: 0;
            height: 2px;
            background: var(--pd-gold);
            transform: scaleX(0);
            transition: transform var(--pd-transition);
        }

        .pd-tab-btn.is-active {
            color: var(--pd-charcoal);
            font-weight: 500;
        }

        .pd-tab-btn.is-active::after {
            transform: scaleX(1);
        }

        .pd-tab-btn:hover {
            color: var(--pd-charcoal);
        }

        .pd-tab-panel {
            display: none;
            font-size: 15px;
            line-height: 1.8;
            color: var(--pd-muted);
        }

        .pd-tab-panel.is-active {
            display: block;
        }

        .pd-tab-panel h1,
        .pd-tab-panel h2,
        .pd-tab-panel h3 {
            font-family: var(--pd-font-display);
            color: var(--pd-charcoal);
            font-weight: 500;
            margin-top: 0;
        }

        /* ═══════════════════════════════════════
                                                                               REVIEWS
                                                                            ═══════════════════════════════════════ */
        .pd-reviews {
            background: var(--pd-off-white);
            padding: 72px 0;
            border-top: 1px solid var(--pd-border);
        }

        .pd-reviews__inner {
            max-width: 900px;
            margin: 0 auto;
            padding: 0 40px;
        }

        .pd-reviews__heading {
            font-family: var(--pd-font-display);
            font-size: clamp(22px, 2.5vw, 32px);
            font-weight: 400;
            text-align: center;
            margin-bottom: 48px;
            letter-spacing: 0.02em;
        }

        .pd-reviews__summary {
            display: grid;
            grid-template-columns: 1fr 2fr 1fr;
            gap: 40px;
            align-items: center;
            margin-bottom: 48px;
        }

        .pd-reviews__avg-box {
            text-align: center;
        }

        .pd-reviews__big-score {
            display: block;
            font-family: var(--pd-font-display);
            font-size: 56px;
            font-weight: 400;
            line-height: 1;
            color: var(--pd-charcoal);
        }

        .pd-reviews__stars {
            display: flex;
            gap: 2px;
            margin: 8px 0;
        }

        .pd-reviews__stars--lg {
            justify-content: center;
            font-size: 20px;
        }

        .star-fill {
            color: var(--pd-gold);
        }

        .star-empty {
            color: var(--pd-border);
        }

        .pd-reviews__base {
            font-size: 12px;
            color: var(--pd-muted);
        }

        .pd-bar-row {
            display: grid;
            grid-template-columns: 28px 1fr 24px;
            align-items: center;
            gap: 10px;
            margin-bottom: 8px;
            font-size: 12px;
            color: var(--pd-muted);
        }

        .pd-bar-row__track {
            height: 6px;
            background: var(--pd-border);
            border-radius: 3px;
            overflow: hidden;
        }

        .pd-bar-row__fill {
            height: 100%;
            background: var(--pd-gold);
            border-radius: 3px;
            transition: width 0.6s ease;
        }

        .pd-bar-row__count {
            text-align: right;
        }

        .pd-reviews__cta-box {
            text-align: center;
        }

        .pd-reviews__cta-text {
            font-size: 13px;
            color: var(--pd-muted);
            margin-bottom: 14px;
        }

        .pd-reviews__divider {
            height: 1px;
            background: var(--pd-border);
            margin: 40px 0;
        }

        .pd-reviews__empty {
            text-align: center;
            color: var(--pd-muted);
            font-size: 14px;
            padding: 40px 0;
        }

        /* Review cards */
        .pd-review-card {
            padding: 28px 0;
            border-bottom: 1px solid var(--pd-border);
        }

        .pd-review-card:last-of-type {
            border-bottom: none;
        }

        .pd-review-card__header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 12px;
        }

        .pd-review-card__stars {
            display: flex;
            gap: 2px;
            font-size: 14px;
            margin-bottom: 4px;
        }

        .pd-review-card__name {
            font-size: 14px;
            font-weight: 500;
            color: var(--pd-charcoal);
        }

        .pd-review-card__date {
            font-size: 12px;
            color: var(--pd-muted);
        }

        .pd-review-card__body {
            font-size: 14px;
            color: var(--pd-muted);
            line-height: 1.7;
            margin: 0;
        }

        /* Review form */
        .pd-review-form {
            background: #f2ddc3;
            border: 1px solid var(--pd-border);
            border-radius: 8px;
            padding: 40px;
            margin-top: 48px;
        }

        .pd-review-form__title {
            font-family: var(--pd-font-display);
            font-size: 22px;
            font-weight: 500;
            text-align: center;
            margin-bottom: 32px;
        }

        .pd-review-form__stars-wrap {
            text-align: center;
            margin-bottom: 28px;
        }

        .pd-review-form__label {
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--pd-muted);
            margin-bottom: 10px;
        }

        .pd-review-form__stars {
            font-size: 36px;
            cursor: pointer;
            color: var(--pd-gold);
            user-select: none;
            letter-spacing: 4px;
        }

        .pd-review-form__grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-bottom: 16px;
        }

        .pd-review-form__field {
            display: flex;
            flex-direction: column;
            gap: 6px;
            margin-bottom: 16px;
        }

        .pd-review-form__field label {
            font-size: 11px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--pd-muted);
            font-weight: 500;
        }

        .pd-review-form__field input,
        .pd-review-form__field textarea {
            border: 1.5px solid var(--pd-border);
            border-radius: var(--pd-radius);
            padding: 11px 14px;
            font-family: var(--pd-font-body);
            font-size: 14px;
            color: var(--pd-charcoal);
            outline: none;
            transition: border-color var(--pd-transition);
            background: var(--pd-off-white);
        }

        .pd-review-form__field input:focus,
        .pd-review-form__field textarea:focus {
            border-color: var(--pd-gold);
            background: #fff;
        }

        .pd-review-form__field textarea {
            resize: vertical;
        }

        .pd-review-form__upload {
            border: 1.5px dashed var(--pd-border);
            border-radius: var(--pd-radius);
            padding: 28px;
            text-align: center;
            cursor: pointer;
            color: var(--pd-muted);
            font-size: 14px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            transition: border-color var(--pd-transition), background var(--pd-transition);
            margin-bottom: 16px;
        }

        .pd-review-form__upload:hover {
            border-color: var(--pd-gold);
            background: rgba(201, 169, 110, 0.04);
        }

        .pd-review-form__upload em {
            font-style: normal;
            font-size: 12px;
            opacity: 0.6;
        }

        .pd-review-form__privacy {
            font-size: 12px;
            color: var(--pd-muted);
            text-align: center;
            margin-bottom: 24px;
        }

        .pd-review-form__actions {
            display: flex;
            justify-content: center;
            gap: 12px;
        }

        /* ═══════════════════════════════════════
                                                                               RESPONSIVE
                                                                            ═══════════════════════════════════════ */
        @media (max-width: 1024px) {
            .pd-view__container {
                grid-template-columns: 72px 1fr 1fr;
                gap: 24px;
                padding: 0 24px;
            }
        }

        @media (max-width: 768px) {
            .pd-view__container {
                grid-template-columns: 1fr;
                padding: 0 20px;
            }

            .pd-gallery {
                display: flex;
                flex-direction: row;
                align-items: center;
                gap: 16px;
                overflow-x: auto;
            }

            .pd-gallery__strip {
                flex-direction: row;
            }

            .pd-gallery__thumb {
                width: 64px;
                height: 64px;
                flex-shrink: 0;
            }

            .pd-main-image {
                position: static;
            }

            .pd-reviews__summary {
                grid-template-columns: 1fr;
                gap: 32px;
            }

            .pd-review-form__grid {
                grid-template-columns: 1fr;
            }

            .pd-tabs-section__inner,
            .pd-reviews__inner {
                padding: 0 20px;
            }

            .pd-review-form {
                padding: 24px 20px;
            }
        }
    </style>
@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            /* ── Gallery ── */
            const mainImg = document.getElementById('mainProductImage');
            const thumbs = document.querySelectorAll('.pd-gallery__thumb');
            thumbs.forEach(thumb => {
                thumb.addEventListener('click', function() {
                    thumbs.forEach(t => t.classList.remove('is-active'));
                    this.classList.add('is-active');
                    if (mainImg) mainImg.src = this.dataset.src;
                });
            });

            /* ── Variant radio pills ── */
            document.querySelectorAll('.variant-radio').forEach(radio => {
                radio.addEventListener('change', function() {
                    document.querySelectorAll('.pd-variant-pill').forEach(p => p.classList.remove(
                        'is-selected'));
                    this.closest('.pd-variant-pill').classList.add('is-selected');
                    const priceEl = document.getElementById('product-price');
                    const stockEl = document.querySelector('.stock');
                    if (priceEl) priceEl.textContent = this.dataset.price;
                    if (stockEl) stockEl.textContent = this.dataset.stock;
                    const qtyEl = document.getElementById('qty');
                    if (qtyEl) qtyEl.value = 1;
                });
            });

            /* ── Qty ── */
            const qtyPlus = document.getElementById('qty-plus');
            const qtyMinus = document.getElementById('qty-minus');
            if (qtyPlus) {
                qtyPlus.addEventListener('click', () => {
                    const qtyInput = document.getElementById('qty');
                    qtyInput.value = parseInt(qtyInput.value || 1) + 1;
                });
            }
            if (qtyMinus) {
                qtyMinus.addEventListener('click', () => {
                    const qtyInput = document.getElementById('qty');
                    qtyInput.value = Math.max(1, parseInt(qtyInput.value || 1) - 1);
                });
            }

            /* ── Tabs ── */
            document.querySelectorAll('.pd-tab-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    document.querySelectorAll('.pd-tab-btn').forEach(b => b.classList.remove(
                        'is-active'));
                    document.querySelectorAll('.pd-tab-panel').forEach(p => p.classList.remove(
                        'is-active'));
                    this.classList.add('is-active');
                    document.getElementById(this.dataset.tab).classList.add('is-active');
                });
            });

            /* ── Review summary bars: animate fill on load ── */
            document.querySelectorAll('.pd-bar-row__fill').forEach(fillEl => {
                const pct = parseFloat(fillEl.dataset.pct) || 0;
                // small delay so the CSS transition actually plays
                requestAnimationFrame(() => {
                    setTimeout(() => {
                        fillEl.style.width = pct + '%';
                    }, 50);
                });
            });

            /* ── Review form open/close ── */
            const openBtn = document.getElementById('openReview');
            const reviewForm = document.getElementById('reviewForm');
            const cancelBtn = document.getElementById('cancelReview');

            if (openBtn) {
                openBtn.addEventListener('click', () => {
                    reviewForm.style.display = 'block';
                    reviewForm.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                });
            }
            if (cancelBtn) {
                cancelBtn.addEventListener('click', () => {
                    reviewForm.style.display = 'none';
                });
            }

            /* ── Star rating input (form only — scoped to #formStarRating) ── */
            let selectedRating = 0;
            const ratingInput = document.getElementById('rating');
            const starEls = document.querySelectorAll('#formStarRating span');

            function paintStars(value) {
                starEls.forEach(s => {
                    s.textContent = (parseInt(s.dataset.value) <= value) ? '★' : '☆';
                });
            }

            starEls.forEach(star => {
                star.addEventListener('click', function() {
                    selectedRating = parseInt(this.dataset.value);
                    ratingInput.value = selectedRating;
                    paintStars(selectedRating);
                });
                // optional nice-to-have: hover preview
                star.addEventListener('mouseenter', function() {
                    paintStars(parseInt(this.dataset.value));
                });
                star.addEventListener('mouseleave', function() {
                    paintStars(selectedRating);
                });
            });



            /* ── Submit review (AJAX) ── */
            const submitBtn = document.getElementById('submitReview');
            const alertBox = document.getElementById('reviewAlert');
            const filesInput = document.getElementById('files');
            const previewContainer = document.getElementById('previewContainer');

            function showAlert(message, isError) {
                alertBox.textContent = message;
                alertBox.style.display = 'block';
                alertBox.style.padding = '12px 16px';
                alertBox.style.borderRadius = '4px';
                alertBox.style.marginBottom = '20px';
                alertBox.style.fontSize = '13px';
                alertBox.style.textAlign = 'center';
                if (isError) {
                    alertBox.style.background = '#fdecea';
                    alertBox.style.color = '#c0392b';
                } else {
                    alertBox.style.background = '#e8f5e9';
                    alertBox.style.color = '#2e7d32';
                }
            }

            if (submitBtn) {
                submitBtn.addEventListener('click', function() {
                    const name = document.getElementById('name').value.trim();
                    const email = document.getElementById('email').value.trim();
                    const content = document.getElementById('content').value.trim();
                    const rating = parseInt(ratingInput.value);
                    const productId = document.querySelector('input[name="product_id"]')?.value ||
                        document.getElementById('product_id')?.value ||
                        @json($product->id ?? null);

                    if (!rating || rating < 1) {
                        showAlert('Please select a star rating.', true);
                        return;
                    }
                    if (!name) {
                        showAlert('Please enter your name.', true);
                        return;
                    }
                    if (!email) {
                        showAlert('Please enter your email.', true);
                        return;
                    }
                    if (!content) {
                        showAlert('Please write your review.', true);
                        return;
                    }

                    const formData = new FormData();
                    formData.append('product_id', productId);
                    formData.append('name', name);
                    formData.append('email', email);
                    formData.append('rating', rating);
                    formData.append('content', content);

                    if (filesInput && filesInput.files.length) {
                        Array.from(filesInput.files).forEach(file => {
                            formData.append('review[]', file);
                        });
                    }

                    submitBtn.disabled = true;
                    document.getElementById('submitReviewText').textContent = 'Submitting…';

                    fetch("{{ url('/reviews/store') }}", {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .getAttribute('content'),
                                'Accept': 'application/json'
                            },
                            body: formData
                        })
                        .then(res => res.json())
                        .then(data => {
                            submitBtn.disabled = false;
                            document.getElementById('submitReviewText').textContent = 'Submit Review';

                            if (data.status) {
                                showAlert(data.message || 'Review submitted successfully.', false);
                                // reset form
                                document.getElementById('name').value = '';
                                document.getElementById('email').value = '';
                                document.getElementById('content').value = '';
                                selectedRating = 0;
                                ratingInput.value = 0;
                                paintStars(0);
                                previewContainer.innerHTML = '';
                                filesInput.value = '';
                            } else {
                                showAlert(data.message || 'Something went wrong.', true);
                            }
                        })
                        .catch(() => {
                            submitBtn.disabled = false;
                            document.getElementById('submitReviewText').textContent = 'Submit Review';
                            showAlert('Network error. Please try again.', true);
                        });
                });
            }

        });
    </script>
    <script>
        let fileStore = [];

        /* FILE SELECT */
        document.getElementById('files').addEventListener('change', function(e) {

            let newFiles = Array.from(e.target.files);

            newFiles.forEach(file => fileStore.push(file));

            renderPreview();
            updateInputFiles();
        });

        /* RENDER PREVIEW */
        function renderPreview() {

            let container = document.getElementById('previewContainer');
            container.innerHTML = '';

            fileStore.forEach((file, index) => {

                let reader = new FileReader();

                reader.onload = function(e) {

                    let isVideo = file.type.startsWith('video');

                    let item = document.createElement('div');
                    item.style.position = 'relative';

                    item.innerHTML = `
                ${isVideo
                    ? `<video src="${e.target.result}" width="80" height="80" controls style="object-fit:cover;border-radius:8px;"></video>`
                    : `<img src="${e.target.result}" width="80" height="80" style="object-fit:cover;border-radius:8px;">`
                }

                <span style="
                    position:absolute;
                    top:-6px;
                    right:-6px;
                    background:red;
                    color:#fff;
                    width:18px;
                    height:18px;
                    border-radius:50%;
                    font-size:12px;
                    cursor:pointer;
                    display:flex;
                    align-items:center;
                    justify-content:center;
                " onclick="removeFile(${index})">×</span>
            `;

                    container.appendChild(item);
                };

                reader.readAsDataURL(file);
            });
        }

        /* REMOVE FILE */
        function removeFile(index) {
            fileStore.splice(index, 1);
            renderPreview();
            updateInputFiles();
        }

        /* UPDATE INPUT (IMPORTANT FOR SUBMIT) */
        function updateInputFiles() {
            let input = document.getElementById('files');

            let dataTransfer = new DataTransfer();

            fileStore.forEach(file => dataTransfer.items.add(file));

            input.files = dataTransfer.files;
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const modal = document.getElementById('mediaModal');
            const modalContent = modal.querySelector('.media-modal__content');
            const closeBtn = modal.querySelector('.media-modal__close');

            // OPEN (event delegation)
            document.addEventListener('click', function(e) {
                const media = e.target.closest('.review-media');

                if (!media) return;

                modal.style.display = 'flex';

                if (media.tagName === 'IMG') {
                    modalContent.innerHTML = `<img src="${media.src}" />`;
                }

                if (media.tagName === 'VIDEO') {
                    modalContent.innerHTML = `
                <video src="${media.src}" controls autoplay></video>
            `;
                }
            });

            // CLOSE button
            closeBtn.addEventListener('click', function() {
                modal.style.display = 'none';
                modalContent.innerHTML = '';
            });

            // CLICK outside modal content
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.style.display = 'none';
                    modalContent.innerHTML = '';
                }
            });

        });
    </script>
@endsection
