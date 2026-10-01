

<?php $__env->startSection('title', 'Contact'); ?>
<?php $__env->startSection('description', 'Get in touch with Tristan James C. Torres about art, web design, or a creative collaboration.'); ?>

<?php $__env->startSection('content'); ?>
    <section class="page-intro-section contact-intro">
        <div class="wrap page-intro-grid">
            <div data-reveal>
                <span class="eyebrow">For ideas, questions & collaborations</span>
                <h1 class="page-title">Let’s create<br><em>something.</em></h1>
            </div>
            <p data-reveal>Have a project, a question, or just want to talk about art? I’d be happy to hear from you.</p>
        </div>
    </section>

    <section class="section contact-section">
        <div class="wrap contact-grid">
            <aside class="contact-details" data-reveal>
                <span class="eyebrow">Find me here</span>
                <h2>Say hello<span>.</span></h2>
                <p class="contact-lede">Whether you have something in mind or just want to connect, my inbox is open.</p>
                <a href="mailto:<?php echo e($profile['email']); ?>" class="contact-detail">
                    <span class="contact-icon"><i class="fa-solid fa-envelope" aria-hidden="true"></i></span>
                    <span><small>Email</small><?php echo e($profile['email']); ?></span>
                    <i class="fa-solid fa-arrow-up-right-from-square detail-arrow" aria-hidden="true"></i>
                </a>
                <a href="tel:<?php echo e($profile['phone']); ?>" class="contact-detail">
                    <span class="contact-icon"><i class="fa-solid fa-phone" aria-hidden="true"></i></span>
                    <span><small>Phone</small><?php echo e($profile['phone']); ?></span>
                    <i class="fa-solid fa-arrow-up-right-from-square detail-arrow" aria-hidden="true"></i>
                </a>
                <div class="contact-detail">
                    <span class="contact-icon"><i class="fa-solid fa-location-dot" aria-hidden="true"></i></span>
                    <span><small>Based in</small>San Pablo City, Laguna, Philippines</span>
                </div>

                <div class="social-links">
                    <span class="eyebrow">Find me online</span>
                    <div>
                        <?php $__currentLoopData = $profile['socials']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e($social['url']); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo e($social['name']); ?>"><i class="fa-brands <?php echo e($social['icon']); ?>" aria-hidden="true"></i></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </aside>

            <div class="contact-form-panel" data-reveal>
                <?php if(session('sent')): ?>
                    <div class="form-success" role="status" tabindex="-1" data-focus-on-load>
                        <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                        <div><strong>Thanks, <?php echo e(session('sentName')); ?>.</strong><p>Your message has been noted. This demo form does not send email yet.</p></div>
                    </div>
                <?php endif; ?>

                <?php if($errors->any()): ?>
                    <div class="form-error-summary" role="alert" tabindex="-1" data-focus-on-load>
                        <strong>Please check the details below.</strong>
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form method="POST" action="<?php echo e(route('contact.send')); ?>" class="contact-form">
                    <?php echo csrf_field(); ?>
                    <div class="form-heading">
                        <span class="eyebrow">Drop me a line</span>
                        <h2>Tell me what you’re thinking.</h2>
                    </div>

                    <div class="form-field">
                        <label for="name">Your name</label>
                        <input id="name" name="name" type="text" value="<?php echo e(old('name')); ?>" autocomplete="name" required <?php if($errors->has('name')): ?> aria-invalid="true" aria-describedby="name-error" <?php endif; ?>>
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="field-error" id="name-error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-row">
                        <div class="form-field">
                            <label for="email">Email address</label>
                            <input id="email" name="email" type="email" value="<?php echo e(old('email')); ?>" autocomplete="email" required <?php if($errors->has('email')): ?> aria-invalid="true" aria-describedby="email-error" <?php endif; ?>>
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="field-error" id="email-error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-field">
                            <label for="phone">Phone <span>(optional)</span></label>
                            <input id="phone" name="phone" type="tel" value="<?php echo e(old('phone')); ?>" autocomplete="tel" <?php if($errors->has('phone')): ?> aria-invalid="true" aria-describedby="phone-error" <?php endif; ?>>
                            <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="field-error" id="phone-error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="form-field">
                        <label for="message">Your message</label>
                        <textarea id="message" name="message" rows="5" required <?php if($errors->has('message')): ?> aria-invalid="true" aria-describedby="message-error" <?php endif; ?>><?php echo e(old('message')); ?></textarea>
                        <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="field-error" id="message-error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <button type="submit" class="button button-primary">Send your message <i class="fa-solid fa-paper-plane" aria-hidden="true"></i></button>
                    <p class="form-note">Your details are used only to respond to your message. Email delivery is not connected on this demo site.</p>
                </form>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\MyWebsites\personal-website\resources\views/contact.blade.php ENDPATH**/ ?>