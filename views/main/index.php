<!DOCTYPE html>
<!--
 Michał Błaszczyk
-->
<div class="container">
    <div class="main">
        <div class="row">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel"> 
                        <ol class="carousel-indicators">
                          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                          <li data-target="#myCarousel" data-slide-to="1"></li>
                          <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">  
                          <?php
                                $article = $this->data['slider'];
                                
                                    echo '
                                        <div class="item active"> 
                                            <img src="' . $GLOBALS['base_url'] . 'public/images/'. $article[0]['id_article'] .'.jpg" style="width:1200px; height:400px;" alt="Slide">
                                            <div class="container">
                                              <div class="carousel-caption">
                                                <p><h1>'. $article[0]['title'] .'</h1></p>
                                                <p><a class="btn btn-lg btn-default" href="'. $GLOBALS['base_url'] .'articles/read/'. $article[0]['id_article'] .'" role="button">Przejdź do artykułu</a></p>
                                              </div>
                                            </div>
                                          </div>';
                                    echo '
                                        <div class="item"> <img src="' . $GLOBALS['base_url'] . '/public/images/'. $article[1]['id_article'] .'.jpg" style="width:100%; height:400px;" alt="Slide">
                                            <div class="container">
                                              <div class="carousel-caption">
                                                <p><h1>'. $article[1]['title'] .'</h1></p>
                                                <p><a class="btn btn-lg btn-default" href="'. $GLOBALS['base_url'] .'articles/read/'. $article[1]['id_article'] .'" role="button">Przejdź do artykułu</a></p>
                                              </div>
                                            </div>
                                          </div>';
                                    echo '
                                        <div class="item"> <img src="' . $GLOBALS['base_url'] . '/public/images/'. $article[2]['id_article'] .'.jpg" style="width:100%; height:400px;" alt="Slide">
                                            <div class="container">
                                              <div class="carousel-caption">
                                                <p><h1>'. $article[2]['title'] .'</h1></p>
                                                <p><a class="btn btn-lg btn-default" href="'. $GLOBALS['base_url'] .'articles/read/'. $article[2]['id_article'] .'" role="button">Przejdź do artykułu</a></p>
                                              </div>
                                            </div>
                                          </div>';
                                
                          ?>
                           
                        </div>
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> 
                        <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a> 
                    </div>
        </div>
    
    
    <div class="row">
                <div class="col-md-4">
                    <p class="left">
                        <div class="box-title text-center">
                            <h3>Najpopularniejsze artykuły</h3>
                        </div>
                        <div class="box-text">
                            <?php
                                foreach($this->data['mostviewed'] as $article){
                                    echo '
                                        <div class="popular-articles">
												<p style="width: 100%;" class="pull-left">
													'. $article['title'] .'
												</p>

												<p class="pull-right">
													<a href="'. $GLOBALS['base_url'] .'articles/read/'. $article['id_article'] .'">Więcej </a>
												</p>
                                        </div>
                                    ';
                                }
                            ?>
                        </div>
                    </p>
                </div>
                
                <div class="col-md-4">
                    <p class="left">
                        <div class="box-title text-center">
                            <h3>Test</h3>
                        </div>
                        <div class="box-text">
                            <p>
                                Jakas treść
                            </p>
                        </div>
                    </p>
                </div>
                
                <div class="col-md-4">
                    <p class="left">
                        <div class="box-title text-center">
                            <h3>Archiwum</h3>
                        </div>
                        <div class="box-text">
                            <p>
                                <ul>
                                    <?php
										foreach($this->data['months'] as $month){
											echo '
												<li>
													<a href="'. $GLOBALS['base_url'] .'articles/date/'. $month["data"] .'">'. $month["data_nice"] .'</a>
												</li>
											';
										}
									?>
                                </ul>
                            </p>
                        </div>
                    </p>
                </div>
    </div>
    </div>
</div>

        
    
