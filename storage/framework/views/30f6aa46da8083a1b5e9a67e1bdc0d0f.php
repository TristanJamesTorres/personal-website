

<?php $__env->startSection('title', $profile['displayName']); ?>
<?php $__env->startSection('description', $profile['tagline']); ?>

<?php $__env->startSection('content'); ?>
    <section class="hero" id="top">
        <div class="hero-stage">
            <div class="hero-stage-inner wrap">
                <h1 class="hero-wordmark-title">TRISTAN</h1>

                <figure class="hero-portrait">
                    <img src="<?php echo e(asset('images/tristan-cutout.png')); ?>" alt="Tristan James C. Torres, artist and web designer" fetchpriority="high">
                </figure>

                <div class="hero-intro" data-reveal>
                    <p><?php echo e($profile['tagline']); ?></p>
                    <div class="hero-actions">
                        <a href="<?php echo e(route('gallery')); ?>" class="button button-primary">Explore my work <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
                        <a href="<?php echo e(route('about')); ?>" class="button button-quiet">A little about me</a>
                    </div>
                </div>
            </div>
        </div>
        <a href="#welcome" class="scroll-cue"><span>Scroll to explore</span><i class="fa-solid fa-arrow-down" aria-hidden="true"></i></a>
    </section>

    <section class="welcome-section" id="welcome">
        <div class="wrap welcome-grid">
            <div class="welcome-copy" data-reveal>
                <span class="eyebrow">A space for the things I love</span>
                <h2>Welcome to<br>my <em>little corner.</em></h2>
                <p>From pencil and paper to pixels and code, this is where my different interests meet. Take a look around, find a piece that speaks to you, and let’s get creative together.</p>
                <a href="<?php echo e(route('gallery')); ?>" class="text-link">Find your favorite piece <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
            </div>
            <div class="welcome-photo" data-reveal>
                <img src="<?php echo e(asset('images/welcome.jpg')); ?>" alt="Portrait from Tristan’s original portfolio" loading="lazy">
                <span class="photo-caption">A little creativity goes a long way.</span>
            </div>
        </div>
    </section>

    <section class="section work-section" id="selected-work">
        <div class="wrap">
            <div class="section-heading" data-reveal>
                <div>
                    <span class="eyebrow">Collected along the way</span>
                    <h2 class="section-title">A few favorites<span>.</span></h2>
                </div>
                <a href="<?php echo e(route('gallery')); ?>" class="text-link">See the full gallery <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
            </div>

            <div class="featured-grid">
                <?php $__currentLoopData = $featuredArtworks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artwork): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('gallery.show', $artwork['slug'])); ?>" class="featured-card" data-reveal>
                        <div class="featured-image">
                            <img src="<?php echo e(asset($artwork['image'])); ?>" alt="<?php echo e($artwork['alt']); ?>" loading="lazy">
                            <span class="image-open" aria-hidden="true"><i class="fa-solid fa-arrow-up-right-from-square"></i></span>
                        </div>
                        <div class="featured-meta">
                            <span><?php echo e($artwork['categoryLabel']); ?></span>
                            <span><?php echo e($artwork['number']); ?></span>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

    <section class="category-section">
        <div class="wrap">
            <div class="section-heading" data-reveal>
                <div>
                    <span class="eyebrow">Pick a path</span>
                    <h2 class="section-title">What are you<br><em>in the mood for?</em></h2>
                </div>
                <p class="section-intro">Three collections, a hundred little windows into the things that inspire me.</p>
            </div>
            <div class="category-grid">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('gallery', ['category' => $key])); ?>" class="category-card" data-reveal>
                        <div class="category-icon"><i class="fa-solid <?php echo e($category['icon']); ?>" aria-hidden="true"></i></div>
                        <div>
                            <span class="category-count"><?php echo e($category['count']); ?> pieces</span>
                            <h3><?php echo e($category['label']); ?></h3>
                            <p><?php echo e($category['description']); ?></p>
                        </div>
                        <span class="category-arrow"><i class="fa-solid fa-arrow-right" aria-hidden="true"></i></span>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\MyWebsites\personal-website\resources\views/home.blade.php ENDPATH**/ ?>