<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= $titlePage ?></title>
    <?= $this->include('part/PartCSS') ?>
    <?= $this->include('part/GtagsManager') ?>
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <?= $this->include('part/Navbar') ?>
            <?= $this->include('part/Sidebar') ?>
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <?= $this->include('part/SectionHeader') ?>
                    <div class="section-body">
                        <?= $this->renderSection('Content') ?>
                    </div>
                </section>
                <?= $this->renderSection('Modal') ?>
            </div>
            <?= $this->include('part/Footer') ?>
        </div>
    </div>
    <?= $this->include('part/PartJS') ?>
</body>

</html>