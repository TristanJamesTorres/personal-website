

<?php $__env->startSection('title', 'About Tristan'); ?>
<?php $__env->startSection('description', 'Meet Tristan James C. Torres: self-taught artist, web designer, and Information Technology student from San Pablo City, Laguna.'); ?>

<?php $__env->startSection('content'); ?>
    <section class="page-intro-section">
        <div class="wrap page-intro-grid">
            <div data-reveal>
                <span class="eyebrow">A little more about me</span>
                <h1 class="page-title">Curious mind.<br><em>Creative heart.</em></h1>
            </div>
            <p data-reveal>I’m Tristan — an artist and web designer learning how to bring thoughtful ideas to life, both on paper and on screen.</p>
        </div>
    </section>

    <section class="section about-section">
        <div class="wrap about-grid">
            <div class="about-portrait" data-reveal>
                <img src="<?php echo e(asset($profile['portrait'])); ?>" alt="Portrait drawing of Tristan" loading="lazy">
                <span class="portrait-caption"><?php echo e($profile['location']); ?></span>
            </div>
            <div class="about-story">
                <?php $__currentLoopData = $bio['paragraphs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paragraph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p><?php echo e($paragraph); ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <div class="about-facts">
                    <div class="fact-block">
                        <span class="eyebrow">Currently studying</span>
                        <p><?php echo e($profile['school']); ?></p>
                    </div>
                    <div class="fact-block">
                        <span class="eyebrow">Creative tools</span>
                        <ul class="tool-list">
                            <?php $__currentLoopData = $tools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tool): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($tool); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="interests-section">
        <div class="wrap">
            <div class="section-heading" data-reveal>
                <div>
                    <span class="eyebrow">A few of my favorite things</span>
                    <h2 class="section-title">The things that<br><em>make me, me.</em></h2>
                </div>
            </div>
            <div class="interest-grid">
                <?php $__currentLoopData = $interests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $interest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <article class="interest-card" data-reveal>
                        <i class="fa-solid <?php echo e($interest['icon']); ?>" aria-hidden="true"></i>
                        <h3><?php echo e($interest['label']); ?></h3>
                    </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="about-cta" data-reveal>
                <p>Good ideas grow when they’re shared.</p>
                <a href="<?php echo e(route('contact')); ?>" class="button button-primary">Let’s talk <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\MyWebsites\personal-website\resources\views/about.blade.php ENDPATH**/ ?>