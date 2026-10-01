

<?php $__env->startSection('title', 'Gallery'); ?>
<?php $__env->startSection('description', 'Explore 104 traditional-art pieces, digital illustrations, and outfit photographs by Tristan James Torres.'); ?>

<?php $__env->startSection('content'); ?>
    <section class="page-intro-section gallery-intro">
        <div class="wrap page-intro-grid">
            <div data-reveal>
                <span class="eyebrow">The things I make & love</span>
                <h1 class="page-title">The creative<br><em>archive.</em></h1>
            </div>
            <p data-reveal>Sketchbook pages, digital worlds, and personal style. Take your time — there’s plenty to see.</p>
        </div>
    </section>

    <section class="gallery-section">
        <div class="wrap">
            <div class="gallery-topline">
                <span><?php echo e(count($artworks)); ?> <?php echo e(count($artworks) === 1 ? 'piece' : 'pieces'); ?></span>
            </div>

            <nav class="gallery-tabs" aria-label="Filter artwork by category">
                <a href="<?php echo e(route('gallery', $search !== '' ? ['q' => $search] : [])); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['is-active' => !$activeCategory]); ?>" <?php if(!$activeCategory): ?> aria-current="page" <?php endif; ?>>
                    Everything <span><?php echo e($categories['traditional-art']['count'] + $categories['digital-art']['count'] + $categories['outfits']['count']); ?></span>
                </a>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('gallery', array_filter(['category' => $key, 'q' => $search], fn ($value) => $value !== null && $value !== ''))); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['is-active' => $activeCategory === $key]); ?>" <?php if($activeCategory === $key): ?> aria-current="page" <?php endif; ?>>
                        <?php echo e($category['label']); ?> <span><?php echo e($category['count']); ?></span>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </nav>

            <?php if(count($artworks) === 0): ?>
                <div class="empty-state">
                    <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
                    <h2>Nothing in this frame</h2>
                    <p>Try a different search or browse another collection.</p>
                    <a href="<?php echo e(route('gallery')); ?>" class="button button-primary">View all artwork <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
                </div>
            <?php else: ?>
                <div class="artwork-grid">
                    <?php $__currentLoopData = $artworks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artwork): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('gallery.show', $artwork['slug'])); ?>"
                           class="artwork-card"
                           data-lightbox
                           data-image="<?php echo e(asset($artwork['image'])); ?>"
                           data-alt="<?php echo e($artwork['alt']); ?>"
                           data-title="<?php echo e($artwork['title']); ?>"
                           data-category="<?php echo e($artwork['categoryLabel']); ?>">
                            <div class="artwork-image">
                                <img src="<?php echo e(asset($artwork['image'])); ?>" alt="<?php echo e($artwork['alt']); ?>" loading="<?php echo e($loop->index < 6 ? 'eager' : 'lazy'); ?>" decoding="async">
                                <span class="artwork-zoom" aria-hidden="true"><i class="fa-solid fa-expand"></i></span>
                            </div>
                            <div class="artwork-caption">
                                <span><?php echo e($artwork['categoryLabel']); ?></span>
                                <span>No. <?php echo e($artwork['number']); ?></span>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <dialog class="lightbox" aria-label="Artwork viewer">
        <div class="lightbox-toolbar">
            <p class="lightbox-title"></p>
            <button class="icon-button lightbox-close" type="button" aria-label="Close artwork viewer"><i class="fa-solid fa-xmark" aria-hidden="true"></i></button>
        </div>
        <div class="lightbox-stage">
            <button class="icon-button lightbox-previous" type="button" aria-label="Previous artwork"><i class="fa-solid fa-arrow-left" aria-hidden="true"></i></button>
            <img class="lightbox-image" alt="">
            <button class="icon-button lightbox-next" type="button" aria-label="Next artwork"><i class="fa-solid fa-arrow-right" aria-hidden="true"></i></button>
        </div>
        <div class="lightbox-caption">
            <span class="lightbox-category"></span>
            <span class="lightbox-count"></span>
        </div>
    </dialog>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\MyWebsites\personal-website\resources\views/gallery.blade.php ENDPATH**/ ?>