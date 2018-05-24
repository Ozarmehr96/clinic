<?php include_once(ROOT."/views/layouts/index_header.php");?>

<div class="container">
    <div class="page-404__wrap">
        <h1 class="page-404__title">Ошибка 404 <i class="page-404__icon"></i></h1>
        <h2 class="page-404__description">Страница не существует или не была создана </h2>
        <a href="/" class="btn btn-pr page-404__btn">На главную</a>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("title").text("Ошибка 404");
    });

</script>
<?php include_once(ROOT."/views/layouts/patient_footer.php");?>
