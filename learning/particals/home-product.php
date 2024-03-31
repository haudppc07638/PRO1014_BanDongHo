<?php include ("particals/slider.php")?>

            <div class="container">
                <div class="section-produc py-5">
                    <h4 class="title-section text-center">Sản phẩm nổi bật</h4>
                    <div class="row">
                        <?php for ($i=0; $i < 8; $i++) : ?>
                        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                            <div class="card mb-4">
                                <img src="https://wscdn.vn/upload/image/MW-240-1EVDF-1-1436248995-714657676.webp" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>