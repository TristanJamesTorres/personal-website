

<?php $__env->startSection('title', $artwork['title']); ?>
<?php $__env->startSection('description', $artwork['alt']); ?>

<?php $__env->startSection('content'); ?>
    <section class="artwork-detail-section">
        <div class="wrap">
            <div class="detail-back-row">
                <a href="<?php echo e(route('gallery', ['category' => $artwork['category']])); ?>" class="text-link"><i class="fa-solid fa-arrow-left" aria-hidden="true"></i> Back to <?php echo e(strtolower($category['label'])); ?></a>
                <span><?php echo e($artwork['categoryLabel']); ?> · <?php echo e($artwork['number']); ?></span>
            </div>

            <figure class="detail-artwork" data-reveal>
                <img src="<?php echo e(asset($artwork['image'])); ?>" alt="<?php echo e($artwork['alt']); ?>">
                <figcaption>
                    <div>
                        <span class="eyebrow"><?php echo e($artwork['categoryLabel']); ?></span>
                        <h1><?php echo e($artwork['title']); ?></h1>
                    </div>
                    <span><?php echo e($artwork['number']); ?> <span class="detail-divider">/</span> <?php echo e(str_pad((string) $category['count'], 2, '0', STR_PAD_LEFT)); ?></span>
                </figcaption>
            </figure>

            <nav class="artwork-pagination" aria-label="Browse <?php echo e(strtolower($category['label'])); ?>">
                <a href="<?php echo e(route('gallery.show', $previous['slug'])); ?>" class="pagination-link">
                    <span><i class="fa-solid fa-arrow-left" aria-hidden="true"></i> Previous</span>
                    <strong><?php echo e($previous['title']); ?></strong>
                </a>
                <a href="<?php echo e(route('gallery', ['category' => $artwork['category']])); ?>" class="pagination-index" aria-label="Back to <?php echo e(strtolower($category['label'])); ?> gallery"><i class="fa-solid fa-grip" aria-hidden="true"></i></a>
                <a href="<?php echo e(route('gallery.show', $next['slug'])); ?>" class="pagination-link pagination-next">
                    <span>Next <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></span>
                    <strong><?php echo e($next['title']); ?></strong>
                </a>
            </nav>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\MyWebsites\personal-website\resources\views/gallery-show.blade.php ENDPATH**/ ?>