<?php defined('C5_EXECUTE') or die('Access Denied.');
if ($entity) {
    $results = $result->getItemListObject()->getResults();
    if (count($results)) { 
        foreach ($results as $curryStore) {
            $storeID = $curryStore->getID();
            $storeLink = URL::to($detailPage, 'view_express_entity', $storeID);
            $storeName = $curryStore->getStoreName();
            $storeAddress = $curryStore->getStoreAddress();

            $storePhoto = $curryStore->getStorePhoto();
            $storePhotoURL = $storePhoto->getThumbnailURL('file_manager_detail');
            if ($storePhotoURL=='') $storePhotoURL = $storePhoto->getRelativePath();

            $storeTel = $curryStore->getStoreTel();
            $storeCategory = $curryStore->getStoreCategory();
            ?>
            <a href="<?=$storeLink;?>">
            <div class="row">
                <div class='col-sm-3'>
                    <?=$storeName;?>
                </div>
                <div class='col-sm-3'>
                    <?php
                    $thumbnail = null;
                    $thumbnail = \HtmlObject\Image::create($storePhotoURL);
                    echo $thumbnail;
                    ?>
                </div>
                <div class='col-sm-3'>
                    <?=$storeTel?>
                </div>
                <div class='col-sm-3'>
                    <?=$storeAddress?>
                </div>
            </div>
            </a>
        <?php }
    }
}
