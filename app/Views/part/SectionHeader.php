<div class="section-header">
    <?php if ($isBack) { ?>
        <div class="section-header-back">
            <a href="<?= $linkBreadCrumb ?>" class="btn btn-icon">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>
    <?php } ?>
    <h1><?= $sectionTitle ?></h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><?= $breadCrumb[0] ?></div>
        <div class="breadcrumb-item"><a href="<?= $linkBreadCrumb ?>"><?= $breadCrumb[1] ?></a></div>
        <?php if (!empty($breadCrumb[2])) : ?>
            <div class="breadcrumb-item"><?= $breadCrumb[2] ?></div>
        <?php endif ?>
    </div>
</div>