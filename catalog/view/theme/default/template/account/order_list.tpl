<style>
    .padding {

        padding: 30px;

    }
</style>
<?php echo $header; ?><?php echo $column_left; ?><?php echo $column_right; ?>
<div class="main">
    <div class="container">
        <div class="breadcrumb">
            <?php foreach ($breadcrumbs as $i => $breadcrumb) { ?>
            <?php if ($i + 1 < count($breadcrumbs)) { ?>
            <a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a> |
            <?php } else { ?><span><?php echo $breadcrumb['text']; ?></span><?php } ?>
            <?php } ?>
        </div>

        <h2>медицинская карта</h2>
        <div class="content order">
            <?php if ($record) { ?>

            <center>
                <table>
                    <tr>
                        <td class="padding">Номер болезни:</td>
                        <td class="padding">Название болезни:</td>
                        <td class="padding">Статус:</td>
                        <td class="padding">Процент заболевших даной болезной:</td>
                        <td class="padding">Дата:</td>
                    </tr>

                    <?php foreach ($record as $value) { ?>
                    <tr>

                        <td class="padding"><?php echo $value['case_history_id']; ?></td>
                        <td class="padding"><?php echo $value['disease_name']; ?></td>
                        <td class="padding"><?php echo $value['status']; ?></td>
                        <td class="padding"><?php echo $value['prosent']; ?>%</td>
                        <td class="padding"><?php echo $value['date']; ?></td>
                    </tr>


                    <?php } ?>

                </table>
            </center>

            <div class="pagination"><?php echo $pagination; ?></div>
            <?php } else { ?>
            <?php echo "На данный момент вашей медицинская карта пустая"; ?>
            <?php } ?>
            <div class="btn-block">
                <a href="<?php echo $continue; ?>" class="btn">Пройти тесты</a>
            </div>
        </div>
    </div>
</div>
<?php echo $footer; ?>