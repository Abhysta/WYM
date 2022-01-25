<!-- Anime Section Begin -->
<section class="anime-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="anime__video__player">
                    <video id="player" playsinline controls data-poster="./videos/anime-watch.jpg">
                        <source src="<?= base_url('assets/film/'. $film->video)?>" type="video/mp4" />
                        <!-- Captions are optional -->
                        <track kind="captions" label="English captions" src="#" srclang="en" default />
                    </video>
                </div>
                <div class="col-lg">
                    <div class="anime__details__text">
                        <div class="anime__details__title">
                            <h3><?= $film->title?></h3>
                            <span><?= $film->creator?></span>
                        </div>
                        <div class="anime__details__rating">
                            <div class="rating">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star-half-o"></i></a>
                            </div>
                            <span>1.029 Votes</span>
                        </div>
                        <p><?= $film->sinopsis?></p>
                        <div class="anime__details__widget">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <ul>
                                        <li><span>Type:</span><?=$film->type_film?></li>
                                        <li><span>Studios:</span><?=$film->studio?></li>
                                        <li><span>Date aired:</span><?=$film->date?></li>
                                        <li><span>Status:</span><?=$film->status?></li>
                                        <li><span>Genre:</span><?=$film->nama_genre?></li>
                                    </ul>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <ul>
                                        <li><span>Rating:</span><?=$film->rating?></li>
                                        <li><span>Duration:</span><?=$film->duration?></li>
                                        <li><span>Quality:</span><?=$film->kualitas?></li>
                                        <li><span>Views:</span><?=number_format($film->views,0)?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</section>
<!-- Anime Section End -->