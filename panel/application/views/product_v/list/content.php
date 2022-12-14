<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Ürün Listesi
            <!-- a etiketine product controllerı'nın altındaki new_form isimlimethodu çağırması komutunu veriyoruz. -->
            <a href="<?php echo base_url("product/new_form"); ?>" class="btn btn-outline btn-inverse btn-xs pull-right">
                <i class="fa fa-plus"></i>
                Yeni Ekle
            </a>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">
            <!-- empty ile değişkenin boş olup olmaadığını kontrol ediyoruz -->
            <?php if(empty($items)) { ?>
            <div class="alert alert-info text-center">
                <p>Burada herhangi bir veri bulunmamaktadır. Eklemek için <a href="<?php echo base_url("product/new_form"); ?>">tıklayınız.</a></p>
            </div>
            <?php } else { ?>
            <!-- .table-striped: 1'er sütun aralıklarla renklendirme yapar -->
            <!-- .table-hover: Her sütunun üstüne gelince renk değiştirmesini sağlar -->
            <table class="table table-hover table-striped">
                <thead>
                <th class="text-center">#id</th>
                <th class="text-center">url</th>
                <th class="text-center">Başlık</th>
                <th class="text-center">Açıklama</th>
                <th class="text-center">Durumu</th>
                <th class="text-center">İşlem</th>
                </thead>
                <tbody class="text-center">
                <?php foreach ($items as $item) { ?>
                <tr>
                    <td>#<?php echo $item->id; ?></td>
                    <td><?php echo $item->url; ?></td>
                    <td><?php echo $item->title; ?></td>
                    <td><?php echo $item->description; ?></td>
                    <td>
                        <!-- isActive 1 ise toggle seçili 0 ise seçilmemiş görünmesi için koşul oluşturuyoruz. -->
                        <input
                                type="checkbox"
                                data-switchery
                                data-color="#10c469"
                                data-size="small"
                                <?php echo ($item->isActive) ? "checked" : ""; ?>
                        >
                    </td>
                    <td>
                        <a href="#" class="btn btn-xs btn-inverse btn-outline">
                            <i class="fa fa-trash"></i>
                            Sil
                        </a>
                        <a href="<?php echo base_url("product/update_form/$item->id"); ?>" class="btn btn-xs btn-inverse btn-outline rounded">
                            <i class="fa fa-pencil-square-o"></i>
                            Düzenle
                        </a>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>

            <?php } ?>
        </div><!-- .widget -->
    </div><!-- END column -->
</div>