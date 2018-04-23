<?php defined('C5_EXECUTE') or die(_("Access Denied.")); ?>
<?php

if (isset($renderer) && isset($entry) && is_object($entry)) {

$curryStore = $entry;

$storeID = $curryStore->getID();
$storeLink = URL::to($detailPage, 'view_express_entity', $storeID);
$storeName = $curryStore->getStoreName();
$storeAddress = $curryStore->getStoreAddress();

$storePhoto = $curryStore->getStorePhoto();
$storePhotoURL = $storePhoto->getThumbnailURL('small');
if ($storePhotoURL=='') $storePhotoURL = $storePhoto->getRelativePath();

$storeTel = $curryStore->getStoreTel();
$storeCategory = $curryStore->getStoreCategory();
if (is_array($storeCategory)){
    $storeCategoryName = $storeCategory[0]->getTreeNodeDisplayName();
}
?>

<div style="float:right;">
    <?php
    $thumbnail = null;
    $thumbnail = \HtmlObject\Image::create($storePhotoURL);
    $thumbnail->width(500);
    echo $thumbnail;
    ?>
</div>
<h1><?=$storeName?></h1>

<div class="row" style='max-width:300px'>
    <div class="col-sm-6">
        住所
    </div>
    <div class="col-sm-6">
        <?=$storeAddress;?>
    </div>
    <div class="col-sm-6">
        電話
    </div>
    <div class="col-sm-6">
        <?=$storeTel;?>
    </div>
    <div class="col-sm-6">
        カテゴリー
    </div>
    <div class="col-sm-6">
        <?=$storeCategoryName;?>
    </div>
</div>


<h2>オススメニュー</h2>
<?php
$storeMenus = $curryStore->getCurryMenus();
if (count($storeMenus)) {
    foreach ($storeMenus as $storeMenu) {
        $menuName = $storeMenu->getCurryName();
        $menuDescription = $storeMenu->getCurryDescription();
        $menuPhoto = $storeMenu->getCurryPhoto();
        $menuPhotoURL = $menuPhoto->getThumbnailURL('file_manager_detail');
        if ($menuPhotoURL=='') $menuPhotoURL = $menuPhoto->getRelativePath();
        $menuPrice = $storeMenu->getCurryPrice();
        ?>
        <div class="row" style="margin-bottom:1em;border: #a1a1a1 dashed">
            <div class='col-sm-3' style='font-size:1.2em;font-weight:bold;'>
                <?=$menuName;?>
            </div>
            <div class='col-sm-3'>
                <?php
                $thumbnail = null;
                if ($menuPhotoURL) {
                    $thumbnail = \HtmlObject\Image::create($menuPhotoURL);
                    echo $thumbnail;
                }
                ?>
            </div>
            <div class='col-sm-3'>
                <?=$menuPrice?>円
            </div>
            <div class='col-sm-3'>
                <?=$menuDescription?>
            </div>
        </div>
    <?php }
}

} ?>