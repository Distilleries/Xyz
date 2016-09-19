<?php if ($showLabel && $showField): ?>
    <?php if ($options['wrapper'] !== false): ?>
    <div <?= $options['wrapperAttrs'] ?> >
    <?php endif; ?>
<?php endif; ?>

    <?php if ($showField): ?>
        <?= Form::checkbox($name, $options['default_value'], $options['checked'], $options['attr']) ?>
    <?php endif; ?>

    <?php if ($showLabel && $options['label'] !== false): ?>
        <?php if ($options['is_child']): ?>
            <label <?= $options['labelAttrs'] ?>><?= $options['label'] ?></label>
        <?php else: ?>
            <?= Form::label($name, $options['label'], $options['label_attr']) ?>
        <?php endif; ?>
    <?php endif; ?>

    <?php if ($showError && isset($errors)): ?>
        <?= $errors->first(array_get($options, 'real_name', $name), '<div '.$options['errorAttrs'].'>:message</div>') ?>
    <?php endif; ?>

<?php if ($showLabel && $showField): ?>
    <?php if ($options['wrapper'] !== false): ?>
    </div>
    <?php endif; ?>
<?php endif; ?>
